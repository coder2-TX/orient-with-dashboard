@php
  use App\Models\HomeHero;
  use Illuminate\Support\Facades\Storage;

  $hero = HomeHero::query()
    ->where('is_active', true)
    ->latest('id')
    ->first();

  $years = (int) ($hero?->experience_years ?? 15);

  $title = $hero?->title['en'] ?? 'ORIENT YEMEN';
  $tagline = $hero?->tagline['en'] ?? 'Partnerships that shape the future';
  $subtitle = 'Over ' . $years . ' years of experience';

  $defaultSlides = [
    asset('assets/images/main/hero/1.png'),
    asset('assets/images/main/hero/2.png'),
    asset('assets/images/main/hero/3.png'),
    asset('assets/images/main/hero/4.png'),
    asset('assets/images/main/hero/5.png'),
    asset('assets/images/main/hero/6.png'),
  ];

  $dbSlides = is_array($hero?->slides) ? array_values(array_filter($hero->slides)) : [];

  $slides = count($dbSlides) > 0
    ? array_map(fn ($path) => Storage::url($path), $dbSlides)
    : $defaultSlides;
@endphp

<section class="oy-hero" id="home" aria-label="Hero Slider">
  <div class="oy-hero__slides">
    @foreach($slides as $i => $url)
      <div class="oy-hero__slide {{ $i === 0 ? 'is-active' : '' }}"
           style="background-image:url('{{ $url }}')"></div>
    @endforeach
  </div>

  <div class="oy-hero__overlay" aria-hidden="true"></div>

  <div class="oy-hero__content">
    <div class="oy-hero__content-inner">
      <h1 class="oy-hero-title oy-reveal oy-delay-1">{{ $title }}</h1>

      <div class="oy-hero__h2 oy-reveal oy-delay-2">
        <span class="oy-hero__h2-icon" aria-hidden="true"></span>
        <span>{{ $subtitle }}</span>
      </div>

      <div class="oy-hero__h3 oy-reveal oy-delay-3">{{ $tagline }}</div>

      <div class="oy-hero__controls oy-reveal oy-delay-4" aria-label="Slider Controls">
        <button class="oy-hero__arrow oy-hero__arrow--prev" type="button" aria-label="Previous">
          <i class="fa-solid fa-chevron-left"></i>
        </button>

        <div class="oy-hero__dots" role="tablist" aria-label="Slider Dots">
          @foreach($slides as $i => $url)
            <button class="oy-hero__dot {{ $i === 0 ? 'is-active' : '' }}"
                    type="button"
                    aria-label="Slide {{ $i + 1 }}"
                    data-index="{{ $i }}"></button>
          @endforeach
        </div>

        <button class="oy-hero__arrow oy-hero__arrow--next" type="button" aria-label="Next">
          <i class="fa-solid fa-chevron-right"></i>
        </button>
      </div>
    </div>
  </div>
</section>
