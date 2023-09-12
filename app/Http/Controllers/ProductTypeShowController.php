<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductTypeShowController extends Controller
{
    //
    public function allIndex () {
        
        return view('front_end.product_type.all-product');
    }
}
