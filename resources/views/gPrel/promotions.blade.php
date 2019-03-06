@extends('layouts.master')
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="index.html">G - Préliminaire</a>
            </li>
            <li class="breadcrumb-item">
              <span>Promotions</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Promotions
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Promotions
                  </h5>
                  <div class="form-desc">
                  </div>
                  <!-- promotions -->
                  <div class="row" id="contentPromos">
                    @foreach($promos as $promo)
                        <div class="col-sm-3 col-xxxl-3 block" role="{{$promo->id}}">
                          <div>
                            <button aria-label="Close" class="close supp" type="button" data-target="#suppModal" data-toggle="modal" role="{{$promo->id}}"><i class="os-icon os-icon-ui-15"></i></button>
                            <button aria-label="Close" class="close edit" type="button" data-target="#editModal" data-toggle="modal" role="{{$promo->id}}"><i class="os-icon os-icon-ui-49"></i></button>
                          </div>
                          <a class="element-box el-tablo" href="promotions/{{$promo->id}}" style="background-color: #e1e1e1;">
                            <div class="label" id="annee">
                              {{$promo->annee}} / {{$promo->annee + 1}}
                            </div>
                            <div class="value" id="libelle">
                              {{$promo->libelle}}
                            </div>
                            <div class="trending trending-down-basic">
                              <span id="filiere">{{$promo->filiere->libelle}}</span>
                            </div>
                          </a>
                        </div>
                       @endforeach
                   </div>
                   <!-- promotions -->
                </div>
              </div><!--------------------
              START - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn" data-target="#exampleModal1" data-toggle="modal">
                <i class="os-icon os-icon-plus"></i>
              </div>  
      <!-- modal add promotion-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Nouvelle Promotion
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formPromos" method="POST" action="">
          <div class="modal-body">
              <div class="form-group">
                <label for="libelleModal"> Libellé</label><input class="form-control" placeholder="Enter Libellé" type="text" id="libelleModal">
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="filiereModal"> Filiére</label>
                    <select class="form-control" id="filiereModal">
                       @foreach($filieres as $filiere)
                           <option value="{{$filiere->id}}">{{$filiere->libelle}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="niveauModal">Niveau</label>
                    <select class="form-control" id="niveauModal">
                    	<option value="Lisence 1">Lisence 1</option>
                    	<option value="Lisence 2">Lisence 2</option>
                      <option value="Lisence 3">Lisence 3</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="ajoutPromo"> Ajouter</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- end modal add promo -->
     <!-- modal add promotion-->
     <input type="hidden" id="promoIdInput">
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="suppModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Suppression Promotion
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formPromosSupp" method="POST" action="">
          <div class="modal-body">
              Vous risquez de perdre tous les informations qui concerne la promotion
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="suppPromo"> Supprimer</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin supp promotions -->
    <!-- modal edit promotion-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="editModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Edit Promotion
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formPromosEdit" method="POST" action="">
          <div class="modal-body">
              <div class="form-group">
                <label for="libelleModal"> Libellé</label><input class="form-control" placeholder="Enter Libellé" type="text" id="libelleModalEdit">
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="filiereModal"> Filiére</label>
                    <select class="form-control" id="filiereModalEdit">
                       @foreach($filieres as $filiere)
                           <option value="{{$filiere->id}}">{{$filiere->libelle}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="niveauModal">Niveau</label>
                    <select class="form-control" id="niveauModalEdit">
                      <option value="Lisence 1">Lisence 1</option>
                      <option value="Lisence 2">Lisence 2</option>
                      <option value="Lisence 3">Lisence 3</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="editPromo"> Editer</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- end modal edit promo -->
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
   <script src="{{asset('js/promotions.js')}}"></script>
@endsection