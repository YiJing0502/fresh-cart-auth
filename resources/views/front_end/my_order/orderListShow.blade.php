@extends('templates.fontTemplete')
@section('style')
@endsection
@section('main-content')
    <div class="container">
        <h3>我的訂單資訊</h3>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            @foreach ($orders as $key => $item)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse{{ $item->id }}" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapse{{ $item->id }}">
                            訂單成立日：{{ $item->created_at->format('Y-m-d') }}
                            ｜訂單排序：{{ $key + 1 }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse{{ $item->id }}" class="accordion-collapse collapse show">
                        <div class="accordion-body">
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
                                        <td>{{ $item->order_number }}</td>
                                        {{-- 付款方式 --}}
                                        <td>
                                            @if ($item->pay_way == 1)
                                                臨櫃繳款
                                            @elseif ($item->pay_way == 2)
                                                綠界線上匯款
                                            @else
                                                未知支付方式
                                            @endif
                                        </td>
                                        {{-- 訂單狀態 --}}
                                        <td>
                                            @if ($item->order_status == 1)
                                                處理中
                                            @elseif ($item->order_status == 2)
                                                已確認
                                            @elseif ($item->order_status == 3)
                                                已完成
                                            @elseif ($item->order_status == 4)
                                                已取消
                                            @else
                                                未知狀態
                                            @endif
                                        </td>
                                        {{-- 付款狀態 --}}
                                        <td>
                                            @if ($item->payment_status == 1)
                                                未付款
                                            @elseif ($item->payment_status == 2)
                                                付款失敗
                                            @elseif ($item->payment_status == 3)
                                                超過付款時間
                                            @elseif ($item->payment_status == 4)
                                                已付款
                                            @elseif ($item->payment_status == 5)
                                                退款中
                                            @elseif ($item->payment_status == 6)
                                                已退款
                                            @else
                                                未知狀態
                                            @endif
                                        </td>
                                        {{-- 運送狀態 --}}
                                        <td>
                                            @if ($item->delivery_status == 1)
                                                備貨中
                                            @elseif ($item->delivery_status == 2)
                                                發貨中
                                            @elseif ($item->delivery_status == 3)
                                                已發貨
                                            @elseif ($item->delivery_status == 4)
                                                已到達
                                            @elseif ($item->delivery_status == 5)
                                                已取貨
                                            @elseif ($item->delivery_status == 6)
                                                退貨中
                                            @elseif ($item->delivery_status == 7)
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
                                        <td>{{ $item->order_date }}</td>
                                        {{-- 收件人 --}}
                                        <td>{{ $item->order_name }}</td>
                                        {{-- 收件地址 --}}
                                        <td>{{ $item->order_address }}</td>
                                        {{-- 聯絡電話 --}}
                                        <td>{{ $item->order_phone }}</td>
                                        {{-- 備註 --}}
                                        <td>{{ $item->order_desc }}</td>
                                        {{-- 總金額 --}}
                                        <td>${{ $item->order_total }}</td>
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
                                            <a href="{{ route('order.list.detail', ['orders_id' => $item->id]) }}">
                                                <button type="button"
                                                    class="btn btn-outline-success btn-sm">訂單產品資訊</button>
                                            </a>
                                        </td>
                                        {{--  --}}
                                        <td>
                                            @if ($item->payment_status == 1 || $item->payment_status == 2 || $item->payment_status == 3)
                                            <form action="{{ route('ecPaymentBackToPay') }}" method="post">
                                                @csrf
                                                <input name="orderId" type="hidden" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-outline-success btn-sm">繳費</button>
                                            </form>
                                            @else
                                            已完成繳費
                                            @endif
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
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
@section('js')
{{-- @dd(Session::all()); --}}
{{-- 將訊息放入 --}}
    @if (Session::has('message'))
        {{-- sweet alert js 引入 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: '錯誤',
                text: '{{ Session::get("message") }}',
            })
        </script>
    @else
    @endif
@endsection
