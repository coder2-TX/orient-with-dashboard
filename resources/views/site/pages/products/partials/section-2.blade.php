@php
  use App\Models\ProductPageProduct;

  $products = ProductPageProduct::activeItems();
@endphp

<section class="oy-section oy-products-tabs" id="products-tabs" aria-label="Products Categories">
  <div class="oy-section__inner">

    <div class="oy-products-tabs__head oy-reveal oy-delay-1">
      <h2 class="oy-section__title oy-products-tabs__title">
        <span class="oy-section__title-icon" aria-hidden="true"></span>
        أطعمتنا اللذيذة
      </h2>

      <div class="oy-products-tabs__tabsWrap">
        <nav class="oy-products-tabs__nav" aria-label="Product filters">
          <a href="{{ url('products') }}" data-tab="all"
             class="oy-products-tabs__tab oy-products-tabs__tab--active" aria-current="page">المنتجات المفضلة</a>

          <a href="{{ url('products/coffee') }}" data-tab="coffee" class="oy-products-tabs__tab">القهوة</a>
          <a href="{{ url('products/biscuit') }}" data-tab="biscuits" class="oy-products-tabs__tab">البسكويت والويفر</a>
          <a href="{{ url('products/sweets') }}" data-tab="sour" class="oy-products-tabs__tab">الحلوى الحامضة</a>
          <a href="{{ url('products/marshmallow') }}" data-tab="sweets" class="oy-products-tabs__tab">الحلويات</a>
          <a href="{{ url('products/healthy') }}" data-tab="healthy" class="oy-products-tabs__tab">المنتجات الصحية</a>
          <a href="{{ url('products/juices') }}" data-tab="juices" class="oy-products-tabs__tab">العصائر</a>
          <a href="{{ url('products/cake') }}" data-tab="cake" class="oy-products-tabs__tab">الكيك</a>
        </nav>

        <button class="oy-products-tabs__scrollHint" type="button" aria-label="تمرير التبويبات">
          <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
        </button>
      </div>
    </div>

    <p class="oy-section__text oy-products-tabs__subtitle oy-reveal oy-delay-2">
      تضم أورينت يمن مجموعة من المنتجات التي تعمل على استيرادها وتسويقها ضمن فئات مختلفة، مع التركيز على تقديمها بشكل يعكس هويتها وجودتها، وبما يلبّي تطلعات الأسواق التي نعمل بها.
    </p>

    <div class="oy-products-grid oy-reveal oy-delay-3" aria-label="Products Grid">
      @foreach($products as $product)
        <article class="oy-product-card">
          <div class="oy-product-card__media">
            <img
              src="{{ $product->landingImageUrl() }}"
              alt="{{ $product->title_ar }}"
              loading="lazy"
              decoding="async"
            >
          </div>

          <h3 class="oy-product-card__title">{{ $product->title_ar }}</h3>
          <p class="oy-product-card__desc">{{ $product->desc_ar }}</p>
        </article>
      @endforeach
    </div>

    <div class="oy-products-pagination-wrap oy-reveal oy-delay-4" aria-label="Products Pagination">
      <nav class="oy-products-pagination" aria-label="Pagination">
        <button type="button" class="oy-products-pagination__item oy-products-pagination__item--active" aria-current="page">1</button>
        <button type="button" class="oy-products-pagination__item">2</button>
        <button type="button" class="oy-products-pagination__item">3</button>

        <button type="button" class="oy-products-pagination__item oy-products-pagination__item--next" aria-label="الصفحة التالية">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </button>
      </nav>
    </div>

  </div>
</section>