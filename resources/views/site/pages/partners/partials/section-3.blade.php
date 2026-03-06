{{-- pages/partners/partials/section-3.blade.php --}}
{{-- ORIENT YEMEN - Why Partners Choose Us (same layout as About Methodology) --}}

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
      <!-- Title slot -->
      <div class="oy-method__heading oy-reveal oy-delay-1" aria-label="Section Heading">
        <h2 class="oy-section__title oy-method__title oy-method__title--white-icon">
          <span class="oy-section__title-icon" aria-hidden="true"></span>
          <span>ثقة شركائنا</span>
        </h2>

        <p class="oy-section__text oy-method__subtitle">
          نلتزم بعوامل تجعل الشراكة معنا أكثر ثباتًا ووضوحًا:
        </p>
      </div>

      @forelse($items as $idx => $item)
        @php
          $delay = min(6, $idx + 2);
          $icon  = data_get($item, 'icon');
          $title = data_get($item, 'title_ar');
          $desc  = data_get($item, 'desc_ar');
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
        {{-- fallback نفس القديم لو ما في بيانات --}}
        <article class="oy-method-card oy-reveal oy-delay-2">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-map-location-dot"></i></div>
          <h3 class="oy-method-card__title">خبرة عميقة</h3>
          <p class="oy-method-card__desc">بالسوق اليمني</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-3">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-route"></i></div>
          <h3 class="oy-method-card__title">شبكة توزيع</h3>
          <p class="oy-method-card__desc">فعّالة تغطي عدة مناطق</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-4">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></div>
          <h3 class="oy-method-card__title">التزام عالي</h3>
          <p class="oy-method-card__desc">بالجودة والمعايير</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-5">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-handshake"></i></div>
          <h3 class="oy-method-card__title">شراكات طويلة</h3>
          <p class="oy-method-card__desc">المدى</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-6">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-user-tie"></i></div>
          <h3 class="oy-method-card__title">وضوح واحترافية</h3>
          <p class="oy-method-card__desc">في التعامل</p>
        </article>
      @endforelse

    </div>

  </div>
</section>
