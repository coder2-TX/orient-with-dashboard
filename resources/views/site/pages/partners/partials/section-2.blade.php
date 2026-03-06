{{-- resources/views/site/pages/partners/partials/section-2.blade.php --}}
{{-- ORIENT YEMEN - Partners Page / Partners Network + Slider (same as Home partners section) --}}

@push('scripts')
  {{--  نفس سكربت الصفحة الرئيسية (هو الذي يعمل clone + يحسب السرعة/المسافة) --}}
  <script src="{{ asset('assets/js/partners.js') }}" defer></script>
@endpush

<section class="oy-section oy-partners" id="partners-network">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-partners__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      شبكة شركائنا
    </h2>

    <p class="oy-section__text oy-partners__subtitle oy-reveal oy-delay-2">
      تضم شبكة شركائنا نخبة من الشركات والموردين والموزعين الذين ساهموا معنا في بناء علامة موثوقة وحضور قوي داخل السوق،
      من خلال تعاون مهني قائم على الثقة والمصالح المشتركة.
    </p>

    <div class="oy-partners__card oy-reveal oy-delay-3" role="region" aria-label="شعارات الشركاء">
      <div class="oy-partners__marquee">
        {{--  لا تكرري الشعارات هنا — partners.js سيكررها ويحسب shift/duration تلقائيًا --}}

        @php
          $homePartners = \App\Models\HomePartner::query()
              ->where('is_active', true)
              ->orderBy('sort')
              ->orderByDesc('id')
              ->first();

          $logos = data_get($homePartners, 'logos', []);
          $logos = is_array($logos) ? array_values(array_filter($logos)) : [];
        @endphp

        <div class="oy-partners__logos">
          @forelse($logos as $i => $path)
            <img
              src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($path) }}"
              alt="Partner Logo {{ $i + 1 }}"
              loading="lazy"
            >
          @empty
            {{-- Fallback (اختياري) لو ما في شعارات مفعلة --}}
            <img src="{{ asset('assets/images/main/partners/logo-01.svg') }}" alt="Partner Logo 01" loading="lazy">
            <img src="{{ asset('assets/images/main/partners/logo-02.png') }}" alt="Partner Logo 02" loading="lazy">
            <img src="{{ asset('assets/images/main/partners/logo-03.png') }}" alt="Partner Logo 03" loading="lazy">
            <img src="{{ asset('assets/images/main/partners/logo-04.png') }}" alt="Partner Logo 04" loading="lazy">
            <img src="{{ asset('assets/images/main/partners/logo-05.png') }}" alt="Partner Logo 05" loading="lazy">
            <img src="{{ asset('assets/images/main/partners/logo-06.svg') }}" alt="Partner Logo 06" loading="lazy">
            <img src="{{ asset('assets/images/main/partners/logo-07.png') }}" alt="Partner Logo 07" loading="lazy">
          @endforelse
        </div>

      </div>
    </div>
  </div>
</section>
