<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use DB;
use App\models\users;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function GetLogin()
    {
        return view('backend.login.login');
    }

    
    public function PostLogin(LoginRequest $request)
    {
      
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
      {
         return redirect('admin');
      }
      else {
          // có ->withInput() thì mới có thể sử dụng value="{{ old('email') }}"
         return redirect('login')->withInput()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác!');
      }
      
    }

    public function GetIndex()
    {
        return view('backend.index');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
