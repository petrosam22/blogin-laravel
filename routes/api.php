<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




 Route::prefix('user')->group(function(){

     Route::post('/register',[UserController::class,'register']);
     Route::post('/login',[UserController::class,'login']);
     Route::get('/getUser',[UserController::class,'getUser'])->middleware('auth:api');

     Route::post('/sendEmail',[UserController::class,'sendWelcomeEmails']);

 });


Route::middleware('auth:api')->prefix('post')->group(function(){
    Route::get('/all',[PostController::class,'index']);
    Route::post('/store',[PostController::class,'store']);
    Route::post('/edit/{id}',[PostController::class,'edit']);
    Route::delete('/destroy/{id}',[PostController::class,'destroy']);
    Route::get('/show/{id}',[PostController::class,'show']);

});



