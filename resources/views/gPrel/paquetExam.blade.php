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
                    <div class="pull-right"><?php if (count($paquets)>0){?><button class="btn btn-primary"  data-target="#AffecterModal" data-toggle="modal">Affecter les paquets <i class="icon-feather-arrow-up-right"></i></button><?php }?></div>
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


            <div aria-labelledby="exampleModalLabel" class="modal fade" id="AffecterModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Affecter les paquets
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form id="formAffecter" method="POST" action="">
                            <div class="modal-body">
                                Voulez-vous vraiment affecter les paquets ?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="affecterPaquet"> Affecter</button>
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
