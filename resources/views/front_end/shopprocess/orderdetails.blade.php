@extends('templates.fontTemplete')

@section('style')
    <style>
        ul {
            padding: 0;
        }

        .card {
            border: none !important;
            border-bottom: 1px solid black !important;
        }

        .card-img-top {
            max-width: 100px;
            height: 100px;
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
@endsection

@section('main-content')
@dump($cart)
    <div class="order-list d-flex flex-column">
        <div class="container">
            <div class="w-100 bg-light ">
                <title class="d-inline fs-1 ">Check out</title>
                <div class="d-flex flex-row">
                    <a href="">Home</a>/<a href="">Shop</a>/<a href="">ShopCheckout</a>
                </div>
                <p class=" mb-5">already have account? Click here to <a href="">Sign in</a> .</p>
            </div>
            <div class="mt-5 m-auto d-flex flex-column">
                <ul class="border">
                    <div class="border-bottom p-2">Order details</div>
                    <div class="w-100">
                        @foreach ($cart as $item)
                        @dump($item->product)
                        <li class="card  w-100 d-flex flex-row align-items-center" style="width: 18rem;">
                            <img src="{{$item->product->img_path}}" class="card-img-top w-25" alt="...">
                            <div class="card-body d-flex flex-row flex-wrap">
                                <div>
                                    <h5 class="card-title">      {{$item->product->name}}
                                    </h5>
                                    <p class="card-text">
                                        {{$item->product->descr}}
                                    </p>
                                    <p class="card-text">
                                        <span>$</span>
                                        {{$item->product->price}}
                                    </p>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-primary m-1 mt-3">+</a>
                                    <a href="#" class="btn btn-primary m-1 mt-3">-</a>
                                </div>
                            </div>
                            <div class="me-5">
                                $15
                            </div>
                        </li>
                        @endforeach
                        {{-- 總金額 --}}
                        <div class="w-100 d-flex flex-row justify-content-between border-bottom">
                            <div class="p-2">subtotal</div>
                            <div class="p-2">$30</div>
                        </div>
                    </div>
                    {{-- 下一步 --}}
                    <div class=" w-100 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary align-self-end mt-2 p-2">
                            下一步
                        </button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
