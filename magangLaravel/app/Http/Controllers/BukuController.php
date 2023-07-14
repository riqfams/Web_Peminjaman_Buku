<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BukuRequest;

class BukuController extends Controller
{
    public function list(Request $request) {
    	$keyword = $request->keyword;

    	$buku = Buku::with('anggota')
                ->where('judul', 'like', '%'.$keyword.'%')
                ->orWhere('penulis', 'like', '%'.$keyword.'%')
                ->orWhere('penerbit', 'like', '%'.$keyword.'%')
                ->orWhere('tahunTerbit', 'like', '%'.$keyword.'%')
                ->paginate(10);
        return view('buku/ListBuku',['buku' => $buku]); 
    }
    
    public function detail($id) {
        $buku = Buku::findOrFail($id);
        return view('buku/detailBuku', ['buku' => $buku]);
    }

    public function tambah() {
        return view('buku/tambahBuku');
    }

    public function store(BukuRequest $request){
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

    public function update(BukuRequest $request, $id){
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil diubah');
        }
        return redirect()->to('/buku/list');
    }

    public function delete($id){
        $buku = Buku::findOrFail($id);
        return view('buku/deleteBuku', ['buku' => $buku]);
    }

    public function destroy($id){
        $buku = Buku::findOrFail($id);
        $buku->delete();

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil dihapus');
        }
        return redirect()->to('/buku/list');
    }

    public function deleted(){
        $buku = Buku::onlyTrashed()->get();
        return view('buku/deletedBuku', ['buku' => $buku]);
    }

    public function restore($id){
        $buku = Buku::withTrashed()->where('id', $id)->restore();

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil dikembalikan');
        }
        return redirect()->to('/buku/list');
    }
}
