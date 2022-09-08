<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CanteenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CanteenDahboardController;

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

Route::get('/', fn() => redirect('home'));

Route::resource('/user', UserController::class)->scoped(['user' => 'slug']);

Route::controller(UserController::class)->prefix('/user')->group(function(){
    Route::put('/{user:slug}/password', 'changePassword');
    Route::put('/{user:slug}/photo', 'changePhoto');
});

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/signup', [SignupController::class, 'index'])->name('signup')->middleware('guest');


Route::post('/wallet', [WalletController::class, 'store']);

Route::prefix('/canteen/dashboard')->middleware('canteen-admin')
            ->group(function(){
                Route::get('/', [CanteenDahboardController::class, 'index'])->name('canteen-admin-dashboard');
                Route::resource('/menu', MenuController::class);
            });

Route::prefix('/canteen')->controller(CanteenController::class)->middleware('auth')->group(function(){
    Route::get('/', 'index')->withoutMiddleware('auth');
    Route::get('/create', 'create');
    Route::post('/', 'store');
    Route::get('/{id}', 'show')->withoutMiddleware('auth');
});