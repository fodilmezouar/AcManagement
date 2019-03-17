<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Seance;
use App\Affectation;
use App\Etudiant;
use App\Absence;
use App\Instance;
use App\Justification;
use App\Groupe;
use App\Module;
class AbsenceController extends Controller
{
    public function getListeAbsence($idSc){
    	$seance = Seance::find($idSc);
        $affect = Affectation::find($seance->affectation_id);
        $groupeLib = Groupe::find($affect->groupe_id)->libelle;
        $moduleName = Module::find($affect->module_id)->libelle;
        $date = date("Y-m-d");
        $etudiants = Etudiant::where("groupe_id","=",$affect->groupe_id)->orderBy('id','asc')->get();
    	return view('gAbs.listeAbsence')->with(['etudiants'=>$etudiants,'seanceId'=>$idSc,"groupeLib"=>$groupeLib,"type"=>$seance->type,"ensId" => $affect->enseignant_id,"moduleName"=>$moduleName,"date"=>$date]);
    }
    public function validerAbsence(Request $request){
        $instance = null;
        $idSeance = $request->input('seanceId');
        $instance = Instance::where('date_ins','=',date("Y-m-d"))->get();
        if(!$instance->isEmpty())
            {
                $instance = $instance->get(0);
                Absence::where('instance_id','=',$instance->id)->delete();
            }
        else
        {
            $instance = new Instance();
            $instance->date_ins = date("Y-m-d");
            $instance->seance_id = $idSeance;
            $instance->save();
        }
        if($request->has('students'))
        {
        $students = $request->input('students');
        for ($i=0; $i < sizeof($students); $i++) { 
        	$absence = new Absence();
        	$absence->instance_id = $instance->id;
        	$absence->etudiant_id = $students[$i];
        	$absence->save();
        }
       }
        $valid['success'] = array('success' => false, 'messages' => array());
            $valid['success'] = true;
            $valid['messages'] = "success";
        return response()->json($valid);
    }
    public function getAbsEtudiant(Request $request){
       $idEtudiant = $request->input('etudId');
       $seanceId = $request->input('seanceId');
       $absences = DB::select("SELECT absences.id as absId,date_ins  FROM absences , instances WHERE instances.id = absences.instance_id AND
              absences.etudiant_id = ".$idEtudiant." AND instances.seance_id = ".$seanceId);
       $valid['success'] = array('success' => false, 'messages' => array());
            $valid['success'] = true;
            $valid['messages'] = $absences;
        return response()->json($valid);
    }
    public function validJustificatif(Request $request){
        $absencesId = $request->input('absencesId');
        $justificatif = $request->file('justificatif');
        $file_name = time().'.'.$justificatif->getClientOriginalExtension();
        $justificatif->move(public_path('/uploads/justifications'),$file_name);
        $justification = new Justification();
        $justification->justificatif= 'uploads/justifications/'.$file_name;
        $justification->date_just = date("Y-m-d");
        $justification->save();
        $absencesId = explode(",",$absencesId);
        foreach ($absencesId as $absId) {
            $abs = Absence::find($absId);
            $abs->justification_id = $justification->id;
            $abs->save();
        }
       $valid['success'] = array('success' => false, 'messages' => array());
            $valid['success'] = true;
            $valid['messages'] = "success";
        return response()->json($valid); 
    }
}
