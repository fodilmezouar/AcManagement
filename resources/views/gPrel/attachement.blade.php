@extends('layouts.master',['active'=>'Promotions'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
     <input type="hidden" id="ensIdInput">
     <input type="hidden" id="moduleId" value="{{$idModule}}">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{url('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
               G - Préliminaire
            </li>
            <li class="breadcrumb-item">
                <a href="{{url('promotions/'.$promoId)}}">{{$promoName}}</a>
            </li>
            <li class="breadcrumb-item">
              <span>{{$moduleName}}</span>
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
                  <div class="row" id="contentPromos">
                      <!-- table etudiants -->
                       <div class="table-responsive">
                    <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12"><table id="dataTable1" width="100%" class="table table-striped dataTable" role="grid" aria-describedby="dataTable1_info" style="width: 75%;margin:auto; "><thead><tr role="row"><th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 75%;">Enseignant</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 25%;">Action</th></tr></thead><tfoot><tr><th rowspan="1" colspan="1">Enseignant</th><th rowspan="1" colspan="1">Action</th></tr></tfoot>
                      <tbody>
                        @foreach($enseignants as $enseignant)
                           <tr role="row">
                               <td>
                                   <div class="users-list-w">
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="{{asset('/uploads/photo/'.$enseignant->photo)}}">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                           {{$enseignant->name}} {{$enseignant->prenom}}
                        </h6>
                        <div class="user-role">
                          {{$enseignant->grade}}
                        </div>
                      </div>
                    </div>
                  </div>
                               </td>
                       <td>
                                <a class="user-action attaAction" href="" data-target="#attModal" data-toggle="modal" role="{{$enseignant->id}}">
                        <div class="os-icon os-icon-email-forward"></div>
                      </a></td>
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
      <!-- modal supp groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="attModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Attachement Module
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
       <form id="formModuleAtt" method="POST" action="">
          <div class="modal-body">
              Voulez vous affecter cet enseignant au module {{$moduleName}}
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="attModule"> Valider</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- fin supp groupe -->
    </div>
@endsection
@section('scripts')
   <script src="{{asset('js/attachement.js')}}"></script>
@endsection