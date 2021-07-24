<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccCustomer;
use App\User;

class QLKhachHangController extends Controller
{
    public function index()
    {
        $user = User::where('role', '=', 3)->get();
        $viewData = [
            'user' => $user,
        ];
        return view('admin.QuanLyKhachHang.index', $viewData);
    }
}
