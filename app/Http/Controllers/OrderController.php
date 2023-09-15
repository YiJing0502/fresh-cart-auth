<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    // o 將產品加入購物車
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
    // o 會員查看訂單
    public function list_show_Index (Request $request)
    {
        $user = $request->user();
        // 取得自己的單，並傳送到頁面上
        $orders = Order::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('front_end.my_order.orderListShow', compact('orders'));
    }
    // 購物車下訂單的四頁
    public function list_index()
    {
        return view('front_end.cart_order.order_list');
    }
    public function tran_index()
    {
        return view('front_end.cart_order.order_tran');
    }
    public function pay_index()
    {
        return view('front_end.cart_order.order_pay');
    }
    public function thanks_index()
    {
        return view('front_end.cart_order.order_thanks');
    }
    public function thanks_store() {


    }






}
