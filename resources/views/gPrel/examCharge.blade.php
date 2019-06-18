@extends('layouts.master',['active'=>'Promotions'])
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
            <a href="{{url('promotions')}}">Promotions</a>
        </li>
        <li class="breadcrumb-item">
            <span>examen</span>
        </li>

    </ul>
    <!--------------------
    END - Breadcrumbs
    -------------------->
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Examen
                </h6>
                <div class="element-box">
                    <h5 class="form-header">
                        Examen
                    </h5>
                    <div class="form-desc">
                    </div>
                    <!-- promotions -->
                    <div class="row" id="contentPromos">
                        @foreach($exams as $exam)
                            <div class="col-sm-3 col-xxxl-3 block" role="{{$exam->id}}">
                                <input type="hidden" id="{{$exam->id}}" value="{{$exam->module_id}}">
                                <a class="element-box el-tablo" href="{{url('enseignant/paquets/'.$exam->id.'/'.$exam->module->id)}}" style="background-color: #f2f4f8;">
                                    <div class="trending trending-up" id="annee">
                                        {{$exam->dateExam}}
                                    </div>
                                    <div class="value" id="libelle">
                                        {{$exam->libelle}}
                                    </div>
                                    <div class="trending trending-up">
                                        <span id="filiere">{{$exam->module->libelle}}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- promotions -->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="display-type"></div>
    </div>
@endsection
