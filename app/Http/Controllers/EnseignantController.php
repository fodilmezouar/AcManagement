<?php

namespace App\Http\Controllers;


use App\Exams;
use App\Filiere;
use App\Paquets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Module;
use App\Copies;
use App\Corrections;
use App\Corr_aff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class EnseignantController extends Controller
{
    //
    public function enseignantView(){
        $modules = Filiere::all();

        return view('gPrel.enseignant',['modules' => $modules]);
    }
    public function getEnseignant(){
        $output = array('data' => array());
        $users = User::where('grade','!=',"")->get();
        foreach ($users as $user){
            $button_Action = '<!-- Single button -->
<div class="btn-group">
     <button class="btn btn-outline-primary" data-toggle="modal" id="editEnseignant" data-target="#editEnseignantData" onclick="editEns('.$user->id.');" ><i class="os-icon os-icon-ui-49"></i>
     </button><button class="btn btn-outline-danger" data-toggle="modal" data-target="#removeEnsModal" onclick="removeEns('.$user->id.');" ><i class="os-icon os-icon-ui-15"></i></button></div>';

            $output['data'][] = array(
                $user->name,
                $user->prenom,
                $user->date_naissance,
                $user->grade,
                $user->email,
                $button_Action
            );
        }
        return response()->json($output);
    }

    public function createEnseignant(Request $request){
        $user = new User();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="userDefault.png";
        }

        $name = $request->input('name').".".$request->input('prenom');
        $user->photo = $file_name;
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->date_naissance = $request->input('dateNais');
        $user->grade = $request->input('grade');
        $user->pseudoname = $name;
        $user->filliere_id = $request->input('filiereId');
        $to_name = $request->input('name').".".$request->input('prenom');
        $to_email = $request->input('email');
        $data = array('name'=>"Sam Jose", "body" => "Test mail");
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Artisans Web Testing Mail');
            $message->from('fodilspotify@gmail.com','Artisans Web');
        });

        /*$data = array(
            'name'      =>  $request->input('name'),
            'body'   =>   $request->input('name').".".$request->input('prenom')
        );
        Mail::send('dynamic_email_template',$data,function ($message)
        {
            $name = Input::get('name').".".Input::get('prenom');
            $message->to(Input::get('email'),Input::get('name'))->subject('You password is :'.$name.time());
        });*/



       /* $to_name = $request->input('name');
        $to_email = $request->input('email');
        Mail::send('dynamic_email_template', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Artisans Web Testing Mail');
            $message->from('univtlemcenzatchi@gmail.com','Artisans Web');
        });*/

        $user->password = Hash::make("password");
        $user->email = $request->input('email');
        $user->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";
        return response()->json($valid);
    }
    public function getInfoEns($id){
        $output = array('data' => array());
        $user = User::find($id);
        $output['data'][] = array(
            $user->name,
            $user->prenom,
            $user->email,
            $user->photo,
            $user->grade,
            $user->date_naissance,
            $user->filliere_id

        );
        return response()->json($output);
    }
    public function editEnseignant($id,Request $request){
        $user = User::find($id);
        if($request->hasFile('imageEdit')){
            $file = $request->file('imageEdit');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="userDefault.png";
        }

        $name = $request->input('nameEdit').".".$request->input('prenomEdit');
        $user->photo = $file_name;
        $user->name = $request->input('nameEdit');
        $user->prenom = $request->input('prenomEdit');
        $user->filliere_id = $request->input('filiereId');
        $user->date_naissance = $request->input('dateNaisEdit');
        $user->grade = $request->input('gradeEdit');
        $user->pseudoname = $name;
        $user->email = $request->input('emailEdit');
        $user->save();
        return response()->json(array('success' => true,'message' => "Enseignant mis à jour"));

    }
    public function deleteEnseignant(Request $request){
        $id = $request->input('idEnseignant');
        User::destroy($id);
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Suppression réussi";
        return response()->json($valid);
    }
    public function repartirRoles($id){
      $enseignants = User::where('grade','!=',NULL)->where('filliere_id','=',$id)->get();
      return view('gPrel.repartitionRole')->with('enseignants',$enseignants);
    }
    public function validerRepartition(Request $request){
       $enseignant = User::find($request->input('ensId'));
       
       if(stristr($enseignant->role,'1') || stristr($enseignant->role,'4'))
        {
            if(!$request->input('aRet') && stristr($enseignant->role,'1'))
                    $enseignant->role = "1";
            else if(!$request->input('aRet') && stristr($enseignant->role,'4'))
                $enseignant->role = "4";
            else
              $enseignant->role.=" ".$request->input('aRet');
        }
       else
        $enseignant->role = $request->input('aRet');
       $enseignant->save();
       $valid['success'] = array('success' => false, 'messages' => array());
       $valid['success'] = true;
       $valid['messages'] = "yes babe";
       return response()->json($valid);   
    }
    public function getPaquets($examId,$moduleId){
        $userId = Auth::id();


        $paquets = array();
        $corrA=[];
            if (Exams::where('module_id',$moduleId)->exists()) {

                $paquets = Paquets::where('exam_id',$examId)->get();
                $corrA = Corr_aff::where('exam_id',$examId)->get();
            }
        return view('gPrel.paquetExam')->with(['paquets' => $paquets,'idExam'=>$examId,'corrA'=>$corrA]);
    }
    public function getCopies($idPaquet){

        $userId = Auth::id();
        $paquet = Paquets::find($idPaquet);
        $promo = Module::find($paquet->exam_id);
        $ecart = Corr_aff::where('exam_id','=',$paquet->exam_id)->get()->first()->ecartNote;
        $users = User::where('grade','!=',"")->where('id','!=',$userId)->get();
        $correct = Corrections::where('paquet_id','=',$idPaquet)->pluck('correcteur')->toArray();
        $copies = Copies::where('paquetId','=',$idPaquet)->get();
        return view('gPrel.examPaquet')->with(['copies'=>$copies,'nomPaquet'=>$paquet->libelle,'ecart'=>$ecart,'enseignants'=>$users,'idPaquet'=>$idPaquet,'correct'=>$correct]);
    }
    public function validerAff(Request $request){
        $corr = new Corrections();
        $idPaq = $request->input('paquetId');
        $corr->enseignant_id = $request->input('enseignantId');
        $corr->paquet_id = $idPaq;
        $corr->date_affectation = date("Y-m-d");
        $corr->correcteur = $request->input('correcteur');
        $corr->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "yes babe";
        return response()->json($valid);
    }
    public function validerDelais(Request $request){
        $corrA = new Corr_aff();
        $corrA->delais =  $request->input('delais');
        $corrA->ecartNote =  $request->input('ecart');
        $corrA->exam_id =  $request->input('examId');
        $corrA->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "yes babe";
        return response()->json($valid);
    }
    public function getInfoEcart($id){
        $output = array('data' => array());
        $corrA = Corr_aff::find($id);
        $output['data'][] = array(
            $corrA->delais,
            $corrA->ecartNote


        );
        return response()->json($output);
    }
    public function updateDelais(Request $request){
        $corrA = Corr_aff::find($request->input('examId'));
        $corrA->delais =  $request->input('delais');
        $corrA->ecartNote =  $request->input('ecart');
        $corrA->exam_id =  $request->input('examId');
        $corrA->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "yes babe";
        return response()->json($valid);

    }
}
