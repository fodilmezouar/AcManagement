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
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 86px;">code Copie</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 62px;">note 1</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 62px;">note 2</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 21px;">note 3</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 21px;">Moyenne</th></tr></thead><tfoot><tr>
                                                <th rowspan="1" colspan="1" >code Copie</th>
                                                <th rowspan="1" colspan="1">note 1</th>
                                                <th rowspan="1" colspan="1">note 2</th>
                                                <th rowspan="1" colspan="1">note 3</th>
                                                <th rowspan="1" colspan="1">Moyenne</th>
                                            </tr></tfoot>
                                            <tbody>
                                            <?php $cor3="disabled";  ?>
                                            @foreach($copies as $copie)
                                                <?php

                                                    if (abs($copie->notePre1-$copie->notePre2)<=$ecart){
                                                            $cor3="";
                                                            $warning="";
                                                    }else{
                                                        $cor3="disabled"; $warning="color: red";
                                                    }
                                                    if ($copie->notePre3 >0){

                                                        $warning="";
                                                    }

                                                ?>
                                                <tr role="row" style="{{$warning}}" >
                                                    <td>{{$copie->codeCopie}}</td>
                                                    <td>{{$copie->notePre1}}</td>
                                                    <td>{{$copie->notePre2}}</td>
                                                    <td>{{$copie->notePre3}}</td>
                                                    <td>{{$copie->noteFinal}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody></table></div></div>


                            </div>
                        </div>
                    </div>
                    <?php

                        $cor1="";
                        $cor2="";
                        if(in_array(1,$correct)){
                            $cor1="disabled";
                        }
                        if(in_array(2,$correct)){
                            $cor2="disabled";
                        }

                    ?>
                    <table class="center" style="border-radius: 5px;width: 50%;margin: 0px auto;float: none;">
                        <tr>
                            <td>Correcteur 1</td>
                            <td>
                                <select class="form-control" id="selectEns1" >
                                    <option value="" disabled selected>Select your enseignant</option>
                                    @foreach($enseignants as $enseignant)
                                        <option value="{{$enseignant->id}}">{{$enseignant->name }}  {{$enseignant->prenom }}</option>
                                    @endforeach
                                </select>
                            </td>
                        <td>
                            <button class="btn btn-outline-primary" data-target="#AffecterModal1" data-toggle="modal" {{$cor1}}>envoyer</button>
                        </td>
                        </tr>
                        <tr>
                            <td>Correcteur 2</td>
                            <td>
                                <select class="form-control" id="selectEns2" placeholder="select">
                                    <option value="" disabled selected>Select your enseignant</option>
                                    @foreach($enseignants as $enseignant)
                                        <option value="{{$enseignant->id}}">{{$enseignant->name }}  {{$enseignant->prenom }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" data-target="#AffecterModal2" data-toggle="modal" {{$cor2}}>envoyer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Correcteur 3</td>
                            <td>
                                <select class="form-control" id="selectEns3" >
                                    <option value="" disabled selected>Select your enseignant</option>
                                    @foreach($enseignants as $enseignant)
                                        <option value="{{$enseignant->id}}">{{$enseignant->name }}  {{$enseignant->prenom }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" data-target="#AffecterModal3" data-toggle="modal" {{$cor3}}>envoyer</button>
                            </td>
                        </tr>

                    </table>


                </div>
            </div>
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="AffecterModal1" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Affecter les paquets
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form id="formAffecter1" method="POST" action="">
                            <div class="modal-body">
                                Voulez-vous vraiment affecter ce paquet ?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="affecterPaquet1"> Affecter</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="AffecterModal2" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Affecter les paquets
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form id="formAffecter2" method="POST" action="">
                            <div class="modal-body">
                                Voulez-vous vraiment affecter ce paquet ?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="affecterPaquet2"> Affecter</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div aria-labelledby="exampleModalLabel" class="modal fade" id="AffecterModal3" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Affecter les paquets
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
                        </div>
                        <form id="formAffecter3" method="POST" action="">
                            <div class="modal-body">
                                Voulez-vous vraiment affecter ce paquet ?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="affecterPaquet3"> Affecter</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!--------------------
              START - Chat Popup Box
              -------------------->

            <!--------------------
            END - Chat Popup Box
            -------------------->
            <input type="hidden" id="paquetId" value="{{$idPaquet}}">
        </div>
    </div>
    </div>
    </div>
    <div class="display-type"></div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/affectCorr.js')}}"></script>
@endsection
