<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing App</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/simple-line-icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/animate.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/fullcalendar.min.css')}}"/>
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/datatables.bootstrap.min.css')}}"/>
      <!-- end: Css -->

	<link rel="shortcut icon" href="{{asset('assets/img/logomi.png')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

  <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.html" class="navbar-brand"> 
                  <b>Testing Application</b>
                </a>
                
              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>{{ Auth::user()->name }}</span></li>
                  <li class="dropdown avatar-dropdown" style="padding-right: 30px">
                   <img src="{{asset('assets/img/avatar.jpg')}}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                      <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                      <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    
                    <li class="ripple"><a href="{{route('softwaretester.home')}}"><span class="fa fa-home"></span>Home</a></li>
                    <li class="ripple"><a href="{{route('index.aplikasi')}}"><span class="fa-globe fa"></span>Aplikasi</a></li>
                    <li class="ripple"><a href="{{route('view.bobot')}}"><span class="fa-balance-scale fa"></span>Bobot</a></li>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->

  		
          <!-- start: content -->
            <div id="content">
                @yield('content_header')
                @yield('content')
            </div>
          <!-- end: content -->      
    </div>

    <!-- start: Javascript -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ui.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
   
    
    <!-- plugins -->
    <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chart.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables.bootstrap.min.js')}}"></script>


    <!-- custom -->
     <script src="{{asset('assets/js/main.js')}}"></script>
     <script type="text/javascript" src="{{asset('assets/js/template.js')}}"></script>
     @yield('js')

  <!-- end: Javascript -->
  </body>
</html>