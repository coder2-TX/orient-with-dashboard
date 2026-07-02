<!-- pages/about/partials/section-3.html -->
<!-- ORIENT YEMEN - Vision & Mission -->

@php
  use App\Models\AboutVisionMission;

  $vm = AboutVisionMission::activeContent();

  $sectionTitle = $vm?->section_title_ar ?: AboutVisionMission::defaultValue('section_title_ar');
  $introText = $vm?->intro_text_ar ?: AboutVisionMission::defaultValue('intro_text_ar');
  $visionTitle = $vm?->vision_title_ar ?: AboutVisionMission::defaultValue('vision_title_ar');
  $visionText = $vm?->vision_text_ar ?: AboutVisionMission::defaultValue('vision_text_ar');
  $missionTitle = $vm?->mission_title_ar ?: AboutVisionMission::defaultValue('mission_title_ar');
  $missionText = $vm?->mission_text_ar ?: AboutVisionMission::defaultValue('mission_text_ar');
@endphp

<section class="oy-section oy-about-vm" id="vision-mission" aria-label="Vision and Mission">
  <div class="oy-section__inner">
    <h2 class="oy-section__title oy-reveal oy-delay-1">
      <span class="oy-section__title-icon" aria-hidden="true"></span>
      <span>{{ $sectionTitle }}</span>
    </h2>

    <p class="oy-section__text oy-reveal oy-delay-2">
      {!! nl2br(e($introText)) !!}
    </p>

    <div class="oy-about-vm__grid">
      <article class="oy-about-vm__item oy-reveal oy-delay-3">
        <div class="oy-about-vm__icon" aria-hidden="true">
          <i class="fa-regular fa-eye"></i>
        </div>
        <h3 class="oy-about-vm__title">{{ $visionTitle }}</h3>
        <p class="oy-about-vm__text">
          {!! nl2br(e($visionText)) !!}
        </p>
      </article>

      <article class="oy-about-vm__item oy-reveal oy-delay-4">
        <div class="oy-about-vm__icon" aria-hidden="true">
          <i class="fa-solid fa-bullseye"></i>
        </div>
        <h3 class="oy-about-vm__title">{{ $missionTitle }}</h3>
        <p class="oy-about-vm__text">
          {!! nl2br(e($missionText)) !!}
        </p>
      </article>
    </div>
  </div>

  <div class="oy-about-vm__pattern" aria-hidden="true"></div>
</section>
