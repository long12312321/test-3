<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DetailController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::get('/home',[HomeController::class,'getBlog']);
 Route::post('/login',[LoginController::class,'postLogin']);
 // admin user
 Route::get('/adminUser',[AdminController::class,'getUser']);
 Route::post('/add',[AdminController::class,'addUser']);
 Route::post('/delete',[AdminController::class,'deleteUser']);
 Route::get('edit/{id}',[AdminController::class,'getEditUser']);
 Route::post('edit/{id}',[AdminController::class,'editUser']);
 // admin post

 Route::get('/adminPost',[AdminController::class,'getBlog']);
 Route::post('/addPost',[AdminController::class,'addPost']);
 Route::post('/deletePost',[AdminController::class,'deletePost']);
 Route::get('editP/{id}',[AdminController::class,'getEditPost']);
 Route::post('editP/{id}',[AdminController::class,'editPost']);


 // admin comment
 Route::get('/adminComment',[AdminController::class,'getComment']);
 Route::post('/addComment',[AdminController::class,'addComment']);
 Route::post('/deleteComment',[AdminController::class,'deleteComment']);
 Route::get('editC/{id}',[AdminController::class,'getEditComment']);
 Route::post('editC/{id}',[AdminController::class,'editComment']);

 // register 
 Route::post('/register',[RegisterController::class,'registerAccount']);

 // detail post
 Route::get('detail/{id}',[DetailController::class,'viewIndex']);
 
