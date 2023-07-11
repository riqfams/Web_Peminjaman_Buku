<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;
use Illuminate\Support\Facades\DB;

class PeminjamanBukuController extends Controller
{
    public function list(){
        //$peminjamanBuku = DB::table('peminjaman_buku')->get();
        //$peminjamanBuku = PeminjamanBuku::all();
        
        $peminjamanBuku = PeminjamanBuku::with(['anggota.prodi', 'buku'])->get();
        //anggota nama modelnya, trs prodi nama relasi yg ada di model anggota                                       

        return view('peminjamanBuku/listPeminjamanBuku', ['peminjamanBuku' => $peminjamanBuku]);
    }

    public function tambah(){
        $anggota = Anggota::select('id', 'nama')->get();
        $buku = Buku::select('id', 'judul')->get();
        return view('peminjamanBuku/tambahPeminjaman', ['anggota' => $anggota, 'buku' => $buku]);
    }

    public function store(Request $request){
        PeminjamanBuku::create($request->all());
        return redirect()->to('/peminjamanBuku/list')->with('message', 'Data peminjaman buku berhasil ditambahkan');
    }

}
