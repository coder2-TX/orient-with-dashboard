<!-- pages/about/partials/section-4.blade.php -->
<!-- ORIENT YEMEN - Values section -->

@php
  use App\Models\AboutValue;
  use Illuminate\Support\Facades\Storage;

  $values = AboutValue::activeContent();
  $items = is_array($values->items) ? array_slice(array_values(array_filter($values->items)), 0, 6) : [];
@endphp

<section class="oy-section oy-values" id="values" aria-label="Values">
  <div class="oy-section__inner">

    <div class="oy-values__card oy-reveal oy-delay-1" role="region" aria-label="{{ $values->title_text_ar ?: AboutValue::DEFAULT_TITLE_AR }}">
      <div class="oy-values__layout">

        <aside class="oy-values__aside oy-reveal oy-delay-2" aria-label="Values Intro">
          <h2 class="oy-values__aside-title">{{ $values->title_text_ar ?: AboutValue::DEFAULT_TITLE_AR }}</h2>
          <p class="oy-values__aside-text">
            {{ $values->intro_text_ar ?: AboutValue::DEFAULT_INTRO_AR }}
          </p>
        </aside>

        <div class="oy-values__content" aria-label="Values List">
          <div class="oy-values__grid">

            @foreach($items as $i => $item)
              @php
                $delay = min(3 + $i, 8);
                $icon = $item['icon'] ?? null;
                $title = $item['title_ar'] ?? '';
                $desc = $item['desc_ar'] ?? '';
              @endphp

              <article class="oy-values__item oy-reveal oy-delay-{{ $delay }}">
                <div class="oy-values__icon" aria-hidden="true">
                  @if($icon)
                    <img
                      src="{{ Storage::disk('public')->url($icon) }}"
                      alt="{{ $title ?: 'Icon' }}"
                      loading="lazy"
                    >
                  @else
                    <i class="fa-solid fa-circle"></i>
                  @endif
                </div>

                <div class="oy-values__copy">
                  <div class="oy-values__title">{{ $title }}</div>
                  <div class="oy-values__desc">{{ $desc }}</div>
                </div>
              </article>
            @endforeach

          </div>
        </div>

      </div>
    </div>

  </div>
</section>
