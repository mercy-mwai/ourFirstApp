<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('home');
});
Route::post('/register',[userController::class,'register']
);
Route::post('/logout',[userController::class, 'logout']);

Route::post('/login',[userController::class, 'login']);

//Blog post Routes
Route::post('/create_post',[postController::class,'createPost']);