@extends('templates.fontTemplete')
@section('style')
    <style>
        .product-img {
            width: 100px;
            height: 100px;
            background-color: #333;
        }
    </style>
@endsection
@section('main-content')
    <div class="container">
        <section class="order-header"></section>
        <section class="order-body">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h5 class="mb-0">訂單資訊</h5>
                    </li>
                    {{-- 要買的產品 buy-product --}}
                    <li class="buy-product list-group-item d-flex justify-content-between align-items-center">
                        <div class="product-img"></div>
                        <div class="product-info">
                            <h6>冰紛樂</h6>
                            <p>1kg</p>
                        </div>
                        <div class="product-count d-flex align-items-center">
                            <button type="button h-100" class="btn btn-light">+</button>
                            <input class="form-control" type="number" placeholder="商品數量"
                                aria-label="default input example">
                            <button type="button" class="btn btn-light">-</button>
                        </div>
                        <div class="product-price">
                            <h5>$1000</h5>
                        </div>
                    </li>
                    <li class="buy-product list-group-item d-flex justify-content-between align-items-center">
                        <div class="product-img"></div>
                        <div class="product-info">
                            <h6>冰紛樂</h6>
                            <p>1kg</p>
                        </div>
                        <div class="product-count d-flex align-items-center">
                            <button type="button h-100" class="btn btn-light">+</button>
                            <input class="form-control" type="number" placeholder="商品數量"
                                aria-label="default input example">
                            <button type="button" class="btn btn-light">-</button>
                        </div>
                        <div class="product-price">
                            <h5 class="mb-0">$1000</h5>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <h6 class="mb-0">總金額</h6>
                        <h5 class="mb-0">$2000</h5>
                    </li>
                </ul>
            </div>
        </section>
        <section class="order-footer"></section>




    </div>
@endsection
@section('js')
    <script></script>
@endsection
