@extends('layouts.master',['active'=>'Exclusion'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')

          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{url('/home')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
               G - Absences
            </li>
            <li class="breadcrumb-item">
              G - Exclusion
            </li>
            <li class="breadcrumb-item">
                <a href="/exclusion/{{Auth::user()->id}}">{{$module->libelle}}</a>
            </li>
            <li class="breadcrumb-item">
              <span>Liste - Exclusion</span>
            </li>
          </ul>

          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  {{$module->libelle}}
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Liste Des Exclusions
                  </h5>
                  <div class="form-desc">
                  </div>
                  <!-- promotions -->
                  <div class="row" id="contentPromos">
                      <!-- table etudiants -->
                       <div class="table-responsive">
                    <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12"><table id="dataTable1" width="100%" class="table table-striped dataTable" role="grid" aria-describedby="dataTable1_info" style="width: 100%;margin:auto; "><thead><tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:30%;">Nom</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:15%;">TD</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:15%;">TP</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:20%;">Absences TD</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:20%;">Absences TP</th>
                      </tr></thead>
                      
                      <tfoot><tr>
                          <th rowspan="1" colspan="1">Nom</th>
                          <th rowspan="1" colspan="1">TD</th>
                          <th rowspan="1" colspan="1">TP</th>
                          <th rowspan="1" colspan="1">Absence TD</th>
                          <th rowspan="1" colspan="1">Absence TP</th>
                            </tr>
                      </tfoot>

                      <tbody>
                        @foreach($etudiantsExclus as $etd)
                          <tr role="row" class="block" id="{{$etd->id}}">
                               <td>
                                   {{$etd->nom}} {{$etd->prenom}}
                               </td>
                               <td>
                                @if($etd->isExcluType($etd->id,$module->id,"TD"))
                                    <i class="fa fa-check"></i>
                                @else
                                     <i class="fa fa-times"></i>
                                @endif
                               </td>
                               <td>
                                 @if($etd->isExcluType($etd->id,$module->id,"TP"))
                                    <i class="fa fa-check"></i>
                                @else
                                     <i class="fa fa-times"></i>
                                @endif
                               </td>
                               <td>
                                {{$etd->nbrAbsences($etd->id,$module->id,"TD")}}
                               </td>
                               <td>
                                {{$etd->nbrAbsences($etd->id,$module->id,"TP")}}
                               </td>
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
              <div class="floated-chat-btn" data-target="#validerListe" data-toggle="modal" id="zombro">
                <i class="icon-feather-download"></i>
              </div> 
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
   <script src="{{asset('js/exclusion.js')}}"></script>
@endsection