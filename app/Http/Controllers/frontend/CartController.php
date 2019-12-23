<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\models\{product};

class CartController extends Controller
{
    public function GetCart()
    {
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0,'',',');
        return view('frontend.cart.cart',$data);
    }

    public function AddCart(Request $r)
    {
        $product = product::find($r->id_product);
        Cart::add(['id' => $product->product_code, 
                   'name' => $product->name, 
                   'qty' => $r->quantity, 
                   'price' => getprice($product,$r->attr), 
                   'weight' => 0, 
                   'options' => ['img' => $product->img, 'attr' => $r->attr]]);
        return redirect('/user/cart');
    }   
    
    public function DelCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function UpdateCart($rowId,$qty)
    {
        if(Cart::update($rowId, $qty))
        {
            return "success";
        }
        else{
            return "errors";
        }
    }
}
