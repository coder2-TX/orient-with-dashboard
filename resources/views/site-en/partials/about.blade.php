<!-- en/partials/about.html -->
<!-- ORIENT YEMEN - About section (EN) -->
@php
  use App\Models\HomeAbout;

  $about = HomeAbout::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $text = $about?->body['en'] ?? null;
@endphp
<section class="oy-section oy-about" id="about" aria-label="About Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">
      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>About Orient Yemen</span>
      </h2>

     <p class="oy-section__text oy-reveal oy-delay-2">
  {{ $text ?: 'Orient Yemen is a leading private trading and distribution company, established in 2007. Over more than 19 years, we have built a prestigious reputation as experts in the import, marketing, and distribution of food and beverage products. Our core mission is to bridge the gap between global suppliers and local markets, establishing a structured and stable presence for international brands. We pride ourselves on an extensive and comprehensive distribution network that covers all parts of Yemen, delivering high-efficiency services to supermarkets, wholesalers, and retailers everywhere.
​With a strong regional presence and branches across Yemen, Saudi Arabia, and Indonesia, we provide flexible and scalable commercial and marketing solutions. We firmly believe that the success of any product depends not only on its quality but also on a strategic market entry and the cultivation of reliable, long-term relationships that benefit both consumers and suppliers alike.' }}
</p>
    </div>
  </div>

  <!-- Full-height side pattern (bleeds outside section padding intentionally) -->
  <div class="oy-about__pattern" aria-hidden="true"></div>
</section>
