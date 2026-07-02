{{-- pages_en/partners/partials/section-3.blade.php --}}
{{-- ORIENT YEMEN - Why Partners Choose Us (EN) --}}

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section5.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/partners/section3-overrides.css') }}">
@endpush

@php
  use App\Models\PartnersTrust;
  use Illuminate\Support\Facades\Storage;

  $trust = PartnersTrust::activeContent();
  $items = is_array($trust?->items) ? array_values(array_filter($trust->items)) : PartnersTrust::defaultItems();
  $items = array_slice($items, 0, 5);
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

      @foreach($items as $idx => $item)
        @php
          $delay = min(6, $idx + 2);
          $customIcon = data_get($item, 'custom_icon');
          $legacyIcon = data_get($item, 'icon');

          if (! $customIcon && is_string($legacyIcon) && $legacyIcon !== '' && ! str_starts_with($legacyIcon, 'fa-')) {
              $customIcon = $legacyIcon;
          }

          $iconClass = data_get($item, 'icon_class')
              ?: ((is_string($legacyIcon) && str_starts_with($legacyIcon, 'fa-')) ? $legacyIcon : data_get(PartnersTrust::defaultItems(), $idx . '.icon_class', 'fa-solid fa-circle'));

          $title = data_get($item, 'title_en');
          $desc = data_get($item, 'desc_en');
        @endphp

        <article class="oy-method-card oy-reveal oy-delay-{{ $delay }}">
          <div class="oy-method-card__icon" aria-hidden="true">
            @if($customIcon)
              <img src="{{ Storage::disk('public')->url($customIcon) }}" alt="" loading="lazy">
            @else
              <i class="{{ $iconClass }}"></i>
            @endif
          </div>
          <h3 class="oy-method-card__title">{{ $title }}</h3>
          <p class="oy-method-card__desc">{{ $desc }}</p>
        </article>
      @endforeach
    </div>

  </div>
</section>
