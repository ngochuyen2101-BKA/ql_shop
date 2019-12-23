<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{customer,ghtk};
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    function callAPI($method, $url, $data){
        $curl = curl_init();
     
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
     
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'Token: 6fE7Efbe2C70d3a7Da9C322F64f63468C71C4674',
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
    }

    public function ListOrder()
    {
        $data['customers'] = customer::where('state',0)->orderBy('created_at','desc')->paginate(10);
        return view('backend.order.order',$data);
    }

    public function DetailOrder($customer_id)
    {
        $cus = customer::find($customer_id);
        $data=[
            "pick_province"=> "Hà Nội",
            "pick_district"=> "Quận Thanh Xuân",
            "province"=> $cus->province,
            "district"=> $cus->district,
            "address"=> $cus->address,
            "weight"=> 0.1,
            "value"=> $cus->total,
            "transport"=> "fly"    
            ];
            
        $make_call = $this->callAPI('GET', 'https:///services/shipment/fee', json_encode($data));
        $response = json_decode($make_call, true);
        dd($response);
        $data['customer'] = customer::find($customer_id);
        return view('backend.order.detailorder',$data);
    }

    public function ActiveOrder($customer_id)
    {
        $cus = customer::find($customer_id);
        $cus->state = 2;
        $cus->save();
        $products=[];
        foreach($cus->order as $product)
        {
            $products[]=[
                'name'=>$product->name,
                'weight'=>0.1,
                'quantity'=>(int)$product->qty
            ];
    
        }
        $order=[
            "id"=> Str::random(3)."-".$cus->id,
            "pick_name"=> $cus->full_name,
            "pick_address"=> $cus->address,
            "pick_province"=> $cus->province,
            "pick_district"=> $cus->district,
            "pick_tel"=> $cus->phone,
            "tel"=> "0335311505",
            "name"=> "ĐƠN HÀNG TEST DÙNG CHO HỌC TẬP",
            "address"=> "11 Khương Hạ",
            "province"=> "Hà Nội",
            "district"=> "Thanh Xuân",
            "is_freeship"=> "1",
            "pick_date"=> Carbon::tomorrow()->format('Y-m-d'),
            "pick_money"=> $cus->total,
            "note"=> "Khối lượng tính cước tối đa: 1.00 kg",
            "value"=> $cus->total,
            "transport"=> "road"
        ];
        
        $data=[
            "products"=>$products,
            "order"=> $order
            ];

        $make_call = $this->callAPI('POST', 'https://services.giaohangtietkiem.vn/services/shipment/order/?ver=1.5', json_encode($data));
        $response = json_decode($make_call, true);
        // dd($response);
        $ghtk = new ghtk;
        $ghtk->order_code = $response['order']['label'];
        $ghtk->fee = $response['order']['fee'];
        $ghtk->estimated_pick_time = $response['order']['estimated_pick_time'];
        $ghtk->estimated_deliver_time = $response['order']['estimated_deliver_time'];
        $ghtk->customer_id = $customer_id;
        $ghtk->save();
        $data['ghtk'] = $ghtk;
        $data['customer'] = customer::find($customer_id);
        return redirect('/admin/order/active-ed');
    }

    public function ActiveEdOrder()
    {
        $data['customers'] = customer::where('state',2)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.GHTK-ed',$data);
    }

    public function ActiveAfter($customer_id)
    {
        $ghtk = customer::find($customer_id)->ghtk->last();
        $data['ghtk'] = $ghtk;
        $data['customer'] = customer::find($customer_id);
        return view('backend.order.GHTK-after',$data);
    }

    public function DeliverOrder01($customer_id)
    {
        $cus = customer::find($customer_id);
        $cus->state = 3;
        $cus->save();
        
        return redirect('/admin/order/deliver');
    }

    public function DeliverOrder()
    {
        $data['customers'] = customer::where('state',3)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.deliver',$data);
    }

    public function DeliverAfter($customer_id)
    {
        $ghtk = customer::find($customer_id)->ghtk->last();
        $data['ghtk'] = $ghtk;
        $data['customer'] = customer::find($customer_id);
        return view('backend.order.deliver-after',$data);
    }

    public function CustomerActiveEdOrder($customer_id)
    {
        $cus = customer::find($customer_id);
        $cus->state = 4 ;
        $cus->save();
        $data['customers'] = customer::where('state',4)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.orderprocessed',$data);
    }

    public function ConfirmOrder()
    {
        $data['customers'] = customer::where('state',4)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.confirm-order',$data);
    }

    public function ConfirmDetail($customer_id)
    {
        $ghtk = customer::find($customer_id)->ghtk->last();
        $data['ghtk'] = $ghtk;
        $data['customer'] = customer::find($customer_id);
        return view('backend.order.confirm-detail',$data);
    }

    public function ConfirmAfter($customer_id)
    {
        $cus = customer::find($customer_id);
        $cus->state = 1 ;
        $cus->save();
        
        return redirect('/admin/order/processed');
    }

    public function Processed()
    {
        $data['customers'] = customer::where('state',1)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.orderprocessed',$data);
    }

    public function ProcessedDetail($customer_id)
    {
        $ghtk = customer::find($customer_id)->ghtk->last();
        $data['ghtk'] = $ghtk;
        $data['customer'] = customer::find($customer_id);
        return view('backend.order.processed-detail',$data);
    }

    public function CancelOrder()
    {
        $data['customers'] = customer::where('state',5)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.cancel',$data);
    }

    public function CancelDetail($customer_id)
    {
        $data['customers'] = customer::where('state',5)->orderBy('updated_at','desc')->paginate(10);
        return view('backend.order.cancel',$data);
    }

    public function DetailGHTK($customer_id)
    {
        $ghtk = customer::find($customer_id)->ghtk->last();
        $data['ghtk'] = $ghtk;
        $data['customer'] = customer::find($customer_id);
        return view('backend.order.GHTK',$data);
    }
}
