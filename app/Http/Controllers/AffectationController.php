<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\User;
use App\Groupe;
use App\Affectation;
use App\Promotion;
use Auth;
use DB;

class AffectationController extends Controller
{
    //
    public function attacherGroupe($id){

        $userId = Auth::id();
        $enseignants = User::where('grade','!=',NULL)->where('role','3')->where('id','!=',$userId)
                            ->get();

        $idFilliere = User::find($userId)->filliere_id;
        $idPromotion = Promotion::where('filiere_id',$idFilliere)->get('id')->first();
        $groupes = Groupe::where('promotion_id',$idPromotion->id)->get();
        $nombreGroupe = Groupe::where('promotion_id',$idPromotion->id)->select(DB::raw('count(distinct id) as count'))
            ->get()->first();
        return view('gPrel.affectation')->with(['enseignants'=>$enseignants,'idModule'=>$id,'groupes'=>$groupes,
            'nombreG'=>$nombreGroupe->count]);
    }
    public function validerAffectation(Request $request){
        $nombreG  = $request->input('nombreG');
        $listTd = $request->get('listTd');
        $listTP = $request->get('listTp');
        $listG = $request->get('listeG');
        $data = array();
        $affect = new Affectation();
        $affect =[];
        for ($i=1;$i<=$nombreG;$i++){

            $affect[] = new Affectation();
          /*  $data[] = [
                'enseignant_id'=>$request->input('enseignantId'),
                'groupe_id' =>$listG[$i],
                'module_id' => $request->input('moduleId'),
                'td' => $listTd[$i],
                'tp' => $listTP[$i],
                'date_affectation' => date("Y")
            ];
            /*$affect->enseignant_id = $request->input('enseignantId');
            $affect->groupe_id = $listG[$i];
            $affect->module_id = $request->input('moduleId');
            $affect->td = $listTd[$i];
            $affect->tp = $listTP[$i];
            $affect->date_affectation =date("Y");
            $affect->save();
            $i= $i++;*/


        }



        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "success";
        return response()->json($valid);
    }
}
