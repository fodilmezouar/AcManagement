<?php

namespace App\Http\Controllers;
use App\Imports\EtudiantsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupeController extends Controller
{
	public function import() 
    {
        Excel::import(new EtudiantsImport, 'etuds.csv');
        
        return redirect('/')->with('success', 'All good!');
    }
}
