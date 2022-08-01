<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPlaceController extends Controller
{
    public function index($lox = null){
        
            return "Raketomodelist Vanya $lox !";

    }
}
