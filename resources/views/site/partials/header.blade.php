<!-- partials/header.blade.php -->
<!-- ORIENT YEMEN - Header markup -->

@php
  $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();

  $isEn = $currentRoute && \Illuminate\Support\Str::startsWith($currentRoute, 'site_en.');
  $targetRoute = null;

  if ($currentRoute) {
    if (\Illuminate\Support\Str::startsWith($currentRoute, 'site_en.')) {
      $targetRoute = \Illuminate\Support\Str::replaceFirst('site_en.', 'site.', $currentRoute);
    } elseif (\Illuminate\Support\Str::startsWith($currentRoute, 'site.')) {
      $targetRoute = \Illuminate\Support\Str::replaceFirst('site.', 'site_en.', $currentRoute);
    }
  }

  if ($targetRoute && \Illuminate\Support\Facades\Route::has($targetRoute)) {
    $langSwitchUrl = route($targetRoute);
  } else {
    $path = request()->path();
    $langSwitchUrl = url($path === '' ? '/en' : '/en/' . $path);
  }

  if ($qs = request()->getQueryString()) {
    $langSwitchUrl .= '?' . $qs;
  }

  $isHomeActive =
    request()->routeIs('site.home') ||
    request()->path() === '/';

  $isAboutActive =
    request()->routeIs('site.about*') ||
    request()->is('about', 'about/*');

  $isProductsActive =
    request()->routeIs('site.products*') ||
    request()->is('products', 'products/*');

  $isPartnersActive =
    request()->routeIs('site.partners*') ||
    request()->is('partners', 'partners/*');
@endphp

<header class="oy-header">
  <div class="oy-header__inner">
    <div class="oy-header__start">
      <a
        class="oy-header__logo"
        href="{{ route('site.home') }}"
        aria-label="Orient Yemen"
      >
        <img
          src="{{ asset('assets/images/header/logo.svg') }}"
          data-logo-default="{{ asset('assets/images/header/logo.svg') }}"
          data-logo-scrolled="{{ asset('assets/images/header/logo_white.svg') }}"
          alt="Orient Yemen Logo"
        >
      </a>

      <nav class="oy-header__nav" aria-label="Main Navigation">
        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isHomeActive,
          ])
          data-nav-section="home"
          href="{{ route('site.home') }}#home"
          @if ($isHomeActive) aria-current="page" @endif
        >
          الرئيسية
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isAboutActive,
          ])
          data-nav-section="about"
          href="{{ route('site.about') }}"
          @if ($isAboutActive) aria-current="page" @endif
        >
          من نحن
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isProductsActive,
          ])
          data-nav-section="products"
          href="{{ route('site.products') }}"
          @if ($isProductsActive) aria-current="page" @endif
        >
          منتجاتنا
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isPartnersActive,
          ])
          data-nav-section="partners"
          href="{{ route('site.partners') }}"
          @if ($isPartnersActive) aria-current="page" @endif
        >
          شركاؤنا
        </a>
      </nav>
    </div>

    <div class="oy-header__end">
      <a
        class="oy-header__lang"
        href="{{ $langSwitchUrl }}"
        aria-label="Switch language to English"
      >
        EN
      </a>

      <button
        class="oy-header__menuBtn"
        type="button"
        aria-label="Open menu"
        aria-expanded="false"
      >
        <span class="oy-header__menuIcon" aria-hidden="true"></span>
      </button>

      <a
        class="oy-btn oy-btn--primary oy-header__cta"
        href="{{ route('site.contact') }}"
      >
        تواصل معنا
      </a>
    </div>
  </div>

  <div class="oy-header__drawer" aria-hidden="true">
    <div class="oy-header__drawerOverlay" data-oy-close></div>

    <aside
      class="oy-header__drawerPanel"
      role="dialog"
      aria-modal="true"
      aria-label="القائمة"
    >
      <div class="oy-header__drawerTop">
        <a
          class="oy-header__drawerLogo"
          href="{{ route('site.home') }}"
          aria-label="Orient Yemen"
        >
          <img
            src="{{ asset('assets/images/header/logo.svg') }}"
            alt="Orient Yemen Logo"
          >
        </a>

        <button
          class="oy-header__drawerClose"
          type="button"
          aria-label="Close menu"
          data-oy-close
        >
          ×
        </button>
      </div>

      <nav class="oy-header__drawerNav" aria-label="Mobile Navigation">
        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isHomeActive,
          ])
          data-nav-section="home"
          href="{{ route('site.home') }}#home"
          @if ($isHomeActive) aria-current="page" @endif
        >
          الرئيسية
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isAboutActive,
          ])
          data-nav-section="about"
          href="{{ route('site.about') }}"
          @if ($isAboutActive) aria-current="page" @endif
        >
          من نحن
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isProductsActive,
          ])
          data-nav-section="products"
          href="{{ route('site.products') }}"
          @if ($isProductsActive) aria-current="page" @endif
        >
          منتجاتنا
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isPartnersActive,
          ])
          data-nav-section="partners"
          href="{{ route('site.partners') }}"
          @if ($isPartnersActive) aria-current="page" @endif
        >
          شركاؤنا
        </a>

        <a
          class="oy-header__link"
          href="{{ $langSwitchUrl }}"
          aria-label="Switch language to English"
        >
          EN
        </a>
      </nav>

      <a
        class="oy-btn oy-btn--primary oy-header__drawerCta"
        href="{{ route('site.contact') }}"
      >
        تواصل معنا
      </a>
    </aside>
  </div>
</header>