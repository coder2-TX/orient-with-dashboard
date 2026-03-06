<!-- en/partials/why.html -->
<!-- ORIENT YEMEN - Why Us (EN) -->

@php
  use App\Models\HomeWhy;

  $items = HomeWhy::query()
      ->where('is_active', true)
      ->orderBy('sort_order')
      ->limit(4)
      ->get();

  $defaults = [
      'Proven experience — a strong and established journey since 2007.',
      'Regional presence — wide coverage across multiple countries for faster reach.',
      'Flexibility & scalability — operational models that adapt to market changes.',
      'Sustainable partnerships — long-term business relationships built on trust.',
  ];

  if ($items->isEmpty()) {
      $items = collect($defaults)->map(fn ($t) => (object) ['text_en' => $t]);
  }
@endphp

<section class="oy-section oy-why" id="why">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-why__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon oy-why__title-icon" aria-hidden="true"></span>
      Why we’re your first choice
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
                {{ $item->text_en }}
              </p>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
