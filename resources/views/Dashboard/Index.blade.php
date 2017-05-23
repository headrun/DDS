@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Dashboard</title>
@show
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/app.css">
@show
@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/js/dashboard.js"></script>
@show
@section('BaseContent')
<div class="container-fluid">
  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid custom-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="#">
            <img class="brand-logo" src="{{url()}}/assets/vendor/img/dcube_new.png"></img>
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right right-nav">
            <li class="dropdown logout-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <label class="welcome">
              Welcome, Harsha 
              </label>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{url()}}/login">Logout</a></li>
              </ul>
            </li>
            <li>
              <label class="question"><i class="fa fa-question-circle fa-2x custom-question" aria-hidden="true"></i></label>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</div>
<div class="container-fluid custom-page-container" style="margin-top:75px;">
  <aside class="sidebar navbar navbar-default navbar-fixed-side">
    <a>
      <button type="btn" class="sidebarbtn text-center center-block">
        <i class="fa fa-home fa-5x" aria-hidden="true"></i>
        Home
      </button>
    </a>
    <a>
      <button type="btn" class="sidebarbtn text-center center-block">
        <i class="fa fa-book fa-5x" aria-hidden="true"></i>
        Extractor Library
      </button>
    </a>
    <a>
      <button type="btn" class="sidebarbtn text-center center-block">
        <i class="fa fa-reply fa-5x" aria-hidden="true"></i>
        Ingest
      </button>
    </a>
    <a>
      <button type="btn" class="sidebarbtn text-center center-block">
        <i class="fa fa-address-card-o fa-5x" aria-hidden="true"></i>
        Validate
      </button>
    </a>
    <a>
      <button type="btn" class="sidebarbtn text-center center-block">
        <i class="fa fa-refresh fa-5x" aria-hidden="true"></i>
        Transform
      </button>
    </a>
  </aside>

  <div class="page-data-container">
  <div class="container-fluid">
    <div class="row">  
    <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6" >
      <h4 class="widget-heading">Active Projects and Status</h4>
      <h4 class="project_name">Project Name</h4>
      <ol type="I" class="desc">
        <li>Type II Diabetes Prelaunch Dashboard</li>
        <li>Market Access Reporting v1.0</li>
        <li>Social Media Campaign Tracking</li>
        <li>Phast Rx reporting dashboard</li>
        <li>Optimix: Market Mix Modelling workflow for RA</li>
      </ol>
    </div>
    <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <table class="table" style="font-size:14px">
        <thead>
          <tr>
            <th>Project status</th>
            <th>TA</th>
            <th>FA</th>
            <th>#UVMTD</th>
            <th>Active Downloads</th>
            <th>Dt</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center"><div class="green circle"></div></td>
            <td>Diabetes</td>
            <td>Sales</td>
            <td>16</td>
            <td>23</td>
            <td>20-5-2017</td>
          </tr>
          <tr>
            <td align="center"><div class="green circle"></div></td>
            <td>Diabetes</td>
            <td>Sales</td>
            <td>13</td>
            <td>20</td>
            <td>20-5-2017</td>
          </tr>
          <tr>
            <td align="center"><div class="green circle"></div></td>
            <td>Diabetes</td>
            <td>Sales</td>
            <td>13</td>
            <td>15</td>
            <td>20-5-2017</td>
          </tr>
          <tr>
            <td align="center"><div class="green circle"></div></td>
            <td>Diabetes</td>
            <td>Sales</td>
            <td>13</td>
            <td>13</td>
            <td>20-5-2017</td>
          </tr>
          <tr>
            <td align="center"><div class="green circle"></div></td>
            <td>Diabetes</td>
            <td>Sales</td>
            <td>11</td>
            <td>12</td>
            <td>20-5-2017</td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
    <div class="row">
      <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6" >
        <h4 class="widget-heading">Upcoming data refresh schedule</h4>
        <ol type="I" class="desc">
          <li>Phast June 2017 Data ………………………….06/15/2017</li>
          <li>PrescriberSource May 2017………………....06/30/2017</li>
          <li>Analyst report reviews June………………….06/15/2017</li>
          <li>MMIT May data…………………………………….06/15/2017</li>
        </ol>
      </div>
      <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6" >
        <a href="http://www.aws.amazon.com"> 
        <h4 class="widget-heading text-center">AWS Infrastructure Health</h4>
        </a>
      </div>
    </div>
  </div>
  <div class="middle-widget center-block">
  <div class="center-block text-center">
    <a href="#"> 
        <h4 class="widget-heading">Setup New Project</h4>
    </a>
  </div>
  </div>

  </div>
</div>
@stop
