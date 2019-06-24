@extends('layouts.master',['active'=>'Repartition'])
<!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="index.html">Répartition Taches</a>
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
                    <div class="row" id="contentModules">
                        @foreach($modules as $module)
                            <div class="col-sm-3 col-xxxl-3 blockModule" role="{{$module->id}}">
                                <a class="element-box el-tablo" href="/affectations/{{$module->id}}" style="background-color: #f2f4f8;">
                                    <div class="value">
                                        {{$module->libelle}}
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
@endsection