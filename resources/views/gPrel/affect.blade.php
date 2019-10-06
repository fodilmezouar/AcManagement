@extends('layouts.master',['active'=>'Affectation'])
<!--------------------
          START - Breadcrumbs
          -------------------->
@section('content')
  <input type="hidden" value="{{$module->id}}" id="moduleId"/>
          <div class="content-i">
            <div class="content-box">
              <div class="pipeline white lined-primary">
                      <div class="pipeline-header">
                        <h5 class="pipeline-name">
                          Affectation Groupes
                        </h5>
                        <div class="pipeline-header-numbers">
                        </div>
                        <div class="pipeline-settings os-dropdown-trigger">
                          <i class="os-icon os-icon-hamburger-menu-1"></i>
                        </div>
                      </div>
                    <br>

              <div class="pipelines-w">
                <div class="row" id="containerGroupes">

                  <div class="col-lg-3 col-xxl-3">
                    <!--------------------
                    START - Pipeline
                    -------------------->
                    <div class="pipeline white lined-primary">
                      <div class="pipeline-header">
                        <h5 class="pipeline-name">
                          Enseignants
                        </h5>
                        <div class="pipeline-settings os-dropdown-trigger">
                          <i class="os-icon os-icon-hamburger-menu-1"></i>
                          <div class="os-dropdown">
                            <div class="icon-w">
                              <i class="os-icon os-icon-ui-46"></i>
                            </div>
                            <ul>
                              <li>
                                <a href="#"><i class="os-icon os-icon-ui-49"></i><span>Edit Record</span></a>
                              </li>
                              <li>
                                <a href="#"><i class="os-icon os-icon-grid-10"></i><span>Duplicate Item</span></a>
                              </li>
                              <li>
                                <a href="#"><i class="os-icon os-icon-ui-15"></i><span>Remove Item</span></a>
                              </li>
                              <li>
                                <a href="#"><i class="os-icon os-icon-ui-44"></i><span>Archive Project</span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      
                      <div class="pipeline-body">
                         <div class="input-search-w">
                    <input class="form-control rounded bright" placeholder="Search team members..." type="search" id="searchEns">
                  </div>
                  <br>
                     <?php $i = 0;  ?>
                        @foreach($assistants as $assistant)
                        <?php
                         $i++; 
                         $affich = "";
                         if($i == 4)
                           $affich = "display:none;";
                        ?>

                        <div class="pipeline-item copiable searchable" style="{{$affich}}" id="{{$assistant->id}}" role="{{$assistant->name.' '.$assistant->prenom}}">
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="{{asset('/uploads/photo/'.$assistant->photo)}}">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                {{$assistant->name}} {{$assistant->prenom}}
                              </div>
                              <div class="pi-sub">
                                Enseignant
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                                <span class="tag TD">TD</span> <input type="checkbox" role="TD" class="inp"/> <span class="tag TP">TP</span> <input class="inp" role="TP" type="checkbox"/>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    <!--------------------
                    END - Pipeline
                    -------------------->
                  </div>
                  <div class="col-lg-1 col-xxl-1"></div>
                    @foreach($groupes as $groupe)
                  <div class="col-lg-3 col-xxl-3 groupesClass" id="{{$groupe->id}}">
                    <!--------------------
                    START - Pipeline
                    -------------------->
                    <div class="pipeline white lined-primary">
                      <div class="pipeline-header">
                        <h5 class="pipeline-name">
                          {{$groupe->libelle}}
                        </h5>
                        <div class="pipeline-settings os-dropdown-trigger">
                          <i class="os-icon os-icon-hamburger-menu-1"></i>
                          <div class="os-dropdown">
                            <div class="icon-w">
                              <i class="os-icon os-icon-ui-46"></i>
                            </div>
                            <ul>
                              <li>
                                <a href="#"><i class="os-icon os-icon-ui-49"></i><span>Edit Record</span></a>
                              </li>
                              <li>
                                <a href="#"><i class="os-icon os-icon-grid-10"></i><span>Duplicate Item</span></a>
                              </li>
                              <li>
                                <a href="#" class="removeItems" role="{{$groupe->id}}"><i class="os-icon os-icon-ui-15"></i><span>Remove Item</span></a>
                              </li>
                              <li>
                                <a href="#"><i class="os-icon os-icon-ui-44"></i><span>Archive Project</span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      
                      <div class="pipeline-body">
                    @foreach($groupe->affectations($module->id) as $affectation)
                        <div class="pipeline-item" id="{{$affectation->id}}">
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="{{asset('/uploads/photo/'.$affectation->getEnseignant()->photo)}}">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                {{$affectation->getEnseignant()->name}} {{$affectation->getEnseignant()->prenom}}
                              </div>
                              <div class="pi-sub">
                                Enseignant
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                           @if($affectation->td)
                              <a class="tag" href="#">TD</a>
                           @endif
                           @if($affectation->tp)
                              <a class="tag" href="#">TP</a>
                           @endif
                            </div>
                          </div>
                        </div>

                        @endforeach
                      </div>
                    </div>
                    <!--------------------
                    END - Pipeline
                    -------------------->
                  </div>
                  @endforeach
                  
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
          </div>
          
          @endsection
        
