<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(){
        $posts = Post::with('image')->get();
        return view('post/post', ['posts' => $posts]);
    }

    public function detail($id){
        $post = Post::findOrFail($id);
        return view('post/detailpost', ['post' => $post]);
    }
}
