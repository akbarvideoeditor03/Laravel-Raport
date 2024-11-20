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
use App\Http\Controllers\alamatController;
use App\Http\Controllers\walasController;


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

        Route::get('datasiswa/alamat/{nisn}', [siswaController::class, 'alamat'])->name('datasiswa.alamat');
        Route::post('datasiswa/storealamat/{nisn}', [siswaController::class, 'storealamat'])->name('datasiswa.storealamat');
        Route::get('alamat/{nisn}', [siswaController::class, 'detail'])->name('alamat.detail');
        });
});

//route untuk alamat
route::middleware('auth')->group(function(){
    Route::resource('/daftaralamat', alamatController::class);
    Route::controller(alamatController::class)->group(function(){
        Route::get('/daftaralamat/delete/{id_alamatsiswa}', 'delete');
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

//route wali kelas
Route::middleware('auth')->group(function () {
    Route::resource('/walikelas10', wali_kelasController::class);
    Route::controller(wali_kelasController::class)->group(function(){
        Route::get('/walikelas10/delete/{nip_walikelas}', 'delete');
    });
});

//route alamat walikelas
Route::middleware('auth')->group(function () {
    Route::resource('/walasalamat', walasController::class);
    Route::controller(walasController::class)->group(function(){
        Route::get('/walasalamat/delete/{nip_walikelas}', 'delete');
        Route::get('walasalamat/alamat/{nip_walikelas}', [wali_kelasController::class, 'alamat'])->name('walasalamat.alamat');
        Route::post('walasalamat/storealamat/{nip_walikelas}', [wali_kelasController::class, 'storealamat'])->name('walasalamat.storealamat');
    });
});


//route nilai mapel
Route::middleware('auth')->group(function () {
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
    Route::get('/show/{nomor_raport}', [raportController::class, 'show'])->name('show');
    Route::get('/delete/{nomor_raport}', [raportController::class, 'delete'])->name('delete');
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

Route::get('/schooldetail', [sekolahController::class, 'index1'])->name('index1');
Route::get('/datakepsek', [kepala_sekolahController::class, 'index1'])->name('index1');
Route::get('/walas', [wali_kelasController::class, 'index1'])->name('index1');


Auth::routes();


