<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pengukuran Kualitas Perangkat Lunak ISO 25010</title>

  <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/simple-line-icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/animate.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/fullcalendar.min.css')}}"/>
	  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/datatables.bootstrap.min.css')}}"/>
    @yield('css')
    <!-- end: Css -->

	<link rel="shortcut icon" href="{{asset('assets/img/logomi.png')}}">

</head>

<body id="mimin" class="dashboard topnav">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <a class="navbar-brand"> 
                 <b>Aplikasi Pengukuran Kualitas Perangkat Lunak ISO 25010</b>
                </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <!-- start: Content -->
        <div id="content">
          @yield('content_header')
          @yield('content')
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
<script src="{{asset('asset/js/main.js')}}"></script>
@yield('js')

<!-- end: Javascript -->
</body>
</html>