<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\otentikasi;
use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;

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

Route::group(['middleware' => ['SudahLogin']], function () {
    Route::post('/', [otentikasi\OtentikasiController::class, 'login'])->name('login');
    Route::get('/', [otentikasi\OtentikasiController::class, 'index'])->name('index');
});

// route::middleware(['CheckLoginMiddleware'])->group(function () {
route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('index', ['isipesan' => "Selamat, Data berhasil disimpan"]);
    })->name('home');
    // Route::resource('Setup', 'SetupController');
    Route::get('crud', [CrudController::class, 'index'])->name('crud');
    Route::get('setup', [SetupController::class, 'index'])->name('setup.index');
    Route::get('crud/tambah', [CrudController::class, 'create'])->name('crud.tambah');
    Route::post('setup/tambah', [SetupController::class, 'store'])->name('setup.store');
    Route::post('crud', [CrudController::class, 'store'])->name('crud.simpan');
    Route::delete('crud/{id}', [CrudController::class, 'destroy'])->name('crud.hapus');
    Route::get('crud/{id}/edit', [CrudController::class, 'edit'])->name('crud.edit');
    Route::get('setup/{setup}/edit', [SetupController::class, 'edit'])->name('setup.edit');
    Route::patch('crud/{id}', [CrudController::class, 'update'])->name('crud.update');
    Route::patch('setup/{setup}', [SetupController::class, 'update'])->name('setup.update');
    Route::get('logout', [otentikasi\OtentikasiController::class, 'logout'])->name('logout');


    Route::resource('master-data/karyawan', App\Http\Controllers\MasterData\KaryawanController::class);
    Route::resource('master-data/divisi', App\Http\Controllers\MasterData\DivisiController::class);
});
