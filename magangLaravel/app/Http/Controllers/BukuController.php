<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;

class BukuController extends Controller
{
    public function list() {
    	//$buku = DB::table('buku')->get();
        //dd($books);

    	//$buku = Buku::all();
    	$buku = Buku::with('anggota')->get();
        return view('buku/ListBuku',['buku' => $buku]); 
    }
    
    public function detail($id) {
        $buku = Buku::findOrFail($id);
        return view('buku/detailBuku', ['buku' => $buku]);
    }

    public function tambah() {
        return view('buku/tambahBuku');
    }

    public function store(Request $request){
        // $buku = new Buku;
        // $buku->judul = $request->judul;
        // $buku->penulis = $request->penulis;
        // $buku->penerbit = $request->penerbit;
        // $buku->tahunTerbit = $request->tahunTerbit;
        // $buku->save();

        $buku = Buku::create($request->all());
        return redirect()->to('/buku/list')->with('message', 'Data buku berhasil ditambahkan');
    }
   
    public function edit() {  
        return view('buku/editBuku');
    }
}
