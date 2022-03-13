<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Users extends Controller
{
    //
    function show(){
        echo "Hello World" ;
    }

    function loadView($name="default"){
        $data = ['Jay'  , 'Raj' , 'Chintan' , 'Chagan']; 
        return view('main' , [ 'name' => $name, 'users'=> $data]);
    }

    function loadDB(){
        return DB::select("select * from users");
    }

    function loadDBModel(){
        return User::all();
    }

    function learnHttp($id="1"){

        $collection =  Http::get("https://reqres.in/api/users?page=".$id);
        $header = $collection->headers();
        return view('HttpClient.users', ["collection" => $collection['data'] , "header"=>$header]);
    }

    //sessionLogin Practice

    function sessionLogin(Request $request){
        $userData = $request->all();
        $request->session()->put('username', $userData['username']);
        return redirect('/session/profile');
    }

    function sessionLogout(Request $request){
      $username =   $request->session()->pull('username');
        
        return redirect('/session/login');
    }

    //flash session

    function sessionFlashAddMember(Request $request){
      $data =   $request->session()->flash('flashusername');
      return redirect('/flashsession/addMember');
    }
}
