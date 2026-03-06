{{-- pages_en/partners/partials/section-3.blade.php --}}
{{-- ORIENT YEMEN - Why Partners Choose Us (EN) --}}

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section5.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/partners/section3-overrides.css') }}">
@endpush

@php
  $trust = \App\Models\PartnersTrust::query()
      ->where('is_active', true)
      ->orderBy('sort')
      ->orderByDesc('id')
      ->first();

  $items = data_get($trust, 'items', []);
  $items = is_array($items) ? array_values(array_filter($items)) : [];
@endphp

<section class="oy-section oy-method oy-method--partners" id="why-partners" aria-label="Why Partners Choose Us">
  <div class="oy-section__inner">

    <div class="oy-method__grid">
      <div class="oy-method__heading oy-reveal oy-delay-1" aria-label="Section Heading">
        <h2 class="oy-section__title oy-method__title oy-method__title--white-icon">
          <span class="oy-section__title-icon" aria-hidden="true"></span>
          <span>Partners’ Trust</span>
        </h2>

        <p class="oy-section__text oy-method__subtitle">
          We commit to key factors that make partnership with us more stable and transparent:
        </p>
      </div>

      @forelse($items as $idx => $item)
        @php
          $delay = min(6, $idx + 2);
          $icon  = data_get($item, 'icon');
          $title = data_get($item, 'title_en');
          $desc  = data_get($item, 'desc_en');
        @endphp

        <article class="oy-method-card oy-reveal oy-delay-{{ $delay }}">
          <div class="oy-method-card__icon" aria-hidden="true">
            @if($icon)
              <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($icon) }}" alt="" loading="lazy">
            @endif
          </div>
          <h3 class="oy-method-card__title">{{ $title }}</h3>
          <p class="oy-method-card__desc">{{ $desc }}</p>
        </article>
      @empty
        {{-- fallback --}}
        <article class="oy-method-card oy-reveal oy-delay-2">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-map-location-dot"></i></div>
          <h3 class="oy-method-card__title">Deep expertise</h3>
          <p class="oy-method-card__desc">in the Yemeni market</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-3">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-route"></i></div>
          <h3 class="oy-method-card__title">Distribution network</h3>
          <p class="oy-method-card__desc">covering multiple regions</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-4">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></div>
          <h3 class="oy-method-card__title">High commitment</h3>
          <p class="oy-method-card__desc">to quality and standards</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-5">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-handshake"></i></div>
          <h3 class="oy-method-card__title">Long-term partnerships</h3>
          <p class="oy-method-card__desc">built to last</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-6">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-user-tie"></i></div>
          <h3 class="oy-method-card__title">Clarity & professionalism</h3>
          <p class="oy-method-card__desc">in communication</p>
        </article>
      @endforelse

    </div>

  </div>
</section>
