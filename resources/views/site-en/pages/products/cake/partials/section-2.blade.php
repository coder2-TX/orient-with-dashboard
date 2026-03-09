<!-- pages/products/cake/partials/section-2.html -->
<!-- ORIENT YEMEN - Cakes Products (EN) -->

<section class="oy-section oy-products-cake" id="products-cake" aria-label="Cake Products" dir="ltr">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        Cake
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
          <a href="{{ url('en/products/juices') }}" data-tab="juices" class="oy-products-tabs__tab">Juices</a>

          <a href="{{ url('en/products/cake') }}" data-tab="cake"
             class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">Cake</a>
        </nav>

        <!-- Scroll hint arrow (shown only when overflow exists) -->
        <button class="oy-products-tabs__scrollHint" type="button" aria-label="Scroll tabs">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>

    <!-- Subtitle -->
    <p class="oy-section__text oy-products-tabs__subtitle oy-reveal oy-delay-2">
      This category includes a selection of sponge cakes with delicious fillings such as vanilla and chocolate, presented with elegant style and high quality to suit different tastes.
    </p>

    <!-- =========================
         PANEL 1 (2 cards + 2 GHOST CARDS) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Cake Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Cake Cards Panel">

        <!-- 1) SORETO VANILLIN -->
        <article class="oy-sweets-item"
          style="--num-color:#42913D;"
          data-big="Soreto"
          data-details-img="{{ asset('assets/images/products/Cakes/Cakes_details/Sponge%20Cake%20filled%20with%20Vanillin1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Cakes/Sponge%20Cake%20filled%20with%20Vanillin.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Sponge Cake filled with Vanillin</span></h3>
            <p class="oy-sweets-desc">Soft sponge cake with a smooth vanilla filling.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 2) SORETO CHOCOLATE -->
        <article class="oy-sweets-item"
          style="--num-color:#CC4903;"
          data-big="Soreto"
          data-details-img="{{ asset('assets/images/products/Cakes/Cakes_details/Sponge%20Cake%20filled%20with%20chocolate1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Cakes/Sponge%20Cake%20filled%20with%20chocolate.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Sponge Cake filled with chocolate</span></h3>
            <p class="oy-sweets-desc">Soft sponge cake with a rich chocolate filling.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- Ghost Card 1 -->
        <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

        <!-- Ghost Card 2 -->
        <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

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