@extends('layouts.master',['active'=>'Calendrier'])
   <!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
   <input type="hidden" id="ensId" value="{{Auth::user()->id}}">
<div class="content-w"><!--------------------
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
              G - Absences
            </li>
            <li class="breadcrumb-item">
              <span>Calendrier</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Mon Emploi Du temps
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Gérer Mes séances
                  </h5>
                  <div id="success-mess"></div>
                  <div class="form-desc">
                    Drag And Drop les affectations que vous correspond
                  </div>
                  <div class="row">
                  @if($existEncore)
                   <div id='external-events' class="col-sm-3" style="margin-top:50px;">
  <h6 class="element-header">Mes Affectations
  </h6>
  <input type="hidden" value="{{Auth::user()->id}}" id="idEns">
  <div id="eventsAffect">
   @foreach($affectations as $affectation)
   @if($affectation->td == "1" || $affectation->tp == "1")
     @if($affectation->td == "1")
       <div class='fc-event' id="{{$affectation->id}}" style="margin-bottom: 5px; padding: 10px;">{{$affectation->module->libelle}} {{$affectation->groupe->libelle}} td
        </div>
       @endif
        @if($affectation->tp == "1")
          <div class='fc-event' id="{{$affectation->id}}" style="margin-bottom: 5px;padding: 10px;cursor:pointer;">{{$affectation->module->libelle}} {{$affectation->groupe->libelle}} tp
          </div>
        @endif

     @endif
        
   @endforeach
   </div>
    <!-- fin supp groupe -->
</div>
@endif

                  <div id="fullCalendar" class="{{$existEncore ? 'col-sm-9' : 'col-sm-12'}}"></div>
                  <div class="floated-chat-btn" data-target="#emploiModal" data-toggle="modal" >
                <i class="icon-feather-arrow-up-right"></i>
              </div>
              <!-- modal supp groupe-->
    <div aria-labelledby="exampleModalLabel" class="modal fade" id="emploiModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Valider Calendrier
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
          </div>
          <div class="modal-body">
              Vous Optez pour cet emploi du temps ?
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Fermer</button><button class="btn btn-primary" type="submit" id="valid"> Valider</button>
          </div>
        </div>
      </div>
    </div>
     </div>              
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection