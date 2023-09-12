<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductTypeShowController extends Controller
{
    //
    public function allIndex (Request $request) {
        // 跟Model拿到DB的資料，進行我們要的資料篩選，篩選後拿出資料
        $products = Product::where('status' , '=', 1,)->get();
        // view頁面、回傳參數
        return view('front_end.product_type.all-product', compact('products'));
    }
}
