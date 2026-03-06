// assets/js/partners.js

window.initPartners = function initPartners() {
  const section = document.querySelector(".oy-partners");
  if (!section) return;

  const marquee = section.querySelector(".oy-partners__marquee");
  const track = section.querySelector(".oy-partners__logos");
  if (!marquee || !track) return;

  // prevent double init
  if (track.dataset.oyMarqueeInit === "1") return;
  track.dataset.oyMarqueeInit = "1";

  const originals = Array.from(track.children);
  const originalCount = originals.length;
  if (originalCount === 0) return;

  track.dataset.oyOriginalCount = String(originalCount);

  originals.forEach((el) => {
    const c = el.cloneNode(true);
    c.setAttribute("aria-hidden", "true");
    track.appendChild(c);
  });

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

  const ensureNoBlank = (cycleShift) => {
    if (!cycleShift) return;

    const targetWidth = marquee.clientWidth + cycleShift + marquee.clientWidth; // = 2*viewport + cycle
    while (track.scrollWidth < targetWidth) {
      appendOneMoreSet();
    }
  };

  const apply = () => {
    const cycleShift = getCycleShift();
    if (!cycleShift || cycleShift < 10) return;

    ensureNoBlank(cycleShift);

    const pxPerSec = 22;
    const duration = Math.max(18, cycleShift / pxPerSec);

    track.style.setProperty("--oy-partners-shift", `${cycleShift.toFixed(2)}px`);
    track.style.setProperty("--oy-partners-duration", `${duration.toFixed(2)}s`);
  };

  const rafApply = () => requestAnimationFrame(apply);

  rafApply();
  window.addEventListener("load", rafApply);
  window.addEventListener("resize", rafApply);

  track.querySelectorAll("img").forEach((img) => {
    img.addEventListener("load", rafApply, { once: true });
  });

  if ("ResizeObserver" in window) {
    const ro = new ResizeObserver(() => rafApply());
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
