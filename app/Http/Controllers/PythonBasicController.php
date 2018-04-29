<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Details;
use App\Tutorial;

class PythonBasicController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
     	$details = Details::where('tutorial_id', $id)->get();
     	//echo $details;
     	$tutorials = Tutorial::all();
     	return view('details')->with('details', $details)->with('tutorials', $tutorials);   
    }
}
