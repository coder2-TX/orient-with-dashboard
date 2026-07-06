// assets/js/header.js

window.initHeader = function initHeader() {
  const header = document.querySelector(".oy-header");
  if (!header) return;

  const links = Array.from(header.querySelectorAll(".oy-header__link"));
  const menuBtn = header.querySelector(".oy-header__menuBtn");
  const drawer = header.querySelector(".oy-header__drawer");
  const closeTriggers = Array.from(header.querySelectorAll("[data-oy-close]"));

  const body = document.body;

  const logoImg = header.querySelector(".oy-header__logo img");
  const logoDefault =
    logoImg?.getAttribute("data-logo-default") ||
    logoImg?.getAttribute("src") ||
    "";
  const logoScrolled = logoImg?.getAttribute("data-logo-scrolled") || "";

  const normalizePath = (p) => {
    if (!p) return "/";
    return p.endsWith("/index.html") ? p.replace("/index.html", "/") : p;
  };

  const isSamePage = (hrefUrl) => {
    const currentPath = normalizePath(window.location.pathname);
    const targetPath = normalizePath(hrefUrl.pathname);
    return currentPath === targetPath;
  };

  const getAltLanguageUrl = () => {
    const loc = window.location;
    const path = loc.pathname || "/";
    const search = loc.search || "";
    const hash = loc.hash || "";

    const docLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
    const docDir = (document.documentElement.getAttribute("dir") || "").toLowerCase();
    const isEn =
      /^\/en(\/|$)/i.test(path) ||               
      docLang.startsWith("en") ||
      docDir === "ltr" ||
      path.toLowerCase().includes("/pages_en/") ||
      path.toLowerCase().endsWith("index_en.html");

    if (/^\/en(\/|$)/i.test(path)) {
      const arPath = path.replace(/^\/en(?=\/|$)/i, "");
      return (arPath === "" ? "/" : arPath) + search + hash;
    }

    if (!path.toLowerCase().endsWith(".html")) {
      return "/en" + (path === "/" ? "" : path) + search + hash;
    }

    if (path.includes("/pages_en/")) {
      return path.replace("/pages_en/", "/pages/") + search + hash;
    }
    if (path.includes("/pages/")) {
      return path.replace("/pages/", "/pages_en/") + search + hash;
    }

    if (path.toLowerCase().endsWith("index_en.html")) {
      return path.replace(/index_en\.html$/i, "index.html") + search + hash;
    }
    if (path.toLowerCase().endsWith("index.html")) {
      return path.replace(/index\.html$/i, "index_en.html") + search + hash;
    }

    if (path.toLowerCase().endsWith("_en.html")) {
      return path.replace(/_en\.html$/i, ".html") + search + hash;
    }
    if (path.toLowerCase().endsWith(".html")) {
      return path.replace(/\.html$/i, "_en.html") + search + hash;
    }

    return (isEn ? "/index.html" : "/index_en.html") + search + hash;
  };

  const langEl = header.querySelector(".oy-header__lang");
  if (langEl) {
    const target = getAltLanguageUrl();

    const docLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
    const docDir = (document.documentElement.getAttribute("dir") || "").toLowerCase();
    const pathNow = (window.location.pathname || "");
    const isEnNow =
      /^\/en(\/|$)/i.test(pathNow) ||              
      docLang.startsWith("en") ||
      docDir === "ltr" ||
      pathNow.toLowerCase().includes("/pages_en/") ||
      pathNow.toLowerCase().endsWith("index_en.html");

    if (langEl.tagName && langEl.tagName.toLowerCase() === "a") {
      langEl.setAttribute("href", target);
      langEl.setAttribute(
        "aria-label",
        isEnNow ? "Switch language to Arabic" : "Switch language to English"
      );

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

  links.forEach((a) => {
    a.addEventListener("click", () => {
      links.forEach((x) => x.classList.remove("oy-header__link--active"));
      a.classList.add("oy-header__link--active");
      closeMenu();
    });
  });

  if (menuBtn) {
    menuBtn.addEventListener("click", () => {
      const isOpen = header.classList.contains("is-menu-open");
      isOpen ? closeMenu() : openMenu();
    });
  }

  closeTriggers.forEach((el) => {
    el.addEventListener("click", closeMenu);
  });

  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeMenu();
  });

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

  window.addEventListener("hashchange", setActive);
  window.addEventListener("popstate", setActive);

  setActive();
};
