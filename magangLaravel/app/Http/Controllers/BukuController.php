<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use Illuminate\Support\Facades\Session;

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
        $buku = Buku::create($request->all());

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil ditambahkan');
        }
        return redirect()->to('/buku/list');
    }
   
    public function edit(Request $request, $id) {  
        $buku = Buku::findOrFail($id);
        return view('buku/editBuku', ['buku' => $buku]);
    }

    public function update(Request $request, $id){
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil diubah');
        }
        return redirect()->to('/buku/list');
    }
}
