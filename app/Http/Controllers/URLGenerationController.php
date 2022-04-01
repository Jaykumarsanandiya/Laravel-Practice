<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class URLGenerationController extends Controller
{
    //
    public function home(){
        return view('URLGeneration.home');
    }

    public function about(){
        return view('URLGeneration.about');
    }
}
