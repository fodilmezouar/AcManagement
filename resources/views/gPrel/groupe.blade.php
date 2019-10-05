@extends('layouts.master',['active'=>'Promotions'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
<input type="hidden" id="grpId" value="{{$grpId}}">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
              G - Préliminaire
            </li>
            <li class="breadcrumb-item">
              <a href="{{url('promotions')}}">Promotions</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{url('promotions/'.$idPromo)}}">{{$nomPromo}}</span></a>
            </li>
            <li class="breadcrumb-item">
              <span>{{$nomGroupe}}</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <input type="hidden" name="etudiantId" id="etudiantId">
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Liste Etudiant
                </h6>
                <div class="element-box">
                  <div style="position:absolute;right: 50px;">
                     <button class="justifier btn btn-primary" data-target="#addStudentModal" data-toggle="modal" style="padding: 10px;"><i class="fa fa-plus"></i>    Ajouter</button>
                  </div>
                  <h2 class="form-header" style="text-align: center;">
                    <span class="badge badge-dark" style="padding-top:10px;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;">Groupe {{$nomGroupe}}</span>
                  </h2>
                  <div id="messSuccessBody"></div>
                  <div class="form-desc">
                  </div>
                  <!-- promotions -->

                  <div class="row" id="contentPromos">
                    <!-- table etudiants -->
                       <div class="table-responsive">
                    <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12"><table id="studentsTable" width="100%" class="table table-striped table-lightfont dataTable display" role="grid" aria-describedby="dataTable1_info" style="width: 100%;"><thead><tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 86px;">Numéro</th><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 133px;">Nom</th><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 62px;">Prenom</th><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 21px;">Date de Naissance</th><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 21px;">Actions</th></tr></thead><tfoot><tr><th rowspan="1" colspan="1">Numéro</th><th rowspan="1" colspan="1">Nom</th><th rowspan="1" colspan="1">Prénom</th><th rowspan="1" colspan="1">Date de Naissance</th><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 21px;">Actions</th></tr></tfoot>
                      <tbody id="contentEtudiants">
                        @foreach($etudiants as $etudiant)
                           <tr class ="block" id="{{$etudiant->id}}"><td class="numeroTd">{{$etudiant->numero}}</td><td class="nomTd">{{$etudiant->nom}}</td><td class="prenomTd">{{$etudiant->prenom}}</td><td class="naissanceTd">{{$etudiant->naissance}}</td>
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-outline-primary editStudent edit" data-toggle="modal" id="{{$etudiant->id}}" data-target="#editEtudiantModal" ><i class="os-icon os-icon-ui-49"></i>
                                </button>
                                <button class="btn btn-outline-danger supp" data-toggle="modal" data-target="#suppEtudiantModal" id="{{$etudiant->id}}"><i class="os-icon os-icon-ui-15"></i></button>
                              </div>
                            </td>
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
              <!-- modal add student-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="addStudentModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Add Etudiant
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formEtudiantAdd" method="POST">
          <div class="modal-body">
            <div id="add-etd"></div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="nomAdd"> Nom</label><input class="form-control" placeholder="Enter Nom" type="text" id="nomAdd" name="nomAdd">
              </div>
              <div class="form-group col-sm-6">
                <label for="prenomAdd"> Prenom</label><input class="form-control" placeholder="Enter Prenom" type="text" id="prenomAdd" name="prenomAdd">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="numeroAdd"> Numéro</label><input class="form-control" placeholder="Enter Numéro" type="text" id="numeroAdd" name="numeroAdd">
              </div>
              <div class="form-group col-sm-6">
                <label for="naissanceAdd"> D-Naissance</label><input class="form-control"  type="date" id="naissanceAdd" name="naissanceAdd">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="addEtudiant"> Ajouter</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin modal edit groupe -->
              <!-- modal edit groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="editEtudiantModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Edit Etudiant
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formEtudiantEdit" method="POST">
          <div class="modal-body">
            <div id="edit-etd"></div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="nom"> Nom</label><input class="form-control" placeholder="Enter Nom" type="text" id="nom" name="nom">
              </div>
              <div class="form-group col-sm-6">
                <label for="prenom"> Prenom</label><input class="form-control" placeholder="Enter Prenom" type="text" id="prenom" name="prenom">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="numero"> Numéro</label><input class="form-control" placeholder="Enter Numéro" type="text" id="numero" name="numero">
              </div>
              <div class="form-group col-sm-6">
                <label for="naissance"> D-Naissance</label><input class="form-control"  type="date" id="naissance" name="naissance">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="editGroupe"> Editer</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin modal edit groupe -->
    <!-- modal supp groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="suppEtudiantModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Suppression Etudiant
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formEtudiantSupp" method="POST" action="">
          <div class="modal-body">
              Voulez vous supprimer cet étudiant ?
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="suppEtudiant"> Supprimer</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin supp groupe -->
              <!--------------------
              END - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn" id="export">
                <i class="icon-feather-download"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
@endsection
@section('scripts')
   <script src="{{asset('js/promotions.js')}}"></script>
   <script src="{{asset('js/etudiant.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
@endsection