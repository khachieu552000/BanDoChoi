<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ChitietspController extends Controller
{
    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $tuongtu = Product::where('id_type',$sanpham->id_type)->get();
        $sl = Product::where('new','=',1)->get();
        return view('pages.chitiet_sp',compact('sanpham','tuongtu','sl'));
    }
}
