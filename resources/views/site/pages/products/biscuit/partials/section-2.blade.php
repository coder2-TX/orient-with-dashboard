<!-- pages/products/biscuit/partials/section-2.html -->
<!-- ORIENT YEMEN - Biscuit Products (Title + Subtitle + Panels / 4 Cards + Ghost Cards) -->

<section class="oy-section oy-products-biscuit" id="products-biscuit" aria-label="Biscuit Products">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        البسكويت والويفر
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="pages/products/index.html" data-tab="all" class="oy-products-tabs__tab">جميع المنتجات</a>

          <a href="pages/products/coffee/index.html" data-tab="coffee" class="oy-products-tabs__tab">القهوة</a>

          <a href="pages/products/biscuit/index.html" data-tab="biscuits"
            class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">البسكويت والويفر</a>

          <!--  sour now points to old sweets page -->
          <a href="pages/products/sweets/index.html" data-tab="sour" class="oy-products-tabs__tab">الحلوى الحامضة</a>

          <!--  sweets now goes to marshmallow -->
          <a href="pages/products/marshmallow/index.html" data-tab="sweets" class="oy-products-tabs__tab">الحلويات</a>

          <a href="pages/products/healthy/index.html" data-tab="healthy" class="oy-products-tabs__tab">المنتجات الصحية</a>
          <a href="pages/products/juices/index.html" data-tab="juices" class="oy-products-tabs__tab">العصائر</a>
          <a href="pages/products/cake/index.html" data-tab="cake" class="oy-products-tabs__tab">الكيك</a>
        </nav>

        <!-- Scroll hint arrow (shown only when overflow exists) -->
        <button class="oy-products-tabs__scrollHint" type="button" aria-label="تمرير التبويبات">
          <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
        </button>
      </div>

    </div>

    <!-- Subtitle -->
    <p class="oy-section__text oy-products-tabs__subtitle oy-reveal oy-delay-2">
      تضم هذه الفئة تشكيلة متنوعة من البسكويت والويفر بمذاقات متعددة، قوام مقرمش، ولمسة عصرية تناسب مختلف الأذواق.
    </p>

    <!-- =========================
         PANEL 1 (4 cards) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Biscuit Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Biscuit Cards Panel">

        <!-- 1) PARLE -->
        <article class="oy-sweets-item"
          style="--num-color:#FBDB69;"
          data-big="BIS|CUIT"
          data-details-img="assets/images/products/Biscuits/Biscuits_details/PARLE1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Biscuits/PARLE.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">PARLE</span></h3>
            <p class="oy-sweets-desc">بسكويت خفيف بطعم كلاسيكي محبّب</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 2) NICE -->
        <article class="oy-sweets-item"
          style="--num-color:#0D4AB2;"
          data-big="BIS|CUIT"
          data-details-img="assets/images/products/Biscuits/Biscuits_details/NICE1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Biscuits/NICE.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">NICE</span></h3>
            <p class="oy-sweets-desc">بسكويت بنكهة مميزة وقوام متوازن</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 3) MINIS MURANO -->
        <article class="oy-sweets-item"
          style="--num-color:#7D125B;"
          data-big="BIS|CUIT"
          data-details-img="assets/images/products/Biscuits/Biscuits_details/MINIS%20MURANO1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Biscuits/MINIS%20MURANO.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">MINIS MURANO</span></h3>
            <p class="oy-sweets-desc">قطع ميني مقرمشة بطابع فاخر</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 4) LITE CRACKERS -->
        <article class="oy-sweets-item"
          style="--num-color:#478929;"
          data-big="BIS|CUIT"
          data-details-img="assets/images/products/Biscuits/Biscuits_details/LITE%20CRACKERS1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Biscuits/LITE%20CRACKERS.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">LITE CRACKERS</span></h3>
            <p class="oy-sweets-desc">كراكرز خفيف ومقرمش للاستخدام اليومي</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

      </div>

      <!-- Pattern under the end edge (card 4 side) -->
      <img
        class="oy-sweets-panelPattern"
        src="assets/images/patterns/sweets.svg"
        alt=""
        aria-hidden="true"
        loading="lazy"
      >
    </div>

    <!-- =========================
         PANEL 2 (4 cards)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Biscuit Cards Panel 2">

      <!-- 1) HIDE & SEEK -->
      <article class="oy-sweets-item"
        style="--num-color:#620C83;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/HIDE%20%26SEEK1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/HIDE%20%26SEEK.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">HIDE &amp; SEEK</span></h3>
          <p class="oy-sweets-desc">بسكويت بطابع شوكولاتة ممتع</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 2) FAB & HIED & SEEK CHOCOLATE -->
      <article class="oy-sweets-item"
        style="--num-color:#784895;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/FAB%26%20HIED%20%26%20SEEK%20CHOCOLATE1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/FAB%26%20HIED%20%26%20SEEK%20CHOCOLATE.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">FAB CHOCOLATE</span></h3>
          <p class="oy-sweets-desc">مزيج شوكولاتة غني بلمسة فاخرة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 3) FAB & HIED SEEK VANIELA -->
      <article class="oy-sweets-item"
        style="--num-color:#55B3D0;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/FAB%20%26%20HIED%20SEEK%20VANIELA1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/FAB%20%26%20HIED%20SEEK%20VANIELA.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">FAB VANILLA</span></h3>
          <p class="oy-sweets-desc">فانيلا ناعمة بنكهة متوازنة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 4) FAB & HIED SEEK STRAWBEERY -->
      <article class="oy-sweets-item"
        style="--num-color:#E199AA;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/FAB%20%26%20HIED%20SEEK%20STRAWBEERY1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/FAB%20%26%20HIED%20SEEK%20STRAWBEERY.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">FAB STRAWBEERY</span></h3>
          <p class="oy-sweets-desc">فراولة لطيفة بنكهة منعشة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 3 (4 cards)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--third oy-reveal oy-delay-3" aria-label="Biscuit Cards Panel 3">

      <!-- 1) DIGESTIVE -->
      <article class="oy-sweets-item"
        style="--num-color:#FFE766;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/DIGESTIVE1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/DIGESTIVE.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">DIGESTIVE</span></h3>
          <p class="oy-sweets-desc">دايجستيف بقوام متماسك وطعم متوازن</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 2) CHOCOLATE DIGESTIVE -->
      <article class="oy-sweets-item"
        style="--num-color:#625298;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/CHOCOLATE%20DIGESTIVE1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/CHOCOLATE%20DIGESTIVE.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">CHOCOLATE DIGESTIVE</span></h3>
          <p class="oy-sweets-desc">دايجستيف بالشوكولاتة بطعم أغنى</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 3) BOURBON -->
      <article class="oy-sweets-item"
        style="--num-color:#4C2577;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/BOURBON1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/BOURBON.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">BOURBON</span></h3>
          <p class="oy-sweets-desc">بوربون بحشوة شوكولاتة كلاسيكية</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 4) 1 -->
      <article class="oy-sweets-item"
        style="--num-color:#9D734E;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/1.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">1</span></h3>
          <p class="oy-sweets-desc">خيار بسكويت مميز بقوام مقرمش</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 4 (4 cards)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--fourth oy-reveal oy-delay-3" aria-label="Biscuit Cards Panel 4">

      <!-- 1) 2 -->
      <article class="oy-sweets-item"
        style="--num-color:#53341E;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/2.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/2.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">2</span></h3>
          <p class="oy-sweets-desc">مذاق متوازن ولمسة خفيفة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 2) 3 -->
      <article class="oy-sweets-item"
        style="--num-color:#80B701;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/3.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/3.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">3</span></h3>
          <p class="oy-sweets-desc">قرمشة واضحة بطابع عصري</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 3) 4 -->
      <article class="oy-sweets-item"
        style="--num-color:#105987;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/4.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/4.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">4</span></h3>
          <p class="oy-sweets-desc">نكهة أغنى وقوام متماسك</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 4) 5 -->
      <article class="oy-sweets-item"
        style="--num-color:#BB1F31;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/5.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/5.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">5</span></h3>
          <p class="oy-sweets-desc">طابع قوي ولمسة مميزة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 5 (2 cards + 2 GHOST CARDS)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--fifth oy-reveal oy-delay-3" aria-label="Biscuit Cards Panel 5">

      <!-- 1) 6 -->
      <article class="oy-sweets-item"
        style="--num-color:#BF8540;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/6.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/6.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">6</span></h3>
          <p class="oy-sweets-desc">قوام مقرمش ومذاق لطيف</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 2) 7 -->
      <article class="oy-sweets-item"
        style="--num-color:#A34232;"
        data-big="BIS|CUIT"
        data-details-img="assets/images/products/Biscuits/Biscuits_details/7.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/Biscuits/7.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">7</span></h3>
          <p class="oy-sweets-desc">خيار غني بطابع مميز</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!--  Ghost Card 1 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

      <!--  Ghost Card 2 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

    </div>

  </div>
</section>