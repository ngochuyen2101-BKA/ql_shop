<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\customer;

class OrderController extends Controller
{
    public function ListOrder()
    {
        $data['customers'] = customer::where('state',0)->orderBy('created_at','desc')->paginate(10);
        return view('backend.order.order',$data);
    }

    public function DetailOrder($customer_id)
    {
        $data['customer'] = customer::find($customer_id);
        return view('backend.order.detailorder',$data);
    }

    public function ActiveOrder($customer_id)
    {
        $customer = customer::find($customer_id);
        $customer->state = 1;
        $customer->save();
        return redirect('/admin/order')->with('thongbao','Đã chốt đơn hàng thành công');
    }

    public function Processed()
    {
        $data['customers'] = customer::where('state',1)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.orderprocessed',$data);
    }
}
