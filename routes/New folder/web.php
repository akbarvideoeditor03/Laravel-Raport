<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user2Controller;
use App\Http\Controllers\absenController;
use App\Http\Controllers\kepala_sekolahController;
use App\Http\Controllers\sekolahController;
use App\Http\Controllers\tahun_ajaranController;
use App\Http\Controllers\detail_nilaiController;
use App\Http\Controllers\mapelController;
use App\Http\Controllers\nilai_mapelsController;
use App\Http\Controllers\raportController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\wali_kelasController;


//Kelompok Route Home
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//route untuk kepsek

Route::middleware('auth')->group(function () {
    Route::resource('/kepalasekolah', kepala_sekolahController::class);
    Route::controller(kepala_sekolahController::class)->group(function(){
        Route::get('/kepalasekolah/delete/{nip}', 'delete');
        });
});

//route untuk siswa
Route::middleware('auth')->group(function () {
    Route::resource('/datasiswa', siswaController::class);
    Route::controller(siswaController::class)->group(function(){
        Route::get('/datasiswa/delete/{nisn}', 'delete');
        });
});

//route absen siswa
Route::middleware('auth')->group(function () {
    Route::resource('/absensiswa', absenController::class);
    Route::controller(absenController::class)->group(function(){
        Route::get('/absensiswa/delete/{id}', 'delete');
        });
});

//route sekolah
Route::middleware('auth')->group(function () {
    Route::resource('/school', sekolahController::class);
    Route::controller(sekolahController::class)->group(function(){
        Route::get('/school/delete/{id}', 'delete');
        });
});

//route sekolah
Route::middleware('auth')->group(function () {
    Route::resource('/walikelas10', wali_kelasController::class);
    Route::controller(wali_kelasController::class)->group(function(){
        Route::get('/walikelas10/delete/{id}', 'delete');
        });
});

//route nilai mapel
Route::middleware('auth')->group(function () {
    Route::get('/detailnilai/{nisn}', [nilai_mapelsController::class, 'detailnilai'])->name('detailnilai');
    Route::get('/detailnilai/{nisn}', [nilai_mapelsController::class, 'detailnilai'])->name('detailnilai');
    Route::resource('/nilaikelas10', nilai_mapelsController::class);
    Route::resource('/detailnilai', nilai_mapelsController::class);
    Route::controller(nilai_mapelsController::class)->group(function(){
        Route::get('/detailnilai/delete/{kode_nilai_mapel}', 'delete');
        });
});

//route tahun ajaran
Route::middleware('auth')->group(function () {
    Route::resource('/tahunajaransekolah', tahun_ajaranController::class);
});

//route mata pelajaran
Route::middleware('auth')->group(function () {
    Route::resource('/mapelkelas10', mapelController::class);
    Route::controller(mapelController::class)->group(function(){
        Route::get('/mapelkelas10/delete/{kode_mapel}', 'delete');
        });
});

//route Raport
Route::middleware('auth')->group(function () {
    Route::resource('/raportkelas10', raportController::class);
    Route::resource('/halamanraport', raportController::class);
    Route::get('/show/{nisn}', [raportController::class, 'show'])->name('show');
    Route::controller(raportController::class)->group(function(){
        Route::get('/raportkelas10/delete/{nomor_raport}', 'delete');
        });
});

//route Kelas
Route::middleware('auth')->group(function () {
    Route::get('/dashboardkelas10', function () {
        return view('halamankelas10');
    });
});

//route Register
Route::resource('/registrasi', user2Controller::class);

//Route Umum
Route::get('/', function () {
    return view('layouts/sekolah');
});
Route::get('/halamankosong', function () {
    return view('halamankosong');
});
Route::get('/halamankosong1', function () {
    return view('halamankosong');
});
Route::get('/halamankosong2', function () {
    return view('halamankosong');
});
Route::get('/halamankosong3', function () {
    return view('halamankosong');
});
Route::get('/halamankosong4', function () {
    return view('halamankosong');
});
Route::get('/halamankosong5', function () {
    return view('halamankosong');
});
Route::get('/halamankosong6', function () {
    return view('halamankosong');
});
Route::get('/halamankosong7', function () {
    return view('halamankosong');
});


Auth::routes();


