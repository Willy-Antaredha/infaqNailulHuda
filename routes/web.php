<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TingkatanKelasController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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



Route::middleware('guest')->group(function(){

    Route::get('/login', [AuthController::class, 'auth'])->name('login');
    Route::post('/authProses', [AuthController::class, 'authProses']);

});

Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'view']);

    // pemasukan
    Route::get('/pemasukancreate', [PemasukanController::class, 'create']);
    Route::get('/pemasukan/edit/{id}', [PemasukanController::class, 'edit']);
    Route::put('/pemasukan/edit/{id}', [PemasukanController::class, 'update'])->name('updatePemasukan');
    Route::get('/pemasukanview', [PemasukanController::class, 'index']);
    Route::post('/pemasukans', [PemasukanController::class, 'store'])->name('strorePemasukan');
    Route::delete('/delete/pemasukan/{id}', [PemasukanController::class, 'delete'])->name('delPemasukan');

    // pengeluaran
    Route::get('/pengeluaran', [PengeluaranController::class, 'create']);
    Route::get('/pengeluaranview', [PengeluaranController::class, 'index']);
    Route::get('/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit']);
    Route::post('/pengeluarans', [PengeluaranController::class, 'store'])->name('strorePengeluaran');
    Route::put('/pengeluaran/edit/{id}', [PengeluaranController::class, 'update'])->name('updatePengeluaran');
    Route::delete('/delete/pengeluaran/{id}', [PengeluaranController::class, 'delete'])->name('delPengeluaran');

    Route::get('/tingkatankelasview', [TingkatanKelasController::class, 'index']);
    Route::get('/tingkatankelas', [TingkatanKelasController::class, 'create']);
    Route::post('/tingkatankelas', [TingkatanKelasController::class, 'store']);
    Route::get('/tingkatankelasedit/{id}', [TingkatanKelasController::class, 'edit']);
    Route::post('/tingkatankelasupdate/{id}', [TingkatanKelasController::class, 'update']);
    Route::get('/tingkatankelasdelete/{id}', [TingkatanKelasController::class, 'delete']);
  
   

    Route::get('/userview', [UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'create']);

    Route::get('/logout', [AuthController::class, 'logout']);


});
