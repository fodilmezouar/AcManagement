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
        <span>mes paquets</span>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">
                Assistant
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
                        <a class="element-box el-tablo" href="{{url('note/'.$paquet->id)}}" style="background-color: #f2f4f8;">
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
