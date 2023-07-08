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

//Route::prefix('buku')->group(function(){
    Route::get('/', 'App\Http\Controllers\BukuController@list');
    Route::get('/buku/list', 'App\Http\Controllers\BukuController@list');
    Route::get('/buku/tambah', 'App\Http\Controllers\BukuController@tambah');
    Route::get('/buku/edit', 'App\Http\Controllers\BukuController@edit');
//});
Route::get('anggota/list', 'App\Http\Controllers\AnggotaController@list');



