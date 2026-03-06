// assets/js/pages/partners.js
// ORIENT YEMEN - Partners page loader (header + hero + section-2 + section-3 + footer)

(function () {
  const safeFetch = (url) =>
    fetch(url).then(r => (r.ok ? r.text() : "")).catch(() => "");

  //  Support AR/EN by reading base dirs from window (with safe defaults)
  const partialsBase = String(window.OY_PARTIALS_DIR || "partials").replace(/\/+$/, "");
  const partnersPartialsBase = String(window.OY_PARTNERS_PARTIALS_DIR || "pages/partners/partials").replace(/\/+$/, "");

  //  Detect EN (works even if window vars not set)
  const htmlLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
  const path = (window.location.pathname || "").toLowerCase();
  const isEn =
    htmlLang.startsWith("en") ||
    path.includes("/pages_en/") ||
    path.endsWith("/index_en.html") ||
    path.includes("index_en.html") ||
    window.OY_LANG === "en";

  const slots = [
    { slot: "header-slot",    url: `${partialsBase}/header.html` },
    { slot: "hero-slot",      url: `${partnersPartialsBase}/hero.html` },
    { slot: "section-2-slot", url: `${partnersPartialsBase}/section-2.html` },
    { slot: "section-3-slot", url: `${partnersPartialsBase}/section-3.html` },
    { slot: "footer-slot",    url: `${partialsBase}/footer.html` },
  ];

  function patchHeaderForPartnersPage() {
    const header = document.querySelector(".oy-header");
    if (!header) return;

    const homeHref = isEn ? "index_en.html" : "index.html";
    const partnersHref = isEn ? "pages_en/partners/index.html" : "pages/partners/index.html";

    // Logo -> home
    const logo = header.querySelector(".oy-header__logo");
    if (logo) logo.setAttribute("href", homeHref);

    // Desktop + Mobile links
    const navLinks = header.querySelectorAll(
      ".oy-header__nav .oy-header__link, .oy-header__drawerNav .oy-header__link"
    );

    // Clear active
    navLinks.forEach(a => a.classList.remove("oy-header__link--active"));

    // Set active by href (safer than text) + support both /pages/ and /pages_en/
    navLinks.forEach(a => {
      const href = a.getAttribute("href") || "";

      const isPartnersLink =
        href.includes("pages/partners/index.html") ||
        href.includes("pages_en/partners/index.html") ||
        href.includes("/pages/partners/index.html") ||
        href.includes("/pages_en/partners/index.html");

      if (isPartnersLink) {
        a.classList.add("oy-header__link--active");
        a.setAttribute("href", partnersHref);
      }

      // If href is a hash (e.g. "#contact"), redirect it to correct home page
      if (href.startsWith("#")) {
        a.setAttribute("href", homeHref + href);
      }
    });

    // CTA -> home contact if it was a hash link
    const cta = header.querySelector(".oy-header__cta");
    if (cta) {
      const href = cta.getAttribute("href") || "";
      if (href.startsWith("#")) cta.setAttribute("href", homeHref + href);
    }
  }

  // Scroll reveal (same logic as About page)
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

  Promise.all(slots.map(s => safeFetch(s.url))).then((htmlParts) => {
    htmlParts.forEach((html, i) => {
      const el = document.getElementById(slots[i].slot);
      if (el) el.innerHTML = html || "";
    });

    // Init header behavior after injection
    if (window.initHeader) window.initHeader();

    // Force active link for Partners page
    patchHeaderForPartnersPage();

    // Init reveal
    initScrollReveal();

    // Init partners marquee (safe even if it already auto-inits)
    window.initPartners?.();
  });
})();
