{{-- resources/views/site-en/pages/contact/partials/section-2.blade.php --}}

@php
  $settings = \App\Models\ContactSetting::activeOrDefault();
  $footer = \App\Models\HomeFooter::activeOrDefault();

  $email = $footer->emailAddress();
  $phoneDisplay = $footer->phoneDisplay();
  $phoneTel = $footer->phoneTel();
  $footerWaText = $footer->whatsappDisplay();
  $footerWaUrl = $footer->whatsappUrl();
  $messageReceiverDigits = $settings->messageReceiverDigits();
  $locationsEn = $footer->locationsFor('en');
@endphp

<section class="oy-section oy-contact" id="contact" aria-label="Contact Section">
  <div class="oy-section__inner">
    <div class="oy-contact__grid">
      <div class="oy-contact__info" aria-label="Contact Information">
        <h2 class="oy-section__title oy-contact__title oy-reveal oy-delay-1">
          <span class="oy-section__title-icon" aria-hidden="true"></span>
          <span>{{ $settings->localized('title', 'en') }}</span>
        </h2>

        <p class="oy-section__text oy-contact__lead oy-reveal oy-delay-2">
          {{ $settings->localized('lead', 'en') }}
        </p>

        <div class="oy-contact__items oy-reveal oy-delay-3" role="list">
          <div class="oy-contact__item" role="listitem">
            <i class="fa-solid fa-envelope oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">Email</div>
              <a class="oy-contact__item-value" href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
          </div>

          <div class="oy-contact__item" role="listitem">
            <i class="fa-solid fa-phone oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">Phone</div>
              <a class="oy-contact__item-value" href="tel:{{ $phoneTel }}" dir="ltr">{{ $phoneDisplay }}</a>
            </div>
          </div>

          <div class="oy-contact__item" role="listitem">
            <i class="fa-brands fa-whatsapp oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">WhatsApp</div>
              <a class="oy-contact__item-value"
                 href="{{ $footerWaUrl }}"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="WhatsApp"
                 dir="ltr">
                {{ $footerWaText }}
              </a>
            </div>
          </div>
        </div>

        <hr class="oy-contact__divider oy-reveal oy-delay-4" aria-hidden="true">

        <h3 class="oy-contact__subhead oy-reveal oy-delay-5">{{ $settings->localized('locations_title', 'en') }}</h3>

        <p class="oy-contact__subtext oy-reveal oy-delay-6">
          {{ $settings->localized('locations_description', 'en') }}
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
          <h3 class="oy-contact__formTitle">{{ $settings->localized('form_title', 'en') }}</h3>
          <p class="oy-contact__formText">
            {{ $settings->localized('form_description', 'en') }}
          </p>

          <form class="oy-form" action="#" method="post" data-wa-phone="{{ $messageReceiverDigits }}">
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

            <button class="oy-form__submit" type="submit">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
