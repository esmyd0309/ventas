<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Monster Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="{{ asset('css/colors/blue.css') }}" rel="stylesheet">
    <style>
   /* Círculos de colores numerados */
span.red {
  background: red;
   border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em; 
}

span.grey {
  background: #cccccc;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #fff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em; 
}

span.green {
  background: #5EA226;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em; 
}

span.blue {
  background: #5178D0;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em; 
}

span.pink {
  background: #EF0BD8;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em; 
}
   
   
   </style>

</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="http://192.168.1.107/ventas/public/welcome">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                           
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <img src="{{ url('http://192.168.1.107/referidos/public/img/logo.jpg') }}" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('http://192.168.1.107/referidos/public/img/logo.jpg') }}" alt="user" class="profile-pic m-r-5" />SISTEMAS</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a id="boton1" href="{{ route('gestione') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Envios de Datos <span id="pendientes1" class="green"></span></a>
                        </li>
                        <li>
                            <a href="{{ route('gestiones2') }}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Recepcion de Pago  <span id="pendientes3" class="green"></span></a>
                        </li>
                       <li>
                            <a href="{{ route('gestiones3') }}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Negociación WhatsApp  <span id="pendientes5" class="green"></span></a>
                        </li>
                        <li>
                            <a href="{{ route('gestiones4') }}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Gestiones del Día </a>
                        </li>
                         <!-- <li>
                            <a href="icon-fontawesome.html" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Icons</a>
                        </li>
                        <li>
                            <a href="map-google.html" class="waves-effect"><i class="fa fa-globe m-r-10" aria-hidden="true"></i>Google Map</a>
                        </li>
                        <li>
                            <a href="pages-blank.html" class="waves-effect"><i class="fa fa-columns m-r-10" aria-hidden="true"></i>Blank Page</a>
                        </li>
                        <li>
                            <a href="pages-error-404.html" class="waves-effect"><i class="fa fa-info-circle m-r-10" aria-hidden="true"></i>Error 404</a>
                        </li>-->
                    </ul>
                    <div class="text-center m-t-30">
                        
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
 <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <main class="py-4">
            @yield('content')
        </main>
    </div>
    

    @yield('script')

        <footer class="footer text-center">
                © 2019 Gregorio Osorio
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   
    
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
   
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/js/tether.min.js') }}" ></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}" ></script>
  
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}" ></script>

    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}" ></script>
   
    <!--stickey kit -->
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}" ></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}" ></script>

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="{{ asset('assets/plugins/flot/jquery.flot.js') }}" ></script>
   
    <script src="{{ asset('assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') }}" ></script>
 
    <script src="{{ asset('js/flot-data.js') }}" ></script>
   
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}" ></script>
   


<!-- Scripts -->



</body>

</html>
