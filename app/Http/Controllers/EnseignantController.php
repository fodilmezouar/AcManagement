<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class EnseignantController extends Controller
{
    //
    public function getEnseignant(){
        $output = array('data' => array());
        $users = User::all();
        foreach ($users as $user){
            $button_Action = '<!-- Single button -->
     <div class="btn-group">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                      </button>
                     <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" id="editMaterielsModalBtn" data-target="#modifierEnseignant" onclick="editEns('.$user->id.');"> <i class="os-icon os-icon-edit-1"></i> Editer</a></li>
                       <li><a type="button" data-toggle="modal" data-target="#removeMatModal" id="removeEnseignant" onclick="removeEnseignant('.$user->id.');"> <i class="os-icon os-icon-cancel-circle"></i> Supprimer</a></li></ul></div>';

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
        $user->prenom = strtoupper($request->input('prenom'));
        $user->date_naissance = $request->input('dateNais');
        $user->grade = $request->input('grade');
        $user->pseudoname = $name;
        $user->password = $name.time();
        $user->email = $request->input('email');
        $user->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Ajout réussi";
        return response()->json($valid);
    }
}
