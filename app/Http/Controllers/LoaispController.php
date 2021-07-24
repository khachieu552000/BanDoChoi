<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class LoaispController extends Controller
{
    public function getLoaisp($type){
        $sptheoloai = Product::where('id_type',$type)->get();
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('pages.loaisp',compact('sptheoloai','loai','loai_sp'));
    }
}
