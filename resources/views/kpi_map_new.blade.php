@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Setup New Project</title>
@stop

@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/breadcrumb.css">
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
        <div class="breadcrumb flat" style="margin-right: 5px">
             <a href="{{url()}}/setup_new_proj" class="active">Setup New Project</a>
             <a href="{{url()}}/ingestion" class="active">Ingest Data</a>
             <a href="{{url()}}/validate" class="active">Validate Data</a>
             <a href="javascript:history.back()" class="active">Map Data</a>
             <a href="#" class="active">Mapping KPI</a>
         </div>
         <div class="row widget-1" style="padding-top: 30px">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
                <h3 class="widget-title">Mapping KPI</h3>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <p><strong>Project Type: </strong> {{Session::get('project_name')}}</p>
                      <div class = "row">
                        <div class= "col-md-2">
                          <label style="padding: 5px">Select View:</label>
                        </div>
                        <div class="col-md-3">
                          <select class="form-control .proj_name" id='proj_name' style="margin-top: -5px; width: 220px; margin-left: -70px">
                            <option></option>
                            <option>Market Overview</option>
                            <option>Market Access</option>
                            <option>SOB</option>
                            <option>Marketing</option>
                          </select>
                        </div>
                        <div class = "col-md-5">
                          
                          <a href="{{url()}}/kpilib" target="_blank" class ='btn btn-warning  pull-right' >View KPI Library</a>
                          
                        </div>
                        <div class = "col-md-2">
                          <button class ='btn btn-info  pull-right' data-toggle="modal" data-target="#myModal" >View Workflow</button>
                          
                        </div>
                      </div>

                      <br>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="panel panel-default" id='addkpi' >
                                <div class="panel-heading">Saved KPI'S</div>
                                    <div class="panel-body">
                                      <div class="row" style="margin-bottom: 7px;">
                                        <div class="col-md-3 "><label>View</label></div>
                                        <div class="col-md-2 "><label>KPI</label></div>
                                        <div class="col-md-2 "><label>Sub KPI</label></div>
                                        <div class="col-md-3 "><label>Dimension</label></div>
                                        <div class="col-md-2"><label>Ready for Deployment</label></div>
                                      </div>
                                    <div class="savedData"></div>                                
                                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#send_to_workflow">Send for Workflow</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <br>
                      <div class="panel panel-default">
                        <div class="panel-heading">KPI Selection</div>
                        <div class="panel-body">
                          <form id='kpimap'>
                          <div class="row">
                            <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h4><span class="label label-primary">KPI</span></h4>
                                <br>
                                <div id="choose_project">
                                  <div class="radio">
                                    <input type="text" name="view_type" id="viewType" value="0">
                                  </div>
                                  <div class="radio">
                                    <input type="text" name="view_id" id="viewId" value="0">
                                  </div>
                                  <div class="radio">
                                    <input type="text" name="sub_kpi_val" id="sub_kpi_val" value="0">
                                  </div>
                                  <div class="radio kpiArr"></div>
                                </div>
                            </div>
                            <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h4><span class="label label-primary">Sub KPI</span></h4>
                                <br>
                                <div>
                                  <div id="calSubKpi">
                                    <div class="selectingSubKpi calSubKpi radio"></div>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row" id="dimensionInfo">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12d">
                              <h4><span class="label label-primary">Dimension</span></h4>
                              <br>
                              <div class="row">
                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><span class="label label-primary">Product Selection</span></h4>
                                  <br>
                                  <div id="product_selection">
                                    <div class="radio product_selection kpi_dim"></div>
                                  </div>
                                </div>

                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><span class="label label-primary">Time Period Selection</span></h4>
                                  <br>
                                  <div id="time_period_selection">
                                    <div class="radio time_period_selection kpi_dim"></div>
                                  </div>
                                </div>

                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><span class="label label-primary">Geography</span></h4>
                                  <br>
                                  <div id="geography">
                                    <div class="radio geography"></div>
                                    <div class="radio">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                  </div>
                                </div>

                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><span class="label label-primary">Calculation</span></h4>
                                  <br>
                                  <div id="product_selection_calculation">
                                    <div class="radio calculateSubKpi"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <hr>

                          <div class ='row'>
                            <div class="col-md-6">
                              <!-- <button class ='btn btn-primary pull-left' data-toggle="modal" data-target="#addnewkpi" id='addkpi_btn'>Add New KPI</button> -->
                            </div>
                            <div class="col-md-6">
                              <button class ='btn btn-primary pull-right' type="button" id='save_btn'>Save</button>
                            </div>
                          </div>
                          </form>
                      </div>
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
        <iframe src="http://176.9.181.38:8080/admin/airflow/graph?dag_id=Diabetes_PreLaunch_Tracker" style="width: 100%; height: 500px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="send_to_workflow" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 170px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Work Flow</h4>
      </div>
      <div class="modal-body">
        <label>Sent to Workflow</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <div id="addnewkpi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 630px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New KPI</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="padding: 20px">
          <div class="col-md-12">
            <label>Select View:</label>
            <select class="form-control pull-right new_kpi_view"  style="margin-top: -5px; width: 460px">
                            
                            <option></option>
                            <option>Market Overview</option>
                            <option>Market Access</option>
                            <option>SOB</option>
                            <option>Marketing</option>
                          </select>
          </div>
          
        </div>
        <div class="row" style="padding: 20px">
          <div class="col-md-12">
            <label>KPI Name:</label>
            <input type="text" class="form-control pull-right new_kpi_name" style="; width: 460px">
            
          </div>
          
        </div>
      
      <div class="row" style="padding: 20px">
          <div class="col-md-12">
            <label>Dimension:</label>
            <input type="text" class="form-control pull-right new_kpi_dim" style=" width: 460px">
            
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default new_kpi_add_btn" data-dismiss="modal">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
  </div>
 </div>
    
@stop
@section('BaseJSLib')
<script type="text/javascript">
  
$(document).ready(function(){
  // kpi fields
  function kpiFunction(){
    var kpi = [];
    var kpiVal = '';
    kpi = [               
          'TRx',
          'MBS$(Revenue)',
          'NRx'
    ];

    for (var i=0; i<kpi.length; i++) {
        kpiVal += '<input type="checkbox" class="kpi_type" name="checkSubKPI" value="'+kpi[i]+'"> '+kpi[i]+'<br>';
    }

    $('.kpiArr').html(kpiVal).contents();
  }

  $('#dimensionInfo').hide();
  $('#kpimap').hide();

  $('#choose_project').find('input[type="checkbox"]').change(function(){ 
      
      var value = $('input[type="checkbox"]:checked').val();
      // console.log('Selected project: '+value);

      subKpiFunction(value);
  });
  
// sub kpi fields
  function subKpiFunction(value){
    var subKpi = [];
      var subKpiVal = '';
      if (typeof value != 'undefined') {
        subKpi = [
                'Absolute Volume',
                'Share',
                'Volume Change',
                'Share Change'
        ];
      }else{
        subKpi.length = 0;
      }
      if(subKpi.length > 0 ){
        for (var i=0; i<subKpi.length; i++) {
            subKpiVal += '<input type="radio" class="check_sub_kpi" name="checkSubKPI" value="'+subKpi[i]+'"> '+subKpi[i]+'<br>';
        }
      }

      $('.selectingSubKpi').html(subKpiVal).contents();
  }

  // product selection fields
  function productSelection(value){
   var proSelArr = [];
      var proSelVal = '';
      if (typeof value != 'undefined') {
        proSelArr = [
                'Drug',
                'Drug Class'
        ];
      }else{
        proSelArr.length = 0;
      }
      if(proSelArr.length > 0 ){
        for (var i=0; i<proSelArr.length; i++) {
            proSelVal += '<input type="checkbox" class="check_sub_kpi kpi_dim" name="product_selection" value="'+proSelArr[i]+'"> '+proSelArr[i]+'<br>';
        }
      }

      $('.product_selection').html(proSelVal).contents(); 
  }

  // time period selection fields

  function timePeriodSelection(value){
    var timePerSelArr = [];
      var timePerSelVal = '';
      if (typeof value != 'undefined') {
        timePerSelArr = [
                'Month',
                'Quarter',
                'Year'
        ];
      }else{
        timePerSelArr.length = 0;
      }
      if(timePerSelArr.length > 0 ){
        for (var i=0; i<timePerSelArr.length; i++) {
            timePerSelVal += '<input type="checkbox" class="time_period_selection kpi_dim" name="time_period_selection" value="'+timePerSelArr[i]+'"> '+timePerSelArr[i]+'<br>';
        }
      }

      $('.time_period_selection').html(timePerSelVal).contents(); 
  }

  // Geography fields
  function geography(value){
    var geographylArr = [];
      var geographyVal = '';
      if (typeof value != 'undefined') {
        geographylArr = [
                'National',
                'State',
                'City',
                'ZIP'
        ];
      }else{
        geographylArr.length = 0;
      }
      if(geographylArr.length > 0 ){
        for (var i=0; i<geographylArr.length; i++) {
            geographyVal += '<input type="checkbox" class="geography" name="time_period_selection" value="'+geographylArr[i]+'"> '+geographylArr[i]+'<br>';
        }
      }

      $('.geography').html(geographyVal).contents(); 
  }  

// dimension calculations
function dimeCalculation(){
    var calWithSubKpi = [],
        mergeWithSubKpi = '',
        selectedEle = [];

    $('#calSubKpi .check_sub_kpi:checked').each(function(){
      
      selectedEle.push($(this).val());

    });

    if (selectedEle.length == 0) {
        $('#dimensionInfo').hide();
    }else {
      $('#dimensionInfo').show();
    }
    
    for(i=0; i<selectedEle.length; i++){

        if(selectedEle[i] == 'Share' || selectedEle[i] == 'Share Change'){
            
            calWithSubKpi.push('Share-Drug Class share in Market', 'Product share in Drug Class');
        }else {
            
            calWithSubKpi.push('Change-Yoy', 'YTD', 'QTD');
        }
    }
      var unique = calWithSubKpi.filter(function(elem, index, self) {
          return index == self.indexOf(elem);
      });
      for(var ele=0; ele<unique.length; ele++){
            mergeWithSubKpi += '<input type="checkbox" class="dim_cal" name="merge_with_sub_kpi" value="'+unique[ele]+'"> '+unique[ele]+'<br>';
      }

    $('.calculateSubKpi').html(mergeWithSubKpi).contents();
}

  $(document).on('change' ,'#calSubKpi .check_sub_kpi', function(){
    var value = $('#calSubKpi .check_sub_kpi:checked').val();

    dimeCalculation();

  });

$(document).on('click', '.new_kpi_add_btn', function()
{
    var view = $('.new_kpi_view').val();
    var kpi = $('.new_kpi_name').val();
    var dimen = $('.new_kpi_dim').val();
    html_data = '<div class="row" style="margin-bottom: 7px;">'+
                                    '<div class="col-md-1"><div class="checkbox"><input type="checkbox" style="margin : auto"/>'+
                                    '</div></div>'+
                                '<div class="col-md-3">'+view+'</div>'+
                                '<div class="col-md-3">'+kpi+'</div>'+
                                '<div class="col-md-3">'+dimen+'</div>'+
                                '<div class="col-md-2">'+
                                    '<label class="label label-danger">Queued</label>'+
                                '</div>'+
                            '</div>';    
    $('#addkpi').find('.data').append(html_data);
});
$(document).on('change', '.time1', function()
 {
      var widget_array1 =  [];
      var x= "Time Period";
        $('.time1 input[type="checkbox" ]:checked').each(function(){
          var z= widget_array1.indexOf($(this).val());
          if(z>=0)
          {

            widget_array1.splice(z,1);
          }
          else
          {
            widget_array1.push($(this).val());            
          }
        });
        $(this).closest('.dime').find('.timee').val(x+"("+widget_array1+")");
        console.log($(this).closest('.dime').find('.timee').val()); 
      
});
$(document).on('change', '.geo1', function()
 {
      var widget_array1 =  [];
      var x= "Geography";
        $('.geo1 input[type="checkbox" ]:checked').each(function(){ 
          var z= widget_array1.indexOf($(this).val());
          if(z>=0)
          {

            widget_array1.splice(z,1);
          }
          else
          {
                widget_array1.push($(this).val());            
          }  
        });
        $(this).closest('.dime').find('.geoo').val(x+"("+widget_array1+")");
        console.log($(this).closest('.dime').find('.geoo').val()); 
});

$('#proj_name').change(function(){
  var kpiKey = $(this).val();
  if (kpiKey != '') {
    $('#kpimap').show();
    $('#viewType').val(kpiKey);
    $('.savedData').hide();

    $.ajax({
        url : "{{url()}}/getMappingKpi",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'kpiKey':kpiKey},
        success: function(response){
          console.log(response.data[0]);
          var argValue = '';
          if (response.data.length > 0){
            $('#viewId').val(response.data[0]['id']);
            $('#sub_kpi_val').val(response.data[0]['sub_kpi']);
            var kpi_type = '';

            // kpi checked values
            kpiFunction();

            kpi_type = JSON.parse(response.data[0]['kpi']);

            for (var i=0; i<kpi_type.length; i++) {
              $('input[value="'+kpi_type[i]+'"]').attr( 'checked', true );
            } 
            
            var sub_kpi = response.data[0]['sub_kpi'];
            
            if (kpi_type.length > 0) {
              argValue = kpi_type[0];

              subKpiFunction(argValue);
              $('input[value="'+sub_kpi+'"]').attr('checked', 'true');
            }

            if (sub_kpi.length > 0) {
              argValue = sub_kpi;
              $('#dimensionInfo').show();

              var kpi_dim = JSON.parse(response.data[0]['dimension']);

              productSelection(argValue);
              timePeriodSelection(argValue);
              geography(argValue);
              dimeCalculation();

              for (var j = 0; j < kpi_dim.length; j++) {
                $('input[value="'+kpi_dim[j]+'"]').attr('checked', 'true');
              }

            } else{
              $('#dimensionInfo').hide();
            }

          }else{ // View type empty
            $('#viewId').val(0);
            $('#sub_kpi_val').val(0);
            kpiFunction();

            $('.kpi_type').find('input[type="checkbox"]').each(function(){
              $(this).attr( 'checked', false );
            });
            
            subKpiFunction(argValue);
            productSelection(argValue);
            timePeriodSelection(argValue);
            geography(argValue);
            dimeCalculation();            
          }

        }
    });
  }else{
    $('#kpimap').hide();
  }
});

  $('#save_btn').click(function(e){
      e.preventDefault();
      var dim_arr = [],
          kpi_arr = [],
          sub_kpi = '',
          product_selection = [],
          time_period_selection = [],
          geography = [],
          product_selection_calculation = [],
          view_type = $('#proj_name').val(),
          viewId = $('#viewId').val();
          exe_sub_kpi = $('#sub_kpi_val').val();

console.log('Project Name: '+view_type);

      $('#choose_project').find('input[type="checkbox"]:checked').each(function(){
        kpi_arr.push($(this).val());

      });

      sub_kpi = $('#calSubKpi').find('input[name="checkSubKPI"]:checked').val();
      //  find('input[name=myRadio]:checked').val();
      //  sub_kpi = checkSubKPI.filter(':checked').val(); 
          console.log('Sub KPI value: '+sub_kpi);

      // });

      $('#dimensionInfo').find('input[type="checkbox"]:checked').each(function(){
        dim_arr.push($(this).val());

      });

      $.ajax({
        url : "{{url()}}/saveMappingKpi",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'kpi_arr':kpi_arr,'sub_kpi':sub_kpi,'dim_arr':dim_arr,'view_type':view_type,'viewId':viewId,'exe_sub_kpi':exe_sub_kpi},
        success: function(response){
          if (response.status == 'success') {
            console.log(response.data);
            alert('Saved Successfully...!');

            var kpi_arr = '<div class="col-md-2">';
            for (var i = 0; i < response.data.kpi_arr.length; i++) {
              kpi_arr += response.data.kpi_arr[i]+'<br>';
            }
            kpi_arr += '</div>';

            $('.savedData').show();

            var dim_arr = '<div class="col-md-3">';
            for (var i = 0; i < response.data.dim_arr.length; i++) {
              dim_arr += response.data.dim_arr[i]+'<br>';
            }
            dim_arr += '</div>';            
            
            var html = '<div class="row">'+
                      '<div class="col-md-3 ">'+response.data['view_type']+'</div>'+
                      kpi_arr+
                      '<div class="col-md-2 ">'+response.data['sub_kpi']+'</div>'+
                      dim_arr+
                      '<div class="col-md-2"><i class="fa fa-check" area-hidden="true"></i></div>'+
                    '</div>';

            $('.savedData').html(html);
          }
        },
      });
      
  });
});
</script>
@stop