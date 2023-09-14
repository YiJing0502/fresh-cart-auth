@extends('templates.fontTemplete')

@section('css')
    <style>
        ul {
            padding: 0;
        }

        .content-thx {
            height: 50vh;
        }
    </style>
@endsection

@section('main-content')
    <div class="order-list d-flex flex-column">
        <div>
            <div class="w100 border d-flex flex-column">
                <div class=" content-thx d-flex flex-column justify-content-center align-items-center">
                    感謝您的購買==
                    <div class="mt-5 ">
                        <a href="/">
                            <button type="button" class="btn btn-primary m-5">回首頁</button>
                        </a>
                        <a href="">
                            <button type="button" class="btn btn-primary m-5">查看訂單</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
