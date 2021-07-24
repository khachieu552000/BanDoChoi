<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LienheController extends Controller
{
    public function getLienhe(){
        return view('pages.lienhe');
    }
}
