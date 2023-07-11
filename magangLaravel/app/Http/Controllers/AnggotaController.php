<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Prodi;

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
        $anggota = Anggota::create($request->all());
        return redirect()->to('/anggota/list')->with('message', 'Data anggota berhasil ditambahkan');

    }

    // public function edit() {
    //     return view('editBuku');
    // }
}
