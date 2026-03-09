<!-- pages/products/sweets/partials/section-2.html -->
<!-- ORIENT YEMEN - Sweets Products (Title + Subtitle + Multi Panels) -->

<section class="oy-section oy-products-sweets" id="products-sweets" aria-label="Sweets Products">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        الحلوى الحامضة
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
			<a href="{{ url('products') }}" data-tab="all" class="oy-products-tabs__tab">المنتجات المفضلة</a>

			<a href="{{ url('products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">القهوة</a>
			<a href="{{ url('products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">البسكويت والويفر</a>

			<a href="{{ url('products/sweets') }}" data-tab="sour"
			  class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">الحلوى الحامضة</a>

			<a href="{{ url('products/marshmallow') }}" data-tab="sweets" class="oy-products-tabs__tab">الحلويات</a>

			<a href="{{ url('products/healthy') }}" data-tab="healthy" class="oy-products-tabs__tab">المنتجات الصحية</a>
			<a href="{{ url('products/juices') }}" data-tab="juices" class="oy-products-tabs__tab">العصائر</a>
			<a href="{{ url('products/cake') }}" data-tab="cake" class="oy-products-tabs__tab">الكيك</a>
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
         PANEL 1
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Sweets Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Sweets Cards Panel">

        <article class="oy-sweets-item" style="--num-color:#98008A;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets/sweets_details/SOURPUNK Strawberry.png">
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

        <article class="oy-sweets-item" style="--num-color:#1B1114;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets/sweets_details/SOURPUNK Cola.png">
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

        <article class="oy-sweets-item" style="--num-color:#8FC301;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets/sweets_details/SOURPUNK apples.png">
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

        <article class="oy-sweets-item" style="--num-color:#CA000E;" data-big="SOUR|ZANK" data-details-img="assets/images/products/sweets/sweets_details/SOURPUNK Berries.png">
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

      <img
        class="oy-sweets-panelPattern"
        src="assets/images/patterns/sweets.svg"
        alt=""
        aria-hidden="true"
        loading="lazy"
      >
    </div>

    <!-- =========================
         PANEL 2
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Sweets Cards Panel 2">

      <article class="oy-sweets-item" style="--num-color:#D62C7E;" data-big="Extre|me.Z" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
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

      <article class="oy-sweets-item" style="--num-color:#872419;" data-big="Extre|me.Z" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
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

      <article class="oy-sweets-item" style="--num-color:#88BF40;" data-big="Extre|me.Z" data-details-img="assets/images/products/sweets2/sweets_details/1.png">
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

    <!-- =========================
         PANEL 3
    ========================== -->
    <div class="oy-sweets-panel oy-reveal oy-delay-3" aria-label="Sweets Cards Panel 3">

      <article class="oy-sweets-item" style="--num-color:#B6100C;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/GC 7-1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/GC 7.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">GC 7</span></h3>
          <p class="oy-sweets-desc">منتج حلوى بنكهة مميزة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#E16C7F;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/Hartbeat Lychee.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/Hartbeat Lychee1.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Hartbeat Lychee</span></h3>
          <p class="oy-sweets-desc">حلوى بنكهة الليتشي</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#D81D21;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/lollipop1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/lollipop.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Lollipop</span></h3>
          <p class="oy-sweets-desc">مصاصة بنكهات متنوعة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#985295;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/hartbeat black currant1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/hartbeat black currant.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Hartbeat Black Currant</span></h3>
          <p class="oy-sweets-desc">حلوى بنكهة الكشمش الأسود</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 4
    ========================== -->
    <div class="oy-sweets-panel oy-reveal oy-delay-3" aria-label="Sweets Cards Panel 4">

      <article class="oy-sweets-item" style="--num-color:#C43332;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/1-1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/1.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Hartbeat Mix</span></h3>
          <p class="oy-sweets-desc">تشكيلة حلوى بنكهات متنوعة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#EAE643;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/mazelo1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/mazelo.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mazelo</span></h3>
          <p class="oy-sweets-desc">حلوى بطعم مميز</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#C3CF29;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/HARTBEAT JUMBO MANGO1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/HARTBEAT JUMBO MANGO.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">HARTBEAT JUMBO MANGO</span></h3>
          <p class="oy-sweets-desc">حلوى جامبو بنكهة المانجو</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#CE3C7F;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/lollipop With two different flavor1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/lollipop With two different flavor.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Lollipop With Two Different Flavor</span></h3>
          <p class="oy-sweets-desc">مصاصة بنكهتين مختلفتين</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 5
    ========================== -->
    <div class="oy-sweets-panel oy-reveal oy-delay-3" aria-label="Sweets Cards Panel 5">

      <article class="oy-sweets-item" style="--num-color:#624C2F;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/melody1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/melody.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Melody</span></h3>
          <p class="oy-sweets-desc">حلوى بطابع كلاسيكي مميز</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#CA433E;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/hartbeat jumbo Tutti Fruiti1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/hartbeat jumbo Tutti Fruiti.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Hartbeat Jumbo Tutti Fruiti</span></h3>
          <p class="oy-sweets-desc">حلوى جامبو بنكهة توتي فروتي</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#C81C1F;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/lollipop With two different flavors (Strawberry- cherries-Cola-watermelon-Orange –Cantaloupe)1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/lollipop With two different flavors (Strawberry- cherries-Cola-watermelon-Orange –Cantaloupe).png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Lollipop With Two Different Flavors</span></h3>
          <p class="oy-sweets-desc">مصاصة بنكهات متعددة ومختلفة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#4D2D1E;" data-big="Sweets|3" data-details-img="assets/images/products/sweets3/sweets_details/Peanuts coated by luxury chocolate1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/Peanuts coated by luxury chocolate.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Peanuts Coated by Luxury Chocolate</span></h3>
          <p class="oy-sweets-desc">فول سوداني مغطى بشوكولاتة فاخرة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

  </div>
</section>