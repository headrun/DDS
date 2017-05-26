<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    @section('Favicon')
    <link rel="shortcut icon" type="image/x-icon" href="{{url()}}/assets/vendor/favicon/favicon.ico" />
    @show 
    @section('Title')
    <title>Worxogo</title>
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
  </head>
  <body>

    <div class="container-fluid master-layout-class">
  <!-- Fixed navbar -->
    <nav class="clearfix navbar navbar-default navbar-fixed-top collapsed"">
      <!--<a class="pull-left menubutton toggle-collapse">
        <i aria-hidden="true" class="fa fa-bars"></i> 
      </a>-->
      <a class="pull-left brand more-padding">
        <!--<img src="{{url()}}/assets/vendor/img/traction_logo.png" class="primarylogo">-->
        <h1 style="margin-top: 4px;">D D S</h1>
      </a>
      <div class="pull-left center-contetnt"></div>
      <div class="sidenav" id="mySidenav">
        <!--<a class="closebtn" href="javascript:void(0)">×</a>-->
        <a class="home" href="{{url()}}/dashboard">
          <span>
            <i class="fa fa-home fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Home</span>
        </a>
        <a class="extractor_library" href="{{url()}}/extractor_library">
          <span>
            <i class="fa fa-book fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Extractor Library</span>
        </a>
        <a class="ingest" href="{{url()}}/ingestion">
          <span>
            <i class="fa fa-reply fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Ingest</span>
        </a>
        <a class="validate" href="#">
          <span>
            <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Validate</span>
        </a>
        <a class="transform" href="#">
          <span>
            <i class="fa fa-refresh fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Transform</span>
        </a>
      </div>
      <div class="aside-overlay"></div>
      <ul class="pull-right nav navbar-nav">
        <li>
          <div class="logout">
            <div class="dropdown">
              <span class="dropdown-toggle" data-toggle="dropdown">User Name 
                <span class="caret"></span>
              </span>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
      <div class="pull-right secondary-logo ng-scope">
        <img src="{{url()}}/assets/vendor/img/dcube_new.png" class="pull-right">
      </div>
    </nav>
</div>

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
