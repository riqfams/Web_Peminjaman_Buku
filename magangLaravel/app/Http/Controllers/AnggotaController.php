<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function list() {
        // mengambil data dari table 
    	$anggota = DB::table('anggota')->get();
        //dd($books);

    	// mengirim data ke view index
        return view('anggota/listAnggota',['anggota' => $anggota]); 
    }
    
    // public function tambah() {
    //     return view('tambahBuku');
    // }
   
    // public function edit() {
    //     return view('editBuku');
    // }
}
