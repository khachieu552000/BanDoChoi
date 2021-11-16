<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use PDF;

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
    public function print($id){
        $hdx = Bill::find($id);
        $cthdx = BillDetail::where('id_bill', $id)->get();

        $pdf = PDF::loadView('admin.HoaDonXuat.print', compact('hdx', 'cthdx'));

        $title = 'HDX'.$id.'-ngay-xuat-'.$hdx->ngay_lap.'.pdf';
		return $pdf->stream($title);
    }
}
