@php
  use App\Models\ProductPageProduct;

  $products = ProductPageProduct::activeItems();
@endphp

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
      @foreach($products as $product)
        <article class="oy-product-card">
          <div class="oy-product-card__media">
            <img
              src="{{ $product->landingImageUrl() }}"
              alt="{{ $product->title_en }}"
              loading="lazy"
              decoding="async"
            >
          </div>

          <h3 class="oy-product-card__title">{{ $product->title_en }}</h3>
          <p class="oy-product-card__desc">{{ $product->desc_en }}</p>
        </article>
      @endforeach
    </div>

    <div class="oy-products-pagination-wrap oy-reveal oy-delay-4" aria-label="Products Pagination">
      <nav class="oy-products-pagination" aria-label="Pagination">
        <button type="button" class="oy-products-pagination__item oy-products-pagination__item--active" aria-current="page">1</button>
        <button type="button" class="oy-products-pagination__item">2</button>
        <button type="button" class="oy-products-pagination__item">3</button>

        <button type="button" class="oy-products-pagination__item oy-products-pagination__item--next" aria-label="Next page">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </button>
      </nav>
    </div>

  </div>
</section>