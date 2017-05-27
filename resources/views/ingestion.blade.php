@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Injestion</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <h3 class="widget-title" style="margin-left: 20px; margin-bottom: 10px;">
                  <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Create project
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Market Access Reporting v1.0</a></li>
                        <li><a href="#">Optimix: Market Mix Modelling workflow for RA</a></li>
                        <li><a href="#">Phast Rx reporting dashboard</a></li>
                        <li><a href="#">Social Media Campaign Tracking</a></li>
                        <li><a href="#">Type II Diabetes Prelaunch Dashboard</a></li>
                      </ul>
                  </div>
              </h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead>
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
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" value=""></label>
                                      </div>
                                  </td>
                                  <td>
                                    Claims
                                    <input type="hidden" class="data_name" value="Claims">
                                  </td>
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Symphony</option>
                                        <option>IMS</option>
                                      </select>
                                  </td>
                                  <td>
                                      <select class="form-control type_name">
                                        
                                      </select>
                                  </td>
                                  <td>
                                      <select class="form-control subtype_name">
                                        
                                      </select>
                                  </td>
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-warning btn-sm give_inputs">Give Inputs</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>
                              </tbody>
                            </table>
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
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <h4><span class="label label-primary">Connection</span></h4>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                          <label for="email">Host Name:</label>
                          <select class="form-control">
                              <option></option>
                              <option></option>
                              <option></option>
                          </select>
                        </div>  
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="email">Port:</label>
                          <select class="form-control">
                              <option></option>
                              <option></option>
                              <option></option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="email">Database Name:</label>
                          <select class="form-control">
                              <option></option>
                              <option></option>
                              <option></option>
                          </select>
                        </div>  
                    </div>
                </div>

                <!-- second row-->

                <h4 style="padding-top: 20px;"><span class="label label-primary">Authentication</span></h4>
                <div class="radio-inline">
                  <input type="radio" name="optradio">Use Credintials
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="usr" disabled>
                </div>

                <div class="radio-inline">
                  <input type="radio" name="optradio">Use Username & Password
                </div>
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Username:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10"> 
                      <input type="password" class="form-control" id="pwd">
                    </div>
                  </div>
                </form>

                <!-- third row-->

                <h4 style="padding-top: 20px;"><span class="label label-primary">Timezone Correction</span></h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="radio-inline">
                          <input type="radio" name="optradio">No Correction (Use UTC)
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="radio-inline">
                          <input type="radio" name="optradio">Use local timezone
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="radio-inline">
                          <input type="radio" name="optradio">Use selected timezone
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <select class="form-control">
                              <option>Asia</option>
                              <option>london</option>
                              <option>africa</option>
                          </select>
                        </div>  
                    </div>
                </div>


                <!-- foutth row-->

                <h4><span class="label label-primary">Misc</span></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Allow Spaces in column names</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Validate connections on close</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">retrieve metadata in config</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">Ok</button>
        <button type="button" class="btn btn-default">Apply</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <span style="margin-right: 60px;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
      </div>
    </div>

  </div>
</div>



<div id="JSON" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Json Modal</h4>
      </div>
      <div class="modal-body">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Settings</a></li>
            <li><a data-toggle="tab" href="#menu1">Flow Variables</a></li>
            <li><a data-toggle="tab" href="#menu2">Memory Policy</a></li>
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                 <h4 style="padding-top: 20px;"><span class="label label-primary" >Input Location</span></h4>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                          <select class="form-control">
                              <option>Asia</option>
                              <option>london</option>
                              <option>africa</option>
                          </select>
                        </div>  
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                          <input type="file" value="browse">
                        </div>
                    </div>
                </div>
                <!-- second row-->
                <h4 style="padding-top: 20px;"><span class="label label-primary" >reader page</span></h4>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal">
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="email">Output Column name:</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control">
                              </div>
                            </div>
                            <div class="form-group"> 
                              <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                  <label><input type="checkbox"> Remember me</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">JSON path</label>
                              <div class="col-sm-8"> 
                                <input type="password" class="form-control">
                              </div>
                            </div>
                            <div class="form-group"> 
                              <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                  <label><input type="checkbox"> Fail if path not found</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group"> 
                              <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                  <label><input type="checkbox"> Allow Comments in JSON file</label>
                                </div>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
              
            </div>
            <div id="menu2" class="tab-pane fade">
              
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">Ok</button>
        <button type="button" class="btn btn-default">Apply</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <span style="margin-right: 60px;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
      </div>
    </div>

  </div>
</div>

@stop
@section('BaseJSLib')
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('a.ingest').addClass('active');

    $('.give_inputs').click(function(){
        
        var type_name = $('.type_name').val();

        var subtype_name = $('.subtype_name').val();
        
        if (type_name == "Database") {

            $('#Database').modal('show');

        }else if(type_name == 'JSON'){

            $('#JSON').modal('show');
        
        }else if(type_name == 'FLAT FILE' || subtype_name == 'CSV'){

            $('#FLAT FILE').modal('show');
        }
    });

    $(document).on('change', '.source_name', function(){
        
        var source_name = $(this).val();

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

                        $('select.type_name').html(options);
                    }
                }
            }
        });

    });


    $(document).on('change', '.type_name', function(){
        
        var type_name = $(this).val();

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

                        $('select.subtype_name').html(options);
                    }
                }
            }
        });

    });


    $(document).on('change', '.subtype_name', function(){
        
        var subtype_name = $(this).val();

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
                            
                        $('td.extractor_name').text(resp.data[0].extractor_name)

                        $('.give_inputs').attr('disabled', false);
                    }
                }
            }
        });

    });
</script>
@stop
