@extends('templates.fontTemplete')
@section('style')
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <style>
        .card-product {
            width: 18rem;
            margin: 10px;
        }
    </style>
@endsection
@section('main-content')
    <div class="container">
        @dump($products)
          <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-2 row-gap-1">
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
                  <p class="card-text text-body-tertiary fs-7">
                    類別
                  </p>
                </a>
                <a href="#" class="me-auto">
                  <h5 class="card-title fs-6">{{$item->name}}</h5>
                </a>
                <div class="me-auto mb-3">
                  <span class="fs-7 text-body-tertiary">{{$item->descr}}</span>
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
                </div>
                <a href="#" class="btn btn-primary ms-auto btn-add"><i class="bi bi-plus-lg me-1"></i>加入購物車</a>
              </div>
            </div>
          </div>
        </div>

        @endforeach
        </div>
    </div>
@endsection
@section('js')
    <script></script>
@endsection
