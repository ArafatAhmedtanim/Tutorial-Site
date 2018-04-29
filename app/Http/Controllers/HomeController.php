<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutorial;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorials = Tutorial::all();
        return view('home')->with('tutorials', $tutorials);
    }
}
