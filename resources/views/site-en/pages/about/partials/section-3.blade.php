<!-- pages_en/about/partials/section-3.html -->
<!-- ORIENT YEMEN - Vision & Mission (EN) -->

@php
  $vm = \App\Models\AboutVisionMission::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();
@endphp

<section class="oy-section oy-about-vm" id="vision-mission" aria-label="Vision and Mission">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      <span>Our Vision & Mission</span>
    </h2>

    <p class="oy-section__text oy-reveal oy-delay-2">
      {{ $vm?->intro_text_en ?? 'We operate with a clear approach focused on building a stable and sustainable commercial presence for brands across multiple markets.' }}
    </p>

    <div class="oy-about-vm__grid">
      <!-- Vision -->
      <article class="oy-about-vm__item oy-reveal oy-delay-3">
        <div class="oy-about-vm__icon" aria-hidden="true">
          <i class="fa-regular fa-eye"></i>
        </div>
        <h3 class="oy-about-vm__title">Our Vision</h3>
        <p class="oy-about-vm__text">
          {{ $vm?->vision_text_en ?? 'At Orient Yemen, we aspire to be a trusted commercial partner in importing and marketing products, contributing to building strong brands that can sustain and grow in the markets we serve.' }}
        </p>
      </article>

      <!-- Mission -->
      <article class="oy-about-vm__item oy-reveal oy-delay-4">
        <div class="oy-about-vm__icon" aria-hidden="true">
          <i class="fa-solid fa-bullseye"></i>
        </div>
        <h3 class="oy-about-vm__title">Our Mission</h3>
        <p class="oy-about-vm__text">
          {{ $vm?->mission_text_en ?? 'Our mission is to provide integrated solutions for importing and marketing products, and to build long-term business relationships based on trust and continuity, through deep market understanding, organized supply-chain management, and supporting brands to achieve a stable and sustainable commercial presence.' }}
        </p>
      </article>
    </div>
  </div>

  <div class="oy-about-vm__pattern" aria-hidden="true"></div>
</section>
