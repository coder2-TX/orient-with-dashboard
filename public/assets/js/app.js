// assets/js/app.js
// ORIENT YEMEN - Shared page boot (Laravel Blade version)

(function () {
  function ensureScrollReveal() {
    if (window.initScrollReveal) return;

    window.initScrollReveal = function initScrollReveal() {
      const items = Array.from(document.querySelectorAll(".oy-reveal"));
      if (items.length === 0) return;

      const reduced =
        window.matchMedia &&
        window.matchMedia("(prefers-reduced-motion: reduce)").matches;

      if (reduced) {
        items.forEach((el) => el.classList.add("oy-reveal--visible"));
        return;
      }

      if (!("IntersectionObserver" in window)) {
        items.forEach((el) => el.classList.add("oy-reveal--visible"));
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

      items.forEach((el) => io.observe(el));
    };
  }

  function bootPage() {
    ensureScrollReveal();

    if (window.initHeader) window.initHeader();
    if (window.initHeroSlider) window.initHeroSlider();
    if (window.initFactsCounters) window.initFactsCounters();
    if (window.initPartnersSlider) window.initPartnersSlider();
    if (window.initScrollReveal) window.initScrollReveal();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootPage, { once: true });
  } else {
    bootPage();
  }
})();