<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filiere;
class FiliereController extends Controller
{
    public function setConfig(){
         $filiere = Filiere::all()->get(0);
         return view('config')->with("filiere",$filiere);
    }
    public function setFiliere(Request $request){
       $filiereName = $request->input('filiere');
       $filiere = Filiere::all()->get(0);
       $filiere->libelle = $filiereName;
       $filiere->save();
       $valid['success'] = array('success' => false, 'messages' => array());
       $valid['success'] = true;
       $valid['messages'] = "yes babe";
     return response()->json($valid);
    }
}
