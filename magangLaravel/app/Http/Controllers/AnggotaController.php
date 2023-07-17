<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnggotaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Anggota;
use App\Models\Prodi;
use Illuminate\Support\Facades\Session;

class AnggotaController extends Controller
{
    public function list(Request $request) {
        $keyword = $request->keyword;

        $anggota = Anggota::with('prodi')
                ->where('nama', 'like', '%'.$keyword.'%')
                ->orWhere('nim', 'like', '%'.$keyword.'%')
                ->orWhereHas('prodi', function($query) use($keyword){
                    $query->where('name', 'like', '%'.$keyword.'%');
                })
                ->paginate(10);
        return view('anggota/listAnggota',['anggota' => $anggota]); 
    }
    
    public function detail($slug) {
        $anggota = Anggota::where('slug', $slug)->first();
        return view('anggota/detailAnggota', ['anggota' => $anggota]);
    }

    public function tambah() {
        $prodi = Prodi::select('id', 'name')->get();
        return view('anggota/tambahAnggota', ['prodi' => $prodi]);
    }
   
    public function store(AnggotaRequest $request){
        $anggota = new Anggota;
        $anggota->nama = $request->nama;
        $anggota->kelamin = $request->kelamin;
        $anggota->nim = $request->nim;
        $anggota->prodi_id = $request->prodi_id;
        $anggota->alamat = $request->alamat;
        $anggota->slug = $request['slug'];
        $anggota->save();

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil ditambahkan');
        }
        return redirect()->to('/anggota/list');
    }

    public function edit($slug){
        $anggota = Anggota::with('prodi')->where('slug', $slug)->first();
        $prodi = Prodi::where('id', '!=', $anggota->prodi_id)->get(['id', 'name']);
        return view('anggota/editAnggota', ['anggota' => $anggota, 'prodi' => $prodi]);
    }

    public function update(AnggotaRequest $request, $slug) {
        $anggota = Anggota::where('slug', $slug)->first();
        $request['slug'] = Str::slug($request->nama, '-');

        $anggota->nama = $request->nama;
        $anggota->kelamin = $request->kelamin;
        $anggota->nim = $request->nim;
        $anggota->prodi_id = $request->prodi_id;
        $anggota->alamat = $request->alamat;
        $anggota->slug = $request['slug'];
        $anggota->save();

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil diubah');
        }
        return redirect()->to('/anggota/list');
    }

    public function delete($slug){
        $anggota = Anggota::where('slug', $slug)->first();
        return view('anggota/deleteAnggota', ['anggota' => $anggota]);
    }

    public function destroy($slug){
        $anggota = Anggota::where('slug', $slug)->first();
        $anggota->delete();

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil dihapus');
        }
        return redirect()->to('/anggota/list');
    }

    public function deleted(){
        $anggota = Anggota::onlyTrashed()->get();
        return view('anggota/deletedAnggota', ['anggota' => $anggota]);
    }

    public function restore($id){
        $anggota = Anggota::withTrashed()->where('id', $id)->restore();

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil dikembalikan');
        }
        return redirect()->to('/anggota/list');
    }

    public function massUpdate(){
        $anggota = Anggota::all();
        collect($anggota)->map(function($item){
            $item->slug = Str::slug($item->nama, '-');
            $item->save();
        });
    }
}
