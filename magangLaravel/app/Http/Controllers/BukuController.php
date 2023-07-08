<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function list() {
        // mengambil data dari table 
    	$buku = DB::table('buku')->get();
        //dd($books);

    	// mengirim data ke view index
        return view('buku/ListBuku',['buku' => $buku]); 
    }
    
    public function tambah() {
        return view('buku/tambahBuku');
    }
   
    public function edit() {
        return view('buku/editBuku');
    }
}
