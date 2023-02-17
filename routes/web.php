<?php

use App\Http\Controllers\blogcontroller;
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

Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('signup', function () {
    return view('signup');
})->name('signup');
Route::get('blog',[blogcontroller::class,'blog'])->name('blog');
Route::post('storeuser',[blogcontroller::class,'storeuser'])->name('storeuser');
Route::post('login',[blogcontroller::class,'login'])->name('login');
Route::post('storeblog',[blogcontroller::class,'storeblog'])->name('storeblog');
Route::get('blog',[blogcontroller::class,'bl'])->name('blog');
Route::post('cmntstore',[blogcontroller::class,'cmntstore'])->name('cmntstore');