{{-- resources/views/site-en/pages/contact/partials/section-3.blade.php --}}

@php
  $settings = \App\Models\ContactSetting::activeOrDefault();
@endphp

<section class="oy-section oy-contact-map oy-reveal oy-delay-2" aria-label="Location Map">
  <div class="oy-contact-map__inner">
    <iframe
      class="oy-contact-map__iframe"
      src="{{ $settings->mapEmbedUrl() }}"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
      title="Our Location Map">
    </iframe>
  </div>
</section>
