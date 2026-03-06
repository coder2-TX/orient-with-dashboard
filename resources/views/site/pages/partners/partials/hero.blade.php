<!-- pages/partners/partials/hero.html -->
<!-- ORIENT YEMEN - Partners Hero (same style as About section-2) -->

@php
  $partnersHero = \App\Models\PartnersHero::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $leadAr = $partnersHero?->lead_text_ar;
@endphp

<section class="oy-section oy-about oy-partners-hero" id="partners" aria-label="Partners of Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">

      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>شركاؤنا</span>
      </h2>

      <p class="oy-section__text oy-partners-hero__lead oy-reveal oy-delay-2">
        {!! nl2br(e($leadAr ?? 'نؤمن في أورينت يمن أن الشراكات القوية هي أساس النجاح والاستمرارية.
نفخر بتعاوننا مع مجموعة من الشركاء الذين يشاركوننا نفس القيم في الجودة، الموثوقية، والالتزام بخدمة السوق.')) !!}
      </p>

    </div>
  </div>

  <div class="oy-partners-hero__pattern" aria-hidden="true"></div>
</section>
