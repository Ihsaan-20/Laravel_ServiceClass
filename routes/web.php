<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestingController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('/products', ProductController::class);
});

Route::group(['middleware' => ['customer']], function () {
    route::get('dashboard', [UserController::class, 'index'])->name('customer.index');
    route::post('logout', [LoginController::class, 'logout'])->name('logout');
});