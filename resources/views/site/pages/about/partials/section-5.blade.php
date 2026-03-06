<!-- pages/about/partials/section-5.blade.php -->
<!-- ORIENT YEMEN - Methodology -->

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
          <span>منهجية العمل</span>
        </h2>

        <p class="oy-section__text oy-method__subtitle">
          تعتمد أورينت يمن في عملها على منهجية متكاملة تقوم على:
        </p>
      </div>

      @if(count($items))
        @foreach($items as $i => $item)
          <article class="oy-method-card oy-reveal oy-delay-{{ 2 + $i }}">
            <div class="oy-method-card__icon" aria-hidden="true">
              @if(!empty($item['icon']))
                <img
                  src="{{ \Illuminate\Support\Facades\Storage::url($item['icon']) }}"
                  alt="{{ $item['title_ar'] ?? 'Icon' }}"
                  loading="lazy"
                  style="width:36px;height:36px;object-fit:contain;"
                >
              @else
                <i class="fa-solid fa-circle"></i>
              @endif
            </div>

            <h3 class="oy-method-card__title">{{ $item['title_ar'] ?? '' }}</h3>
            <p class="oy-method-card__desc">{{ $item['desc_ar'] ?? '' }}</p>
          </article>
        @endforeach
      @else
        {{-- Fallback القديم إذا ما فيش بيانات --}}
        <article class="oy-method-card oy-reveal oy-delay-2">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
          <h3 class="oy-method-card__title">دراسة الأسواق</h3>
          <p class="oy-method-card__desc">قبل دخول أي منتج</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-3">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-people-group"></i></div>
          <h3 class="oy-method-card__title">اختيار الشراكات</h3>
          <p class="oy-method-card__desc">التجارية بعناية</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-4">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-diagram-project"></i></div>
          <h3 class="oy-method-card__title">التخطيط المنظّم</h3>
          <p class="oy-method-card__desc">لدخول المنتجات</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-5">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-chart-line"></i></div>
          <h3 class="oy-method-card__title">المتابعة المستمرة</h3>
          <p class="oy-method-card__desc">لأداء المنتجات</p>
        </article>

        <article class="oy-method-card oy-reveal oy-delay-6">
          <div class="oy-method-card__icon" aria-hidden="true"><i class="fa-solid fa-handshake"></i></div>
          <h3 class="oy-method-card__title">علاقات طويلة الأمد</h3>
          <p class="oy-method-card__desc">مع الشركاء والعملاء</p>
        </article>
      @endif
    </div>

  </div>
</section>
