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

        for ($i=0;$i<sizeof($listG);$i++){

            $data[] = array(
                "enseignant_id"=>$request->input('enseignantId'),
                "groupe_id" =>$listG[$i],
                "module_id" => $request->input('moduleId'),
                "td" => $listTd[$i],
                "tp" => $listTP[$i],
                "date_affectation" => date("y-m-d")
            );


        }
        DB::table('affectations')->insert($data);


        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "success";
        return response()->json($valid);

    }
   public function affectationEnseignant($idEns){
      $affectations = Affectation::where('enseignant_id','=',$idEns)->get();
      return view('gAbs.calendrier')->with('affectations',$affectations);
   }
}
