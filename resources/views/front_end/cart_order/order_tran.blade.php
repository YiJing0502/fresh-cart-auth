@extends('templates.fontTemplete')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .apart {
            letter-spacing: 0.1rem;
        }

        .card-title {
            width: 100px;
        }

        .form-control:focus {
            color: unset;
            background-color: unset;
            border-color: unset;
            outline: unset;
            box-shadow: 0 0 0 0;
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
        <div class="card-title d-flex justify-content-between align-items-center mb-4">
            <i class="bi bi-geo-alt fs-5 mr-2"></i>
            <h5 class="mb-0">配送資訊</h5>
        </div>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-4">
                    <input class="form-control mb-2" type="text" placeholder="收件者姓名" aria-label="default input example">
                    <input class="form-control mb-2" type="text" placeholder="收件者地址" aria-label="default input example">
                    <input class="form-control mb-2" type="date" placeholder="配送日期" aria-label="default input example">
                    <input class="form-control mb-2" type="number" placeholder="收件者聯絡電話"
                        aria-label="default input example">
                    <input class="form-control mb-2" type="text" placeholder="收件者地址" aria-label="default input example">
                </li>
            </ul>
        </div>
        <section class="order-footer d-flex justify-content-between mt-5 w-75 m-auto">
            <a href="{{ route('order.list') }}"><button class="btn btn-success">上一步</button></a>
            <a href="{{ route('order.pay') }}"><button class="btn btn-success">下一步</button></a>
        </section>

    </div>
@endsection
@section('js')
    <script></script>
@endsection
