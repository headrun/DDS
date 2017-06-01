@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Dashboard</title>
@stop

@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">
                Active Projects and Status 
                <button class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal" style="margin-right: 15px;">View Workflow</button>
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
                                  <th>Remove Project</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($q1 as $i=>$value)
                                
                                <tr>
                                  <td>{{$value->proj_name}}</td>
                                  <td align="center"><div class="green circle" style="background-color: {{$value->proj_status}}"></div></td>
                                  <td>{{$value->ta}}</td>
                                  <td>{{$value->fa}}</td>
                                  <td>{{$value->uvmtd}}</td>
                                  <td>{{$value->active_down}}</td>
                                  <td>{{$value->date}}</td>
                                  <td><button type="button" value= '{{$value->proj_name}}' class="btn btn-default btn-sm delete" >
                                        <span class="glyphicon glyphicon-trash"></span> 
                                      </button></td>
                                </tr>
                                
                                @endforeach
                               
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
                  <div class="panel panel-default" style="border-bottom: 4px solid #f8b118;     padding: 26px;">
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
                              <td><span class="green circle"></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;available</td>
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
                              <td>Machine-1</td>
                              <td>13246797</td>
                              <td><span class="green circle"></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Running</td>
                            </tr>
                            <tr>
                              <td>Machine-2</td>
                              <td>13246798</td>
                              <td><span class="green circle"></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Running</td>
                            </tr>
                            <tr>
                              <td>Machine-3</td>
                              <td>13246799</td>
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
  <div class="modal-dialog modal-lg" style="width: 1230px;">

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
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $('a.home').addClass('active');
    /*$(document).on('click', '.menubutton', function(){
        $(this).hide();
        $('.sidenav').show();
        $('.aside-overlay').show();
    });*/

    $(document).on('click', '.delete',function(){
        console.log($(this).val());
        $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/delete_project', // This is the url we gave in the route
            dataType:'json',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'id' : $(this).val()}, // a JSON object to send back
            success: function(response)
            {
               if(response)
              {
                console.log('Done');
                location.reload();
              }
            },
        });
  });

    $(document).ready(function() {
        //setTimeout(function(){
           table =  $('#mainTable').DataTable({
          "searching": false,
          "bPaginate": false,
           //"paging":   false,
            "info":     false,
   
    });
    });
</script>
@stop
