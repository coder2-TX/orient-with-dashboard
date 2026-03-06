<!-- pages_en/partners/partials/hero.html -->
<!-- ORIENT YEMEN - Partners Hero (EN) -->

@php
  $partnersHero = \App\Models\PartnersHero::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $leadEn = $partnersHero?->lead_text_en;
@endphp

<section class="oy-section oy-about oy-partners-hero" id="partners" aria-label="Partners of Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">

      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>Our Partners</span>
      </h2>

      <p class="oy-section__text oy-partners-hero__lead oy-reveal oy-delay-2">
        {!! nl2br(e($leadEn ?? 'At Orient Yemen, we believe strong partnerships are the foundation of success and continuity.
We are proud to collaborate with partners who share our values of quality, reliability, and commitment to serving the market.')) !!}
      </p>

    </div>
  </div>

  <div class="oy-partners-hero__pattern" aria-hidden="true"></div>
</section>
