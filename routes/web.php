<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/register',[RegisterController::class,'registerForm']);
Route::post('register/store',[RegisterController::class,'registerAdmin'])->name('register.store');

Route::get('admin/login',[LoginController::class,'loginForm'])->name('admin.login');
Route::post('admin/store',[LoginController::class,'adminLogin'])->name('admin.store');

Route::get('product',[ProductController::class,'index'])->middleware('auth');


Route::get('/admin/dashboard',function(){
    return view('admin');
})->middleware('auth:admin');
