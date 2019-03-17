@extends('layouts.master',['active'=>isset($justifier) ? 'Justificatif' :'mesModules'])   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
              @if(isset($justifier))
                <a href="/mesModules/justifier/{{Auth::user()->id}}">Modules</a>
              @else
              <a href="/mesModules/{{Auth::user()->id}}">Modules</a>
              @endif
            </li>
            <li class="breadcrumb-item">
              {{$nomMod}}
            </li>
            <li class="breadcrumb-item">
              <span>groupes</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Groupes
                </h6>
                <div class="element-box pipeline white lined-primary">
                  <h5 class="form-header">
                     Groupes
                  </h5>
                  <div class="form-desc">
                  </div>
                  <!-- promotions -->
                  <div class="pipeline-body row" id="contentPromos">
                    <!-- pipeline -->

                    @foreach($groupesEns as $groupeEns)
                    <div class="col-sm-4">
                     <div class="pipeline-item">
                          <div class="pi-body">
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                {{$groupeEns->libelle}}
                              </div>
                              <div class="pi-sub">
                                <br>
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              @if($groupeEns->tp == "1")
                                <a class="tag" href="{{$groupeEns->affId}}/TP">Liste TP</a>
                              @endif
                              @if($groupeEns->td == "1")
                                <a class="tag" href="{{$groupeEns->affId}}/TD">Liste TD</a>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                       @endforeach
                   </div>
                   <!-- promotions -->
                </div>
              </div><!--------------------
              START - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn" data-target="#exampleModal1" data-toggle="modal">
                <i class="os-icon os-icon-plus"></i>
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
   <script src="{{asset('js/promotions.js')}}"></script>
@endsection