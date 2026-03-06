<!-- pages_en/about/partials/section-5.blade.php -->
<!-- ORIENT YEMEN - Methodology (EN) -->

@php
  use App\Models\AboutMethodology;

  $method = AboutMethodology::query()->where('is_active', true)->latest('id')->first();
  $items  = is_array($method?->items) ? array_slice($method->items, 0, 5) : [];
@endphp

<section class="oy-section oy-method" id="methodology" aria-label="Work Methodology">
  <div class="oy-section__inner">

    <div class="oy-method__grid">
      <!-- Title slot (FIXED) -->
      <div class="oy-method__heading oy-reveal oy-delay-1" aria-label="Section Heading">
        <h2 class="oy-section__title oy-method__title oy-method__title--white-icon">
          <span class="oy-section__title-icon" aria-hidden="true"></span>
          <span>Work Methodology</span>
        </h2>

        <p class="oy-section__text oy-method__subtitle">
          At Orient Yemen, our work is built on an integrated methodology based on:
        </p>
      </div>

      @if(count($items))
        @foreach($items as $i => $item)
          <article class="oy-method-card oy-reveal oy-delay-{{ 2 + $i }}">
            <div class="oy-method-card__icon" aria-hidden="true">
              @if(!empty($item['icon']))
                <img
                  src="{{ \Illuminate\Support\Facades\Storage::url($item['icon']) }}"
                  alt="{{ $item['title_en'] ?? 'Icon' }}"
                  loading="lazy"
                  style="width:36px;height:36px;object-fit:contain;"
                >
              @else
                <i class="fa-solid fa-circle"></i>
              @endif
            </div>

            <h3 class="oy-method-card__title">{{ $item['title_en'] ?? '' }}</h3>
            <p class="oy-method-card__desc">{{ $item['desc_en'] ?? '' }}</p>
          </article>
        @endforeach
      @else
        {{-- Fallback القديم --}}
        <article class="oy-method-card oy-reveal oy-delay-2">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
          <h3 class="oy-method-card__title">Market research</h3>
          <p class="oy-method-card__desc">before launching any product</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-3">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-people-group"></i></div>
          <h3 class="oy-method-card__title">Selecting partnerships</h3>
          <p class="oy-method-card__desc">with great care</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-4">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-diagram-project"></i></div>
          <h3 class="oy-method-card__title">Structured planning</h3>
          <p class="oy-method-card__desc">for market entry</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-5">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-chart-line"></i></div>
          <h3 class="oy-method-card__title">Continuous follow-up</h3>
          <p class="oy-method-card__desc">on product performance</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-6">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-handshake"></i></div>
          <h3 class="oy-method-card__title">Long-term relationships</h3>
          <p class="oy-method-card__desc">with partners and customers</p>
        </article>
      @endif
    </div>

  </div>
</section>
