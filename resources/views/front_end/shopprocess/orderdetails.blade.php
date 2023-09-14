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
    {{-- @dump($cart) --}}
    <div class="order-list d-flex flex-column">
        <div class="container">
            <div class="w-100 bg-light ">
                <title class="d-inline fs-1 ">Check out</title>
                <div class="d-flex flex-row">
                    <a href="">Home</a>/<a href="">Shop</a>/<a href="">ShopCheckout</a>
                </div>
                <p class=" mb-5">already have account? Click here to <a href="">Sign in</a> .</p>
            </div>
            <div class="mt-5 m-auto d-flex flex-column">
                <ul class="border">
                    <div class="border-bottom p-2">Order details</div>
                    <div class="w-100">
                        @foreach ($cart as $item)
                            {{-- @dump($item->product) --}}
                            <li id="row{{$item->id}}" class="card  w-100 d-flex flex-row align-items-center" style="width: 18rem;">
                                <img src="{{ $item->product->img_path }}" class="card-img-top w-25" alt="...">
                                <div class="card-body d-flex flex-row flex-wrap">
                                    <div>
                                        <h5 class="card-title"> {{ $item->product->name }}
                                        </h5>
                                        <p class="card-text">
                                            {{ $item->product->descr }}
                                        </p>
                                        <p class="card-text">
                                            <span>$</span>
                                            {{ $item->product->price }}
                                        </p>
                                    </div>
                                    <div class="product-count d-flex align-items-center mb-3">
                                        {{-- plus 加 --}}
                                        <button type="button" class="btn h-100 btn-count"
                                            onclick="plus({{ $item->id }})">+</button>
                                        {{-- 輸入匡 --}}
                                        <input id="product{{ $item->id }}" class="count-form-control" type="number"
                                            onchange="inputQty({{ $item->id }})" placeholder="商品數量"
                                            value="{{ $item->desire_qty }}">
                                        {{-- minus 減 --}}
                                        <button type="button" class="btn btn-count"
                                            onclick="minus({{ $item->id }})">-</button>
                                    </div>
                                </div>
                                <div class="me-5">
                                    <span>$</span>
                                    <span
                                        class="price{{ $item->id }}">{{ $item->product->price * $item->desire_qty }}</span>
                                </div>
                                <button type="button" class="btn btn-danger"
                                    onclick="deleteItem({{ $item->id }})">刪除</button>
                            </li>
                        @endforeach
                        {{-- 總金額 --}}
                        <div class="w-100 d-flex flex-row justify-content-between border-bottom">
                            <div class="p-2">subtotal</div>
                            <div class="p-2">
                                <span>$</span>
                                <span class="myTotal">{{ $total }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- 下一步 --}}
                    @if ($cart->count())
                        <a href="{{ route('shopDeliverGet') }}" class=" w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary align-self-end mt-2 p-2">
                                下一步
                            </button>
                        </a>
                    @endif
                </ul>
            </div>
            {{-- <input id="oderAddCart" value="{{ route('order.add.cart.update') }}"> --}}
        </div>
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
                fetchQty(id, input.value);
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
                fetchQty(id, input.value);
            } else {
                console.log('fail');
            }
        }
        // 當input手動輸入改變數值時，可以即時更新
        function inputQty(id) {
            const input = document.querySelector(`input#product${id}`);
            fetchQty(id, input.value);
        }
        // 刪除商品
        function deleteItem(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '確定要刪除嗎？',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '對，刪除',
                cancelButtonText: '不，取消',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token()}}');
                    formData.append('_method', 'DELETE');
                    formData.append('cart_id', id);
                    fetch('{{route('order.add.cart.delete')}}', {
                        method: 'POST',
                        body: formData,
                    }).then((res)=> {
                        return res.json();
                        // 用json轉譯傳來的物件
                    }).then((data)=> {
                        console.log(data);
                        if (data.code === 1 ) {
                            const row = document.querySelector(`li#row${id}`);
                            const myTotal = document.querySelector('.myTotal')
                            console.log(row);
                            row.remove();
                            myTotal.textContent = data.total;
                        }
                    })
                    swalWithBootstrapButtons.fire(
                        '刪除了!',

                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        '取消了！',

                    )
                }
            })
        }
        // 增加購物車
        // id => cart_id ,qty => 商品數量
        function fetchQty(id, qty) {
            console.log(123);
            const input = document.querySelector(`input#product${id}`);
            const formData = new FormData();
            // const oderAddCart = document.querySelector(`input#oderAddCart`).value;

            // 送出給購物車表單
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');
            // 產品id
            formData.append('product_id', id);
            // 數量
            formData.append('desire_qty', input.value);
            // console.log(oderAddCart);
            fetch('{{ route('order.add.cart.update') }}', {
                method: 'POST',
                body: formData,
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(data);
                const myPrice = document.querySelector(`.price${id}`);
                const myTotal = document.querySelector('.myTotal');
                myPrice.textContent = data.price;
                myTotal.textContent = data.total;
                // if (data.code === 1) {
                //     console.log('成功');
                //     Swal.fire('成功加入購物車');
                // }
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
