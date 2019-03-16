<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exams;
use App\Module;

class ExamsController extends Controller
{
    //
    public function getExam(){
        $exams = Exams::all();
        $modules = Module::all();

        return view('gPrel.exam')->with(['exams' => $exams,'modules' => $modules]);

    }
    public function ajoutExam(Request $request){
        $exam = new Exams();
        $time = strtotime($request->input('dateExam'));

        $dateExam = date('Y-m-d',$time);
        $exam->libelle = $request->input('libelle');
        $exam->dateExam = $dateExam;
        $exam->module_id = $request->input('moduleId');
        $exam->save();
        $fragment = "<div class='col-sm-3 col-xxxl-3 block' role='".$exam->id."'>
                        <input type='hidden' id='".$exam->id."' value='".$exam->module_id."'>
                    <input type='hidden' id='test' value='".$exam->id."'>
                        <div>
                            <button aria-label='Close' class='close supp' type='button' role='".$exam->id."' data-target='#suppModal' data-toggle='modal'><i class='os-icon os-icon-ui-15'></i></button>
                            <button aria-label='Close' class='close edit' type='button' role='".$exam->id."' data-target='#editModal' data-toggle='modal'><i class='os-icon os-icon-ui-49'></i></button>
                          </div>
                          <a class='element-box el-tablo' href='anonymat/exam/".$exam->id."' style='background-color: #e1e1e1;'>
                            <div class='label' id='annee'>date de l'exam :
                              ".$exam->dateExam."
                            </div>
                            <div class='value' id='libelle'>
                              ".$exam->module->libelle."
                            </div>
                          </a>
                        </div>";
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = $fragment;
        return response()->json($valid);
    }
    public function suppExam(Request $request){
        $examId = $request->input('examId');
        Exams::find($examId)->delete();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "Success";
        return response()->json($valid);
    }

    public function editExam(Request $request){
        $exam = Exams::find($request->input('examId'));
        if($exam->libelle)
            $exam->libelle = $request->input('libelle');
        if($exam->dateExam) {
            $time = strtotime($request->input('dateExam'));

            $dateExam = date('Y-m-d',$time);
            $exam->dateExam = $dateExam;
        }
        if($exam->module_id)
            $exam->module_id = $request->input('moduleId');
        $exam->save();
        $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = $exam->libelle;
        return response()->json($valid);
    }
}
