<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function list() {
        return view('listBuku');
    }
    
    public function tambah() {
        return view('tambahBuku');
    }

    public function edit() {
        return view('editBuku');
    }
}
