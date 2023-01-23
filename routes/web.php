<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PanggilAntrianController;

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
    return view('front.index');
});

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/store-transaksi', [TransaksiController::class, 'storeTransaksi']);
Route::post('/cetak-transaksi/{antrian:id}', [TransaksiController::class, 'cetakTransaksi']);

Route::get('/cs', [CsController::class, 'index']);
Route::post('/store-cs', [CsController::class, 'storeCs']);

Route::get('/panggil-antrian', [PanggilAntrianController::class, 'index']);
Route::delete('/panggil-antrian/trx/{transaksi}', [PanggilAntrianController::class, 'destroyTransaksi']);
Route::delete('/panggil-antrian/cs/{cs}', [PanggilAntrianController::class, 'destroyCs']);
