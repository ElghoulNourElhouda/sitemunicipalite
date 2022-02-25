<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>{{ config('app.name', 'Laravel') }}</title>


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/espace.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <script type="text/javascript" src="js/admin.js"></script>
  <body class="home">
    <div class="container-fluid display-table">
      <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
          <div class="logo">
            <a hef="home.html"><img src="images/img2.png" alt="Consulting Infos" class="hidden-xs hidden-sm" style="width: 65%; height: 55%">
              <img src="images/img2.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo" >
            </a>
          </div>
          <div class="navi">
            <ul>
              <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
              <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gérer offres</span></a></li>
              <li><a href="{{ url('gerer_agents')}}"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gérer agents</span></a></li>
              <li><a href="{{ url('gerer_condidats')}}"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Gérer condidats</span></a></li>
              <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Statistiques</span></a></li>
              <li><a href="#"><i class="fa fa-history" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Historiques</span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
          <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
          <div class="row">
            <header>
              <div class="col-md-7">
                <nav class="navbar-default pull-left">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                </nav>
                <div class="search hidden-xs hidden-sm">
                  <input type="text" placeholder="Search" id="search">
                </div>
              </div>
              <div class="col-md-5">
                <div class="header-rightside">
                  <ul class="list-inline header-top pull-right">
                   <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                   <li>
                    <a href="#" class="icon-info">
                      <i class="fa fa-bell" aria-hidden="true"></i>
                      <span class="label label-primary">3</span>
                    </a>
                  </li>
                  <li class="dropdown">
                     <a href="{{ url('/logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     <b>  Déconnexion </b>
                   </a>

                   <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                  </li>
                </ul>
              </div>
            </div>
          </header>
        </div>
        <div class="user-dashboard">
          @yield('content')
        </div>
      </div>
    </div>

  </div>
</div>

</body>