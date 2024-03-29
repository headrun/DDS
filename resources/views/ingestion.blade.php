@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Injestion</title>
@stop
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/breadcrumb.css">
@stop
@section('BaseContent')
<div class="container-fluid bg">
  <div class="visualization">
      <div class="" style="padding: 10px">
          <div class="panel panel-default" style=" background-color: #FCFCFC; margin-left: -15px; margin-right: -15px;">
            <div class="panel-body  ">
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:35%;">
                  
                </div>
              </div>
              <div class="row" style="text-align: center">
                <div class="col-md-3">
                  @if(isset($proj_id))
                    <a href="{{ url()}}/setup_new_proj/{{$proj_id}}" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/set_up_new_project.png"><br>Setup New Project</a>
                  @else
                    <a href="{{ url()}}/setup_new_proj/{{$proj_id}}" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/set_up_new_project.png"><br>Setup New Project</a>
                  @endif
                  
                </div>
                <div class="col-md-3">
                  <a href="#" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/ingest_data.png"><br>Ingest Data</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/map.png"><br>Map Data</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/kpi.png"><br>Mapping KPI</a>
                </div>
              </div>
            </div>
         </div>
         <div class="row widget-11" >
            <div class="panel panel-default">
              <div class="widget-title-box">
                <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/ingest_data1.png"></div>
                <h3 class="widget-title">Ingest Data</h3>
              </div>
              <div class="row widget-1" style="margin-top: -10px;">
              
                <!--   <a href="{{url()}}/extractor_library" target="_blank" class="btn btn-danger pull-right" style="margin-top: 15px;" >Extractor Library</a>
                 -->
                  <h3 class="widget-title" style="margin-bottom: 10px;">
                  <select class="form-control" style="width: 250px; height:30px; margin-left: -70px;">
                      @foreach($final_array1 as $value)
                        @if($projName == $value)
                          <option selected>{{$projName}}</option>  
                        @else
                          <option>{{$value}}</option>
                        @endif
                      @endforeach
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
                              <tbody>
                                <?php
                                  $exeIngestCount = 0;
                                  $ArrCount = 0;
                                ?>
                              @foreach($final_array as $value)
                                
                                <?php
                                  $checkedData = array();
                                ?>
                                @if(isset($exeIngestion))
                                  @if($exeIngestCount <= $ArrCount)
                                    @foreach($exeIngestion as $exeData)

                                      @if($value['data'] == $exeData->data)
                                        <?php
                                          array_push($checkedData, $exeData->data);
                                          // array_push($checkedData, $exeData->data);
                                          if(stripos(json_encode($checkedData),$exeData->data) != false){
                                            $exeIngestCount++;
                                            $ArrCount++;
                                            // echo $exeData->data.'<br>';
                                          }
                                        ?>
                                      <tr class="each_row">
                                        <td>
                                            <div class="checkbox">
                                              <label><input type="checkbox" class="ingest_chkbox" value="{{$value['data']}}" disabled checked style="margin-left: 20px"></label>
                                            </div>
                                        <!-- </td> -->
                                        <!-- <td> -->
                                          {{$value['data']}}
                                          <input type="hidden" class="data_name" id="dataKey" value="{{$value['data']}}">
                                        <!-- </td> -->
                                        <!-- <td> -->
                                          <select class="form-control source_name sourceName">
                                              <option></option>
                                                @foreach($value['sources'] as $src)
                                                  @if($exeData->source == $src['source'])
                                                    <option value="{{$exeData->source}}" selected>{{$exeData->source}}</option>
                                                  @else
                                                    <option value="{{$src['source']}}" {{ $exeData->source==$src['source'] ? 'selected' : '' }}>{{$src['source']}}</option>
                                                  @endif
                                                @endforeach
                                          </select>
                                        </td>
                                        <td>
                                            <select class="form-control type_name typeName">
                                              <option value="{{ $exeData->type }}">{{ $exeData->type }}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control subtype_name subTypeName">
                                              <option value="{{ $exeData->sub_type }}">{{ $exeData->sub_type }}</option>
                                            </select>
                                        </td>
                                        <td class="extractor_name">
                                            {{ $exeData->extractor_name }}
                                        </td>
                                        <td>
                                            <button class="btn btn-default btn-sm give_inputs">Give Inputs</button>
                                        </td>
                                        <td class="last_col_tick">
                                          <i class="fa fa-check fa-2x" style="color: #AFC69B" aria-hidden="true"></i>
                                        </td>
                                      </tr>
                                      
                                      @endif
                                    @endforeach
                                    <?php
                                      // array_push($checkedData, $exeData->data);
                                      if(stripos(json_encode($checkedData),$value['data']) != true){

                                        $test = $value['data'].'<br>';
                                        // if ($test != $value['data']) {
                                      ?>
                                      @if($test != $value['data'])
                                      <tr class="each_row">
                                        <td>
                                            <div class="checkbox" >
                                              <label><input type="checkbox" class="ingest_chkbox" value="{{$value['data']}}" disabled style="margin-left: 20px"></label>
                                            </div>
                                        </td>
                                        <td>
                                          {{$value['data']}}
                                          <input type="hidden" class="data_name" id="dataKey" value="{{$value['data']}}">
                                        </td>
                                        <td>
                                          <select class="form-control source_name sourceName">
                                            <option></option>
                                            @foreach($value['sources'] as $src)
                                                <option value="{{$src['source']}}">{{$src['source']}}</option>
                                            @endforeach
                                          </select>
                                        </td>
                                        <td>
                                            <select class="form-control type_name typeName">
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control subtype_name subTypeName">
                                            </select>
                                        </td>
                                        <td class="extractor_name">
                                        </td>
                                        <td>
                                            <button class="btn btn-default btn-sm give_inputs" disabled>Give Inputs</button>
                                        </td>
                                        <td class="last_col_tick"></td>
                                      </tr>
                                      @endif
                                      <?php
                                      }
                                    ?>
                                    @endif
                                  @else
                                    <tr class="each_row">
                                        <td>
                                            <div class="checkbox">
                                              <label><input type="checkbox" class="ingest_chkbox" value="{{$value['data']}}" disabled style="margin-left: 20px"></label>
                                            </div>
                                        </td>
                                        <td>
                                          {{$value['data']}}
                                          <input type="hidden" class="data_name" id="dataKey" value="{{$value['data']}}">
                                        </td>
                                        <td>
                                          <select class="form-control source_name sourceName">
                                            <option></option>
                                            @foreach($value['sources'] as $src)
                                                <option value="{{$src['source']}}">{{$src['source']}}</option>
                                            @endforeach
                                          </select>
                                        </td>
                                        <td>
                                            <select class="form-control type_name typeName">
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control subtype_name subTypeName">
                                            </select>
                                        </td>
                                        <td class="extractor_name">
                                        </td>
                                        <td>
                                            <button class="btn btn-default btn-sm give_inputs" disabled>Give Inputs</button>
                                        </td>
                                        <td class="last_col_tick"></td>
                                      </tr>
                                @endif
                              @endforeach
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
                              <form action='{{url()}}/struct'>
                                <div id= 'hidden'></div>
                                    <input type="hidden" name="project_id" id="project_id" value="{{  $proj_id }}">
                                    @if(isset($newPrj))
                                      <input type="hidden" name="newPrj" id="newPrj" value="{{ $newPrj }}">
                                    @else
                                      <input type="hidden" name="newPrj" id="newPrj" value="Empty">
                                    @endif
                                      <button class="btn btn-success btn-md move_to_validate " disabled>
                                      Move to Map Data</button>
                                    <!-- </div> -->
                              </form>
                            </div>
                          </div>
                        
                      </div>
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
            <div ><input type='hidden' id="csvDataKey" name="csvDataKey"></div>
            <!-- <img id="output"> -->
            <div ><input type='hidden' id="csvFileName" name="csvFileName"></div>
            <div><input type='file'  accept='image/*' onchange='openFile(event)' id="choosefil1" style="display: none"></div>
            <div><button class="btn btn-default" id="choosefil" type="button">Click To Upload File</button></div>

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

@stop
@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
/*
    $(document).ready(function(){

      var checked_arr = [];

      $('#mainTable').find('input[type="checkbox"]:checked').each(function(){
        checked_arr.push($(this).val());

        var type_name = $(this).closest('.each_row').find('.type_name').val();
        var project_id = $('#project_id').val();
        window.tick = $(this).closest('.each_row').find('.extractor_name').text();
        var extractor_name = $(this).closest('.each_row').find('.extractor_name').text();
        var extractor_name = extractor_name.trim();
        var newPrj = $('#newPrj').val();

        if (newPrj != 'New Project') {
          sendAjaxToGetPopupDate(project_id, extractor_name, type_name);
        }

      });
    });
*/
var progress_bar = 35;
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

    $('.give_inputs').click(function(){

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
            data: {'serializedData': serializedData, 'project_id': project_id},

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
 $( "#choosefile" ).on( "click", function() {
  $( "#choosefile1" ).trigger( "click" );
});
 $( "#choosefil1" ).on( "click", function() {
  $( "#choosefil1" ).trigger( "click" );
});
</script>
@stop
