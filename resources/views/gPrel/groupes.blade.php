@extends('layouts.master',['active'=>'Promotions'])
@section('content')
<!--------------------
          START - Breadcrumbs
          -------------------->
          <input type="hidden" name="" id="promoId" value="{{$idPromo}}">
          <input type="hidden" name="" id="ensIdInput">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="">G - PRÉLIMINAIRE</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{url('promotions')}}">Promotions</a>
            </li>
            <li class="breadcrumb-item">
              <span>{{$nomPromo}}</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Infos Promotion
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Infos Promotion
                  </h5>
                  <div class="form-desc">
                  </div>
                  <!-- content plus -->
                      <div class="os-tabs-w">
                        <div class="os-tabs-controls">
                          <ul class="nav nav-tabs smaller">
                            <li class="nav-item">
                              <a class="nav-link active show floatChoose" data-toggle="tab" href="#tab_groupes">Groupes</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link floatChoose" data-toggle="tab" href="#tab_modules">Modules</a>
                            </li>
                          </ul>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active show" id="tab_groupes">
                            <div class="el-tablo bigger">
                              <!-- promotions -->
                  <div class="row" id="contentGroupes">
                      @foreach($groupes as $groupe)
                        <div class="col-sm-3 col-xxxl-3 block" role="{{$groupe->id}}">
                          <div>
                            <button aria-label="Close" class="close supp" type="button" data-target="#suppGroupModal" data-toggle="modal" role="{{$groupe->id}}"><i class="os-icon os-icon-ui-15"></i></button>
                            <button aria-label="Close" class="close edit" type="button" data-target="#editGroupModal" data-toggle="modal" role="{{$groupe->id}}"><i class="os-icon os-icon-ui-49"></i></button>
                          </div>
                          <a class="element-box el-tablo" href="{{url('promotions/groupes/liste/'.$groupe->id)}}" style="background-color: #f2f4f8;">
                            <!--
                            <div class="label" id="annee">
                                 zea
                            </div>
                             -->
                            <div class="value" id="libelle">
                              {{$groupe->libelle}}
                            </div>
                            <!--
                            <div class="trending trending-down-basic">
                              <span id="filiere">bombof</span>
                            </div>
                             -->
                          </a>
                        </div>
                        @endforeach
                   </div>
                   <!-- promotions -->
                            </div>
                          </div>
                          <div class="tab-pane" id="tab_modules">
                            <div class="row" id="contentModules">
                              @foreach($modules as $module)
                               <div class="col-sm-3 col-xxxl-3 blockModule" role="{{$module->id}}">
                          <div>
                            <button aria-label="Close" class="close suppModule" type="button" data-target="#suppModuleModal" data-toggle="modal" role="{{$module->id}}"><i class="os-icon os-icon-ui-15"></i></button>
                            <button aria-label="Close" class="close editModule" type="button" data-target="#editModuleModal" data-toggle="modal" role="{{$module->id}}"><i class="os-icon os-icon-ui-49"></i></button>
                            <button aria-label="Close" class="close attModule" type="button" data-target="#attModuleModal" data-toggle="modal" role="{{$module->id}}"><i class="icon-feather-arrow-up-right"></i></button>
                          </div>
                          <a class="element-box el-tablo" href="" style="background-color: #f2f4f8;">
                            <div class="value" id="libelleModule">
                              {{$module->libelle}}
                            </div>
                            <div class="trending trending-down-basic">
                              
                                 @if($module->enseignant_id)
                                   <span style="color:green;">affecté</span>
                                 @else
                                   <span style="color:red;">non affecté</span>
                                 @endif
                            </div>
                          </a>
                        </div>
                        @endforeach
                      </div>
                      </div>
                          </div>
                        </div>
                      </div>
                    <!-- fin content plus -->
                </div>
              </div><!--------------------
              START - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn" data-target="#exampleModal1" data-toggle="modal" id="zombro">
                <i class="os-icon os-icon-plus"></i>
              </div>  
              <input type="hidden" id="groupIdInput">
              <input type="hidden" id="moduleIdInput">
              <input type="hidden" id="attModuleIdInput">
      <!-- modal add groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Nouveau Groupe
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button" id="dismissModal"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formGroupes" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="form-group">
                <label for="libelleModal"> Libellé</label><input class="form-control" placeholder="Enter Libellé" type="text" id="libelleModal" name="libelleModal">
              </div>
              <div class="form-group">
                <label for="libelleModal"> Fichier Excel</label><input class="form-control" type="file" id="fichier" name="fichier">
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="ajoutGroupe"> Ajouter</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin modal ajout groupe -->
    <!-- modal add module-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="modalModule" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Nouveau Module
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button" id="dismissModal"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formModules" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label for="libelleModalModule"> Libellé</label><input class="form-control" placeholder="Enter Libellé" type="text" id="libelleModalModule" name="libelleModal">
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="ajoutModule"> Ajouter</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin modal ajout module -->
    <!-- modal edit groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="editGroupModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Edit Groupe
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formGroupesEdit" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label for="libelleModal"> Libellé</label><input class="form-control" placeholder="Enter Libellé" type="text" id="libelleModalEdit" name="libelleModal">
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
    <!-- modal edit promotion-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="editModuleModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Edit Module
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formModulesEdit" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label for="libelleModal"> Libellé</label><input class="form-control" placeholder="Enter Libellé" type="text" id="libelleModalEditModule" name="libelleModal">
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="editModule"> Editer</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin modal edit groupe -->
    <!-- modal supp groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="suppGroupModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Suppression Groupe
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formGroupSupp" method="POST" action="">
          <div class="modal-body">
              Vous risquez de perdre tous les informations qui concerne la promotion
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="suppGroupe"> Supprimer</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin supp groupe -->
    <!-- modal supp  module-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="suppModuleModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Suppression Module
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formModuleSupp" method="POST" action="">
          <div class="modal-body">
              Etes vous sur ?
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="suppModules"> Supprimer</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin supp module -->
              <!--------------------
              END - Chat Popup Box
              -------------------->
            </div>
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/groupes.js')}}"></script>
@endsection
    