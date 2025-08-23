<?php

namespace App\Http\Controllers;

use App\Models\thems;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
         $activeTemplate = thems::where('key', 'active_template')->first()->value ?? 'template1';
        
        return view("frontend.$activeTemplate.home");
        // return view('home');
    }
}
