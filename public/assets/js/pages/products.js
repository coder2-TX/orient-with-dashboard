// assets/js/pages/products.js
// ORIENT YEMEN - Products page loader (header + hero + section2 + footer)

(function () {
  const safeFetch = (url) =>
    fetch(url).then(r => (r.ok ? r.text() : "")).catch(() => "");

  const slots = [
    { slot: "header-slot",   url: "partials/header.html" },
    { slot: "hero-slot",     url: "pages/products/partials/hero.html" },
    { slot: "section2-slot", url: "pages/products/partials/section-2.html" },
    { slot: "footer-slot",   url: "partials/footer.html" },
  ];

  function patchHeaderForProductsPage() {
    const header = document.querySelector(".oy-header");
    if (!header) return;

    // Logo -> home
    const logo = header.querySelector(".oy-header__logo");
    if (logo) logo.setAttribute("href", "index.html");

    const links = header.querySelectorAll(
      ".oy-header__nav .oy-header__link, .oy-header__drawerNav .oy-header__link"
    );

    // clear active
    links.forEach(a => a.classList.remove("oy-header__link--active"));

    // mark products active
    links.forEach(a => {
      const href = a.getAttribute("href") || "";
      if (href.includes("pages/products/index.html")) {
        a.classList.add("oy-header__link--active");
      }
    });
  }

  // Scroll reveal (same logic as About/Partners)
  function initScrollReveal() {
    const elements = Array.from(document.querySelectorAll(".oy-reveal"));
    if (!elements.length) return;

    const reduceMotion =
      window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    if (reduceMotion) {
      elements.forEach(el => el.classList.add("oy-reveal--visible"));
      return;
    }

    const offset = 110;

    const check = () => {
      const windowHeight = window.innerHeight;

      elements.forEach(el => {
        if (el.classList.contains("oy-reveal--visible")) return;

        const top = el.getBoundingClientRect().top;
        if (top < windowHeight - offset) {
          el.classList.add("oy-reveal--visible");
        }
      });
    };

    window.addEventListener("scroll", check, { passive: true });
    window.addEventListener("resize", check);

    check();
    setTimeout(check, 80);
  }

  // -------- Tabs scroll hint (arrow) helpers --------
  let _rtlScrollType = null;

  function detectRtlScrollType() {
    if (_rtlScrollType) return _rtlScrollType;

    const div = document.createElement("div");
    div.dir = "rtl";
    div.style.width = "100px";
    div.style.height = "100px";
    div.style.overflow = "scroll";
    div.style.visibility = "hidden";
    div.style.position = "absolute";
    div.style.top = "-9999px";
    div.innerHTML = '<div style="width:200px;height:200px"></div>';

    document.body.appendChild(div);

    // Chrome/Edge: initial scrollLeft is max
    // Safari: initial scrollLeft is 0
    // Firefox: cannot set scrollLeft to positive (stays 0)
    div.scrollLeft = 0;
    const initial = div.scrollLeft;

    div.scrollLeft = 1;
    const after = div.scrollLeft;

    if (after === 0) {
      _rtlScrollType = "negative"; // Firefox
    } else {
      _rtlScrollType = (initial === 0) ? "positive-ascending" : "positive-descending"; // Safari : Chrome/Edge
    }

    document.body.removeChild(div);
    return _rtlScrollType;
  }

  function getScrollPos(nav) {
    const max = nav.scrollWidth - nav.clientWidth;
    if (max <= 0) return { pos: 0, max: 0 };

    const dir = getComputedStyle(nav).direction;
    if (dir !== "rtl") return { pos: nav.scrollLeft, max };

    const type = detectRtlScrollType();
    const sl = nav.scrollLeft;

    if (type === "negative") return { pos: max + sl, max };          // sl: 0 .. -max
    if (type === "positive-ascending") return { pos: max - sl, max }; // sl: max .. 0
    return { pos: sl, max };                                          // sl: 0 .. max (reverse)
  }

  function scrollToPos(nav, pos) {
    const max = nav.scrollWidth - nav.clientWidth;
    if (max <= 0) return;

    const dir = getComputedStyle(nav).direction;
    const clamped = Math.max(0, Math.min(pos, max));

    if (dir !== "rtl") {
      nav.scrollTo({ left: clamped, behavior: "smooth" });
      return;
    }

    const type = detectRtlScrollType();
    let left = clamped;

    if (type === "negative") left = clamped - max;
    else if (type === "positive-ascending") left = max - clamped;

    nav.scrollTo({ left, behavior: "smooth" });
  }

  function initTabsScrollHint(nav) {
    const wrap = nav.closest(".oy-products-tabs__tabsWrap");
    if (!wrap) return;

    const btn = wrap.querySelector(".oy-products-tabs__scrollHint");
    if (!btn) return;

    const update = () => {
      const { pos, max } = getScrollPos(nav);
      const overflow = max > 6;

      if (!overflow) {
        wrap.classList.remove("oy-products-tabs__tabsWrap--showHint");
        return;
      }

      // show hint only if there is hidden content at inline-end:
      // RTL: inline-end is left, so show while pos > 0 (not at leftmost)
      // LTR: inline-end is right, so show while pos < max (not at rightmost)
      const dir = getComputedStyle(nav).direction;
      const show = (dir === "rtl") ? (pos > 2) : (pos < max - 2);

      if (show) wrap.classList.add("oy-products-tabs__tabsWrap--showHint");
      else wrap.classList.remove("oy-products-tabs__tabsWrap--showHint");
    };

    btn.addEventListener("click", () => {
      const { pos, max } = getScrollPos(nav);
      const dir = getComputedStyle(nav).direction;
      const delta = Math.round(nav.clientWidth * 0.72);

      let target = pos;
      if (dir === "rtl") target = Math.max(0, pos - delta);
      else target = Math.min(max, pos + delta);

      scrollToPos(nav, target);
    });

    nav.addEventListener("scroll", () => requestAnimationFrame(update), { passive: true });
    window.addEventListener("resize", () => update());

    // initial
    setTimeout(update, 40);
  }

  // Tabs active state (based on hash)
  function initProductsTabs() {
    const nav = document.querySelector(".oy-products-tabs__nav");
    if (!nav) return;

    const tabs = Array.from(nav.querySelectorAll(".oy-products-tabs__tab"));
    if (!tabs.length) return;

    const setActive = (key) => {
      tabs.forEach(t => t.classList.remove("oy-products-tabs__tab--active"));
      const active = tabs.find(t => (t.getAttribute("data-tab") || "") === key) || tabs[0];
      if (active) active.classList.add("oy-products-tabs__tab--active");
    };

    const getKey = () => {
      const h = (window.location.hash || "").replace("#", "").trim();
      return h || "all";
    };

    setActive(getKey());
    window.addEventListener("hashchange", () => setActive(getKey()));

    //  init scroll hint arrow
    initTabsScrollHint(nav);
  }

  Promise.all(slots.map(s => safeFetch(s.url))).then((htmlParts) => {
    htmlParts.forEach((html, i) => {
      const el = document.getElementById(slots[i].slot);
      if (el) el.innerHTML = html || "";
    });

    // init shared header behavior
    if (window.initHeader) window.initHeader();

    // products page specific header active
    patchHeaderForProductsPage();

    // init tabs (after injection)
    initProductsTabs();

    // reveal after injection
    initScrollReveal();
  });
})();
