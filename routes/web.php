<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\JenisHotelController;
use App\Http\Controllers\JenisTempatWisataController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KriteriaHotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObjekAtraksiController;
use App\Http\Controllers\PemesanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TempatWisataController;
use App\Models\JenisHotel;
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

Route::get('/', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('fasilitas', FasilitasController::class);
Route::resource('hotel',HotelController::class);
Route::resource('jenis-hotel',JenisHotelController::class);
Route::resource('jenis-tempat-wisata',JenisTempatWisataController::class);
Route::resource('kamar',KamarController::class);
Route::resource('kriteria-hotel',KriteriaHotelController::class);
Route::resource('objek-atraksi',ObjekAtraksiController::class);
Route::resource('pemesan',PemesanController::class);
Route::resource('pengguna',PenggunaController::class);
Route::resource('penilaian',PenilaianController::class);
Route::resource('tempat-wisata',TempatWisataController::class);

Route::get('print-fasilitas', [FasilitasController::class, 'print']);
route::get('print-hotel',[HotelController::class,'print']);
route::get('print-jenis-hotel',[JenisHotelController::class,'print']);
route::get('print-jenis-tempat-wisata',[JenisTempatWisataController::class,'print']);
route::get('print-kamar',[KamarController::class,'print']);
route::get('print-kriteria-hotel',[KriteriaHotelController::class,'print']);
route::get('print-objek-atraksi',[ObjekAtraksiController::class,'print']);
route::get('print-pemesan',[PemesanController::class,'print']);
route::get('print-pengguna',[PenggunaController::class,'print']);
route::get('print-penilaian',[PenilaianController::class,'print']);
route::get('print-tempat-wisata',[TempatWisataController::class,'print']);

