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
}
