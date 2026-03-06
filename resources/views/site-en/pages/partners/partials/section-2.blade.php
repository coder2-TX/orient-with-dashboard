{{-- resources/views/site-en/pages/partners/partials/section-2.blade.php --}}
{{-- ORIENT YEMEN - Partners Page / Partners Network + Slider (EN) --}}

@push('scripts')
  {{--  نفس سكربت الصفحة الرئيسية (clone + حساب shift/duration) --}}
  <script src="{{ asset('assets/js/partners.js') }}" defer></script>
@endpush

<section class="oy-section oy-partners" id="partners-network">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-partners__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      Our Partners Network
    </h2>

    <p class="oy-section__text oy-partners__subtitle oy-reveal oy-delay-2">
      Our partners network includes a distinguished group of companies, suppliers, and distributors who have helped us build a trusted brand and a strong presence in the market,
      through professional collaboration based on trust and shared interests.
    </p>

    <div class="oy-partners__card oy-reveal oy-delay-3" role="region" aria-label="Partners Logos">
      <div class="oy-partners__marquee">

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
            {{-- Optional fallback if no active logos --}}
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
