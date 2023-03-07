<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Route
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'CheckLevelAdmin'], function() {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('petugas', UserController::class);
    Route::resource('cetak', CetakController::class);

    Route::get('/cetak/cetak-data/{tglawal}/{tglakhir}', 'CetakController@cetakData')->name('cetak.cetakData');

    Route::get('/laporan/{id}/update-status', 'LaporanController@updateStatus')->name('laporan.updateStatus');
    Route::get('/laporan/{id}/status-selesai', 'LaporanController@statusSelesai')->name('laporan.statusSelesai');

    Route::get('/laporan/{id}/tanggapan', 'LaporanController@ruteTanggapan')->name('laporan.ruteTanggapan');
    Route::post('/laporan/{id}/tanggapan', 'LaporanController@beriTanggapan')->name('laporan.beriTanggapan.post');
});

//Petugas Route
Route::group(['namespace' => 'App\Http\Controllers\Petugas', 'prefix' => 'petugas', 'as' => 'petugas.', 'middleware' => 'CheckLevelPetugas'], function () {
    Route::resource('dashboard', DashboardController::class);
});

//Masyarakat Route
Route::group(['namespace' => 'App\Http\Controllers\Masyarakat', 'prefix' => 'masyarakat', 'as' => 'masyarakat.'], function () {
    Route::resource('pengaduan', PengaduanController::class);
    Route::resource('register', MasyarakatRegisterController::class);
});

// Route::get('/masyarkat/pengaduan', [App\Http\Controllers\Masyarakat\PengaduanController::class, 'index'])->name('masyarakat.pengaduan.index');

//Masyarakat Login Route
Route::get('/masyarakat/login', 'App\Http\Controllers\Masyarakat\MasyarakatLoginController@showLoginForm')->name('masyarakat.login');
Route::post('/masyarakat/login', 'App\Http\Controllers\Masyarakat\MasyarakatLoginController@login')->name('masyarakat.login.post');
Route::post('/masyarakat/logout', 'App\Http\Controllers\Masyarakat\MasyarakatLoginController@logout')->name('masyarakat.login');