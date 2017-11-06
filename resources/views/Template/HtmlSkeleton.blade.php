
<html lang="en">
  <head>
    <meta charset="utf-8">
    @section('Favicon')
    <link rel="shortcut icon" type="image/x-icon" href="{{url()}}/assets/vendor/favicon/favicon.ico" />
    @show 
    @section('Title')
    <title>@yield('Title')</title>
    @show
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('CSSBootstrap')
    <link rel="stylesheet" href="{{url()}}/assets/libs/bootstrap/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="{{url()}}/assets/vendor/css/ie10-viewport-bug-workaround.css">-->
    <link rel="stylesheet" href="{{url()}}/assets/libs/FontAwesome/fontawesome.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]
    <link rel="stylesheet" href="{{url()}}/assets/vendor/admin_mod/css/loader.css">-->
    @show
    <link rel="stylesheet" href="{{url()}}/assets/vendor/css/app.css">
    @yield('BaseCSSLib')

    <style>
      .dropdown-logout {
          position: relative;
          display: inline-block;
      }

      .dropdown-logout-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          padding: 12px 16px;
          z-index: 1;
          margin-left: 90px;
      }

      .dropdown-logout:hover .dropdown-logout-content {
          display: block;
      }
      .nav-right{
        padding: 10px;
        color: #fff

      }
      .nav-items{
        color: #C8CAD2
      }
    </style>

  </head>
  <body>

    @if (Auth::guest())
    @else
    <div class="container-fluid master-layout-class">
  <!-- Fixed navbar -->
    <nav class="clearfix navbar navbar-default navbar-fixed-top collapsed" style="background-color: #252E55">
      <!--<a class="pull-left menubutton toggle-collapse">
        <i aria-hidden="true" class="fa fa-bars"></i> 
      </a>-->
      
      <a href="{{url()}}/dashboard" class="pull-left brand more-padding">
          <img src="{{url()}}/assets/vendor/img/dcube_new.png" class="primarylogo"  style="width: 100px; height: 50px; margin-top: -10px; margin-left: -10px">
        
      </a>
      <li class="dropdown-logout">
          <a href="#" class="dropdown-logout" data-toggle="dropdown-logout" style="padding: 28px 0 0 15px; color: #C8CAD2; font-size: 15px; font-weight: 600; margin-left: 90px">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
             Hi, {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-logout-content">
              <!-- <li><a href="{{ url('/new-invent/'.Auth::User()->id) }}">New invention</a></li> -->
              <li>
                  <a href="{{ url('/logout') }}"
                     onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
          </ul>
          <!-- <div class="nav navbar-nav" style="padding: 28px 0 0 15px; color: #0D596B; font-size: 15px; font-weight: 600">
            <i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 18px"></i> vinay</div> -->
        </li>
      <div class="pull-left center-content"></div>
      <!-- <div class="sidenav" id="mySidenav"> -->
        <!--<a class="closebtn" href="javascript:void(0)">×</a>-->
        <!-- <a class="home" href="{{url()}}/dashboard">
          <span>
            <i class="fa fa-home fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Home</span>
        </a>
        <a class="analytics" href="{{url()}}/setup_new_proj">
          <span>
            <i class="fa fa-th-list" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Project Setup</span>
        </a> -->

        <!-- <a class="ingest" href="#">
          <span>
            <i class="fa fa-reply fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Ingest</span>
        </a>
        <a class="mapping" href="#">
          <span>
            <img src="{{ url('/assets/vendor/img/mapping.png') }}" width="18px">
          </span>
          <span style="margin-left: 12px">Mapping</span>
        </a>
        <a class="kpi_election" href="#">
          <span>
            <i class="fa fa-th-list" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">KPI Selection</span>
        </a> -->
        <!-- <a class="analytics" target="_blank" href="https://54.241.166.219:8443/knime/">
          <span>
            <i class="fa fa-line-chart" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Analytics Sandbox</span>
        </a>
        <a class="transform" target="_blank" href="http://www.hyperbase.dcubeanalytics.com/">
          <span>
            <i class="fa fa-area-chart fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Hyperbase D</span>
        </a>
        <a class="self_service" href="#">
          <span> -->
            <!-- <i class="fa fa-refresh fa-lg" aria-hidden="true"></i> -->
            <!-- <img src="{{ url('/assets/vendor/img/Self-Service-Icon.png') }}" width="20px">
          </span>
          <span style="margin-left: 12px">Self Service</span>
        </a>
        <a class="extractor_library" href="{{url()}}/extractor_library">
          <span>
            <i class="fa fa-book fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Extractor Library</span>
        </a>
        <a class="validate" href="{{url()}}/kpilib">
          <span>
            <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">KPI Library</span>
        </a>
        
      </div> -->
      <div class="aside-overlay"></div>

      <ul class="pull-right nav navbar-nav">
        <!-- <li class="btn label" style="margin-top: 20px; margin-left: 5px"></li> -->
        <li class="nav-right">
          <a  target="_blank" href="http://www.hyperbase.dcubeanalytics.com/">
          
            <label class="nav-items">DDS IRIS</label>
          </a>
        </li>
        <li class="nav-right">
          <a target="_blank" href="http://www.hyperbase.dcubeanalytics.com/">
          
            <label class="nav-items">Hyperbase</label>
          </a>
        </li>
        <li class="nav-right">
          <a target="_blank" href="http://www.hyperbase.dcubeanalytics.com/">
          
            <label class="nav-items">Data Science Sandbox</label>
          </a>
        </li>
        <li class="nav-right">
          <a target="_blank" href="http://www.hyperbase.dcubeanalytics.com/">
          
            <label class="nav-items">Project Moniter</label>
          </a>
        </li>
        <li>
          <img class="pull-right" src="{{url()}}/DDS Logo-02.png" style="width:100px; height:50px; margin-top:10px;">
          
      </li>        
        
        
      </ul>
      <!-- <div class="secondary-logo ng-scope">
        <img src="{{url()}}/assets/vendor/img/dcube_new.png">
      </div>
      <div class="pull-right nav navbar-nav">vinay</div> -->
    </nav>
</div>
    @endif

    @yield('BaseContent')
    <script type="text/javascript">
      var url = "{{url()}}";
    </script> 
    @section('JSJquery')
    <script src="{{url()}}/assets/libs/jQuery/dist/jquery.min.js"></script>
    @show 
    @section('PageLoader')
    <div class="loader">
      <svg viewBox="0 0 32 32" width="32" height="32">
        <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
      </svg>
    </div>
    @stop 
    @section('JSBootstrap')
    <script src="{{url()}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--<script src="{{url()}}/assets/vendor/js/ieworkaround.js"></script> -->
    @show 
    @yield('BaseJSLib') 
    @section('GA') 
    @show 
  </body>
</html>
