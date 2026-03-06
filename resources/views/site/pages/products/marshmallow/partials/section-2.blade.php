<!-- pages/products/marshmallow/partials/section-2.html -->
<!-- ORIENT YEMEN - Marshmallow Products (Title + Subtitle + Panels) -->

<section class="oy-section oy-products-marshmallow" id="products-marshmallow" aria-label="Marshmallow Products">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        الحلوى
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="pages/products/index.html" data-tab="all" class="oy-products-tabs__tab">جميع المنتجات</a>

          <a href="pages/products/coffee/index.html" data-tab="coffee" class="oy-products-tabs__tab">القهوة</a>
          <a href="pages/products/biscuit/index.html" data-tab="biscuits" class="oy-products-tabs__tab">البسكويت والويفر</a>

          <!--  sour now points to old sweets page -->
          <a href="pages/products/sweets/index.html" data-tab="sour" class="oy-products-tabs__tab">الحلوى الحامضة</a>

          <!--  sweets tab now opens marshmallow page (active here) -->
          <a href="pages/products/marshmallow/index.html" data-tab="sweets"
            class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">الحلويات</a>

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
      تضم هذه الفئة تشكيلة حلوى متنوعة بألوان ونكهات لطيفة وتقديم عصري يناسب جميع الأذواق.
    </p>

    <!-- =========================
         PANEL 1 (4 cards) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Marshmallow Cards Panel 1">
      <div class="oy-sweets-panel" aria-label="Marshmallow Cards Panel">

        <!-- 1) Marshmallow3 -->
        <article class="oy-sweets-item"
          style="--num-color:#D54987;"
          data-big="Marsh|mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/Marshmallow3-1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/Marshmallow3.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Marshmallow3</span></h3>
            <p class="oy-sweets-desc">مارشميلو ناعم بقوام لطيف</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 2) marshmallow -->
        <article class="oy-sweets-item"
          style="--num-color:#2CABE0;"
          data-big="Marsh|mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/marshmallow1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/marshmallow.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">marshmallow</span></h3>
            <p class="oy-sweets-desc">طعم خفيف ولمسة حلوة</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 3) mallow Plus3 -->
        <article class="oy-sweets-item"
          style="--num-color:#03A9E1;"
          data-big="Marsh|mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/mallow%20Plus3-1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/mallow%20Plus3.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">mallow Plus3</span></h3>
            <p class="oy-sweets-desc">قوام أنعم وتجربة ممتعة</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 4) Mallow Plus1 -->
        <article class="oy-sweets-item"
          style="--num-color:#E1598F;"
          data-big="Marsh|mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/Mallow%20Plus2.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/Mallow%20Plus1.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus1</span></h3>
            <p class="oy-sweets-desc">حلاوة متوازنة بشكل أنيق</p>
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
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Marshmallow Cards Panel 2">

      <!-- 1) Mallow Plus Jam Filled Mallow -->
      <article class="oy-sweets-item"
        style="--num-color:#ABAAEE;"
        data-big="Marsh|mallow"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/Mallow%20Plus%20Jam%20Filled%20Mallow1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/Mallow%20Plus%20Jam%20Filled%20Mallow.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Jam Filled Mallow</span></h3>
          <p class="oy-sweets-desc">حشوة مربى بطابع لطيف</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 2) Flat Bag Strawberry -->
      <article class="oy-sweets-item"
        style="--num-color:#D1A5BB;"
        data-big="Marsh|mallow"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/Flat%20Bag%20Strawberry1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/Flat%20Bag%20Strawberry.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Flat Bag Strawberry</span></h3>
          <p class="oy-sweets-desc">لمسة فراولة بنكهة محببة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 3) 69g Flat Bag Sugar Free Marshmallow -->
      <article class="oy-sweets-item"
        style="--num-color:#5B266F;"
        data-big="Marsh|mallow"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/69g%20Flat%20Bag%20Sugar%20Free%20Marshmallow1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/69g%20Flat%20Bag%20Sugar%20Free%20Marshmallow.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">69g Flat Bag Sugar Free Marshmallow</span></h3>
          <p class="oy-sweets-desc">خيار بدون سكر بطعم لطيف</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 4) 63g Twisted Small -->
      <article class="oy-sweets-item"
        style="--num-color:#AC0369;"
        data-big="Marsh|mallow"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/63g%20Twisted%20Small1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/63g%20Twisted%20Small.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">63g Twisted Small</span></h3>
          <p class="oy-sweets-desc">حجم صغير بشكل ملتف جذاب</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 3 (1 card + 3 GHOST)   ZER 0%SUGAR
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--third oy-reveal oy-delay-3" aria-label="Marshmallow Cards Panel 3">

      <!-- 1) ZER 0%SUGAR -->
      <article class="oy-sweets-item"
        style="--num-color:#4C2A63;"
        data-big="Marsh|mallow"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/ZER%200%25SUGAR1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/ZER%200%25SUGAR.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">ZER 0%SUGAR</span></h3>
          <p class="oy-sweets-desc">مارشميلو بدون سكر بطابع عصري</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!--  Ghost Card 1 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>
      <!--  Ghost Card 2 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>
      <!--  Ghost Card 3 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

    </div>

  </div>
</section>