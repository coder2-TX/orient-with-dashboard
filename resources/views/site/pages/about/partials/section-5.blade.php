<!-- pages/about/partials/section-5.blade.php -->
<!-- ORIENT YEMEN - Methodology -->

@php
  use App\Models\AboutMethodology;
  use Illuminate\Support\Facades\Storage;

  $method = AboutMethodology::activeContent();
  $items  = is_array($method?->items) ? array_slice($method->items, 0, 5) : AboutMethodology::defaultItems();
@endphp

<section class="oy-section oy-method" id="methodology" aria-label="Work Methodology">
  <div class="oy-section__inner">

    <div class="oy-method__grid">
      <div class="oy-method__heading oy-reveal oy-delay-1" aria-label="Section Heading">
        <h2 class="oy-section__title oy-method__title oy-method__title--white-icon">
          <span class="oy-section__title-icon" aria-hidden="true"></span>
          <span>منهجية العمل</span>
        </h2>

        <p class="oy-section__text oy-method__subtitle">
          تعتمد أورينت يمن في عملها على منهجية متكاملة تقوم على:
        </p>
      </div>

      @foreach($items as $i => $item)
        @php
          $customIcon = $item['custom_icon'] ?? null;
          $iconClass = $item['icon_class'] ?? 'fa-solid fa-circle';
        @endphp

        <article class="oy-method-card oy-reveal oy-delay-{{ 2 + $i }}">
          <div class="oy-method-card__icon" aria-hidden="true">
            @if(!empty($customIcon))
              <img
                src="{{ Storage::disk('public')->url($customIcon) }}"
                alt="{{ $item['title_ar'] ?? 'Icon' }}"
                loading="lazy"
                style="width:36px;height:36px;object-fit:contain;"
              >
            @else
              <i class="{{ $iconClass }}"></i>
            @endif
          </div>

          <h3 class="oy-method-card__title">{{ $item['title_ar'] ?? '' }}</h3>
          <p class="oy-method-card__desc">{{ $item['desc_ar'] ?? '' }}</p>
        </article>
      @endforeach
    </div>

  </div>
</section>
