<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //membuat method about
    public function about ($nama){
        return view("pages.about", compact('nama'));
    }
}
