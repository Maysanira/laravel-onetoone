<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\App\Http\PenggunaController;

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

route::resource('/pengguna', \App\Http\Controllers\PenggunaController::class);