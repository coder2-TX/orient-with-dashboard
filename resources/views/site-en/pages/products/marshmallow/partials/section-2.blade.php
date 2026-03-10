<!-- pages/products/marshmallow/partials/section-2.html -->
<!-- ORIENT YEMEN - Marshmallow Products (EN) -->

<section class="oy-section oy-products-marshmallow" id="products-marshmallow" aria-label="Sweets Products" dir="ltr">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        Sweets
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="{{ url('en/products') }}" data-tab="all" class="oy-products-tabs__tab">Featured Products</a>

          <a href="{{ url('en/products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">Coffee</a>
          <a href="{{ url('en/products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">Biscuits & Wafers</a>

          <a href="{{ url('en/products/sweets') }}" data-tab="sour" class="oy-products-tabs__tab">Sour Candy</a>

          <a href="{{ url('en/products/marshmallow') }}" data-tab="sweets"
            class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">Sweets</a>

          <a href="{{ url('en/products/healthy') }}" data-tab="healthy" class="oy-products-tabs__tab">Healthy Products</a>
          <a href="{{ url('en/products/juices') }}" data-tab="juices" class="oy-products-tabs__tab">Juices</a>
          <a href="{{ url('en/products/cake') }}" data-tab="cake" class="oy-products-tabs__tab">Cake</a>
        </nav>

        <!-- Scroll hint arrow (shown only when overflow exists) -->
        <button class="oy-products-tabs__scrollHint" type="button" aria-label="Scroll tabs">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>

    <!-- Subtitle -->
    <p class="oy-section__text oy-products-tabs__subtitle oy-reveal oy-delay-2">
      This category includes a varied selection of sweets with pleasant colors, enjoyable flavors, and modern presentation that suits different tastes.
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
          data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/Marshmallow3-1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/marshmallow/Marshmallow3.png') }}" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Pink &amp; White</span></h3>
            <p class="oy-sweets-desc">Pink and white marshmallow with a soft texture.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 2) Mallow Plus Blue & White -->
        <article class="oy-sweets-item"
          style="--num-color:#2CABE0;"
          data-big="Mallow"
          data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/marshmallow1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/marshmallow/marshmallow.png') }}" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Blue &amp; White</span></h3>
            <p class="oy-sweets-desc">Blue and white marshmallow with a gentle character.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 3) Mallow Plus Jam Filled Mallow Grape -->
        <article class="oy-sweets-item"
          style="--num-color:#03A9E1;"
          data-big="Mallow"
          data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/mallow%20Plus3-1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/marshmallow/mallow%20Plus3.png') }}" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Jam Filled Mallow Grape</span></h3>
            <p class="oy-sweets-desc">Marshmallow filled with grape jam.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 4) Mallow Plus Twist Stick -->
        <article class="oy-sweets-item"
          style="--num-color:#E1598F;"
          data-big="Mallow"
          data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/Mallow%20Plus2.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/marshmallow/Mallow%20Plus1.png') }}" alt="" loading="lazy">
          </div>
          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Twist Stick</span></h3>
            <p class="oy-sweets-desc">Twisted marshmallow in a fun stick shape.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

      </div>

      <img
        class="oy-sweets-panelPattern"
        src="{{ asset('assets/images/patterns/sweets.svg') }}"
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
        data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/Mallow%20Plus%20Jam%20Filled%20Mallow1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/marshmallow/Mallow%20Plus%20Jam%20Filled%20Mallow.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">05</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Jam Filled Mallow Grape</span></h3>
          <p class="oy-sweets-desc">Marshmallow with grape filling and a pleasant taste.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 6) Mallow World Minis Marshmallow -->
      <article class="oy-sweets-item"
        style="--num-color:#D1A5BB;"
        data-big="Mallow"
        data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/Flat%20Bag%20Strawberry1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/marshmallow/Flat%20Bag%20Strawberry.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">06</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mallow World Minis Marshmallow</span></h3>
          <p class="oy-sweets-desc">Mini marshmallows with a light and enjoyable texture.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 7) Aero Sugar Strawberry Mallow -->
      <article class="oy-sweets-item"
        style="--num-color:#5B266F;"
        data-big="Straw|berry"
        data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/69g%20Flat%20Bag%20Sugar%20Free%20Marshmallow1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/marshmallow/69g%20Flat%20Bag%20Sugar%20Free%20Marshmallow.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">07</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Aero Sugar Strawberry Mallow</span></h3>
          <p class="oy-sweets-desc">Strawberry marshmallow with a light, enjoyable taste.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 8) Mallow Plus Twist Mallow -->
      <article class="oy-sweets-item"
        style="--num-color:#AC0369;"
        data-big="Twist"
        data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/63g%20Twisted%20Small1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/marshmallow/63g%20Twisted%20Small.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">08</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mallow Plus Twist Mallow</span></h3>
          <p class="oy-sweets-desc">Twisted marshmallow with a soft and fun texture.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
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
        data-details-img="{{ asset('assets/images/products/marshmallow/marshmallow_details/ZER%200%25SUGAR1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/marshmallow/ZER%200%25SUGAR.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">09</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Zero% Sugar Strawberry &amp; Vanilla Mallow</span></h3>
          <p class="oy-sweets-desc">Sugar-free strawberry and vanilla marshmallow.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 10) Maltreasures -->
      <article class="oy-sweets-item"
        style="--num-color:#B6100C;"
        data-big="Maltre|asures"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/GC 7-1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/GC 7.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">10</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Maltreasures</span></h3>
          <p class="oy-sweets-desc">Crunchy chocolate-coated balls.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 11) Love & Passion -->
      <article class="oy-sweets-item"
        style="--num-color:#E16C7F;"
        data-big="Love &|Passion"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/Hartbeat Lychee.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/Hartbeat Lychee1.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">11</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Love &amp; Passion</span></h3>
          <p class="oy-sweets-desc">Jumbo candy with a soft and distinctive character.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 12) Rio Pop -->
      <article class="oy-sweets-item"
        style="--num-color:#D81D21;"
        data-big="Rio|Pop"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/lollipop1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/lollipop.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">12</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Rio Pop</span></h3>
          <p class="oy-sweets-desc">Lollipop with a fun fruity taste.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
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
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/hartbeat black currant1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/hartbeat black currant.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">13</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Heart Beat</span></h3>
          <p class="oy-sweets-desc">Heart-shaped candy with a refreshing blackcurrant flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 14) Mazelo -->
      <article class="oy-sweets-item"
        style="--num-color:#EAE643;"
        data-big="Maz|elo"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/mazelo1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/mazelo.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">14</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Mazelo</span></h3>
          <p class="oy-sweets-desc">Assorted candy with different flavors.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 15) Heart Beat - Mango -->
      <article class="oy-sweets-item"
        style="--num-color:#C3CF29;"
        data-big="Heart|Beat"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/HARTBEAT JUMBO MANGO1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/HARTBEAT JUMBO MANGO.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">15</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Heart Beat</span></h3>
          <p class="oy-sweets-desc">Heart-shaped candy with a refreshing mango flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 16) Beely Pop -->
      <article class="oy-sweets-item"
        style="--num-color:#CE3C7F;"
        data-big="Beely|Pop"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/lollipop With two different flavor1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/lollipop With two different flavor.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">16</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Beely Pop</span></h3>
          <p class="oy-sweets-desc">Lollipop with a playful mixed flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
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
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/melody1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/melody.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">17</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Melody</span></h3>
          <p class="oy-sweets-desc">Chocolate candy with a classic character.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 18) Heart Beat - Strawberry -->
      <article class="oy-sweets-item"
        style="--num-color:#CA433E;"
        data-big="Heart|Beat"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/hartbeat jumbo Tutti Fruiti1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/hartbeat jumbo Tutti Fruiti.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">18</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Heart Beat</span></h3>
          <p class="oy-sweets-desc">Heart-shaped candy with a strawberry flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 19) H&H -->
      <article class="oy-sweets-item"
        style="--num-color:#4D2D1E;"
        data-big="H&|H"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/Peanuts coated by luxury chocolate1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/Peanuts coated by luxury chocolate.png') }}" alt="" loading="lazy">
        </div>
        <div class="oy-sweets-content">
          <div class="oy-sweets-num">19</div>
          <h3 class="oy-sweets-title"><span dir="ltr">H&amp;H</span></h3>
          <p class="oy-sweets-desc">Peanuts coated with chocolate.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- Ghost Card -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

    </div>

  </div>
</section>