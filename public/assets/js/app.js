// assets/js/app.js
// ORIENT YEMEN - Partials loader

(function () {
  const safeFetch = (url) =>
    fetch(url).then(r => (r.ok ? r.text() : "")).catch(() => "");

  //  Pick partials directory per page (default: partials)
  // Example in index_en.html: window.OY_PARTIALS_DIR = 'partials_en'
  const base = String(window.OY_PARTIALS_DIR || "partials").replace(/\/+$/, "");

  const slots = [
    { slot: "header-slot",   url: `${base}/header.html` },
    { slot: "hero-slot",     url: `${base}/hero.html` },
    { slot: "about-slot",    url: `${base}/about.html` },
    { slot: "services-slot", url: `${base}/services.html` },
    { slot: "facts-slot",    url: `${base}/facts.html` },
    { slot: "why-slot",      url: `${base}/why.html` },
    { slot: "partners-slot", url: `${base}/partners.html` },
    { slot: "footer-slot",   url: `${base}/footer.html` },
  ];

  Promise.all(slots.map(s => safeFetch(s.url))).then((htmlParts) => {
    htmlParts.forEach((html, i) => {
      const slotId = slots[i].slot;
      const el = document.getElementById(slotId);
      if (el) el.innerHTML = html;
    });

    // Init hooks (if exists)
    if (!window.initScrollReveal) {
      window.initScrollReveal = function initScrollReveal() {
        const items = Array.from(document.querySelectorAll(".oy-reveal"));
        if (items.length === 0) return;

        const reduced =
          window.matchMedia &&
          window.matchMedia("(prefers-reduced-motion: reduce)").matches;

        if (reduced) {
          items.forEach(el => el.classList.add("oy-reveal--visible"));
          return;
        }

        if (!("IntersectionObserver" in window)) {
          items.forEach(el => el.classList.add("oy-reveal--visible"));
          return;
        }

        const io = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("oy-reveal--visible");
              io.unobserve(entry.target);
            }
          });
        }, { threshold: 0.12, rootMargin: "0px 0px -12% 0px" });

        items.forEach(el => io.observe(el));
      };
    }

    if (window.initHeader) window.initHeader();
    if (window.initHeroSlider) window.initHeroSlider();
    if (window.initFactsCounters) window.initFactsCounters();
    if (window.initPartnersSlider) window.initPartnersSlider();
    if (window.initScrollReveal) window.initScrollReveal();
  });
})();
