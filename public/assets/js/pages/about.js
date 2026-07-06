// assets/js/pages/about.js

(function () {
  const safeFetch = (url) =>
    fetch(url).then(r => (r.ok ? r.text() : "")).catch(() => "");

  const partialsBase = String(window.OY_PARTIALS_DIR || "partials").replace(/\/+$/, "");
  const aboutPartialsBase = String(window.OY_ABOUT_PARTIALS_DIR || "pages/about/partials").replace(/\/+$/, "");

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

    const logo = header.querySelector(".oy-header__logo");
    if (logo) logo.setAttribute("href", homeHref);

    const navLinks = header.querySelectorAll(".oy-header__nav .oy-header__link");
    navLinks.forEach(a => {
      const text = (a.textContent || "").trim();
      const href = a.getAttribute("href") || "";

      a.classList.remove("oy-header__link--active");

      if (href.startsWith("#")) a.setAttribute("href", homeHref + href);

      const isAboutAr = text === "من نحن";
      const isAboutEn = text.toLowerCase() === "about";

      if (isAboutAr || isAboutEn) {
        a.classList.add("oy-header__link--active");
        a.setAttribute("href", aboutHref);
      }
    });

    const cta = header.querySelector(".oy-header__cta");
    if (cta) {
      const href = cta.getAttribute("href") || "";
      if (href.startsWith("#")) cta.setAttribute("href", homeHref + href);
    }
  }

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

    if (window.initHeader) window.initHeader();
    patchHeaderForAboutPage();

    initScrollReveal();
  });
})();
