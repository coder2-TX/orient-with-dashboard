{{-- resources/views/site/pages/contact/partials/section-2.blade.php --}}

@php
  use App\Models\ContactSetting;

  $settings = ContactSetting::activeOrDefault();

  $email = $settings->emailAddress();
  $phoneDisplay = $settings->phoneDisplay();
  $phoneTel = $settings->phoneTel();
  $waText = $settings->whatsappDisplay();
  $waDigits = $settings->whatsappDigits();
  $locationsAr = $settings->locationsFor('ar');
@endphp

<section class="oy-section oy-contact" id="contact" aria-label="Contact Section">
  <div class="oy-section__inner">
    <div class="oy-contact__grid">
      <div class="oy-contact__info" aria-label="Contact Information">
        <h2 class="oy-section__title oy-contact__title oy-reveal oy-delay-1">
          <span class="oy-section__title-icon" aria-hidden="true"></span>
          <span>{{ $settings->localized('title', 'ar') }}</span>
        </h2>

        <p class="oy-section__text oy-contact__lead oy-reveal oy-delay-2">
          {{ $settings->localized('lead', 'ar') }}
        </p>

        <div class="oy-contact__items oy-reveal oy-delay-3" role="list">
          <div class="oy-contact__item" role="listitem">
            <i class="fa-solid fa-envelope oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">{{ $settings->localized('email_label', 'ar') }}</div>
              <a class="oy-contact__item-value" href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
          </div>

          <div class="oy-contact__item" role="listitem">
            <i class="fa-solid fa-phone oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">{{ $settings->localized('phone_label', 'ar') }}</div>
              <a class="oy-contact__item-value" href="tel:{{ $phoneTel }}" dir="ltr">{{ $phoneDisplay }}</a>
            </div>
          </div>

          <div class="oy-contact__item" role="listitem">
            <i class="fa-brands fa-whatsapp oy-contact__item-icon" aria-hidden="true"></i>
            <div class="oy-contact__item-body">
              <div class="oy-contact__item-title">{{ $settings->localized('whatsapp_label', 'ar') }}</div>
              <a class="oy-contact__item-value"
                 href="https://wa.me/{{ $waDigits }}"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="WhatsApp"
                 dir="ltr">
                {{ $waText }}
              </a>
            </div>
          </div>
        </div>

        <hr class="oy-contact__divider oy-reveal oy-delay-4" aria-hidden="true">

        <h3 class="oy-contact__subhead oy-reveal oy-delay-5">{{ $settings->localized('locations_title', 'ar') }}</h3>

        <p class="oy-contact__subtext oy-reveal oy-delay-6">
          {{ $settings->localized('locations_description', 'ar') }}
        </p>

        <ul class="oy-contact__countries oy-reveal oy-delay-6" aria-label="Countries">
          @foreach($locationsAr as $locName)
            <li>
              <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
              <span>{{ $locName }}</span>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="oy-contact__formWrap" aria-label="Contact Form">
        <div class="oy-contact__formBox oy-reveal oy-delay-2">
          <h3 class="oy-contact__formTitle">{{ $settings->localized('form_title', 'ar') }}</h3>
          <p class="oy-contact__formText">
            {{ $settings->localized('form_description', 'ar') }}
          </p>

          <form class="oy-form" action="#" method="post" data-wa-phone="{{ $waDigits }}">
            <div class="oy-form__grid">
              <div class="oy-form__field">
                <label class="oy-form__label" for="full_name">{{ $settings->localized('form_full_name_label', 'ar') }}</label>
                <input class="oy-form__input" id="full_name" name="full_name" type="text" placeholder="{{ $settings->localized('form_full_name_placeholder', 'ar') }}">
              </div>

              <div class="oy-form__field">
                <label class="oy-form__label" for="email">{{ $settings->localized('form_email_label', 'ar') }}</label>
                <input class="oy-form__input" id="email" name="email" type="email" placeholder="{{ $settings->localized('form_email_placeholder', 'ar') }}">
              </div>

              <div class="oy-form__field">
                <label class="oy-form__label" for="phone">{{ $settings->localized('form_phone_label', 'ar') }}</label>
                <input class="oy-form__input" id="phone" name="phone" type="tel" placeholder="{{ $settings->localized('form_phone_placeholder', 'ar') }}">
              </div>

              <div class="oy-form__field">
                <label class="oy-form__label" for="subject">{{ $settings->localized('form_subject_label', 'ar') }}</label>
                <input class="oy-form__input" id="subject" name="subject" type="text" placeholder="{{ $settings->localized('form_subject_placeholder', 'ar') }}">
              </div>

              <div class="oy-form__field oy-form__field--full">
                <label class="oy-form__label" for="message">{{ $settings->localized('form_message_label', 'ar') }}</label>
                <textarea class="oy-form__textarea" id="message" name="message" rows="5" placeholder="{{ $settings->localized('form_message_placeholder', 'ar') }}"></textarea>
              </div>
            </div>

            <button class="oy-form__submit" type="submit">
              {{ $settings->localized('form_submit_label', 'ar') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
