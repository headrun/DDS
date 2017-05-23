
@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Login</title>
@show
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/login.css">
@show
@section('BaseJSLib')
<!--<script src="{{url()}}/assets/vendor/admin_mod/js/login.js"></script>-->
@show
@section('BaseContent')
<style>
.panel-default {
    border-color: #ddd;
	position : center;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
	}
	
#content
{
	position : relative;
}
#content img
{
	position : absolute;
	top : 0px;
	right : 0px;
}


</style>
<div class="container-fluid">
	<div id="content">
		<img src="{{url()}}/assets/vendor/img/dcube_new.png" style="height:80px" class="pull-reversed"></img>
	</div>
	<div class="main-content-div row" style="margin-top: 110px;">
		<div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
		</div>
		<div class="center-div col-lg-6 col-md-6 col-sm-8 col-xs-8">
			<div class="center-logo-div">
				<img class="primarylogo" src="/img/summary_icons/tacktion_logo_white.png">
			</div>
			<div class="panel panel-default">
				<form>
					<input type="email" class="form-control" placeholder="Email" name="email" required />
					<br>
					<input type="password" class="form-control" placeholder="Password" name="password" required />
					<br>
					<button  type="button" class=" btn  form-control login-btn"
					onclick="window.location.assign('{{url()}}/dashboard')"> Login</button>
				</form>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
		</div>
	</div>
</div>

