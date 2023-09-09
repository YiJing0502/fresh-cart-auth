@extends('templates.fontTemplete')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .apart {
            letter-spacing: 1em;
        }

        .card-title {
            width: 100px;
        }
    </style>
@endsection

@section('main-content')
    <div class="container">
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

    </div>
@endsection
@section('js')
    <script></script>
@endsection
