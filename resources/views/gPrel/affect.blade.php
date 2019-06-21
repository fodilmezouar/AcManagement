<!DOCTYPE html>
<html>
  <head>
    <title>Admin Dashboard HTML Template</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="css/main.css?version=4.4.0" rel="stylesheet">
    <link href="bower_components/dragula.js/dist/dragula.min.css" rel="stylesheet">
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
                  <div class="item-media" style="background-image: url(img/company6.png)"></div>
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
                  <div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
                  <div class="item-name">
                    John Ma<span>yer</span>s
                  </div>
                </a><a class="ssg-item" href="users_profile_big.html">
                  <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                  <div class="item-name">
                    Th<span>omas</span> Mullier
                  </div>
                </a><a class="ssg-item" href="users_profile_big.html">
                  <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
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
            <a class="mm-logo" href="index.html"><img src="img/logo.png"><span>Clean Admin</span></a>
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
                <img alt="" src="img/avatar1.jpg">
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
                  <span>Dashboard</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="index.html">Dashboard 1</a>
                  </li>
                  <li>
                    <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a>
                  </li>
                  <li>
                    <a href="apps_support_dashboard.html">Dashboard 3</a>
                  </li>
                  <li>
                    <a href="apps_projects.html">Dashboard 4</a>
                  </li>
                  <li>
                    <a href="apps_bank.html">Dashboard 5</a>
                  </li>
                  <li>
                    <a href="layouts_menu_top_image.html">Dashboard 6</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="layouts_menu_top_image.html">
                  <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                  </div>
                  <span>Menu Styles</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="layouts_menu_side_full.html">Side Menu Light</a>
                  </li>
                  <li>
                    <a href="layouts_menu_side_full_dark.html">Side Menu Dark</a>
                  </li>
                  <li>
                    <a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="apps_pipeline.html">Side &amp; Top Dark</a>
                  </li>
                  <li>
                    <a href="apps_projects.html">Side &amp; Top</a>
                  </li>
                  <li>
                    <a href="layouts_menu_side_mini.html">Mini Side Menu</a>
                  </li>
                  <li>
                    <a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a>
                  </li>
                  <li>
                    <a href="layouts_menu_side_compact.html">Compact Side Menu</a>
                  </li>
                  <li>
                    <a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a>
                  </li>
                  <li>
                    <a href="layouts_menu_right.html">Right Menu</a>
                  </li>
                  <li>
                    <a href="layouts_menu_top.html">Top Menu Light</a>
                  </li>
                  <li>
                    <a href="layouts_menu_top_dark.html">Top Menu Dark</a>
                  </li>
                  <li>
                    <a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a>
                  </li>
                  <li>
                    <a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a>
                  </li>
                  <li>
                    <a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a>
                  </li>
                  <li>
                    <a href="layouts_menu_side_compact_click.html">Menu Inside Click</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="apps_bank.html">
                  <div class="icon-w">
                    <div class="os-icon os-icon-package"></div>
                  </div>
                  <span>Applications</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="apps_email.html">Email Application</a>
                  </li>
                  <li>
                    <a href="apps_support_dashboard.html">Support Dashboard</a>
                  </li>
                  <li>
                    <a href="apps_support_index.html">Tickets Index</a>
                  </li>
                  <li>
                    <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="apps_projects.html">Projects List</a>
                  </li>
                  <li>
                    <a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="apps_full_chat.html">Chat Application</a>
                  </li>
                  <li>
                    <a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="misc_chat.html">Popup Chat</a>
                  </li>
                  <li>
                    <a href="apps_pipeline.html">CRM Pipeline</a>
                  </li>
                  <li>
                    <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="misc_calendar.html">Calendar</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-file-text"></div>
                  </div>
                  <span>Pages</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="misc_invoice.html">Invoice</a>
                  </li>
                  <li>
                    <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="misc_charts.html">Charts</a>
                  </li>
                  <li>
                    <a href="auth_login.html">Login</a>
                  </li>
                  <li>
                    <a href="auth_register.html">Register</a>
                  </li>
                  <li>
                    <a href="auth_lock.html">Lock Screen</a>
                  </li>
                  <li>
                    <a href="misc_pricing_plans.html">Pricing Plans</a>
                  </li>
                  <li>
                    <a href="misc_error_404.html">Error 404</a>
                  </li>
                  <li>
                    <a href="misc_error_500.html">Error 500</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-life-buoy"></div>
                  </div>
                  <span>UI Kit</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="uikit_alerts.html">Alerts</a>
                  </li>
                  <li>
                    <a href="uikit_grid.html">Grid</a>
                  </li>
                  <li>
                    <a href="uikit_progress.html">Progress</a>
                  </li>
                  <li>
                    <a href="uikit_popovers.html">Popover</a>
                  </li>
                  <li>
                    <a href="uikit_tooltips.html">Tooltips</a>
                  </li>
                  <li>
                    <a href="uikit_buttons.html">Buttons</a>
                  </li>
                  <li>
                    <a href="uikit_dropdowns.html">Dropdowns</a>
                  </li>
                  <li>
                    <a href="uikit_typography.html">Typography</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-mail"></div>
                  </div>
                  <span>Emails</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="emails_welcome.html">Welcome Email</a>
                  </li>
                  <li>
                    <a href="emails_order.html">Order Confirmation</a>
                  </li>
                  <li>
                    <a href="emails_payment_due.html">Payment Due</a>
                  </li>
                  <li>
                    <a href="emails_forgot.html">Forgot Password</a>
                  </li>
                  <li>
                    <a href="emails_activate.html">Activate Account</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-users"></div>
                  </div>
                  <span>Users</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="users_profile_big.html">Big Profile</a>
                  </li>
                  <li>
                    <a href="users_profile_small.html">Compact Profile</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-edit-32"></div>
                  </div>
                  <span>Forms</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="forms_regular.html">Regular Forms</a>
                  </li>
                  <li>
                    <a href="forms_validation.html">Form Validation</a>
                  </li>
                  <li>
                    <a href="forms_wizard.html">Form Wizard</a>
                  </li>
                  <li>
                    <a href="forms_uploads.html">File Uploads</a>
                  </li>
                  <li>
                    <a href="forms_wisiwig.html">Wisiwig Editor</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-grid"></div>
                  </div>
                  <span>Tables</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="tables_regular.html">Regular Tables</a>
                  </li>
                  <li>
                    <a href="tables_datatables.html">Data Tables</a>
                  </li>
                  <li>
                    <a href="tables_editable.html">Editable Tables</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-zap"></div>
                  </div>
                  <span>Icons</span></a>
                <ul class="sub-menu">
                  <li>
                    <a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_feather.html">Feather Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_themefy.html">Themefy Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_picons_thin.html">Picons Thin</a>
                  </li>
                  <li>
                    <a href="icon_fonts_dripicons.html">Dripicons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_eightyshades.html">Eightyshades</a>
                  </li>
                  <li>
                    <a href="icon_fonts_entypo.html">Entypo</a>
                  </li>
                  <li>
                    <a href="icon_fonts_font_awesome.html">Font Awesome</a>
                  </li>
                  <li>
                    <a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a>
                  </li>
                  <li>
                    <a href="icon_fonts_metrize_icons.html">Metrize Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_picons_social.html">Picons Social</a>
                  </li>
                  <li>
                    <a href="icon_fonts_batch_icons.html">Batch Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_dashicons.html">Dashicons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_typicons.html">Typicons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_weather_icons.html">Weather Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_light_admin.html">Light Admin</a>
                  </li>
                </ul>
              </li>
            </ul>
            <!--------------------
            END - Mobile Menu List
            -------------------->
            <div class="mobile-menu-magic">
              <h4>
                Light Admin
              </h4>
              <p>
                Clean Bootstrap 4 Template
              </p>
              <div class="btn-w">
                <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
              </div>
            </div>
          </div>
        </div>
        <!--------------------
        END - Mobile Menu
        --------------------><!--------------------
        START - Main Menu
        -------------------->
        <div class="menu-w color-scheme-dark color-style-bright menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
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
                <img alt="" src="img/avatar1.jpg">
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
                    <img alt="" src="img/avatar1.jpg">
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
                        <img alt="" src="img/avatar1.jpg">
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
                        <img alt="" src="img/avatar2.jpg">
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
                        <img alt="" src="img/avatar3.jpg">
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
                        <img alt="" src="img/avatar4.jpg">
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
                        <img alt="" src="img/avatar1.jpg">
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
                        <img alt="" src="img/avatar2.jpg">
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
                        <img alt="" src="img/avatar3.jpg">
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
                        <img alt="" src="img/avatar4.jpg">
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
                <span>Dashboard</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Dashboard
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-layout"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="index.html">Dashboard 1</a>
                    </li>
                    <li>
                      <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a>
                    </li>
                    <li>
                      <a href="apps_support_dashboard.html">Dashboard 3</a>
                    </li>
                    <li>
                      <a href="apps_projects.html">Dashboard 4</a>
                    </li>
                    <li>
                      <a href="apps_bank.html">Dashboard 5</a>
                    </li>
                    <li>
                      <a href="layouts_menu_top_image.html">Dashboard 6</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="layouts_menu_top_image.html">
                <div class="icon-w">
                  <div class="os-icon os-icon-layers"></div>
                </div>
                <span>Menu Styles</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Menu Styles
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-layers"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="layouts_menu_side_full.html">Side Menu Light</a>
                    </li>
                    <li>
                      <a href="layouts_menu_side_full_dark.html">Side Menu Dark</a>
                    </li>
                    <li>
                      <a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a>
                    </li>
                    <li>
                      <a href="apps_pipeline.html">Side &amp; Top Dark</a>
                    </li>
                    <li>
                      <a href="apps_projects.html">Side &amp; Top</a>
                    </li>
                    <li>
                      <a href="layouts_menu_side_mini.html">Mini Side Menu</a>
                    </li>
                    </ul><ul class="sub-menu">
                    <li>
                      <a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a>
                    </li>
                    <li>
                      <a href="layouts_menu_side_compact.html">Compact Side Menu</a>
                    </li>
                    <li>
                      <a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a>
                    </li>
                    <li>
                      <a href="layouts_menu_right.html">Right Menu</a>
                    </li>
                    <li>
                      <a href="layouts_menu_top.html">Top Menu Light</a>
                    </li>
                    <li>
                      <a href="layouts_menu_top_dark.html">Top Menu Dark</a>
                    </li>
                    </ul><ul class="sub-menu">
                    <li>
                      <a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a>
                    </li>
                    <li>
                      <a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a>
                    </li>
                    <li>
                      <a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a>
                    </li>
                    <li>
                      <a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a>
                    </li>
                    <li>
                      <a href="layouts_menu_side_compact_click.html">Menu Inside Click</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="sub-header">
              <span>Options</span>
            </li>
            <li class=" has-sub-menu">
              <a href="apps_bank.html">
                <div class="icon-w">
                  <div class="os-icon os-icon-package"></div>
                </div>
                <span>Applications</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Applications
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-package"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="apps_email.html">Email Application</a>
                    </li>
                    <li>
                      <a href="apps_support_dashboard.html">Support Dashboard</a>
                    </li>
                    <li>
                      <a href="apps_support_index.html">Tickets Index</a>
                    </li>
                    <li>
                      <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a>
                    </li>
                    <li>
                      <a href="apps_projects.html">Projects List</a>
                    </li>
                    <li>
                      <a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a>
                    </li>
                    </ul><ul class="sub-menu">
                    <li>
                      <a href="apps_full_chat.html">Chat Application</a>
                    </li>
                    <li>
                      <a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a>
                    </li>
                    <li>
                      <a href="misc_chat.html">Popup Chat</a>
                    </li>
                    <li>
                      <a href="apps_pipeline.html">CRM Pipeline</a>
                    </li>
                    <li>
                      <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                    </li>
                    <li>
                      <a href="misc_calendar.html">Calendar</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-file-text"></div>
                </div>
                <span>Pages</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Pages
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-file-text"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="misc_invoice.html">Invoice</a>
                    </li>
                    <li>
                      <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                    </li>
                    <li>
                      <a href="misc_charts.html">Charts</a>
                    </li>
                    <li>
                      <a href="auth_login.html">Login</a>
                    </li>
                    <li>
                      <a href="auth_register.html">Register</a>
                    </li>
                    </ul><ul class="sub-menu">
                    <li>
                      <a href="auth_lock.html">Lock Screen</a>
                    </li>
                    <li>
                      <a href="misc_pricing_plans.html">Pricing Plans</a>
                    </li>
                    <li>
                      <a href="misc_error_404.html">Error 404</a>
                    </li>
                    <li>
                      <a href="misc_error_500.html">Error 500</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-life-buoy"></div>
                </div>
                <span>UI Kit</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  UI Kit
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-life-buoy"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a>
                    </li>
                    <li>
                      <a href="uikit_alerts.html">Alerts</a>
                    </li>
                    <li>
                      <a href="uikit_grid.html">Grid</a>
                    </li>
                    <li>
                      <a href="uikit_progress.html">Progress</a>
                    </li>
                    <li>
                      <a href="uikit_popovers.html">Popover</a>
                    </li>
                    </ul><ul class="sub-menu">
                    <li>
                      <a href="uikit_tooltips.html">Tooltips</a>
                    </li>
                    <li>
                      <a href="uikit_buttons.html">Buttons</a>
                    </li>
                    <li>
                      <a href="uikit_dropdowns.html">Dropdowns</a>
                    </li>
                    <li>
                      <a href="uikit_typography.html">Typography</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="sub-header">
              <span>Elements</span>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-mail"></div>
                </div>
                <span>Emails</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Emails
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-mail"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="emails_welcome.html">Welcome Email</a>
                    </li>
                    <li>
                      <a href="emails_order.html">Order Confirmation</a>
                    </li>
                    <li>
                      <a href="emails_payment_due.html">Payment Due</a>
                    </li>
                    <li>
                      <a href="emails_forgot.html">Forgot Password</a>
                    </li>
                    <li>
                      <a href="emails_activate.html">Activate Account</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-users"></div>
                </div>
                <span>Users</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Users
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-users"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="users_profile_big.html">Big Profile</a>
                    </li>
                    <li>
                      <a href="users_profile_small.html">Compact Profile</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-edit-32"></div>
                </div>
                <span>Forms</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Forms
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-edit-32"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="forms_regular.html">Regular Forms</a>
                    </li>
                    <li>
                      <a href="forms_validation.html">Form Validation</a>
                    </li>
                    <li>
                      <a href="forms_wizard.html">Form Wizard</a>
                    </li>
                    <li>
                      <a href="forms_uploads.html">File Uploads</a>
                    </li>
                    <li>
                      <a href="forms_wisiwig.html">Wisiwig Editor</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-grid"></div>
                </div>
                <span>Tables</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Tables
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-grid"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="tables_regular.html">Regular Tables</a>
                    </li>
                    <li>
                      <a href="tables_datatables.html">Data Tables</a>
                    </li>
                    <li>
                      <a href="tables_editable.html">Editable Tables</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class=" has-sub-menu">
              <a href="#">
                <div class="icon-w">
                  <div class="os-icon os-icon-zap"></div>
                </div>
                <span>Icons</span></a>
              <div class="sub-menu-w">
                <div class="sub-menu-header">
                  Icons
                </div>
                <div class="sub-menu-icon">
                  <i class="os-icon os-icon-zap"></i>
                </div>
                <div class="sub-menu-i">
                  <ul class="sub-menu">
                    <li>
                      <a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_feather.html">Feather Icons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_themefy.html">Themefy Icons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_picons_thin.html">Picons Thin</a>
                    </li>
                    <li>
                      <a href="icon_fonts_dripicons.html">Dripicons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_eightyshades.html">Eightyshades</a>
                    </li>
                    </ul><ul class="sub-menu">
                    <li>
                      <a href="icon_fonts_entypo.html">Entypo</a>
                    </li>
                    <li>
                      <a href="icon_fonts_font_awesome.html">Font Awesome</a>
                    </li>
                    <li>
                      <a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a>
                    </li>
                    <li>
                      <a href="icon_fonts_metrize_icons.html">Metrize Icons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_picons_social.html">Picons Social</a>
                    </li>
                    <li>
                      <a href="icon_fonts_batch_icons.html">Batch Icons</a>
                    </li>
                    </ul><ul class="sub-menu">
                    <li>
                      <a href="icon_fonts_dashicons.html">Dashicons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_typicons.html">Typicons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_weather_icons.html">Weather Icons</a>
                    </li>
                    <li>
                      <a href="icon_fonts_light_admin.html">Light Admin</a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
          <div class="side-menu-magic">
            <h4>
              Light Admin
            </h4>
            <p>
              Clean Bootstrap 4 Template
            </p>
            <div class="btn-w">
              <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
            </div>
          </div>
        </div>
        <!--------------------
        END - Main Menu
        -------------------->
        <div class="content-w">
          <!--------------------
          START - Top Bar
          -------------------->
          <div class="top-bar color-scheme-bright">
            <div class="fancy-selector-w">
              <div class="fancy-selector-current">
                <div class="fs-img shadowless">
                  <img alt="" src="img/company5.png">
                </div>
                <div class="fs-main-info">
                  <div class="fs-name">
                    Mail Sender Product
                  </div>
                  <div class="fs-sub">
                    <span>New Tickets:</span><strong>14</strong>
                  </div>
                </div>
                <div class="fs-selector-trigger">
                  <i class="os-icon os-icon-arrow-down4"></i>
                </div>
              </div>
              <div class="fancy-selector-options">
                <div class="fancy-selector-option">
                  <div class="fs-img shadowless">
                    <img alt="" src="img/company1.png">
                  </div>
                  <div class="fs-main-info">
                    <div class="fs-name">
                      CMS Product
                    </div>
                    <div class="fs-sub">
                      <span>New Tickets:</span><strong>32</strong>
                    </div>
                  </div>
                </div>
                <div class="fancy-selector-option active">
                  <div class="fs-img shadowless">
                    <img alt="" src="img/company5.png">
                  </div>
                  <div class="fs-main-info">
                    <div class="fs-name">
                      Server Product
                    </div>
                    <div class="fs-sub">
                      <span>New Tickets:</span><strong>17</strong>
                    </div>
                  </div>
                </div>
                <div class="fancy-selector-option">
                  <div class="fs-img shadowless">
                    <img alt="" src="img/company3.png">
                  </div>
                  <div class="fs-main-info">
                    <div class="fs-name">
                      Compute Engine
                    </div>
                    <div class="fs-sub">
                      <span>New Tickets:</span><strong>11</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                          <img alt="" src="img/avatar1.jpg">
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
                          <img alt="" src="img/avatar2.jpg">
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
                          <img alt="" src="img/avatar3.jpg">
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
                          <img alt="" src="img/avatar4.jpg">
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
                    <img alt="" src="img/avatar1.jpg">
                  </div>
                  <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                      <div class="avatar-w">
                        <img alt="" src="img/avatar1.jpg">
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
          <div class="content-i">
            <div class="content-box">
              <div class="control-header">
                <div class="row align-items-center">
                  <div class="col-8 col-lg-7">
                    <form action="" class="form-inline">
                      <div class="form-group mr-4">
                        <label class="mr-2" for="">Category</label><select class="form-control-sm">
                          <option>
                            Management
                          </option>
                          <option>
                            Sales Team
                          </option>
                        </select>
                      </div>
                      <div class="form-group d-none d-md-flex">
                        <label class="mr-2" for="">Order By</label><select class="form-control-sm">
                          <option>
                            Date
                          </option>
                          <option>
                            Lead Count
                          </option>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="col-4 col-lg-5 text-right">
                    <a class="btn btn-sm btn-link btn-upper mr-4 d-none d-lg-inline-block" href="#"><i class="os-icon os-icon-ui-44"></i><span>Download CSV</span></a><a class="btn btn-sm btn-primary btn-upper" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add New Lead</span></a>
                  </div>
                </div>
              </div>
              <div class="pipelines-w">
                <div class="row">
                  <div class="col-lg-4 col-xxl-3">
                    <!--------------------
                    START - Pipeline
                    -------------------->
                    <div class="pipeline white lined-primary">
                      <div class="pipeline-header">
                        <h5 class="pipeline-name">
                          Idea Proposed
                        </h5>
                        <div class="pipeline-header-numbers">
                          <div class="pipeline-value">
                            $45,367
                          </div>
                          <div class="pipeline-count">
                            14 leads
                          </div>
                        </div>
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
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar1.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Better Pharmacy
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Production</a>
                              <a class="tag" href="#">Sales</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>8 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar7.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Goldman
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Fashion</a>
                              <a class="tag" href="#">Stats</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>12 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar6.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Bosing Corp
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Assist</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>6 Notes</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--------------------
                    END - Pipeline
                    -------------------->
                  </div>
                  <div class="col-lg-4 col-xxl-3">
                    <!--------------------
                    START - Pipeline
                    -------------------->
                    <div class="pipeline white lined-danger">
                      <div class="pipeline-header">
                        <h5 class="pipeline-name">
                          Email Contact
                        </h5>
                        <div class="pipeline-header-numbers">
                          <div class="pipeline-value">
                            $5,743
                          </div>
                          <div class="pipeline-count">
                            7 leads
                          </div>
                        </div>
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
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar3.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Fennel Inc
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Damage</a>
                              <a class="tag" href="#">Control</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>14 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar1.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Zillow Farm
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Sold Pass</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>4 Notes</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--------------------
                    END - Pipeline
                    -------------------->
                  </div>
                  <div class="col-lg-4 col-xxl-3">
                    <!--------------------
                    START - Pipeline
                    -------------------->
                    <div class="pipeline white lined-success">
                      <div class="pipeline-header">
                        <h5 class="pipeline-name">
                          Approved Lead
                        </h5>
                        <div class="pipeline-header-numbers">
                          <div class="pipeline-value">
                            $12,574
                          </div>
                          <div class="pipeline-count">
                            3 leads
                          </div>
                        </div>
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
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar2.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Corpus Comp
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Master Sonic</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>1 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar4.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Boiling Roast
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Clip</a>
                              <a class="tag" href="#">Movie</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>5 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar5.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Ketchup Farm
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Coins</a>
                              <a class="tag" href="#">Keys</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>3 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar3.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Milk Parade
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Zero Fun</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>2 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar1.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Better Pharmacy
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Habits</a>
                              <a class="tag" href="#">Controls</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>5 Notes</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--------------------
                    END - Pipeline
                    -------------------->
                  </div>
                  <div class="col-lg-4 col-xxl-3 d-none d-xxl-block">
                    <!--------------------
                    START - Pipeline
                    -------------------->
                    <div class="pipeline white lined-warning">
                      <div class="pipeline-header">
                        <h5 class="pipeline-name">
                          Contracts
                        </h5>
                        <div class="pipeline-header-numbers">
                          <div class="pipeline-value">
                            $2,447
                          </div>
                          <div class="pipeline-count">
                            6 leads
                          </div>
                        </div>
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
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar5.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Borgia Lime
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Production</a>
                              <a class="tag" href="#">Sales</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>15 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar2.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Key Stone
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Gold</a>
                              <a class="tag" href="#">Paste</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>7 Notes</span></a>
                          </div>
                        </div>
                        <div class="pipeline-item">
                          <div class="pi-controls">
                            <div class="pi-settings os-dropdown-trigger">
                              <i class="os-icon os-icon-ui-46"></i>
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
                            <div class="status status-green" data-placement="top" data-toggle="tooltip" title="Active Status"></div>
                          </div>
                          <div class="pi-body">
                            <div class="avatar">
                              <img alt="" src="img/avatar3.jpg">
                            </div>
                            <div class="pi-info">
                              <div class="h6 pi-name">
                                Faradey Corp
                              </div>
                              <div class="pi-sub">
                                John Mayers
                              </div>
                            </div>
                          </div>
                          <div class="pi-foot">
                            <div class="tags">
                              <a class="tag" href="#">Meat Supply</a>
                            </div>
                            <a class="extra-info" href="#"><i class="os-icon os-icon-mail-12"></i><span>4 Notes</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--------------------
                    END - Pipeline
                    -------------------->
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
        </div>
      </div>
      <div class="display-type"></div>
    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bower_components/moment/moment.js"></script>
    <script src="bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="bower_components/dropzone/dist/dropzone.js"></script>
    <script src="bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.min.js"></script>
    <script src="bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="bower_components/bootstrap/js/dist/util.js"></script>
    <script src="bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="bower_components/bootstrap/js/dist/button.js"></script>
    <script src="bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="bower_components/dragula.js/dist/dragula.min.js"></script>
    <script src="js/demo_customizer.js?version=4.4.0"></script>
    <script src="js/main.js?version=4.4.0"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-XXXXXXX-9', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
