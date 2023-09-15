<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;


class ShopController extends Controller
{
    //
    // 將產品加入購物車
    public function add_cart(Request $request)
    {

        $request->validate([
            'product_id' => 'required|min:1|numeric|exists:products,id',
            'desire_qty' => 'required|numeric',
        ]);
        // 查看拿到什麼、是否可以取值
        // dd($request->desire_qty);
        // 假設右邊可以創立成功， $cart就可以拿到資料，創立不成功就無法拿到資料， $cart為null
        // 將相同產品的訂單qty疊加，先去找之前的訂單是否存在
        $oldCart = Cart::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        // 如果存在這筆就的訂單，就把原本的qty加上，不存在就創立一筆新的訂單
        if ($oldCart) {
            // 先找到資料在更新
            $cart = $oldCart->update([
                'desire_qty' => $oldCart->desire_qty + $request->desire_qty,
            ]);
        } else {
            // 創立一筆新訂單
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'desire_qty' => $request->desire_qty,
                'user_id' => $request->user()->id,
            ]);
        }
        // 回傳物件，前台使用json轉譯
        return (object)[
            // 判斷是否存在true=1,false=0
            'code' => $cart ? 1 : 0,
            'product_id' => $request->product_id,
        ];
    }
    // 購物車頁更新產品數量
    public function add_cart_update (Request $request)
    {
        $request->validate([
            'product_id' => 'required|min:1|numeric|exists:products,id',
            'desire_qty' => 'required|numeric',
        ]);
        // dd($request->desire_qty);

        $cart = Cart::find($request->product_id);
        $updateCart = $cart->update([
            'desire_qty' => $request->desire_qty,
        ]);
        // 重新計算總金額
        $cartTotal = Cart::where('user_id', $request->user()->id)->get();
        // 計算總金額邏輯
        $total = 0;
        foreach ($cartTotal as $value) {
            $total += $value->product->price * $value->desire_qty;
        }

        return (object)[
            // 判斷是否存在true=1,false=0
            'code' => $updateCart ? 1 : 0,
            'price' => ($cart->product?->price ?? 0) * $cart->desire_qty,
            'product_id' => $request->product_id,
            'total' => $total,
        ];

    }
    // 購物車頁刪除產品
    public function add_cart_delete (Request $request) {
        // 1.驗證
        $request->validate([
            'cart_id' =>'required|min:1|numeric|exists:carts,id',
        ]);
        // 2.測試是否可以通過驗證
        // dd($request->cart_id);
        // 3.從model找出資料並刪除
        $cart = Cart::find($request->cart_id)->delete();
        // 4.更新金額
        $total = 0;
        $cartTotal = Cart::where('user_id', $request->user()->id)->get();
        foreach ($cartTotal as $value) {
            $total += $value->product->price * $value->desire_qty;
        }
        // 回傳物件
        return (object)[
            'code' => $cart? 1 : 0,
            // code $cart是否存在，存在為1，不存在為0
            'id' => $request->cart_id,
            'total' => $total,
        ];
    }
    public function orderDetailsIndex(Request $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)->get();
        // 計算總金額邏輯
        $total = 0;
        foreach ($cart as $value) {
            $total += $value->product->price * $value->desire_qty;
        }
        return view('front_end.shopprocess.orderdetails', compact('cart', 'total'));
    }

    public function deliverIndex()
    {
        $rememberInfo = session()->all();
        // dump($rememberInfo);
        // dump($rememberInfo['order_name']);
        return view('front_end.shopprocess.deliver', compact('rememberInfo'));
    }
    public function deliverStore (Request $request) {
        // dd($request->all());
        // 缺驗證
        $request->session()->put('order_name', $request->order_name);
        $request->session()->put('order_address', $request->order_address);
        $request->session()->put('order_date', $request->order_date);
        $request->session()->put('order_phone', $request->order_phone);
        $request->session()->put('order_desc', $request->order_desc);
        return redirect()->route('shopMoneyGet');
    }

    public function moneyIndex()
    {
        return view('front_end.shopprocess.money');
    }
    public function moneyStore (Request $request) {
        // 1.驗證
        $request->validate([
            'money_way' => 'required|numeric'
        ]);
        // 2.建立訂單編號
        // 隨機的兩個英文字母
        $randomChars = Str::random(2);
        // 年月日
        $yearMonthDay = Carbon::now()->format('Ymd');
        // 今日第幾筆訂單（假設你已經有了一個計數器）
        $orderCount = 1;  // 這個數字應該根據實際情況更動
        // 將訂單計數器格式化為四位數，例如：0001
        $orderCountStr = str_pad($orderCount, 4, '0', STR_PAD_LEFT);
        // 隨機的三個數字
        $randomNumbers = Str::random(3);
        // 最終的訂單編號
        $orderNumber = $randomChars . $yearMonthDay . $orderCountStr . $randomNumbers;
        // 3.更新金額
        $total = 0;
        $cartTotal = Cart::where('user_id', $request->user()->id)->get();
        foreach ($cartTotal as $value) {
            $total += $value->product->price * $value->desire_qty;
        }
        // 4.建立訂單
        $order = Order::create([
            'user_id' => $request->user()->id,
            'order_number'=> $orderNumber,
            'order_date' => session()->get('order_date'),
            'order_name' => session()->get('order_name'),
            'order_address' => session()->get('order_address'),
            'order_phone' => session()->get('order_phone'),
            'order_desc' => session()->get('order_desc'),
            'order_total' => $total,
            'pay_way' => $request->money_way,
            'order_status' => 1,
            'payment_status' => 1,
            'delivery_status' => 1,
        ]);
        // 清除session
        $request->session()->forget('order_name');
        $request->session()->forget('order_address');
        $request->session()->forget('order_date');
        $request->session()->forget('order_phone');
        $request->session()->forget('order_desc');
        // 清除購物車
        $cart = Cart::where('user_id', $request->user()->id)->get();
        foreach ($cart as $value) {
            $value->delete();
        }
        // 寄信
        // 付款方式
        $pay = '';
        if ($request->money_way == 1) {
            $pay = '臨櫃繳款';
        } else if ($request->money_way == 2) {
            $pay = '綠界線上匯款';
        } else {
            $pay = '未知支付方式';
        }
        // 訂單狀態
        $order_status = '';
        if ($order->order_status == 1) {
            $order_status = '處理中';
        } else if ($order->order_status == 2) {
            $order_status = '已確認';
        } else if ($order->order_status == 3) {
            $order_status = '已完成';
        } else if ($order->order_status == 4) {
            $order_status = '已取消';
        } else {
            $order_status = '未知狀態';
        }
        // 付款狀態
        $payment_status = '';
        if ($order->payment_status == 1) {
            $payment_status = '未付款';
        } else if ($order->payment_status == 2) {
            $payment_status = '付款失敗';
        } else if ($order->payment_status == 3) {
            $payment_status = '超過付款時間';
        } else if ($order->payment_status == 4) {
            $payment_status = '已付款';
        } else if ($order->payment_status == 5) {
            $payment_status = '退款中';
        } else if ($order->payment_status == 6) {
            $payment_status = '已退款';
        } else {
            $payment_status = '未知狀態';
        }
        // 送貨狀態
        $delivery_status = '';
        if ($order->order_status == 1) {
            $delivery_status = '備貨中';
        } else if ($order->delivery_status == 2) {
            $delivery_status = '發貨中';
        } else if ($order->delivery_status == 3) {
            $delivery_status = '已發貨';
        } else if ($order->delivery_status == 4) {
            $delivery_status = '已到達';
        } else if ($order->delivery_status == 5) {
            $delivery_status = '已取貨';
        } else if ($order->delivery_status == 6) {
            $delivery_status = '退貨中';
        } else if ($order->delivery_status == 7) {
            $delivery_status = '已退貨';
        } else {
            $delivery_status = '未知狀態';
        }
        $orderData = [
            'user_name' => $request->user()->name,
            'order_number' => $order->order_number,
            'order_date' => $order->order_date,
            'order_name' => $order->order_name,
            'order_address' => $order->order_address,
            'order_phone' => $order->order_phone,
            'order_desc' => $order->order_desc,
            'order_total' => $order->order_total,
            'pay_way' => $pay,
            'order_status' => $order_status,
            'payment_status' => $payment_status,
            'delivery_status' => $delivery_status,

        ];
        // Mail::to($request->user()->email)->send(new OrderCreated($orderData));
        Mail::to('w71080635@gmail.com')->send(new OrderCreated($orderData));
        return redirect(route('shopThxGet'));
    }
    public function thxIndex(Request $request)
    {

        return view('front_end.shopprocess.thx');
    }
}
