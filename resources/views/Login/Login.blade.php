<!-- @extends('Template.HtmlSkeleton')  -->

@section('Title')
<title>Dcube | Login</title>
@stop
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/login.css">
<style type="text/css">
    body{
        background-image: url({{url()}}/assets/vendor/img/bg.jpg);
    }
</style>
@stop
@section('BaseContent')
<div class="container-fluid">

  <div class="row">
      <div class="col-lg-5 col-md-5 visible-md visible-lg">
        <img class="lhs-img" src="{{url()}}/assets/vendor/img/green_back_for_white.png"> 
        <img class="lhs-img circl" src="{{url()}}/assets/vendor/img/white_circle.png"> 
        <img class="lhs-img logo" src="{{url()}}/assets/vendor/img/dds_logo.jpg"> 
        <div class="lhs-img text">
            
              The D Cube Analytics Platform is built grounds up leveraging key business process knowledge at various functional levels while providing accelerator capabilities to disrupt the cost-time framework from an implementation standpoint
            
        </div>
      </div>

      <div class="col-lg-7 col-sm-12 col-md-7 col-xs-12">
          <div class="row">
            <img class="logo-img pull-right" src="{{url()}}/assets/vendor/img/dcube_new.png">
          </div>
          <div class="row abu">
                <div class="col-lg-2 col-md-2 visible-lg visible-md">
            
                </div>
                <div class="col-lg-7 col-sm-12 col-md-7 col-xs-12 shadow pad">
                  <form action="{{url()}}/login1" method="post">
                    {!! csrf_field() !!}


                    <label class="login-label">Login to Your Account</label><br>
                    <input type="email" class="form-control email @if (Session::has('message')) bottom @endif" placeholder="Email" name="email" required />
                    <br>
                    <input type="password" class="form-control password @if (Session::has('message')) bottom @endif" placeholder="Password" name="password" required />
                    <br>
                    <button  type="submit" class="btn btn-success form-control login-btn"> Submit </button>
                    <br>
                    <a class="pull-right forgot-pass" href="#">Forgot password ?</a>
                    <br>
                    @if (Session::has('message'))
                  
                      <p class="alert"><span class="fa fa-exclamation-triangle" aria-hidden="true"></span>&nbsp;  {{ Session::get('message') }}</p>
                  
                    @endif
                  </form>
                </div>
                <div class="col-lg-2 col-md-2 visible-md visible-lg"></div>
          </div>
            <br>
            
      </div>  
  </div>      
</div>

<div class="row">
  <div class="col-md-offset-6 col-md-4 footer">

      <small class="copyright">&copy; <?php echo date("Y"); ?> Dcube. All Rights Reserved</small>
    
  </div>
</div>
@stop

@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
@stop
