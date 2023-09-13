@extends('templates.fontTemplete')

@section('css')
@endsection

@section('main-content')
    <div class="container">
        <div class="w-100 bg-light ">
            <title class="d-inline fs-1 ">Check out</title>
            <div class="d-flex flex-row">
                <a href="">Home</a>/<a href="">Shop</a>/<a href="">ShopCheckout</a>
            </div>
            <p class=" mb-5">already have account? Click here to <a href="">Sign in</a> .</p>
        </div>
        <form action="{{ route('shopThxPost') }}" method="POST">
            @csrf
            <div class="mb-5 mt-4">付款資訊</div>
            <div class="d-flex flex-column">
                <label>
                    <div class="border container d-flex align-items-start rounded p-3">
                        <input name="money_way" type="radio" class="mr-3 mt-1">
                        <ul class="ms-2 p-0">
                            <li class="fw-bold">臨櫃匯款</li>
                            <li name="shop_account">0000-123456789-123456</li>
                            <li name="shop_bank">007&nbsp&nbsp第一銀行</li>
                            <li name="shop_user">戶名：洪券雅</li>
                            <li name="shop_remark">匯款後請聯繫洪先生
                                <br>
                                請告知帳號末五碼以便對帳</li>
                        </ul>
                    </div>
                </label>
                <label>
                    <div class="border container d-flex align-items-start mt-3 rounded p-3">
                        <input name="money_way" type="radio" class="mr-3 mt-1">
                        <div class="ms-2">
                            <div class="fw-bold">線上匯款</div>
                            <div>本站線上付款為綠界金流</div>
                        </div>
                    </div>
                </label>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('shopDeliverGet') }}">
                    <button type="button">上一步</button>
                </a>
                <button type="submit">下一步</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
