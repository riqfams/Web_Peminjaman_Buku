<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function list(){
        $mahasiswa = Mahasiswa::all();
        return view('Mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
}
