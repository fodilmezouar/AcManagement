@extends('layouts.master',['active'=>'Promotions'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
              <span>Configuration</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Configuration
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Configuration
                  </h5>
                  <div class="form-desc">
                   <div id="remove-messages-promo"></div>
                  </div>

                  <!-- promotions -->
                  @if(stristr(Auth::user()->role,'4'))
                  <div class="row" id="contentPromos">
                     <div class="col-md-6" style="border-right:  1px solid rgba(0, 0, 0, 0.05);">
                         <label>Filiere</label>
                     </div>
                     <div class="col-md-5" id="filiereContent">
                       {{$filiere->libelle}}
                     </div> 
                     <div class="icon-w col-md-1" id="changeFiliere" style="font-size: 1rem;">
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                   </div>
                   <br>
                   @endif
                   
                   <div class="row">
                    <div class="col-md-6">
                         <label>Mode Sombre</label>
                    </div>
                    <div class="col-md-6">
                         <input type="checkbox" id="sombre"  data-toggle="toggle" data-width="100">
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
   <script src="{{asset('js/config.js')}}"></script>
@endsection