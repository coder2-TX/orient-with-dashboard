<!-- partials/about.html -->
<!-- ORIENT YEMEN - About section -->
@php
  use App\Models\HomeAbout;

  $about = HomeAbout::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  $text = $about?->body['ar'] ?? null;
@endphp

<section class="oy-section oy-about" id="about" aria-label="About Orient Yemen">
  <div class="oy-section__inner">
    <div class="oy-about__content">
      <h2 class="oy-section__title oy-reveal oy-delay-1">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        <span>عن أورينت يمن</span>
      </h2>

      <p class="oy-section__text oy-reveal oy-delay-2">
  {{ $text ?: 'تعد أورينت يمن شركة تجارية وتوزيع خاصة رائدة، تأسست عام 2007، ونجحت على مدار أكثر من 19 عاماً في بناء سمعة مرموقة كخبير في استيراد وتسويق وتوزيع المنتجات الغذائية والمشروبات. ترتكز مهمتنا على ربط الموردين بالأسواق العالمية وبناء حضور منظم ومستقر للعلامات التجارية، حيث نمتلك شبكة توزيع واسعة وشاملة تغطي كافة أنحاء اليمن، لتصل خدماتنا بكفاءة عالية إلى السوبر ماركت وتجار الجملة والتجزئة في كل مكان.
وبفضل حضورنا الإقليمي القوي وفروعنا الممتدة في (اليمن، المملكة العربية السعودية، وإندونيسيا)، نتمكن من تقديم حلول تجارية وتسويقية مرنة وقابلة للتوسع. نحن نؤمن بأن نجاح المنتجات لا يعتمد فقط على جودتها، بل على استراتيجية دخولها للسوق وبناء علاقات موثوقة وطويلة الأمد تضمن منفعة المستهلكين والموردين على حد سواء.' }}
</p>
    </div>
  </div>

  <!-- Full-height side pattern (bleeds outside section padding intentionally) -->
  <div class="oy-about__pattern" aria-hidden="true"></div>
</section>
