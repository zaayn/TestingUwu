<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Aplikasi Pengukuran Kualitas Perangkat Lunak ISO 25010</title>
  
      <!-- start: Css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
      
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/font-awesome.min.css')}}"/>
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/datatables.bootstrap.min.css')}}"/>
    @yield('css')
      <!-- end: Css -->

  </head>

  <body id="testapp" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <a class="navbar-brand"> 
                <b>Aplikasi Pengukuran Kualitas Perangkat Lunak ISO 25010</b>
              </a>
              <ul class="nav navbar-nav navbar-right user-nav">
                  <li>
                    <a href="/softwaretester/profil/{{ Auth::user()->id }}"><span class="fa fa-user"></span> My Profile</a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span>
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
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
                    <li class="ripple"><a href="{{route('view.bobot')}}"><span class="fa-balance-scale fa"></span>Bobot Default</a></li>
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
    
    {{-- table edit --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    
    
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
     <script type="text/javascript" src="{{asset('assets/js/tableedit.js')}}"></script> 
     @yield('js')

  <!-- end: Javascript -->
  </body>
</html>