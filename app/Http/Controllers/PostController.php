<?php

namespace App\Http\Controllers;

use App\Models\postsModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function viewpost(){
        $posts = postsModel::all();
        return view('posts.viewPost', compact('posts'));
    }
    public function postform(){
        return view('posts.postUpload');
    }
    public function addpost(Request $request){
        $path = $request->file('filepath')->store('picsPath','public');
        $request->validate([
            "postname"=>"required|string|max:220",
            "postdes"=>"nullable|string",
            "filepath"=>"required|file",
        ]);
        postsModel::create([
            'post_name' =>$request->postname,
            'post_description' =>$request->postdes,
            'post_path' =>$path
        ]);
        return redirect()->route('posts.viewPost');
    }
  
}
