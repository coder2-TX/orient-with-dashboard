<!-- pages_en/partners/partials/hero.html -->
<!-- ORIENT YEMEN - Partners Hero (EN) -->

@php
  use App\Models\PartnersHero;

  $partnersHero = PartnersHero::activeContent();
  $titleEn = PartnersHero::displayValue($partnersHero, 'title_text_en', PartnersHero::DEFAULT_TITLE_EN);
  $leadEn = PartnersHero::displayValue($partnersHero, 'lead_text_en', PartnersHero::DEFAULT_LEAD_EN);
@endphp

<section class="oy-section oy-about oy-partners-hero" id="partners" aria-label="Partners of Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">

      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>{{ $titleEn }}</span>
      </h2>

      <p class="oy-section__text oy-partners-hero__lead oy-reveal oy-delay-2">
        {!! nl2br(e($leadEn)) !!}
      </p>

    </div>
  </div>

  <div class="oy-partners-hero__pattern" aria-hidden="true"></div>
</section>
