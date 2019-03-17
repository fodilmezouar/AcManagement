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
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Anonymat
                </h6>
                <div class="element-box">
                    <h5 class="form-header">
                      Les Promotions
                    </h5>
                    <div class="form-desc">
                    </div>
                    <!-- promotions -->
                    <div class="row" id="contentPromos">
                        @foreach($promos as $promo)

                            <div class="col-sm-3 col-xxxl-3 block" role="{{$promo->id}}">
                                <input type="hidden" id="{{$promo->id}}" value="{{$promo->filiere_id}}">
                                <input type="hidden" id="{{$promo->id}}5" value="{{$promo->niveau}}">
                                <a class="element-box el-tablo" href="exams/{{$promo->id}}" style="background-color: #f2f4f8;">
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

            <input type="hidden" id="promoIdInput">

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
