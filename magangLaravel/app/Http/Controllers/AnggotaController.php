<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function list() {
    	 //query builder
        //$anggota = DB::table('anggota')->get();

        //eloquent -> harus bikin fillable di model

        //lazy loading
        //$anggota = Anggota::all();
        
        //eager loading
        $anggota = Anggota::with('prodi')->get();

        return view('anggota/listAnggota',['anggota' => $anggota]); 

        
    }
    
    // public function tambah() {
    //     return view('tambahBuku');
    // }
   
    // public function edit() {
    //     return view('editBuku');
    // }
}
