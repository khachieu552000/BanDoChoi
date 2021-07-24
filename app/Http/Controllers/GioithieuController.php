<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GioithieuController extends Controller
{
    public function getGioithieu(){
        return view('pages.gioithieu');
    }
}
