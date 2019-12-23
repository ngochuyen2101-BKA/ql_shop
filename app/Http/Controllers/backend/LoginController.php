<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{LoginRequest,SignupRequest,EditInfoRequest,ChangePasswordRequest};
use DB;
use App\models\{users,customer};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mail;

class LoginController extends Controller
{
    public function GetLogin()
    {
        return view('backend.login.login');
    }

    
    public function PostLogin(LoginRequest $request)
    {
      
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => 1]))
      {
         return redirect('admin');
      }
      else if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => 2]))
      {
         return redirect('/product');
      }
      else {
          // có ->withInput() thì mới có thể sử dụng value="{{ old('email') }}"
         return redirect('login')->withInput()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác!');
      }
      
    }

    public function GetIndex()
    {
        $year_n = Carbon::now()->format('Y');
        $month_n = Carbon::now()->format('m');
        for($i=1;$i<=$month_n;$i++)
        {
            $month[$i] = 'Tháng '.$i;
            $number[$i] = customer::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_n)->sum('total');
        }
        $data['month'] = $month;
        $data['number'] = $number;
        $data['order'] = customer::where('state',0)->count();
        $data['cancel'] = customer::where('state',5)->count();
        return view('backend.index',$data);
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function Info($id)
    {
        $data['user'] = users::find($id);
        return view('backend.info',$data);
    }

    public function EditInfo($id)
    {
        $data['user'] = users::find($id);
        return view('backend.editinfo',$data);
    }

    public function PostEditInfo(EditInfoRequest $r,$id)
    {
        $user = users::find($id);
        $user->email = $r->email;
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->save();

        return redirect('/admin/info/'.$user->id)->with('thongbao','Bạn đã cập nhật thành công');
    }

    public function ChangePassword($id)
    {
        $data['user'] = users::find($id);
        return view('backend.changepassword',$data);
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

    public function GetSignUp()
    {
        return view('backend.login.signup');
    }

    public function PostSignUp(SignupRequest $r)
    {
        $user = new users;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = 2;
        $user->save();
        
        return redirect('/login')->with('thongbao1','Tạo tài khoản thành công');
    }
}
