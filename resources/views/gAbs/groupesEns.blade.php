@extends('layouts.master',['active'=>'mesModules'])
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
              <span>Promotions</span>
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
                    @foreach($groupesEns as $groupeEns)

                        <div class="col-sm-3 col-xxxl-3 block">
                          <div>
                            @if($groupeEns->tp == "1")
                            <button aria-label="Close" class="close supp" type="button" data-target="#suppModal" data-toggle="modal"><a href="{{$groupeEns->affId}}/TP">TP</a> </button>
                            @endif
                            @if($groupeEns->td == "1")
                            <button aria-label="Close" class="close edit" type="button" data-target="#editModal" data-toggle="modal" ><a href="{{$groupeEns->affId}}/TD">TD</a></button>
                            @endif
                          </div>
                          <a class="element-box el-tablo" href="" style="background-color: #e1e1e1;">
                            <div class="value" id="libelle">
                              {{$groupeEns->libelle}}
                            </div>
                          </a>
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