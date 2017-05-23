@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Dashboard</title>
@show
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/app.css">
<script src="{{url()}}/assets/vendor/js/dashboard.js"></script>
@show
@section('BaseContent')
<div class="container-fluid">
  <!-- Fixed navbar -->
    <nav class="clearfix navbar navbar-default navbar-fixed-top collapsed"">
      <a class="pull-left menubutton toggle-collapse">
        <i aria-hidden="true" class="fa fa-bars"></i> 
      </a>
      <a class="pull-left brand more-padding">
        <img src="{{url()}}/assets/vendor/img/traction_logo.png" class="primarylogo">
      </a>
      <div class="pull-left center-contetnt"></div>
      <div class="sidenav" id="mySidenav">
        <a class="closebtn" href="javascript:void(0)">×</a>
        <a class="active" href="#">
          <span>
            <i class="fa fa-home fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Home</span>
        </a>
        <a class="" href="#">
          <span>
            <i class="fa fa-book fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Extractor Library</span>
        </a>
        <a class="" href="#">
          <span>
            <i class="fa fa-reply fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Ingest</span>
        </a>
        <a class="" href="#">
          <span>
            <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
          </span>
          <span style="margin-left: 35px">Validate</span>
        </a>
        <a class="" href="#">
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
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Active Projects and Status</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead>
                                <tr>
                                  <th>Project Name</th>
                                  <th>Project status</th>
                                  <th>TA</th>
                                  <th>FA</th>
                                  <th>#UVMTD</th>
                                  <th>Active Downloads</th>
                                  <th>Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Type II Diabetes Prelaunch Dashboard</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>16</td>
                                  <td>23</td>
                                  <td>20-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Market Access Reporting v1.0</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>13</td>
                                  <td>20</td>
                                  <td>20-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Social Media Campaign Tracking</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>13</td>
                                  <td>15</td>
                                  <td>20-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Phast Rx reporting dashboard</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>13</td>
                                  <td>13</td>
                                  <td>20-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Optimix: Market Mix Modelling workflow for RA</td>
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
                  </div>
              </div>
          </div>

          <div class="row widget-2">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title" style="color:#004269">Upcoming data refresh schedule</h3>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="panel panel-default" style="border-bottom: 4px solid #f8b118;     padding: 20px;">
                      <table class="table" style="font-size:14px">
                        <tbody>
                          <tr>
                            <td>Phast June 2017 Data ………………………….06/15/2017</td>
                          </tr>
                          <tr>
                            <td>PrescriberSource May 2017………………....06/30/2017</td>
                          </tr>
                          <tr>
                            <td>Analyst report reviews June………………….06/15/2017</td>
                          </tr>
                          <tr>
                            <td>MMIT May data…………………………………….06/15/2017</td>
                          </tr>
                          <tr>
                            <td>Optimix: Market Mix Modelling workflow for RA</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="panel panel-default" style="border-bottom: 4px solid #f8b118;     padding: 20px;">
                      <a href="http://www.aws.amazon.com">
                        <div class="panel panel-default" style="background: #F8FAFD;">
                            <div class="panel-body" style="padding: 10px 15px;">
                              AWS Infrastructure Health
                              <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                      </a>
                      <a href="#">
                        <div class="panel panel-default" style="background: #F8FAFD;">
                            <div class="panel-body" style="padding: 10px 15px;">
                              Setup New Project
                              <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i></span>
                            </div>
                        </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--<div class="container-fluid custom-page-container" style="margin-top:75px;">
  <div class="page-data-container">
  <div class="container-fluid">
    <div class="row">
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
</div>-->
@stop
@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/js/dashboard.js"></script>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '.menubutton', function(){
        $(this).hide();
        $('.sidenav').show();
        $('.aside-overlay').show();
    });

    $(document).on('click', '.closebtn, .aside-overlay', function(){
        $('.sidenav').hide();
        $('.aside-overlay').hide();
        $('.menubutton').show();
    });

    $(document).ready(function() {
        //setTimeout(function(){
           table =  $('#mainTable').DataTable({
          "searching": false,
          "bPaginate": false,
           //"paging":   false,
            "info":     false
        });
        //}, 1000);

 /*       if ( $.fn.dataTable.isDataTable( '#example' ) ) {
    table = $('#example').DataTable();
}
else {
    table = $('#example').DataTable( {
        paging: false
    } );
}*/
    });
    
</script>
@show
