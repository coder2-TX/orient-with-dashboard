{{-- resources/views/site-en/pages/contact/partials/section-2.blade.php --}}

@php
  //  Fallback (old Blade defaults)
  $fallbackEmail = 'info@orientyemen.com';
  $fallbackPhoneDisplay = '+967 734888880';
  $fallbackPhoneTel = '+967 734888880';

  //  WhatsApp fallback (old blade)
  $fallbackWaText = '+967 778 080 700';
  $fallbackWaDigits = '967778080700';

  $fallbackLocationsEn = [
    'Yemen',
    'Saudi Arabia',
    'Indonesia',
  ];

  //  Only active footer
  $footer = \App\Models\HomeFooter::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $email = $footer?->email ?: $fallbackEmail;

  $phoneDisplay = $footer?->phone ?: $fallbackPhoneDisplay;
  $phoneTel = $footer?->phone
      ? preg_replace('/[^0-9\+]/', '', $footer->phone)
      : $fallbackPhoneTel;

  $locationsEn = (is_array($footer?->locations) && count($footer->locations))
      ? collect($footer->locations)->map(fn ($l) => $l['name_en'] ?? null)->filter()->values()->all()
      : $fallbackLocationsEn;

  //  WhatsApp from ContactSettings (active only) + fallback
  $contactSettings = \App\Models\ContactSetting::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $waText = $contactSettings?->whatsapp_display ?: $fallbackWaText;
  $waDigits = preg_replace('/\D+/', '', (string) $waText) ?: $fallbackWaDigits;
@endphp

<section class="oy-section oy-contact" id="contact" aria-label="Contact Section">
  <div class="oy-section__inner">

    <div class="oy-contact__grid">
      <div class="oy-contact__info" aria-label="Contact Information">

        <h2 class="oy-section__title oy-contact__title oy-reveal oy-delay-1">
          <span class="oy-section__title-icon" aria-hidden="true"></span>
          <span>Contact Us</span>
        </h2>

        <p class="oy-section__text oy-contact__lead oy-reveal oy-delay-2">
          We are happy to receive your inquiries and suggestions through the following channels:
        </p>

        <div class="oy-contact__items oy-reveal oy-delay-3" role="list">
          <!-- Email -->
          <div class="oy-contact__item" role="listitem">
            <i class="fa-solid fa-envelope oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">Email</div>
              <a class="oy-contact__item-value" href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
          </div>

          <!-- Phone -->
          <div class="oy-contact__item" role="listitem">
            <i class="fa-solid fa-phone oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">Phone</div>
              <a class="oy-contact__item-value" href="tel:{{ $phoneTel }}">{{ $phoneDisplay }}</a>
            </div>
          </div>

          <!-- WhatsApp ( editable from ContactSettings + fallback) -->
          <div class="oy-contact__item" role="listitem">
            <i class="fa-brands fa-whatsapp oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">WhatsApp</div>
              <a class="oy-contact__item-value"
                 href="https://wa.me/{{ $waDigits }}"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="WhatsApp">
                {{ $waText }}
              </a>
            </div>
          </div>
        </div>

        <hr class="oy-contact__divider oy-reveal oy-delay-4" aria-hidden="true">

        <h3 class="oy-contact__subhead oy-reveal oy-delay-5">Our Locations</h3>

        <p class="oy-contact__subtext oy-reveal oy-delay-6">
          Orient Yemen operates through a regional branch network, enabling direct communication and continuous support
          in the markets we serve:
        </p>

        <ul class="oy-contact__countries oy-reveal oy-delay-6" aria-label="Countries">
          @foreach($locationsEn as $locName)
            <li>
              <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
              <span>{{ $locName }}</span>
            </li>
          @endforeach
        </ul>

      </div>

      <div class="oy-contact__formWrap" aria-label="Contact Form">
        <div class="oy-contact__formBox oy-reveal oy-delay-2">
          <h3 class="oy-contact__formTitle">Contact Form</h3>
          <p class="oy-contact__formText">
            You can send your message directly using the form below, and we will get back to you as soon as possible:
          </p>

          {{--  keep same behavior but use current WhatsApp digits --}}
          <form class="oy-form" action="#" method="post" data-wa-phone="{{ $waDigits }}">
            <div class="oy-form__grid">
              <div class="oy-form__field">
                <label class="oy-form__label" for="full_name">Full name</label>
                <input class="oy-form__input" id="full_name" name="full_name" type="text" placeholder="Full name">
              </div>

              <div class="oy-form__field">
                <label class="oy-form__label" for="email">Email</label>
                <input class="oy-form__input" id="email" name="email" type="email" placeholder="example@email.com">
              </div>

              <div class="oy-form__field">
                <label class="oy-form__label" for="phone">Phone number</label>
                <input class="oy-form__input" id="phone" name="phone" type="tel" placeholder="+967 ...">
              </div>

              <div class="oy-form__field">
                <label class="oy-form__label" for="subject">Subject</label>
                <input class="oy-form__input" id="subject" name="subject" type="text" placeholder="Short message title">
              </div>

              <div class="oy-form__field oy-form__field--full">
                <label class="oy-form__label" for="message">Message</label>
                <textarea class="oy-form__textarea" id="message" name="message" rows="5" placeholder="Write your message here..."></textarea>
              </div>
            </div>

            <button class="oy-form__submit" type="submit">
              Send Message
            </button>
          </form>

        </div>
      </div>
    </div>

  </div>
</section>
