<section class="oy-section oy-products-tabs" id="products-tabs" aria-label="Product Categories" dir="ltr">
  <div class="oy-section__inner">

    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        Our Delicious Products
      </h2>

      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="{{ url('en/products') }}" data-tab="all"
             class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">Featured Products</a>

          <a href="{{ url('en/products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">Coffee</a>

          <a href="{{ url('en/products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">Biscuits & Wafers</a>

          <a href="{{ url('en/products/sweets') }}" data-tab="sour" class="oy-products-tabs__tab">Sour Candy</a>

          <a href="{{ url('en/products/marshmallow') }}" data-tab="sweets" class="oy-products-tabs__tab">Sweets</a>

          <a href="{{ url('en/products/healthy') }}" data-tab="healthy" class="oy-products-tabs__tab">Healthy Products</a>

          <a href="{{ url('en/products/juices') }}" data-tab="juices" class="oy-products-tabs__tab">Juices</a>

          <a href="{{ url('en/products/cake') }}" data-tab="cake" class="oy-products-tabs__tab">Cake</a>
        </nav>

        <button class="oy-products-tabs__scrollHint" type="button" aria-label="Scroll tabs">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>

    </div>

    <p class="oy-section__text oy-products-tabs__subtitle oy-reveal oy-delay-2">
      Orient Yemen offers a diverse range of products that it imports and markets across different categories, with a focus on presenting them in a way that reflects the company’s identity and quality, while meeting the expectations of the markets we serve.
    </p>

    <div class="oy-products-grid oy-reveal oy-delay-3" aria-label="Products Grid">

      <!-- 1) Caffino Gold -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/5.jpg') }}" alt="Caffino Gold" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Caffino Gold</h3>
        <p class="oy-product-card__desc">Instant coffee with a strong, balanced taste.</p>
      </article>

      <!-- 2) Caffino Bold -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/6.jpg') }}" alt="Caffino Bold" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Caffino Bold</h3>
        <p class="oy-product-card__desc">Instant coffee with a bold, concentrated flavor and light sweetness.</p>
      </article>

      <!-- 3) Caffino Flavors -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/7.jpg') }}" alt="Caffino Flavors" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Caffino Flavors</h3>
        <p class="oy-product-card__desc">Instant coffee in classic, hazelnut, and mocha flavors.</p>
      </article>

      <!-- 4) Glucose Biscuits -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/1.jpg') }}" alt="Glucose Biscuits" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Glucose Biscuits</h3>
        <p class="oy-product-card__desc">Light, crunchy classic biscuits.</p>
      </article>

      <!-- 5) Parle Digestive Biscuits -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/12.jpg') }}" alt="Parle Digestive Biscuits" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Parle Digestive Biscuits</h3>
        <p class="oy-product-card__desc">Barley digestive biscuits with a satisfying texture and distinctive taste.</p>
      </article>

      <!-- 6) Parle Bourbon Biscuits -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/15.jpg') }}" alt="Parle Bourbon Biscuits" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Parle Bourbon Biscuits</h3>
        <p class="oy-product-card__desc">Chocolate cream-filled biscuits with a rich taste.</p>
      </article>

      <!-- 7) Nice Biscuits -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/21.jpg') }}" alt="Nice Biscuits" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Nice Biscuits</h3>
        <p class="oy-product-card__desc">Simple, crunchy biscuits with a balanced flavor.</p>
      </article>

      <!-- 8) Happy Happy Biscuits -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/11.jpg') }}" alt="Happy Happy Biscuits" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Happy Happy Biscuits</h3>
        <p class="oy-product-card__desc">Chocolate biscuits with chocolate chips.</p>
      </article>

      <!-- 9) Murano Cookies -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/9.jpg') }}" alt="Murano Cookies" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Murano Cookies</h3>
        <p class="oy-product-card__desc">Premium cookies loaded with chocolate chips.</p>
      </article>

      <!-- 10) Murano Delight -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/10.jpg') }}" alt="Murano Delight" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Murano Delight</h3>
        <p class="oy-product-card__desc">Dark chocolate-filled biscuits with a rich flavor and a premium touch.</p>
      </article>

      <!-- 11) Fab Biscuit Boxes -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/4.jpg') }}" alt="Fab Biscuit Boxes" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Fab Biscuit Boxes</h3>
        <p class="oy-product-card__desc">Cream-filled biscuits in strawberry, vanilla, and chocolate flavors, packed in boxes ideal for display and retail.</p>
      </article>

      <!-- 12) Fab Biscuits -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/17.jpg') }}" alt="Fab Biscuits" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Fab Biscuits</h3>
        <p class="oy-product-card__desc">Cream-filled biscuits in strawberry, vanilla, and chocolate flavors, a practical choice for everyday snacking.</p>
      </article>

      <!-- 13) Cho Cho Mazaz Chocolate -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/2.jpg') }}" alt="Cho Cho Mazaz Chocolate" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Cho Cho Mazaz Chocolate</h3>
        <p class="oy-product-card__desc">Chocolate with a rich flavor and smooth texture.</p>
      </article>

      <!-- 14) Cho Cho Cups -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/13.jpg') }}" alt="Cho Cho Cups" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Cho Cho Cups</h3>
        <p class="oy-product-card__desc">Creamy dessert cups in vanilla, strawberry, and sprinkles flavors.</p>
      </article>

      <!-- 15) Cho Cho Wafer Boxes -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/19.jpg') }}" alt="Cho Cho Wafer Boxes" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Cho Cho Wafer Boxes</h3>
        <p class="oy-product-card__desc">Crispy wafers with light layers and a delicious chocolate filling.</p>
      </article>

      <!-- 16) Melody Candy -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/18.jpg') }}" alt="Melody Candy" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Melody Candy</h3>
        <p class="oy-product-card__desc">Chocolate candy with a smooth taste, perfect for a quick sweet treat.</p>
      </article>

      <!-- 17) Sour Zang Candy -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/3.jpg') }}" alt="Sour Zang Candy" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Sour Zang Candy</h3>
        <p class="oy-product-card__desc">Sour candy with a strong and refreshing flavor.</p>
      </article>

      <!-- 18) Extreme Sour Candy -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/8.jpg') }}" alt="Extreme Sour Candy" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Extreme Sour Candy</h3>
        <p class="oy-product-card__desc">Extra sourness with a bold flavor for an extreme candy experience.</p>
      </article>

      <!-- 19) Cola Candy -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/16.jpg') }}" alt="Cola Candy" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Cola Candy</h3>
        <p class="oy-product-card__desc">Cola-flavored candy with a sweet and refreshing taste.</p>
      </article>

      <!-- 20) Mazola Candy -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/14.jpg') }}" alt="Mazola Candy" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Mazola Candy</h3>
        <p class="oy-product-card__desc">Candy in a variety of fruity flavors.</p>
      </article>

      <!-- 21) Bobins Candy -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="{{ asset('assets/images/products/22.jpg') }}" alt="Bobins Candy" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">Bobins Candy</h3>
        <p class="oy-product-card__desc">Small colorful candy pieces in assorted fruit flavors.</p>
      </article>

    </div>

    <div class="oy-products-pagination-wrap oy-reveal oy-delay-4" aria-label="Products Pagination">
      <nav class="oy-products-pagination" aria-label="Pagination">
        <a href="#p1" class="oy-products-pagination__item oy-products-pagination__item--active" aria-current="page">1</a>
        <a href="#p2" class="oy-products-pagination__item">2</a>
        <a href="#p3" class="oy-products-pagination__item">3</a>
        <a href="#p4" class="oy-products-pagination__item">4</a>
        <a href="#p5" class="oy-products-pagination__item">5</a>
        <span class="oy-products-pagination__item oy-products-pagination__item--dots" aria-hidden="true">...</span>

        <a href="#next" class="oy-products-pagination__item oy-products-pagination__item--next" aria-label="Next page">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </a>
      </nav>
    </div>

  </div>
</section>