<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FontController extends Controller
{
    //
    public function index()
    {
        // status
        $products = Product::where('status', 1)->get();
        // dd($products);
        return view('fontFreshCart.fontFreshCart', compact('products'));
    }

    public function user_info(Request $request)
    {

        $user = $request->user();

        return view('front_end.userSetting', compact('user'));
    }
    public function user_info_update(Request $request)
    {
        $request->validate([
            'name' =>'required|max:10',
        ], [
            'name.required' => '姓名必填',
            'name.max' => '姓名最多10字'
        ]);
        $user = $request->user();
        $user->update([
            'name' => $request->name,
        ]);
            //  更新使用者資料
        $user->name = $request->name;
        // $user->update([
            // 'name' => $request->name,
        // ]);
        return redirect(route('front_end.userSetting'));
    }
}
