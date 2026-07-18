{{-- resources/views/site/pages/contact/partials/hero.blade.php --}}

@php
  use App\Models\ContactHero;

  $contactHero = ContactHero::activeContent();
  $heroImage = $contactHero->imageUrlFor('ar');
@endphp

<section
  class="oy-hero oy-hero--ar oy-hero--contact"
  id="contact-hero"
  dir="rtl"
  aria-label="Contact Hero"
>
  <div class="oy-hero__slides">
    <div
      class="oy-hero__slide is-active"
      style="background-image: url('{{ $heroImage }}')"
    ></div>
  </div>

  <div
    class="oy-hero__overlay"
    aria-hidden="true"
  ></div>

  <div class="oy-hero__content">
    <div class="oy-hero__content-inner">
      <h1 class="oy-hero-title oy-reveal oy-delay-1">
        {{ $contactHero->title_ar }}
      </h1>

      <div class="oy-hero__h2 oy-reveal oy-delay-2">
        <span
          class="oy-hero__h2-icon"
          aria-hidden="true"
        ></span>

        <span>{{ $contactHero->pre_ar }}</span>
      </div>

      <div class="oy-hero__h3 oy-reveal oy-delay-3">
        <span class="oy-hero__h3-text">
          {{ $contactHero->company_ar }}
        </span>
      </div>
    </div>
  </div>
</section>
