<?php

namespace App\Http\Controllers;

use App\Models\feeds;
use Illuminate\Http\Request;

class feedsController extends Controller
{
    public function getfeeds(){
         $posts = feeds::latest()->paginate(10);
        return view('feeds.getfeeds', compact('posts'));
    }
}
