<!-- @extends('Template.HtmlSkeleton')  -->

@section('Title')
<title>Dcube | Login</title>
@stop
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/login.css">
<!-- <style type="text/css">
    .master-layout-class {
        display: none;
    }
</style> -->
@stop
@section('BaseContent')
<div class="container-fluid" style="padding-right: 0; padding-left: 0"> 

  <div class="row">
    <div class="col-lg-5 col-md-5">
      <img class="ihs" src="{{url()}}/assets/vendor/img/lhs.png" style="position: fixed;
       max-width: 110%;
       max-height: 100%;
       margin: auto;
       overflow: auto;">  
    </div>

    <div class="col-lg-7 col-sm-12 col-md-7 col-xs-12">

        <div class="row">
          <img class="ihs-img pull-right" src="{{url()}}/assets/vendor/img/dcube_new.png" style="height:80px; margin-right: 20px;">
        </div>

        <div class="row" style="padding: 40px;">
          <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
            
          </div>
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 shadow" style="padding:100px;">
              <form action="{{url()}}/login1" method="post">
              {!! csrf_field() !!}

              @if (Session::has('message'))
                <div class="alert alert-danger">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;
                {{ Session::get('message') }}
                </div>
              @endif

            <label class="login-label">Login to Your Account</label>
            <input type="email" class="form-control email" placeholder="Email" name="email" required />
            <br>
            <input type="password" class="form-control password" placeholder="Password" name="password" required />
            <br>
            <a class="pull-right forgot-pass" href="#">Forgot password ?</a>
            <br>
            <button  type="submit" class="btn btn-success form-control login-btn" style = "border-radius: 30px;"> Submit </button>
            </form>
                <center><small class="copyright">&copy; <?php echo date("Y"); ?> Dcube. All Rights Reserved</small></center>
          </div>
          <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
            
          </div>
        </div>
    <!-- <div class=" col-lg-5 col-md-5 col-sm-8 col-xs-8 login-box center-block panel panel-default"> -->
    <!-- <center><img src="{{url()}}/DDS Logo-02.png" class="primarylogo img-responsive" -->
     <!-- style="background-color:  #9dbe33;" ></center></div></div> -->
    <!--{!! Form::open(array('url' => '/vault/adminlogin', 'id'=>"adminLoginForm", "class"=>"", 'method' => 'post')) !!}-->
    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> -->
      <!--<div class="row">
        <img class="logo-img pull-right" src="{{url()}}/assets/vendor/img/dcube_logo.png" style="height:80px">
      </div>--> 
    <!-- <div class="row" style="background-color:  #ffffff;
box-shadow: 0px 1px 13.5px 1.5px rgba(0, 0, 0, 0.05); width: 100%">
     -->
    <!--{!! Form::close() !!}-->
  </div>
@stop
@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
@stop
