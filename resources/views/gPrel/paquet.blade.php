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
            <a href="{{url('anonymat/'.$idPromo)}}">{{ $nomPromo }}</span></a>
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
                            <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont dataTable" role="grid" aria-describedby="dataTable1_info" style="width: 100%;"><thead><tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 86px;">Numéro</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 86px;">code Copie</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 133px;">Nom</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 62px;">Prenom</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 21px;">Date de Naissance</th></tr></thead><tfoot><tr>
                                                <th rowspan="1" colspan="1">Numéro</th>
                                                <th rowspan="1" colspan="1" >code Copie</th>
                                                <th rowspan="1" colspan="1">Nom</th>
                                                <th rowspan="1" colspan="1">Prénom</th>
                                                <th rowspan="1" colspan="1">Date de Naissance</th></tr></tfoot>
                                            <tbody>
                                            @foreach($copies as $copie)
                                                <tr role="row">
                                                    <td>{{$copie->etudiant->numero}}</td>
                                                    <td>{{$copie->codeCopie}}</td>
                                                    <td>{{$copie->etudiant->nom}}</td>
                                                    <td>{{$copie->etudiant->prenom}}</td>
                                                    <td>{{$copie->etudiant->naissance}}</td>
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