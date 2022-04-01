<?php

use App\Http\Controllers\Users;
use App\Http\Controllers\Login;
use App\Http\Controllers\memberController;
use App\Http\Controllers\TestsEnrollmentController;
use App\Http\Controllers\URLGenerationController;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request as URL_request;
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

//member  Database list fetch "video:25"

Route::get("/database/fetch" , [memberController::class , "list"]);
Route::view("/database/add" , "memberDatabase.add");
Route::post("/database/add" , [memberController::class , "add"]);
Route::get("/database/delete/{id}" , [memberController::class , "delete"]);
Route::get("/database/editShow/{id}" , [memberController::class , "showData"]);
Route::post("/database/edit" , [memberController::class , "edit"]);

//Query Builder

Route::get("/queryBuilder" , [Users::class , "dbOperations"]);

//aggregate DB

Route::get("/queryBuilderAggregate" , [Users::class , "AggregateDB"]);

//Join
Route::get("/join" , [Users::class , 'join']);

//one to one relation

Route::get("/OneToOne" , [memberController::class , 'OneToOne']);
Route::get("/OneToOneInverse" , [memberController::class , 'OneToOneInverse']);
//one to Many relation

Route::get("/OneToMany" , [memberController::class, 'OneToMany']);
Route::get("/OneToManyInverse" , [memberController::class, 'OneToManyInverse']);


// api : see in route -> api


//cache
Route::get("/cache" , [Users::class, 'cacheLearn']);


//URL generation

Route::get('/home', [URLGenerationController::class ,'home'])->name('home');

Route::get('/about/{slug?}',[URLGenerationController::class ,'about'])->name('about-us');

Route::get('/posts/{post}/comments/{comment}' , function($post ,$comment){
     return "post";
})->name("post.comment");

Route::get('/secret' , function(URL_request $request){

  if (! $request->hasValidSignature()) {
    abort(401);
}

  return "This is secret Message" ;
})->name('secret');


//Notification

Route::get('/send-notification' , [TestsEnrollmentController::class , "sendNotification"]);