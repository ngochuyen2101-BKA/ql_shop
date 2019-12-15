<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{product,category,attribute,values};

class ProductController extends Controller
{
    public function ListProduct(Request $r)
    {
        if($r->category)
        {
            $data['products'] = category::find($r->category)->product()->where('img','<>','no-img.jpg')->paginate(12);
        }
        elseif($r->start)
        {
            $data['products'] = product::whereBetween('price',[$r->start,$r->end])->where('img','<>','no-img.jpg')->paginate(12);
        }
        elseif($r->value)
        {
            $data['products'] = values::find($r->value)->product()->where('img','<>','no-img.jpg')->paginate(12);
        }
        else
        {
            $data['products'] = product::where('img','<>','no-img.jpg')->paginate(12);
        }
        $data['category'] = category::all();
        $data['attrs'] = attribute::all();
        return view('frontend.product.shop',$data);
    }

    public function DetailProduct($id)
    {
        $data['product_new'] = product::where('img','<>','no-img.jpg')->orderBy('created_at','desc')->take(4)->get();
        $data['product'] = product::find($id);
        return view('frontend.product.detail',$data);
    }
}
