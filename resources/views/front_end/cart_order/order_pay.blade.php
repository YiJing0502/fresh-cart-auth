@extends('templates.fontTemplete')
@section('style')
    <style>

    </style>
@endsection
@section('main-content')


<div class="container d-flex justify-content-center">

    <div class="card w-50 mt-5 p-5">

        <li class="mb-5 fs-3">感謝您的購買~~</li>



        <section class="order-footer d-flex justify-content-between mt-5 w-75 m-auto">
            <a href="{{route('')}}"><button class="btn btn-success">回首頁</button></a>
            <a href="{{route('')}}"><button class="btn btn-success">查看訂單</button></a>
        </section>

    </div>


</div>

@endsection
@section('js')
    <script>

    </script>




@endsection

