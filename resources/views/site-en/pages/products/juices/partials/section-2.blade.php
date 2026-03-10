<!-- pages/products/juices/partials/section-2.html -->
<!-- ORIENT YEMEN - Juices Products (EN) -->

<section class="oy-section oy-products-juices" id="products-juices" aria-label="Juices Products" dir="ltr">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        Juices
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="{{ url('en/products') }}" data-tab="all" class="oy-products-tabs__tab">Featured Products</a>

          <a href="{{ url('en/products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">Coffee</a>

          <a href="{{ url('en/products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">Biscuits & Wafers</a>

          <a href="{{ url('en/products/sweets') }}" data-tab="sour" class="oy-products-tabs__tab">Sour Candy</a>

          <a href="{{ url('en/products/marshmallow') }}" data-tab="sweets" class="oy-products-tabs__tab">Sweets</a>

          <a href="{{ url('en/products/healthy') }}" data-tab="healthy" class="oy-products-tabs__tab">Healthy Products</a>

          <a href="{{ url('en/products/juices') }}" data-tab="juices"
             class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">Juices</a>

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
      This category includes a selection of refreshing juices with fruity character and bright colors, perfect for any time and presented with a light, elegant taste.
    </p>

    <!-- =========================
         PANEL 1 (4 cards) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Juices Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Juices Cards Panel">

        <!-- 1) MANGO -->
        <article class="oy-sweets-item"
          style="--num-color:#F8C225;"
          data-big="Mango">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Juices/1.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juicy Bites Mango Drink</span></h3>
            <p class="oy-sweets-desc">Refreshing mango juice with a smooth fruity taste.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 2) ORANGE -->
        <article class="oy-sweets-item"
          style="--num-color:#F79B20;"
          data-big="Orange">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Juices/2.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juicy Bites Orange Drink</span></h3>
            <p class="oy-sweets-desc">Orange juice with a bright flavor and light refreshment.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 3) PEACH -->
        <article class="oy-sweets-item"
          style="--num-color:#F4AC2D;"
          data-big="Peach">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Juices/3.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juicy Bites Peach Drink</span></h3>
            <p class="oy-sweets-desc">Peach juice with a smooth taste and a refreshing touch.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 4) PINEAPPLE -->
        <article class="oy-sweets-item"
          style="--num-color:#F6DA41;"
          data-big="Pine|apple">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Juices/4.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Juicy Bites Pineapple Drink</span></h3>
            <p class="oy-sweets-desc">Pineapple juice with a tropical character and refreshing taste.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

      </div>

      <!-- Pattern under the end edge (card 4 side) -->
      <img
        class="oy-sweets-panelPattern"
        src="{{ asset('assets/images/patterns/sweets.svg') }}"
        alt=""
        aria-hidden="true"
        loading="lazy"
      >
    </div>

  </div>
</section>