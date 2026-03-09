<footer class="oy-footer" id="footer" role="contentinfo">
  @php
    $footer = \App\Models\HomeFooter::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

    $email = $footer?->email ?? 'info@orientyemen.com';

    // Clean email (remove whitespace/newlines)
    $emailClean = preg_replace('/\s+/', '', trim((string) $email));
    if ($emailClean === '') {
      $emailClean = 'info@orientyemen.com';
    }

    $phone = $footer?->phone ?? '+967 778080700';

    $locationText = $footer?->location_text_en ?? 'Company Location';
    $locationUrl  = $footer?->location_url ?? 'https://maps.app.goo.gl/TW3M3gi3dqN273LG6';

    $locations = $footer?->locations;
    if (!is_array($locations)) {
      $locations = [
        ['name_ar' => 'اليمن', 'name_en' => 'Yemen'],
        ['name_ar' => 'المملكة العربية السعودية', 'name_en' => 'Saudi Arabia'],
        ['name_ar' => 'إندونيسيا', 'name_en' => 'Indonesia'],
      ];
    }

    $xUrl        = $footer?->x_url;
    $facebookUrl = $footer?->facebook_url;
    $whatsappUrl = $footer?->whatsapp_url;
  @endphp

  <div class="oy-footer__inner">
    <div class="oy-footer__top">
      <div class="oy-footer__left">
        <div class="oy-footer__col" id="contact">
          <div class="oy-footer__brand">
            <img class="oy-footer__logo" src="{{ asset('assets/images/header/logo_white.svg') }}" alt="Orient Yemen">
          </div>

          <div class="oy-footer__contact">
            <div class="oy-footer__contact-item">
              <i class="fa-solid fa-envelope oy-footer__contact-icon" aria-hidden="true"></i>

              <a class="oy-footer__contact-value"
                 href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($emailClean) }}"
                 target="_blank" rel="noopener noreferrer">
                {{ $emailClean }}
              </a>
            </div>

            <div class="oy-footer__contact-item">
              <i class="fa-solid fa-phone oy-footer__contact-icon" aria-hidden="true"></i>
              @php
                $tel = preg_replace('/\s+/', '', $phone);
              @endphp
              <a class="oy-footer__contact-value" href="https://wa.me/967778080700" target="_blank" rel="noopener noreferrer" dir="ltr" style="direction:ltr; unicode-bidi:isolate; display:inline-block;">+967 734888880</a>
            </div>

            <div class="oy-footer__contact-item">
              <i class="fa-solid fa-location-dot oy-footer__contact-icon" aria-hidden="true"></i>

              @if($locationUrl)
                <a class="oy-footer__contact-value" href="{{ $locationUrl }}" target="_blank" rel="noopener noreferrer">
                  {{ $locationText }}
                </a>
              @else
                <span class="oy-footer__contact-value">{{ $locationText }}</span>
              @endif
            </div>
          </div>
        </div>

        <div class="oy-footer__col oy-footer__centered oy-footer__quick">
          <div class="oy-footer__heading oy-footer__heading--center">Quick Links</div>
          <ul class="oy-footer__list oy-footer__list--center">
            <li><a class="oy-footer__link" href="{{ route('site_en.home') }}">Home</a></li>
            <li><a class="oy-footer__link" href="{{ route('site_en.about') }}">About</a></li>
            <li><a class="oy-footer__link" href="{{ route('site_en.products') }}">Products</a></li>
            <li><a class="oy-footer__link" href="{{ route('site_en.partners') }}">Partners</a></li>
            <li><a class="oy-footer__link" href="{{ route('site_en.contact') }}">Contact</a></li>
          </ul>
        </div>

        <div class="oy-footer__col oy-footer__centered oy-footer__locations">
          <div class="oy-footer__heading oy-footer__heading--center">Our Locations</div>
          <ul class="oy-footer__list oy-footer__list--center">
            @foreach($locations as $loc)
              @php $nameEn = $loc['name_en'] ?? null; @endphp
              @if($nameEn)
                <li>{{ $nameEn }}</li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>

      <div class="oy-footer__right">
        <div class="oy-footer__col oy-footer__social">
          <div class="oy-footer__heading oy-footer__heading--center">Follow us on social media</div>

          <div class="oy-footer__socials">

            <a class="oy-footer__social-btn" href="https://www.facebook.com/share/1CNj9hfQ9o/" aria-label="Facebook"
              target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-facebook-f"></i>
            </a>

            <a class="oy-footer__social-btn" href="https://www.instagram.com/orientyemen?igsh=NHZqaTFsNDJmY2Jz" aria-label="Instagram"
              target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-instagram"></i>
            </a>

            <a class="oy-footer__social-btn" href="https://wa.me/967778080700" aria-label="WhatsApp"
              target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-whatsapp"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="oy-footer__divider" aria-hidden="true"></div>

    <div class="oy-footer__bottom">
      <div>© Orient Yemen for Import. All rights reserved.</div>
      <div>
        Powered by
        <a class="oy-footer__bottom-link" href="https://destination-media.pro/" target="_blank" rel="noopener noreferrer">
          <strong>Destination Media</strong>
        </a>
      </div>
    </div>
  </div>
</footer>