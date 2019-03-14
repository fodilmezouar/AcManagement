<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seance;
use App\Affectation;
use App\Etudiant;
use App\Absence;
use App\Instance;
class AbsenceController extends Controller
{
    public function getListeAbsence($idSc){
    	$seance = Seance::find($idSc);
        $affect = Affectation::find($seance->affectation_id);
        $etudiants = Etudiant::where("groupe_id","=",$affect->groupe_id)->get();
    	return view('gAbs.listeAbsence')->with(['etudiants'=>$etudiants,'seanceId'=>$idSc]);
    }
    public function validerAbsence(Request $request){
        $students = $request->input('students');
        $idSeance = $request->input('seanceId');
        $instance = new Instance();
        $instance->date_ins = date("Y-m-d");
        $instance->seance_id = $idSeance;
        $instance->save();
        for ($i=0; $i < sizeof($students); $i++) { 
        	$absence = new Absence();
        	$absence->instance_id = $instance->id;
        	$absence->etudiant_id = $students[$i];
        	$absence->save();
        }
        $valid['success'] = array('success' => false, 'messages' => array());
            $valid['success'] = true;
            $valid['messages'] = "success";
        return response()->json($valid);
    }
}
