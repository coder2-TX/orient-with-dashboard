<!-- en/partials/partners.html -->
<!-- ORIENT YEMEN - Partners (EN) -->

@php
  use App\Models\HomePartner;

  $row = HomePartner::query()
      ->where('is_active', true)
      ->orderBy('sort')
      ->latest('id')
      ->first();

  $subtitle = $row?->subtitle_en ?: HomePartner::DEFAULT_SUBTITLE_EN;
  $logoUrls = $row ? $row->landingLogoUrls() : HomePartner::defaultLogoAssetUrls();
@endphp

<section class="oy-section oy-partners" id="partners">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-partners__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      Global brands we’re proud of
    </h2>

    <p class="oy-section__text oy-partners__subtitle oy-reveal oy-delay-2">
      {{ $subtitle }}
    </p>

    <div class="oy-partners__card oy-reveal oy-delay-3" role="region" aria-label="Partner logos">
      <div class="oy-partners__marquee">
        <div class="oy-partners__logos">
          @foreach ($logoUrls as $i => $url)
            <img src="{{ $url }}" alt="Partner logo {{ $i + 1 }}" loading="lazy" decoding="async" width="220" height="120">
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
