<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function list(){
        $videos = Video::all();
        return view('video/video', ['videos' => $videos]);
    }

    public function detail($id){
        $video = Video::findOrFail($id);
        return view('video/detailVideo', ['video' => $video]);
    }
}
