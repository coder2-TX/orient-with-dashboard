// assets/js/partners.js

window.initPartners = function initPartners() {
  const section = document.querySelector(".oy-partners");
  if (!section) return;

  const marquee = section.querySelector(".oy-partners__marquee");
  const track = section.querySelector(".oy-partners__logos");
  if (!marquee || !track) return;

  if (track.dataset.oyMarqueeInit === "1") return;
  track.dataset.oyMarqueeInit = "1";
  track.classList.add("oy-partners__logos--js");

  const prefersReducedMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches ?? false;

  const originals = Array.from(track.children);
  const originalCount = originals.length;
  if (originalCount === 0) return;

  track.dataset.oyOriginalCount = String(originalCount);

  originals.forEach((el) => {
    const c = el.cloneNode(true);
    c.setAttribute("aria-hidden", "true");
    track.appendChild(c);
  });

  let cycleShift = 0;
  let offset = 0;
  let hasInitialPosition = false;
  let rafId = null;
  let lastTimestamp = null;

  let isDragging = false;
  let dragStartX = 0;
  let dragLastX = 0;
  let dragMoved = false;

  const baseSpeed = 72;

  const isLtr = () => document.documentElement.getAttribute("dir") === "ltr";
  const direction = () => (isLtr() ? 1 : -1);

  const getCycleShift = () => {
    const count = Number(track.dataset.oyOriginalCount || 0);
    if (!count || track.children.length < count + 1) return 0;

    const first = track.children[0];
    const firstClone = track.children[count];
    if (!first || !firstClone) return 0;

    const r1 = first.getBoundingClientRect();
    const r2 = firstClone.getBoundingClientRect();
    const shift = Math.abs(r2.left - r1.left);

    return shift > 0 ? shift : 0;
  };

  const appendOneMoreSet = () => {
    for (let i = 0; i < originalCount; i++) {
      const c = originals[i].cloneNode(true);
      c.setAttribute("aria-hidden", "true");
      track.appendChild(c);
    }
  };

  const ensureNoBlank = () => {
    if (!cycleShift) return;

    const targetWidth = marquee.clientWidth + cycleShift + marquee.clientWidth;

    while (track.scrollWidth < targetWidth) {
      appendOneMoreSet();
    }
  };

  const resetInitialPosition = () => {
    offset = isLtr() ? -cycleShift : 0;
    hasInitialPosition = true;
  };

  const normalizeOffset = () => {
    if (!cycleShift) return;

    if (isLtr()) {
      while (offset >= 0) {
        offset -= cycleShift;
      }

      while (offset < -cycleShift) {
        offset += cycleShift;
      }

      return;
    }

    while (offset <= -cycleShift) {
      offset += cycleShift;
    }

    while (offset > 0) {
      offset -= cycleShift;
    }
  };

  const applyTransform = () => {
    track.style.transform = `translate3d(${offset.toFixed(2)}px, 0, 0)`;
  };

  const calculate = () => {
    const previousShift = cycleShift;

    cycleShift = getCycleShift();
    if (!cycleShift || cycleShift < 10) return;

    ensureNoBlank();

    track.style.setProperty("--oy-partners-shift", `${cycleShift.toFixed(2)}px`);
    track.style.setProperty("--oy-partners-duration", `${Math.max(10, cycleShift / baseSpeed).toFixed(2)}s`);

    if (!hasInitialPosition || Math.abs(previousShift - cycleShift) > 1) {
      resetInitialPosition();
    }

    normalizeOffset();
    applyTransform();
  };

  const tick = (timestamp) => {
    if (!lastTimestamp) {
      lastTimestamp = timestamp;
    }

    const deltaTime = Math.min((timestamp - lastTimestamp) / 1000, 0.05);
    lastTimestamp = timestamp;

    if (cycleShift && !isDragging && !prefersReducedMotion) {
      offset += direction() * baseSpeed * deltaTime;
      normalizeOffset();
      applyTransform();
    }

    rafId = requestAnimationFrame(tick);
  };

  const start = () => {
    if (rafId !== null) return;

    rafId = requestAnimationFrame(tick);
  };

  const rafCalculate = () => {
    requestAnimationFrame(() => {
      calculate();
      start();
    });
  };

  const onPointerDown = (event) => {
    if (!cycleShift) return;

    isDragging = true;
    dragMoved = false;
    dragStartX = event.clientX;
    dragLastX = event.clientX;
    lastTimestamp = null;

    marquee.classList.add("is-dragging");

    if (typeof marquee.setPointerCapture === "function") {
      marquee.setPointerCapture(event.pointerId);
    }
  };

  const onPointerMove = (event) => {
    if (!isDragging || !cycleShift) return;

    const deltaX = event.clientX - dragLastX;
    dragLastX = event.clientX;

    if (Math.abs(event.clientX - dragStartX) > 3) {
      dragMoved = true;
    }

    offset += deltaX;
    normalizeOffset();
    applyTransform();
  };

  const stopDragging = (event) => {
    if (!isDragging) return;

    isDragging = false;
    marquee.classList.remove("is-dragging");
    lastTimestamp = null;

    if (event?.pointerId && typeof marquee.releasePointerCapture === "function") {
      try {
        marquee.releasePointerCapture(event.pointerId);
      } catch (_) {
        // Ignore release errors when the pointer was already released by the browser.
      }
    }
  };

  const preventClickAfterDrag = (event) => {
    if (!dragMoved) return;

    event.preventDefault();
    event.stopPropagation();
    dragMoved = false;
  };

  rafCalculate();

  window.addEventListener("load", rafCalculate);
  window.addEventListener("resize", rafCalculate);

  marquee.addEventListener("pointerdown", onPointerDown);
  marquee.addEventListener("pointermove", onPointerMove);
  marquee.addEventListener("pointerup", stopDragging);
  marquee.addEventListener("pointercancel", stopDragging);
  marquee.addEventListener("pointerleave", stopDragging);
  marquee.addEventListener("click", preventClickAfterDrag, true);

  track.querySelectorAll("img").forEach((img) => {
    img.setAttribute("draggable", "false");

    if (img.complete) return;

    img.addEventListener("load", rafCalculate, { once: true });
  });

  if ("ResizeObserver" in window) {
    const ro = new ResizeObserver(() => rafCalculate());

    ro.observe(marquee);
    ro.observe(track);
  }
};

(() => {
  const boot = () => {
    window.initPartners?.();

    const mo = new MutationObserver(() => {
      window.initPartners?.();
    });

    mo.observe(document.body, { childList: true, subtree: true });
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();