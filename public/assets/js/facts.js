// assets/js/facts.js
// ORIENT YEMEN - Facts counters (count up on scroll)

(function () {
  function animateCount(el, target, prefix, duration) {
    const prefersReduced = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (prefersReduced) {
      el.textContent = (prefix || "") + String(target);
      return;
    }

    const start = 0;
    const startTime = performance.now();
    const dur = Math.max(400, duration || 1200);

    function tick(now) {
      const t = Math.min(1, (now - startTime) / dur);
      // easeOutCubic
      const eased = 1 - Math.pow(1 - t, 3);
      const value = Math.round(start + (target - start) * eased);

      el.textContent = (prefix || "") + String(value);

      if (t < 1) requestAnimationFrame(tick);
    }

    requestAnimationFrame(tick);
  }

  window.initFactsCounters = function initFactsCounters() {
    const section = document.getElementById("facts") || document.querySelector(".oy-facts");
    if (!section) return;

    const counters = Array.from(section.querySelectorAll("[data-counter]"));
    if (!counters.length) return;

    let started = false;

    const startAll = () => {
      if (started) return;
      started = true;

      counters.forEach((el) => {
        const target = parseInt(el.getAttribute("data-target") || "0", 10);
        const prefix = el.getAttribute("data-prefix") || "";
        animateCount(el, isNaN(target) ? 0 : target, prefix, 1200);
      });
    };

    if ("IntersectionObserver" in window) {
      const io = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              startAll();
              io.disconnect();
            }
          });
        },
        { threshold: 0.35 }
      );

      io.observe(section);
    } else {
      // Fallback: run immediately
      startAll();
    }
  };
})();
