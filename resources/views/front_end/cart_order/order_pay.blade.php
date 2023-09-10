@extends('templates.fontTemplete')

@section('style')
    <style>
        .apart {
            letter-spacing: 0.1rem;
        }

        .card-title {
            width: 100px;
        }
    </style>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
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
        <section clas="order-body">
            <div class="card-title d-flex justify-content-between align-items-center mb-4">
                <i class="bi bi-geo-alt fs-5 mr-2"></i>
                <h5 class="mb-0">配送資訊</h5>
            </div>
            <div class="card mt-2">
                <ul class="list-group list-group-flush p-3 px-5">
                    <label for="huey">
                        <input type="radio" id="huey" name="drone" value="huey"><span class="fs-5"> 臨櫃匯款</span>
                    </label>
                    <li class="text-black-50 mb-2 px-3">0000-123456789-123456</li>
                    <li class="text-black-50 mb-2 px-3">007第一銀行</li>
                    <li class="text-black-50 mb-2 px-3">戶名：洪雋雅</li>
                    <li class="text-black-50 mb-2 px-3">匯款後請聯繫洪先生(0987877810)</li>
                    <li class="text-black-50 mb-2 px-3">請告知帳號末五碼以便對帳</li>
                </ul>
            </div>
            <hr class="mb-2">
            <hr class="mb-3">
            <div class="card mt-1">
                <ul class="list-group list-group-flush p-3 px-5">
                    <label for="huey">
                        <input type="radio" id="huey" name="drone" value="huey"><span class="fs-5"> 線上付款</span>
                    </label>
                    <li class="text-black-50 mb-2 px-3">本站線上付款為綠界金流</li>

                </ul>
            </div>

        </section>


        <section class="order-footer d-flex justify-content-between mt-5 w-75 m-auto">
            <a href="{{ route('order.tran') }}"><button class="btn btn-success">上一步</button></a>
            <a href="{{ route('order.thanks') }}"><button class="btn btn-success">下一步</button></a>
        </section>



    </div>
@endsection
@section('js')
    <script></script>
@endsection
