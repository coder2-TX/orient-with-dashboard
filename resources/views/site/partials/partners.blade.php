<!-- partials/partners.html -->
<!-- ORIENT YEMEN - Partners -->

@php
  use App\Models\HomePartner;
  use Illuminate\Support\Facades\Storage;

  $row = HomePartner::query()
      ->where('is_active', true)
      ->orderBy('sort')
      ->latest('id')
      ->first();

  $subtitle = $row?->subtitle_ar ?: 'نفخر بشراكاتنا مع موردين وشركات عالمية، ونؤمن بأن التكامل هو الأساس لبناء نجاح مستدام.';

  $logos = $row?->logos;
  $logos = is_array($logos) ? array_values(array_filter($logos)) : [];

  $defaultLogos = [
      asset('assets/images/main/partners/logo-01.svg'),
      asset('assets/images/main/partners/logo-10.svg'),
      asset('assets/images/main/partners/logo-02.png'),
      asset('assets/images/main/partners/logo-03.png'),
      asset('assets/images/main/partners/logo-04.png'),
      asset('assets/images/main/partners/logo-05.png'),
      asset('assets/images/main/partners/logo-06.svg'),
      asset('assets/images/main/partners/logo-07.png'),
      asset('assets/images/main/partners/logo-09.png'),
  ];

  $logoUrls = count($logos)
      ? array_map(fn ($p) => Storage::disk('public')->url($p), $logos)
      : $defaultLogos;
@endphp

<section class="oy-section oy-partners" id="partners">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-partners__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      علامات تجارية عالمية نعتز بها
    </h2>

    <p class="oy-section__text oy-partners__subtitle oy-reveal oy-delay-2">
      {{ $subtitle }}
    </p>

    <div class="oy-partners__card oy-reveal oy-delay-3" role="region" aria-label="شعارات الشركاء">
      <div class="oy-partners__marquee">
        <div class="oy-partners__logos">
          @foreach ($logoUrls as $i => $url)
            <img src="{{ $url }}" alt="شعار شريك {{ $i + 1 }}" loading="lazy">
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
