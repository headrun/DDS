@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Dashboard</title>
@show

@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">
                Active Projects and Status 
                <button class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal" style="margin-right: 15px;">View Dag List</button>
              </h3>
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
                                  <td>21-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Market Access Reporting v1.0</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>13</td>
                                  <td>20</td>
                                  <td>23-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Social Media Campaign Tracking</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>13</td>
                                  <td>15</td>
                                  <td>25-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Phast Rx reporting dashboard</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>13</td>
                                  <td>13</td>
                                  <td>27-5-2017</td>
                                </tr>
                                <tr>
                                  <td>Optimix: Market Mix Modelling workflow for RA</td>
                                  <td align="center"><div class="green circle"></div></td>
                                  <td>Diabetes</td>
                                  <td>Sales</td>
                                  <td>11</td>
                                  <td>12</td>
                                  <td>29-5-2017</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row widget-2">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
                  <h3 class="widget-title" style="color:#004269">Upcoming data refresh schedule</h3>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
                  <h3 class="widget-title" style="color:#004269">AWS Infrastructure Health</h3>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="panel panel-default" style="border-bottom: 4px solid #f8b118;     padding: 20px;">
                      <table class="table" style="font-size:14px">
                        <tbody>
                          <tr>
                            <td>Phast June 2017 Data ………………………….06/15/2017</td>
                          </tr>
                          <tr>
                            <td>PrescriberSource May 2017……………….........06/30/2017</td>
                          </tr>
                          <tr>
                            <td>Analyst report reviews June….............…………06/15/2017</td>
                          </tr>
                          <tr>
                            <td>MMIT May data…………………………...........06/15/2017</td>
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
                      <h4><span class="label label-primary">Clusters</span></h4>
                      <table class="table cluster1" style="font-size:14px">
                          <thead>
                            <tr>
                              <th>Cluster</th>
                              <th>Cluster Status</th>
                              <th>DB Health</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>dcubeddsplatform</td>
                              <td>available</td>
                              <td>Healthy</td>
                            </tr>
                          </tbody>
                      </table>
                      <h4><span class="label label-primary">Instance</span></h4>
                      <table class="table cluster2" style="font-size:14px">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Instance ID</th>
                              <th>Instance Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Machin-1</td>
                              <td>13246798</td>
                              <td><span class="green circle"></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Running</td>
                            </tr>
                            <tr>
                              <td>Machin-2</td>
                              <td>13246798</td>
                              <td><span class="green circle"></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Running</td>
                            </tr>
                            <tr>
                              <td>Machin-2</td>
                              <td>13246798</td>
                              <td><span class="green circle"></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Running</td>
                            </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="row" style="margin-right: 0px;">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <a href="{{url()}}/setup_new_proj" class="btn btn-primary btn-lg">
                    Setup New Project
                  </a>
              </div>
          </div>
      </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dag List</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://176.9.181.38:8080/admin/" style="width: 100%; height: 500px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@stop
@section('BaseJSLib')
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $('a.home').addClass('active');
    /*$(document).on('click', '.menubutton', function(){
        $(this).hide();
        $('.sidenav').show();
        $('.aside-overlay').show();
    });

    $(document).on('click', '.closebtn, .aside-overlay', function(){
        $('.sidenav').hide();
        $('.aside-overlay').hide();
        $('.menubutton').show();
    });*/

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
@stop
