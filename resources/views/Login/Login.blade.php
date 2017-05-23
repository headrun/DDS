@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Login</title>
@show
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/login.css">
@show
@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/admin_mod/js/login.js"></script>
@show
@section('BaseContent')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <img class="logo-img pull-right" src="{{url()}}/assets/vendor/img/dcube_new.png" style="height:80px">
    </div>
  </div>
  <div class="row">
    <div class=" col-lg-5 col-md-5 col-sm-8 col-xs-8 login-box center-block panel panel-default">
    {!! Form::open(array('url' => '/vault/adminlogin', 'id'=>"adminLoginForm", "class"=>"", 'method' => 'post')) !!}
      {!! csrf_field() !!}
      <label class="login-label">Login to Your Account</label>
      <input type="email" class="form-control email" placeholder="Email" name="email" required />
      <br>
      <input type="password" class="form-control password" placeholder="Password" name="password" required />
      <br>
      <a class="pull-right forgot-pass" href="#">Forgot password ?</a>
      <br>
      <button  type="button" class="btn btn-default form-control login-btn" 
        onclick="window.location.assign('{{url()}}/dashboard')"> Login</button>
    {!! Form::close() !!}
      <center><small class="copyright">&copy; <?php echo date("Y"); ?> Dcube. All Rights Reserved</small></center>
    </div>
  </div>
</div>
@stop
