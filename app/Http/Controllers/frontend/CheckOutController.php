<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Http\Requests\CheckOutRequest;
use App\models\{customer,order,attr,users};

class CheckOutController extends Controller
{
    public function Checkout($email)
    {
        $data['custom'] = users::where('email',$email)->first();
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0,'',',');
        return view('frontend.checkout.checkout',$data);
    }

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

   public function CheckDeliver($address,$province,$district)
    {
        dd($address);
    }

    public function PostCheckout(CheckOutRequest $r)
    {
      
        $customer = new customer;
        $customer->full_name = $r->full;
        $customer->address = $r->address;
        $customer->province = $r->province;
        $customer->district = $r->district;
        $customer->email = $r->email;
        $customer->phone = $r->phone;
        $customer->total = Cart::total(0,'','');
        $customer->state = 0;
        $customer->save();

        foreach(Cart::content() as $product)
        {
            $order = new order;
            $order->product_code = $product->id;
            $order->name = $product->name;
            $order->price = $product->price;
            $order->quantity = $product->qty;
            $order->img = $product->options->img;
            $order->customer_id = $customer->id;
            $order->save();

            foreach($product->options->attr as $key=>$value)
            {
                $attr = new attr;
                $attr->name = $key;
                $attr->value = $value;
                $attr->order_id = $order->id;
                $attr->save();
            }
            
        }
        Cart::destroy();
        return redirect('/user/checkout/complete/'.$customer->id);

      //   $products=[];
      //   foreach(Cart::content() as $row)
      //   {
      //      $products[]=[
      //          'name'=>$row->name.'-'.$row->id,
      //          'weight'=>0.1,
      //          'quantity'=>(int)$row->qty
      //      ];
       
      //   }
      //  $order=[
      //       "id"=> "A12",
      //       "pick_name"=> "NGUYỄN THỊ NGỌC HUYỀN",
      //       "pick_address"=> "Số 255 Khương Trung  TEST DEV",
      //       "pick_province"=> "TP. HÀ NỘI",
      //       "pick_district"=> "Thanh Xuân",
      //       "pick_tel"=> "0963223549",
      //       "tel"=> "0335311505",
      //       "name"=> "GHTK - Ha Noi",
      //       "address"=> "11 Khương Hạ",
      //       "province"=> "Hà Nội",
      //       "district"=> "Thanh Xuân",
      //       "is_freeship"=> "1",
      //       "pick_date"=> "2019-12-30",
      //       "pick_money"=> 10000,
      //       "note"=> "Khối lượng tính cước tối đa: 1.00 kg",
      //       "value"=> 10000,
      //       "transport"=> "road"
      //  ];
        
      //   $data=[
      //       "products"=>$products,
      //       "order"=> $order
      //       ];
   
      //       $make_call = $this->callAPI('POST', 'https://services.giaohangtietkiem.vn/services/shipment/order/?ver=1.5', json_encode($data));
      //       $response = json_decode($make_call, true);
      //       dd($response);
        
    }

    public function GetComplete($id_customer)
    {
        $data['customer'] = customer::find($id_customer);  
        return view('frontend.checkout.complete',$data);
    }
}
