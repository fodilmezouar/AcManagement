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
use Auth;
class PromotionController extends Controller
{
    
    //give le index promotions page all promos
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
           $promo->filiere_id = Filiere::all()->get(0)->id;
           $promo->save();
           $fragment = "<div class='col-sm-3 col-xxxl-3 block' role='".$promo->id."'>
                        <input type='hidden' id='".$promo->id."' value='".$promo->filiere_id."'>
                    <input type='hidden' id='".$promo->id."5' value='".$promo->niveau."'>
                        <div>
                            <button aria-label='Close' class='close supp' type='button' role='".$promo->id."' data-target='#suppModal' data-toggle='modal'><i class='os-icon os-icon-ui-15'></i></button>
                            <button aria-label='Close' class='close edit' type='button' role='".$promo->id."' data-target='#editModal' data-toggle='modal'><i class='os-icon os-icon-ui-49'></i></button>
                          </div>
                          <a class='element-box el-tablo' href='promotions/".$promo->id."' style='background-color: #f2f4f8;'>
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
    public function getAll(){
       $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['body'] ="d";
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
           $promo->libelle = $request->input('libelle');
           $promo->niveau = $request->input('niveau');
           //$promo->filiere_id = $request->input('filiereId');
           $promo->save();
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = $promo->filiere->libelle;
        return response()->json($valid);
    }
    //recupirer les infos d'une promotions données
    public function getGroupes($promoId){
        $promo = Promotion::find($promoId);
        //on récupere que les chargés de module
        $enseignants = User::where('grade','!=',NULL)->where('filliere_id','=',$promo->filiere_id)->where('role','like','%2%')->get();
      $groupes = Groupe::where('promotion_id','=',$promoId)->orderBy('id')->get();
      $modules = Module::where('promotion_id','=',$promoId)->orderBy('id')->get();
      return view('gPrel.groupes')->with(['idPromo'=>$promoId,'groupes' => $groupes,'modules' => $modules,'nomPromo'=>$promo->libelle,"enseignants"=>$enseignants]);
    }
    public function getDataParWeak(Request $request){
       $promo = Promotion::find($request->input('promosId'));
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = $promo->absencesParMonth($request->input('grpId'));
        return response()->json($valid);
    }
    public function getDataSoirMatin(Request $request){
       $promo = Promotion::find($request->input('promosId'));
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
      $valid['messages'] = $promo->absencesMatin($request->input('grpId'));
      $valid['messages2'] = $promo->absencesSoir($request->input('grpId'));
        return response()->json($valid);
    }
}
