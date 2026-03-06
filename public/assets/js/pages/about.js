// assets/js/pages/about.js
// ORIENT YEMEN - About page partials loader

(function () {
  const safeFetch = (url) =>
    fetch(url).then(r => (r.ok ? r.text() : "")).catch(() => "");

  //  Support AR/EN by reading base dirs from window (with safe defaults)
  const partialsBase = String(window.OY_PARTIALS_DIR || "partials").replace(/\/+$/, "");
  const aboutPartialsBase = String(window.OY_ABOUT_PARTIALS_DIR || "pages/about/partials").replace(/\/+$/, "");

  //  Detect if current page is EN (works even if window vars not set)
  const htmlLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
  const path = (window.location.pathname || "").toLowerCase();
  const isEn = htmlLang.startsWith("en") || path.includes("/pages_en/") || path.endsWith("/index_en.html") || path.includes("index_en.html") || window.OY_LANG === "en";

  const slots = [
    { slot: "header-slot",    url: `${partialsBase}/header.html` },
    { slot: "section-2-slot", url: `${aboutPartialsBase}/section-2.html` },
    { slot: "section-3-slot", url: `${aboutPartialsBase}/section-3.html` },
    { slot: "section-4-slot", url: `${aboutPartialsBase}/section-4.html` },
    { slot: "section-5-slot", url: `${aboutPartialsBase}/section-5.html` },
    { slot: "footer-slot",    url: `${partialsBase}/footer.html` },
  ];

  function patchHeaderForAboutPage() {
    const header = document.querySelector(".oy-header");
    if (!header) return;

    const homeHref  = isEn ? "index_en.html" : "index.html";
    const aboutHref = isEn ? "pages_en/about/index.html" : "pages/about/index.html";

    // Logo -> home
    const logo = header.querySelector(".oy-header__logo");
    if (logo) logo.setAttribute("href", homeHref);

    // Nav: convert anchors to home anchors, set About active (AR/EN)
    const navLinks = header.querySelectorAll(".oy-header__nav .oy-header__link");
    navLinks.forEach(a => {
      const text = (a.textContent || "").trim();
      const href = a.getAttribute("href") || "";

      a.classList.remove("oy-header__link--active");

      // if link is a pure hash, send to correct home (AR/EN)
      if (href.startsWith("#")) a.setAttribute("href", homeHref + href);

      // Set active for "About" link (supports both Arabic and English headers)
      const isAboutAr = text === "من نحن";
      const isAboutEn = text.toLowerCase() === "about";

      if (isAboutAr || isAboutEn) {
        a.classList.add("oy-header__link--active");
        a.setAttribute("href", aboutHref);
      }
    });

    // CTA -> home contact ONLY if it's a hash (keep existing behavior)
    const cta = header.querySelector(".oy-header__cta");
    if (cta) {
      const href = cta.getAttribute("href") || "";
      if (href.startsWith("#")) cta.setAttribute("href", homeHref + href);
    }
  }

  // Scroll reveal (same logic as your sample, but class-based to keep hover working)
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

    // Run immediately + a tiny delay (like your setTimeout(checkScroll, 100))
    check();
    setTimeout(check, 80);
  }

  Promise.all(slots.map(s => safeFetch(s.url))).then((htmlParts) => {
    htmlParts.forEach((html, i) => {
      const el = document.getElementById(slots[i].slot);
      if (el) el.innerHTML = html || "";
    });

    if (window.initHeader) window.initHeader();
    patchHeaderForAboutPage();

    // After partials are injected
    initScrollReveal();
  });
})();
