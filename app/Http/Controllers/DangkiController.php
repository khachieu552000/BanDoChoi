<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\AccCustomer;

class DangkiController extends Controller
{
    public function getDangki(){
        return view('pages.dangki');
    }

    public function postDangki(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
            $user = new User;
            $user->role = 3;
            $user ->email = $req->email;
            $user ->password = Hash::make($req->password);
            $user->save();

            $acc = new AccCustomer;
            $acc->user_id = $user->id;
            $acc->name = $req->name;
            $acc ->address = $req->address;
            $acc ->phone_number = $req->phone;
            $acc ->save();

            return redirect()->back()->with('Thanhcong','Tạo tài khoản thành công');
    }
}
