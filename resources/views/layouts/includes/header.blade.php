<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <!--    <meta name="author" content="Isna Nur Azis"> -->
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Testing App</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/font-awesome.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/datatables.bootstrap.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/simple-line-icons.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/animate.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/fullcalendar.min.css')}}"/>
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

      <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/jquery.ui.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/plugins/jquery.datatables.min.js')}}"></script>
      <script src="{{asset('assets/js/plugins/datatables.bootstrap.min.js')}}"></script>
      <!-- custom -->
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#datatables-example').DataTable();
        });
      </script>
      <script type="text/javascript">
        function showTime() {
          var date = new Date(),
              utc = new Date(Date.UTC(
                date.getFullYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours(),
                date.getMinutes(),
                date.getSeconds()
              ));
      
          document.getElementById('time').innerHTML = utc.toLocaleTimeString();
        }
        setInterval(showTime, 1000);
      </script>
  <!-- end: Css -->

    <link rel="shortcut icon" href="{{asset('assets/img/logomi.png')}}">

    </head>

    <body id="mimin" class="dashboard">

      <!-- start: Header -->

        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <a href="home" class="navbar-brand"> 
                 <b>Testing Application</b>
              </a>               
              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>{{ Auth::user()->name }}</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="{{asset('assets/img/avatar.jpg')}}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="/softwaretester/profil/{{ Auth::user()->id }}"><span class="fa fa-user"></span> My Profile</a></li>
                     <li><a href="{{ route('logout') }}"
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
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->