<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Details;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
     	$detail = Details::where('id', $id)->get();
     	$data = fopen("upload/".$detail[0]->file_name.".txt",'r');
     	$line_data='<b>';
     	while(! feof($data))
	  	{
	  		$line_data = $line_data . fgets($data). "<br/>";
	  	}
	  	$line_data = $line_data . "</b>";
		fclose($data);
     	return response()->json($line_data);  
    }
}
