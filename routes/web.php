<?php

use App\Http\Controllers\Users;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ($name = "default") {

    return view('welcome', ['jaya' => $name]);
});

Route::view('/contact', 'contact');

Route::view('/about', 'about');

Route::view('/main', 'main');

// Route::get('/users' , [Users::class , 'show']);

// loading view from Controller
Route::get('/users/{name?}', [Users::class, 'loadView']);

// form data passing
Route::view("/login", 'form.login');

Route::post("/login_submit", [Login::class, 'loginPage']);

//middleware Logic
// Route::view("/middleware/home", "middleware.home");
// Route::view("/middleware/noaccess", "middleware.noaccess");
// Route::view("/middleware/users", "middleware.users");

//group middleware

Route::middleware(['protectedpages'])->group(function () {
    //
    Route::view("/middleware/home", "middleware.home");
    Route::view("/middleware/noaccess", "middleware.noaccess");
    Route::view("/middleware/users", "middleware.users");
});

//Database Connection

Route::get('/database', [Users::class , 'loadDB']);

Route::get('/model',[Users::class , 'loadDBModel']);

//Http Class (API)

Route::get('/httpClient/{id?}' , [Users::class , 'learnHttp']);

//Session

Route::get("/session/login" , function(){
        return view("session.login");
});
Route::post("/session/login", [Users::class,'sessionLogin']);

Route::get("/session/profile" , function(){
   
    if( session()->has('username')){
        return view("session.profile"); 
      }else{
        echo "working";
        return redirect("/session/login") ;
      }
     
});
Route::get("/session/logout", [Users::class,'sessionLogout']);


//flash session
Route::view("/flashsession/addMember" ,"flashsession.addMember" );

Route::post("/flashsession/addMember" , [Users::class , "sessionFlashAddMember"]);

