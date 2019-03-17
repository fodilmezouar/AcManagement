@extends('layouts.master',['active'=>'Repartition'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
   <input type="hidden" id="seanceId" value="{{$seanceId}}">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
               G - Absences
            </li>
            <li class="breadcrumb-item">
               <a href="/calendrier/{{$ensId}}">Séances</a>
            </li>
            <li class="breadcrumb-item">
                {{$groupeLib}} - {{$type}}
            </li>
            <li class="breadcrumb-item">
              <span></span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Séance {{$moduleName}} {{$type}}
                </h6>
                <div class="element-box">
                  <h5 class="form-header" align="center">
                     Date : {{$date}}
                  </h5>
                  <div class="form-desc">
                  </div>
                  <div id="mess"></div>
                  <!-- promotions -->
                  <div class="row" id="contentPromos">
                      <!-- table etudiants -->
                       <div class="table-responsive">
                    <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12"><table id="dataTable1" width="100%" class="table table-striped dataTable" role="grid" aria-describedby="dataTable1_info" style="width: 100%;margin:auto; "><thead><tr role="row"><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:25%;">Nom</th><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 25%;">Prenom</th><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 25%;">Absence</th></tr></thead><tfoot><tr><th rowspan="1" colspan="1">Nom</th><th rowspan="1" colspan="1">Prénom</th><th rowspan="1" colspan="1">Absence</th></tr></tfoot>
                      <tbody>
                        @foreach($etudiants as $etudiant)
                           <tr role="row" class="block" id="{{$etudiant->id}}">
                               <td>
                                   {{$etudiant->nom}}
                               </td>
                               <?php 
                                  $checked="";
                                  if($etudiant->hasAbs($seanceId))
                                    $checked="checked";
                                ?>
                               <td>
                                  {{$etudiant->prenom}}
                               </td>
                               <td><input type="checkbox" name="" id="{{$etudiant->id}}" {{$checked}}></td>
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
              <div class="floated-chat-btn" data-target="#validerListe" data-toggle="modal" id="zombro">
                <i class="icon-feather-arrow-up-right"></i>
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
    </div>
@endsection
@section('scripts')
   <script src="{{asset('js/absences.js')}}"></script>
@endsection