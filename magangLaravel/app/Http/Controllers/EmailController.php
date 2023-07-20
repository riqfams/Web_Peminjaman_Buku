<?php

namespace App\Http\Controllers;

use App\Mail\TesEmail;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function tes(){
        $anggota = Anggota::all();
        Mail::to('ariq@gmail.com')->send(new TesEmail($anggota));
    }
}
