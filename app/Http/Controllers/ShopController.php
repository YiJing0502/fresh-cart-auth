<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;


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
        dump($rememberInfo);
        dump($rememberInfo['order_name']);
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
    }

    public function moneyIndex()
    {
        return view('front_end.shopprocess.money');
    }

    public function thxIndex()
    {
        return view('front_end.shopprocess.thx');
    }
}
