<!-- partials/services.html -->
<!-- ORIENT YEMEN - Services Section -->

@php
  use App\Models\HomeService;
  use Illuminate\Support\Facades\Storage;

  $record = HomeService::managedRecord();
  $useDashboardContent = (bool) ($record?->is_active);

  $defaultIntro = HomeService::defaultIntro()['ar'];
  $defaultItems = HomeService::defaultItems();

  $intro = $useDashboardContent ? ($record?->intro['ar'] ?? null) : null;

  $items = $useDashboardContent && is_array($record?->items)
      ? array_values(array_filter($record->items))
      : [];

  $itemsToRender = count($items) ? $items : $defaultItems;

  $toUrl = function ($path) {
      if (! is_string($path) || $path === '') {
          return '';
      }

      if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
          return $path;
      }

      if (str_starts_with($path, '/assets/')) {
          return asset(ltrim($path, '/'));
      }

      if (str_starts_with($path, 'assets/')) {
          return asset($path);
      }

      if (str_starts_with($path, '/storage/')) {
          return $path;
      }

      return Storage::disk('public')->url($path);
  };
@endphp

<section class="oy-section oy-services" id="services">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      ماذا نقدم؟
    </h2>

    <p class="oy-section__text oy-reveal oy-delay-2">
      {{ $intro ?: $defaultIntro }}
    </p>

    <div class="oy-services__grid">
      @foreach ($itemsToRender as $i => $item)
        @php
          $delay = min($i + 1, 4);
          $title = is_array($item['title'] ?? null) ? ($item['title']['ar'] ?? '') : ($item['title'] ?? '');
          $icon = $item['icon'] ?? '';
          $src = $toUrl($icon);
        @endphp

        <article class="oy-service oy-reveal oy-delay-{{ $delay }}">
          <div class="oy-service__icon">
            <img src="{{ $src }}" alt="{{ $title ?: 'خدمة' }}">
          </div>
          <h3 class="oy-service__title">{{ $title }}</h3>
        </article>
      @endforeach
    </div>
  </div>

  <div class="oy-services__pattern" aria-hidden="true"></div>
</section>
