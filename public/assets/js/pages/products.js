// assets/js/pages/products.js

(function () {

	function patchHeaderForProductsPage() {
	  const header = document.querySelector(".oy-header");
	  if (!header) return;

	  const links = header.querySelectorAll(
		".oy-header__nav .oy-header__link, .oy-header__drawerNav .oy-header__link"
	  );

	  links.forEach(a => a.classList.remove("oy-header__link--active"));

	  links.forEach(a => {
		const href = a.getAttribute("href") || "";
		if (href.includes("/products") || href.includes("products")) {
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

    if (after === 0) {
      _rtlScrollType = "negative";
    } else {
      _rtlScrollType = (initial === 0) ? "positive-ascending" : "positive-descending";
    }

    document.body.removeChild(div);
    return _rtlScrollType;
  }

  function getScrollPos(nav) {
    const max = nav.scrollWidth - nav.clientWidth;
    if (max <= 0) return { pos: 0, max: 0 };

    const dir = getComputedStyle(nav).direction;
    if (dir !== "rtl") return { pos: nav.scrollLeft, max };

    const type = detectRtlScrollType();
    const sl = nav.scrollLeft;

    if (type === "negative") return { pos: max + sl, max };
    if (type === "positive-ascending") return { pos: max - sl, max };
    return { pos: sl, max };
  }

  function scrollToPos(nav, pos) {
    const max = nav.scrollWidth - nav.clientWidth;
    if (max <= 0) return;

    const dir = getComputedStyle(nav).direction;
    const clamped = Math.max(0, Math.min(pos, max));

    if (dir !== "rtl") {
      nav.scrollTo({ left: clamped, behavior: "smooth" });
      return;
    }

    const type = detectRtlScrollType();
    let left = clamped;

    if (type === "negative") left = clamped - max;
    else if (type === "positive-ascending") left = max - clamped;

    nav.scrollTo({ left, behavior: "smooth" });
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

      scrollToPos(nav, target);
    });

    nav.addEventListener("scroll", () => requestAnimationFrame(update), { passive: true });
    window.addEventListener("resize", () => update());

    setTimeout(update, 40);
  }

  function initProductsTabs() {
    const nav = document.querySelector(".oy-products-tabs__nav");
    if (!nav) return;

    const tabs = Array.from(nav.querySelectorAll(".oy-products-tabs__tab"));
    if (!tabs.length) return;

    const setActive = (key) => {
      tabs.forEach(t => t.classList.remove("oy-products-tabs__tab--active"));
      const active = tabs.find(t => (t.getAttribute("data-tab") || "") === key) || tabs[0];
      if (active) active.classList.add("oy-products-tabs__tab--active");
    };

    const getKey = () => {
      const h = (window.location.hash || "").replace("#", "").trim();
      return h || "all";
    };

    setActive(getKey());
    window.addEventListener("hashchange", () => setActive(getKey()));

    initTabsScrollHint(nav);
  }

  function initProductsPagination() {
    const section = document.querySelector(".oy-products-tabs");
    if (!section) return;

    if (section.dataset.paginationReady === "1") return;
    section.dataset.paginationReady = "1";

    const grid = section.querySelector(".oy-products-grid");
    const wrap = section.querySelector(".oy-products-pagination-wrap");
    const nav = wrap ? wrap.querySelector(".oy-products-pagination") : null;

    if (!grid || !wrap || !nav) return;

    const cards = Array.from(grid.querySelectorAll(".oy-product-card"));
    if (!cards.length) {
      wrap.hidden = true;
      return;
    }

    const ROWS_PER_PAGE = 3;
    let currentPage = 1;
    let resizeRaf = 0;

    function getColumnsPerRow() {
      const width = window.innerWidth || document.documentElement.clientWidth || 0;

      if (width <= 500) return 1;
      if (width <= 1024) return 2;
      return 3;
    }

    function getPageSize() {
      return Math.max(1, getColumnsPerRow() * ROWS_PER_PAGE);
    }

    function getPageCount(pageSize) {
      return Math.max(1, Math.ceil(cards.length / pageSize));
    }

    function clampPage(page, pageCount) {
      return Math.min(Math.max(page, 1), pageCount);
    }

    // ORIENT pagination: fit available width v3
    function getAvailableSlots() {
      const style = window.getComputedStyle(nav);
      const padding = parseFloat(style.paddingLeft || 0) + parseFloat(style.paddingRight || 0);
      const gap = parseFloat(style.columnGap || style.gap || 0) || 0;
      const probe = document.createElement("button");
      probe.type = "button";
      probe.className = "oy-products-pagination__item";
      probe.textContent = "8";
      probe.style.visibility = "hidden";
      nav.appendChild(probe);
      const buttonWidth = probe.getBoundingClientRect().width || 54;
      probe.remove();
      const available = Math.max(0, nav.clientWidth - padding);
      return Math.max(1, Math.floor((available + gap + 0.01) / (buttonWidth + gap)));
    }

    function getVisiblePageItems(pageCount, page, availableCount) {
      // Keep the current page visible, with first/last pages and ellipses when they fit.
      if (pageCount <= availableCount) {
        return Array.from({ length: pageCount }, (_, i) => i + 1);
      }
      for (let count = Math.min(pageCount, availableCount); count >= 1; count--) {
        const start = Math.max(1, Math.min(page - Math.floor((count - 1) / 2), pageCount - count + 1));
        const end = start + count - 1;
        const result = [];
        if (start > 1) {
          result.push(1);
          if (start > 2) result.push("dots");
        }
        for (let n = start; n <= end; n++) result.push(n);
        if (end < pageCount) {
          if (end < pageCount - 1) result.push("dots");
          result.push(pageCount);
        }
        if (result.length <= availableCount) return result;
      }
      // If endpoint markers would crowd the row, use nearby pages instead.
      const count = Math.max(1, availableCount);
      const start = Math.max(1, Math.min(page - Math.floor((count - 1) / 2), pageCount - count + 1));
      return Array.from({ length: count }, (_, i) => start + i);
    }

    function scrollToGridTop() {
      const top = grid.getBoundingClientRect().top + window.pageYOffset - 110;
      window.scrollTo({
        top: Math.max(0, top),
        behavior: "smooth",
      });
    }

    function renderCards(pageSize) {
      const start = (currentPage - 1) * pageSize;
      const end = start + pageSize;

      cards.forEach((card, index) => {
        const show = index >= start && index < end;
        card.hidden = !show;
      });
    }

    function createPageButton(pageNumber) {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = "oy-products-pagination__item";
      btn.textContent = String(pageNumber);

      if (pageNumber === currentPage) {
        btn.classList.add("oy-products-pagination__item--active");
        btn.setAttribute("aria-current", "page");
      } else {
        btn.setAttribute("aria-label", `الانتقال إلى الصفحة ${pageNumber}`);
      }

      btn.addEventListener("click", () => {
        if (pageNumber === currentPage) return;
        currentPage = pageNumber;
        render(true);
      });

      return btn;
    }

    function createDots() {
      const span = document.createElement("span");
      span.className = "oy-products-pagination__item oy-products-pagination__item--dots";
      span.setAttribute("aria-hidden", "true");
      span.textContent = "...";
      return span;
    }

    function createNextButton(pageCount) {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = "oy-products-pagination__item oy-products-pagination__item--next";
      btn.setAttribute("aria-label", "الصفحة التالية");
      btn.innerHTML = '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>';

      if (currentPage >= pageCount) {
        btn.disabled = true;
      }

      btn.addEventListener("click", () => {
        if (currentPage >= pageCount) return;
        currentPage += 1;
        render(true);
      });

      return btn;
    }

    function renderPagination(pageCount) {
      nav.innerHTML = "";

      const isCompact = window.matchMedia("(max-width: 600px)").matches;
      if (isCompact && currentPage > 1) {
        const prev = document.createElement("button");
        prev.type = "button";
        prev.className = "oy-products-pagination__item oy-products-pagination__item--prev";
        prev.setAttribute("aria-label", document.documentElement.dir === "rtl" ? "Ø§Ù„ØµÙØ­Ø© Ø§Ù„Ø³Ø§Ø¨Ù‚Ø©" : "Previous page");
        prev.innerHTML = '<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>';
        prev.addEventListener("click", () => {
          currentPage -= 1;
          render(true);
        });
        nav.appendChild(prev);
      }

      // Reserve one slot for Next, and another for Previous when it is displayed.
      const slots = getAvailableSlots();
      const reserved = 1 + (isCompact && currentPage > 1 ? 1 : 0);
      const items = getVisiblePageItems(pageCount, currentPage, Math.max(1, slots - reserved));

      items.forEach((item) => {
        if (item === "dots") {
          nav.appendChild(createDots());
          return;
        }

        nav.appendChild(createPageButton(item));
      });

      nav.appendChild(createNextButton(pageCount));
    }

    function render(shouldScroll) {
      const pageSize = getPageSize();
      const pageCount = getPageCount(pageSize);

      currentPage = clampPage(currentPage, pageCount);

      renderCards(pageSize);

      if (pageCount <= 1) {
        wrap.hidden = true;
        nav.innerHTML = "";
        return;
      }

      wrap.hidden = false;
      renderPagination(pageCount);

      if (shouldScroll) {
        scrollToGridTop();
      }
    }

    render(false);

    window.addEventListener("resize", () => {
      if (resizeRaf) cancelAnimationFrame(resizeRaf);

      resizeRaf = requestAnimationFrame(() => {
        const pageSize = getPageSize();
        const pageCount = getPageCount(pageSize);
        currentPage = clampPage(currentPage, pageCount);
        render(false);
      });
    });
  }

	function bootPage() {
	  patchHeaderForProductsPage();
	  initProductsTabs();
	  initProductsPagination();
	  initScrollReveal();
	}

	if (document.readyState === "loading") {
	  document.addEventListener("DOMContentLoaded", bootPage, { once: true });
	} else {
	  bootPage();
	}
})();