<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Courses</title>
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
                        <li>
                            <a class="has-arrow" href="">
            								   <span class="educate-icon educate-home icon-wrap"></span>
            								   <span class="mini-click-non">Education</span>
            								</a>

                        </li>
                        <li>
                            <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Courses</span></a>

                             <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href=""><span class="mini-sub-pro">My Courses
                                </span></a></li>

                            </ul>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Add Course" href="{{route('instructor.create')}}"><span class="mini-sub-pro">Add Courses
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
                                                <li class="nav-item"><a href="{{route('instructor.index')}}" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="" class="nav-link">About</a>
                                                </li>
                                                <li class="nav-item"><a href="{{route('instructor.myCourses')}}" class="nav-link">Courses</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                        															<img src="image/{{$user->image}}" alt="" />
                        															<span class="admin-name">{{$user->name}}</span>
                        															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                        														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">

                                                        <li><a href="{{route('instructor.profile')}}"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>

                                                        <li><a href=""><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading nav-item">


                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses-area">
            <div class="container-fluid">
                <div class="row">

                  <!-- Show all courses -->

                  <?php for($i=0; $i< count($courses); $i++){ ?>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="courses-inner res-mg-b-30">
                                <div class="courses-title">
                                    <h2>{{$courses[$i]->name}}</h2>
                                </div>

                                <div class="course-des">
                                    <p><span><i class="fa fa-clock"></i></span> <b>Chapter:</b> {{$chapters[$i]}}</p>
                                </div>
                                <div class="product-buttons">
                                    <a href="{{route('instructor.seeCourse',[$courses[$i]->course_id])}}"><button type="button" class="btn btn-custon-rounded-three btn-warning">Details</button></a>
                                    <a href="{{route('instructor.addQuiz',[$courses[$i]->course_id])}}"><button type="button" class="btn btn-custon-rounded-three btn-warning">Add Quiz</button></a>
                                    <a href="{{route('instructor.editCourse',[$courses[$i]->course_id])}}"><button type="button" class="btn btn-custon-rounded-three btn-warning">Edit</button></a>
                                    <a href="{{route('instructor.deleteCourse',[$courses[$i]->course_id])}}"><button type="button" class="btn btn-custon-rounded-three btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>

            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <h2>Bar Chart</h2>
                        <!-- <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p> -->
                    </div>
                    <div id="bar1-chart">
                        <canvas id="barchart1"></canvas>
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
        </div>

        <!-- jquery
    		============================================ -->
        <script src="build/js/jquery-1.12.4.js"></script>

        <!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"></script> -->

        <!-- <script src="../course.js"></script> -->

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
        <!-- Charts JS
    		============================================ -->
        <script src="build/js/charts/Chart.js"></script>
        <script src="build/js/charts/bar-chart.js"></script>
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

        <script>

            var ctx = document.getElementById("barchart1");

            var array = <?php echo json_encode($courseNames);?> ;
            var count = <?php echo json_encode($data);?> ;

            // console.log(array);

            var barchart1 = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: array,
                datasets: [{
                  label: 'Enrolled',
                  data: count,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  xAxes: [{
                    ticks: {
                      autoSkip: false,
                      maxRotation: 0
                    },
                    ticks: {
                      fontColor: "#fff", // this here
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      autoSkip: false,
                      maxRotation: 0
                    },
                    ticks: {
                      fontColor: "#fff", // this here
                    }
                  }]
                }
              }
            });
        </script>


</body>

</html>
