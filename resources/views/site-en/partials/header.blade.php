<!-- partials_en/header.blade.php -->
<!-- ORIENT YEMEN - Header markup (EN) -->

@php
  $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();

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
    $path = preg_replace('#^en/?#', '', $path);
    $langSwitchUrl = url($path === '' ? '/' : '/' . $path);
  }

  if ($qs = request()->getQueryString()) {
    $langSwitchUrl .= '?' . $qs;
  }

  $isHomeActive =
    request()->routeIs('site_en.home') ||
    request()->is('en');

  $isAboutActive =
    request()->routeIs('site_en.about*') ||
    request()->is('en/about', 'en/about/*');

  $isProductsActive =
    request()->routeIs('site_en.products*') ||
    request()->is('en/products', 'en/products/*');

  $isPartnersActive =
    request()->routeIs('site_en.partners*') ||
    request()->is('en/partners', 'en/partners/*');
@endphp

<header class="oy-header">
  <div class="oy-header__inner">
    <div class="oy-header__start">
      <a
        class="oy-header__logo"
        href="{{ route('site_en.home') }}"
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
          href="{{ route('site_en.home') }}#home"
          @if ($isHomeActive) aria-current="page" @endif
        >
          Home
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isAboutActive,
          ])
          data-nav-section="about"
          href="{{ route('site_en.about') }}"
          @if ($isAboutActive) aria-current="page" @endif
        >
          About
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isProductsActive,
          ])
          data-nav-section="products"
          href="{{ route('site_en.products') }}"
          @if ($isProductsActive) aria-current="page" @endif
        >
          Products
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isPartnersActive,
          ])
          data-nav-section="partners"
          href="{{ route('site_en.partners') }}"
          @if ($isPartnersActive) aria-current="page" @endif
        >
          Partners
        </a>
      </nav>
    </div>

    <div class="oy-header__end">
      <a
        class="oy-header__lang"
        href="{{ $langSwitchUrl }}"
        aria-label="Switch language to Arabic"
      >
        AR
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
        href="{{ route('site_en.contact') }}"
      >
        Contact
      </a>
    </div>
  </div>

  <div class="oy-header__drawer" aria-hidden="true">
    <div class="oy-header__drawerOverlay" data-oy-close></div>

    <aside
      class="oy-header__drawerPanel"
      role="dialog"
      aria-modal="true"
      aria-label="Menu"
    >
      <div class="oy-header__drawerTop">
        <a
          class="oy-header__drawerLogo"
          href="{{ route('site_en.home') }}"
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
          href="{{ route('site_en.home') }}#home"
          @if ($isHomeActive) aria-current="page" @endif
        >
          Home
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isAboutActive,
          ])
          data-nav-section="about"
          href="{{ route('site_en.about') }}"
          @if ($isAboutActive) aria-current="page" @endif
        >
          About
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isProductsActive,
          ])
          data-nav-section="products"
          href="{{ route('site_en.products') }}"
          @if ($isProductsActive) aria-current="page" @endif
        >
          Products
        </a>

        <a
          @class([
            'oy-header__link',
            'oy-header__link--active' => $isPartnersActive,
          ])
          data-nav-section="partners"
          href="{{ route('site_en.partners') }}"
          @if ($isPartnersActive) aria-current="page" @endif
        >
          Partners
        </a>

        <a
          class="oy-header__link"
          href="{{ $langSwitchUrl }}"
          aria-label="Switch language to Arabic"
        >
          AR
        </a>
      </nav>

      <a
        class="oy-btn oy-btn--primary oy-header__drawerCta"
        href="{{ route('site_en.contact') }}"
      >
        Contact
      </a>
    </aside>
  </div>
</header>