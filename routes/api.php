<?php

use App\Http\Controllers\dummyAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/data/{id}", [dummyAPI::class, "getData"]);

Route::post("/add", [dummyAPI::class, "saveData"]);

Route::put("/update" , [dummyAPI::class , "update"]);

Route::delete("/delete" , [dummyAPI::class ,"delete"]);

Route::get("/search/{name}" , [dummyAPI::class ,"search"]);

Route::post("/validate" , [dummyAPI::class , "Ourvalidate"]);

Route::post("/upload" , [dummyAPI::class , "upload"]);