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
            <form class="mt-5 m-auto d-flex flex-column" action="{{ route('shopDeliverPost') }}" method="POST">
                @csrf
                <ul class="border">
                    <div class="border-bottom p-2">Order details</div>
                    <div class="w-100">
                        <li class="card  w-100 d-flex flex-row align-items-center" style="width: 18rem;">
                            <img src="{{ asset('image/kailiu2.jpg') }}" class="card-img-top w-25" alt="...">
                            <div class="card-body d-flex flex-row flex-wrap">
                                <div>
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of
                                        the
                                        card's content.</p>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-primary m-1 mt-3">+</a>1
                                    <a href="#" class="btn btn-primary m-1 mt-3">-</a>
                                </div>
                            </div>
                            <div class="me-5">
                                $15
                            </div>
                        </li>
                        <li class="card w-100  d-flex flex-row align-items-center" style="width: 18rem;">
                            <img src="{{ asset('image/kailiu3.jpg') }}" class="card-img-top w-25" alt="...">
                            <div class="card-body d-flex flex-row flex-wrap">
                                <div>
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of
                                        the
                                        card's content.</p>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-primary m-1 mt-3">+</a>1
                                    <a href="#" class="btn btn-primary m-1 mt-3">-</a>
                                </div>
                            </div>
                            <div class="me-5">
                                $15
                            </div>
                        </li>
                        <div class="w-100 d-flex flex-row justify-content-between border-bottom">
                            <div class="p-2">subtotal</div>
                            <div class="p-2">$30</div>
                        </div>
                    </div>
                    <div class=" w-100 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary align-self-end mt-2 p-2">
                            下一步
                        </button>
                    </div>
                </ul>
            </form>
        </div>
    </div>
@endsection
@section('js')

@endsection
