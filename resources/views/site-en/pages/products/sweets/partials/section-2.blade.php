<!-- pages/products/sweets/partials/section-2.html -->
<!-- ORIENT YEMEN - Sour Candy Products (EN) -->

<section class="oy-section oy-products-sweets" id="products-sweets" aria-label="Sour Candy Products" dir="ltr">
  <div class="oy-section__inner">

    <!-- Head: title + tabs -->
    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        Sour Candy
      </h2>

      <!-- Tabs wrap (adds scroll hint arrow) -->
      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="{{ url('en/products') }}" data-tab="all" class="oy-products-tabs__tab">Featured Products</a>

          <a href="{{ url('en/products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">Coffee</a>
          <a href="{{ url('en/products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">Biscuits & Wafers</a>

          <a href="{{ url('en/products/sweets') }}" data-tab="sour"
            class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">Sour Candy</a>

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
      This category includes candy products presented in a way that reflects variety and innovation, while maintaining a clear identity and a balanced presence in the market.
    </p>

    <!-- =========================
         PANEL 1
    ========================== -->
    <div class="oy-sweets-panelWrap oy-reveal oy-delay-3" aria-label="Sour Candy Cards Panel 1">

      <div class="oy-sweets-panel" aria-label="Sour Candy Cards Panel">

        <article class="oy-sweets-item" style="--num-color:#98008A;" data-big="SOUR|ZANK" data-details-img="{{ asset('assets/images/products/sweets/sweets_details/SOURPUNK Strawberry.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/sweets/1.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">01</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Strawberry Flavour</span></h3>
            <p class="oy-sweets-desc">Sour candy sticks with strawberry flavor.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <article class="oy-sweets-item" style="--num-color:#1B1114;" data-big="SOUR|ZANK" data-details-img="{{ asset('assets/images/products/sweets/sweets_details/SOURPUNK Cola.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/sweets/2.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">02</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Cola Flavour</span></h3>
            <p class="oy-sweets-desc">Sour candy sticks with cola flavor.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <article class="oy-sweets-item" style="--num-color:#8FC301;" data-big="SOUR|ZANK" data-details-img="{{ asset('assets/images/products/sweets/sweets_details/SOURPUNK apples.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/sweets/3.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">03</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Apple Flavour</span></h3>
            <p class="oy-sweets-desc">Sour candy sticks with apple flavor.</p>
            <a href="#" class="oy-sweets-btn">Learn More</a>
          </div>
        </article>

        <article class="oy-sweets-item" style="--num-color:#CA000E;" data-big="SOUR|ZANK" data-details-img="{{ asset('assets/images/products/sweets/sweets_details/SOURPUNK Berries.png') }}">
          <div class="oy-sweets-media" aria-hidden="true">
            <img src="{{ asset('assets/images/products/sweets/4.png') }}" alt="" loading="lazy">
          </div>

          <div class="oy-sweets-content">
            <div class="oy-sweets-num">04</div>
            <h3 class="oy-sweets-title"><span dir="ltr">Blueberry Flavour</span></h3>
            <p class="oy-sweets-desc">Sour candy sticks with blueberry flavor.</p>
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
         PANEL 2
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--second oy-reveal oy-delay-3" aria-label="Sour Candy Cards Panel 2">

      <article class="oy-sweets-item" style="--num-color:#D62C7E;" data-big="Extre|me.Z" data-details-img="{{ asset('assets/images/products/sweets2/sweets_details/1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets2/1.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Strawberry Flavour</span></h3>
          <p class="oy-sweets-desc">Sour candy sticks with strawberry flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#872419;" data-big="Extre|me.Z" data-details-img="{{ asset('assets/images/products/sweets2/sweets_details/1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets2/2.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Cola Flavour</span></h3>
          <p class="oy-sweets-desc">Sour candy sticks with cola flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#88BF40;" data-big="Extre|me.Z" data-details-img="{{ asset('assets/images/products/sweets2/sweets_details/1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets2/3.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">03</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Apple Flavour</span></h3>
          <p class="oy-sweets-desc">Sour candy sticks with apple flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <article class="oy-sweets-item" style="--num-color:#EF2186;" data-big="ZazZy" data-details-img="{{ asset('assets/images/products/sweets2/sweets_details/1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets2/4.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">04</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Blueberry Flavour</span></h3>
          <p class="oy-sweets-desc">Sour candy sticks with blueberry flavor.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

    </div>

    <!-- =========================
         PANEL 3 (Hartbeat Mix + Poppins)
    ========================== -->
    <div class="oy-sweets-panel oy-sweets-panel--third oy-reveal oy-delay-3" aria-label="Sour Candy Cards Panel 3">

      <article class="oy-sweets-item"
        style="--num-color:#C43332;"
        data-big="Rol.a|.Cola"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/1-1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/1.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">01</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Rolled Candy</span></h3>
          <p class="oy-sweets-desc">Refreshing sour cola candy.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <article class="oy-sweets-item"
        style="--num-color:#D84B25;"
        data-big="Popp|ins"
        data-details-img="{{ asset('assets/images/products/sweets3/sweets_details/Poppins1.png') }}">
        <div class="oy-sweets-media" aria-hidden="true">
          <img src="{{ asset('assets/images/products/sweets3/Poppins.png') }}" alt="" loading="lazy">
        </div>

        <div class="oy-sweets-content">
          <div class="oy-sweets-num">02</div>
          <h3 class="oy-sweets-title"><span dir="ltr">Rolled Candy</span></h3>
          <p class="oy-sweets-desc">Candy with assorted fruity flavors.</p>
          <a href="#" class="oy-sweets-btn">Learn More</a>
        </div>
      </article>

      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>
      <article class="oy-sweets-item oy-sweets-item--ghost" aria-hidden="true"></article>

    </div>

  </div>
</section>