<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;

class WebController extends Controller
{
    public function getIndex(){
        $slide =  Slide::all();
        $new_product = Product::where('new',1)->get();
        $sale = Product::where('promotion_price','<>',0)->get();
        return view('pages.index',compact('slide','new_product','sale'));
    }
}
