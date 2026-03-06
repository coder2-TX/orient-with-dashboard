<!-- en/partials/services.html -->
<!-- ORIENT YEMEN - Services Section (EN) -->

@php
  use App\Models\HomeService;

  $record = HomeService::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $defaultIntro = "We provide an integrated set of services covering every stage of a product’s journey:";

  $defaultItems = [
    ['icon' => '/assets/images/main/service%20icon/Import.svg',        'title' => 'World-class importing'],
    ['icon' => '/assets/images/main/service%20icon/Strategy.svg',      'title' => 'Smart trade marketing'],
    ['icon' => '/assets/images/main/service%20icon/Distribution.svg',  'title' => 'Distribution & presence support'],
    ['icon' => '/assets/images/main/service%20icon/Branding.svg',      'title' => 'Brand identity development'],
  ];

  $intro = $record?->intro['en'] ?? null;

  $items = is_array($record?->items) ? array_values(array_filter($record->items)) : [];
  $itemsToRender = count($items) ? $items : $defaultItems;

  $toUrl = function ($path) {
      if (!is_string($path) || $path === '') return '';
      if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
          return $path;
      }
      return "/storage/{$path}";
  };
@endphp

<section class="oy-section oy-services" id="services">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      What do we offer?
    </h2>

    <p class="oy-section__text oy-reveal oy-delay-2">
      {{ $intro ?: $defaultIntro }}
    </p>

    <div class="oy-services__grid">
      @foreach ($itemsToRender as $i => $item)
        @php
          $delay = min($i + 1, 4);
          $title = is_array($item['title'] ?? null) ? ($item['title']['en'] ?? '') : ($item['title'] ?? '');
          $icon  = $item['icon'] ?? '';
          $src   = str_contains($icon, '/assets/images/') ? $icon : $toUrl($icon);
        @endphp

        <article class="oy-service oy-reveal oy-delay-{{ $delay }}">
          <div class="oy-service__icon">
            <img src="{{ $src }}" alt="{{ $title ?: 'Service' }}">
          </div>
          <h3 class="oy-service__title">{{ $title }}</h3>
        </article>
      @endforeach
    </div>
  </div>

  <div class="oy-services__pattern" aria-hidden="true"></div>
</section>
