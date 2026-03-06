<!-- partials/services.html -->
<!-- ORIENT YEMEN - Services Section -->

@php
  use App\Models\HomeService;

  $record = HomeService::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $defaultIntro = 'نقدّم منظومة متكاملة من الخدمات التي تغطي مختلف مراحل عمل المنتج:';

  $defaultItems = [
    ['icon' => 'assets/images/main/service%20icon/Import.svg',        'title' => 'استيراد بمعايير عالمية'],
    ['icon' => 'assets/images/main/service%20icon/Strategy.svg',      'title' => 'التسويق التجاري الذكي'],
    ['icon' => 'assets/images/main/service%20icon/Distribution.svg',  'title' => 'دعم التوزيع والتواجد'],
    ['icon' => 'assets/images/main/service%20icon/Branding.svg',      'title' => 'تطوير الهوية التجارية'],
  ];

  $intro = $record?->intro['ar'] ?? null;

  $items = is_array($record?->items) ? array_values(array_filter($record->items)) : [];
  // لو ما فيه عناصر من DB نرجع الافتراضي
  $itemsToRender = count($items) ? $items : $defaultItems;

  $toUrl = function ($path) {
      if (!is_string($path) || $path === '') return '';
      // لو الرابط جاهز (http/https أو /storage)
      if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
          return $path;
      }
      // مسار مخزن من disk public مثل: home/services/icons/xxx.svg
      return "/storage/{$path}";
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
          $delay = min($i + 1, 4); // نحافظ على نفس ستايل التأخير
          $title = is_array($item['title'] ?? null) ? ($item['title']['ar'] ?? '') : ($item['title'] ?? '');
          $icon  = $item['icon'] ?? '';
          $src   = str_contains($icon, 'assets/images/') ? $icon : $toUrl($icon);
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

  <!--  Right-top pattern (allowed to bleed upward outside the section) -->
  <div class="oy-services__pattern" aria-hidden="true"></div>
</section>
