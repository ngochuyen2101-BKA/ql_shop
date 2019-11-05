<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ListProduct()
    {
        return view('frontend.product.shop');
    }

    public function DetailProduct()
    {
        return view('frontend.product.detail');
    }
}
