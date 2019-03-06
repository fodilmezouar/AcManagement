@extends('layouts.master')
@section('content')
<!--------------------
          START - Breadcrumbs
          -------------------->
          <input type="hidden" name="" id="promoId" value="{{$idPromo}}">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="index.html">Products</a>
            </li>
            <li class="breadcrumb-item">
              <span>Laptop with retina screen</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Groupes
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Groupes
                  </h5>
                  <div class="form-desc">
                  </div>
                  <!-- promotions -->
                  <div class="row" id="contentGroupes">
                      @foreach($groupes as $groupe)
                        <div class="col-sm-3 col-xxxl-3">
                          <a class="element-box el-tablo" href="" style="background-color: #e1e1e1;">
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
              Nouveau Groupe
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
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
    