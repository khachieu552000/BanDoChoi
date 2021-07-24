<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;

class QLNhanVienController extends Controller
{
    public function index()
    {
        $user = User::where('role', '=', 2)->get();
        $viewData = [
            'user' => $user,
        ];
        return view('admin.QuanLyNhanVien.index', $viewData);
    }

    public function getAdd()
    {
        return view('admin.QuanLyNhanVien.add');
    }

    public function postAdd(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:32',
            'phone_number' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ],
        [
            "name.required" => "Hãy nhập tên!",
            "email.required" => "Hãy nhập email!",
            "email.unique" => "Email đã tồn tại!",
            "password.required" => "Hãy nhập password!",
            "password.min" => "Độ dài mật khẩu lớn hơn 6!",
            "password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
            "phone_number.required" => "Hãy nhập số điện thoại!",
            "birthday.required" => "Hãy nhập ngày sinh!",
            "gender.required" => "Hãy chọn giới tính!",
            "address.required" => "Hãy nhập địa chỉ!",
        ]);

        $user = new User;
        $user->role = 2;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $nhanvien = new Employee;
        $nhanvien->user_id = $user->id;
        $nhanvien->name = $request->name;
        $nhanvien->phone_number = $request->phone_number;
        $nhanvien->birthday = $request->birthday;
        $nhanvien->gender = $request->gender;
        $nhanvien->address = $request->address;
        $nhanvien->save();
        return redirect()->back()->with('thongbao', 'Thêm thành công!');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        $viewData = [
            'user' => $user,
        ];
        return view('admin.QuanLyNhanVien.edit', $viewData);
    }

    public function postEdit(Request $request, $id) {
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ],
        [
            "name.required" => "Hãy nhập tên!",
            "phone_number.required" => "Hãy nhập số điện thoại!",
            "birthday.required" => "Hãy nhập ngày sinh!",
            "gender.required" => "Hãy chọn giới tính!",
            "address.required" => "Hãy nhập địa chỉ!",
        ]);

        $nhanvien = Employee::where('user_id', '=', $id)->get();
        foreach ($nhanvien as $item) {
            $item-> name = $request-> name;
            $item->phone_number = $request->phone_number;
            $item->birthday = $request->birthday;
            $item->gender = $request->gender;
            $item->address = $request->address;
            $item->save();
        }

        return redirect()->back()->with('thongbao', 'Sửa thành công!');
    }

    public function getDelete($id)
    {
        $nhanvien = Employee::where('user_id', '=', $id)->get();
        foreach ($nhanvien as $item) {
            $item->delete();
        }
        User::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }

    public function getChangePassword($id)
    {
        $user = User::find($id);
        $user->password = bcrypt('12345678');
        return redirect()->back()->with('thongbao', 'Mật khẩu được trả về "12345678" !');
    }
}
