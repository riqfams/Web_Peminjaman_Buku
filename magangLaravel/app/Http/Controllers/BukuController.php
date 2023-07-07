<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function list() {
        // mengambil data dari table 
    	$books = DB::table('buku')->get();
        //dd($books);

    	// mengirim data ke view index
        return view('ListBuku',['books' => $books]); 
    }
    
    public function tambah() {
        return view('tambahBuku');
    }
   
    public function edit() {
        return view('editBuku');
    }
}
