<?php

use App\Models\User;
use App\Models\Prodi;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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


Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\AuthController@authentication')->middleware(['guest', 'throttle:login']);
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth');

// Route::get('/', 'App\Http\Controllers\BukuController@list')->middleware('auth');
// Route::get('/buku/list', 'App\Http\Controllers\BukuController@list')->middleware('auth');
// Route::get('/buku/detail/{id}', 'App\Http\Controllers\BukuController@detail')->middleware('auth');
// Route::get('/buku/tambah', 'App\Http\Controllers\BukuController@tambah')->middleware(['auth', 'mustAdmin']);
// Route::post('/buku/store', 'App\Http\Controllers\BukuController@store')->middleware(['auth', 'mustAdmin']);
// Route::get('/buku/edit/{id}', 'App\Http\Controllers\BukuController@edit')->middleware(['auth', 'mustAdmin']);
// Route::put('/buku/update/{id}', 'App\Http\Controllers\BukuController@update')->middleware(['auth', 'mustAdmin']);
// Route::get('/buku/delete/{id}', 'App\Http\Controllers\BukuController@delete')->middleware(['auth', 'mustAdmin']);
// Route::delete('/buku/destroy/{id}', 'App\Http\Controllers\BukuController@destroy')->middleware(['auth', 'mustAdmin']);
// Route::get('/buku/deleted', 'App\Http\Controllers\BukuController@deleted')->middleware(['auth', 'mustAdmin']);
// Route::get('/buku/{id}/restore', 'App\Http\Controllers\BukuController@restore')->middleware(['auth', 'mustAdmin']);
// Route::get('/buku-mass-update', 'App\Http\Controllers\BukuController@massUpdate');


Route::get('/', 'App\Http\Controllers\BukuController@list')->middleware('auth');
Route::get('/buku/list', 'App\Http\Controllers\BukuController@list')->middleware('auth');
Route::get('/buku/detail/{id}', 'App\Http\Controllers\BukuController@detail')->middleware('auth');
Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/buku/tambah', 'App\Http\Controllers\BukuController@tambah');
    Route::post('/buku/store', 'App\Http\Controllers\BukuController@store');
    Route::get('/buku/edit/{id}', 'App\Http\Controllers\BukuController@edit');
    Route::put('/buku/update/{id}', 'App\Http\Controllers\BukuController@update');
    Route::get('/buku/delete/{id}', 'App\Http\Controllers\BukuController@delete');
    Route::delete('/buku/destroy/{id}', 'App\Http\Controllers\BukuController@destroy');
    Route::get('/buku/deleted', 'App\Http\Controllers\BukuController@deleted');
    Route::get('/buku/{id}/restore', 'App\Http\Controllers\BukuController@restore');
}); 
Route::get('/buku-mass-update', 'App\Http\Controllers\BukuController@massUpdate');


Route::get('/anggota/list', 'App\Http\Controllers\AnggotaController@list')->middleware('auth');
Route::get('/anggota/detail/{id}', 'App\Http\Controllers\AnggotaController@detail')->middleware('auth');
Route::group(['middleware' => ['auth', 'role:Admin']], function(){
    Route::get('/anggota/tambah', 'App\Http\Controllers\AnggotaController@tambah');
    Route::post('/anggota/store', 'App\Http\Controllers\AnggotaController@store');
    Route::get('/anggota/edit/{id}', 'App\Http\Controllers\AnggotaController@edit');
    Route::put('/anggota/update/{id}', 'App\Http\Controllers\AnggotaController@update');
    Route::get('/anggota/delete/{id}', 'App\Http\Controllers\AnggotaController@delete');
    Route::delete('/anggota/destroy/{id}', 'App\Http\Controllers\AnggotaController@destroy');
    Route::get('/anggota/deleted', 'App\Http\Controllers\AnggotaController@deleted');
    Route::get('/anggota/{id}/restore', 'App\Http\Controllers\AnggotaController@restore');
});
Route::get('/anggota-mass-update', 'App\Http\Controllers\AnggotaController@massUpdate');


Route::get('/prodi/list', 'App\Http\Controllers\ProdiController@list')->middleware('auth');
Route::get('/prodi/detail/{id}', 'App\Http\Controllers\ProdiController@detail')->middleware('auth');
Route::group(['middleware' => ['auth', 'role:Admin']], function(){
    Route::get('/prodi/tambah', 'App\Http\Controllers\ProdiController@tambah');
    Route::post('/prodi/store', 'App\Http\Controllers\ProdiController@store');
    Route::get('/prodi/edit/{id}', 'App\Http\Controllers\ProdiController@edit');
    Route::put('/prodi/update/{id}', 'App\Http\Controllers\ProdiController@update');
    Route::get('/prodi/delete/{id}', 'App\Http\Controllers\ProdiController@delete');
    Route::delete('/prodi/destroy/{id}', 'App\Http\Controllers\ProdiController@destroy');
});


Route::get('peminjamanBuku/list', 'App\Http\Controllers\PeminjamanBukuController@list')->middleware('auth');
Route::get('peminjamanBuku/tambah', 'App\Http\Controllers\PeminjamanBukuController@tambah')->middleware('auth');
Route::post('peminjamanBuku/store', 'App\Http\Controllers\PeminjamanBukuController@store')->middleware('auth');
Route::group(['middleware' => ['auth', 'role:Admin']], function(){
    Route::get('peminjamanBuku/edit/{id}', 'App\Http\Controllers\PeminjamanBukuController@edit');
    Route::put('peminjamanBuku/update/{id}', 'App\Http\Controllers\PeminjamanBukuController@update');
    Route::get('peminjamanBuku/delete/{id}', 'App\Http\Controllers\PeminjamanBukuController@delete');
    Route::delete('peminjamanBuku/destroy/{id}', 'App\Http\Controllers\PeminjamanBukuController@destroy');
    Route::get('peminjamanBuku/deleted', 'App\Http\Controllers\PeminjamanBukuController@deleted');
    Route::get('peminjamanBuku/{id}/restore', 'App\Http\Controllers\PeminjamanBukuController@restore');
});






//------------------------------- PLAYLIST TIPS AND TRIK LARAVEL -------------------------------//
Route::get('/mahasiswa', 'App\Http\Controllers\MahasiswaController@list')->middleware('auth');

Route::get('/give-permission-to-role', function(){
    $role = Role::findOrFail(3);
    $permission1 = Permission::findOrFail(1);
    // $permission2 = Permission::findOrFail(2);
    // $permission3 = Permission::findOrFail(3);
    // $permission4 = Permission::findOrFail(4);

    $role->givePermissionTo([$permission1]);
});

Route::get('/assign-role-to-user', function(){
    $user = User::findOrFail(3);
    $role = Role::findOrFail(2);

    $user->assignRole($role);
});

Route::get('/lihat-buku', function(){
    dd('ini untuk lihat buku');
})->middleware('can:lihat buku');
Route::get('/tambah-buku', function(){
    dd('ini untuk tambah buku');
})->middleware('can:tambah buku');
Route::get('/ubah-buku', function(){
    dd('ini untuk ubah buku');
})->middleware('can:ubah buku');
Route::get('/hapus-buku', function(){
    dd('ini untuk hapus buku');
})->middleware('can:hapus buku');

//database transaction
Route::get('tambah-anggota-prodi', function(){
    try {
        DB::beginTransaction();

        Anggota::create([
            'nama' => 'Jennie',
            'kelamin' => 'P',
            'nim' => 46464646,
            'prodi_id' => 3456,
            'alamat' => 'di hatiku'
        ]);
        Prodi::create([
            'id' => 6666,
            'name' => 'Kedokteran'
        ]);

        DB::commit();
    } catch (\Throwable $th) {
        throw $th;
        DB::rollBack();
    }
});

// Tes Email
Route::get('/tes-email', 'App\Http\Controllers\EmailController@tes');

// Queue Email
Route::get('/send-emails', 'App\Http\Controllers\EmailController@sendEmails');

// Laravel Events
Route::get('/create-user', 'App\Http\Controllers\UserController@create');
Route::get('/delete-user/{id}', 'App\Http\Controllers\UserController@delete');


//Polymorphic Relations
//------1. One to One
Route::get('/users', 'App\Http\Controllers\UserController@list');
Route::get('/posts', 'App\Http\Controllers\PostController@list');
Route::get('/post-detail/{id}', 'App\Http\Controllers\PostController@detail');

//------2. One to Many
Route::get('/videos', 'App\Http\Controllers\VideoController@list');
Route::get('/video-detail/{id}', 'App\Http\Controllers\VideoController@detail');
