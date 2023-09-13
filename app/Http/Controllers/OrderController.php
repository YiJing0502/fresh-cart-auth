<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    // 將產品加入購物車
    public function add_cart(Request $request)
    {

        $request->validate([
            'product_id' => 'required|min:1|numeric|exists:products,id',
            'desire_qty' => 'required|numeric',
        ]);
         // 查看拿到什麼、是否可以取值
        // dd($request->desire_qty);
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

    public function thanks_store(Request $request) {

        $orderData = $request->all();
        Mail::to('w71080635@gmail.com')->send(new OrderCreated($orderData));

    }






}
