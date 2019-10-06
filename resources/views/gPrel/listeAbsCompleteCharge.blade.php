@extends('layouts.master',['active'=>'mesModulesCharge'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')

   <input type="hidden" id="seanceId" value="{{$seanceId}}">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{url('/home')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
               G - Absences
            </li>
            <li class="breadcrumb-item">
                <a href="/mesModulesCharge/{{Auth::user()->id}}">Modules</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mesModulesCharge/groupes/{{$module->id}}/{{Auth::user()->id}}">{{$module->libelle}}</a>
            </li>
            <li class="breadcrumb-item">
              <span>Liste - {{$type}}</span>
            </li>
          </ul>

          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Liste des Absences
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                  {{$module->libelle}} - {{$type}}
                  </h5>
                  <div class="form-desc">
                  </div>
                  <!-- promotions -->
                  <div class="row" id="contentPromos">
                      <!-- table etudiants -->
                       <div class="table-responsive">
                    <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12"><table id="dataTable1" width="100%" class="table table-striped dataTable" role="grid" aria-describedby="dataTable1_info" style="width: 100%;margin:auto; "><thead><tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:30%;">Nom</th>
                      <?php for ($i=0; $i < 7 || $i < count($instances); $i++){ ?>
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:10%;">sc</th>
                      <?php } ?>
                      @if(isset($justifier))
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:10%;">Action</th>
                      @endif
                      </tr></thead>
                      
                      <tfoot><tr>
                          <th rowspan="1" colspan="1">Nom</th>
                          <?php for ($i=0; $i < 7 || $i < count($instances); $i++){ ?>
                           <th rowspan="1" colspan="1">sc</th>
                           <?php } ?>
                           @if(isset($justifier))
                           <th rowspan="1" colspan="1">Action</th>
                           @endif
                            </tr>
                      </tfoot>

                      <tbody>
                        @foreach($students as $student)
                        <?php  
                        $st="";

                          if($seance && $student->isExclu($seance->id))
                             $st = "background-color: red;";
                         ?>

                           <tr role="row" class="block" id="{{$student->id}}" style="{{$st}}">
                               <td>
                                   {{$student->nom}} {{$student->prenom}}
                               </td>
                               <?php $k = 0;
                               for ($i=0; $i < 7 || $i < count($instances); $i++){ ?>
                           <td rowspan="1" colspan="1">
                                <?php 
                                  if($seance && $i < sizeof($instances))
                                     {
                                      $instance = $instances->get($i);
                                      if(! $instance->hasAbsence($student->id,$instance->id))
                                        echo '<span class="checked"><i class="fa fa-check"></i></span>';
                                      else if($instance->hasAbsence($student->id,$instance->id)->justification_id)
                                        echo '<i class="fa fa-times"></i> J';
                                      else
                                        {echo '<span class="notChecked"><i class="fa fa-times"></i></span>';$k++;}
                                     }
                                 ?>
                           </td>
                           <?php } ?>
                           @if(isset($justifier))
                           <td>
                              @if($k && !$student->isExclu($seance->id))
                              <button class="justifier btn btn-primary" id="{{$student->id}}" data-target="#justifierModal" data-toggle="modal"><i class="os-icon os-icon-documents-03"></i> justifier</button>
                              @endif
                           </td>
                           @endif
                           </tr>
                           @endforeach
                      </tbody></table></div></div>
                  </div>
                  </div>
                   </div>
                   <!-- promotions -->
                </div>
              </div><!--------------------
              START - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn" id="exportListe">
                <i class="icon-feather-download"></i>
              </div> 
              <!--------------------
              END - Chat Popup Box
              -------------------->
            </div>
          </div>
        </div>
      </div>
      <div class="display-type"></div>
      <!-- modal supp groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="validerListe" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Valider Liste 
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="liste" method="POST" action="">
          <div class="modal-body">
              Voulez vous valider la liste des absences ?
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="validListe"> Valider</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin supp groupe -->
    <!-- modal supp groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="justifierModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Joindre Justificatif
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
          <div class="modal-body">
              <div class="element-box">
    <form method="POST" action="" enctype="multipart/form-data" id="formJustification">
      <div class="steps-w">
        <div class="step-triggers">
          <a class="step-trigger active" href="#stepContent1">First Step</a><a class="step-trigger" href="#stepContent2">Second Step</a>
        </div>
        <div class="step-contents">
          <div class="step-content active" id="stepContent1">
            <table id="absContent" width="100%" border="1">
                <tr>
                  <th>Date</th>
                  <th>Justifier</th>
                </tr>
            </table>
            <!-- aAjoute -->
            <div class="form-buttons-w text-right">
              <a class="btn btn-primary step-trigger-btn" href="#stepContent2"> Continue</a>
            </div>
          </div>
          <div class="step-content" id="stepContent2">
            <div class="form-group">
              <label for=""> Justificatif</label><input class="form-control" placeholder="Enter email" name="justificatif" type="file">
            </div>
            <div class="form-buttons-w text-right">
              <button class="btn btn-primary" id="submitJustification">Submit Form</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
          </div>
      
        </div>
      </div>
    </div>
    <!-- fin supp groupe -->

    </div>
@endsection
@section('scripts')
   <script src="{{asset('js/absences.js')}}"></script>
@endsection