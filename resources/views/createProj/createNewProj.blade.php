@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Setup New Project</title>
@stop

@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/breadcrumb.css">
@stop
@section('BaseContent')
<div class="container-fluid bg">
  <div class="visualization">
      <div class="" style="padding: 10px">

          <div class="panel panel-default" style=" background-color: #FCFCFC; margin-left: -15px; margin-right: -15px">
            <div class="panel-body">
              <div class="progress" style="text-align: center;">
                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                  
                </div>
              </div>
              <div class="row" style="text-align: center">
                <div class="col-md-3">
                  <a href="#" class="active pageBtn" id="setupNewProject">
                    <img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/set_up_new_project.png"><br>Setup New Project</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active pageBtn" id="ingestion"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/ingest.png"><br>Ingest Data</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active pageBtn" id="mapData"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/map.png"><br>Map Data</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active pageBtn" id="kpiPage"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/kpi.png"><br>Mapping KPI</a>
                </div>
              </div>
            </div>
         </div>
          <div class="row widget-11" id="setupNewProjectDiv">
              <div class="widget-title-box" >
                <div class="widget-icon">
                  <img src="{{url()}}/assets/vendor/img/setup_new_project.png" style="width:25px;height:45px; margin-left: 27px;">
                </div>
                <h3 class="widget-title">Setup New Project</h3></div>
              <div>
              <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a; padding: 30px; background-color: #Fff; ">
                <div class = 'project ' style="padding: 10px">
                  <div class= 'row' >
                    <div class = 'col-md-3'>
                      @if(isset($exePrjData))
                        @foreach($exePrjData as $data)
                          <input type = 'text' class ='form-control' style="width: 100% ; text-align: left;" placeholder="Enter Project Name" id= 'project_text' value="{{$data->proj_name}}">
                          <label style="font-size: 10px ; text-align: center;" id="warn"></label>
                          <label style="font-size: 10px ; text-align: center;" id="project_id"></label>
                        @endforeach
                      @else
                        <input type = 'text' class ='form-control' style="width: 100% ; text-align: left;" placeholder="Enter Project Name" id= 'project_text'>
                        <label style="font-size: 10px;text-align: center;" id="warn"></label>
                      @endif
                    </div>
                    <div class = 'col-md-4' style = 'display: -webkit-inline-box;'>
                      <span class='btn btn default'>TA:</span>
                      <select class='form-control' id= 'ta' style="width: 90%">
                        <option></option>
                          @if(isset($exePrjData))
                            @foreach($exePrjData as $data)
                              @foreach($ta as $t)
                                <option {{$data->ta == $t ? 'selected' : ''}}>{{$t}}</option>
                              @endforeach
                            @endforeach
                          @else
                            @foreach($ta as $t)
                              <option>{{$t}}</option>
                            @endforeach
                          @endif
                      </select>
                    </div>
                    <div class = 'col-md-4' style = 'display: -webkit-inline-box;''>
                      <span class='btn btn default'>FA:</span>
                      <select class='form-control' " id = 'fa' style="width: 90%";>
                        <option></option>
                          @if(isset($exePrjData))
                            @foreach($exePrjData as $data)
                              @foreach($fa as $f)
                                <option {{$data->fa == $f ? 'selected' : ''}}>{{$f}}</option>
                              @endforeach
                            @endforeach
                          @else
                            @foreach($fa as $f)
                              <option>{{$f}}</option>
                            @endforeach
                          @endif
                      </select>
                    </div>

                  </div>
                </div>
                <div class="row">  
                  <div class="widget col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h5><label class="kpi-label">Choose A Project</label></h5>
                      <form style="padding-left: 40px" id="choose_project">
                          @if(isset($exePrjData))
                            @foreach($exePrjData as $data)
                              <input type="hidden" name="exeProjTypeCheck" id="exeProjTypeCheck" value="{{$data->proj_type}}">
                              <input type="hidden" name="exeProjSubTypeCheck" id="exeProjSubTypeCheck" value="{{$data->sub_type}}">
                              <input type="hidden" name="exeProjDataCheck" id="exeProjDataCheck" value="{{$data->data}}">
                            @endforeach
                          @else
                            <input type="hidden" name="exeProjTypeCheck" id="exeProjTypeCheck" value="Empty">
                            <input type="hidden" name="exeProjSubTypeCheck" id="exeProjSubTypeCheck" value="New Project">
                            <input type="hidden" name="exeProjDataCheck" id="exeProjDataCheck" value="Empty">
                          @endif

                          <div id="projectType"></div>

                      </form>
                  </div>
                  <div class="widget col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="selecting" id="selecting"></div>
                  </div>
                  <div class="widget col-lg-4 col-md-4 col-sm-4 col-xs-4">                                
                    <form action='{{url()}}/ingestion' method='post' id = 'group'>
                    {{ csrf_field() }}
                      <div id="d-tables" class="row">
                          
                            <div class="row data" id="data1"></div>
                            <div class="row bdf" id="bdf1"></div>
                            <div class="row dim" id="dim1"></div>
                          
                          
                      </div>
                      <div class = 'hide-'>
                        @if(isset($exePrjData))
                          @foreach($exePrjData as $data)
                            <input type='hidden' name= "proj_id" class="proj_id" id="proj_id" value="{{$proj_id}}">
                            <input type='hidden' name= "exe_proj_nam" class="proj_nam" id="exe_proj_nam" value="{{$data->proj_name}}">
                            <input type='hidden' name= "exe_ta" class= "ta" id="exe_ta" value="{{$data->ta}}">
                            <input type='hidden' name= "exe_fa" class= "fa" id="exe_fa" value="{{$data->fa}}">
                            <input type='hidden' name= "exe_proj_type" class= "proj_type" id="exe_proj_type" value="{{$data->proj_type}}">
                            <input type='hidden' name= "exe_proj_sub_type" class= "proj_sub_type" id="exe_proj_sub_type" value="{{$data->sub_type}}">
                          @endforeach
                        @else
                          <input type='hidden' name= "proj_id" class="proj_id" id="proj_id" value="0">
                          <input type='hidden' name= "proj_nam" class="proj_nam" >
                          <input type='hidden' name= "ta" class= "ta" >
                          <input type='hidden' name= "fa" class= "fa" >
                          <input type='hidden' name= "proj_type" class= "proj_type" >
                          <input type='hidden' name= "proj_sub_type" class= "proj_sub_type" >
                        @endif
                        
                      </div>
                      
                        
                      <div class=" row">
                        <button class="btn btn-success btn-md" id= "sidq1" type = "submit" style="display: none">Proceed to Ingest</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row" style="text-align: center; padding: 20px">
                  <button class="btn btn-success btn-md" id= "sidq" type = "submit" disabled>Proceed to Ingest</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row widget-11" id="ingestionDiv" style="display: none">
            <div class="panel panel-default">
              <div class="widget-title-box">
                <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/ingest_data1.png"></div>
                <h3 class="widget-title">Ingest Data</h3>
              </div>
              <div class="row widget-1" style="margin-top: -10px;">
              
                <!--   <a href="{{url()}}/extractor_library" target="_blank" class="btn btn-danger pull-right" style="margin-top: 15px;" >Extractor Library</a>
                 -->
                  <h3 class="widget-title" style="margin-bottom: 10px;">
                  <select class="form-control" style="width: 250px; height:30px; margin-left: -70px;" id="allProjects">
                      
                  </select>
                  </h3>
                      
                      <div class="row">  
                          <!-- <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                          <table class="table" style="font-size:14px" id="mainTable">
                              <thead >
                                <tr>
                                  <th></th>
                                  <th>Data</th>
                                  <th>Source</th>
                                  <th>Type</th>
                                  <th>Sub Type</th>
                                  <th>Extractor</th>
                                  <th>Extractor Input</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody id="ingestionTableBody">
                              
                              </tbody>
                            </table>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <button class="btn btn-default btn-md pull-right">Save Info</button>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-default btn-md select_ingest_btn" disabled>Ingest Selected Data</button>
                            </div>
                            <div class="row text-center" style="padding:20px;">
                            <!-- <div class="col-md-12"> -->
                              
                                      <button class="btn btn-success btn-md move_to_validate " disabled>
                                      Move to Map Data</button>
                                    <!-- </div> -->
                              
                            </div>
                          </div>
                        
                      </div>
                  </div>
              </div>
          </div>
          <div class="row widget-11" style="padding-top: 30px; display: none;" id="mapDataDiv">
          <div class="panel panel-default">
            <div class="widget-title-box">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/map_data.png" style="width:15px;height:45px; margin-left: 40px;"></div>
              <h3 class="widget-title">D-Cube Structure Mapping</h3>
            </div>
            <div class="row" style="margin-top: 30px;">  
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <table class="table" style="font-size:14px" id="mainTable">
                <thead>
                  <tr><center>
                    <th></th>
                    <th>Source Table</th>
                    <th>DCube Table</th>
                    <th style="text-align: center;">Mapping</th>
                    </center>
                  </tr>
                </thead>
                <tbody id="mapTableBody">
                  

                </tbody>
              </table>
              <div class="row" style="padding-top:20px;">
                <button class= 'btn btn-default center-block' id="map_data" data-toggle="modal" data-target="#mpsldt">Map Selected Data</button>
              </div>
              <form action="{{url()}}/kpi_map_new">
                <div class="row" style="padding-top:20px;">
                
                <button type="submit" class= 'btn btn-success mapping_selected_btn center-block' style="margin-bottom: 30px; margin-top: 30px; width: 230px"  disabled>
                Proceed To KPI Mapping</button>
              </div>
              </form>

              
            </div>
                          
            </div>
          </div>
        </div>
      </div>
  </div>
<div id="Database" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Database Screen</h4>
      </div>
      <form name="dbSubTypeData" id="dbSubTypeData" action="{{ url('dbSubType') }}" method="post">
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <h4><label class="lab1">Connection</label></h4>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label class="lab" for="hostName">Host Name</label>
                          <input type="text" id="hostName" name="hostName" class="form-control">
                          <input type="hidden" name="ext_name" id="db_ext_name">
                          <input type="hidden" name="dbTypeName" id="dbTypeName">
                          <input type="hidden" name="dbDataKey" id="dbDataKey">
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="lab" for="portNo">Port</label>
                          <input type="text" id="portNo" name="portNo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="lab" for="dbTypeEmail">Database Name</label>
                          <input type="text" id="dbTypeEmail" name="dbTypeEmail" class="form-control">
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="lab" for="tableName">Table Name</label>
                          <input type="text" id="tableName" name="tableName" class="form-control">
                        </div>  
                    </div>
                </div>

                <!-- second row-->

                <h4 style="padding-top: 10px;"><label class="lab1">Authentication</label></h4>
                <!-- <div class="radio-inline">
                  <input type="radio" name="optradio">Use Credintials
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="usr" disabled>
                </div>

                <div class="radio-inline">
                  <input type="radio" name="optradio">Use Username & Password
                </div> -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="lab" for="userName">Username</label>
                          <input type="text" id="userName" name="userName" class="form-control">
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="lab" for="dbTypePassword">Password</label>
                          <input type="password" id="dbTypePassword" name="dbTypePassword" class="form-control">
                        </div>  
                    </div>
                </div>

                <!-- third row-->
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-6" id="time_zone">
                    <h4 style="padding-top: 10px; margin-left: -15px; "><label class="lab1">Timezone Correction</label></h4>
                    </div>

                    <div class="col-md-6" style="padding-top: 10px;">
                        <div class="form-group">
                          <select name="dbTimeZoneLocation" id="dbTimeZoneLocation" class="form-control">
                              <option>Asia</option>
                              <option>London</option>
                              <option>Africa</option>
                          </select>
                        </div> 
                    </div>
                  </div>
                </div>  
                <div class="row">
                        <div class="col-md-4">
                          <div class="radio-inline lab2">
                          <input type="radio" name="optradio" class="optradio" value="No Correction (Use UTC)">No Correction (Use UTC)
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="radio-inline lab2">
                          <input type="radio" name="optradio" class="optradio" value="Use Local Timezone">Use Local Timezone
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="radio-inline lab2">
                          <input type="radio" name="optradio" class="optradio" value="Use Slected Timezone">Use Selected Timezone
                          </div>
                        </div>
                </div>
                    

                <!-- foutth row-->

                <h4 style="padding-top: 10px;"><label class="lab1">Misc</label></h4>
                <div class="row">
                    <div class="col-md-12" id="miscChckbox">
                        <!-- <div class="checkbox"> -->
                          <label class="lab2"><input type="checkbox" class="time_zone" name="miscChecked[]" value="Allow Spaces in column names">Allow Spaces In Column Names</label>
                        <!-- </div> -->
                        <!-- <div class="checkbox"> -->
                          <label class="lab2" style="margin-left: 20px"><input type="checkbox" class="time_zone" name="miscChecked[]" value="Validate connections on close">Validate Connections On Close</label><br>
                        <!-- </div> -->
                        <!-- <div class="checkbox"> -->
                          <label class="lab2"><input type="checkbox" class="time_zone" name="miscChecked[]" value="Retrieve metadata in config">Retrieve Metadata In Config</label>
                        <!-- </div> -->
                    </div>
                </div>
                @if(isset($values))
                  <div class="row hide">
                      <div class="col-md-12" id="miscChckbox">

                        @foreach($values as $value)
                          @if(gettype($value) != 'integer')
                            <div class="checkbox">
                              <label><input type="checkbox" class="time_zone" name="miscChecked[]" value="{{ $value }}" checked>{{ $value }}</label>
                            </div>
                          @endif
                        @endforeach

                      </div>
                  </div>
                @endif
            </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: center;  ">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="button" class="btn btn-default modal_ok" style="width:15%;">Ok</button>
        <button type="button" class="btn btn-success" style="width:20%;">Apply</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" style="width:20%;">Cancel</button>
        <!-- <span style="margin-right: 60px;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span> -->
      </div>
      </form>
    </div>

  </div>
</div>

<div id="JSON" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">API Modal</h4>
      </div>
      <div class="modal-body">
          
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Settings</a></li>
            <li><a data-toggle="tab" href="#menu1">Flow Variables</a></li>
            <li><a data-toggle="tab" href="#menu2">Memory Policy</a></li>
          </ul>

        <form name="jsonSubTypeData" id="jsonSubTypeData" enctype="multipart/form-data">
          <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                  <h4 style="padding-top: 20px;"><label>Input Location</label></h4>
                  <div class="row">
                      <div class="col-md-7">
                          <input type="hidden" name="ext_name" id="json_ext_name">
                          <input type="hidden" name="jsonTypeName" id="jsonTypeName">
                          <input type="hidden" name="jsonDataKey" id="jsonDataKey">
                          <div class="form-group">
                            <select name="jsonTimeZoneLocation" id="jsonTimeZoneLocation" class="form-control">
                                <option>Asia</option>
                                <option>London</option>
                                <option>Africa</option>
                            </select>
                          </div>  
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                            <div ><input type='hidden' id="jsonFileName" name="jsonFileName"></div>
                            <div><input type='file'  accept='image/*' onchange='openFile(event)' id="choosefile1" style="display: none"></div>
                            <div><button class="btn btn-primary" id="choosefile" type="button">Click To Upload File</button></div>
                          </div>
                      </div>
                  </div>
                  <!-- second row-->
                  <h4 style="padding-top: 20px;"><label>reader page</label></h4>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="jsonEmail">Output Column Name:</label>
                            <input type="email" id="jsonEmail" name="jsonEmail" class="form-control">
                          </div>  
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12" id="jRememberMe">
                          <div class="checkbox">
                            <label><input type="checkbox" id="jsonRememberMe" class="jsonRememberMe" name="jsonRememberMe" value="Remember Me">Remember me</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="jsonPassword">API Path:</label>
                            <input type="password" id="jsonPassword" name="jsonPassword" class="form-control">
                          </div>  
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12" id="pathNotFoundAndAllowComments">
                          <div class="checkbox">
                            <label><input type="checkbox" name="pathNotFoundAndAllowComments[]" value="Fail if path not found">Fail if path not found</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name="pathNotFoundAndAllowComments[]" value="Allow Comments in JSON file">Allow Comments in JSON file</label>
                          </div>
                      </div>
                  </div>

                  </div>

            </div>
            <div id="menu1" class="tab-pane fade"></div>
            <div id="menu2" class="tab-pane fade"></div>
      </div>
            
      <div class="modal-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="button" class="btn btn-default modal_ok">Ok</button>
        <button type="button" class="btn btn-default">Apply</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <span style="margin-right: 60px;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- S3 Modal Starts -->
<div class="modal fade" id="S3" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">S3 Modal</h4>
      </div>
      <form name="s3SubTypeData" id="s3SubTypeData" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          <div id='file'>
            <br>
            <input type="hidden" name="ext_name" id="s3_ext_name">
            <input type="hidden" name="s3TypeName" id="s3TypeName">
            <div ><input type='hidden' id="s3DataKey" name="s3DataKey"></div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="userName">Key:</label>
                    <input type="text" id="s3Key" name="s3Key" class="form-control">
                  </div>  
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="userName">Secret:</label>
                    <input type="text" id="s3Secret" name="s3Secret" class="form-control">
                  </div>  
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="userName">Bucket:</label>
                    <input type="text" id="s3Bucket" name="s3Bucket" class="form-control">
                  </div>  
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="userName">File:</label>
                    <input type="text" id="s3File" name="s3File" class="form-control">
                  </div>  
              </div>
          </div>        
      </div>
      <div class="modal-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="button" class="btn btn-default modal_ok">Ok</button>
        <button type="button" class="btn btn-default">Apply</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <span style="margin-right: 60px;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="CSV" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CSV</h4>
      </div>
      <form name="csvSubTypeData" id="csvSubTypeData" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          <div id='file'>
            <br>
            <input type="hidden" name="ext_name" id="csv_ext_name">
            <input type="hidden" name="csvTypeName" id="csvTypeName">
            <input type="hidden" name="fileName" id="fileName" value="">
            <div ><input type='hidden' id="csvDataKey" name="csvDataKey"></div>
            <!-- <img id="output"> -->
            <div ><input type='hidden' id="csvFileName" name="csvFileName"></div>
            <div><input type='file' class="upload_image" accept='image/*' id="choosefil1" style="display: none"></div>
            <div><button class="btn btn-default" id="choosefil" type="button">Click To Upload File</button>
            <label id="message"></label>
            </div>
          </div>
          <hr>
          <h4><label>Readen Options</label></h4>
        <br>
        <div class="row">
          <div class ='col-md-6'>
            <div>
              <label for="colDelimiter">Column Delimiter</label>
              <input class = 'form-control' type='text' id="colDelimiter" name="colDelimiter" style="width: 50px"/> 
              
            </div>
          </div>
          <div class ='col-md-6'>
            <div>
              <label for="rowDelimiter">Row Delimiter</label>
              <input class = 'form-control' id="rowDelimiter" name="rowDelimiter" type='text' style="width: 50px"/> 
              
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class ='col-md-6'>
            <div>
              <label for="quoteChar">Quote Char</label>
              <input class = 'form-control' id="quoteChar" name="quoteChar" type='text' style="width: 50px"/> 
              
            </div>
          </div>
          <div class ='col-md-6'>
            <div>
              <label for="commentChar">Comment Char</label>
              <input class = 'form-control' id="commentChar" name="commentChar" type='text' style="width: 50px"/> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class ='col-md-6' id="viewResult">
            <div class ='checkbox'>
              <label><input name="viewResult[]" type='checkbox' value="Has Column Header">Has Column Header
            </label>
            </div>

            <div class ='checkbox'>
            <label><input name="viewResult[]" type='checkbox' value="Has Row Header">Has Row Header
            </label>
            </div>

            <div class ='checkbox'>
            <label><input name="viewResult[]" type='checkbox' value="Support Short Lines">Support Short Lines
            </label>
            </div>

            <div class ='checkbox'>
            <label><input name="viewResult[]" type='checkbox' value="Skip First Lines">Skip First Lines
            </label>
            </div>

            <div class ='checkbox'>
            <label><input name="viewResult[]" type='checkbox' value="Limit rows">Limit rows
            </label>
            </div>

          </div>
          <div class ='col-md-6' style="margin-top: 15px">
            <div>
                <label>
                  <select name="sel1" class="form-control" id="sel1" >
                    @for($i= 0 ; $i<=10; $i++)
                        <option>{{$i}}</option>
                    @endfor
                  </select>
                </label>
            </div>

            <div>
            <label>
              <select name="sel2" class="form-control" id="sel2" >
              
              @for($i= 0 ; $i<=50; $i++)
                  <option>{{$i}}</option>
              @endfor
              </select>

            </label>
            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="button" class="btn btn-default modal_ok">Ok</button>
        <button type="button" class="btn btn-default">Apply</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <span style="margin-right: 60px;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ingest_started" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content" style="width:600px;">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><label>Ingestion Started</label></h4>
      </div>
      <div class="modal-body">
          
      <div class="row">
        <div class="col-md-12">
          <div id="ing">
            
          </div>
        </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success center-block" data-dismiss="modal" style="width: 150px; height: 50px; text-align: center;">Ok</button>
      </div>
    </div>
  </div>
</div>

<div id="mpsldt" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mapping Started</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px">
          <div id= 'text_add'></div>
          <!-- <div>
            <input type="text" name="mapData" id="mapData" class="form-control">
          </div> -->
        </div>
        <div class="modal-footer">
          <button style="width: 100px" type="button" class="btn btn-success center-block" id="saveMapData" data-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>




@stop

@section('BaseJSLib')
<script>
  
  function projectType(){
    var prjType = ['Pre Launch','Brand Launch','RWE','Digital Analytics','Social Media','Supply Chain','New Projecct'];
    var prjTypeArr = '<select class="form-control" id="choose_project1" style="margin-left: -30px;">';
    prjTypeArr += '<option selected disabled></option>';

    for (var i = 0; i < prjType.length; i++) {
      if ($('#exeProjTypeCheck').val() == prjType[i]) {
        prjTypeArr += 
                      '<option name="optradio" class="optradio" value="'+prjType[i]+'" selected>'+prjType[i]+'</option>';
                    

      } else {
        prjTypeArr += 
                      '<option name="optradio" class="optradio" value="'+prjType[i]+'">'+prjType[i]+
                    '</option>';
      }
      
    }
    prjTypeArr += '</select>';
    $('#projectType').html(prjTypeArr);
  }

  $(document).on('change','#choose_project1',function(){ 
      
      var value = $(this).val();
      console.log(value);
      $.ajax({
          method: 'POST', 
          url: '{{url()}}/save_proj_into_session',
          dataType:'json',
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
          data: {'value' : value},
          success: function(response) { 
              
              console.log(response.data);   
          }
      });
  });

  $(document).ready(function(){
    window.buttonIds = ['setupNewProject','ingestion','mapData','kpiPage']
    var sceenId = ['setupNewProjectDiv','ingestionDiv','mapDataDiv','kpiPageDiv'];
    var currentPage = buttonIds[0];
      projectType();
      
      var checkProjType = $('#exeProjTypeCheck').val();
      var checkProjSubType = $('#exeProjSubTypeCheck').val();
      var checkProjSubTypeArr = [];
      var exeProjDataCheck = $('#exeProjDataCheck').val();


      if (checkProjType != 'Empty' && checkProjSubType != 'New Project') {
        $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/test', // This is the url we gave in the route
            dataType:'html',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'id' : checkProjType, 'checkProjSubType': checkProjSubType}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
                // console.log(response);   
                $('.selecting').html(response).contents();
           
            },
        });
      }
        $(document).on('change','#choose_project1',function(){ 
          console.log($(this).val());
        $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/test', // This is the url we gave in the route
            dataType:'html',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'id' : $(this).val(), 'checkProjSubType': checkProjSubType}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
                // console.log(response);   
                $('.selecting').html(response).contents();
           
            },
        });
      });

      if (exeProjDataCheck != 'Empty' && checkProjSubType != 'New Project') {
        checkProjSubTypeArr = checkProjSubType.split(",");
        // console.log(checkProjSubType);
        if (checkProjSubTypeArr.length > 0) {
          $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/test1', // This is the url we gave in the route
            dataType:'json',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: {'id' : checkProjSubTypeArr, 'key': true}, // a JSON object to send back
            success: function(response){ 
              // console.log(response);
              var d = response.data;
              var test = response.data;
              var data ='<div class="row"><div class="col-md-6"><h4>Data Tables</h4></div>';
              var bdf = '<div class="row"><div class="col-md-6"><h4>Bridge Files</h4></div><div class="col-md-6">';
              var dim = '<div class="row"><div class="col-md-6"><h4>Dimension table (Optional)</h4></div><div class="col-md-6">';
              data += "<div class = 'col-md-6'>";
              for (var ele = 0; ele < test.length; ele++) {
                d = test[ele];
                for (var i = 0; i < d.length; i++) {
                  if (d[i].category==='Data'){
                    if (d[i].description != 'Aggregated Rx Data') { 
                      data += "<div class = 'checkbox'>"+
                      //"<a href ='#' data-toggle = 'popover'>"+
                      "<label class = 'active' style='margin-bottom: -5px;'>"+
                      "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
                      data +="</label>";
                      data +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
                      data +="</div>";
                    }
                      
                  }
                  if (d[i].category==='Bridging File'){
                      bdf += "<div class = 'checkbox'>"+
                     // "<a href ='#' data-toggle = 'popover'>"+
                      "<label class = 'active' style='margin-bottom: -5px;'>"+
                      "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
                      bdf +="</label>";
                      bdf +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
                      bdf +="</div>";
                      

                  }
                  if (d[i].category==='Dimension'){
                    dim += "<div class = 'checkbox'>"+
                      //"<a href ='#' data-toggle = 'popover'>"+
                      "<label class = 'active' style='margin-bottom: -5px;'>"+
                      "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
                      dim +="</label>";
                      dim +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
                      dim +="</div>";
                      
                  }
                }
              }
              
              data +="</div>";
            data +="</div>";
            bdf +="</div>";
            bdf +="</div>";
            dim +="</div>";
            dim +="</div>";
              var data1= data+bdf+dim;
              $('#d-tables .data').html(data).contents();
              $('#d-tables .bdf').html(bdf);
              $('#d-tables .dim').html(dim);  

              if ($('#project_text').val() != '' && $('#ta').val() != '' && $('#fa').val() != '') {
                $(':input[type="submit"]').prop('disabled', false);
              }
         
            }
          });
        }
      }

    });

/*$(document).ready(function(){
  
    $('input[type=radio][name=optradio]').change(function(){
    $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/test', // This is the url we gave in the route
        dataType:'html',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
      },
        data: {'id' : $(this).val()}, // a JSON object to send back
        success: function(response)
        { 
            //console.log(response);
            console.log(response);
           

            var d = '<button class="btn btn-success btn-md  pull-right" id= "sidq" type = "submit" disabled>Proceed to Ingestion</button>'
            $('#d-tables .data').contents().remove();
            $('#d-tables .bdf').contents().remove();
            $('#d-tables .dim').contents().remove();
            //$('#sidq').remove();
            $('.check').html(d);
            $('.selecting').html(response).contents();
            //$(':input[type="submit"]').prop('disabled', true);
        },

    });
  });
});*/
$(document).on('change', '#project_text', function(){
    $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/test2', // This is the url we gave in the route
        dataType:'json',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'id' : $(this).val()}, // a JSON object to send back
        success: function(response)
        { 
          if(response.data.length)
          {
             $('#warn').html("Project Name Already Exists");
          }
          else
          {
            $('#warn').html("");
          }
        }

    });
});
$(document).on('change', '#project_text', function(){

      $('.proj_nam').val($(this).val());
      console.log($('.proj_nam').val());
      $('.progress-bar').css("width","5%");


});
$(document).on('change', '#ta', function()
   {
      $('.ta').val($(this).val());
      console.log($('.ta').val());
      $('.progress-bar').css("width","7%");
    });
$(document).on('change', '#fa', function()
   {
      $('.fa').val($(this).val());
      console.log($('.fa').val());
      $('.progress-bar').css("width","10%");
    });

$(document).on('change', '#choose_project1', function()
   {
      $('.proj_type').val($(this).val());
      console.log($('.fa').val());
      $('.progress-bar').css("width","15%");
      
    });

  $(document).on('change', '.sid', function()
   {
      var widget_array1 =  [];
      var widget_array =  [];
      $('.progress-bar').css("width","35%");
      widget_array1 = [$('#project_text').val(),$('#ta').val(),$('#fa').val()];
      // console.log(widget_array1);
      $('.form-group input[type="checkbox"]:checked').each(function(){ 
        
        widget_array.push($(this).val());

      });
      $('.proj_sub_type').val(widget_array);
      // console.log('On Change function sends value of: '+widget_array);
      if (widget_array.length){
      $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/test1', // This is the url we gave in the route
        dataType:'json',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'id' : widget_array}, // a JSON object to send back
        success: function(response)
        { 
            // var d= response;
            // var data ='<h4>Data Tables</h4>';
            // var bdf = '<h4>Bridge Files</h4>';
            // var dim = '<h4>Dimension table (Optional)</h4>';
            var desc_array = [];
            var d = response.data;
            var test = response.data;
            var data ='<h5><label style="font-size: 15px;">Data Tables</label></h5>';
            data +='<div class="row"><div class="col-md-6"><h5>Data Tables</h5></div>';
            var bdf = '<div class="row"><div class="col-md-6"><h5>Bridge Files</h5></div><div class="col-md-6">';
            var dim = '<div class="row"><div class="col-md-6"><h5>Dimension table (Optional)</h5></div><div class="col-md-6">';
            data += "<div class = 'col-md-6'>";
            for (var ele = 0; ele < test.length; ele++) {
              d = test[ele];
              for (var i = 0; i < d.length; i++) {

                 if(desc_array.indexOf(d[i].description) == -1)
                 {  
                    desc_array.push(d[i].description);  
                    
                if (d[i].category==='Data'){
                          

                    
                    data += "<div class = 'checkbox'>"+
                    //"<a href ='#' data-toggle = 'popover'>"+
                    "<label class = 'active' style='margin-bottom: -5px;'>"+
                    "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
                    data +="</label>";
                    data +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span>";
                    data +="</div>";
                    
                    
                  
                  
                }

                if (d[i].category==='Bridging File'){
                    bdf += "<div class = 'checkbox'>"+
                   // "<a href ='#' data-toggle = 'popover'>"+
                    "<label class = 'active' style='margin-bottom: -5px;'>"+
                    "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
                    bdf +="</label>";
                    bdf +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
                    bdf +="</div>";
                    

                }
                if (d[i].category==='Dimension'){
                  dim += "<div class = 'checkbox'>"+
                    //"<a href ='#' data-toggle = 'popover'>"+
                    "<label class = 'active' style='margin-bottom: -5px;'>"+
                    "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
                    dim +="</label>";
                    dim +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
                    dim +="</div>";
                    
                }
              }}
            }

            // for (var i = 0; i < d.length; i++) {
            //   if (d[i].category==='Data'){
            //     if (d[i].description != 'Aggregated Rx Data') {
            //       data += "<div class = 'checkbox'>"+
            //       //"<a href ='#' data-toggle = 'popover'>"+
            //       "<label class = 'active' style='margin-bottom: -5px;'>"+
            //       "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
            //       data +="</label>";
            //       data +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
            //       data +="</div>";
            //     }
                  
            //   }
            //   if (d[i].category==='Bridging File'){
            //       bdf += "<div class = 'checkbox'>"+
            //      // "<a href ='#' data-toggle = 'popover'>"+
            //       "<label class = 'active' style='margin-bottom: -5px;'>"+
            //       "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
            //       bdf +="</label>";
            //       bdf +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
            //       bdf +="</div>";
                  

            //   }
            //   if (d[i].category==='Dimension'){
            //     dim += "<div class = 'checkbox'>"+
            //       //"<a href ='#' data-toggle = 'popover'>"+
            //       "<label class = 'active' style='margin-bottom: -5px;'>"+
            //       "<input type='checkbox'  class='test2' checked  name = 'check_box[]' value='"+d[i].description+"'>";
            //       dim +="</label>";
            //       dim +="<span class='text' style='cursor: pointer;'>"+d[i].description+"</span><br>";
            //       dim +="</div>";
                  
            //   }
            // }
            data +="</div>";
            data +="</div>";
            bdf +="</div>";
            bdf +="</div>";
            dim +="</div>";
            dim +="</div>";
            var data1= data+bdf+dim;
            $('#d-tables .data').html(data).contents();
            $('#d-tables .bdf').html(bdf);
            $('#d-tables .dim').html(dim);  

            if ($('#project_text').val() != '' && $('#ta').val() != '' && $('#fa').val() != '') {
              $(':input[type="submit"]').prop('disabled', false);
            }
       
          },
      });
    }
    var hidden=
    $('#d-tables .hide').html(hidden);
   });


$(document).on('change', '#group', function()
 {
      var widget_array1 =  [];
      var widget_array2 =  [];
      if ($('#project_text').val() != '' && $('#ta').val() != '' && $('#fa').val() != '') {

        $('.data input[type="checkbox" ]:not(:checked)').each(function(){ 

            widget_array1.push($(this).val());
            console.log(widget_array1);
        });
        $('.bdf input[type="checkbox" ]:not(:checked)').each(function(){ 

            widget_array2.push($(this).val());
            console.log(widget_array2);
        });
        if((widget_array1.length) == 0 && (widget_array2.length) == 0)
        {
            $('#sidq.btn').prop('disabled', false);
        }
        else
        {
            $('#sidq.btn').prop('disabled', true); 
        }
      }
});

$(document).on('click','.text',function(){ 
 var id = $(this).text().trim(); 

    if ( id === "Territory Alignment" ) {
      id = "TerritoryAlignment";
    }else if ( id === "Physican Rx Data" ) {
      id = "PrescriberRxData";
    }/*else if ( id === "Aggregated Rx Data" ) {
      id = "AggregatedRxData";
    }*/else if ( id === "Payor Plan to Claims" ) {
      id = "PayorPlantoClaims";
    }else if ( id === "Payor Plan Data" ) {
      id = "PayorPlanData";
    }else if ( id === "Product Dimension" ) {
      id = "ProductDimension";
    }else if( id === "Plan Dimension" ){
      id = "PlanDimension";
    }else if ( id === "Rejection Reason" ) {
      id = "RejectionReason";
    }else if ( id === "Prescriber Source") {
      id = "PrescriberSource";
    }else if ( id === "Patient Dimension" ) {
      id = "PatientDimension";
    }else if ( id === "Prescribder Alignment") {
      id = "PrescribderAlignment";
    }else if ( id === "Prescriber Details Dimension" ) {
      id = "PrescriberDetailsDimension";
    }

    $('#setUpNewProject').find('.modal-body').html(document.querySelector('#'+id).cloneNode(true));
    $('#setUpNewProject').find('#'+id).css('display', 'table');
    $('#setUpNewProject').modal('show');
});
$( "#sidq" ).on( "click", function() {
  var setUpProjcheckbox = [];
  $('.test2:checked').each(function(){
    setUpProjcheckbox.push($(this).val());
  });
  var sub_type = [];
  $('.sid:checked').each(function(){
    sub_type.push($(this).val());
  });
  
  var object = {
    'check_box' : setUpProjcheckbox,
    'proj_id' : 0,
    'proj_nam' : $('#project_text').val(),
    'ta' : $('#ta').val(),
    'fa' : $('#fa').val(),
    'proj_type' : $('#choose_project1').val(),
    'proj_sub_type' : sub_type,

  };

  $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/ingestion', // This is the url we gave in the route
        dataType:'json',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: object, // a JSON object to send back
        success: function(response)
        { 
          intitalizeTableBody(response.data.thisProject);
          window.projectId = response.data.projectId;
          intitalizeAllProjectDropDown(response.data.allProjects,response.data.projectName);
          $('#ingestionDiv').show();
          $('#setupNewProjectDiv').hide();
        }
      });
});
$('.pageBtn').on('click',function(){
  markCurrentDiv($(this).attr('id'),window.buttonIds);
});
function markCurrentDiv(current,buttonIds)
{
  for (var i = buttonIds.length - 1; i >= 0; i--) {
    $('#'+buttonIds[i]+'Div').hide();
    if(buttonIds[i] == current)
      $('#'+buttonIds[i]+'Div').show();
    
  }
}
function intitalizeAllProjectDropDown(data,projectName)
{
  var html = "";
  for (var i = 0; i < data.length; i++) {
    if(data[i] == projectName) html += '<option selected>'+data[i]+' </option>'
    else html += '<option>'+data[i]+' </option>'
  }
  $('#allProjects').html(html);
}
function intitalizeTableBody(data)
{
  var html = "";
  for (var i = 0; i < data.length; i++) {
    var value = data[i].data;
    html += '<tr class="each_row"><div class="checkbox"><td>';
    html += '<label><input type="checkbox" class="ingest_chkbox" value="'+value+'" disabled style="margin-left: 20px"></label></div></td>';
    html += '<td>'+value+'<input type="hidden" class="data_name" id="dataKey" value="'+value+'"></td>';
    html += '<td><select class="form-control source_name sourceName">';
    html += '<option></option>';
    for (var j = data[i].sources.length - 1; j >= 0; j--) {
      html += '<option>'+data[i].sources[j].source+'</option>';
    }
    html += '</select></td>'
    html += '<td><select class="form-control type_name typeName"></select></td><td><select class="form-control subtype_name subTypeName"></select></td><td class="extractor_name"></td><td><button class="btn btn-default btn-sm give_inputs" disabled>Give Inputs</button></td><td class="last_col_tick"></td></tr>'  
                                        
  }
  $('#ingestionTableBody').html(html);
                                   
}

                                            
                                              
                                            
                                        
                                    
                                        
                                        
</script>
<script type="text/javascript">
  var progress_bar = 35;
    $('.upload_image').on('change',function() {
      var formData = new FormData();
      $('#message').html('loading...');
      formData.append('file', $(this)[0].files[0]);
      $.ajax({
             url: "http://13.57.91.69/DDS/storeFile",
             type : 'POST',
             data : formData,
             processData: false,  // tell jQuery not to process the data
             contentType: false,  // tell jQuery not to set contentType
             // headers: {
                  
           //         'X-CSRF-TOKEN': "{{ csrf_token() }}",
                 // },
             success : function() {
                    $( "#message" ).text( "successfully uploaded" );
                     setTimeout(function(){
                        $( "#message" ).text(" ");
                     }, 10000);
             }
      });
      console.log($(this).val());
    });
    var openFile = function(event) {
      var input = event.target;

      var reader = new FileReader();
      reader.onload = function(){
        var dataURL = reader.result;

        if ($('#jsonTypeName').val() == 'API') {
          $('#jsonFileName').val(dataURL);
        } else {
          $('#csvFileName').val(dataURL);
        }
        // var output = document.getElementById('output');
        // output.src = dataURL;
      };
      reader.readAsDataURL(input.files[0]);
    };

    $('a.ingest').addClass('active');


    function sendAjaxToGetPopupDate(id, ext_name, type) {
        ext_name = ext_name.trim();

        id = parseInt(id);
        console.log(ext_name);
        console.log(id);
        console.log(type);

        $('#dbSubTypeData')[0].reset();
        $('#jsonSubTypeData')[0].reset();
        $('#csvSubTypeData')[0].reset();

        $.ajax({

            url: '{{url()}}/getIngestionData',
            type: "POST",
            dataType: 'json',
            headers: {
                
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: {'id': id, 'ext_name': ext_name},

            success:function(resp){

                if (resp.status == "success") {
                  var res = resp.data.extIngData[0];
                  var misc_arr = [];

                  if (type == 'Database') {
                    $('#hostName').val(res.host_name);
                    $('#portNo').val(res.port_no);
                    $('#dbTypeEmail').val(res.db_name);
                    $('#tableName').val(res.table_name);
                    $('#userName').val(res.user_name);
                    $('#dbTypePassword').val(res.password);
                    
                    $('#time_zone').find('input[type="radio"]').each(function(){
                      if ( $(this).val() === res.time_zone ) {
                        $(this).attr("checked", true);  
                      }
                    });

                    var miscArr = JSON.parse(res.misc);
                    for (var i = 0; i < miscArr.length; i++) {
                      $('#miscChckbox').find('input[type="checkbox"]').each(function(){
                        if ( $(this).val() === miscArr[i] ) {
                          $(this).attr("checked", true);
                        }
                      });
                    }

                    $('#dbTimeZoneLocation').val(res.time_zone_location);
                    // $('#miscChckbox').val(res.user_name);
                    for (var i = 0; i < res.misc.length; i++) {
                      
                    }

                    $('#miscChckbox').find('input[type="checkbox"]:checked').each(function(){
                      // $('.time_zone').attr("checked", true);
                      $(this).attr("checked", true);
                    });
                    
                    for (var dim = 0; dim < misc_arr.length; dim++) {
                        $('input[value="'+misc_arr[dim]+'"]').attr('checked', 'true');
                    }

                  } else if (type == 'API') {
                    var pathAndCommentsArr = JSON.parse(res.path_not_found_and_allow_comments);
                    var jsonRememberMe = res.remember_me;

                    $('#jsonTimeZoneLocation').val(res.json_time_zone_location);
                    $('#jsonEmail').val(res.reader_page_name);
                    // $('#jsonRememberMe').val(res.remember_me);

                    // $('#jsonRememberMe').find('input[type="checkbox"]:checked').each(function(){
                    //   console.log($(this).val());
                    //   if ( $(this).val() == jsonRememberMe ) {
                    //       $('#jsonRememberMe').attr("checked", true);
                    //     }
                    // });

                    $('#jsonRememberMe').attr("checked", true);

                    for (var dim = 0; dim < jsonRememberMe.length; dim++) {
                        $('input[value="'+jsonRememberMe[dim]+'"]').attr('checked', 'true');
                    }

                    $('#jsonPassword').val(res.json_path);

                    $('#pathNotFoundAndAllowComments').find('input[type="checkbox"]:checked').each(function(){
                      $(this).attr("checked", true);
                    });
                    
                    for (var dim = 0; dim < pathAndCommentsArr.length; dim++) {
                        $('input[value="'+pathAndCommentsArr[dim]+'"]').attr('checked', 'true');
                    }
                  } else if (type == 'S3') {

                    $('#s3Key').val(res.s3_key);
                    $('#s3Secret').val(res.s3_ecret);
                    $('#s3Bucket').val(res.s3_bucket);
                    $('#s3File').val(res.s3_file);
                  }  else {
                    var viewResult = JSON.parse(res.view_res);

                    $('#colDelimiter').val(res.col_delimiter);
                    $('#rowDelimiter').val(res.row_delimiter);
                    $('#quoteChar').val(res.quote_char);
                    $('#commentChar').val(res.comment_char);
                    $('#viewResult').val(res.col_delimiter);
                    $('#viewResult').find('input[type="checkbox"]:checked').each(function(){
                      $(this).attr("checked", true);
                    });
                    
                    for (var dim = 0; dim < viewResult.length; dim++) {
                        $('input[value="'+viewResult[dim]+'"]').attr('checked', 'true');
                    }
                    $('#sel1').val(res.num_1);
                    $('#sel2').val(res.num_2);
                  }

                } else{

                }
            }
        });

    }

    $(document).on('click','.give_inputs',function(){

        var type_name = $(this).closest('.each_row').find('.type_name').val();
        var subtype_name = $(this).closest('.each_row').find('.subtype_name').val();

        window.tick = $(this).closest('.each_row').find('.extractor_name').text();
        var extractor_name = $(this).closest('.each_row').find('.extractor_name').text();
        var extractor_name = extractor_name.trim();
        // console.log(extractor_name);
        var dataKey = $(this).closest('.each_row').find('#dataKey').val();
        var newPrj = $('#newPrj').val();
        var project_id = $('#project_id').val();
        // console.log(project_id);
        
        $('#dbSubTypeData')[0].reset();
        $('#jsonSubTypeData')[0].reset();
        $('#csvSubTypeData')[0].reset();

        // $('#dbDataKey').val('');
        // $('#jsonDataKey').val('');
        // $('#csvDataKey').val('');
        // $('#db_ext_name').val('');

        if (type_name == "Database") {
            $('#dbTypeName').val(type_name);
            $('#jsonTypeName').val('');
            $('#s3TypeName').val('');
            $('#csvTypeName').val('');
            $('#db_ext_name').val(extractor_name);
            $('#dbDataKey').val(dataKey);

            if (newPrj != 'New Project') {
              sendAjaxToGetPopupDate(project_id, extractor_name, type_name);
            }

            $('#Database').modal('show');

        }else if(type_name == 'API'){
            $('#jsonTypeName').val(type_name);
            $('#s3TypeName').val('');
            $('#dbTypeName').val('');
            $('#csvTypeName').val('');
            $('#json_ext_name').val(extractor_name);
            $('#jsonDataKey').val(dataKey);

            if (newPrj != 'New Project') {
              sendAjaxToGetPopupDate(project_id, extractor_name, type_name);
            }

            $('#JSON').modal('show');
        
        }else if(type_name == 'FLAT FILE' || subtype_name == 'CSV'){
            $('#csvTypeName').val(type_name);
            $('#s3TypeName').val('');
            $('#dbTypeName').val('');
            $('#jsonTypeName').val('');
            $('#csv_ext_name').val(extractor_name);
            $('#csvDataKey').val(dataKey);

            if (newPrj != 'New Project') {
              sendAjaxToGetPopupDate(project_id, extractor_name, type_name);
            }

            $('#CSV').modal('show');
        }else if(type_name == 'S3'){
            $('#s3TypeName').val(type_name);
            $('#csvTypeName').val('');
            $('#dbTypeName').val('');
            $('#jsonTypeName').val('');
            $('#s3_ext_name').val(extractor_name);
            $('#s3DataKey').val(dataKey);

            if (newPrj != 'New Project') {
              sendAjaxToGetPopupDate(project_id, extractor_name, type_name);
            }

            $('#S3').modal('show');
        }

        
    });
    
    window.extract = [];
  
    $(document).on('click', '.modal_ok', function(event){
        event.preventDefault();

        window.extract.push(window.tick);
        var that = $(this);
        var dbTypeName = $('#dbTypeName').val();
        var jsonTypeName = $('#jsonTypeName').val();
        var csvTypeName = $('#csvTypeName').val();
        var s3TypeName = $('#s3TypeName').val();
        var project_id = $('#project_id').val();
        var filename = $('#fileName').val();

        // Database type data
        var serializedData = '';
        if (dbTypeName) {
          serializedData = $('#dbSubTypeData').serialize();  
          console.log('Database Data: \n'+serializedData);
        } else if (jsonTypeName) {
          if (!jQuery('#jsonRememberMe').is(':checked')) {
              var jsonRememberMe = '';
          }
          if (!jQuery('#pathNotFoundAndAllowComments').is(':checked')) {
              var pathAndCom = '';
          }
          serializedData = $('#jsonSubTypeData').serialize();
          console.log('Json Data: \n'+serializedData);
        } else if(csvTypeName){
          serializedData = $('#csvSubTypeData').serialize();
          console.log('CSV Data: \n'+serializedData);
        } else if(s3TypeName){
          serializedData = $('#s3SubTypeData').serialize();
          console.log('S3 Data: \n'+serializedData);
        }


        $.ajax({

            url: '{{url()}}/saveIngestionData',
            type: "POST",
            dataType: 'json',
            headers: {
                
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: {'project_id': window.projectId, 'serializedData': serializedData, 'name':filename},

            success:function(resp){

                if (resp.status == "success") {
                  console.log(resp);
                }
            }
        });

        $('.extractor_name').each(function(){

            if ($(this).closest('.each_row').find('.extractor_name').text() == window.tick) {

                $(this).closest('.each_row').find('.last_col_tick').html('<img src="{{url()}}/assets/vendor/img/tick.png" style="width:25px;height:20px">');

                $(this).closest('.each_row').find('.ingest_chkbox').prop('checked', true);

                $(this).closest('.each_row').find('.ingest_chkbox').attr('disabled', false);

                $('.select_ingest_btn').attr('disabled', false);
          
                

                var widget_array1 =  [];

                var widget_array2 =  [];
                
                var html='';

                $(' input[type="checkbox" ]:checked').each(function(){ 
                     
                     widget_array1.push($(this).val());

                     widget_array2.push($(this).closest('.each_row').find('.source_name').val());                     

                     
                });
                
                for(var i=0;i<widget_array1.length;i++){
                  
                  html +="<input type='hidden' name = 'checkbox[]'value='"+widget_array2[i]+"_"+widget_array1[i]+"'>"
                  console.log(html);
                }
                
                $('#hidden').html(html);
            }
        });

        $(that).closest('.modal').modal('hide');
    });

    $(document).on('change', '.source_name', function(){
        progress_bar = 40;
        $('.progress-bar').css("width",progress_bar+"%");
        var source_name = $(this).val();

        var that = $(this);

        var data_name = $(this).closest('.each_row').find('.data_name').val();

        $.ajax({

            url: '{{url()}}/getTypes',
            
            type: "POST",

            dataType: 'json',

            headers: {
                
                 'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },

            data: {'data_name': data_name, 'source_name': source_name},

            success:function(resp){

                if (resp.status == "success") {

                    if (resp.data.length > 0) {

                        var options = "<option></option>";

                        for (var i = 0; i < resp.data.length; i++) {
                            
                            options += '<option value="'+resp.data[i].type+'">'+resp.data[i].type+'</option>';
                        }

                        $(that).closest('.each_row').find('select.type_name').html(options);
                    }
                }
            }
        });

    });


    $(document).on('change', '.type_name', function(){
        progress_bar = 45;
        $('.progress-bar').css("width",progress_bar+"%");
        var type_name = $(this).val();

        var that = $(this);

        var data_name = $(this).closest('.each_row').find('.data_name').val();

        var source_name = $(this).closest('.each_row').find('.source_name').val();

        $.ajax({

            url: '{{url()}}/getSubTypes',
            
            type: "POST",

            dataType: 'json',

            headers: {
                
                 'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },

            data: {'data_name': data_name, 'source_name': source_name, 'type_name': type_name},

            success:function(resp){

                if (resp.status == "success") {

                    if (resp.data.length > 0) {

                        var options = "<option></option>";

                        for (var i = 0; i < resp.data.length; i++) {
                            
                            options += '<option value="'+resp.data[i].sub_type+'">'+resp.data[i].sub_type+'</option>';
                        }

                        $(that).closest('.each_row').find('select.subtype_name').html(options);
                    }
                }
            }
        });

    });


    $(document).on('change', '.subtype_name', function(){
        progress_bar = 50;
        $('.progress-bar').css("width",progress_bar+"%");
        var subtype_name = $(this).val();

        var that = $(this);

        var data_name = $(this).closest('.each_row').find('.data_name').val();

        var source_name = $(this).closest('.each_row').find('.source_name').val();

        var type_name = $(this).closest('.each_row').find('.type_name').val();

        if(subtype_name == 'CSV'){
            $('#choosefil1').attr('accept', '.csv');
        }else if(subtype_name == 'TEXT'){
            $('#choosefil1').attr('accept', '.txt');
        }

        $.ajax({

            url: '{{url()}}/getExtractor',
            
            type: "POST",

            dataType: 'json',

            headers: {
                
                 'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },

            data: {'data_name': data_name, 'source_name': source_name, 'type_name': type_name, 'subtype_name': subtype_name},

            success:function(resp){

                if (resp.status == "success") {

                    if (resp.data.length > 0) {
                            
                        $(that).closest('.each_row').find('td.extractor_name').text(resp.data[0].extractor_name)

                        $(that).closest('.each_row').find('.give_inputs').attr('disabled', false);
                    }
                }
            }
        });

    });

    $('.ingest_chkbox').change(function(){

      if($(' input[type="checkbox" ]:checked').length > 0){

          $('.select_ingest_btn').attr('disabled', false);
          
          $('.move_to_validate').attr('disabled', false);
       }else{

          $('.select_ingest_btn').attr('disabled', true);
          
          $('.move_to_validate').attr('disabled', true);
       }
    });

    $('.select_ingest_btn').click(function(){
        progress_bar = 55;
        $('.progress-bar').css("width",progress_bar+"%");
        var html ='<ul class="list-group"><label>Selected Extractors</label><br>';
        for (var i = 0; i < window.extract.length; i++)
        {
            html += "<li class='list-group-item'>"+window.extract[i]+"</li>"
        }
        html += '</ul>';
        $('#ing').html(html);
        $('#ingest_started').modal('show'); 
    });

    $(document).on('change', '.checkbox', function()
    {
      var widget_array1 =  [];
      var html='';
      $(' input[type="checkbox" ]:checked').each(function(){ 
           var x = $(this).val();
           console.log(x);
           widget_array1.push($(this).val());
           $("#"+x+".source_name").val();
      });
      $(document).on('change', '.source_name', function()
      {
          console.log($(this).val());
      });
      
      
      for(var i=0;i<widget_array1.length;i++){
        
        html +="<input type='hidden' name = 'checkbox[]' value='"+widget_array1[i]+"'>"
      }
      $('#hidden').html(html);
    });


 $(document).on('click', '.select_ingest_btn', function(){
      $('.move_to_validate').attr('disabled', false);
    });
 $(document).on('click', '.move_to_validate', function(){
    var ingestionChecked = [];
    $('.ingest_chkbox:checked').each(function(){

      ingestionChecked.push(
        $(this).parent().parent().parent().find('.source_name').val() +"_"+$(this).val()
      );
    });
  
  var object = {
    'checkbox' : ingestionChecked,
    'project_id' : window.projectId,
    'newPrj' : 'New Project'
    

  };

  $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/struct', // This is the url we gave in the route
        dataType:'json',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: object, // a JSON object to send back
        success: function(response)
        { 
          intitalizeMapTableBody(response.data.mainMap);
          createModalEditMap(response.data.editMap);
          // window.projectId = response.data.projectId;
          // intitalizeAllProjectDropDown(response.data.allProjects,response.data.projectName);
          $('#ingestionDiv').hide();
          $('#mapDataDiv').show();
        }
      });
  });
 $( "#choosefile" ).on( "click", function() {
  $( "#choosefile1" ).trigger( "click" );
});
 $( "#choosefil" ).on( "click", function() {
  $( "#choosefil1" ).trigger( "click" );
});
 $('input[type="file"]').change(function(e){
    var fileName = e.target.files[0].name;
    $('#fileName').val(fileName);
 });
function intitalizeMapTableBody(data)
{
 
  var html = "";
  for (var i = 0; i < data.length; i++) {
    var value = data[i];
    html += '<tr class="each_row" id="'+value.source_id+'"">';
    html += '<td><div class="checkbox pull-right"><label><input type="checkbox" class="ingest_chkbox '+value.source_id+'" value="'+value.source_id+'" disabled></label></div></td>';
    html += '<td class="val">'+value.source_table+'</td>';
    html += '<td><select class="form-control source_name sourceName">';
    for (var j = value.dcube_tables.length - 1; j >= 0; j--) {
      html += '<option>'+value.dcube_tables[j]+'</option>';
    }
    html += '</select></td>';
    html += '<td style="text-align: center;"><span class="glyphicon glyphicon-pencil" data-target="#'+value.source_id+'_mod" data-toggle="modal" title="Edit Mapping"></span></td></tr>' ; 
                                        
    }
    $('#mapTableBody').html(html);
                                   

 }
 function createModalEditMap(data)
 {
    var html = "";
    for (var i = data.length - 1; i >= 0; i--) 
    {
      var value = data[i];
      html += '<div id="'+value.source_id+'_mod" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Modal Header</h4></div><div class="modal-body" style="padding: 10px 50px"><div class = "row"><table class ="table stripped modal_table"><thead><tr><th>Source Column</th><th>DCube Column</th></tr></thead><tbody>';
      
      for (var j = value.source_col.length - 1; j >= 0; j--) {
        var source_col = value.source_col[j];
        html += '<tr><td class="source_name">'+source_col+'</td>';
        html += ' <td><select class="form-control dcube_name"><span>DCube Column</span><option>Exclude</option><option>Import As Is</option>';
        for (var k = value.dcube_col.length - 1; k >= 0; k--) {
          var dcube_col = value.dcube_col[k];
          if(dcube_col != "0"){
            if(k == j) html += '<option selected>'+dcube_col+'</option>';
            else html += '<option>'+dcube_col+'</option>';
          }
        }
        html += '</td></tr>';
      }
      html += '</tbody></table></div></div><div class="modal-footer"><button type="button" class="btn btn-default save_mapping" data-dismiss="modal">Save Mappings</button></div></div></div></div></div>';
                                          
      
    }
    $('body').append(html);

 }
</script>
<script type="text/javascript">
  var dcube_Table = [];
  var source_Table = [];
  var editMapData = [];
    $(document).ready(function(){

      // $('#mainTable').find('input[type="checkbox"]:checked').each(function(){
      //   console.log('Each one is: '+$(this).val());
      // });

      // if ($('#exeMapData').val() != undefined) {
      //   var exeMapData = $('#exeMapData').val();
      // } else {
      //   var exeMapData = $('#source_name_string').val();
      // }

      // if (exeMapData != 'Empty') {
      //     exeMapData = exeMapData.split(",");

      //     var filteredStable = exeMapData.filter(function(element, index, array) {
      //       return (index % 2 === 0);
      //     });

      //     var filteredDtable = exeMapData.filter(function(element, index, array) {
      //       return (index % 2 !== 0);
      //     });
      // }

      // $('.each_row').each(function(){
      //   var source_name = $(this).find('#source_name_string').val();
      //   source_name = source_name.split(",");

      //   var srcName = '';
      //   srcName += '<select class="form-control source_name">';

      //   var value = $(this).find('.val').text();

      //   for (var i = 0; i < filteredStable.length; i++) {
      //     if (value == filteredStable[i]) {
      //       $(this).find('.ingest_chkbox').prop('checked', true);
      //     }
      //   }
      //     for (var val = 0; val < source_name.length; val++) {
      //       var i = filteredDtable.indexOf(source_name[val]);
      //       if (filteredDtable.indexOf(source_name[val])!= null && filteredDtable[i] == source_name[val]) {
      //         srcName += '<option value="'+source_name[val]+'" selected>'+source_name[val]+'</option>';
      //       } else if(filteredDtable.indexOf(source_name[val])!= null){
      //         srcName += '<option value="'+source_name[val]+'">'+source_name[val]+'</option>';
      //       }
      //     }
          
      //   srcName += '</select>';
      //   $(this).find('#sourceName').html(srcName);

      // });

    //   var str = $('#checkedVal').val();
    //   // console.log(str);
    //   $('a.DCube_struct').addClass('active');
      
    //   var val = str.split(",");

    //   for(var i=0; i< val.length; i++) {
    //       val[i]= val[i].replace(/ /g , "_");
    //       // console.log(val[i]);
    //   }

    //   for(var i=0; i< val.length; i++) {
        
    //     id = val[i];
        
    //     // $('tbody').find('#'+id).show();

    //     // $('#'+id).each(function(){
    //     //   if (exeMapData != 'Empty') {
    //     //     exeMapData = exeMapData.split(",");

    //     //     var filteredStable = exeMapData.filter(function(element, index, array) {
    //     //       return (index % 2 === 0);
    //     //     });

    //     //     var filteredDtable = exeMapData.filter(function(element, index, array) {
    //     //       return (index % 2 !== 0);
    //     //     });

    //     //   }
    //     //   var value = $(this).find('.val').text();
    //     //   var exeVal = '';
    //     //     for(var j = 0 ; j < filteredStable.length ;j++){
    //     //       if(filteredStable[j]==value){
    //     //         $(this).closest('.each_row').find('.ingest_chkbox').prop('checked', true);
    //     //         // console.log(filteredDtable[j]);
    //     //         // exeVal += $(this).closest('.each_row').find('.source_name').val();
    //     //         // exeVal += '<option selected>'+filteredDtable[j]+'</option>';
    //     //         // $(this).closest('.each_row').find('.source_name').html(exeVal);
    //     //       }
    //     //     }

    //     // });
        
    //   }      
      

    // });

    $(document).on('click','#map_data',function(){
        var sourceTable = [];
        var dCubeTable = [];
        var html ='<ul class="list-group"><label >Selected</label>';
        $('.each_row').find('input[type="checkbox"]:checked').each(function(){
            // console.log($(this).closest('.each_row').find('.source_name').val());
            var editMap = {};
            var dcube = $(this).closest('.each_row').find('.source_name').val();
            var source = $(this).closest('.each_row').find('.val').text();
            for (var i = editMapData.length - 1; i >= 0; i--) {
              if(editMapData[i].id.indexOf(source) != -1)
                  editMap = editMapData[i];
            }
            
            sourceTable.push( {
                'dcube' : dcube, 
                'source' : source,
                'editMap' : editMap
            } );
            
            html += "<li class='list-group-item form-control' style='margin: 10px 0; font-weight: 500'>"+$(this).closest('.each_row').find('.val').text()+
            "    ->    "+$(this).closest('.each_row').find('.source_name').val()+"</li>";

        })
        html += '</ul>';
        
        
        dcube_Table = (dCubeTable);
        source_Table = (sourceTable);
        
        $('#text_add').html(html);
    });

    $(document).on('click','#saveMapData',function(){

      var mapData = source_Table;
      var projectId = $('#project_id').val();

      if (mapData != '') {
        $('.mapping_selected_btn').attr('disabled', false);
      }
      $.ajax({
            url: '{{url()}}/saveMapData',
            type: "POST",
            dataType: 'json',
            headers: {
                
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: {'mapData': mapData, 'projectId': window.projectId},

            success:function(resp){

                if (resp.status == "success") {
                  $('#forword_project_id').val(resp.data.projectId);
                }
            }
        });
      // $.ajax({
      //       url: 'http://176.9.181.38:5005/spark_script',
      //       method: "POST",
      //       dataType: 'json',
      //       data : {'proj_id' : projectId },

      //       success:function(resp){

      //       }
      //   });
      // $.ajax({
      //       url: 'http://176.9.181.38:5005/inge_data',
      //       method: "POST",
      //       dataType: 'json',
      //       data : {'proj_id' : projectId },

      //       success:function(resp){
      //       }
      //   });

    });
    $(document).on('click','.save_mapping',function() {
      var source_name = [];
      var dcube_name = [];
      var id = $(this).parent().parent().parent().parent().attr('id').replace("_mod","");
      $(this).parent().parent().parent().parent().find('.modal_table').find('tbody').find('tr').each(function(){
          source_name.push($(this).find('.source_name').html());
          dcube_name.push($(this).find('.dcube_name').val());
          
      });
      var checkbox = '.'+id.replace(/ /gi,"_");
      $(checkbox).prop('checked', true);
      var obj = {
        'id' : id.replace(/_/gi," "),
        'source' : source_name,
        'dcube' : dcube_name,
      };
      editMapData.push(obj);
    } );
});
</script>
@stop

