<!-- pages_en/about/partials/section-2.blade.php -->
<!-- ORIENT YEMEN - About section (EN) -->

@php
  use App\Models\AboutOrientYemen;

  $about = AboutOrientYemen::activeContent();
  $branches = AboutOrientYemen::normalizeBranches($about?->branches);
@endphp

<section class="oy-section oy-about oy-about-page" id="about" aria-label="About Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">

      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>{{ $about->title_en }}</span>
      </h2>

      @if(filled($about->lead_en))
        <p class="oy-section__text oy-about-page__lead oy-reveal oy-delay-2">
          {{ $about->lead_en }}
        </p>
      @endif

      @if(filled($about->paragraph_1_en))
        <p class="oy-section__text oy-reveal oy-delay-3">
          {{ $about->paragraph_1_en }}
        </p>
      @endif

      @if(filled($about->paragraph_2_en))
        <p class="oy-section__text oy-reveal oy-delay-4">
          {{ $about->paragraph_2_en }}
        </p>
      @endif

      @if(!empty($branches))
        <div class="oy-about-page__branches oy-reveal oy-delay-5" aria-label="Company Branches">
          <div class="oy-about-page__branches-row">
            <span class="oy-about-page__branches-label">{{ $about->branches_label_en }}</span>

            <span class="oy-about-page__branches-items">
              @foreach($branches as $branch)
                @if(filled($branch['name_en'] ?? null))
                  <span class="oy-about-page__branch">
                    <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                    <span>{{ $branch['name_en'] }}</span>
                  </span>
                @endif
              @endforeach
            </span>
          </div>
        </div>
      @endif

      @if(filled($about->closing_en))
        <p class="oy-section__text oy-about-page__closing oy-reveal oy-delay-6">
          {{ $about->closing_en }}
        </p>
      @endif

    </div>
  </div>

  <div class="oy-about__pattern" aria-hidden="true"></div>
</section>