<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ShowAttendenceController;
use App\Http\Controllers\UserController;

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

Route::get('login', [UserController::class, 'index'])->name('user.login');
Route::post('proses_login', [UserController::class, 'proses_login'])->name('user.proses_login');
Route::get('logout', [UserController::class, 'logout'])->name('user.logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [AttendenceController::class, 'index'])->name('presensi');
    Route::get('profil', [EmployeeController::class, 'show'])->name('profil');
    Route::get('riwayat-gaji', [PayrollController::class, 'payrollByUser'])->name('riwayat.gaji');
    Route::get('riwayat-gaji/{id}/generate-report', [PayrollController::class, 'generateReport'])->name('gaji.slip');

    Route::post('absen/store', [AttendenceController::class, 'checkin'])->name('checkin');
    Route::post('absen/update', [AttendenceController::class, 'checkout'])->name('checkout');


    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('admin', function () {
            return view('pages.admin.dashboard');
        });

        Route::group(['prefix' => 'absensi'], function () {
            Route::get('/show', [ShowAttendenceController::class, 'index'])->name('absen.show');
            Route::get('/filter', [ShowAttendenceController::class, 'filter'])->name('absen-filter');
            Route::get('/report', [ShowAttendenceController::class, 'generateExcel'])->name('absen.report');
        });

        Route::group(['prefix' => 'asuransi'], function () {
            Route::get('', [InsuranceController::class, 'index'])->name('asuransi');
            Route::post('store', [InsuranceController::class, 'store'])->name('asuransi.store');
            Route::put('update/{id}', [InsuranceController::class, 'update'])->name('asuransi.update');
            Route::delete('destroy/{id}', [InsuranceController::class, 'destroy'])->name('asuransi.destroy');
        });

        Route::group(['prefix' => 'kantor'], function () {
            Route::get('', [OfficeController::class, 'index'])->name('kantor');
            Route::get('create', [OfficeController::class, 'create'])->name('kantor.create');
            Route::post('store', [OfficeController::class, 'store'])->name('kantor.store');
            Route::get('edit/{id}', [OfficeController::class, 'edit'])->name('kantor.edit');
            Route::put('edit/{id}', [OfficeController::class, 'update'])->name('kantor.update');
        });

        Route::group(['prefix' => 'gaji'], function () {
            Route::get('', [PayrollController::class, 'index'])->name('gaji');
            Route::get('riwayat', [PayrollController::class, 'history'])->name('gaji.riwayat');
            Route::get('report', [PayrollController::class, 'generateExcel'])->name('gaji.report');
            Route::get('{id}', [PayrollController::class, 'create'])->name('gaji.create');
            Route::post('store/{id}', [PayrollController::class, 'store'])->name('gaji.store');
        });

        Route::group(['prefix' => 'karyawan'], function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('karyawan.index');
            Route::get('create', [EmployeeController::class, 'create'])->name('karyawan.create');
            Route::post('store', [EmployeeController::class, 'store'])->name('karyawan.store');
            Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('karyawan.edit');
            Route::put('update/{id}', [EmployeeController::class, 'update'])->name('karyawan.update');
            Route::post('user/{id}', [UserController::class, 'store'])->name('user.store');
            Route::delete('destroy/{id}', [EmployeeController::class, 'destroy'])->name('karyawan.destroy');
        });

        Route::group(['prefix' => 'divisi'], function () {
            Route::get('/', [DivisionController::class, 'index'])->name('divisi');
            Route::post('store', [DivisionController::class, 'store'])->name('divisi.store');
            Route::put('update/{id}', [DivisionController::class, 'update'])->name('divisi.update');
            Route::delete('destroy/{id}', [DivisionController::class, 'destroy'])->name('divisi.destroy');
        });

        Route::group(['prefix' => 'jabatan'], function () {
            Route::get('/', [PositionController::class, 'index'])->name('jabatan');
            Route::post('store', [PositionController::class, 'store'])->name('jabatan.store');
            Route::put('update/{id}', [PositionController::class, 'update'])->name('jabatan.update');
            Route::delete('destroy/{id}', [PositionController::class, 'destroy'])->name('jabatan.destroy');
        });
    });
});
