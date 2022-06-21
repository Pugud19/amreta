<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// ========== Route For Admin ==============
Route::view('/dashboard', 'admin.home');
Route::view('/dashboard/home', 'admin.home');
Route::view('/dashboard/pengguna', 'admin.pengguna.index');
Route::view('/dashboard/internet', 'admin.internet.index');
Route::view('/dashboard/pembayaran', 'admin.pembayaran.index');
Route::view('/dashboard/todo', 'admin.todo.index');
Route::view('/dashboard/masa-aktif', 'admin.masa-aktif.index');

// ========== Route For landing ==============
Route::view('/', 'landing.home');
Route::view('/home', 'landing.home');
Route::view('/about', 'landing.about');
Route::view('/service', 'landing.service');
Route::view('/contact', 'landing.contact');

// ========== Route For auth user ==============
Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

// ========== Route For Middleware user ==============
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::resource('landing', AdminController::class);
    });
});
