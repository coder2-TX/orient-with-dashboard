// assets/js/pages/products-juices.js
// ORIENT YEMEN - Juices products page loader (header + hero + juices section + footer)

(function () {

  function patchHeaderForProductsPage() {
    const header = document.querySelector(".oy-header");
    if (!header) return;

    const logo = header.querySelector(".oy-header__logo");
    if (logo) logo.setAttribute("href", "index.html");

    const links = header.querySelectorAll(
      ".oy-header__nav .oy-header__link, .oy-header__drawerNav .oy-header__link"
    );

    links.forEach(a => a.classList.remove("oy-header__link--active"));

    links.forEach(a => {
      const href = a.getAttribute("href") || "";
      if (href.includes("pages/products/index.html")) {
        a.classList.add("oy-header__link--active");
      }
    });
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

  // -------- Tabs scroll hint (arrow) helpers --------
  let _rtlScrollType = null;

  function detectRtlScrollType() {
    if (_rtlScrollType) return _rtlScrollType;

    const div = document.createElement("div");
    div.dir = "rtl";
    div.style.width = "100px";
    div.style.height = "100px";
    div.style.overflow = "scroll";
    div.style.visibility = "hidden";
    div.style.position = "absolute";
    div.style.top = "-9999px";
    div.innerHTML = '<div style="width:200px;height:200px"></div>';

    document.body.appendChild(div);

    div.scrollLeft = 0;
    const initial = div.scrollLeft;

    div.scrollLeft = 1;
    const after = div.scrollLeft;

    if (after === 0) _rtlScrollType = "negative";
    else _rtlScrollType = (initial === 0) ? "positive-ascending" : "positive-descending";

    document.body.removeChild(div);
    return _rtlScrollType;
  }

  function getScrollPos(el) {
    const max = el.scrollWidth - el.clientWidth;
    if (max <= 0) return { pos: 0, max: 0 };

    const dir = getComputedStyle(el).direction;
    if (dir !== "rtl") return { pos: el.scrollLeft, max };

    const type = detectRtlScrollType();
    const sl = el.scrollLeft;

    if (type === "negative") return { pos: max + sl, max };
    if (type === "positive-ascending") return { pos: max - sl, max };
    return { pos: sl, max };
  }

  function scrollToPos(el, pos, behavior = "smooth") {
    const max = el.scrollWidth - el.clientWidth;
    if (max <= 0) return;

    const dir = getComputedStyle(el).direction;
    const clamped = Math.max(0, Math.min(pos, max));

    if (dir !== "rtl") {
      el.scrollTo({ left: clamped, behavior });
      return;
    }

    const type = detectRtlScrollType();
    let left = clamped;

    if (type === "negative") left = clamped - max;
    else if (type === "positive-ascending") left = max - clamped;

    el.scrollTo({ left, behavior });
  }

  function initTabsScrollHint(nav) {
    const wrap = nav.closest(".oy-products-tabs__tabsWrap");
    if (!wrap) return;

    const btn = wrap.querySelector(".oy-products-tabs__scrollHint");
    if (!btn) return;

    const update = () => {
      const { pos, max } = getScrollPos(nav);
      const overflow = max > 6;

      if (!overflow) {
        wrap.classList.remove("oy-products-tabs__tabsWrap--showHint");
        return;
      }

      const dir = getComputedStyle(nav).direction;
      const show = (dir === "rtl") ? (pos > 2) : (pos < max - 2);

      if (show) wrap.classList.add("oy-products-tabs__tabsWrap--showHint");
      else wrap.classList.remove("oy-products-tabs__tabsWrap--showHint");
    };

    btn.addEventListener("click", () => {
      const { pos, max } = getScrollPos(nav);
      const dir = getComputedStyle(nav).direction;
      const delta = Math.round(nav.clientWidth * 0.72);

      let target = pos;
      if (dir === "rtl") target = Math.max(0, pos - delta);
      else target = Math.min(max, pos + delta);

      scrollToPos(nav, target, "smooth");
    });

    nav.addEventListener("scroll", () => requestAnimationFrame(update), { passive: true });
    window.addEventListener("resize", () => update());

    setTimeout(update, 40);
  }

  function initTabsScrollHintForPage() {
    const nav = document.querySelector(".oy-products-tabs__nav");
    if (!nav) return;
    initTabsScrollHint(nav);
  }

  function ensureCardVisible(panel, card, behavior = "auto") {
    if (!panel || !card) return;

    const panelRect = panel.getBoundingClientRect();
    const cardRect  = card.getBoundingClientRect();

    const pad = 2;

    const fullyVisible =
      cardRect.left  >= panelRect.left + pad &&
      cardRect.right <= panelRect.right - pad;

    if (fullyVisible) return;

    const { pos, max } = getScrollPos(panel);
    if (max <= 0) return;

    let target = pos;

    if (cardRect.left < panelRect.left + pad) {
      target = pos - ((panelRect.left + pad) - cardRect.left);
    } else if (cardRect.right > panelRect.right - pad) {
      target = pos + (cardRect.right - (panelRect.right - pad));
    }

    scrollToPos(panel, target, behavior);
  }

  function initAutoHover() {
    const panels = Array.from(document.querySelectorAll(".oy-sweets-panel"));
    if (!panels.length) return;

    const reduceMotion =
      window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    if (reduceMotion) {
      panels.forEach(panel => {
        const first = panel.querySelector(".oy-sweets-item:not(.oy-sweets-item--ghost)");
        if (first) setTimeout(() => ensureCardVisible(panel, first, "auto"), 60);
      });
      return;
    }

    const INTERVAL = 1500;
    const panelState = new WeakMap();

    function clearAuto(panel) {
      const st = panelState.get(panel);
      if (!st) return;
      st.cards.forEach(c => c.classList.remove("is-autoHover"));
    }

    function setSingleActive(panel) {
      const st = panelState.get(panel);
      if (!st) return;

      const only = st.cards[0];
      if (!only) return;

      st.cards.forEach(c => c.classList.remove("is-autoHover"));
      only.classList.add("is-autoHover");
    }

    function tick(panel) {
      const st = panelState.get(panel);
      if (!st) return;

      if (st.tempPaused) return;
      if (st.userHold) return;
      if (panel.classList.contains("is-expanded")) return;

      if (st.cards.length === 1) {
        setSingleActive(panel);
        return;
      }

      clearAuto(panel);

      st.idx = (st.idx + 1) % st.cards.length;

      const next = st.cards[st.idx];
      if (!next || next.classList.contains("is-opening")) return;

      next.classList.add("is-autoHover");
    }

    panels.forEach((panel) => {
      const cards = Array.from(
        panel.querySelectorAll(".oy-sweets-item:not(.oy-sweets-item--ghost)")
      );

      if (!cards.length) return;

      setTimeout(() => ensureCardVisible(panel, cards[0], "auto"), 80);
      setTimeout(() => ensureCardVisible(panel, cards[0], "auto"), 260);

      const st = {
        cards,
        idx: -1,
        timer: null,
        userHold: false,
        tempPaused: false,
        resumeT: null,
      };

      panelState.set(panel, st);

      if (cards.length === 1) {
        window.setTimeout(() => setSingleActive(panel), 700);

        panel.__oySweetsAutoHover = {
          pauseTemp() {
            st.tempPaused = true;
            st.userHold = false;
            clearAuto(panel);
          },
          resumeTemp() {
            st.tempPaused = false;
            st.userHold = false;
            if (st.resumeT) clearTimeout(st.resumeT);
            st.resumeT = setTimeout(() => setSingleActive(panel), 320);
          },
        };

        cards[0].addEventListener("mouseleave", () => {
          if (st.resumeT) clearTimeout(st.resumeT);
          st.resumeT = setTimeout(() => setSingleActive(panel), 320);
        });
        cards[0].addEventListener("focusout", () => {
          if (st.resumeT) clearTimeout(st.resumeT);
          st.resumeT = setTimeout(() => setSingleActive(panel), 320);
        });

        cards[0].addEventListener("mouseenter", () => { st.userHold = true; });
        cards[0].addEventListener("focusin", () => { st.userHold = true; });

        return;
      }

      st.timer = window.setInterval(() => tick(panel), INTERVAL);
      window.setTimeout(() => tick(panel), 700);

      cards.forEach((card) => {
        card.addEventListener("mouseenter", () => {
          st.userHold = true;
          clearAuto(panel);
        });

        card.addEventListener("mouseleave", () => {
          st.userHold = false;
          if (st.resumeT) clearTimeout(st.resumeT);
          st.resumeT = setTimeout(() => tick(panel), 700);
        });

        card.addEventListener("focusin", () => {
          st.userHold = true;
          clearAuto(panel);
        });

        card.addEventListener("focusout", () => {
          st.userHold = false;
          if (st.resumeT) clearTimeout(st.resumeT);
          st.resumeT = setTimeout(() => tick(panel), 700);
        });
      });

      panel.__oySweetsAutoHover = {
        pauseTemp() {
          st.tempPaused = true;
          st.userHold = false;
          clearAuto(panel);
        },
        resumeTemp() {
          st.tempPaused = false;
          st.userHold = false;
          if (st.resumeT) clearTimeout(st.resumeT);
          st.resumeT = setTimeout(() => tick(panel), 700);
        },
      };
    });

    document.addEventListener("visibilitychange", () => {
      panels.forEach((panel) => {
        const api = panel.__oySweetsAutoHover;
        if (!api) return;
        if (document.hidden) api.pauseTemp();
        else api.resumeTemp();
      });
    });
  }

  function initExpandGsap() {
    const panels = Array.from(document.querySelectorAll(".oy-sweets-panel"));
    if (!panels.length) return;

    const hasGsap = typeof window.gsap !== "undefined";
    const reduceMotion =
      window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    function buildInset(containerRect, itemRect) {
      const top = Math.max(0, itemRect.top - containerRect.top);
      const left = Math.max(0, itemRect.left - containerRect.left);
      const right = Math.max(0, containerRect.right - itemRect.right);
      const bottom = Math.max(0, containerRect.bottom - itemRect.bottom);
      
      return `inset(${Math.round(top)}px ${Math.round(right)}px ${Math.round(bottom)}px ${Math.round(left)}px)`;
    }

    function escapeHtml(str) {
      return String(str)
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");
    }

    function open(panel, card, btn) {
      if (panel.classList.contains("is-expanded")) return;

      if (panel.__oySweetsAutoHover?.pauseTemp) panel.__oySweetsAutoHover.pauseTemp();

      if (!hasGsap || reduceMotion) {
        panel.classList.add("is-expanded");
        return;
      }

      card.classList.add("is-opening");
      card.getBoundingClientRect();

      const color = getComputedStyle(card).getPropertyValue("--num-color").trim() || "#000";
      const titleText = (card.querySelector(".oy-sweets-title")?.textContent || "").trim();
      const descText  = (card.querySelector(".oy-sweets-desc")?.textContent || "").trim();
      const imgSrc    = card.querySelector(".oy-sweets-media img")?.getAttribute("src") || "";

      const detailsSrc = (card.getAttribute("data-details-img") || "").trim();

      const bigRaw = (card.getAttribute("data-big") || "JUICES|LINE").trim();
      const bigLines = bigRaw.split("|").map(s => s.trim()).filter(Boolean);
      const bigHtml = bigLines.map(line => `<div>${escapeHtml(line)}</div>`).join("");

      const panelRect = panel.getBoundingClientRect();
      const cardRect  = card.getBoundingClientRect();

      //  التعديل هنا: تحديد البداية من الأعلى بالضبط بناءً على اللوحة الحالية لضمان ارتفاع الكارد فقط
      const rowTopRel = Math.max(0, cardRect.top - panelRect.top);

      const rowRect = {
        top: cardRect.top,
        bottom: cardRect.bottom,
        left: panelRect.left,
        right: panelRect.right,
        width: panelRect.width,
        height: cardRect.height
      };

      const origTitle = card.querySelector(".oy-sweets-title");
      const origDesc  = card.querySelector(".oy-sweets-desc");
      const origImgEl = card.querySelector(".oy-sweets-media img");

      const oTitleRect = origTitle ? origTitle.getBoundingClientRect() : null;
      const oDescRect  = origDesc  ? origDesc.getBoundingClientRect()  : null;
      const oImgRect   = origImgEl ? origImgEl.getBoundingClientRect() : null;

      panel.classList.add("is-expanded");

      const overlay = document.createElement("div");
      overlay.className = "oy-sweets-panel__overlay";
      overlay.style.background = color;

      const startInset = buildInset(rowRect, cardRect);
      overlay.style.clipPath = startInset;
      overlay.style.webkitClipPath = startInset;
      
      //  إجبار الـ Overlay على أخذ ارتفاع الكارد بالضبط
      overlay.style.top = Math.round(rowTopRel) + "px";
      overlay.style.bottom = "auto";
      overlay.style.height = Math.round(cardRect.height) + "px";
      
      panel.appendChild(overlay);

      const expand = document.createElement("div");
      expand.className = "oy-sweets-expand";
      expand.style.opacity = "1";
      expand.style.visibility = "hidden";
      
      //  نفس الشيء للحاوية
      expand.style.top = Math.round(rowTopRel) + "px";
      expand.style.bottom = "auto";
      expand.style.height = Math.round(cardRect.height) + "px";

      panel.appendChild(expand);

      const closeBtn = document.createElement("a");
      closeBtn.href = "#close";
      closeBtn.className =
        "oy-products-pagination__item oy-products-pagination__item--next oy-sweets-expand__close";
      closeBtn.setAttribute("aria-label", "Close details");
      closeBtn.innerHTML = `<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>`;
      expand.appendChild(closeBtn);

      const detailsImgHtml = detailsSrc
        ? `<img class="oy-sweets-expand__imgDetails" src="${detailsSrc}" alt="" loading="lazy" onerror="this.style.display='none'">`
        : ``;

      const innerWrap = document.createElement("div");
      innerWrap.innerHTML = `
        <div class="oy-sweets-expand__inner">
          <div class="oy-sweets-expand__text">
            <div class="oy-sweets-expand__bigWrap">
              <div class="oy-sweets-expand__big">
                ${bigHtml}
              </div>
            </div>
            <div class="oy-sweets-expand__meta">
              <h3 class="oy-sweets-expand__title"><span dir="ltr">${escapeHtml(titleText)}</span></h3>
              <p class="oy-sweets-expand__desc">${escapeHtml(descText)}</p>
            </div>
          </div>

          <div class="oy-sweets-expand__imgWrap" aria-hidden="true">
            <img class="oy-sweets-expand__img" src="${imgSrc}" alt="" loading="lazy">
            ${detailsImgHtml}
          </div>
        </div>
      `.trim();
      expand.appendChild(innerWrap.firstElementChild);

      const img    = expand.querySelector(".oy-sweets-expand__img");
      const imgDetails = expand.querySelector(".oy-sweets-expand__imgDetails");
      const big    = expand.querySelector(".oy-sweets-expand__big");
      const finalT = expand.querySelector(".oy-sweets-expand__title");
      const finalD = expand.querySelector(".oy-sweets-expand__desc");

      window.gsap.set(expand, { opacity: 1 });

      function setFromRect(finalEl, fromRect) {
        if (!finalEl || !fromRect) return;
        const f = finalEl.getBoundingClientRect();
        window.gsap.set(finalEl, {
          x: fromRect.left - f.left,
          y: fromRect.top  - f.top
        });
      }
      setFromRect(finalT, oTitleRect);
      setFromRect(finalD, oDescRect);

      (function setImageFromOrig() {
        if (!img) return;

        window.gsap.set(img, { opacity: 1, scaleX: 1, scaleY: 1, rotate: 0, x: 0, y: 0 });

        const fImg = img.getBoundingClientRect();

        if (!oImgRect || oImgRect.width < 2 || oImgRect.height < 2) {
          window.gsap.set(img, { opacity: 1, rotate: 0, x: 0, y: 0, scaleX: 0.7, scaleY: 0.7 });
          return;
        }

        const oCX = oImgRect.left + oImgRect.width / 2;
        const oCY = oImgRect.top  + oImgRect.height / 2;

        const fCX = fImg.left + fImg.width / 2;
        const fCY = fImg.top  + fImg.height / 2;

        const dx = oCX - fCX;
        const dy = oCY - fCY;

        const sx = oImgRect.width  / fImg.width;
        const sy = oImgRect.height / fImg.height;

        window.gsap.set(img, {
          x: dx,
          y: dy,
          rotate: 0,
          scaleX: sx,
          scaleY: sy,
          opacity: 1,
          transformOrigin: "center"
        });
      })();

      (function setDetailsFromOrig() {
        if (!imgDetails) return;

        window.gsap.set(imgDetails, { opacity: 1, scaleX: 1, scaleY: 1, rotate: 0, x: 0, y: 0 });

        const fDet = imgDetails.getBoundingClientRect();

        if (!oImgRect || oImgRect.width < 2 || oImgRect.height < 2) {
          window.gsap.set(imgDetails, { opacity: 0, scaleX: 0.9, scaleY: 0.9, x: 0, y: 10, rotate: 0 });
          return;
        }

        const oCX = oImgRect.left + oImgRect.width / 2;
        const oCY = oImgRect.top  + oImgRect.height / 2;

        const fCX = fDet.left + fDet.width / 2;
        const fCY = fDet.top  + fDet.height / 2;

        const dx = oCX - fCX;
        const dy = oCY - fCY;

        const sx = oImgRect.width  / fDet.width;
        const sy = oImgRect.height / fDet.height;

        window.gsap.set(imgDetails, {
          x: dx,
          y: dy,
          rotate: 0,
          scaleX: sx,
          scaleY: sy,
          opacity: 0,
          transformOrigin: "center"
        });
      })();

      window.gsap.set(big, { x: 120, opacity: 0 });
      window.gsap.set(closeBtn, { opacity: 0, y: 8 });

      expand.style.visibility = "visible";

      if (origTitle) window.gsap.set(origTitle, { opacity: 0 });
      if (origDesc)  window.gsap.set(origDesc,  { opacity: 0 });
      if (origImgEl) window.gsap.set(origImgEl, { opacity: 0 });

      let isClosing = false;

      const tl = window.gsap.timeline({
        defaults: { ease: "power2.inOut" }
      });

      tl.to(overlay, {
        duration: 1.25,
        clipPath: "inset(0px 0px 0px 0px)",
        webkitClipPath: "inset(0px 0px 0px 0px)",
      }, 0);

      tl.to(btn, {
        duration: 0.55,
        y: 26,
        opacity: 0,
        ease: "power2.out"
      }, 0.12);

      tl.to(finalT, { duration: 1.05, x: 0, y: 0 }, 0.10);
      tl.to(finalD, { duration: 1.05, x: 0, y: 0 }, 0.12);

      const FINAL_SCALE = 1.06;

      tl.to(img, {
        duration: 1.25,
        x: 0,
        y: 0,
        rotate: 30,
        scaleX: FINAL_SCALE,
        scaleY: FINAL_SCALE,
        transformOrigin: "center"
      }, 0.00);

      if (imgDetails) {
        tl.to(imgDetails, {
          duration: 1.10,
          x: 0,
          y: 0,
          rotate: 0,
          scaleX: 1,
          scaleY: 1,
          opacity: 1
        }, 0.06);
      }

      tl.to(big, {
        duration: 0.90,
        x: 0,
        opacity: 1,
        ease: "power2.out"
      }, 0.35);

      tl.to(closeBtn, {
        duration: 0.45,
        opacity: 1,
        y: 0,
        ease: "power2.out"
      }, 1.18);

      function cleanupAfterClose() {
        if (origTitle) window.gsap.set(origTitle, { opacity: 1 });
        if (origDesc)  window.gsap.set(origDesc,  { opacity: 1 });
        if (origImgEl) window.gsap.set(origImgEl, { opacity: 1 });

        window.gsap.set(btn, { clearProps: "transform,opacity" });

        overlay.remove();
        expand.remove();

        panel.classList.remove("is-expanded");
        card.classList.remove("is-opening");

        if (panel.__oySweetsAutoHover?.resumeTemp) panel.__oySweetsAutoHover.resumeTemp();

        isClosing = false;
      }

      tl.eventCallback("onReverseComplete", cleanupAfterClose);

      closeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();

        if (isClosing) return;
        isClosing = true;

        closeBtn.style.pointerEvents = "none";
        tl.reverse();
      }, { once: true });
    }

    panels.forEach((panel) => {
      const buttons = Array.from(
        panel.querySelectorAll(".oy-sweets-item:not(.oy-sweets-item--ghost) .oy-sweets-btn")
      );
      if (!buttons.length) return;

      buttons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
          e.preventDefault();
          e.stopPropagation();

          const card = btn.closest(".oy-sweets-item");
          if (!card) return;

          open(panel, card, btn);
        });
      });
    });
  }

function bootPage() {
  if (window.initHeader) window.initHeader();

  patchHeaderForProductsPage();
  initScrollReveal();
  initTabsScrollHintForPage();
  initAutoHover();
  initExpandGsap();
}

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", bootPage, { once: true });
} else {
  bootPage();
}
})();