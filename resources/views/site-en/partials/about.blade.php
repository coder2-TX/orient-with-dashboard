<!-- en/partials/about.html -->
<!-- ORIENT YEMEN - About section (EN) -->
@php
  use App\Models\HomeAbout;

  $about = HomeAbout::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $text = $about?->body['en'] ?? HomeAbout::DEFAULT_BODY_EN;
@endphp

<section class="oy-section oy-about" id="about" aria-label="About Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">
      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>About Orient Yemen</span>
      </h2>

      <p class="oy-section__text oy-reveal oy-delay-2">{!! nl2br(e($text)) !!}</p>
    </div>
  </div>

  <!-- Full-height side pattern (bleeds outside section padding intentionally) -->
  <div class="oy-about__pattern" aria-hidden="true"></div>
</section>
