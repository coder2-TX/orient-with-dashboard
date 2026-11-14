// Orient Yemen — reliable dynamic hero image loading (Arabic + English).
(function () {
  "use strict";

  const INTERVAL_MS = 4000;
  const PARALLEL_PRELOADS = 3;

  function createHeroSlider(hero) {
    const slides = Array.from(hero.querySelectorAll(".oy-hero__slide"));
    const dots = Array.from(hero.querySelectorAll(".oy-hero__dot"));
    const prevBtn = hero.querySelector(".oy-hero__arrow--prev");
    const nextBtn = hero.querySelector(".oy-hero__arrow--next");
    if (!slides.length) return null;

    let index = slides.findIndex((slide) => slide.classList.contains("is-active"));
    if (index < 0) index = 0;

    // The first slide is already in the HTML as a CSS background with a high-priority preload.
    // Additional slides are supplied by the DB or the default list; no fixed slide count.
    const entries = slides.map((slide, i) => ({
      url: i === 0 ? null : slide.getAttribute("data-hero-src"),
      state: i === 0 ? "ready" : (slide.getAttribute("data-hero-src") ? "queued" : "failed"),
      promise: null,
    }));

    let timer = null;
    let serial = 0;
    let queueIndex = 1;
    let loadingCount = 0;
    let stopped = false;

    function loadOne(i) {
      const entry = entries[i];
      if (!entry || entry.state === "failed") return Promise.resolve(false);
      if (entry.state === "ready") return Promise.resolve(true);
      if (entry.promise) return entry.promise;

      entry.state = "loading";
      entry.promise = new Promise((resolve) => {
        const img = new Image();
        // The browser can reuse its cache when we set the background after decoding.
        img.decoding = "async";
        const finish = (success) => {
          if (success) {
            slideBackground(i, entry.url);
            entry.state = "ready";
          } else {
            entry.state = "failed";
            console.warn("Orient hero image could not load:", entry.url);
          }
          resolve(success);
        };
        img.onload = () => {
          if (typeof img.decode === "function") {
            img.decode().then(() => finish(true), () => finish(true));
          } else {
            finish(true);
          }
        };
        img.onerror = () => finish(false);
        img.src = entry.url;
      });
      return entry.promise;
    }

    function slideBackground(i, url) {
      const slide = slides[i];
      // JSON.stringify safely quotes URLs with spaces or parentheses for CSS url(...).
      slide.style.backgroundImage = "url(" + JSON.stringify(url) + ")";
      slide.removeAttribute("data-hero-src");
    }

    // Start loading all extra slides immediately but do not flood the connection.
    // Prioritize the next slides first and continue in the background.
    function pumpPreloads() {
      while (loadingCount < PARALLEL_PRELOADS && queueIndex < slides.length) {
        const i = queueIndex++;
        if (entries[i].state !== "queued") continue;
        loadingCount++;
        loadOne(i).finally(() => {
          loadingCount--;
          pumpPreloads();
        });
      }
    }

    function show(i) {
      // Existing fade and CSS stay unchanged.
      slides.forEach((slide, j) => slide.classList.toggle("is-active", j === i));
      dots.forEach((dot, j) => dot.classList.toggle("is-active", j === i));
      index = i;
    }

    function clearTimer() {
      if (timer !== null) {
        window.clearTimeout(timer);
        timer = null;
      }
    }

    async function move(step, target) {
      const ticket = ++serial;
      clearTimer();
      if (slides.length <= 1) return;

      // Skip broken URLs; for slow images retain the current visible slide.
      for (let attempt = 0; attempt < slides.length; attempt++) {
        const next = target === null
          ? (index + step * (attempt + 1) + slides.length * (attempt + 1)) % slides.length
          : (target + step * attempt + slides.length * (attempt + 1)) % slides.length;

        if (next === index && attempt === 0) break;
        const success = await loadOne(next);
        if (ticket !== serial || stopped) return;
        if (success) {
          show(next);
          schedule();
          return;
        }
      }
      if (ticket === serial && !stopped) schedule();
    }

    function schedule() {
      clearTimer();
      if (stopped || slides.length <= 1) return;
      timer = window.setTimeout(() => move(1, null), INTERVAL_MS);
    }

    function start() {
      if (!stopped && timer !== null) return; // ignore duplicate DOMContentLoaded/load boot
      stopped = false;
      pumpPreloads();
      schedule();
    }

    function stop() {
      stopped = true;
      serial++;
      clearTimer();
    }

    if (prevBtn) prevBtn.addEventListener("click", () => move(-1, null));
    if (nextBtn) nextBtn.addEventListener("click", () => move(1, null));
    dots.forEach((dot) => {
      dot.addEventListener("click", () => {
        const target = Number(dot.getAttribute("data-index"));
        if (Number.isInteger(target) && target >= 0 && target < slides.length) {
          if (target !== index) move(1, target);
        }
      });
    });

    start();
    return { start, stop, setActive: (i) => move(1, i) };
  }

  window.initHeroSlider = function initHeroSlider() {
    document.querySelectorAll(".oy-hero").forEach((hero) => {
      if (!hero.__oyHeroSlider) hero.__oyHeroSlider = createHeroSlider(hero);
    });
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", window.initHeroSlider, { once: true });
  } else {
    window.initHeroSlider();
  }
})();
