<?php

namespace App\Http\Controllers;

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
}
