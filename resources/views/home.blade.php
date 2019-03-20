@extends('layouts.master',['active'=>'home'])
@section('content')
<!--------------------
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
          <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <div class="element-actions">
                      <form class="form-inline justify-content-sm-end">
                        <select type="submit" class="form-control form-control-sm rounded" id="promoId">
                          @foreach($promos as $promo)
                             <option>{{$promo->libelle}}</option>
                          @endforeach
                        </select>
                      </form>
                    </div>
                    <h6 class="element-header">
                      Absences
                    </h6>
                    <div class="element-content">
                      <div class="row">
                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Today
                            </div>
                            <div class="value">
                              {{$promosCourant->absencesToday(request('grpId'))}}
                            </div>
                            <div class="trending trending-up-basic">
                            </div>
                          </a>
                        </div>
                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Absences Week
                            </div>
                            <div class="value">
                             {{$promosCourant->absencesWeek(request('grpId'))}}
                            </div>
                            <div class="trending trending-down-basic">
                            </div>
                          </a>
                        </div>
                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Absences Month
                            </div>
                            <div class="value">
                              {{$promosCourant->absencesMonth(request('grpId'))}}
                            </div>
                            <div class="trending trending-down-basic">
                            </div>
                          </a>
                        </div>
                        <div class="d-none d-xxxl-block col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Refunds Processed
                            </div>
                            <div class="value">
                              $294
                            </div>
                            <div class="trending trending-up-basic">
                              <span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8 col-xxl-8">
                  <!--START - Questions per Product-->
                  <div class="element-wrapper">
                    <h6 class="element-header">
                    	@if(request('filter') == 'today')
                    	    Absences TP,TD Today
                    	@elseif(request('filter') == 'week')
                    	    Absences TP,TD Week
                    	@else
                    	   Absences TP,TD Month
                    	@endif 
                    </h6>
                    <div class="element-box">
                      <div class="os-progress-bar primary">
                        <div class="bar-labels">
                          <div class="bar-label-left">
                            <span class="bigger">TP</span>
                          </div>
                          <div class="bar-label-right">
                            <span class="info">
                           @if(request('filter') == 'today')
                    	    {{$promosCourant->absencesParTpToday(request('grpId'))}} / {{$promosCourant->absencesToday(request('grpId'))}} Abs
                    	@elseif(request('filter') == 'week')
                    	    {{$promosCourant->absencesParTpWeek(request('grpId'))}} / {{$promosCourant->absencesweek(request('grpId'))}} Abs
                    	@else
                    	   {{$promosCourant->absencesParTpMonth(request('grpId'))}} / {{$promosCourant->absencesMonth(request('grpId'))}} Abs
                    	@endif 
                    	</span>

                          </div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                          <div class="bar-level-2" style="width: 100%">
                          	@if(request('filter') == 'today')
                          	  @if($promosCourant->absencesToday(request('grpId')) == "0")
                          	  <div class="bar-level-3" style="width:0"></div>
                          	  @else
                    	    <div class="bar-level-3" style="width: {{($promosCourant->absencesParTpToday(request('grpId'))/$promosCourant->absencesToday(request('grpId'))) * 100}}%"></div>
                    	    @endif

                    	@elseif(request('filter') == 'week')
                    	@if($promosCourant->absencesweek(request('grpId')) == "0")
                    	<div class="bar-level-3" style="width:0"></div>
                    	@else
                    	    <div class="bar-level-3" style="width: {{($promosCourant->absencesParTpWeek(request('grpId'))/$promosCourant->absencesWeek(request('grpId'))) * 100}}%"></div>
                    	@endif
                    	@else
                    	@if($promosCourant->absencesMonth(request('grpId')) == "0")
                    	<div class="bar-level-3" style="width:0"></div>
                    	@else
                    	   <div class="bar-level-3" style="width: {{($promosCourant->absencesParTpMonth(request('grpId'))/$promosCourant->absencesMonth(request('grpId'))) * 100}}%"></div>
                    	 @endif
                    	@endif 
                          </div>
                        </div>
                      </div>

                      <div class="os-progress-bar primary">
                        <div class="bar-labels">
                          <div class="bar-label-left">
                            <span class="bigger">TD</span>
                          </div>
                          <div class="bar-label-right">
                            <span class="info">
                            	@if(request('filter') == 'today')
                    	    {{$promosCourant->absencesParTdToday(request('grpId'))}} / {{$promosCourant->absencesToday(request('grpId'))}} Abs
                    	@elseif(request('filter') == 'week')
                    	    {{$promosCourant->absencesParTdWeek(request('grpId'))}} / {{$promosCourant->absencesweek(request('grpId'))}} Abs
                    	@else
                    	   {{$promosCourant->absencesParTdMonth(request('grpId'))}} / {{$promosCourant->absencesMonth(request('grpId'))}} Abs
                    	@endif 
                            </span>
                          </div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                          <div class="bar-level-2" style="width: 100%">
                            @if(request('filter') == 'today')
                    	    @if($promosCourant->absencesToday(request('grpId')) == "0")
                          	  <div class="bar-level-3" style="width:0"></div>
                          	  @else
                    	    <div class="bar-level-3" style="width: {{($promosCourant->absencesParTdToday(request('grpId'))/$promosCourant->absencesToday(request('grpId'))) * 100}}%"></div>
                    	    @endif
                    	@elseif(request('filter') == 'week')
                    	@if($promosCourant->absencesweek(request('grpId')) == "0")
                          	  <div class="bar-level-3" style="width:0"></div>
                          	  @else
                    	    <div class="bar-level-3" style="width: {{($promosCourant->absencesParTdWeek(request('grpId'))/$promosCourant->absencesWeek(request('grpId'))) * 100}}%"></div>
                    	    @endif
                    	@else
                    	@if($promosCourant->absencesMonth(request('grpId')) == "0")
                          	  <div class="bar-level-3" style="width:0"></div>
                          	  @else
                    	   <div class="bar-level-3" style="width: {{($promosCourant->absencesParTdMonth(request('grpId'))/$promosCourant->absencesMonth(request('grpId'))) * 100}}%"></div>
                    	   @endif
                    	@endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <h6 class="element-header">
                      Absences par module @if(request('filter') == 'today')
                    	    Today
                    	@elseif(request('filter') == 'week')
                    	    Week
                    	@else
                    	   Month
                    	@endif 
                    </h6>
                    <div class="element-box">
                    @foreach($promosCourant->modules() as $module)
                      <div class="os-progress-bar primary">
                        <div class="bar-labels">
                          <div class="bar-label-left">
                            <span class="bigger">{{$module->libelle}}</span>
                          </div>
                          <div class="bar-label-right">
                            <span class="info">
                        @if(request('filter') == 'today')
                    	    {{$module->absencesParToday(request('grpId'))}} / {{$module->absencesParToday(null)}} Abs
                    	@elseif(request('filter') == 'week')
                    	    {{$module->absencesParWeek(request('grpId'))}} / {{$module->absencesParWeek(null)}} Abs
                    	@else
                    	   {{$module->absencesParMonth(request('grpId'))}} / {{$module->absencesParMonth(null)}} Abs
                    	@endif 
                    	</span>
                          </div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                          <div class="bar-level-2" style="width: 100%">
                          	 @if(request('filter') == 'today')
                          	 @if($module->absencesParToday(null) == "0")
                          	 <div class="bar-level-3" style="width:0%"></div>
                          	 @else
                          	 <div class="bar-level-3" style="width: {{($module->absencesParToday(request('grpId'))/$module->absencesParToday(null)) * 100}}%"></div>
                          	 @endif
                    	    
                    	@elseif(request('filter') == 'week')
                    	@if($module->absencesParWeek(null) == "0")
                          	 <div class="bar-level-3" style="width:0%"></div>
                          	 @else
                    	    <div class="bar-level-3" style="width: {{($module->absencesParWeek(request('grpId'))/$module->absencesParWeek(null)) * 100}}%"></div>
                    	    @endif
                    	@else
                    	@if($module->absencesParMonth(null) == "0")
                          	 <div class="bar-level-3" style="width:0%"></div>
                          	 @else
                    	   <div class="bar-level-3" style="width: {{($module->absencesParMonth(request('grpId'))/$module->absencesParMonth(null)) * 100}}%"></div>
                    	   @endif
                    	@endif 
                            
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <!--END - Questions per product-->
                </div>
                <div class="col-sm-4 d-xxxl-none">
                  <!--START - Top Selling Chart-->
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Absences par Groupes 
                    </h6>
                    <div class="element-box">
                      <div class="el-chart-w">
                        <canvas height="120" id="donutChart" width="120"></canvas>
                        <div class="inside-donut-chart-label">
                          <strong>
                        @if(request('filter') == 'today')
                    	    {{$promosCourant->absencesToday(null)}}
                    	@elseif(request('filter') == 'week')
                    	    {{$promosCourant->absencesweek(null)}}
                    	@else
                    	   {{$promosCourant->absencesMonth(null)}}
                    	@endif
                      </strong><span>Total Absences
                         @if(request('filter') == 'today')
                    	    Today
                    	@elseif(request('filter') == 'week')
                    	    Week
                    	@else
                    	   Month
                    	@endif 
                          </span>
                        </div>
                      </div>
                      <div class="el-legend condensed">
                        <div class="row">
                        	@foreach($promosCourant->groupes() as $elt)
                            <div class="legend-value-w col-sm-6">
                              <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                              <div class="legend-value">
                                <span class="dataLbls">Grp {{$elt->libelle}}</span>
                                <div class="legend-sub-value">
                                  <span class="dataAbs">{{$elt->absences(request('filter'))}}</span>
                                </div>
                              </div>
                            </div>
                            @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END - Top Selling Chart-->
                </div>
                <div class="d-none d-xxxl-block col-xxxl-6">
                  <!--START - Questions per Product-->
                  <div class="element-wrapper">
                    <div class="element-actions">
                      <form class="form-inline justify-content-sm-end">
                        <select class="form-control form-control-sm rounded">
                          <option value="Pending">
                            Today
                          </option>
                          <option value="Active">
                            Last Week 
                          </option>
                          <option value="Cancelled">
                            Last 30 Days
                          </option>
                        </select>
                      </form>
                    </div>
                    <h6 class="element-header">
                      Inventory Stats
                    </h6>
                    <div class="element-box">
                      <div class="os-progress-bar primary">
                        <div class="bar-labels">
                          <div class="bar-label-left">
                            <span class="bigger">Eyeglasses</span>
                          </div>
                          <div class="bar-label-right">
                            <span class="info">25 items / 10 remaining</span>
                          </div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                          <div class="bar-level-2" style="width: 70%">
                            <div class="bar-level-3" style="width: 40%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="os-progress-bar primary">
                        <div class="bar-labels">
                          <div class="bar-label-left">
                            <span class="bigger">Outwear</span>
                          </div>
                          <div class="bar-label-right">
                            <span class="info">18 items / 7 remaining</span>
                          </div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                          <div class="bar-level-2" style="width: 40%">
                            <div class="bar-level-3" style="width: 20%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="os-progress-bar primary">
                        <div class="bar-labels">
                          <div class="bar-label-left">
                            <span class="bigger">Shoes</span>
                          </div>
                          <div class="bar-label-right">
                            <span class="info">15 items / 12 remaining</span>
                          </div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                          <div class="bar-level-2" style="width: 60%">
                            <div class="bar-level-3" style="width: 30%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="os-progress-bar primary">
                        <div class="bar-labels">
                          <div class="bar-label-left">
                            <span class="bigger">Jeans</span>
                          </div>
                          <div class="bar-label-right">
                            <span class="info">12 items / 4 remaining</span>
                          </div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                          <div class="bar-level-2" style="width: 30%">
                            <div class="bar-level-3" style="width: 10%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mt-4 border-top pt-3">
                        <div class="element-actions d-none d-sm-block">
                          <form class="form-inline justify-content-sm-end">
                            <select class="form-control form-control-sm form-control-faded">
                              <option selected="true">
                                Last 30 days
                              </option>
                              <option>
                                This Week
                              </option>
                              <option>
                                This Month
                              </option>
                              <option>
                                Today
                              </option>
                            </select>
                          </form>
                        </div>
                        <h6 class="element-box-header">
                          Inventory History
                        </h6>
                        <div class="el-chart-w">
                          <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46,38,32,45" height="50" id="liteLineChartV3" width="300"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END - Questions per product                  -->
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-xxxl-9">
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Taux Absentéisme
                    </h6>
                    <div class="element-box">
                      <div class="os-tabs-w">
                        <div class="os-tabs-controls">
                          <ul class="nav nav-tabs smaller">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                            </li>
                          </ul>
                          <!--
                          <ul class="nav nav-pills smaller d-none d-md-flex">
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#">Today</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                            </li>
                          </ul>
                      -->
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_overview">
                            <div class="el-tablo bigger">
                              <div class="label">
                                Taux Absentéisme
                              </div>
                              <div class="value">
                                12,537
                              </div>
                            </div>
                         <input type="hidden" id="grpId" value="{{request('grpId')}}">
                            <div class="el-chart-w">
                              <canvas height="150px" id="lineChart" width="600px"></canvas>
                            </div>
                          </div>
                          <div class="tab-pane" id="tab_sales"></div>
                          <div class="tab-pane" id="tab_conversion"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-none d-xxxl-block col-xxxl-3">
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Visitors by Browser
                    </h6>
                    <div class="element-box less-padding">
                      <div class="el-chart-w">
                        <canvas height="120" id="donutChart1" width="120"></canvas>
                        <div class="inside-donut-chart-label">
                          <strong>1,248</strong><span>Visitors</span>
                        </div>
                      </div>
                      <div class="el-legend condensed">
                        <div class="row">
                          <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                            <div class="legend-value-w">
                              <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                              <div class="legend-value">
                                <span>Safari</span>
                                <div class="legend-sub-value">
                                  17%, 12 Visits
                                </div>
                              </div>
                            </div>
                            <div class="legend-value-w">
                              <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                              <div class="legend-value">
                                <span>Chrome</span>
                                <div class="legend-sub-value">
                                  22%, 763 Visits
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 d-none d-xxxxl-block">
                            <div class="legend-value-w">
                              <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                              <div class="legend-value">
                                <span>Firefox</span>
                                <div class="legend-sub-value">
                                  3%, 7 Visits
                                </div>
                              </div>
                            </div>
                            <div class="legend-value-w">
                              <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                              <div class="legend-value">
                                <span>Explorer</span>
                                <div class="legend-sub-value">
                                  15%, 45 Visits
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
              <div class="row">
                <div class="col-sm-12 col-xxxl-9">
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Taux Absentéisme
                    </h6>
                    <div class="element-box">
                      <div class="os-tabs-w">
                        <div class="os-tabs-controls">
                          <ul class="nav nav-tabs smaller">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                            </li>
                          </ul>
                          <!--
                          <ul class="nav nav-pills smaller d-none d-md-flex">
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#">Today</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                            </li>
                          </ul>
                      -->
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_overview">
                            <div class="el-tablo bigger">
                              <div class="label">
                                Taux Absentéisme
                              </div>
                              <div class="value">
                                12,537
                              </div>
                            </div>
                            <div class="el-chart-w">
                              <canvas height="150px" id="lineChartMe" width="600px"></canvas>
                            </div>
                          </div>
                          <div class="tab-pane" id="tab_sales"></div>
                          <div class="tab-pane" id="tab_conversion"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!--------------------
              START - Color Scheme Toggler
              -------------------->
              <div class="floated-colors-btn second-floated-btn">
                <div class="os-toggler-w">
                  <div class="os-toggler-i">
                    <div class="os-toggler-pill"></div>
                  </div>
                </div>
                <span>Dark </span><span>Colors</span>
              </div>
              <!--------------------
              END - Color Scheme Toggler
              --------------------><!--------------------
              START - Demo Customizer
              -------------------->
              <div class="floated-customizer-btn third-floated-btn">
                <div class="icon-w">
                  <i class="os-icon os-icon-ui-46"></i>
                </div>
                <span>Customizer</span>
              </div>
              <div class="floated-customizer-panel">
                <div class="fcp-content">
                  <div class="close-customizer-btn">
                    <i class="os-icon os-icon-x"></i>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Menu Settings
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Menu Position</label><select class="menu-position-selector">
                          <option value="left">
                            Left
                          </option>
                          <option value="right">
                            Right
                          </option>
                          <option value="top">
                            Top
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Menu Style</label><select class="menu-layout-selector">
                          <option value="compact">
                            Compact
                          </option>
                          <option value="full">
                            Full
                          </option>
                          <option value="mini">
                            Mini
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field with-image-selector-w">
                        <label for="">With Image</label><select class="with-image-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Menu Color</label>
                        <div class="fcp-colors menu-color-selector">
                          <div class="color-selector menu-color-selector color-bright selected"></div>
                          <div class="color-selector menu-color-selector color-dark"></div>
                          <div class="color-selector menu-color-selector color-light"></div>
                          <div class="color-selector menu-color-selector color-transparent"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Sub Menu
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                          <option value="flyout">
                            Flyout
                          </option>
                          <option value="inside">
                            Inside/Click
                          </option>
                          <option value="over">
                            Over
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Sub Menu Color</label>
                        <div class="fcp-colors">
                          <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                          <div class="color-selector sub-menu-color-selector color-dark"></div>
                          <div class="color-selector sub-menu-color-selector color-light"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Other Settings
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Full Screen?</label><select class="full-screen-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Top Bar Color</label>
                        <div class="fcp-colors">
                          <div class="color-selector top-bar-color-selector color-bright selected"></div>
                          <div class="color-selector top-bar-color-selector color-dark"></div>
                          <div class="color-selector top-bar-color-selector color-light"></div>
                          <div class="color-selector top-bar-color-selector color-transparent"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Demo Customizer
              --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn">
                <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
              </div>
              <div class="floated-chat-w">
                <div class="floated-chat-i">
                  <div class="chat-close">
                    <i class="os-icon os-icon-close"></i>
                  </div>
                  <div class="chat-head">
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar1.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          John Mayers
                        </h6>
                        <div class="user-role">
                          Account Manager
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="chat-messages">
                    <div class="message">
                      <div class="message-content">
                        Hi, how can I help you?
                      </div>
                    </div>
                    <div class="date-break">
                      Mon 10:20am
                    </div>
                    <div class="message">
                      <div class="message-content">
                        Hi, my name is Mike, I will be happy to assist you
                      </div>
                    </div>
                    <div class="message self">
                      <div class="message-content">
                        Hi, I tried ordering this product and it keeps showing me error code.
                      </div>
                    </div>
                  </div>
                  <div class="chat-controls">
                    <input class="message-input" placeholder="Type your message here..." type="text">
                    <div class="chat-extra">
                      <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Chat Popup Box
              -------------------->
            </div>
            <!--------------------
            START - Sidebar
            -------------------->
            <div class="content-panel">
              <div class="content-panel-close">
                <i class="os-icon os-icon-close"></i>
              </div>
              <div class="element-wrapper">
                <h6 class="element-header">
                  Filtrer Par Promotion
                </h6>
                <div class="element-box-tp">
                  <div class="el-buttons-list full-width">
                  	@foreach($promos as $promo)
                    <a style="background-color:{{ $promo->id == $promosCourant->id  ? '#eee' :' ' }}" class="btn btn-white btn-sm" href="{{ route('home',['filter'=>request('filter'),'grpId'=>request('filter'),'promoId'=>$promo->id])}}"><i class="os-icon os-icon-delivery-box-2"></i><span>{{$promo->libelle}}</span></a>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="element-wrapper">
                <h6 class="element-header">
                  Filtrer Par Date
                </h6>
                <div class="element-box-tp">
                  <div class="el-buttons-list full-width">
                    <a style="background-color:{{request('filter') == 'today' ? '#eee' :''}}" class="btn btn-white btn-sm" href="{{ route('home',['filter'=>'today','grpId'=>request('grpId')])}}"><i class="os-icon os-icon-delivery-box-2"></i><span>Today</span></a><a style="background-color:{{request('filter') == 'week' ? '#eee' :''}}" class="btn btn-white btn-sm" href="{{ route('home',['filter'=>'week','grpId'=>request('grpId')])}}"><i class="os-icon os-icon-window-content"></i><span>Week</span></a><a class="btn btn-white btn-sm" href="{{ route('home',['grpId'=>request('grpId')])}}" style="background-color:{{request('filter') == null ? '#eee' :''}}"><i class="os-icon os-icon-wallet-loaded"></i><span>Month</span></a>
                  </div>
                </div>
              </div>
              <div class="element-wrapper">
                <h6 class="element-header">
                  Filtrer Par Groupe
                </h6>
                <div class="element-box-tp">
                  <div class="el-buttons-list full-width">
                  	<a style="background-color:{{request('grpId') == null ? '#eee' :''}}" class="btn btn-white btn-sm" href="{{ route('home',['filter'=>request('filter')])}}"><i class="os-icon os-icon-delivery-box-2"></i><span>All Promo</span></a>
                  	@foreach($promosCourant->groupes() as $groupe)
                    <a style="background-color:{{request('grpId') == $groupe->id ? '#eee' :''}}" class="btn btn-white btn-sm" href="{{ route('home',['filter'=>request('filter'),'grpId'=>$groupe->id])}}"><i class="os-icon os-icon-delivery-box-2"></i><span>{{$groupe->libelle}}</span></a>
                    @endforeach
                  </div>
                </div>
              </div>
              
              <!--------------------
              START - Support Agents
              -------------------->
              <div class="element-wrapper">
                <h6 class="element-header">
                  Administrateurs
                </h6>
                <div class="element-box-tp">
                	@foreach($admins as $admin)
                  <div class="profile-tile">
                    <a class="profile-tile-box" href="users_profile_small.html">
                      <div class="pt-avatar-w">
                        <img alt="" src="{{asset('/uploads/photo/'.$admin->photo)}}">
                      </div>
                      <div class="pt-user-name">
                        Admin
                      </div>
                    </a>
                    <div class="profile-tile-meta">
                      <ul>
                        <li>
                          Nom:<strong>{{$admin->name}}</strong>
                        </li>
                        <li>
                          Prenom:<strong>{{$admin->prenom}}</strong>
                        </li>
                      </ul>
                      <div class="pt-btn">
                        <a class="btn btn-secondary btn-sm" href="apps_full_chat.html">Send Message</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <!--------------------
              END - Support Agents
              --------------------><!--------------------
              START - Recent Activity
              -------------------->
              <div class="element-wrapper">
                <h6 class="element-header">
                  Recent Activity
                </h6>
                <div class="element-box-tp">
                  <div class="activity-boxes-w">
                    <div class="activity-box-w">
                      <div class="activity-time">
                        10 Min
                      </div>
                      <div class="activity-box">
                        <div class="activity-avatar">
                          <img alt="" src="img/avatar1.jpg">
                        </div>
                        <div class="activity-info">
                          <div class="activity-role">
                            John Mayers
                          </div>
                          <strong class="activity-title">Opened New Account</strong>
                        </div>
                      </div>
                    </div>
                    <div class="activity-box-w">
                      <div class="activity-time">
                        2 Hours
                      </div>
                      <div class="activity-box">
                        <div class="activity-avatar">
                          <img alt="" src="img/avatar2.jpg">
                        </div>
                        <div class="activity-info">
                          <div class="activity-role">
                            Ben Gossman
                          </div>
                          <strong class="activity-title">Posted Comment</strong>
                        </div>
                      </div>
                    </div>
                    <div class="activity-box-w">
                      <div class="activity-time">
                        5 Hours
                      </div>
                      <div class="activity-box">
                        <div class="activity-avatar">
                          <img alt="" src="img/avatar3.jpg">
                        </div>
                        <div class="activity-info">
                          <div class="activity-role">
                            Phil Nokorin
                          </div>
                          <strong class="activity-title">Opened New Account</strong>
                        </div>
                      </div>
                    </div>
                    <div class="activity-box-w">
                      <div class="activity-time">
                        2 Days
                      </div>
                      <div class="activity-box">
                        <div class="activity-avatar">
                          <img alt="" src="img/avatar4.jpg">
                        </div>
                        <div class="activity-info">
                          <div class="activity-role">
                            Jenny Miksa
                          </div>
                          <strong class="activity-title">Uploaded Image</strong>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Recent Activity
              --------------------><!--------------------
              START - Team Members
              -------------------->
              <div class="element-wrapper">
                <h6 class="element-header">
                  Team Members
                </h6>
                <div class="element-box-tp">
                  <div class="input-search-w">
                    <input class="form-control rounded bright" placeholder="Search team members..." type="search">
                  </div>
                  <div class="users-list-w">
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar1.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          John Mayers
                        </h6>
                        <div class="user-role">
                          Account Manager
                        </div>
                      </div>
                      <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                      </a>
                    </div>
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar2.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          Ben Gossman
                        </h6>
                        <div class="user-role">
                          Administrator
                        </div>
                      </div>
                      <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                      </a>
                    </div>
                    <div class="user-w with-status status-red">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar3.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          Phil Nokorin
                        </h6>
                        <div class="user-role">
                          HR Manger
                        </div>
                      </div>
                      <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                      </a>
                    </div>
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar4.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          Jenny Miksa
                        </h6>
                        <div class="user-role">
                          Lead Developer
                        </div>
                      </div>
                      <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Team Members
              -------------------->
            </div>
            <!--------------------
            END - Sidebar
            -------------------->
            <input type="hidden" id="promosId" value="{{$promosCourant->id}}">
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
    @endsection