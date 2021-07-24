<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DangnhapController extends Controller
{

    public function getDangnhap(){
        return view('pages.dangnhap');
    }
    public function postDangnhap(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=> 'Email khong hợp lệ',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không được quá 20 kí tự'
        ]
        );
        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('index')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }

    }
}
