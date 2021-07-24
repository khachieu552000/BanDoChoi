<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DangxuatController extends Controller
{
    public function getDangxuat(){
        Auth::logout();
        return redirect()->route('index');
    }
}
