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
          <a href="{{ url('products') }}" data-tab="all" class="oy-products-tabs__tab">المنتجات المفضلة</a>

          <a href="{{ url('products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">القهوة</a>
          <a href="{{ url('products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">البسكويت والويفر</a>

          <a href="{{ url('products/sweets') }}" data-tab="sour" class="oy-products-tabs__tab">الحلوى الحامضة</a>

          <a href="{{ url('products/marshmallow') }}" data-tab="sweets"
            class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">الحلويات</a>

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
      تضم هذه الفئة تشكيلة حلوى متنوعة بألوان ونكهات لطيفة وتقديم عصري يناسب جميع الأذواق.
    </p>

    <!-- =========================
         PANEL 1 (4 cards) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Marshmallow Cards Panel 1">
      <div class="oy-sweets-panel" aria-label="Marshmallow Cards Panel">

        <!-- 1) Mallow Plus Pink & White -->
        <article class="oy-sweets-item"
          style="--num-color:#D54987;"
          data-big="Mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/Marshmallow3-1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/Marshmallow3.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Pink &amp; White</span></h3>
            <p class="oy-sweets-desc">مارشميلو وردي وأبيض بقوام ناعم</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 2) Mallow Plus Blue & White -->
        <article class="oy-sweets-item"
          style="--num-color:#2CABE0;"
          data-big="Mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/marshmallow1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/marshmallow.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Blue &amp; White</span></h3>
            <p class="oy-sweets-desc">مارشميلو أزرق وأبيض بطابع لطيف</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 3) Mallow Plus Jam Filled Mallow Grape -->
        <article class="oy-sweets-item"
          style="--num-color:#03A9E1;"
          data-big="Mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/mallow%20Plus3-1.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/mallow%20Plus3.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Jam Filled Mallow Grape</span></h3>
            <p class="oy-sweets-desc">مارشميلو محشو بمربى العنب</p>
            <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
          </div>
        </article>

        <!-- 4) Mallow Plus Twist Stick -->
        <article class="oy-sweets-item"
          style="--num-color:#E1598F;"
          data-big="Mallow"
          data-details-img="assets/images/products/marshmallow/marshmallow_details/Mallow%20Plus2.png">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="assets/images/products/marshmallow/Mallow%20Plus1.png" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Twist Stick</span></h3>
            <p class="oy-sweets-desc">مارشميلو ملتف بشكل عصا مرحة</p>
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
         PANEL 2 (4 cards)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Marshmallow Cards Panel 2">

      <!-- 5) Mallow Plus Jam Filled Mallow Grape -->
      <article class="oy-sweets-item"
        style="--num-color:#ABAAEE;"
        data-big="Mallow"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/Mallow%20Plus%20Jam%20Filled%20Mallow1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/Mallow%20Plus%20Jam%20Filled%20Mallow.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">05</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Jam Filled Mallow Grape</span></h3>
          <p class="oy-sweets-desc">مارشميلو بحشوة عنب بطعم لطيف</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 6) Mallow World Minis Marshmallow -->
      <article class="oy-sweets-item"
        style="--num-color:#D1A5BB;"
        data-big="Mallow"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/Flat%20Bag%20Strawberry1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/Flat%20Bag%20Strawberry.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">06</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mallow World Minis Marshmallow</span></h3>
          <p class="oy-sweets-desc">مارشميلو صغير بقوام خفيف وممتع</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 7) Aero Sugar Strawberry Mallow -->
      <article class="oy-sweets-item"
        style="--num-color:#5B266F;"
        data-big="Straw|berry"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/69g%20Flat%20Bag%20Sugar%20Free%20Marshmallow1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/69g%20Flat%20Bag%20Sugar%20Free%20Marshmallow.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">07</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Aero Sugar Strawberry Mallow</span></h3>
          <p class="oy-sweets-desc">مارشميلو فراولة بطعم خفيف ومحبب</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 8) Mallow Plus Twist Mallow -->
      <article class="oy-sweets-item"
        style="--num-color:#AC0369;"
        data-big="Twist"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/63g%20Twisted%20Small1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/63g%20Twisted%20Small.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">08</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Twist Mallow</span></h3>
          <p class="oy-sweets-desc">مارشميلو ملتف بقوام طري وممتع</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 3 (4 cards)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--third oy-reveal oy-delay-3" aria-label="Marshmallow Cards Panel 3">

      <!-- 9) Zero% Sugar Strawberry & Vanilla Mallow -->
      <article class="oy-sweets-item"
        style="--num-color:#4C2A63;"
        data-big="Straw|berry"
        data-details-img="assets/images/products/marshmallow/marshmallow_details/ZER%200%25SUGAR1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/marshmallow/ZER%200%25SUGAR.png" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">09</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Zero% Sugar Strawberry &amp; Vanilla Mallow</span></h3>
          <p class="oy-sweets-desc">مارشميلو فراولة وفانيليا بدون سكر</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 10) Maltreasures -->
      <article class="oy-sweets-item"
        style="--num-color:#B6100C;"
        data-big="Maltre|asures"
        data-details-img="assets/images/products/sweets3/sweets_details/GC 7-1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/GC 7.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">10</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Maltreasures</span></h3>
          <p class="oy-sweets-desc">كرات مقرمشة مغطاة بالشوكولاتة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 11) Love & Passion -->
      <article class="oy-sweets-item"
        style="--num-color:#E16C7F;"
        data-big="Love &|Passion"
        data-details-img="assets/images/products/sweets3/sweets_details/Hartbeat Lychee.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/Hartbeat Lychee1.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">11</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Love &amp; Passion</span></h3>
          <p class="oy-sweets-desc">حلوى جامبو بطابع لطيف ومميز</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 12) Rio Pop -->
      <article class="oy-sweets-item"
        style="--num-color:#D81D21;"
        data-big="Rio|Pop"
        data-details-img="assets/images/products/sweets3/sweets_details/lollipop1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/lollipop.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">12</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Rio Pop</span></h3>
          <p class="oy-sweets-desc">مصاصة بطعم فاكهي ممتع</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 4 (4 cards)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--third oy-reveal oy-delay-3" aria-label="Candy Cards Panel 4">

      <!-- 13) Heart Beat - Blackcurrant -->
      <article class="oy-sweets-item"
        style="--num-color:#985295;"
        data-big="Heart|Beat"
        data-details-img="assets/images/products/sweets3/sweets_details/hartbeat black currant1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/hartbeat black currant.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">13</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Heart Beat</span></h3>
          <p class="oy-sweets-desc">حلوى قلب بنكهة منعشه الأسود</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 14) Mazelo -->
      <article class="oy-sweets-item"
        style="--num-color:#EAE643;"
        data-big="Maz|elo"
        data-details-img="assets/images/products/sweets3/sweets_details/mazelo1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/mazelo.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">14</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mazelo</span></h3>
          <p class="oy-sweets-desc">حلوى مشكلة بنكهات متنوعة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 15) Heart Beat - Mango -->
      <article class="oy-sweets-item"
        style="--num-color:#C3CF29;"
        data-big="Heart|Beat"
        data-details-img="assets/images/products/sweets3/sweets_details/HARTBEAT JUMBO MANGO1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/HARTBEAT JUMBO MANGO.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">15</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Heart Beat</span></h3>
          <p class="oy-sweets-desc">حلوى قلب بنكهة منعشة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 16) Beely Pop -->
      <article class="oy-sweets-item"
        style="--num-color:#CE3C7F;"
        data-big="Beely|Pop"
        data-details-img="assets/images/products/sweets3/sweets_details/lollipop With two different flavor1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/lollipop With two different flavor.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">16</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Beely Pop</span></h3>
          <p class="oy-sweets-desc">مصاصة بطعم مرح ومتنوع</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 5 (3 cards + 1 ghost)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--third oy-reveal oy-delay-3" aria-label="Candy Cards Panel 5">

      <!-- 17) Melody -->
      <article class="oy-sweets-item"
        style="--num-color:#624C2F;"
        data-big="Mel|ody"
        data-details-img="assets/images/products/sweets3/sweets_details/melody1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/melody.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">17</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Melody</span></h3>
          <p class="oy-sweets-desc">حلوى شوكولاتهبطابع كلاسيكي</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 18) Heart Beat - Strawberry -->
      <article class="oy-sweets-item"
        style="--num-color:#CA433E;"
        data-big="Heart|Beat"
        data-details-img="assets/images/products/sweets3/sweets_details/hartbeat jumbo Tutti Fruiti1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/hartbeat jumbo Tutti Fruiti.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">18</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Heart Beat</span></h3>
          <p class="oy-sweets-desc">حلوى قلب بنكهة الفراولة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- 19) H&H -->
      <article class="oy-sweets-item"
        style="--num-color:#4D2D1E;"
        data-big="H&|H"
        data-details-img="assets/images/products/sweets3/sweets_details/Peanuts coated by luxury chocolate1.png">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="assets/images/products/sweets3/Peanuts coated by luxury chocolate.png" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">19</div>
          <h3 class="oy-sweets-title"><span dir="ltr">H&amp;H</span></h3>
          <p class="oy-sweets-desc">فول سوداني مغطى بالشوكولاتة</p>
          <a href="#" class="oy-sweets-btn">معرفة المزيد</a>
        </div>
      </article>

      <!-- Ghost Card -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

    </div>

  </div>
</section>