<?php

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

// Route::get('/', function () {
//     return view('listBuku');
// });


Route::get('/', 'App\Http\Controllers\BukuController@list');
Route::get('/buku/list', 'App\Http\Controllers\BukuController@list');
Route::get('/buku/detail/{id}', 'App\Http\Controllers\BukuController@detail');
Route::get('/buku/tambah', 'App\Http\Controllers\BukuController@tambah');
Route::get('/buku/edit', 'App\Http\Controllers\BukuController@edit');
Route::post('/buku/store', 'App\Http\Controllers\BukuController@store');
//Route::post('/daftarServicer/store',[PjPerbaikanController::class,'store'])->middleware('auth');

Route::get('/anggota/list', 'App\Http\Controllers\AnggotaController@list');
Route::get('/anggota/detail/{id}', 'App\Http\Controllers\AnggotaController@detail');
Route::get('/anggota/tambah', 'App\Http\Controllers\AnggotaController@tambah');
Route::post('/anggota/store', 'App\Http\Controllers\AnggotaController@store');


Route::get('/prodi/list', 'App\Http\Controllers\ProdiController@list');
Route::get('/prodi/detail/{id}', 'App\Http\Controllers\ProdiController@detail');
Route::get('/prodi/tambah', 'App\Http\Controllers\ProdiController@tambah');
Route::post('/prodi/store', 'App\Http\Controllers\ProdiController@store');


Route::get('peminjamanBuku/list', 'App\Http\Controllers\PeminjamanBukuController@list');
Route::get('peminjamanBuku/tambah', 'App\Http\Controllers\PeminjamanBukuController@tambah');
Route::post('peminjamanBuku/store', 'App\Http\Controllers\PeminjamanBukuController@store');

