<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Admin\JurusanController;
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
Route::get('/dashboard', [SuperAdminController::class, 'home']);
Route::get('/kelola_mhs_asing', [SuperAdminController::class, 'kelola_mhs_asing'])->name('SuperAdmin/kelola_mhs_asing');
Route::get('/kelola_mhs_asli', [SuperAdminController::class, 'kelola_mhs_asli'])->name('SuperAdmin/kelola_mhs_asli');
Route::get('/jurusan', [SuperAdminController::class, 'jurusan'])->name('SuperAdmin/jurusan');
Route::get('/add_mhs_asing', [SuperAdminController::class, 'add_mhs_asing'])->name('SuperAdmin/add_mhs_asing');
Route::post('/store', [SuperAdminController::class, 'store'])->name('SuperAdmin/store');
Route::get('/edit/{id}', [SuperAdminController::class, 'edit'])->name('SuperAdmin/edit');
Route::put('/update/{id}', [SuperAdminController::class, 'update'])->name('SuperAdmin/update');
Route::delete('/delete/{id}', [SuperAdminController::class, 'delete'])->name('SuperAdmin/delete');
Route::get('/jurusan/create', [SuperAdminController::class, 'create'])->name('SuperAdmin/jurusan/create');
Route::post('/jurusan/store', [SuperAdminController::class, 'store']);
Route::get('/nilai', [SuperAdminController::class, 'nilai'])->name('SuperAdmin/nilai');


Route::group(['prefix' => 'Admin', 'middleware' => ['Admin']], function () {
});
Route::group(['prefix' => 'SuperAdmin', 'middleware' => ['SuperAdmin']], function () {
});



// Route::group(['prefix' => 'Admin', 'middleware' => ['Admin']], function () {
//     Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
//     Route::get('/kelola_mhs_asing', [App\Http\Controllers\AdminController::class, 'kelola_mhs_asing'])->name('Admin/kelola_mhs_asing');
//     Route::get('/kelola_mhs_asli', [App\Http\Controllers\AdminController::class, 'kelola_mhs_asli']);
    
// });
// Route::group(['prefix' => 'SuperAdmin', 'middleware' => ['SuperAdmin']], function () {
    
// });