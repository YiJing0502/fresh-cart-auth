@extends('templates.fontTemplete')
@section('style')
    <style>
        .product-img {
            width: 100px;
            height: 100px;
            background-color: #333;
        }

        .count-form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: unset;
            border-radius: var(--bs-border-radius);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .count-form-control:focus {
            color: unset;
            background-color: unset;
            border-color: unset;
            outline: unset;
            box-shadow: 0 0 0 0;
            border: unset
        }

        .product-count {
            border: 1px solid #e6e6e6;
            border-radius: 10px;
        }

        .btn-count {
            --bs-btn-padding-x: 0.75rem;
            --bs-btn-padding-y: 0.375rem;
            --bs-btn-font-family: ;
            --bs-btn-font-size: 1rem;
            --bs-btn-font-weight: 400;
            --bs-btn-line-height: 1.5;
            --bs-btn-color: var(--bs-body-color);
            --bs-btn-bg: transparent;
            --bs-btn-border-width: var(--bs-border-width);
            --bs-btn-border-color: transparent;
            --bs-btn-border-radius: var(--bs-border-radius);
            --bs-btn-hover-border-color: transparent;
            --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
            --bs-btn-disabled-opacity: 0.65;
            --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
            display: inline-block;
            padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
            font-family: var(--bs-btn-font-family);
            font-size: var(--bs-btn-font-size);
            font-weight: var(--bs-btn-font-weight);
            line-height: var(--bs-btn-line-height);
            color: var(--bs-btn-color);
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            border: unset;
            border-radius: 10px 0px 10px 0px;
            background-color: unset;

        }

        .btn-count:hover {
            color: #198754;
            background-color: unset;
            border-color: var(--bs-btn-hover-border-color);
            border-width: 10px;
            border-radius: 10px 0px 10px 0px;
        }
    </style>
@endsection
@section('main-content')
    <div class="container">
        <section class="order-header">
            <div class="apart mb-4 mt-3">
                <span class="text-success">Home</span>
                <span>/</span>
                <span class="text-success">Shop</span>
                <span>/</span>
                <span>Shop Checkout</span>
            </div>
            <div class="checkout mb-4">
                <h2 class="mb-2 mx-0">Checkout</h2>
                @auth()
                    <span>請您確認訂單細節後，點擊下一步</span>
                @endauth
                @guest()
                    <span>
                        Already have an account? Click here to
                    </span>
                    <a href="{{ route('login') }}" class="text-success">
                        Sign in.
                    </a>
                @endguest
            </div>
        </section>
        <section class="order-body">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h5 class="mb-0">訂單資訊</h5>
                    </li>
                    {{-- start-要買的產品 buy-product --}}
                    <li class="buy-product list-group-item d-flex justify-content-between align-items-center">
                        <div class="product-img"></div>
                        <div class="product-info">
                            <h6>冰紛樂</h6>
                            <p>1kg</p>
                        </div>
                        <div class="product-count d-flex align-items-center">
                            <button type="button" class="btn h-100 btn-count">+</button>
                            <input class="count-form-control" type="number" placeholder="商品數量"
                                aria-label="default input example">
                            <button type="button" class="btn btn-count">-</button>
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
                            <button type="button" class="btn h-100 btn-count">+</button>
                            <input class="count-form-control" type="number" placeholder="商品數量"
                                aria-label="default input example">
                            <button type="button" class="btn btn-count">-</button>
                        </div>
                        <div class="product-price">
                            <h5>$1000</h5>
                        </div>
                    </li>
                    {{-- end-要買的產品 buy-product --}}
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <h6 class="mb-0">總金額</h6>
                        <h5 class="mb-0">$2000</h5>
                    </li>
                </ul>
            </div>
        </section>
        <section class="order-footer"></section>
        <section class="order-footer d-flex justify-content-end mt-5 w-75 m-auto">
            <a href="{{ route('order.tran') }}"><button class="btn btn-success">下一步</button></a>
        </section>




    </div>
@endsection
@section('js')
    <script></script>
@endsection
