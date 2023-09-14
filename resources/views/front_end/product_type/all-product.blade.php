@extends('templates.fontTemplete')
@section('style')
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <style>
        .card-product {
            width: 18rem;
            margin: 10px;
        }

        /* 加減按鈕設置 */
        .count-form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: unset;
            border-radius: var(--bs-border-radius);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .count-form-control:focus {
            color: unset;
            background-color: unset;
            border-color: unset;
            outline: unset;
            box-shadow: 0 0 0 0;
            border: unset
        }

        .product-count {
            border: 1px solid #e6e6e6;
            border-radius: 10px;
        }

        .btn-count {
            --bs-btn-padding-x: 0.75rem;
            --bs-btn-padding-y: 0.375rem;
            --bs-btn-font-family: ;
            --bs-btn-font-size: 1rem;
            --bs-btn-font-weight: 400;
            --bs-btn-line-height: 1.5;
            --bs-btn-color: var(--bs-body-color);
            --bs-btn-bg: transparent;
            --bs-btn-border-width: var(--bs-border-width);
            --bs-btn-border-color: transparent;
            --bs-btn-border-radius: var(--bs-border-radius);
            --bs-btn-hover-border-color: transparent;
            --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
            --bs-btn-disabled-opacity: 0.65;
            --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
            display: inline-block;
            padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
            font-family: var(--bs-btn-font-family);
            font-size: var(--bs-btn-font-size);
            font-weight: var(--bs-btn-font-weight);
            line-height: var(--bs-btn-line-height);
            color: var(--bs-btn-color);
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            border: unset;
            border-radius: 10px 0px 10px 0px;
            background-color: unset;

        }

        .btn-count:hover {
            color: #198754;
            background-color: unset;
            border-color: var(--bs-btn-hover-border-color);
            border-width: 10px;
            border-radius: 10px 0px 10px 0px;
        }

        /* 隱藏input arrows的功能 */
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('main-content')
    <div class="container">
        @dump($products)
        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-2 row-gap-1">
            @foreach ($products as $item)
                {{-- @dump($item) --}}
                <!-- 1 -->
                <div class="col">
                    <div class="card mb-3 card-product position-relative">
                        <div class="card-body d-flex flex-column align-items-center justify-content-between">
                            <div>
                                <span class="badge text-bg-danger me-auto">Sale</span>
                                <a href="#"><img src="{{ asset($item->img_path) }}" alt=""
                                        class="img-fluid mb-2-3"></a>

                                <a href="#" class="me-auto mb-2">
                                    <p class="card-text text-body-tertiary fs-7">
                                        類別
                                    </p>
                                </a>
                                <a href="#" class="me-auto">
                                    <h5 class="card-title fs-6">{{ $item->name }}</h5>
                                </a>
                                <div class="me-auto mb-3">
                                    <span class="fs-7 text-body-tertiary">{{ $item->descr }}</span>
                                </div>
                            </div>
                            <div
                                class="card-product-action position-absolute top-50 d-flex align-items-center justify-content-center gap-1 w-100">
                                <a href="#" class="btn-action action-link" data-action="Quick View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="#" class="btn-action action-link" data-action="Wishlish">
                                    <i class="bi bi-heart"></i>
                                </a>
                                <a href="#" class="btn-action action-link" data-action="Compare">
                                    <i class="bi bi-arrow-left-right"></i>
                                </a>
                            </div>
                            <div class="product-count d-flex align-items-center mb-3">
                                {{-- plus 加 --}}
                                <button type="button" class="btn h-100 btn-count"
                                    onclick="plus({{ $item->id }})">+</button>
                                {{-- 輸入匡 --}}
                                <input id="product{{ $item->id }}" class="count-form-control" type="number"
                                    placeholder="商品數量" value="1">
                                {{-- minus 減 --}}
                                <button type="button" class="btn btn-count" onclick="minus({{ $item->id }})">-</button>
                            </div>
                            <div class="d-flex justify-content-between w-100">
                                <div>
                                    <span class="fs-6">${{ $item->price }}</span>
                                </div>
                                 @if (Auth::check())
                                    <button type="button" class="btn btn-primary ms-auto btn-add"
                                        onclick="addCart({{ $item->id }})">
                                        <i class="bi bi-plus-lg me-1"></i>
                                        <span>加入購物車</span>
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary ms-auto btn-add">
                                        <i class="bi bi-plus-lg me-1"></i>
                                        <span>加入購物車</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <input id="oderAddCart" value="{{ route('order.add.cart') }}">
    </div>
@endsection
@section('js')
    <script>
        // 增加功能
        function plus(id) {
            const input = document.querySelector(`input#product${id}`);
            let inputNum = parseInt(input.value);
            console.dir(input.value);
            console.log(typeof input.value);
            if (inputNum < 1) {
                input.value = '1';
            } else if (!isNaN(inputNum)) {
                // 將字串轉成整數
                inputNum = Math.max(inputNum + 1, 1);
                // 計算完後賦值
                input.value = inputNum.toString();
            } else {
                console.log('fail');
            }
        }
        // 減少功能
        function minus(id) {
            const input = document.querySelector(`input#product${id}`);
            let inputNum = parseInt(input.value);
            console.dir(input.value);
            console.log(typeof input.value);
            if (inputNum < 1) {
                input.value = '1';
            } else if (!isNaN(inputNum)) {
                // 將字串轉成整數
                inputNum = Math.max(inputNum - 1, 1);
                // 計算完後賦值
                input.value = inputNum.toString();
            } else {
                console.log('fail');
            }
        }
        // 增加購物車
        function addCart(id) {
            console.log(123);
            const input = document.querySelector(`input#product${id}`);
            const formData = new FormData();
            const oderAddCart = document.querySelector(`input#oderAddCart`).value;

            // 送出給購物車表單
            formData.append('_token', '{{ csrf_token() }}');
            // 產品id
            formData.append('product_id', id);
            // 數量
            formData.append('desire_qty', input.value);
            console.log(oderAddCart);
            fetch(oderAddCart, {
                method: 'POST',
                body: formData,
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(data);
                if (data.code === 1) {
                    console.log('成功');
                    Swal.fire('成功加入購物車');
                }
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
