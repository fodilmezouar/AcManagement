<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard HTML Template</title>
  <meta charset="utf-8">
  <meta content="ie=edge" http-equiv="x-ua-compatible">
  <meta content="template language" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="Tamerlan Soziev" name="author">
  <meta content="Admin dashboard html template" name="description">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="favicon.png" rel="shortcut icon">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
  <link href="{{asset('bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
  <link href="{{asset('bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{asset('css/main.css?version=4.4.0')}}" rel="stylesheet">
</head>
<body class="menu-position-side menu-side-left full-screen">
<div class="all-wrapper solid-bg-all">
  <div class="search-with-suggestions-w">
    <div class="search-with-suggestions-modal">
      <div class="element-search">
        <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
        <div class="close-search-suggestions">
          <i class="os-icon os-icon-x"></i>
        </div>
        </input>
      </div>
      <div class="search-suggestions-group">
        <div class="ssg-header">
          <div class="ssg-icon">
            <div class="os-icon os-icon-box"></div>
          </div>
          <div class="ssg-name">
            Projects
          </div>
          <div class="ssg-info">
            24 Total
          </div>
        </div>
        <div class="ssg-content">
          <div class="ssg-items ssg-items-boxed">
            <a class="ssg-item" href="users_profile_big.html">
              <div class="item-media" style="background-image: url(img/company6.png"></div>
              <div class="item-name">
                Integ<span>ration</span> with API
              </div>
            </a><a class="ssg-item" href="users_profile_big.html">
              <div class="item-media" style="background-image: url(img/company7.png)"></div>
              <div class="item-name">
                Deve<span>lopm</span>ent Project
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="search-suggestions-group">
        <div class="ssg-header">
          <div class="ssg-icon">
            <div class="os-icon os-icon-users"></div>
          </div>
          <div class="ssg-name">
            Customers
          </div>
          <div class="ssg-info">
            12 Total
          </div>
        </div>
        <div class="ssg-content">
          <div class="ssg-items ssg-items-list">
            <a class="ssg-item" href="users_profile_big.html">
              <div class="item-media" style="background-image: url({{asset('img/avatar1.jpg')}}"></div>
              <div class="item-name">
                John Ma<span>yer</span>s
              </div>
            </a><a class="ssg-item" href="users_profile_big.html">
              <div class="item-media" style="background-image: url({{asset('img/avatar2.jpg')}})"></div>
              <div class="item-name">
                Th<span>omas</span> Mullier
              </div>
            </a><a class="ssg-item" href="users_profile_big.html">
              <div class="item-media" style="background-image: url({{asset('img/avatar3.jpg')}})"></div>
              <div class="item-name">
                Kim C<span>olli</span>ns
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="search-suggestions-group">
        <div class="ssg-header">
          <div class="ssg-icon">
            <div class="os-icon os-icon-folder"></div>
          </div>
          <div class="ssg-name">
            Files
          </div>
          <div class="ssg-info">
            17 Total
          </div>
        </div>
        <div class="ssg-content">
          <div class="ssg-items ssg-items-blocks">
            <a class="ssg-item" href="#">
              <div class="item-icon">
                <i class="os-icon os-icon-file-text"></i>
              </div>
              <div class="item-name">
                Work<span>Not</span>e.txt
              </div>
            </a><a class="ssg-item" href="#">
              <div class="item-icon">
                <i class="os-icon os-icon-film"></i>
              </div>
              <div class="item-name">
                V<span>ideo</span>.avi
              </div>
            </a><a class="ssg-item" href="#">
              <div class="item-icon">
                <i class="os-icon os-icon-database"></i>
              </div>
              <div class="item-name">
                User<span>Tabl</span>e.sql
              </div>
            </a><a class="ssg-item" href="#">
              <div class="item-icon">
                <i class="os-icon os-icon-image"></i>
              </div>
              <div class="item-name">
                wed<span>din</span>g.jpg
              </div>
            </a>
          </div>
          <div class="ssg-nothing-found">
            <div class="icon-w">
              <i class="os-icon os-icon-eye-off"></i>
            </div>
            <span>No files were found. Try changing your query...</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="layout-w">
    <!--------------------
    START - Mobile Menu
    -------------------->
    <div class="menu-mobile menu-activated-on-click color-scheme-dark">
      <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="index.html"><img src="{{asset('img/logo.png')}}"><span>Clean Admin</span></a>
        <div class="mm-buttons">
          <div class="content-panel-open">
            <div class="os-icon os-icon-grid-circles"></div>
          </div>
          <div class="mobile-menu-trigger">
            <div class="os-icon os-icon-hamburger-menu-1"></div>
          </div>
        </div>
      </div>
      <div class="menu-and-user">
        <div class="logged-user-w">
          <div class="avatar-w">
            <img alt="" src="{{asset('img/avatar1.jpg')}}">
          </div>
          <div class="logged-user-info-w">
            <div class="logged-user-name">
              Maria Gomez
            </div>
            <div class="logged-user-role">
              Administrator
            </div>
          </div>
        </div>
        <!--------------------
        START - Mobile Menu List
        -------------------->
        <ul class="main-menu">
          <li class="has-sub-menu">
            <a href="index.html">
              <div class="icon-w">
                <div class="os-icon os-icon-layout"></div>
              </div>
              <span>Gestion Préliminaire</span></a>
            <ul class="sub-menu">
              <li>
                <a href="index.html">Promotions</a>
              </li>
            </ul>
          </li>
        </ul>
        <!--------------------
        END - Mobile Menu List
        -------------------->
      </div>
    </div>
    <!--------------------
    END - Mobile Menu
    --------------------><!--------------------
        START - Main Menu
        -------------------->
    <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
      <div class="logo-w">
        <a class="logo" href="index.html">
          <div class="logo-element"></div>
          <div class="logo-label">
            Clean Admin
          </div>
        </a>
      </div>
      <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
          <div class="avatar-w">
            <img alt="" src="{{asset('img/avatar1.jpg')}}">
          </div>
          <div class="logged-user-info-w">
            <div class="logged-user-name">
              Maria Gomez
            </div>
            <div class="logged-user-role">
              Administrator
            </div>
          </div>
          <div class="logged-user-toggler-arrow">
            <div class="os-icon os-icon-chevron-down"></div>
          </div>
          <div class="logged-user-menu color-style-bright">
            <div class="logged-user-avatar-info">
              <div class="avatar-w">
                <img alt="" src="{{asset('img/avatar1.jpg')}}">
              </div>
              <div class="logged-user-info-w">
                <div class="logged-user-name">
                  Maria Gomez
                </div>
                <div class="logged-user-role">
                  Administrator
                </div>
              </div>
            </div>
            <div class="bg-icon">
              <i class="os-icon os-icon-wallet-loaded"></i>
            </div>
            <ul>
              <li>
                <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
              </li>
              <li>
                <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
              </li>
              <li>
                <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
              </li>
              <li>
                <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
              </li>
              <li>
                <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="menu-actions">
        <!--------------------
        START - Messages Link in secondary top menu
        -------------------->
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
          <i class="os-icon os-icon-mail-14"></i>
          <div class="new-messages-count">
            12
          </div>
          <div class="os-dropdown light message-list">
            <ul>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar1.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      John Mayers
                    </h6>
                    <h6 class="message-title">
                      Account Update
                    </h6>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar2.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      Phil Jones
                    </h6>
                    <h6 class="message-title">
                      Secutiry Updates
                    </h6>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar3.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      Bekky Simpson
                    </h6>
                    <h6 class="message-title">
                      Vacation Rentals
                    </h6>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar4.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      Alice Priskon
                    </h6>
                    <h6 class="message-title">
                      Payment Confirmation
                    </h6>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!--------------------
        END - Messages Link in secondary top menu
        --------------------><!--------------------
            START - Settings Link in secondary top menu
            -------------------->
        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
          <i class="os-icon os-icon-ui-46"></i>
          <div class="os-dropdown">
            <div class="icon-w">
              <i class="os-icon os-icon-ui-46"></i>
            </div>
            <ul>
              <li>
                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
              </li>
              <li>
                <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
              </li>
              <li>
                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
              </li>
              <li>
                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
              </li>
            </ul>
          </div>
        </div>
        <!--------------------
        END - Settings Link in secondary top menu
        --------------------><!--------------------
            START - Messages Link in secondary top menu
            -------------------->
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
          <i class="os-icon os-icon-zap"></i>
          <div class="new-messages-count">
            4
          </div>
          <div class="os-dropdown light message-list">
            <div class="icon-w">
              <i class="os-icon os-icon-zap"></i>
            </div>
            <ul>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar1.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      John Mayers
                    </h6>
                    <h6 class="message-title">
                      Account Update
                    </h6>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar3.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      Phil Jones
                    </h6>
                    <h6 class="message-title">
                      Secutiry Updates
                    </h6>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar3.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      Bekky Simpson
                    </h6>
                    <h6 class="message-title">
                      Vacation Rentals
                    </h6>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="user-avatar-w">
                    <img alt="" src="{{asset('img/avatar4.jpg')}}">
                  </div>
                  <div class="message-content">
                    <h6 class="message-from">
                      Alice Priskon
                    </h6>
                    <h6 class="message-title">
                      Payment Confirmation
                    </h6>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!--------------------
        END - Messages Link in secondary top menu
        -------------------->
      </div>
      <div class="element-search autosuggest-search-activator">
        <input placeholder="Start typing to search..." type="text">
      </div>
      <h1 class="menu-page-header">
        Page Header
      </h1>
      <ul class="main-menu">
        <li class="sub-header">
          <span>Layouts</span>
        </li>
        <li class="selected has-sub-menu">
          <a href="index.html">
            <div class="icon-w">
              <div class="os-icon os-icon-layout"></div>
            </div>
            <span>Gestion Préliminaire</span></a>
          <div class="sub-menu-w">
            <div class="sub-menu-header">
              G - Préliminaire
            </div>
            <div class="sub-menu-icon">
              <i class="os-icon os-icon-layout"></i>
            </div>
            <div class="sub-menu-i">
              <ul class="sub-menu">
                <li>
                  <a href="index.html">Promotions</a>
                </li>
                <li>
                  <a href="index.html">Enseignants</a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!--------------------
    END - Main Menu
    -------------------->
    <div class="content-w">
      <!--------------------
      START - Top Bar
      -------------------->
      <div class="top-bar color-scheme-transparent">
        <!--------------------
        START - Top Menu Controls
        -------------------->
        <div class="top-menu-controls">
          <div class="element-search autosuggest-search-activator">
            <input placeholder="Start typing to search..." type="text">
          </div>
          <!--------------------
          START - Messages Link in secondary top menu
          -------------------->
          <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
            <i class="os-icon os-icon-mail-14"></i>
            <div class="new-messages-count">
              12
            </div>
            <div class="os-dropdown light message-list">
              <ul>
                <li>
                  <a href="#">
                    <div class="user-avatar-w">
                      <img alt="" src="{{asset('img/avatar1.jpg')}}">
                    </div>
                    <div class="message-content">
                      <h6 class="message-from">
                        John Mayers
                      </h6>
                      <h6 class="message-title">
                        Account Update
                      </h6>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="user-avatar-w">
                      <img alt="" src="{{asset('img/avatar2.jpg')}}">
                    </div>
                    <div class="message-content">
                      <h6 class="message-from">
                        Phil Jones
                      </h6>
                      <h6 class="message-title">
                        Secutiry Updates
                      </h6>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="user-avatar-w">
                      <img alt="" src="{{asset('img/avatar3.jpg')}}">
                    </div>
                    <div class="message-content">
                      <h6 class="message-from">
                        Bekky Simpson
                      </h6>
                      <h6 class="message-title">
                        Vacation Rentals
                      </h6>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="user-avatar-w">
                      <img alt="" src="{{asset('img/avatar4.jpg')}}">
                    </div>
                    <div class="message-content">
                      <h6 class="message-from">
                        Alice Priskon
                      </h6>
                      <h6 class="message-title">
                        Payment Confirmation
                      </h6>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!--------------------
          END - Messages Link in secondary top menu
          --------------------><!--------------------
              START - Settings Link in secondary top menu
              -------------------->
          <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
            <i class="os-icon os-icon-ui-46"></i>
            <div class="os-dropdown">
              <div class="icon-w">
                <i class="os-icon os-icon-ui-46"></i>
              </div>
              <ul>
                <li>
                  <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                </li>
                <li>
                  <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                </li>
                <li>
                  <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                </li>
                <li>
                  <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                </li>
              </ul>
            </div>
          </div>
          <!--------------------
          END - Settings Link in secondary top menu
          --------------------><!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
          <div class="logged-user-w">
            <div class="logged-user-i">
              <div class="avatar-w">
                <img alt="" src="{{asset('img/avatar1.jpg')}}">
              </div>
              <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                  <div class="avatar-w">
                    <img alt="" src="{{asset('img/avatar1.jpg')}}">
                  </div>
                  <div class="logged-user-info-w">
                    <div class="logged-user-name">
                      Maria Gomez
                    </div>
                    <div class="logged-user-role">
                      Administrator
                    </div>
                  </div>
                </div>
                <div class="bg-icon">
                  <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                  <li>
                    <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                  </li>
                  <li>
                    <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                  </li>
                  <li>
                    <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!--------------------
          END - User avatar and menu in secondary top menu
          -------------------->
        </div>
        <!--------------------
        END - Top Menu Controls
        -------------------->
      </div>
      <!--------------------
      END - Top Bar
      -------------------->
      @yield('content')
      <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
      <script src="{{asset('bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
      <script src="{{asset('bower_components/moment/moment.js')}}"></script>
      <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
      <script src="{{asset('bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
      <script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
      <script src="{{asset('bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
      <script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
      <script src="{{asset('bower_components/dropzone/dist/dropzone.js')}}"></script>
      <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
      <script src="{{asset('bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
      <script src="{{asset('bower_components/tether/dist/js/tether.min.js')}}"></script>
      <script src="{{asset('bower_components/slick-carousel/slick/slick.min.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/util.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/alert.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/button.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/carousel.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/collapse.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/dropdown.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/modal.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/tab.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/tooltip.js')}}"></script>
      <script src="{{asset('bower_components/bootstrap/js/dist/popover.js')}}"></script>
      <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('js/demo_customizer.js?version=4.4.0')}}"></script>
      <script src="{{asset('js/main.js?version=4.4.0')}}"></script>
@yield('scripts')
</body>
</html>
