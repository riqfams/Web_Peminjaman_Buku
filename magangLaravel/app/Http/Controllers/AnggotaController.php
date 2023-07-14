<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnggotaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
    public function detail($id) {
        $anggota = Anggota::findOrFail($id);
        return view('anggota/detailAnggota', ['anggota' => $anggota]);
    }

    public function tambah() {
        $prodi = Prodi::select('id', 'name')->get();
        return view('anggota/tambahAnggota', ['prodi' => $prodi]);
    }
   
    public function store(AnggotaRequest $request){
        // $validated = $request->validate([
        //     'nim' => 'unique:anggota|max:10'
        // ]);

        $anggota = Anggota::create($request->all());

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil ditambahkan');
        }
        return redirect()->to('/anggota/list');
    }

    public function edit(Request $request, $id){
        $anggota = Anggota::with('prodi')->findOrFail($id);
        $prodi = Prodi::where('id', '!=', $anggota->prodi_id)->get(['id', 'name']);
        return view('anggota/editAnggota', ['anggota' => $anggota, 'prodi' => $prodi]);
    }

    public function update(AnggotaRequest $request, $id) {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil diubah');
        }
        return redirect()->to('/anggota/list');
    }

    public function delete($id){
        $anggota = Anggota::findOrFail($id);
        return view('anggota/deleteAnggota', ['anggota' => $anggota]);
    }

    public function destroy($id){
        $anggota = Anggota::findOrFail($id);
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
}
