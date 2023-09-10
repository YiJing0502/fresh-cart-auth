@extends('templates.fontTemplete')
@section('style')
<style>
    /* 清除按钮的默认样式 */
button, input[type="button"], input[type="submit"] {
    border: none; /* 移除边框 */
    background: none; /* 移除背景颜色 */
    padding: 0; /* 移除内边距 */
    margin: 0; /* 移除外边距 */
    font-family: inherit; /* 使用父元素的字体 */
    font-size: inherit; /* 使用父元素的字体大小 */
    cursor: pointer; /* 添加指针样式，以表示按钮 */
    color: #5c6c75;
}
</style>
@endsection
@section('main-content')
    <section class="big-banner">
      <div class="container">
        <!-- Bib Swiper -->
        <div class="swiper bigSwiper">
          <div class="swiper-wrapper">
            <!-- big-slide-1 -->
            <div class="swiper-slide big-slide big-slide-1">
              <div class="big-slide-content d-flex flex-column align-items-start col-xxl-5 col-md-7">
                <span class="badge text-bg-warning mb-2">Opening Sale Discount 50%</span>
                <h2 class="slide-h2 text-start">SuperMarket For Fresh Grocery</h2>
                <p class="text-start slide-p">Introduced a new model for online grocery shopping
                  and convenient home delivery.</p>
                <button type="button" class="btn btn-dark dropdown-toggle all-departments-btn  fs-6-7"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <span>Shop Now</span>
                  <i class="bi bi-arrow-right-short fs-6"></i>
                </button>
              </div>
            </div>
            <!-- big-slide-2 -->
            <div class="swiper-slide big-slide big-slide-2">
              <div class="big-slide-content d-flex flex-column align-items-start col-xxl-5 col-md-7">
                <span class="badge text-bg-warning mb-2">Free Shipping - orders over span$100</span>
                <h2 class="slide-h2 text-start">Free Shipping on <br> orders over <span
                    class="main-green-color">$100</span></h2>
                <p class="text-start slide-p">Free Shipping to First-Time Customers Only, After promotions and discounts
                  are applied.
                </p>
                <button type="button" class="btn btn-dark dropdown-toggle all-departments-btn  fs-6-7"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <span>Shop Now</span>
                  <i class="bi bi-arrow-right-short fs-6"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="swiper-pagination m-0"></div>
        </div>
      </div>
    </section>
    <section class="featured-item">
      <div class="container position-relative">
        <h3 class="mb-4 ">Featured Categories</h3>
        <div class="swiper smallSwiper">
          <div class="swiper-wrapper">
            <!-- 1 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/1-category-tea-coffee-drinks.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Tea, Coffee & Drinks</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 2 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/2-category-atta-rice-dal.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Atta, Rice & Dal</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 3 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/3-category-baby-care.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Baby Care</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 4 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/4-category-chicken-meat-fish.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Chicken, Meat & Fish</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 5 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/5-category-cleaning-essentials.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Cleaning Essentials</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 6 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/6-category-pet-care.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Pet Care</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 7 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/7-category-dairy-bread-eggs.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Dairy, Bread & Eggs</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 8 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/8-category-snack-munchies.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Snack & Munchies</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 9 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="./img/banner/9-category-bakery-biscuits.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Bakery & Biscuits</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- 10 -->
            <div class="swiper-slide">
              <a href="#" class="d-flex">
                <div class="card mb-3 card-product position-relative">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img src="img/banner/10-category-instant-food.jpeg" alt="" class="mb-2-3">
                    <p class="card-text fs-6-7">Instant Food</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="swiper-pagination d-none"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </section>
    <section class="small-banner">
      <div class="container text-start">
        <div class="row two-card row-cols-1 px-3 px-lg-0">
          <div class="col food-banner food-left-banner img-fluid me-md-2 mb-4 mb-md-0">
            <h3>Fruits & Vegetables</h3>
            <p>Get Upto <span class="fw-bold">30%</span> Off</p>
            <button type="button" class="btn btn-dark dropdown-toggle all-departments-btn  fs-6-7 buy-food-btn"
              data-bs-toggle="dropdown" aria-expanded="false">
              <span>Shop Now</span>
            </button>
          </div>
          <div class="col food-banner food-right-banner img-fluid ms-md-2">
            <h3>Freshly Baked Buns</h3>
            <p>Get Upto <span class="fw-bold">25%</span> Off</p>
            <button type="button" class="btn btn-dark dropdown-toggle all-departments-btn  fs-6-7 buy-food-btn"
              data-bs-toggle="dropdown" aria-expanded="false">
              <span>Shop Now</span>
            </button>
          </div>

        </div>
      </div>
    </section>
    <section class="popluar-product">
      <div class="container">
        <div class="row mb-4">
          <div class="col-12">
            <h3>Popular Products</h3>
          </div>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-2 row-gap-1">
        @foreach ($products as $item)
        {{-- @dump($item) --}}
        <!-- 1 -->
        <div class="col">
          <div class="card mb-3 card-product position-relative">
            <div class="card-body d-flex flex-column align-items-center justify-content-between">
              <div>
                <span class="badge text-bg-danger me-auto">Sale</span>
                <a href="#"><img src="{{asset($item->img_path)}}" alt="" class="img-fluid mb-2-3"></a>

                <a href="#" class="me-auto mb-2">
                  <p class="card-text text-body-tertiary fs-7">{{$item->descr}}</p>
                </a>
                <a href="#" class="me-auto">
                  <h5 class="card-title fs-6">{{$item->name}}</h5>
                </a>
                <div class="me-auto mb-3">
                  <span class="star-color">
                    <i class="bi bi-star-fill "></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                  </span>
                  <span class="fs-7 text-body-tertiary">4.5(149)</span>
                </div>
              </div>
              <div
                class="card-product-action position-absolute top-50 d-flex align-items-center justify-content-center gap-1 w-100">
                <a href="#" class="btn-action action-link" data-action="Quick View">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="#" class="btn-action action-link" data-action="Wishlish">
                  <i class="bi bi-heart"></i>
                </a>
                <a href="#" class="btn-action action-link" data-action="Compare">
                  <i class="bi bi-arrow-left-right"></i>
                </a>
              </div>
              <div class="d-flex justify-content-between w-100">
                <div>
                  <span class="fs-6">${{$item->price}}</span>
                  <span class="fs-6 text-body-tertiary"><del>$24</del></span>
                </div>
                <a href="#" class="btn btn-primary ms-auto btn-add"><i class="bi bi-plus-lg me-1"></i>Add</a>
              </div>
            </div>
          </div>
        </div>

        @endforeach

        </div>
      </div>
    </section>
    <section class="daily-best-sells mb-5 ">
      <div class="container">
        <h4 class="text-black mb-3">Daily Best Sells</h4>
        <div class="w-self-1 ">
          <div class="row w-self-2 no-wrap">
            <div class="col-3 col-lg-3 position-relative overflow-hidden rounded-4">
              <img src="./img/daily best sells/banner-deal.jpg" class="border h-470 rounded-4 " alt="...">
              <div class="position-absolute top-0 text-white fs-4 fw-bold p-4">100% Organic Coffee Beans. <div
                  class="fs-14-self pe-4 d-inline-block"> Get the best deal before close.</div>
              </div>
              <button type="button" class="btn btn-success shop position-absolute btn-self">Shop Now →</button>
            </div>
            <!-- 第一個商品 -->
            <div class="col-3 col-lg-3 sells-product">
              <div class="card mb-3 card-product position-relative">
                <div class="card-body d-flex flex-column align-items-center justify-content-start">
                  <div>
                    <a href="#"><img src="./img/daily best sells/product-img-11.jpg" alt="" class="img-fluid mb-2-3 img-self"></a>

                    <a href="#" class="me-auto mb-2">
                      <p class="card-text text-body-tertiary fs-7 ">Tea, Coffee & Drinks</p>
                    </a>
                    <a href="#" class="me-auto">
                      <h5 class="card-title fs-6">Roast Ground Coffee</h5>
                    </a>
                    <div class=" mb-1 d-flex justify-content-between">
                      <div>
                        <span class="fs-6">$13</span>
                        <span class="fs-6 text-body-tertiary"><del>$18</del></span>
                      </div>
                      <div>
                        <span class="star-color">
                          <i class="bi bi-star-fill "></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                        </span>
                        <span class="fs-7 text-body-tertiary">4.5</span>
                      </div>
                    </div>
                  </div>
                  <div
                    class="card-product-action position-absolute top-self d-flex align-items-center justify-content-center gap-1 w-100">
                    <a href="#" class="btn-action action-link" data-action="Quick View">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#" class="btn-action action-link" data-action="Wishlish">
                      <i class="bi bi-heart"></i>
                    </a>
                    <a href="#" class="btn-action action-link" data-action="Compare">
                      <i class="bi bi-arrow-left-right"></i>
                    </a>
                  </div>
                  <div class="d-flex justify-content-center w-100">
                    <a href="#" class="btn btn-primary w-100 btn-add"><i class="bi bi-plus-lg me-1"></i>Add to cart</a>
                  </div>
                  <div class="row  mt-3 w-100 justify-content-center  mx-auto g-1 flex-wrap">
                    <div class="col col-lg-6 col-xl-4 col-xxl-3 "><div class="card px-2 py-2 mx-auto size-60-60 text-center">1868<br>Days</div></div>
                    <div class="col col-lg-6 col-xl-4 col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">03<br>Hours</div></div>
                    <div class="col col-lg-6 col-xl-4 col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">43<br>Mins</div></div>
                    <div class="col col-lg-6 col-xl-12  col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">60<br>Secs</div></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- 第二個商品 -->
            <div class="col-3 col-lg-3 sells-product">
              <div class="card mb-3 card-product position-relative">
                <div class="card-body d-flex flex-column align-items-center justify-content-start">
                  <div>
                    <a href="#"><img src="./img/daily best sells/product-img-12.jpg" alt="" class="img-fluid mb-2-3 img-self"></a>

                    <a href="#" class="me-auto mb-2">
                      <p class="card-text text-body-tertiary fs-7 ">Fruits & Vegetables</p>
                    </a>
                    <a href="#" class="me-auto">
                      <h5 class="card-title fs-6">Crushed Tomatoes</h5>
                    </a>
                    <div class=" mb-1 d-flex justify-content-between">
                      <div>
                        <span class="fs-6">$13</span>
                        <span class="fs-6 text-body-tertiary"><del>$18</del></span>
                      </div>
                      <div>
                        <span class="star-color">
                          <i class="bi bi-star-fill "></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                        </span>
                        <span class="fs-7 text-body-tertiary">4.5</span>
                      </div>
                    </div>
                  </div>
                  <div
                    class="card-product-action position-absolute top-self d-flex align-items-center justify-content-center gap-1 w-100">
                    <a href="#" class="btn-action action-link" data-action="Quick View">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#" class="btn-action action-link" data-action="Wishlish">
                      <i class="bi bi-heart"></i>
                    </a>
                    <a href="#" class="btn-action action-link" data-action="Compare">
                      <i class="bi bi-arrow-left-right"></i>
                    </a>
                  </div>
                  <div class="d-flex justify-content-center w-100">
                    <a href="#" class="btn btn-primary w-100 btn-add"><i class="bi bi-plus-lg me-1"></i>Add to cart</a>
                  </div>
                  <div class="row  mt-3 w-100 justify-content-center  mx-auto g-1 flex-wrap">
                    <div class="col col-lg-6 col-xl-4 col-xxl-3 "><div class="card px-2 py-2 mx-auto size-60-60 text-center">1928<br>Days</div></div>
                    <div class="col col-lg-6 col-xl-4 col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">03<br>Hours</div></div>
                    <div class="col col-lg-6 col-xl-4 col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">43<br>Mins</div></div>
                    <div class="col col-lg-6 col-xl-12  col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">60<br>Secs</div></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- 第三個商品 -->
            <div class="col-3 col-lg-3 sells-product">
              <div class="card mb-3 card-product position-relative">
                <div class="card-body d-flex flex-column align-items-center justify-content-start">
                  <div>
                    <a href="#"><img src="./img/daily best sells/product-img-13.jpg" alt="" class="img-fluid mb-2-3 img-self"></a>

                    <a href="#" class="me-auto mb-2">
                      <p class="card-text text-body-tertiary fs-7 ">Fruits & Vegetables</p>
                    </a>
                    <a href="#" class="me-auto">
                      <h5 class="card-title fs-6">Golden Pineapple</h5>
                    </a>
                    <div class=" mb-1 d-flex justify-content-between">
                      <div>
                        <span class="fs-6">$13</span>
                        <span class="fs-6 text-body-tertiary"><del>$18</del></span>
                      </div>
                      <div>
                        <span class="star-color">
                          <i class="bi bi-star-fill "></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                        </span>
                        <span class="fs-7 text-body-tertiary">4.5</span>
                      </div>
                    </div>
                  </div>
                  <div
                    class="card-product-action position-absolute top-self d-flex align-items-center justify-content-center gap-1 w-100">
                    <a href="#" class="btn-action action-link" data-action="Quick View">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="#" class="btn-action action-link" data-action="Wishlish">
                      <i class="bi bi-heart"></i>
                    </a>
                    <a href="#" class="btn-action action-link" data-action="Compare">
                      <i class="bi bi-arrow-left-right"></i>
                    </a>
                  </div>
                  <div class="d-flex justify-content-center w-100">
                    <a href="#" class="btn btn-primary w-100 btn-add"><i class="bi bi-plus-lg me-1"></i>Add to cart</a>
                  </div>
                  <div class="row  mt-3 w-100 justify-content-center  mx-auto g-1 flex-wrap">
                    <div class="col col-lg-6 col-xl-4 col-xxl-3 "><div class="card px-2 py-2 mx-auto size-60-60 text-center">1900<br>Days</div></div>
                    <div class="col col-lg-6 col-xl-4 col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">03<br>Hours</div></div>
                    <div class="col col-lg-6 col-xl-4 col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">43<br>Mins</div></div>
                    <div class="col col-lg-6 col-xl-12  col-xxl-3"><div class="card px-2 py-2 mx-auto size-60-60 text-center">60<br>Secs</div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- footer上四張卡 -->
    <section class="copywriting container py-5 mb-5">
      <div class="row w-100 ">
        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <img src="./img/copywriting/clock.svg" class="mb-4">
          <h6>10 minute grocery now</h6>
          <span>Get your order delivered to your doorstep at the
            earliest from FreshCart pickup stores near you.</span>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <img src="./img/copywriting/gift.svg" class="mb-4">
          <h6>Best Prices & Offers</h6>
          <span>Cheaper prices than your local supermarket, great
            cashback offers to top it off. Get best pricess & offers.</span>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <img src="./img/copywriting/package.svg" class="mb-4">
          <h6>Wide Assortment</h6>
          <span>Choose from 5000+ products across food, personal care, household,
            bakery, veg and non-veg & other categories.</span>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
          <img src="./img/copywriting/refresh-cw.svg" class="mb-4">
          <h6>Easy Returns</h6>
          <span> Not satisfied with a product? Return it at the doorstep & get
            a refund within hours. No questions asked policy.</span>
        </div>
      </div>
    </section>˙
@endsection


@section('js')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<!-- Local Swiper JS -->
<script src="./js/swiper.js"></script>
@endsection

