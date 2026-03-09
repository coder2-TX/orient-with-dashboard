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

      <!-- 1) كافينو جولد -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/5.jpg" alt="كافينو جولد" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">كافينو جولد</h3>
        <p class="oy-product-card__desc">قهوة سريعة التحضير بطعم قوي و متوازن.</p>
      </article>

      <!-- 2) كافينو بولد -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/6.jpg" alt="كافينو بولد" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">كافينو بولد</h3>
        <p class="oy-product-card__desc">قهوة سريعة التحضير بنكهة قوية ومركزة وسكر خفيف.</p>
      </article>

      <!-- 3) كافينو نكهات -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/7.jpg" alt="كافينو نكهات" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">كافينو نكهات</h3>
        <p class="oy-product-card__desc">قهوة سريعة التحضير بنكهات: كلاسيك، بندق، موكا.</p>
      </article>

      <!-- 4) بسكويت جلوكوز -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/1.jpg" alt="بسكويت جلوكوز" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">بسكويت جلوكوز</h3>
        <p class="oy-product-card__desc">بسكويت كلاسيكي خفيف ومقرمش.</p>
      </article>

      <!-- 5) بسكويت دايجستف بارلي -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/12.jpg" alt="بسكويت دايجستف بارلي" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">بسكويت دايجستف بارلي</h3>
        <p class="oy-product-card__desc">دايجستف بالشعير بقوام مشبع وطعم مميز.</p>
      </article>

      <!-- 6) بسكويت بربون من بارلي -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/15.jpg" alt="بسكويت بربون من بارلي" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">بسكويت بربون من بارلي</h3>
        <p class="oy-product-card__desc">بسكويت محشي بكريمة شوكولاتة بطعم غني.</p>
      </article>

      <!-- 7) بسكويت نايس -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/21.jpg" alt="بسكويت نايس" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">بسكويت نايس</h3>
        <p class="oy-product-card__desc">بسكويت بسيط مقرمش بطعم متوازن.</p>
      </article>

      <!-- 8) بسكويت هابي هابي -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/11.jpg" alt="بسكويت هابي هابي" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">بسكويت هابي هابي</h3>
        <p class="oy-product-card__desc">بسكويت الشوكولاتة بحبيبات شوكولاتة.</p>
      </article>

      <!-- 9) كوكيز مورانو -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/9.jpg" alt="كوكيز مورانو" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">كوكيز مورانو</h3>
        <p class="oy-product-card__desc">كوكيز غني بحبيبات الشوكولاتة بطعم فاخر.</p>
      </article>

      <!-- 10) مورانو ديلايت -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/10.jpg" alt="مورانو ديلايت" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">مورانو ديلايت</h3>
        <p class="oy-product-card__desc">بسكويت محشي بالشوكولاتة الغامقة بطعم مركز ولمسة فخمة.</p>
      </article>

      <!-- 11) بسكويت فاب علب -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/4.jpg" alt="بسكويت فاب علب" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">بسكويت فاب علب</h3>
        <p class="oy-product-card__desc">بسكويت محشي بكريمة بنكهات: فراولة، فانيليا، شوكولاتة—تغليف علب مناسب للعرض والبيع.</p>
      </article>

      <!-- 12) بسكويت فاب -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/17.jpg" alt="بسكويت فاب" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">بسكويت فاب</h3>
        <p class="oy-product-card__desc">بسكويت محشي بكريمة بنكهات: فراولة، فانيليا، شوكولاتة—خيار عملي للوجبات الخفيفة.</p>
      </article>

      <!-- 13) شوكولاتة شوشو مزاز -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/2.jpg" alt="شوكولاتة شوشو مزاز" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">شوكولاتة شوشو مزاز</h3>
        <p class="oy-product-card__desc">شوكولاتة بطعم غني وقوام ناعم.</p>
      </article>

      <!-- 14) شوشو اكواب -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/13.jpg" alt="شوشو اكواب" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">شوشو اكواب</h3>
        <p class="oy-product-card__desc">أكواب حلى كريمية بنكهات: فانيليا، فراولة، سبرنكلز.</p>
      </article>

      <!-- 15) ويفر شوشو علب -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/19.jpg" alt="ويفر شوشو علب" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">ويفر شوشو علب</h3>
        <p class="oy-product-card__desc">ويفر مقرمش بطبقات خفيفة وحشوة شوكولاتة لذيذة.</p>
      </article>

      <!-- 16) حلوى ميلودي -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/18.jpg" alt="حلوى ميلودي" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">حلوى ميلودي</h3>
        <p class="oy-product-card__desc">حلوى بالشوكولاتة بطعم ناعم مناسب للتحلية السريعة.</p>
      </article>

      <!-- 17) حلوى ساور زانك -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/3.jpg" alt="حلوى ساور زانك" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">حلوى ساور زانك</h3>
        <p class="oy-product-card__desc">حلوى حامضة بطعم قوي ومنعش.</p>
      </article>

      <!-- 18) حلوى حامض اكستريم -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/8.jpg" alt="حلوى حامض اكستريم" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">حلوى حامض اكستريم</h3>
        <p class="oy-product-card__desc">حموضة أعلى ونكهة جريئة لتجربة اكستريم.</p>
      </article>

      <!-- 19) حلوى كولا -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/16.jpg" alt="حلوى كولا" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">حلوى كولا</h3>
        <p class="oy-product-card__desc">حلوى بنكهة الكولا بطعم حلو ومنعش.</p>
      </article>

      <!-- 20) حلوى مازولا -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/14.jpg" alt="حلوى مازولا" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">حلوى مازولا</h3>
        <p class="oy-product-card__desc">حلوى بنكهات فاكهية متعددة.</p>
      </article>

      <!-- 21) حلوى بوبنس -->
      <article class="oy-product-card">
        <div class="oy-product-card__media">
          <img src="assets/images/products/22.jpg" alt="حلوى بوبنس" loading="lazy">
        </div>
        <h3 class="oy-product-card__title">حلوى بوبنس</h3>
        <p class="oy-product-card__desc">حلوى صغيرة ملونة بنكهات فاكهية متنوعة.</p>
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