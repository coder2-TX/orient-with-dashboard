<!-- partials/why.html -->
<!-- ORIENT YEMEN - Why Us -->

@php
  use App\Models\HomeWhy;

  $items = HomeWhy::query()
      ->where('is_active', true)
      ->orderBy('sort_order')
      ->limit(4)
      ->get();

  $defaults = [
      'خبرة عريقة مسيرة ممتدة وراسخة منذ عام 2007.',
      'حضور إقليمي تغطية واسعة في عدة دول لضمان وصول أسرع.',
      'مرونة وتوسّع آليات عمل قابلة للتكيف مع متغيرات السوق.',
      'شراكات مستدامة علاقات تجارية طويلة الأمد مبنية على الثقة.',
  ];

  if ($items->isEmpty()) {
      $items = collect($defaults)->map(fn ($t) => (object) ['text_ar' => $t]);
  }
@endphp

<section class="oy-section oy-why" id="why">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-why__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon oy-why__title-icon" aria-hidden="true"></span>
      لماذا نحن خياركم الأول؟
    </h2>

    <div class="oy-why__grid" role="list">
      @foreach($items as $i => $item)
        @php $delay = min($i + 1, 4); @endphp

        <article class="oy-why__item oy-reveal oy-delay-{{ $delay }}" role="listitem">
          <div class="oy-whybox">
            <div class="oy-whybox__badge-outer" aria-hidden="true"></div>
            <div class="oy-whybox__badge-inner" aria-hidden="true"></div>
            <div class="oy-whybox__badge-pattern" aria-hidden="true"></div>

            <div class="oy-whybox__card">
              <p class="oy-whybox__text">
                {{ $item->text_ar }}
              </p>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
