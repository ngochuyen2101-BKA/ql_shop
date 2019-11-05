<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function GetCheckout()
    {
        return view('frontend.checkout.checkout');
    }

    public function GetComplete()
    {
        return view('frontend.checkout.complete');
    }
}
