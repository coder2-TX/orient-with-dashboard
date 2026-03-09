<!-- pages/products/healthy/partials/section-2.html -->
<!-- ORIENT YEMEN - Healthy Products (EN) -->

<section class="oy-section oy-products-healthy" id="products-healthy" aria-label="Healthy Products" dir="ltr">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        Healthy Products
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="{{ url('en/products') }}" data-tab="all" class="oy-products-tabs__tab">Featured Products</a>

          <a href="{{ url('en/products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">Coffee</a>
          <a href="{{ url('en/products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">Biscuits & Wafers</a>

          <a href="{{ url('en/products/sweets') }}" data-tab="sour" class="oy-products-tabs__tab">Sour Candy</a>

          <a href="{{ url('en/products/marshmallow') }}" data-tab="sweets" class="oy-products-tabs__tab">Sweets</a>

          <a href="{{ url('en/products/healthy') }}" data-tab="healthy"
             class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">Healthy Products</a>

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
      This category includes Diet Line products developed to offer a balanced taste and lighter choices, while maintaining clear quality and an elegant market presence.
    </p>

    <!-- =========================
         PANEL 1 (4 cards) + Pattern under end of card 4
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Healthy Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Healthy Cards Panel">

        <!-- 1) CEREAL TREATS -->
        <article class="oy-sweets-item"
          style="--num-color:#539C27;"
          data-big="Cereal|Treats"
          data-details-img="{{ asset('assets/images/products/Diet_line/Diet_line_details/CEREAL%20TREAT%20WTH%20CRAN%20BRRIES1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Diet_line/CEREAL%20TREAT%20WTH%20CRAN%20BRRIES.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Cereal Treats with Cranberries</span></h3>
            <p class="oy-sweets-desc">Light cereal treats with cranberry pieces.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 2) CEREAL TREATS -->
        <article class="oy-sweets-item"
          style="--num-color:#96AC90;"
          data-big="Cereal|Treats"
          data-details-img="{{ asset('assets/images/products/Diet_line/Diet_line_details/CEREAL%20TREAT1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Diet_line/CEREAL%20TREAT.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Healthline Cereal Treats with Honey, Milk &amp; Choc Chips</span></h3>
            <p class="oy-sweets-desc">Cereal treats with honey, milk, and chocolate chips.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 3) CHOC CHIP -->
        <article class="oy-sweets-item"
          style="--num-color:#4C125C;"
          data-big="Choc|Chip"
          data-details-img="{{ asset('assets/images/products/Diet_line/Diet_line_details/CHOC%20CHIP%20%26HAZELNUT%20COOKIESS1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Diet_line/CHOC%20CHIP%20%26HAZELNUT%20COOKIESS.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Choc Chip &amp; Hazelnut Cookies</span></h3>
            <p class="oy-sweets-desc">Cookies with chocolate chips and hazelnut.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <!-- 4) CHOCOLATE -->
        <article class="oy-sweets-item"
          style="--num-color:#191857;"
          data-big="Choco|late"
          data-details-img="{{ asset('assets/images/products/Diet_line/Diet_line_details/CHOCOLATE%20DIGESTIVE1.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/Diet_line/CHOCOLATE%20DIGESTIVE.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Chocolate Digestive</span></h3>
            <p class="oy-sweets-desc">Digestive biscuits with a light chocolate coating.</p>
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
         PANEL 2 (3 cards + 1 ghost slot)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Healthy Cards Panel 2">

      <!-- 5) MORNING -->
      <article class="oy-sweets-item"
        style="--num-color:#7780BA;"
        data-big="Morn|ing"
        data-details-img="{{ asset('assets/images/products/Diet_line/Diet_line_details/Devon%20Morning%20Coffee%20Light1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/Diet_line/Devon%20Morning%20Coffee%20Light.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">05</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Morning Coffee Semi-Sweet Biscuits</span></h3>
          <p class="oy-sweets-desc">Morning coffee biscuits with light sweetness.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 6) DIGESTIVE -->
      <article class="oy-sweets-item"
        style="--num-color:#C22714;"
        data-big="Diges|tive"
        data-details-img="{{ asset('assets/images/products/Diet_line/Diet_line_details/DIGESTIVE%20BISCUITS1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/Diet_line/DIGESTIVE%20BISCUITS.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">06</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Digestive Biscuits Light</span></h3>
          <p class="oy-sweets-desc">Light digestive biscuits with a balanced character.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- 7) TEA BISCUITS -->
      <article class="oy-sweets-item"
        style="--num-color:#3C823B;"
        data-big="Tea|Biscuits"
        data-details-img="{{ asset('assets/images/products/Diet_line/Diet_line_details/TEA%20BISCUITS1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/Diet_line/TEA%20BISCUITS.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">07</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Tea Biscuits Sugar Free</span></h3>
          <p class="oy-sweets-desc">Sugar-free tea biscuits.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <!-- Ghost slot -->
      <div class="oy-sweets-gap" aria-hidden="true"></div>

    </div>

  </div>
</section>