// assets/js/facts.js
// ORIENT YEMEN - Facts counters (count up on scroll)

(function () {
  // =========================
  // سرعة العد
  // =========================
  // زيدي الرقم = الحركة أبطأ
  // نقصي الرقم = الحركة أسرع
  const COUNT_DURATION = 3200;

  // أقل مدة مسموحة
  const MIN_DURATION = 800;

  function animateCount(el, target, prefix, duration) {
    const prefersReduced =
      window.matchMedia &&
      window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    if (prefersReduced) {
      el.textContent = (prefix || "") + String(target);
      return;
    }

    const start = 0;
    const startTime = performance.now();
    const dur = Math.max(MIN_DURATION, duration || COUNT_DURATION);

    function tick(now) {
      const t = Math.min(1, (now - startTime) / dur);

      // حركة خطية أهدأ من easeOut
      const eased = t;

      const value = Math.round(start + (target - start) * eased);

      el.textContent = (prefix || "") + String(value);

      if (t < 1) requestAnimationFrame(tick);
    }

    requestAnimationFrame(tick);
  }

  window.initFactsCounters = function initFactsCounters() {
    const section =
      document.getElementById("facts") || document.querySelector(".oy-facts");

    if (!section) return;

    if (section.dataset.factsInit === "1") return;
    section.dataset.factsInit = "1";

    const counters = Array.from(section.querySelectorAll("[data-counter]"));
    if (!counters.length) return;

    let started = false;

    const startAll = () => {
      if (started) return;
      started = true;

      counters.forEach((el) => {
        const target = parseInt(el.getAttribute("data-target") || "0", 10);
        const prefix = el.getAttribute("data-prefix") || "";
        const startText =
          el.getAttribute("data-start") || (prefix ? `${prefix}0` : "0");

        el.textContent = startText;
        animateCount(el, isNaN(target) ? 0 : target, prefix, COUNT_DURATION);
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
      startAll();
    }
  };

  function bootFactsCounters() {
    if (typeof window.initFactsCounters === "function") {
      window.initFactsCounters();
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootFactsCounters, {
      once: true,
    });
  } else {
    bootFactsCounters();
  }
})();