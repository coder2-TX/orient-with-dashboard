<!-- en/partials/why.html -->
<!-- ORIENT YEMEN - Why Us (EN) -->

@php
  use App\Models\HomeWhy;

  $items = HomeWhy::query()
      ->where('is_active', true)
      ->orderBy('sort_order')
      ->limit(4)
      ->get();

  if ($items->isEmpty()) {
      $items = collect(HomeWhy::defaultItems())
          ->map(fn (array $item) => (object) ['text_en' => $item['text_en']]);
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
