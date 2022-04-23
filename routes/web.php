<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('login');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Auth::routes();

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::get('/kelola_mhs_asing', [App\Http\Controllers\AdminController::class, 'kelola_mhs_asing'])->name('Admin/kelola_mhs_asing');
    Route::get('/kelola_mhs_asli', [App\Http\Controllers\AdminController::class, 'kelola_mhs_asli']);

Route::group(['prefix' => 'Admin', 'middleware' => ['Admin']], function () {
    
});
Route::group(['prefix' => 'SuperAdmin', 'middleware' => ['SuperAdmin']], function () {
    
});
