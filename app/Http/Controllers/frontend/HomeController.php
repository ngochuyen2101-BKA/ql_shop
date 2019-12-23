<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\product;
use App\models\{users,customer};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mail;
use App\Http\Requests\{LoginRequest,SignupRequest,EditInfoRequest,ChangePasswordRequest};

class HomeController extends Controller
{
    public function GetHome()
    {
        $data['product_fe'] = product::where('featured',1)->where('img','<>','no-img.jpg')->take(4)->get();
        $data['product_new'] = product::where('img','<>','no-img.jpg')->orderBy('created_at','desc')->take(8)->get();
        return view('frontend.index',$data);
    }

    public function Info($email)
    {
        $data['user'] = users::where('email',$email)->first();
        $data['users'] = customer::where('email',$email)->orderBy('created_at','desc')->paginate(5);
        return view('frontend.info',$data);
    }

    public function EditInfo($id)
    {
        $data['user'] = users::find($id);
        return view('frontend.editinfo',$data);
    }

    public function PostEditInfo(EditInfoRequest $r,$id)
    {
        $user = users::find($id);
        $user->email = $r->email;
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->save();

        return redirect('/user/info/'.$user->id)->with('thongbao','Bạn đã cập nhật thành công');
    }

    public function DelOrder($id)
    {
        $custom = customer::find($id);
        if($custom->state == 0){
            $custom->state = 5;
            $custom->save();
        return redirect()->back()->with('thongbao','Đã xóa thành công');
        }
        else{
            return redirect()->back()->with('thongbao1','Không thể xóa đơn hàng');
        }
        
    }

    public function ConfirmOrder($id)
    {
        $custom = customer::find($id);
        if($custom->state == 3){
            $custom->state = 4;
            $custom->save();
            return redirect()->back()->with('thongbao','Đã xác nhận thành công');
        }
        else{
            return redirect()->back()->with('thongbao1','Chưa thể xác nhận');
        }
        
    }

    public function DetailOrder($id)
    {
        
        $data['customer'] = customer::find($id);
        $cus = customer::find($id);
        if($cus->state !=5){
            $ghtk = customer::find($id)->ghtk->last();
            $data['ghtk'] = $ghtk;
            return view('frontend.detail',$data);
        }
        else{
            return view('frontend.detail01',$data);
        }
        
    }

    public function ChangePassword($id)
    {
        $data['user'] = users::find($id);
        return view('frontend.changepassword',$data);
    }

    public function PostChangePassword(ChangePasswordRequest $r,$id)
    {
        $u = users::find($id);
        if($r->password == $r->repassword)
        {
            $u->password = bcrypt($r->password);
        }
        $u->save();
        
        // $data['name']=$u->full;
        // $data['email']=$r->email;
        // Mail::send('mail',$data,function($message) use ($data){
        //     $message->from('huyenntn.ntnh@gmail.com','NNH Shop');
        //     $message->to($data['email'],'Khách hàng');
        //     $message->subject('Change Password');
        // });
        Auth::logout();
        return redirect('login')->with('thongbao1','Đổi mật khẩu thành công');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function GetContact()
    {
        return view('frontend.contact');
    }

    public function GetAbout()
    {
        return view('frontend.about');
    }
}
