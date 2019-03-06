<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promotion;
use App\Filiere;
use App\Groupe;
use App\Etudiant;
class PromotionController extends Controller
{
    public function getGroupes($promoId){
      $groupes = Groupe::where('promotion_id','=',$promoId)->orderBy('id')->get();
      return view('gPrel.groupes')->with(['idPromo'=>$promoId,'groupes' => $groupes]);
    }
    public function getPromos()
    {
        $promos = Promotion::all();
        $filieres = Filiere::all();
        return view('gPrel.promotions')->with([
            'promos' => $promos,'filieres' => $filieres
        ]);
    }
    public function ajoutPromo(Request $request){
           $promo = new Promotion();
           $promo->libelle = $request->input('libelle');
           $promo->niveau = $request->input('niveau');
           $promo->annee = date("Y");
           $promo->filiere_id = $request->input('filiereId');
           $promo->save();
           $fragment = "<div class='col-sm-3 col-xxxl-3'>
                        <div>
                            <button aria-label='Close' class='close' type='button'><i class='os-icon os-icon-ui-15'></i></button>
                            <button aria-label='Close' class='close' type='button'><i class='os-icon os-icon-ui-49'></i></button>
                          </div>
                          <a class='element-box el-tablo' href='promotions/".$promo->id."' style='background-color: #e1e1e1;'>
                            <div class='label' id='annee'>
                              ".$promo->annee." / ".($promo->annee + 1)."
                            </div>
                            <div class='value' id='libelle'>
                              ".$promo->libelle."
                            </div>
                            <div class='trending trending-down-basic'>
                              <span id='filiere'>".$promo->filiere->libelle."</span>
                            </div>
                          </a>
                        </div>";
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = $fragment;
        return response()->json($valid);
    }
    public function suppPromo(Request $request){
          $promoId = $request->input('promoId');
          $groupes = Groupe::where('promotion_id','=',$promoId)->get();
          foreach($groupes as $groupe) { 
            Etudiant::where('groupe_id','=',$groupe->id)->delete();
            $groupe->delete();
          }
          Promotion::find($promoId)->delete();
          $valid['success'] = array('success' => false, 'messages' => array());
          $valid['success'] = true;
          $valid['messages'] = "Success";
        return response()->json($valid); 
    }

    public function editPromo(Request $request){
           $promo = Promotion::find($request->input('promoId'));
           if($promo->libelle)
               $promo->libelle = $request->input('libelle');
           if($promo->niveau)
               $promo->niveau = $request->input('niveau');
           if($promo->filiere_id)
             $promo->filiere_id = $request->input('filiereId');
           $promo->save();
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = $promo->filiere->libelle;
        return response()->json($valid);
    }
}
