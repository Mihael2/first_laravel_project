<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogsController extends Controller
{
public function index(){

    $dog = Dog::find(1);
    dump($dog->dog_name);

}
}
