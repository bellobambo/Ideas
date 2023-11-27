<?php

use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=> 'guest'], function(){

    Route::get("/register", [AuthController::class, 'register'])->name('register');

    Route::get("/register", [AuthController::class, 'store']);

    Route::get("/login", [AuthController::class, 'login'])->name('login');

    Route::get("/login", [AuthController::class, 'authenticate']);

});



Route::get("/logout", [AuthController::class, 'logout'])->middleware('auth')->name('logout');
