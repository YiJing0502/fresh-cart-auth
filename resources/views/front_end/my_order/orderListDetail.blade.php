@extends('templates.fontTemplete')
@section('style')
@endsection
@section('main-content')
    <div class="container">
        @if (!$order)
            <h3>很抱歉，查無您要的資料</h3>
        @else
            <h3>我的基本訂單資訊</h3>
            <div class="accordion">
                {{-- 訂單狀態資訊 --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">訂單編號：</th>
                            <th scope="col">付款方式：</th>
                            <th scope="col">訂單狀態：</th>
                            <th scope="col">付款狀態：</th>
                            <th scope="col">運送狀態：</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">＠</th>
                            {{-- 訂單編號 --}}
                            <td>{{ $order->order_number }}</td>
                            {{-- 付款方式 --}}
                            <td>
                                @if ($order->pay_way == 1)
                                    臨櫃繳款
                                @elseif ($order->pay_way == 2)
                                    綠界線上匯款
                                @else
                                    未知支付方式
                                @endif
                            </td>
                            {{-- 訂單狀態 --}}
                            <td>
                                @if ($order->order_status == 1)
                                    處理中
                                @elseif ($order->order_status == 2)
                                    已確認
                                @elseif ($order->order_status == 3)
                                    已完成
                                @elseif ($order->order_status == 4)
                                    已取消
                                @else
                                    未知狀態
                                @endif
                            </td>
                            {{-- 付款狀態 --}}
                            <td>
                                @if ($order->payment_status == 1)
                                    未付款
                                @elseif ($order->payment_status == 2)
                                    付款失敗
                                @elseif ($order->payment_status == 3)
                                    超過付款時間
                                @elseif ($order->payment_status == 4)
                                    已付款
                                @elseif ($order->payment_status == 5)
                                    退款中
                                @elseif ($order->payment_status == 6)
                                    已退款
                                @else
                                    未知狀態
                                @endif
                            </td>
                            {{-- 運送狀態 --}}
                            <td>
                                @if ($order->delivery_status == 1)
                                    備貨中
                                @elseif ($order->delivery_status == 2)
                                    發貨中
                                @elseif ($order->delivery_status == 3)
                                    已發貨
                                @elseif ($order->delivery_status == 4)
                                    已到達
                                @elseif ($order->delivery_status == 5)
                                    已取貨
                                @elseif ($order->delivery_status == 6)
                                    退貨中
                                @elseif ($order->delivery_status == 7)
                                    退貨中
                                @else
                                    已退貨
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- 訂單狀態資訊 --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">運送日期：</th>
                            <th scope="col">收件人：</th>
                            <th scope="col">收件地址：</th>
                            <th scope="col">聯絡電話：</th>
                            <th scope="col">備註：</th>
                            <th scope="col">總金額：</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">＠</th>
                            {{-- 運送日期 --}}
                            <td>{{ $order->order_date }}</td>
                            {{-- 收件人 --}}
                            <td>{{ $order->order_name }}</td>
                            {{-- 收件地址 --}}
                            <td>{{ $order->order_address }}</td>
                            {{-- 聯絡電話 --}}
                            <td>{{ $order->order_phone }}</td>
                            {{-- 備註 --}}
                            <td>{{ $order->order_desc }}</td>
                            {{-- 總金額 --}}
                            <td>${{ $order->order_total }}</td>
                        </tr>
                    </tbody>
                </table>
                {{-- 查看更多 --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">查看訂單產品資訊：</th>
                            <th scope="col">前往繳費：</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">＠</th>
                            {{--  --}}
                            <td>
                                <a href="{{ route('order.list.detail', ['orders_id' => $order->id]) }}">
                                    <button type="button" class="btn btn-outline-success btn-sm">訂單產品資訊</button>
                                </a>
                            </td>
                            {{--  --}}
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm">繳費</button>
                            </td>
                            {{--  --}}
                            <td></td>
                            {{--  --}}
                            <td></td>
                            {{--  --}}
                            <td></td>
                            {{--  --}}
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <h3>我的訂購產品資訊</h3>
            <div class="row row-cols-md-2 row-cols-xl-4 justify-content-between">
                @foreach ($order_products as $productItem)
                    <div class="card" style="width: 18rem;">
                        <img src="{{$productItem->product_img}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">產品名稱：{{$productItem->product_name}}</h5>
                            <p class="card-text">產品描述：{{$productItem->product_desc}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">產品價格：${{$productItem->product_price}}</li>
                            <li class="list-group-item">預定數量：{{$productItem->desire_qty}}</li>
                            <li class="list-group-item">產品總價格：${{$productItem->desire_qty * $productItem->product_price}}</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">查看更多</a>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
@section('js')
@endsection
