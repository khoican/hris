<?php

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

Auth::routes();