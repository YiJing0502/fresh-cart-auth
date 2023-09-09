@extends('templates.fontTemplete')

@section('style')
    <style>
    .apart{
                letter-spacing:0.1rem;
            }
    </style>
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">

@endsection
@section('main-content')


<div class="container">
    <section class="order-header">
        <div class="apart"><span class="text-success">Home </span>/<span class="text-success"> Shop</span> / Shop Checkout</div>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-2 mt-5 mx-0">Checkout</h2>
                <div class="col-12"><span>Already have an account? Click here to <span class="text-success">Sign in.</span></div>
            </div>
        </div>
    </section>

    <section clas="order-body">
        <i class="fa-regular fa-credit-card fs-3 mt-5 text-black"></i><span class="fs-3 text-black">付款資訊</span>
        <div class="card mt-2">
            <ul class="list-group list-group-flush p-3 px-5">
                <label for="huey">
                   <input type="radio" id="huey" name="drone" value="huey" ><span class="fs-5">  臨櫃匯款</span>
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
                   <input type="radio" id="huey" name="drone" value="huey" ><span class="fs-5"> 線上付款</span>
                </label>
                <li class="text-black-50 mb-2 px-3">本站線上付款為綠界全流</li>

            </ul>
        </div>

    </section>


    <section class="order-footer d-flex justify-content-between mt-5 w-75 m-auto">
        <a href="{{route('order.tran')}}"><button class="btn btn-success">上一頁</button></a>
        <a href="{{route('order.thanks')}}"><button class="btn btn-success">下一頁</button></a>
    </section>



</div>

@endsection
@section('js')
    <script>

    </script>




@endsection

