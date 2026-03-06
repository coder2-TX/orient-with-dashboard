<!-- pages/about/partials/section-3.html -->
<!-- ORIENT YEMEN - Vision & Mission (styled like Home Services section) -->

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
      <span>رؤيتنا ورسالتنا</span>
    </h2>

    <p class="oy-section__text oy-reveal oy-delay-2">
      {{ $vm?->intro_text_ar ?? 'نعمل وفق نهج واضح يركّز على بناء حضور تجاري مستقر ومستدام للعلامات التجارية عبر أسواق متعددة.' }}
    </p>

    <div class="oy-about-vm__grid">
      <!-- Vision -->
      <article class="oy-about-vm__item oy-reveal oy-delay-3">
        <div class="oy-about-vm__icon" aria-hidden="true">
          <i class="fa-regular fa-eye"></i>
        </div>
        <h3 class="oy-about-vm__title">رؤيتنا</h3>
        <p class="oy-about-vm__text">
          {{ $vm?->vision_text_ar ?? 'نسعى في أورينت يمن إلى أن نكون شريكًا تجاريًا موثوقًا في استيراد وتسويق المنتجات، وأن نُسهم في بناء علامات تجارية قوية وقادرة على الاستمرار والنمو في الأسواق التي نعمل بها.' }}
        </p>
      </article>

      <!-- Mission -->
      <article class="oy-about-vm__item oy-reveal oy-delay-4">
        <div class="oy-about-vm__icon" aria-hidden="true">
          <i class="fa-solid fa-bullseye"></i>
        </div>
        <h3 class="oy-about-vm__title">رسالتنا</h3>
        <p class="oy-about-vm__text">
          {{ $vm?->mission_text_ar ?? 'تتمثّل رسالتنا في أورينت يمن في تقديم حلول متكاملة في استيراد وتسويق المنتجات، وبناء علاقات تجارية قائمة على الثقة والاستمرارية، من خلال فهم عميق للأسواق، وإدارة منظّمة لسلاسل التوريد، ودعم العلامات التجارية للوصول إلى حضور تجاري مستقر ومستدام.' }}
        </p>
      </article>
    </div>
  </div>

  <!-- Pattern (same as services section idea) -->
  <div class="oy-about-vm__pattern" aria-hidden="true"></div>
</section>
