<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('pages.admin.dashboard');
});
Route::get('/karyawan', function () {
    return view('pages.admin.employee.index');
});
Route::get('/karyawan/create', function () {
    return view('pages.admin.employee.create');
});
Route::get('/absensi', function () {
    return view('pages.admin.attendence.index');
});

Route::group(['prefix' => 'divisi'], function() {
    Route::get('/', [DivisionController::class, 'index'])->name('divisi');
    Route::post('store', [DivisionController::class, 'store'])->name('divisi.store');
    Route::put('update/{id}', [DivisionController::class, 'update'])->name('divisi.update');
    Route::delete('destroy/{id}', [DivisionController::class, 'destroy'])->name('divisi.destroy');
});

Route::group(['prefix' => 'jabatan'], function() {
    Route::get('/', [PositionController::class, 'index'])->name('jabatan');
    Route::post('store', [PositionController::class, 'store'])->name('jabatan.store');
    Route::put('update/{id}', [PositionController::class, 'update'])->name('jabatan.update');
    Route::delete('destroy/{id}', [PositionController::class, 'destroy'])->name('jabatan.destroy');
});

Auth::routes();