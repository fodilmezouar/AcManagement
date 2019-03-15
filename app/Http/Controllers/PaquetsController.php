<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Promotion;
use App\Paquets;
use App\Etudiant;
use App\Copies;

class PaquetsController extends Controller
{
    //
    public function getPromos()
    {
        $promos = Promotion::orderBy('id')->get();
        return view('gPrel.paquets')->with([
            'promos' => $promos]);
    }
    public function getPaquets($promoId){
        $paquets = Paquets::where('promotion_id','=',$promoId)->get();

        return view('gPrel.paquetsG')->with(['paquets' => $paquets,'idPromo'=>$promoId]);

    }
    public function import(Request $request)
    {

        $paquet = new Paquets();
        $libelle = $request->input('libelleModal');

        $paquet->libelle = $libelle;
        $paquet->promotion_id = $request->input('promoId');

        $file = $request->file('fichier');
        $file_name = $libelle.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/uploads/paquets'),$file_name);

        $paquet->fichier = 'uploads/paquets/'.$file_name;
        $paquet->save();
        $data = array_map('str_getcsv', file($paquet->fichier));
        $item=array();
        for ($i=0;$i<count($data);$i++){
            $item[] = array(
                'codeCopie' => "01".time()-(($i+1)*2),
                'paquetId'    => $paquet->id,
                'etudiantId' => DB::table('etudiants')->select('id')->where('numero','=',$data[$i][0])->get()->first()->id,
            );
        }
        DB::table('copies')->insert($item );

        $fragment = "<div class='col-sm-3 col-xxxl-3 block' role='".$paquet->id."'>
                         <div>
                            <button aria-label='Close' class='close supp' type='button' data-target='#suppGroupModal' data-toggle='modal' role='".$paquet->id."'><i class='os-icon os-icon-ui-15'></i></button>
                            <button aria-label='Close' class='close edit' type='button' data-target='#editGroupModal' data-toggle='modal' role='".$paquet->id."'><i class='os-icon os-icon-ui-49'></i></button>
                          </div>
                          <a class='element-box el-tablo' href='#' style='background-color: #e1e1e1;'>
                            <div class='value' id='libelle'>
                              ".$paquet->libelle."
                            </div>
                          </a>
                        </div>";

        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = $fragment;
        return response()->json($valid);

    }
    public function editPaquet(Request $request){
        $paquet = Paquets::find($request->input('paquetId'));
        $paquet->libelle = $request->input('libelle');
        $paquet->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "ok babe";
        return response()->json($valid);
    }
    public function suppPaquet(Request $request){
        $paquetId = $request->input('paquetId');
        Copies::where('paquetId','=',$paquetId)->delete();
        Paquets::find($paquetId)->delete();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "yes Zatchi";
        return response()->json($valid);
    }
    public function getCopies($idPaquet){
        $paquet = Paquets::find($idPaquet);
        $promo = Promotion::find($paquet->promotion_id);
        $copies = Copies::where('paquetId','=',$idPaquet)->get();
        return view('gPrel.paquet')->with(['copies'=>$copies,'nomPaquet'=>$paquet->libelle,'nomPromo'=>$promo->libelle,'idPromo'=>$promo->id]);
    }
}
