<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class EnseignantController extends Controller
{
    //
    public function getEnseignant(){
        $output = array('data' => array());
        $users = User::all();
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
            $user->date_naissance

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
}
