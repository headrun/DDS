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
    @yield('BaseCSSLib') 
  </head>
  <body>
    @yield('BaseContent')
    <script type="text/javascript">
      var url = "{{url()}}";
    </script> 
    @section('JSJquery')
    <script src="{{url()}}/assets/libs/jquery/dist/jquery.min.js"></script> 
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
