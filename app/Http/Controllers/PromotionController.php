<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promotion;
use App\Filiere;
class PromotionController extends Controller
{
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
}
