@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Login</title>
@stop
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/login.css">
<style type="text/css">
    .master-layout-class {
        display: none;
    }
</style>
@stop
@section('BaseContent')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <img class="logo-img pull-right" src="{{url()}}/assets/vendor/img/dcube_new.png" style="height:80px">
    </div>
  </div>
  <div class="row">
    <div class=" col-lg-5 col-md-5 col-sm-8 col-xs-8 login-box center-block panel panel-default">
    <center><img src="{{url()}}/DDS Logo-02.png" class="primarylogo img-responsive" style="margin-top: -40px ;
    margin-bottom:  -40px ; padding: 40px"></center>
    <!--{!! Form::open(array('url' => '/vault/adminlogin', 'id'=>"adminLoginForm", "class"=>"", 'method' => 'post')) !!}-->
    <form action="{{url()}}/login1" method="post">
      {!! csrf_field() !!}
      <label class="login-label">Login to Your Account</label>
      <input type="email" class="form-control email" placeholder="Email" name="email" required />
      <br>
      <input type="password" class="form-control password" placeholder="Password" name="password" required />
      <br>
      <a class="pull-right forgot-pass" href="#">Forgot password ?</a>
      <br>
      <button  type="submit" class="btn btn-default form-control login-btn"> Login</button>
    </form>
    <!--{!! Form::close() !!}-->
      <center><small class="copyright">&copy; <?php echo date("Y"); ?> Dcube. All Rights Reserved</small></center>
    </div>
  </div>
</div>
@stop
@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
@stop
