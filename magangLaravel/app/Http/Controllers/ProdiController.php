<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProdiRequest;

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

    public function store(ProdiRequest $request){
        $prodi = Prodi::create($request->all());
        
        if($prodi){
            Session::flash('status', 'success');
            Session::flash('message', 'Data prodi berhasil ditambahkan');
        }
        return redirect()->to('/prodi/list');
    }

    public function edit(Request $request, $id){
        $prodi = Prodi::findOrFail($id);
        return view('prodi/editProdi', ['prodi' => $prodi]);
    }

    public function update(ProdiRequest $request, $id){
        $prodi = Prodi::findOrFail($id);
        $prodi->update($request->all());

        if($prodi){
            Session::flash('status', 'success');
            Session::flash('message', 'Data prodi berhasil diubah');
        }
        return redirect()->to('/prodi/list');
    }

    public function delete($id){
        $prodi = Prodi::findOrFail($id);
        return view('prodi/deleteProdi', ['prodi' => $prodi]);
    }

    public function destroy($id){
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        if($prodi){
            Session::flash('status', 'success');
            Session::flash('message', 'Data prodi berhasil dihapus');
        }
        return redirect()->to('/prodi/list');
    }
}
