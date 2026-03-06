<!-- pages/products/sweets/partials/section-2.html -->
<!-- ORIENT YEMEN - Sweets Products (Title + Subtitle + 2 Panels / 8 Cards) -->

<section class="oy-section oy-products-sweets" id="products-sweets" aria-label="Sweets Products">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        منتجات الحلوى
      </h2>

  <!-- Tabs wrap (adds scroll hint arrow) -->
  <div class="oy-products-tabs__tabsWrap">
    <nav class="oy-products-tabs__nav" aria-label="Product filters">
      <a href="pages/products/index.html" data-tab="all" class="oy-products-tabs__tab">جميع المنتجات</a>

      <a href="pages/products/coffee/index.html" data-tab="coffee" class="oy-products-tabs__tab">القهوة</a>
      <a href="pages/products/biscuit/index.html" data-tab="biscuits" class="oy-products-tabs__tab">البسكويت والويفر</a>

      <!--  sour becomes active here -->
      <a href="pages/products/sweets/index.html" data-tab="sour"
        class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">الحلوى الحامضة</a>

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
      تندرج ضمن هذه الفئة منتجات الحلوى التي تم تقديمها بأسلوب يعكس التنوع والابتكار، مع الحفاظ على هوية واضحة وحضور متوازن داخل الأسواق.
    </p>

    <!-- =========================
         PANEL 1 (Original) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Sweets Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Sweets Cards Panel">

        <article class="oy-sweets-item" style="--num-color:#98008A;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/sweets/1.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Strawberry Flavour</span></h3>
            <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة التوت</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <article class="oy-sweets-item" style="--num-color:#1B1114;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/sweets/2.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Cola Flavour</span></h3>
            <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة الكولا</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <article class="oy-sweets-item" style="--num-color:#8FC301;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/sweets/3.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Apple Flavour</span></h3>
            <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة التفاح</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <article class="oy-sweets-item" style="--num-color:#CA000E;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/sweets/4.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Blueberry Flavour</span></h3>
            <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة الفراولة</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

      </div>

      <!--  Pattern under the end edge (card 4 side) -->
      <img
        class="oy-sweets-panelPattern"
        src="assets/images/patterns/sweets.svg"
        alt=""
        aria-hidden="true"
        loading="lazy"
      >
    </div>

    <!-- =========================
         PANEL 2 (NEW / same exact layout)
         Only: colors + images + big title
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Sweets Cards Panel 2">

      <article class="oy-sweets-item" style="--num-color:#D62C7E;" data-big="Extreme.Z" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets2/1.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Strawberry Flavour</span></h3>
          <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة التوت</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#872419;" data-big="Extreme.Z" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets2/2.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Cola Flavour</span></h3>
          <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة الكولا</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#88BF40;" data-big="Extreme.Z" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets2/3.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Apple Flavour</span></h3>
          <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة التفاح</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#EF2186;" data-big="ZazZy" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets2/4.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Blueberry Flavour</span></h3>
          <p class="oy-sweets-desc">أصابع حلوى حامضة بنكهة الفراولة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

  </div>
</section>
