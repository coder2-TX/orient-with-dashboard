// assets/js/pages/contact.js
// ORIENT YEMEN - Contact page partials loader + scroll reveal

(function () {
  const safeFetch = (url) =>
    fetch(url).then(r => (r.ok ? r.text() : "")).catch(() => "");

  //  Support AR/EN by reading base dirs from window (with safe defaults)
  const partialsBase = String(window.OY_PARTIALS_DIR || "partials").replace(/\/+$/, "");
  const contactPartialsBase = String(window.OY_CONTACT_PARTIALS_DIR || "pages/contact/partials").replace(/\/+$/, "");

  //  Detect EN (works even if window vars not set)
  const htmlLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
  const path = (window.location.pathname || "").toLowerCase();
  const isEn =
    htmlLang.startsWith("en") ||
    path.includes("/pages_en/") ||
    path.endsWith("/index_en.html") ||
    path.includes("index_en.html") ||
    window.OY_LANG === "en";

  const slots = [
    { slot: "header-slot",    url: `${partialsBase}/header.html` },
    { slot: "hero-slot",      url: `${contactPartialsBase}/hero.html` },
    { slot: "section-2-slot", url: `${contactPartialsBase}/section-2.html` }, // optional later
    { slot: "section-3-slot", url: `${contactPartialsBase}/section-3.html` }, // optional later
    { slot: "footer-slot",    url: `${partialsBase}/footer.html` },
  ];

  function patchHeaderForContactPage() {
    const header = document.querySelector(".oy-header");
    if (!header) return;

    const homeHref    = isEn ? "index_en.html" : "index.html";
    const aboutHref   = isEn ? "pages_en/about/index.html" : "pages/about/index.html";
    const contactHref = isEn ? "pages_en/contact/index.html" : "pages/contact/index.html";

    // Logo -> home
    const logo = header.querySelector(".oy-header__logo");
    if (logo) logo.setAttribute("href", homeHref);

    // Nav: convert hash links to home anchors + keep About link correct (AR/EN)
    const navLinks = header.querySelectorAll(".oy-header__nav .oy-header__link");
    navLinks.forEach(a => {
      const href = a.getAttribute("href") || "";
      a.classList.remove("oy-header__link--active");

      if (href.startsWith("#")) a.setAttribute("href", homeHref + href);

      // Keep About link going to About page (optional consistency)
      const text = (a.textContent || "").trim();
      const isAboutAr = text === "من نحن";
      const isAboutEn = text.toLowerCase() === "about";
      if (isAboutAr || isAboutEn) a.setAttribute("href", aboutHref);
    });

    // CTA -> contact page (this page)
    const cta = header.querySelector(".oy-header__cta");
    if (cta) cta.setAttribute("href", contactHref);
  }

  // ============================
  // Scroll Reveal (same style)
  // ============================
  function initScrollReveal() {
    const elements = Array.from(document.querySelectorAll(".oy-reveal"));
    if (!elements.length) return;

    const show = (el) => el.classList.add("oy-reveal--visible");

    const reduceMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (reduceMotion) {
      elements.forEach(show);
      return;
    }

    if ("IntersectionObserver" in window) {
      const io = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            show(entry.target);
            obs.unobserve(entry.target);
          }
        });
      }, {
        root: null,
        threshold: 0.12,
        rootMargin: "0px 0px -100px 0px"
      });

      elements.forEach(el => io.observe(el));
      return;
    }

    const check = () => {
      const vh = window.innerHeight || 0;
      elements.forEach(el => {
        if (el.classList.contains("oy-reveal--visible")) return;
        const top = el.getBoundingClientRect().top;
        if (top < vh - 100) show(el);
      });
    };

    window.addEventListener("scroll", check, { passive: true });
    window.addEventListener("resize", check);
    window.addEventListener("load", check);
    check();
  }

  function initWhatsAppContactForm() {
    const form = document.querySelector(".oy-contact__formWrap .oy-form");
    if (!form) return;

    const rawPhone = (form.getAttribute("data-wa-phone") || "967778080700").toString();
    const waPhone = rawPhone.replace(/\D/g, "");

    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const fd = new FormData(form);

      const fullName = (fd.get("full_name") || "").toString().trim();
      const email    = (fd.get("email") || "").toString().trim();
      const phone    = (fd.get("phone") || "").toString().trim();
      const subject  = (fd.get("subject") || "").toString().trim();
      const message  = (fd.get("message") || "").toString().trim();

      if (!message) {
        const msgEl = form.querySelector("#message");
        if (msgEl) msgEl.focus();
        return;
      }

      const lines = [];

      //  Labels switch by language
      if (isEn) {
        if (fullName) lines.push(`Name: ${fullName}`);
        if (email)    lines.push(`Email: ${email}`);
        if (phone)    lines.push(`Phone: ${phone}`);
        if (subject)  lines.push(`Subject: ${subject}`);
        lines.push(`Message:\n${message}`);
      } else {
        if (fullName) lines.push(`الاسم: ${fullName}`);
        if (email)    lines.push(`البريد: ${email}`);
        if (phone)    lines.push(`الهاتف: ${phone}`);
        if (subject)  lines.push(`الموضوع: ${subject}`);
        lines.push(`الرسالة:\n${message}`);
      }

      const text = lines.join("\n");
      const url = `https://wa.me/${waPhone}?text=${encodeURIComponent(text)}`;

      const w = window.open(url, "_blank");
      if (w) w.opener = null;
    });
  }

  Promise.all(slots.map(s => safeFetch(s.url))).then((htmlParts) => {
    htmlParts.forEach((html, i) => {
      const el = document.getElementById(slots[i].slot);
      if (el) el.innerHTML = html || "";
    });

    if (window.initHeader) window.initHeader();
    patchHeaderForContactPage();

    // مهم: بعد ما تنحقن الـ partials
    initScrollReveal();
    initWhatsAppContactForm();
  });
})();
