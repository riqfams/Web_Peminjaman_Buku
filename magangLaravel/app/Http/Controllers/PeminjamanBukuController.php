<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PeminjamanBukuController extends Controller
{
    public function list(){
        //$peminjamanBuku = DB::table('peminjaman_buku')->get();
        //$peminjamanBuku = PeminjamanBuku::all();
        
        $peminjamanBuku = PeminjamanBuku::with(['anggota.prodi', 'buku'])->get();
        //dd($peminjamanBuku);
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

    public function edit($id){
        $peminjamanBuku = PeminjamanBuku::with(['anggota', 'buku'])->findOrFail($id);
        $anggota = Anggota::where('id', '!=', $peminjamanBuku->idAnggota)->get(['id', 'nama']);
        $buku = Buku::where('id', '!=', $peminjamanBuku->idBuku)->get(['id', 'judul']);
        
        return view('peminjamanBuku/editPeminjamanBuku', ['peminjamanBuku' => $peminjamanBuku, 'anggota' => $anggota, 'buku' => $buku]);
    }   

    public function update(Request $request, $id){
        $peminjamanBuku = PeminjamanBuku::findOrFail($id);
        $peminjamanBuku->update($request->all());

        if($peminjamanBuku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data peminjaman buku berhasil diubah');
        }
        return redirect()->to('/peminjamanBuku/list');
    }

    public function delete($id){
        $peminjamanBuku = PeminjamanBuku::findOrFail($id);
        return view('peminjamanBuku/deletePeminjamanBuku', ['peminjamanBuku' => $peminjamanBuku]);
    }

    public function destroy($id){
        $peminjamanBuku = PeminjamanBuku::findOrFail($id);
        $peminjamanBuku->delete();

        if($peminjamanBuku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data peminjaman buku berhasil dihapus');
        }
        return redirect()->to('/peminjamanBuku/list');
    }

    public function deleted(){
        $peminjamanBuku = PeminjamanBuku::onlyTrashed()->get();
        return view('peminjamanBuku/deletedPeminjamanBuku', ['peminjamanBuku' => $peminjamanBuku]);
    }

    public function restore($id){
        $peminjamanBuku = PeminjamanBuku::withTrashed()->where('id', $id)->restore();

        if($peminjamanBuku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data peminjaman buku berhasil dikembalikan');
        }
        return redirect()->to('/peminjamanBuku/list');
    }
}
