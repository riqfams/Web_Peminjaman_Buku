<?php

namespace App\Http\Controllers;

use App\Events\BukuCreated;
use App\Events\BukuDeleted;
use App\Events\BukuUpdated;
use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BukuRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    
    public function detail($slug) {
        $buku = Buku::where('slug', $slug)->first();
        return view('buku/detailBuku', ['buku' => $buku]);
    }

    public function tambah() {
        return view('buku/tambahBuku');
    }

    public function store(BukuRequest $request){

        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = now()->timestamp.'.'.$extension;
        $tes = $request->file('image')->storeAs('imageBuku', $newName);
        $request['slug'] = Str::slug($request->judul, '-');

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->image = $tes;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahunTerbit = $request->tahunTerbit;
        $buku->slug = $request['slug'];
        $buku->save();

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil ditambahkan');
        }
        
        BukuCreated::dispatch($buku);

        return redirect()->to('/buku/list');
    }

    public function edit($slug) {  
        $buku = Buku::where('slug', $slug)->first();
        return view('buku/editBuku', ['buku' => $buku]);
    }

    public function update(Request $request, $slug){
        $buku = Buku::where('slug', $slug)->first();

        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = now()->timestamp.'.'.$extension;
        $tes = $request->file('image')->storeAs('imageBuku', $newName);

        $buku->judul = $request->judul;
        $buku->image = $tes;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahunTerbit = $request->tahunTerbit;
        $buku->save();

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil diubah');
        }

        BukuUpdated::dispatch($buku);

        return redirect()->to('/buku/list');
    }

    public function delete($slug){
        $buku = Buku::where('slug', $slug)->first();
        return view('buku/deleteBuku', ['buku' => $buku]);
    }

    public function destroy($slug){
        $buku = Buku::where('slug', $slug)->first();
        $buku->delete();

        if($buku){
            Session::flash('status', 'success');
            Session::flash('message', 'Data buku berhasil dihapus');
        }

        BukuDeleted::dispatch($buku);

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

    public function massUpdate(){
        $buku = Buku::all();
        collect($buku)->map(function($item){
            $item->slug = Str::slug($item->judul, '-');
            $item->save();
        });
    }
}
