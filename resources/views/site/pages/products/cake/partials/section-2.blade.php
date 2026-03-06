<!-- pages/products/cake/partials/section-2.html -->
<!-- ORIENT YEMEN - Cakes Products (Title + Subtitle + Panel / 2 Cards + Ghost Cards) -->

<section class="oy-section oy-products-cake" id="products-cake" aria-label="Cakes Products">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        الكيك
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
        <a href="pages/products/juices/index.html" data-tab="juices" class="oy-products-tabs__tab">العصائر</a>

        <a href="pages/products/cake/index.html" data-tab="cake"
          class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">الكيك</a>
      </nav>

        <!-- Scroll hint arrow (shown only when overflow exists) -->
        <button class="oy-products-tabs__scrollHint" type="button" aria-label="تمرير التبويبات">
          <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
        </button>
      </div>
    </div>

    <!-- Subtitle -->
    <p class="oy-section__text oy-products-tabs__subtitle oy-reveal oy-delay-2">
      تضم هذه الفئة تشكيلة كيك إسفنجي بحشوات لذيذة (فانيليا وشوكولاتة) بطابع أنيق وجودة عالية تناسب كل الأذواق.
    </p>

    <!-- =========================
         PANEL 1 (2 cards + 2 GHOST CARDS) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Cakes Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Cakes Cards Panel">

        <!-- 1) Sponge Cake filled with Vanillin -->
        <article class="oy-sweets-item"
          style="--num-color:#42913D;"
          data-big="Cakes|Vanillin"
          data-details-img="assets/images/products/Cakes/Cakes_details/Sponge%20Cake%20filled%20with%20Vanillin1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Cakes/Sponge%20Cake%20filled%20with%20Vanillin.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Sponge Cake filled with Vanillin</span></h3>
            <p class="oy-sweets-desc">كيك إسفنجي محشو بالفانيليا بنكهة ناعمة ومتوازنة</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 2) Sponge Cake filled with chocolate -->
        <article class="oy-sweets-item"
          style="--num-color:#CC4903;"
          data-big="Cakes|Soreto"
          data-details-img="assets/images/products/Cakes/Cakes_details/Sponge%20Cake%20filled%20with%20chocolate1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/Cakes/Sponge%20Cake%20filled%20with%20chocolate.png" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Sponge Cake filled with chocolate</span></h3>
            <p class="oy-sweets-desc">كيك إسفنجي محشو بالشوكولاتة بمذاق غني ولمسة فاخرة</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!--  Ghost Card 1 -->
        <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

        <!--  Ghost Card 2 -->
        <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

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