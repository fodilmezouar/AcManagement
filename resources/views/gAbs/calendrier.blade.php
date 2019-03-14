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
              <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="index.html">Products</a>
            </li>
            <li class="breadcrumb-item">
              <span>Laptop with retina screen</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Event Calendar
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Calendar powered by FullCalendar
                  </h5>
                  <div class="form-desc">
                    A JavaScript event calendar. Customizable and open source. Display a full-size drag-n-drop event calendar, leveraging jQuery. <a href="https://fullcalendar.io/" target="_blank">Learn More about FullCalendar</a>
                  </div>
                  <div class="row">

                   <div id='external-events' class="col-sm-3" style="margin-top:50px;">
  <p>
    <strong>Draggable Events</strong>
  </p>
  <input type="hidden" value="{{Auth::user()->id}}" id="idEns">
   @foreach($affectations as $affectation)
   @if($affectation->td == "1" || $affectation->tp == "1")
     @if($affectation->td == "1")
       <div class='fc-event' id="{{$affectation->id}}">{{$affectation->module->libelle}} {{$affectation->groupe->libelle}} td
        </div>
       @endif
        @if($affectation->tp == "1")
          <div class='fc-event' id="{{$affectation->id}}">{{$affectation->module->libelle}} {{$affectation->groupe->libelle}} tp
          </div>
        @endif

     @endif
        
   @endforeach
   <button id="valid">ok</button>
</div>
                  <div id="fullCalendar" class="col-sm-9"></div>
     </div>              
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection