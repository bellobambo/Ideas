<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('', [DashboardController::class, 'index'])->name('dashboard');

// Route::group(['prefix'=> 'ideas/', 'as'=> 'ideas.', 'middleware'=>['auth']], function () {



//     Route::group(['middleware'=> ['auth']],function(){

//         Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
//     });
// });





Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);



Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);
Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');


Route::get('profile',[UserController::class, 'profile'])->middleware('auth')->name('profile');


Route::get('/terms', function () {
    return view('terms');
});

