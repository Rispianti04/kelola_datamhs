<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
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
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/kelola_mhs_asing', [AdminController::class, 'kelola_mhs_asing'])->name('Admin/kelola_mhs_asing');
Route::get('/kelola_mhs_asli', [AdminController::class, 'kelola_mhs_asli'])->name('Admin/kelola_mhs_asli');
Route::get('/jurusan', [AdminController::class, 'jurusan'])->name('Admin/jurusan');
Route::get('/add_mhs_asing', [AdminController::class, 'add_mhs_asing'])->name('Admin/add_mhs_asing');
Route::post('/store', [AdminController::class, 'store'])->name('Admin/store');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('Admin/edit');
Route::put('/update/{id}', [AdminController::class, 'update'])->name('Admin/update');
Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('Admin/delete');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('Admin/jurusan/create');
Route::post('/jurusan/store', [JurusanController::class, 'store']);


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