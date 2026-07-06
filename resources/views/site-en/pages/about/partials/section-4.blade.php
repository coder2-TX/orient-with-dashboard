<!-- pages_en/about/partials/section-4.blade.php -->
<!-- ORIENT YEMEN - Values section (EN) -->

@php
  use App\Models\AboutValue;
  use Illuminate\Support\Facades\Storage;

  $values = AboutValue::activeContent();
  $items = is_array($values->items) ? array_slice(array_values(array_filter($values->items)), 0, 6) : [];

  $defaultIconClasses = [
    'fa-solid fa-handshake',
    'fa-solid fa-award',
    'fa-solid fa-user-tie',
    'fa-solid fa-users',
    'fa-solid fa-lightbulb',
    'fa-solid fa-shield-heart',
  ];
@endphp

<section class="oy-section oy-values" id="values" aria-label="Values">
  <div class="oy-section__inner">

    <div class="oy-values__card oy-reveal oy-delay-1" role="region" aria-label="{{ $values->title_text_en ?: AboutValue::DEFAULT_TITLE_EN }}">
      <div class="oy-values__layout">

        <aside class="oy-values__aside oy-reveal oy-delay-2" aria-label="Values Intro">
          <h2 class="oy-values__aside-title">{{ $values->title_text_en ?: AboutValue::DEFAULT_TITLE_EN }}</h2>
          <p class="oy-values__aside-text">
            {{ $values->intro_text_en ?: AboutValue::DEFAULT_INTRO_EN }}
          </p>
        </aside>

        <div class="oy-values__content" aria-label="Values List">
          <div class="oy-values__grid">

            @foreach($items as $i => $item)
              @php
                $delay = min(3 + $i, 8);

                $customIcon = $item['custom_icon'] ?? null;
                $iconClass = trim((string) ($item['icon_class'] ?? ''));

                if ($iconClass === '') {
                  $iconClass = $defaultIconClasses[$i] ?? 'fa-solid fa-circle-check';
                }

                $title = $item['title_en'] ?? '';
                $desc = $item['desc_en'] ?? '';
              @endphp

              <article class="oy-values__item oy-reveal oy-delay-{{ $delay }}">
                <div class="oy-values__icon" aria-hidden="true">
                  @if(!empty($customIcon))
                    <img
                      src="{{ Storage::disk('public')->url($customIcon) }}"
                      alt="{{ $title ?: 'Icon' }}"
                      loading="lazy"
                      style="width:36px;height:36px;object-fit:contain;"
                    >
                  @else
                    <i class="{{ $iconClass }}"></i>
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