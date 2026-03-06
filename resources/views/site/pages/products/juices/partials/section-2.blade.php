<!-- pages/products/juices/partials/section-2.html -->
<!-- ORIENT YEMEN - Juices Products (Title + Subtitle + Panel / 4 Cards) -->

<section class="oy-section oy-products-juices" id="products-juices" aria-label="Juices Products">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        العصائر
      </h2>

    <!-- Tabs wrap (adds scroll hint arrow) -->
    <div class="oy-products-tabs__tabsWrap">
      <nav class="oy-products-tabs__nav" aria-label="Product filters">
        <a href="pages/products/index.html" data-tab="all" class="oy-products-tabs__tab">جميع المنتجات</a>

        <a href="pages/products/coffee/index.html" data-tab="coffee" class="oy-products-tabs__tab">القهوة</a>

        <a href="pages/products/biscuit/index.html" data-tab="biscuits" class="oy-products-tabs__tab">البسكويت والويفر</a>

        <!--  sour now points to old sweets page -->
        <a href="pages/products/sweets/index.html" data-tab="sour" class="oy-products-tabs__tab">الحلوى الحامضة</a>

        <!--  sweets now goes to marshmallow -->
        <a href="pages/products/marshmallow/index.html" data-tab="sweets" class="oy-products-tabs__tab">الحلويات</a>

        <a href="pages/products/healthy/index.html" data-tab="healthy" class="oy-products-tabs__tab">المنتجات الصحية</a>

        <a href="pages/products/juices/index.html" data-tab="juices"
          class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">العصائر</a>

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
      تضم هذه الفئة تشكيلة عصائر منعشة بطابع فاكهي وألوان مشرقة، مناسبة لكل الأوقات وبمذاق خفيف وأنيق.
    </p>

    <!-- =========================
         PANEL 1 (4 cards) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Juices Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Juices Cards Panel">

        <!-- 1) JUICE 01 -->
        <article class="oy-sweets-item"
          style="--num-color:#F8C225;"
          data-big="JUICES">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Juices/1.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juice 01</span></h3>
            <p class="oy-sweets-desc">عصير فاكهي منعش بطابع خفيف</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 2) JUICE 02 -->
        <article class="oy-sweets-item"
          style="--num-color:#F79B20;"
          data-big="JUICES">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Juices/2.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juice 02</span></h3>
            <p class="oy-sweets-desc">مذاق حيوي بلون دافئ وحضور أنيق</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 3) JUICE 03 -->
        <article class="oy-sweets-item"
          style="--num-color:#F4AC2D;"
          data-big="JUICES">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Juices/3.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juice 03</span></h3>
            <p class="oy-sweets-desc">توازن فاكهي بنكهة ناعمة ومنعشة</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 4) JUICE 04 -->
        <article class="oy-sweets-item"
          style="--num-color:#F6DA41;"
          data-big="JUICES">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Juices/4.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juice 04</span></h3>
            <p class="oy-sweets-desc">انتعاش لامع بطابع فاكهي واضح</p>
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

  </div>
</section>