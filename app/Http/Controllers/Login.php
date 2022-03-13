<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class Login extends Controller
{
    //
    function loginPage(Request $req){
        $req->validate([
            "username" => "Required | max : 5",
            "userpassword" => "Required | min :3"
        ]);
        return $req->input();
    }
}
