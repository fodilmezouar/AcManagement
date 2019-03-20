@extends('layouts.master',['active'=>'Anonymat'])
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
            <span>Anonymat</span>
        </li>
    </ul>
    <!--------------------
    END - Breadcrumbs
    -------------------->
    <div class="content-i">
        <input type="hidden" name="" id="promoId" value="{{$idExam}}">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Anonymat
                </h6>
                <div class="element-box">
                    <h5 class="form-header">
                        Les Paquets
                    </h5>
                    <div class="form-desc">
                    </div>
                    <!-- promotions -->
                    <div class="row" id="contentGroupes">
                        @foreach($paquets as $paquet)
                            <div class="col-sm-3 col-xxxl-3 block" role="{{$paquet->id}}">
                                <div>
                                    <button aria-label="Close" class="close supp" type="button" data-target="#suppGroupModal" data-toggle="modal" role="{{$paquet->id}}"><i class="os-icon os-icon-ui-15"></i></button>
                                    <button aria-label="Close" class="close edit" type="button" data-target="#editGroupModal" data-toggle="modal" role="{{$paquet->id}}"><i class="os-icon os-icon-ui-49"></i></button>
                                </div>
                                <a class="element-box el-tablo" href="{{url('anonymat/paquets/liste/'.$paquet->id)}}" style="background-color: #f2f4f8;">
                                    <div class="value" id="libelle">
                                        {{$paquet->libelle}}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- promotions -->
                </div>
            </div>

            <!-- fin modal ajout module -->
            <!-- modal edit groupe-->
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Nouveau Paquet
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
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="editGroupModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Edit paquet
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
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="suppGroupModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Suppression paquet
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form id="formGroupSupp" method="POST" action="">
                            <div class="modal-body">
                                Vous risquez de perdre tous les informations qui concerne la paquet
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="suppGroupe"> Supprimer</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="floated-chat-btn" data-target="#exampleModal1" data-toggle="modal">
                <i class="os-icon os-icon-plus"></i>
            </div> <!--------------------
              START - Chat Popup Box
              -------------------->

            <input type="hidden" id="promoIdInput">
            <input type="hidden" id="paquetIdInput">

            <!-- fin supp promotions -->
            <!-- modal edit promotion-->

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
    <script src="{{asset('js/paquets.js')}}"></script>
@endsection