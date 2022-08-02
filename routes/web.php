<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function(){
    return redirect('home');
});


Route::resource('/user', UserController::class)->scoped(['user' => 'slug']);
Route::put('/user/{user:slug}/password', [UserController::class, 'changePassword']);
Route::put('/user/{user:slug}/photo', [UserController::class, 'changePhoto']);

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/signup', [SignupController::class, 'index'])->name('signup')->middleware('guest');


Route::post('/wallet', [WalletController::class, 'store']);