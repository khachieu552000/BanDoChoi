<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class QLHoaDonController extends Controller
{
    public function index()
    {
        $hoadonxuat = Bill::orderBy('id', 'asc')->get();
        $viewData = [
            'hoadonxuat' => $hoadonxuat,
        ];
        return view('admin.HoaDonXuat.index', $viewData);
    }
}
