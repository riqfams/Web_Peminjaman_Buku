<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function list() {
        $buku = DB::table('buku')->get();

        return view('listBuku', ['buku' => $buku]);
    }
    
    public function tambah() {
        return view('tambahBuku');
    }
   
    public function edit() {
        return view('editBuku');
    }
}
