// assets/js/hero.js

(function () {
  const HERO_INTERVAL_MS = 4000;

  function createHeroSlider(hero) {
    const slides = Array.from(hero.querySelectorAll(".oy-hero__slide"));
    const dots = Array.from(hero.querySelectorAll(".oy-hero__dot"));
    const prevBtn = hero.querySelector(".oy-hero__arrow--prev");
    const nextBtn = hero.querySelector(".oy-hero__arrow--next");

    if (slides.length === 0) return null;

    const state = {
      index: slides.findIndex((slide) => slide.classList.contains("is-active")),
      timer: null,
    };

    if (state.index < 0) {
      state.index = 0;
    }

    // Defer hidden slides until they are needed. Keep original fade and 4s timing.
    const ensureLoaded = (slide) => {
      if (!slide) return;
      const url = slide.getAttribute("data-hero-src");
      if (!url) return;
      slide.style.backgroundImage = "url(" + JSON.stringify(url) + ")";
      slide.removeAttribute("data-hero-src");
    };
    const setActive = (nextIndex) => {
      const safeIndex = (nextIndex + slides.length) % slides.length;

      ensureLoaded(slides[safeIndex]);
      slides.forEach((slide) => slide.classList.remove("is-active"));
      slides[safeIndex].classList.add("is-active");

      dots.forEach((dot) => dot.classList.remove("is-active"));
      if (dots[safeIndex]) {
        dots[safeIndex].classList.add("is-active");
      }

      state.index = safeIndex;
    };

    const stop = () => {
      if (state.timer) {
        window.clearInterval(state.timer);
        state.timer = null;
      }
    };

    const start = () => {
      stop();

      if (slides.length <= 1) return;

      // Load only the next slide after initial content has had time to render.
      window.setTimeout(() => {
        if (state.timer) ensureLoaded(slides[(state.index + 1) % slides.length]);
      }, 2000);
      state.timer = window.setInterval(() => {
        setActive(state.index + 1);
      }, HERO_INTERVAL_MS);
    };

    const restart = () => {
      stop();
      start();
    };

    if (prevBtn) {
      prevBtn.addEventListener("click", () => {
        setActive(state.index - 1);
        restart();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        setActive(state.index + 1);
        restart();
      });
    }

    dots.forEach((dot) => {
      dot.addEventListener("click", () => {
        const nextIndex = Number(dot.getAttribute("data-index"));

        if (Number.isFinite(nextIndex)) {
          setActive(nextIndex);
          restart();
        }
      });
    });

    setActive(state.index);
    start();

    return {
      start,
      stop,
      setActive,
    };
  }

  window.initHeroSlider = function initHeroSlider() {
    const heroes = Array.from(document.querySelectorAll(".oy-hero"));

    heroes.forEach((hero) => {
      if (hero.__oyHeroSlider) {
        hero.__oyHeroSlider.start();
        return;
      }

      hero.__oyHeroSlider = createHeroSlider(hero);
    });
  };

  function bootHeroSlider() {
    if (window.initHeroSlider) {
      window.initHeroSlider();
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootHeroSlider, { once: true });
  } else {
    bootHeroSlider();
  }

  window.addEventListener("load", bootHeroSlider, { once: true });
})();