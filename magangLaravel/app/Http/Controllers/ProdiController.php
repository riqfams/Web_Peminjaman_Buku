<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function list(){
        $prodi = Prodi::with('anggota')->get();
        return view('prodi/listProdi', ['prodi' => $prodi]);
    }

    public function detail($id){
        $prodi = Prodi::findOrFail($id);
        return view('prodi/detailProdi', ['prodi' => $prodi]);
    }

    public function tambah(){
        return view('prodi/tambahProdi');
    }

    public function store(Request $request){
        $prodi = Prodi::create($request->all());
        return redirect()->to('/prodi/list')->with('message', 'Data prodi berhasil ditambahkan');
    }
}
