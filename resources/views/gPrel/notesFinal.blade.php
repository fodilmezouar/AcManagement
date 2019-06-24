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
        </li>
        <li class="breadcrumb-item">
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 86px;">Nom</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 92px;">Prenom</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 92px;">Date de naissance</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 80px;">Moyenne</th></tr></thead><tfoot><tr>
                                                <th rowspan="1" colspan="1" >Nom</th>
                                                <th rowspan="1" colspan="1">Prenom</th>
                                                <th rowspan="1" colspan="1">Date de Naissaince</th>
                                                <th rowspan="1" colspan="1">Moyenne</th>
                                            </tr></tfoot>
                                            <tbody>
                                            @foreach($copies as $copie)

                                                <tr role="row" >
                                                    <td>{{$copie->nom}}</td>
                                                    <td>{{$copie->prenom}}</td>
                                                    <td>{{$copie->naissance}}</td>
                                                    <td>{{$copie->noteFinal}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody></table></div></div>


                            </div>
                        </div>
                    </div>
                    @endsection