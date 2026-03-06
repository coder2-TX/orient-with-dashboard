<!-- pages_en/about/partials/section-4.blade.php -->
<!-- ORIENT YEMEN - Values section (EN) -->

@php
  use App\Models\AboutValue;

  $values = AboutValue::query()->where('is_active', true)->latest('id')->first();
  $items  = is_array($values?->items) ? array_slice($values->items, 0, 6) : [];
@endphp

<section class="oy-section oy-values" id="values" aria-label="Values">
  <div class="oy-section__inner">

    <div class="oy-values__card oy-reveal oy-delay-1" role="region" aria-label="Our Values">
      <div class="oy-values__layout">

        <aside class="oy-values__aside oy-reveal oy-delay-2" aria-label="Values Intro">
          <h2 class="oy-values__aside-title">Our Values</h2>
          <p class="oy-values__aside-text">
            {{ $values?->intro_text_en ?: 'Orient Yemen’s work is guided by a set of core values that shape how we do business.' }}
          </p>
        </aside>

        <div class="oy-values__content" aria-label="Values List">
          <div class="oy-values__grid">

            @if(count($items))
              @foreach($items as $i => $item)
                <article class="oy-values__item oy-reveal oy-delay-{{ 3 + $i }}">
                  <div class="oy-values__icon" aria-hidden="true">
                    @if(!empty($item['icon']))
                      <img
                        src="{{ \Illuminate\Support\Facades\Storage::url($item['icon']) }}"
                        alt="{{ $item['title_en'] ?? 'Icon' }}"
                        loading="lazy"
                      >
                    @else
                      <i class="fa-solid fa-circle"></i>
                    @endif
                  </div>

                  <div class="oy-values__copy">
                    <div class="oy-values__title">{{ $item['title_en'] ?? '' }}</div>
                    <div class="oy-values__desc">{{ $item['desc_en'] ?? '' }}</div>
                  </div>
                </article>
              @endforeach
            @else
              {{-- Fallback القديم --}}
              <article class="oy-values__item oy-reveal oy-delay-3">
                <div class="oy-values__icon" aria-hidden="true"><i class="fa-solid fa-briefcase"></i></div>
                <div class="oy-values__copy">
                  <div class="oy-values__title">Professionalism</div>
                  <div class="oy-values__desc">in business management</div>
                </div>
              </article>

              <article class="oy-values__item oy-reveal oy-delay-4">
                <div class="oy-values__icon" aria-hidden="true"><i class="fa-solid fa-hand-holding-heart"></i></div>
                <div class="oy-values__copy">
                  <div class="oy-values__title">Transparency</div>
                  <div class="oy-values__desc">in our dealings</div>
                </div>
              </article>

              <article class="oy-values__item oy-reveal oy-delay-5">
                <div class="oy-values__icon" aria-hidden="true"><i class="fa-solid fa-award"></i></div>
                <div class="oy-values__copy">
                  <div class="oy-values__title">Commitment</div>
                  <div class="oy-values__desc">to quality and continuity</div>
                </div>
              </article>

              <article class="oy-values__item oy-reveal oy-delay-6">
                <div class="oy-values__icon" aria-hidden="true"><i class="fa-solid fa-arrows-rotate"></i></div>
                <div class="oy-values__copy">
                  <div class="oy-values__title">Flexibility</div>
                  <div class="oy-values__desc">to adapt to market changes</div>
                </div>
              </article>

              <article class="oy-values__item oy-reveal oy-delay-7">
                <div class="oy-values__icon" aria-hidden="true"><i class="fa-solid fa-handshake"></i></div>
                <div class="oy-values__copy">
                  <div class="oy-values__title">Partnership</div>
                  <div class="oy-values__desc">as the foundation of shared success</div>
                </div>
              </article>
            @endif

          </div>
        </div>

      </div>
    </div>

  </div>
</section>
