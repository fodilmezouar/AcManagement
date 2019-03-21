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
            <a href="{{url('anonymat')}}">Anonymat</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{url('anonymat/'.$idPromo)}}">{{ $nomPromo }}</a>
        </li>
        <li class="breadcrumb-item">
            <span>{{$nomPaquet}}</span>
        </li>
    </ul>
    <!--------------------
    END - Breadcrumbs
    -------------------->
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Liste des copies
                </h6>
                <div class="element-box">
                    <h5 class="form-header">
                        Liste des copies
                    </h5>
                    <div class="form-desc">
                    </div>
                    <!-- promotions -->
                    <div class="row" id="contentPromos">
                        <!-- table etudiants -->
                        <div class="table-responsive">
                            <div id="dataTable1_wrapper" >
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="dataTable_Edit" width="100%" class="table table-bordered table-striped" style="width: 100%;"><thead><tr role="row">
                                                <th>code Copie</th>
                                                <th>Note</th>
                                            </thead>
                                            <tbody>
                                            @foreach($copies as $copie)
                                                <tr role="row">
                                                    <td>{{$copie->codeCopie}}</td>
                                                    <td>{{$copie->note}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody></table></div></div>


                            </div>
                        </div>
                    </div>
                    <!-- promotions -->
                </div>
            </div><!--------------------
              START - Chat Popup Box
              -------------------->

            <!--------------------
            END - Chat Popup Box
            -------------------->
            <input type="hidden" name="" id="PaquetId" value="{{ $idPaquet}}">

        </div>
    </div>
    </div>
    </div>
    <div class="display-type"></div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/jquery.tabledit.min.js')}}"></script>
    <script src="{{asset('js/noteSaisi.js')}}"></script>


@endsection