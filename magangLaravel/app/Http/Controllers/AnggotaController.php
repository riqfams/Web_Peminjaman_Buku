<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Prodi;
use Illuminate\Support\Facades\Session;

class AnggotaController extends Controller
{
    public function list() {
    	 //query builder
        //$anggota = DB::table('anggota')->get();

        //eloquent -> harus bikin fillable di model

        //lazy loading
        //$anggota = Anggota::all();
        
        //eager loading
        $anggota = Anggota::with('prodi')->get();
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
   
    public function store(Request $request){
        $validated = $request->validate([
            'nim' => 'unique:anggota|max:10'
        ]);

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

    public function update(Request $request, $id) {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        if($anggota){
            Session::flash('status', 'success');
            Session::flash('message', 'Data anggota berhasil diubah');
        }
        return redirect()->to('/anggota/list');
    }
}
