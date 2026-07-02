<!-- pages/partners/partials/hero.html -->
<!-- ORIENT YEMEN - Partners Hero (same style as About section-2) -->

@php
  use App\Models\PartnersHero;

  $partnersHero = PartnersHero::activeContent();
  $titleAr = PartnersHero::displayValue($partnersHero, 'title_text_ar', PartnersHero::DEFAULT_TITLE_AR);
  $leadAr = PartnersHero::displayValue($partnersHero, 'lead_text_ar', PartnersHero::DEFAULT_LEAD_AR);
@endphp

<section class="oy-section oy-about oy-partners-hero" id="partners" aria-label="Partners of Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">

      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>{{ $titleAr }}</span>
      </h2>

      <p class="oy-section__text oy-partners-hero__lead oy-reveal oy-delay-2">
        {!! nl2br(e($leadAr)) !!}
      </p>

    </div>
  </div>

  <div class="oy-partners-hero__pattern" aria-hidden="true"></div>
</section>
