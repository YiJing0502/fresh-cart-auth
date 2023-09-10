@extends('templates.fontTemplete')
@section('style')
    <style>

    </style>
@endsection
@section('main-content')


<div class="container d-flex justify-content-center">

    <div class="card w-50 mt-5 p-5">

        <h2 class="mb-2 fs-1">感謝您的購買！</h2>
        <h6>您的支持是我們成長的動力</h6>
        <section class="order-footer d-flex justify-content-between mt-5">
            <a href="{{route('front-index')}}"><button class="btn btn-success">回首頁</button></a>
            <a href="{{route('order.pay')}}"><button class="btn btn-success">查看訂單</button></a>
        </section>



    </div>


</div>

@endsection
@section('js')
    <script>

    </script>




@endsection

