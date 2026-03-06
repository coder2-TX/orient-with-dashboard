// assets/js/header.js
// ORIENT YEMEN - Header behavior (active link + mobile drawer + scroll styling)

window.initHeader = function initHeader() {
  const header = document.querySelector(".oy-header");
  if (!header) return;

  const links = Array.from(header.querySelectorAll(".oy-header__link"));
  const menuBtn = header.querySelector(".oy-header__menuBtn");
  const drawer = header.querySelector(".oy-header__drawer");
  const closeTriggers = Array.from(header.querySelectorAll("[data-oy-close]"));

  const body = document.body;

  // Logo swap (default <-> scrolled)
  const logoImg = header.querySelector(".oy-header__logo img");
  const logoDefault =
    logoImg?.getAttribute("data-logo-default") ||
    logoImg?.getAttribute("src") ||
    "";
  const logoScrolled = logoImg?.getAttribute("data-logo-scrolled") || "";

  const normalizePath = (p) => {
    // Treat "/" and "/index.html" as same
    if (!p) return "/";
    return p.endsWith("/index.html") ? p.replace("/index.html", "/") : p;
  };

  const isSamePage = (hrefUrl) => {
    const currentPath = normalizePath(window.location.pathname);
    const targetPath = normalizePath(hrefUrl.pathname);
    return currentPath === targetPath;
  };

  //  Build the "other language" URL based on current page path
  const getAltLanguageUrl = () => {
    const loc = window.location;
    const path = loc.pathname || "/";
    const search = loc.search || "";
    const hash = loc.hash || "";

    // Detect EN vs AR by path/lang/dir
    const docLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
    const docDir = (document.documentElement.getAttribute("dir") || "").toLowerCase();
    const isEn =
      /^\/en(\/|$)/i.test(path) ||                 //  Laravel: /en prefix
      docLang.startsWith("en") ||
      docDir === "ltr" ||
      path.toLowerCase().includes("/pages_en/") ||
      path.toLowerCase().endsWith("index_en.html");

    //  0) Laravel routes first: /about <-> /en/about
    // If we are in /en/... => remove /en
    if (/^\/en(\/|$)/i.test(path)) {
      const arPath = path.replace(/^\/en(?=\/|$)/i, "");
      return (arPath === "" ? "/" : arPath) + search + hash;
    }

    // If we are NOT in /en and NOT an .html legacy file => add /en
    // (prevents overriding Laravel with old index_en.html logic)
    if (!path.toLowerCase().endsWith(".html")) {
      return "/en" + (path === "/" ? "" : path) + search + hash;
    }

    // ------------------------------------------------------------
    // Legacy static HTML fallbacks (keep for old links if needed)
    // ------------------------------------------------------------

    // 1) If we are inside pages/about... => switch between /pages/ and /pages_en/
    if (path.includes("/pages_en/")) {
      return path.replace("/pages_en/", "/pages/") + search + hash;
    }
    if (path.includes("/pages/")) {
      return path.replace("/pages/", "/pages_en/") + search + hash;
    }

    // 2) Home: switch between index.html and index_en.html
    if (path.toLowerCase().endsWith("index_en.html")) {
      return path.replace(/index_en\.html$/i, "index.html") + search + hash;
    }
    if (path.toLowerCase().endsWith("index.html")) {
      return path.replace(/index\.html$/i, "index_en.html") + search + hash;
    }

    // 3) Fallback: about.html <-> about_en.html
    if (path.toLowerCase().endsWith("_en.html")) {
      return path.replace(/_en\.html$/i, ".html") + search + hash;
    }
    if (path.toLowerCase().endsWith(".html")) {
      return path.replace(/\.html$/i, "_en.html") + search + hash;
    }

    // Default fallback to home
    return (isEn ? "/index.html" : "/index_en.html") + search + hash;
  };

  //  Language switch (works with <a> or <button>)
  const langEl = header.querySelector(".oy-header__lang");
  if (langEl) {
    const target = getAltLanguageUrl();

    // Optional: update label text (keep your markup if you prefer)
    const docLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
    const docDir = (document.documentElement.getAttribute("dir") || "").toLowerCase();
    const pathNow = (window.location.pathname || "");
    const isEnNow =
      /^\/en(\/|$)/i.test(pathNow) ||              //  Laravel: /en prefix
      docLang.startsWith("en") ||
      docDir === "ltr" ||
      pathNow.toLowerCase().includes("/pages_en/") ||
      pathNow.toLowerCase().endsWith("index_en.html");

    // set href for anchors so it works even with middle-click/open new tab
    if (langEl.tagName && langEl.tagName.toLowerCase() === "a") {
      langEl.setAttribute("href", target);
      langEl.setAttribute(
        "aria-label",
        isEnNow ? "Switch language to Arabic" : "Switch language to English"
      );
      // keep your text as-is, or uncomment next line to force:
      // langEl.textContent = isEnNow ? "AR" : "EN";
    } else {
      langEl.setAttribute(
        "aria-label",
        isEnNow ? "Switch language to Arabic" : "Switch language to English"
      );
      langEl.addEventListener("click", (e) => {
        e.preventDefault();
        window.location.href = target;
      });
    }
  }

  const setActive = () => {
    links.forEach((a) => a.classList.remove("oy-header__link--active"));

    const currentPath = normalizePath(window.location.pathname);
    const isHome = currentPath === "/";
    const currentHash = window.location.hash || (isHome ? "#home" : "");

    let best = null;

    for (const a of links) {
      const raw = a.getAttribute("href") || "";
      try {
        const url = new URL(raw, document.baseURI || window.location.href);

        const targetPath = normalizePath(url.pathname);
        const targetHash = url.hash;

        if (isSamePage(url) && targetHash && targetHash === currentHash) {
          best = a;
          break;
        }

        if (!best && targetHash === "" && targetPath === currentPath) {
          best = a;
        }
      } catch (e) {
        // ignore invalid href
      }
    }

    (best || links[0])?.classList.add("oy-header__link--active");
  };

  const openMenu = () => {
    header.classList.add("is-menu-open");
    body.classList.add("oy-menu-open");
    if (menuBtn) menuBtn.setAttribute("aria-expanded", "true");
    if (drawer) drawer.setAttribute("aria-hidden", "false");
  };

  const closeMenu = () => {
    header.classList.remove("is-menu-open");
    body.classList.remove("oy-menu-open");
    if (menuBtn) menuBtn.setAttribute("aria-expanded", "false");
    if (drawer) drawer.setAttribute("aria-hidden", "true");
  };

  // Click link -> set active + close menu on mobile
  links.forEach((a) => {
    a.addEventListener("click", () => {
      links.forEach((x) => x.classList.remove("oy-header__link--active"));
      a.classList.add("oy-header__link--active");
      closeMenu();
    });
  });

  // Menu button
  if (menuBtn) {
    menuBtn.addEventListener("click", () => {
      const isOpen = header.classList.contains("is-menu-open");
      isOpen ? closeMenu() : openMenu();
    });
  }

  // Close triggers (overlay + X)
  closeTriggers.forEach((el) => {
    el.addEventListener("click", closeMenu);
  });

  // ESC to close
  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeMenu();
  });

  // Sync CSS var for fixed header height
  const syncHeaderHeight = () => {
    const h = Math.ceil(header.getBoundingClientRect().height || 0);
    document.documentElement.style.setProperty("--oy-header-h", `${h}px`);
  };

  syncHeaderHeight();
  window.addEventListener("resize", syncHeaderHeight);
  window.addEventListener("load", syncHeaderHeight);

  if ("ResizeObserver" in window) {
    const ro = new ResizeObserver(() => syncHeaderHeight());
    ro.observe(header);
  }

  // Scrolled state: change header color + swap logo
  const applyScrolledState = () => {
    const scrolled = (window.scrollY || 0) > 8;

    header.classList.toggle("is-scrolled", scrolled);

    if (logoImg && logoScrolled) {
      const nextSrc = scrolled ? logoScrolled : logoDefault;
      if (logoImg.getAttribute("src") !== nextSrc) {
        logoImg.setAttribute("src", nextSrc);
      }
    }
  };

  applyScrolledState();
  window.addEventListener("scroll", applyScrolledState, { passive: true });
  window.addEventListener("load", applyScrolledState);

  // Keep active link updated
  window.addEventListener("hashchange", setActive);
  window.addEventListener("popstate", setActive);

  setActive();
};
