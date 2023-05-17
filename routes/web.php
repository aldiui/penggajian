<?php

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
    return view('backend.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// user
Route::resource('/user', 'UserController');
// akun
Route::resource('/akun', 'AkunController');
// karyawan
Route::resource('/karyawan', 'KaryawanController');
// tunjangan
Route::resource('/tunjangan', 'TunjanganController');
// tunjangan
Route::resource('/jabatan', 'JabatanController');
// absensi
Route::resource('/absensi', 'AbsensiController');
// master gaji
Route::resource('/master_gaji', 'Master_GajiController');