<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TimkiemController extends Controller
{
    public function getTimkiem(Request $request){
        $product = Product::where('name','like','%'.$request->keyname.'%')
        -> orWhere('unit_price',$request->keyname)->get();
        return view('pages.timkiem',compact('product'));
    }
}
