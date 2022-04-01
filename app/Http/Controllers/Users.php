<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Users extends Controller
{
    //
    function show()
    {
        echo "Hello World";
    }

    function loadView($name = "default")
    {
        $data = ['Jay', 'Raj', 'Chintan', 'Chagan'];
        return view('main', ['name' => $name, 'users' => $data]);
    }

    function loadDB()
    {
        return DB::select("select * from users");
    }

    function loadDBModel()
    {
        return User::all();
    }

    function learnHttp($id = "1")
    {

        $collection =  Http::get("https://reqres.in/api/users?page=" . $id);
        $header = $collection->headers();
        return view('HttpClient.users', ["collection" => $collection['data'], "header" => $header]);
    }

    //sessionLogin Practice

    function sessionLogin(Request $request)
    {
        $userData = $request->all();
        $request->session()->put('username', $userData['username']);
        return redirect('/session/profile');
    }

    function sessionLogout(Request $request)
    {
        $username =   $request->session()->pull('username');

        return redirect('/session/login');
    }

    //flash session

    function sessionFlashAddMember(Request $request)
    {
        $data = $request->input('flashusername');

        $request->session()->flash('flashusername', $data);

        return redirect('/flashsession/addMember');
    }

    // query Builder
    function dbOperations()
    {
        return DB::table("members")->get();
        // return Member::all();
    }

    //Aggregate  Methods
    function AggregateDB()
    {
        // DB::table("members")->where('name', 'Ajay')->get("email");
        $minID = DB::table("members")->min("id");
        $maxID = DB::table("members")->max("id");

        return "Min ID is " . $minID . " and Max ID is " . $maxID;
    }

    function join()
    {
        return DB::table('members')
            ->join('company', 'members.id', '=', 'company.employee_id', 'right outer')
            //->where('company.name','simform')
            ->get();
    }

    //cache
    public function cacheLearn()
    {
        echo "<h1>Cache Learning </h1>";
        
        
         //  ********************************* Cache Global Helper ***************************
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        //  ********************************* Cache Facades ***************************
        
        // Cache::put('email','admin@gmail.com' , 20);
        // Cache::put("roll",101);
        // Cache::forever("product", "laptop");

        // dd(Cache::get('email'));
        // $product = Cache::get("product");
        // dd($product);
        // if(Cache::has("product")){
        //     dd("YES");
        // }else{
        //     dd("No");
        // }

        // Cache::flush();
        // return view("cache.cache",["data" =>$product]);
    }
}
