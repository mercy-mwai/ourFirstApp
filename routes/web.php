<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('home');
});
Route::post('/register',[userController::class,'register']
);
Route::post('/logout',[]);