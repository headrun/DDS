@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Injestion</title>
@show
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
                                      <button class="btn btn-warning btn-sm give_inputs" disabled>Give Inputs</button>
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
@stop
@section('BaseJSLib')
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
    $('a.ingest').addClass('active');


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
