<!-- pages/products/coffee/partials/section-2.html -->
<!-- ORIENT YEMEN - Coffee Products (EN) -->

<section class="oy-section oy-products-coffee" id="products-coffee" aria-label="Coffee Products" dir="ltr">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        Coffee
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="{{ url('en/products') }}" data-tab="all" class="oy-products-tabs__tab">Featured Products</a>

          <a href="{{ url('en/products/coffee') }}" data-tab="coffee"
             class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">Coffee</a>

          <a href="{{ url('en/products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">Biscuits & Wafers</a>

          <a href="{{ url('en/products/sweets') }}" data-tab="sour" class="oy-products-tabs__tab">Sour Candy</a>

          <a href="{{ url('en/products/marshmallow') }}" data-tab="sweets" class="oy-products-tabs__tab">Sweets</a>

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
      This category features a modern selection of coffee products with varied flavors, elegant presentation, and clear quality that suits different tastes.
    </p>

    <!-- =========================
         PANEL 1 (4 cards) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Coffee Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Coffee Cards Panel">

        <!-- 1) HAZELNUT -->
        <article class="oy-sweets-item"
          style="--num-color:#184E32;"
          data-big="Hazel|nut"
          data-details-img="{{ asset('assets/images/products/coffee/coffee_details/HAZELNUT1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/coffee/HAZELNUT.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Delizio Caffino Cappuccino Hazelnut</span></h3>
            <p class="oy-sweets-desc">A rich cappuccino with hazelnut flavor and a smooth finish.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 2) MOCCA -->
        <article class="oy-sweets-item"
          style="--num-color:#8E3330;"
          data-big="Mocca"
          data-details-img="{{ asset('assets/images/products/coffee/coffee_details/Coffee%20MOCHA1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/coffee/Coffee%20MOCHA.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Delizio Caffino Kopi Latte Mocca</span></h3>
            <p class="oy-sweets-desc">Mocha latte with a rich character and balanced taste.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 3) GOLD -->
        <article class="oy-sweets-item"
          style="--num-color:#DDBE97;"
          data-big="Gold"
          data-details-img="{{ asset('assets/images/products/coffee/coffee_details/Coffee%20gold1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/coffee/Coffee%20gold.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Delizio Caffino Dark Cappuccino Gold</span></h3>
            <p class="oy-sweets-desc">Dark cappuccino with a balanced golden taste.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 4) BOLD -->
        <article class="oy-sweets-item"
          style="--num-color:#25201D;"
          data-big="Bold"
          data-details-img="{{ asset('assets/images/products/coffee/coffee_details/Coffee%20bold1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/coffee/Coffee%20bold.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Delizio Caffino Premium Coffee Latte Bold</span></h3>
            <p class="oy-sweets-desc">Strong latte with a concentrated flavor and a bold character.</p>
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

    <!-- =========================
         PANEL 2 (1 card + 3 GHOST CARDS as real .oy-sweets-item)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Coffee Cards Panel 2">

      <!-- 5) CLASSIC -->
      <article class="oy-sweets-item"
        style="--num-color:#634037;"
        data-big="Classic"
        data-details-img="{{ asset('assets/images/products/coffee/coffee_details/CLASSIC%20COFFEE1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/coffee/CLASSIC%20COFFEE.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">05</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Delizio Caffino Cappuccino</span></h3>
          <p class="oy-sweets-desc">Classic cappuccino with an authentic, balanced taste.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- Ghost Card 1 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

      <!-- Ghost Card 2 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

      <!-- Ghost Card 3 -->
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

    </div>

  </div>
</section>