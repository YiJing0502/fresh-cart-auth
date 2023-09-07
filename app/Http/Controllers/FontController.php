<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FontController extends Controller
{
    //
    public function index() {
        // status
        $products = Product::where('status', 1)->get();
        // dd($products);
        return view('welcome', compact('products'));
    }
}
