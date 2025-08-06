<?php

namespace App\Http\Controllers;

use App\Models\user_website;
use App\Models\user_websites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index(Request $request)
    {
        return view('webform');
    }
    public function show(Request $request)
    {
        $websites = user_websites::all();
        return view('showwebsites', compact('websites'));
    }
        
   

    public function addweb(Request $request)
    {
        $path = $request->file('zipfile')->store('websites');

        $request->validate([
            'webname' => 'required|string|max:220',
            'webdes' => 'nullable|string|max:220',
            'zip_path' => 'nullable|mimes:zip|max:51000',
        ]);
        user_websites::create([
            'user_id' => Auth::id(),
            'website_name' => $request->webname,
            'website_description' => $request->webdes,
            'zip_path' => $path,
        ]);
        return redirect('webshow')->with('success', 'Website added!');

    }
}
