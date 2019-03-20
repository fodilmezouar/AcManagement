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
                                </div>
                                <a class="element-box el-tablo" href="{{url('enseignant/paquets/liste/'.$paquet->id)}}" style="background-color: #f2f4f8;">
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
            <?php if(count($corrA) >0){ ?>
            <div class="align-center"><button class="btn btn-md btn-outline-primary"  data-target="#AffecterModalEdit" data-toggle="modal" onclick="editEcart({{$idExam}});">modifier la délai et l'écart <i class="os-icon os-icon-ui-46"></i></button></div>
            <?php }else{   ?>
            <div class="align-center"><button class="btn btn-md btn-outline-primary"  data-target="#AffecterModal" data-toggle="modal">Spécifier la délai et l'écart <i class="os-icon os-icon-ui-46"></i></button></div>
            <?php }?>

            <div aria-labelledby="exampleModalLabel" class="modal fade" id="AffecterModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Spécification
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form id="formValider" method="POST" action="">
                            <div class="modal-body">
                                <div class="row" id="body-editEnse">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">délais</label><input name="delais" id="delais" class="form-control" data-error="Please input your First Name" placeholder="délais" required="required" type="number">
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">ecart</label><input name="ecart" id="ecart" class="form-control" data-error="Please input your Last Name" placeholder="ecart" required="required" type="number">
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="valider"> Valider</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="AffecterModalEdit" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Spécification
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form id="EditformValider" method="POST" action="">
                            <div class="modal-body">
                                <div class="row" id="body-editEcart">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">délais</label><input name="Editdelais" id="Editdelais" class="form-control" data-error="Please input your First Name" placeholder="délais" required="required" type="number">
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">ecart</label><input name="Editecart" id="Editecart" class="form-control" data-error="Please input your Last Name" placeholder="ecart" required="required" type="number">
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="valider"> Valider</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
<!--------------------
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
    <script src="{{asset('js/ecart.js')}}"></script>
@endsection