<footer class="oy-footer" id="footer" role="contentinfo">
  @php
    $footer = \App\Models\HomeFooter::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

    $defaults = \App\Models\HomeFooter::defaultData();

    $email = $footer?->email ?: $defaults['email'];
    $emailClean = preg_replace('/\s+/', '', trim((string) $email));
    if ($emailClean === '') {
      $emailClean = $defaults['email'];
    }

    $phone = trim((string) ($footer?->phone ?: $defaults['phone']));
    $phoneClean = preg_replace('/\s+/', '', $phone);

    $locationText = $footer?->location_text_ar ?: $defaults['location_text_ar'];
    $locationUrl = $footer?->location_url ?: $defaults['location_url'];

    $locations = $footer?->locations;
    if (! is_array($locations) || count(array_filter($locations)) === 0) {
      $locations = $defaults['locations'];
    }

    $socialLinks = [
      [
        'url' => $footer?->facebook_url ?: $defaults['facebook_url'],
        'label' => 'Facebook',
        'icon' => 'fa-brands fa-facebook-f',
      ],
      [
        'url' => $footer?->instagram_url ?: $defaults['instagram_url'],
        'label' => 'Instagram',
        'icon' => 'fa-brands fa-instagram',
      ],
      [
        'url' => $footer?->x_url ?: $defaults['x_url'],
        'label' => 'X',
        'icon' => 'fa-brands fa-x-twitter',
      ],
      [
        'url' => $footer?->whatsapp_url ?: $defaults['whatsapp_url'],
        'label' => 'WhatsApp',
        'icon' => 'fa-brands fa-whatsapp',
      ],
    ];
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

              <a class="oy-footer__contact-value"
                 href="tel:{{ $phoneClean }}"
                 dir="ltr"
                 style="direction:ltr; unicode-bidi:isolate; display:inline-block;">
                {{ $phone }}
              </a>
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
          <div class="oy-footer__heading oy-footer__heading--center">روابط سريعة</div>
          <ul class="oy-footer__list oy-footer__list--center">
            <li><a class="oy-footer__link" href="{{ route('site.home') }}">الرئيسية</a></li>
            <li><a class="oy-footer__link" href="{{ route('site.about') }}">من نحن</a></li>
            <li><a class="oy-footer__link" href="{{ route('site.products') }}">منتجاتنا</a></li>
            <li><a class="oy-footer__link" href="{{ route('site.partners') }}">شركائنا</a></li>
            <li><a class="oy-footer__link" href="{{ route('site.contact') }}">تواصل معنا</a></li>
          </ul>
        </div>

        <div class="oy-footer__col oy-footer__centered oy-footer__locations">
          <div class="oy-footer__heading oy-footer__heading--center">مواقعـــنا</div>
          <ul class="oy-footer__list oy-footer__list--center">
            @foreach($locations as $loc)
              @php $nameAr = trim((string) ($loc['name_ar'] ?? '')); @endphp
              @if($nameAr !== '')
                <li>{{ $nameAr }}</li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>

      <div class="oy-footer__right">
        <div class="oy-footer__col oy-footer__social">
          <div class="oy-footer__heading oy-footer__heading--center">مواقعنا على السوشل ميديا</div>

          <div class="oy-footer__socials">
            @foreach($socialLinks as $social)
              @if(! empty($social['url']))
                <a class="oy-footer__social-btn"
                   href="{{ $social['url'] }}"
                   aria-label="{{ $social['label'] }}"
                   target="_blank"
                   rel="noopener noreferrer">
                  <i class="{{ $social['icon'] }}"></i>
                </a>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="oy-footer__divider" aria-hidden="true"></div>

    <div class="oy-footer__bottom">
      <div>All rights reserved to orient yemen for import</div>
      <div>
        Powered by
        <a class="oy-footer__bottom-link" href="https://destination-media.pro/" target="_blank" rel="noopener noreferrer">
          <strong>Destination Media</strong>
        </a>
      </div>
    </div>
  </div>
</footer>
