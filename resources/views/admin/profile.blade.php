<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin | Profile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/">

    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/owl.carousel.css">
    <link rel="stylesheet" href="build/css/owl.theme.css">
    <link rel="stylesheet" href="build/css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/main.css">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/educate-custon-icon.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="build/css/metisMenu/metisMenu-vertical.css">

    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="build/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="build/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"></a>
                <strong><a href="index.html"></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                      <li class="active">
                         <!--  <a class="has-arrow" href="{{route('admin.index')}}"> -->
                           <!-- <span class="educate-icon educate-home icon-wrap"></span>
                           <span class="mini-click-non">Education</span> -->
                        </a>

                      </li>

                      <li>
                          <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Courses</span></a>
                          <ul class="submenu-angle" aria-expanded="false">
                              <li><a title="All Courses" href="{{route('admin.showCourses')}}"><span class="mini-sub-pro">All Courses</span></a></li>
                              <li><a title="Popular Courses" href="{{route('admin.popular')}}"><span class="mini-sub-pro">Popular Courses</span></a></li>


                          </ul>

                      </li>

                       <li>
                          <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Instructors</span></a>

                           <ul class="submenu-angle" aria-expanded="false">
                              <li><a title="All instrcutors" href="{{route('admin.showInstructors')}}"><span class="mini-sub-pro">All Instructors
                              </span></a></li>

                          </ul>

                      </li>

                      <li>
                         <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Students</span></a>

                          <ul class="submenu-angle" aria-expanded="false">
                             <li><a title="All instrcutors" href="{{route('admin.showStudents')}}"><span class="mini-sub-pro">All Students
                             </span></a></li>

                         </ul>

                     </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="{{route('admin.index')}}" class="nav-link">Home</a>
                                                </li>

                                                <li class="nav-item"><a href="{{route('admin.showCourses')}}" class="nav-link">Courses</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <!-- <img src="img/product/pro4.jpg" alt="" /> -->
                                                        <span class="admin-name">{{$user->name}}</span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">

                                                        <li><a href="{{route('admin.profile')}}"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>


                                                        <li><a href="{{route('logout.index')}}"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->

            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                  <h2></h2>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="breadcome-heading nav-item">
                                        <h6 style="text-align: center;font-weight: 300;height: 10px;font-size: 40px;">Profile</h6>

                                      </div>

                                  </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <div class="single-pro-review-area mt-t-30 mg-b-15">
          <div class="container-fluid">
              <div class="row">

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                          <ul id="myTabedu1" class="tab-review-design">
                              <li class="active"><a href="#description">Information</a></li>
                              <li><a href="#INFORMATION">Update Details</a></li>
                              <li><a href="#Password">Update Password</a></li>
                          </ul>
                          <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                              <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="profile-info-inner">
                                        <div class="profile-img">
                                            <img src="img/profile/1.jpg" alt="">
                                        </div>
                                        <div class="profile-details-hr">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                    <div class="address-hr">
                                                        <p><b>Name</b><br>{{$user->name}}</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                    <div class="address-hr">
                                                        <p><b>Email ID</b><br>{{$user->email}}</p>
                                                    </div>
                                                </div>

                                            </div>



                                            <br>

                                            <!-- profile message -->

                                            <h4 style="text-align: center;color: #ff0000;font-weight: 200;">{{session('msg')}}</h4><br>
                                        </div>
                                    </div>
                                  </div>

                                </div>

                              </div>

                              <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <form class="" action="admin/editInfo" method="post" onsubmit="return checkInfo()">
                                          {{@csrf_field()}}
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input name="name" id="name" type="text" class="form-control" placeholder="Full Name" value="{{$user->name}}">

                                                            <!-- name error -->

                                                            <h4 id="h1" style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;"></h4>
                                                            <!-- <%
                                                              if (error.id == 3) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">Name can't be empty</h4>
                                                              <% }
                                                              else if (error.id == 4) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">Invalid Name</h4>
                                                              <% }
                                                            %> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">

                                                            <!-- email error -->

                                                            <h4 id="h2" style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;"></h4>
                                                            <!-- <%
                                                              if (error.id == 7) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">Email can't be empty</h4><br/>
                                                              <% }
                                                              else if (error.id == 8) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">Invalid Email</h4><br>
                                                              <% }
                                                            %> -->
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                              <div class="product-tab-list tab-pane fade" id="Password">
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <form class="" action="admin/editPass" method="post" onsubmit="return checkPass()">
                                          {{@csrf_field()}}
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input name="current" id="current" type="password" class="form-control" placeholder="Current Password">

                                                            <!-- current password error -->

                                                            <h4 id="h3" style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;"></h4>
                                                            <!-- <%
                                                              if (error.id == 11) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">Password can't be empty</h4><br/>
                                                              <% }
                                                              else if (error.id == 12) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">Password does not match</h4><br>
                                                              <% }
                                                            %> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="password" id="new" name="new" class="form-control" placeholder="New Password">

                                                            <!-- new password error -->

                                                            <h4 id="h4" style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;"></h4>
                                                            <!-- <%
                                                              if (error.id == 9) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">New Password can't be empty</h4><br/>
                                                              <% }
                                                              else if (error.id == 10) { %>
                                                                <h4 style="text-align: center;color: #ff0000;font-weight: 50;height:20px;font-size: 15px;">Password length must be at least 4</h4><br>
                                                              <% }
                                                            %> -->
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </form>
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
        <br><br><br><br><br>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jquery
            ============================================ -->
        <script src="build/js/vendor/jquery-1.12.4.min.js"></script>

        <script src="js/profile.js"></script>

        <!-- bootstrap JS
            ============================================ -->
        <script src="build/js/bootstrap.min.js"></script>
        <!-- wow JS
            ============================================ -->
        <script src="build/js/wow.min.js"></script>
        <!-- price-slider JS
            ============================================ -->
        <script src="build/js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
            ============================================ -->
        <script src="build/js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
            ============================================ -->
        <script src="build/js/owl.carousel.min.js"></script>
        <!-- sticky JS
            ============================================ -->
        <script src="build/js/jquery.sticky.js"></script>
        <!-- scrollUp JS
            ============================================ -->
        <script src="build/js/jquery.scrollUp.min.js"></script>
        <!-- mCustomScrollbar JS
            ============================================ -->
        <script src="build/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="build/js/scrollbar/mCustomScrollbar-active.js"></script>
        <!-- metisMenu JS
            ============================================ -->
        <script src="build/js/metisMenu/metisMenu.min.js"></script>
        <script src="build/js/metisMenu/metisMenu-active.js"></script>
        <!-- morrisjs JS
            ============================================ -->
        <script src="build/js/sparkline/jquery.sparkline.min.js"></script>
        <script src="build/js/sparkline/jquery.charts-sparkline.js"></script>
        <script src="build/js/sparkline/sparkline-active.js"></script>

        <!-- icheck JS
            ============================================ -->
        <script src="build/js/icheck/icheck.min.js"></script>
        <script src="build/js/icheck/icheck-active.js"></script>


        <!-- plugins JS
            ============================================ -->
        <script src="build/js/plugins.js"></script>
        <!-- main JS
            ============================================ -->
        <script src="build/js/main.js"></script>





</body>

</html>
