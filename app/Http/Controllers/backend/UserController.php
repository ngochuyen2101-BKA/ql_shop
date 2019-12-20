<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{customer, users};
use App\Http\Requests\AddUserRequest;

class UserController extends Controller
{
    public function ListUser()
    {
        $data['users']=users::where('level',2)->paginate(10);
        return view('backend.user.listuser',$data);
    }

    public function ListUserAdmin()
    {
        $data['users']=users::where('level',1)->paginate(10);
        return view('backend.user.listuseradmin',$data);
    }

    public function AddUser()
    {
        return view('backend.user.adduser');
    }

    public function PostAddUser(AddUserRequest $r)
    {
        $user =  new users;
        $user->email=$r->email;
        $user->password=bcrypt($r->password);
        $user->full=$r->full;
        $user->address=$r->address;
        $user->phone=$r->phone;
        $user->level=$r->level;
        $user->save();
        if($user->level == 1){
            return redirect('admin/user/user-admin')->with('thongbao','Đã thêm thành công');
        }
        else{
            return redirect('admin/user')->with('thongbao','Đã thêm thành công');
        }
        
    }

    public function DetailUser($email)
    {
        $data['user'] = users::where('email',$email)->first();
        $data['users'] = customer::where('email',$email)->paginate(5);
        return view('backend.user.infouser',$data);
    }
}
