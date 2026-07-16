// assets/js/header.js

window.initHeader = function initHeader() {
  const header = document.querySelector(".oy-header");

  if (!header) {
    return;
  }

  const navLinks = Array.from(
    header.querySelectorAll(".oy-header__link[data-nav-section]")
  );

  const menuBtn = header.querySelector(".oy-header__menuBtn");
  const drawer = header.querySelector(".oy-header__drawer");

  const closeTriggers = Array.from(
    header.querySelectorAll("[data-oy-close]")
  );

  const body = document.body;

  const logoImg = header.querySelector(".oy-header__logo img");

  const logoDefault =
    logoImg?.getAttribute("data-logo-default") ||
    logoImg?.getAttribute("src") ||
    "";

  const logoScrolled =
    logoImg?.getAttribute("data-logo-scrolled") || "";

  const normalizePath = (path) => {
    let normalizedPath = path || "/";

    normalizedPath = normalizedPath.replace(/\/index\.html$/i, "/");
    normalizedPath = normalizedPath.replace(/\/{2,}/g, "/");

    if (normalizedPath.length > 1) {
      normalizedPath = normalizedPath.replace(/\/+$/, "");
    }

    return normalizedPath || "/";
  };

  const isPathMatch = (currentPath, targetPath) => {
    if (targetPath === "/") {
      return currentPath === "/";
    }

    return (
      currentPath === targetPath ||
      currentPath.startsWith(`${targetPath}/`)
    );
  };

  const getAltLanguageUrl = () => {
    const loc = window.location;
    const path = loc.pathname || "/";
    const search = loc.search || "";
    const hash = loc.hash || "";

    const docLang = (
      document.documentElement.getAttribute("lang") || ""
    ).toLowerCase();

    const docDir = (
      document.documentElement.getAttribute("dir") || ""
    ).toLowerCase();

    const isEn =
      /^\/en(\/|$)/i.test(path) ||
      docLang.startsWith("en") ||
      docDir === "ltr" ||
      path.toLowerCase().includes("/pages_en/") ||
      path.toLowerCase().endsWith("index_en.html");

    if (/^\/en(\/|$)/i.test(path)) {
      const arPath = path.replace(/^\/en(?=\/|$)/i, "");

      return (
        (arPath === "" ? "/" : arPath) +
        search +
        hash
      );
    }

    if (!path.toLowerCase().endsWith(".html")) {
      return (
        "/en" +
        (path === "/" ? "" : path) +
        search +
        hash
      );
    }

    if (path.includes("/pages_en/")) {
      return (
        path.replace("/pages_en/", "/pages/") +
        search +
        hash
      );
    }

    if (path.includes("/pages/")) {
      return (
        path.replace("/pages/", "/pages_en/") +
        search +
        hash
      );
    }

    if (path.toLowerCase().endsWith("index_en.html")) {
      return (
        path.replace(/index_en\.html$/i, "index.html") +
        search +
        hash
      );
    }

    if (path.toLowerCase().endsWith("index.html")) {
      return (
        path.replace(/index\.html$/i, "index_en.html") +
        search +
        hash
      );
    }

    if (path.toLowerCase().endsWith("_en.html")) {
      return (
        path.replace(/_en\.html$/i, ".html") +
        search +
        hash
      );
    }

    if (path.toLowerCase().endsWith(".html")) {
      return (
        path.replace(/\.html$/i, "_en.html") +
        search +
        hash
      );
    }

    return (
      (isEn ? "/index.html" : "/index_en.html") +
      search +
      hash
    );
  };

  const langEl = header.querySelector(".oy-header__lang");

  if (langEl) {
    const target = getAltLanguageUrl();

    const docLang = (
      document.documentElement.getAttribute("lang") || ""
    ).toLowerCase();

    const docDir = (
      document.documentElement.getAttribute("dir") || ""
    ).toLowerCase();

    const pathNow = window.location.pathname || "";

    const isEnNow =
      /^\/en(\/|$)/i.test(pathNow) ||
      docLang.startsWith("en") ||
      docDir === "ltr" ||
      pathNow.toLowerCase().includes("/pages_en/") ||
      pathNow.toLowerCase().endsWith("index_en.html");

    langEl.setAttribute("href", target);

    langEl.setAttribute(
      "aria-label",
      isEnNow
        ? "Switch language to Arabic"
        : "Switch language to English"
    );
  }

  const activateSection = (section) => {
    navLinks.forEach((link) => {
      const isActive =
        link.getAttribute("data-nav-section") === section;

      link.classList.toggle(
        "oy-header__link--active",
        isActive
      );

      if (isActive) {
        link.setAttribute("aria-current", "page");
      } else {
        link.removeAttribute("aria-current");
      }
    });
  };

  const setActive = () => {
    const currentPath = normalizePath(
      window.location.pathname
    );

    let matchedSection = null;
    let matchedPathLength = -1;

    navLinks.forEach((link) => {
      const rawHref = link.getAttribute("href") || "";

      try {
        const url = new URL(
          rawHref,
          document.baseURI || window.location.href
        );

        const targetPath = normalizePath(url.pathname);

        if (
          isPathMatch(currentPath, targetPath) &&
          targetPath.length > matchedPathLength
        ) {
          matchedSection =
            link.getAttribute("data-nav-section");

          matchedPathLength = targetPath.length;
        }
      } catch (error) {
      }
    });

    if (matchedSection) {
      activateSection(matchedSection);
      return;
    }

    navLinks.forEach((link) => {
      link.classList.remove("oy-header__link--active");
      link.removeAttribute("aria-current");
    });
  };

  const openMenu = () => {
    header.classList.add("is-menu-open");
    body.classList.add("oy-menu-open");

    if (menuBtn) {
      menuBtn.setAttribute("aria-expanded", "true");
    }

    if (drawer) {
      drawer.setAttribute("aria-hidden", "false");
    }
  };

  const closeMenu = () => {
    header.classList.remove("is-menu-open");
    body.classList.remove("oy-menu-open");

    if (menuBtn) {
      menuBtn.setAttribute("aria-expanded", "false");
    }

    if (drawer) {
      drawer.setAttribute("aria-hidden", "true");
    }
  };

  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      const section =
        link.getAttribute("data-nav-section");

      if (section) {
        activateSection(section);
      }

      closeMenu();
    });
  });

  if (menuBtn) {
    menuBtn.addEventListener("click", () => {
      const isOpen =
        header.classList.contains("is-menu-open");

      if (isOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    });
  }

  closeTriggers.forEach((element) => {
    element.addEventListener("click", closeMenu);
  });

  window.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeMenu();
    }
  });

  const syncHeaderHeight = () => {
    const height = Math.ceil(
      header.getBoundingClientRect().height || 0
    );

    document.documentElement.style.setProperty(
      "--oy-header-h",
      `${height}px`
    );
  };

  syncHeaderHeight();

  window.addEventListener("resize", syncHeaderHeight);
  window.addEventListener("load", syncHeaderHeight);

  if ("ResizeObserver" in window) {
    const resizeObserver = new ResizeObserver(() => {
      syncHeaderHeight();
    });

    resizeObserver.observe(header);
  }

  const applyScrolledState = () => {
    const scrolled = (window.scrollY || 0) > 8;

    header.classList.toggle("is-scrolled", scrolled);

    if (logoImg && logoScrolled) {
      const nextSource =
        scrolled ? logoScrolled : logoDefault;

      if (logoImg.getAttribute("src") !== nextSource) {
        logoImg.setAttribute("src", nextSource);
      }
    }
  };

  applyScrolledState();

  window.addEventListener(
    "scroll",
    applyScrolledState,
    { passive: true }
  );

  window.addEventListener("load", applyScrolledState);
  window.addEventListener("hashchange", setActive);
  window.addEventListener("popstate", setActive);

  setActive();
};