<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

class CatsController extends Controller
{
    public function index(){

        $cat = Cat::find(1);
        dump($cat->cat_name);
        
    }
}
