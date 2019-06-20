<?php

namespace App\Http\Controllers;

use App\Copies;
use App\Corr_aff;
use App\Corrections;
use App\Module;
use App\Paquets;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class noteController extends Controller
{
    //
    public function getCopies($idPaquet){
        $userId = Auth::id();
        $paquet = Paquets::find($idPaquet);
        $promo = Module::find($paquet->exam_id);
        $correction = Corrections::where('enseignant_id','=',$userId)->where('paquet_id','=',$idPaquet)->get()->first()->correcteur;
        $ecart = Corr_aff::where('exam_id','=',$paquet->exam_id)->get()->first()->ecartNote;
        $note = 'notePre'.$correction;
        if($correction ==3){
            $copies = Copies::select('id', 'codeCopie', 'paquetId', $note . ' as note',DB::raw('ABS(notePre1-notePre2) '))->where('paquetId', '=', $idPaquet)->where(DB::raw('ABS(notePre1-notePre2) '),'>',$ecart)->get();
        }else {
            $copies = Copies::select('id','codeCopie','paquetId',$note.' as note')->where('paquetId','=',$idPaquet)->get();
        }
        return view('gPrel.saisieNote')->with(['copies'=>$copies,'nomPaquet'=>$paquet->libelle,'idPaquet'=>$idPaquet,'corr'=>$correction]);
    }
    public function validerNote(Request $request ,$idPaquet){
        $userId = Auth::id();
        $correction = Corrections::where('enseignant_id','=',$userId)->where('paquet_id','=',$idPaquet)->get()->first()->correcteur;
        $idExam = Paquets::where('id','=',$idPaquet)->get()->first()->exam_id;
        $ecart = Corr_aff::where('id','=',$idExam)->get()->first()->ecartNote;
        $code = $request->input('id');
        $copie = Copies::where('codeCopie','=',$code)->get()->first();
        if($correction == 1)
            $copie->notePre1 =$request->input('note');
        if($correction == 2)
            $copie->notePre2 =$request->input('note');
        if($correction == 3)
            $copie->notePre3 =$request->input('note');
        if(!empty($copie->notePre1) && !empty($copie->notePre2)){
            if(abs(($copie->notePre1-$copie->notePre2))<=$ecart) {
                $copie->noteFinal = ($copie->notePre1 + $copie->notePre2) / 2;
            }else{
                if(!empty($copie->notePre3)){
                    if(abs(($copie->notePre1-$copie->notePre3))< abs(($copie->notePre2-$copie->notePre3))){
                        $copie->noteFinal = $copie->notePre1;
                    }else{
                        $copie->noteFinal = $copie->notePre2;
                    }
                }
            }
        }


        $copie->save();


        return response()->json($ecart);

    }
    public function getPaquets(){
        $userId = Auth::id();


            $paquets = DB::select('select paquets.id,paquets.libelle,paquets.exam_id,modules.libelle as module,corrections.date_affectation as dateAff ,corr_affs.delais FROM paquets,corrections,modules,exams,corr_affs
          WHERE   paquets.exam_id = exams.id and exams.module_id=modules.id AND corr_affs.exam_id=exams.id AND corrections.paquet_id=paquets.id AND corrections.enseignant_id='.$userId);

        return view('gPrel.paquetAssistant')->with(['paquets' => $paquets]);
    }


}
