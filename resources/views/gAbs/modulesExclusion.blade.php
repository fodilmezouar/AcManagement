@extends('layouts.master',['active'=>'Exclusion'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
              G - Absences
            </li>
            <li class="breadcrumb-item">
              G - Exclusion
            </li>
            <li class="breadcrumb-item">
              <span>Mes Modules</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  G - Exclusion
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Mes Modules
                  </h5>
                  <div class="form-desc">
                  </div>
                  <!-- promotions -->
                  <div class="row" id="contentPromos">
                    @foreach($modules as $module)

                        <div class="col-sm-3 col-xxxl-3 block">
                          <a class="element-box el-tablo" href="etudiants/{{$module->id}}" style="background-color: #e1e1e1;">
                            <div class="value" id="libelle">
                              {{$module->libelle}}
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
@endsection