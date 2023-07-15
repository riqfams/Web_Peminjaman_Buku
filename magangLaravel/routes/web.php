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

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\AuthController@authentication')->middleware('guest');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth');

Route::get('/', 'App\Http\Controllers\BukuController@list')->middleware('auth');
Route::get('/buku/list', 'App\Http\Controllers\BukuController@list')->middleware('auth');
Route::get('/buku/detail/{id}', 'App\Http\Controllers\BukuController@detail')->middleware('auth');
Route::get('/buku/tambah', 'App\Http\Controllers\BukuController@tambah')->middleware(['auth', 'mustAdmin']);
Route::post('/buku/store', 'App\Http\Controllers\BukuController@store')->middleware(['auth', 'mustAdmin']);
Route::get('/buku/edit/{id}', 'App\Http\Controllers\BukuController@edit')->middleware(['auth', 'mustAdmin']);
Route::put('/buku/update/{id}', 'App\Http\Controllers\BukuController@update')->middleware(['auth', 'mustAdmin']);
Route::get('/buku/delete/{id}', 'App\Http\Controllers\BukuController@delete')->middleware(['auth', 'mustAdmin']);
Route::delete('/buku/destroy/{id}', 'App\Http\Controllers\BukuController@destroy')->middleware(['auth', 'mustAdmin']);
Route::get('/buku/deleted', 'App\Http\Controllers\BukuController@deleted')->middleware(['auth', 'mustAdmin']);
Route::get('/buku/{id}/restore', 'App\Http\Controllers\BukuController@restore')->middleware(['auth', 'mustAdmin']);


Route::get('/anggota/list', 'App\Http\Controllers\AnggotaController@list')->middleware('auth');
Route::get('/anggota/detail/{id}', 'App\Http\Controllers\AnggotaController@detail')->middleware('auth');
Route::get('/anggota/tambah', 'App\Http\Controllers\AnggotaController@tambah')->middleware(['auth', 'mustAdmin']);
Route::post('/anggota/store', 'App\Http\Controllers\AnggotaController@store')->middleware(['auth', 'mustAdmin']);
Route::get('/anggota/edit/{id}', 'App\Http\Controllers\AnggotaController@edit')->middleware(['auth', 'mustAdmin']);
Route::put('/anggota/update/{id}', 'App\Http\Controllers\AnggotaController@update')->middleware(['auth', 'mustAdmin']);
Route::get('/anggota/delete/{id}', 'App\Http\Controllers\AnggotaController@delete')->middleware(['auth', 'mustAdmin']);
Route::delete('/anggota/destroy/{id}', 'App\Http\Controllers\AnggotaController@destroy')->middleware(['auth', 'mustAdmin']);
Route::get('/anggota/deleted', 'App\Http\Controllers\AnggotaController@deleted')->middleware(['auth', 'mustAdmin']);
Route::get('/anggota/{id}/restore', 'App\Http\Controllers\AnggotaController@restore')->middleware(['auth', 'mustAdmin']);


Route::get('/prodi/list', 'App\Http\Controllers\ProdiController@list')->middleware('auth');
Route::get('/prodi/detail/{id}', 'App\Http\Controllers\ProdiController@detail')->middleware('auth');
Route::get('/prodi/tambah', 'App\Http\Controllers\ProdiController@tambah')->middleware(['auth', 'mustAdmin']);
Route::post('/prodi/store', 'App\Http\Controllers\ProdiController@store')->middleware(['auth', 'mustAdmin']);
Route::get('/prodi/edit/{id}', 'App\Http\Controllers\ProdiController@edit')->middleware(['auth', 'mustAdmin']);
Route::put('/prodi/update/{id}', 'App\Http\Controllers\ProdiController@update')->middleware(['auth', 'mustAdmin']);
Route::get('/prodi/delete/{id}', 'App\Http\Controllers\ProdiController@delete')->middleware(['auth', 'mustAdmin']);
Route::delete('/prodi/destroy/{id}', 'App\Http\Controllers\ProdiController@destroy')->middleware(['auth', 'mustAdmin']);


Route::get('peminjamanBuku/list', 'App\Http\Controllers\PeminjamanBukuController@list')->middleware('auth');
Route::get('peminjamanBuku/tambah', 'App\Http\Controllers\PeminjamanBukuController@tambah')->middleware('auth');
Route::post('peminjamanBuku/store', 'App\Http\Controllers\PeminjamanBukuController@store')->middleware('auth');
Route::get('peminjamanBuku/edit/{id}', 'App\Http\Controllers\PeminjamanBukuController@edit')->middleware(['auth', 'mustAdmin']);
Route::put('peminjamanBuku/update/{id}', 'App\Http\Controllers\PeminjamanBukuController@update')->middleware(['auth', 'mustAdmin']);
Route::get('peminjamanBuku/delete/{id}', 'App\Http\Controllers\PeminjamanBukuController@delete')->middleware(['auth', 'mustAdmin']);
Route::delete('peminjamanBuku/destroy/{id}', 'App\Http\Controllers\PeminjamanBukuController@destroy')->middleware(['auth', 'mustAdmin']);
Route::get('peminjamanBuku/deleted', 'App\Http\Controllers\PeminjamanBukuController@deleted')->middleware(['auth', 'mustAdmin']);
Route::get('peminjamanBuku/{id}/restore', 'App\Http\Controllers\PeminjamanBukuController@restore')->middleware(['auth', 'mustAdmin']);