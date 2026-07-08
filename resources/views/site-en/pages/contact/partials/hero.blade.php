<!-- pages_en/contact/partials/hero.blade.php -->
<!-- ORIENT YEMEN - Contact hero (EN) -->

@php
  use App\Models\ContactHero;
  use Illuminate\Support\Facades\Storage;

  $contactHero = ContactHero::activeContent();

  $heroImage = filled($contactHero->hero_image)
      ? Storage::disk('public')->url($contactHero->hero_image)
      : asset('assets/images/main/hero/1.png');
@endphp

<section class="oy-hero oy-hero--contact" id="contact-hero" aria-label="Contact Hero">
  <div class="oy-hero__slides">
    <div class="oy-hero__slide is-active" style="background-image:url('{{ $heroImage }}')"></div>
  </div>

  <div class="oy-hero__overlay" aria-hidden="true"></div>

  <div class="oy-hero__content">
    <div class="oy-hero__content-inner">
      <h1 class="oy-hero-title oy-reveal oy-delay-1">
        {{ $contactHero->title_en }}
      </h1>

      <div class="oy-contact-hero__row oy-reveal oy-delay-2">
        <span class="oy-hero__h2-icon" aria-hidden="true"></span>
        <span class="oy-contact-hero__pre">{{ $contactHero->pre_en }}</span>
        <div class="oy-hero__h3 oy-contact-hero__h3">{{ $contactHero->company_en }}</div>
      </div>
    </div>
  </div>
</section>