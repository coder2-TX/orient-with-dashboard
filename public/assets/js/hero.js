// assets/js/hero.js
// ORIENT YEMEN - Hero slider logic (auto every 4s)

window.initHeroSlider = function initHeroSlider() {
  const hero = document.querySelector(".oy-hero");
  if (!hero) return;

  const slides = Array.from(hero.querySelectorAll(".oy-hero__slide"));
  const dots = Array.from(hero.querySelectorAll(".oy-hero__dot"));
  const prevBtn = hero.querySelector(".oy-hero__arrow--prev");
  const nextBtn = hero.querySelector(".oy-hero__arrow--next");

  if (slides.length === 0) return;

  let index = slides.findIndex(s => s.classList.contains("is-active"));
  if (index < 0) index = 0;

  const intervalMs = 4000;
  let timer = null;

  const setActive = (nextIndex) => {
    const safeIndex = (nextIndex + slides.length) % slides.length;

    slides.forEach(s => s.classList.remove("is-active"));
    slides[safeIndex].classList.add("is-active");

    dots.forEach(d => d.classList.remove("is-active"));
    if (dots[safeIndex]) dots[safeIndex].classList.add("is-active");

    index = safeIndex;
  };

  const start = () => {
    stop();
    timer = window.setInterval(() => setActive(index + 1), intervalMs);
  };

  const stop = () => {
    if (timer) window.clearInterval(timer);
    timer = null;
  };

  // Controls
  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      stop();
      setActive(index - 1);
      start();
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      stop();
      setActive(index + 1);
      start();
    });
  }

  dots.forEach((dot) => {
    dot.addEventListener("click", () => {
      const i = Number(dot.getAttribute("data-index"));
      if (Number.isFinite(i)) {
        stop();
        setActive(i);
        start();
      }
    });
  });

  // Pause on hover (optional)
  hero.addEventListener("mouseenter", stop);
  hero.addEventListener("mouseleave", start);

  setActive(index);
  start();
};
