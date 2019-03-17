<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promotion;
use App\Filiere;
use App\Groupe;
use App\Etudiant;
use App\Module;
use App\User;
class PromotionController extends Controller
{
    public function getGroupes($promoId){
      $promo = Promotion::find($promoId);
      $enseignants = User::where('grade','!=',NULL)->where('filliere_id','=',$promo->filiere_id)->where('role','like','%2%')->get();
      $groupes = Groupe::where('promotion_id','=',$promoId)->orderBy('id')->get();
      $modules = Module::where('promotion_id','=',$promoId)->orderBy('id')->get();
      return view('gPrel.groupes')->with(['idPromo'=>$promoId,'groupes' => $groupes,'modules' => $modules,'nomPromo'=>$promo->libelle,"enseignants"=>$enseignants]);
    }
    public function getPromos()
    {
        $promos = Promotion::orderBy('id')->get();
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
           $fragment = "<div class='col-sm-3 col-xxxl-3 block' role='".$promo->id."'>
                        <input type='hidden' id='".$promo->id."' value='".$promo->filiere_id."'>
                    <input type='hidden' id='".$promo->id."5' value='".$promo->niveau."'>
                        <div>
                            <button aria-label='Close' class='close supp' type='button' role='".$promo->id."' data-target='#suppModal' data-toggle='modal'><i class='os-icon os-icon-ui-15'></i></button>
                            <button aria-label='Close' class='close edit' type='button' role='".$promo->id."' data-target='#editModal' data-toggle='modal'><i class='os-icon os-icon-ui-49'></i></button>
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
