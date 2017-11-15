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
          <div class="panel panel-default" style=" background-color: #FCFCFC; margin-left: -15px; margin-right: -15px;">
            <div class="panel-body  ">
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:65%;">
                  
                </div>
              </div>
              <div class="row" style="text-align: center">
                @if(isset($proj_id))
                <div class="col-md-3">
                 <a href="{{url()}}/setup_new_proj/{{$project_id}}" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/set_up_new_project.png"><br>Setup New Project</a>
                </div>
                <div class="col-md-3">
                  <a href="{{url()}}/ingestion/{{$project_id}}" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/ingest_data.png"><br>Ingest Data</a>
                </div>
                <div class="col-md-3">
                  <a href="javascript:history.back()" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/mappingkpi.png"><br>Map Data</a> 
                </div>
                <div class="col-md-3">
                  <a href="#" class="active"><img class="progress1 img-circle mapping_kpi" src="{{url()}}/assets/vendor/img/kpi.png"><br>Mapping KPI</a>
                </div>
                @else
                <div class="col-md-3">
                 <a href="{{url()}}/setup_new_proj" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/set_up_new_project.png"><br>Setup New Project</a>
                </div>
                <div class="col-md-3">
                  <a href="{{url()}}/ingestion" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/ingest_data.png"><br>Ingeset Data</a>
                </div>
                <div class="col-md-3">
                  <a href="javascript:history.back()" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/mapdata.png"><br>Map Data</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active" id="mapping_kpi"><img class="progress1 img-circle mapping_kpi" src="{{url()}}/assets/vendor/img/kpi.png"><br>Mapping KPI</a>
                </div>
                @endif
              </div>
            </div>
         </div>
         
         <div class="row widget-11" >
            <div class="panel panel-default">
              <div class="widget-title-box">
                <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/map_kpi.png"></div>
                <h3 class="widget-title">Mapping KPI</h3>
              </div>
              

         
                <div class="panel" style="padding: 20px;">
                      @if(isset($project_type))
                      <div class = "row">
                        <div class= "col-md-2">
                          <label style="padding: 5px">Project Name</label>
                        </div>
                        <div class="col-md-3">
                          <label style="padding-top: 10px;" id= "proj_type">{{$project_type}}</label>
                        </div>
                      </div>    
                      @endif
                      <div class = "row">
                        <div class= "col-md-2">
                          <label style="padding: 5px">Select View</label>
                        </div>
                        <div class="col-md-3">
                          <select class="form-control .proj_name" id='proj_name' style="margin-top: -5px; width: 220px; margin-left: -15px">
                            <option></option>
                            @foreach($options as $option)
                            <option>{{$option}}</option>
                            @endforeach
                            <!-- <option>Market Overview</option>
                            <option>Market Access</option>
                            <option>SOB</option>
                            <option>Marketing</option> -->
                          </select>
                        </div>
                        
                      </div>

                        <br>
                      <div class="panel panel-default">
                        <div class="panel-heading"><h4><label>KPI Selection</label></h4></div>
                        <div class="panel-body">
                        <div class="wrongSelection"></div>
                          <div class="radio">
                            <input type="hidden" name="view_type" id="viewType" value="Market Overview">
                          </div>
                          <form id='kpimap'>
                          <div class="row">
                            <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h4><label>KPI</label></h4>
                                
                                <div id="choose_project">
                                  <div class="radio">
                                    <input type="hidden" name="view_id" id="viewId" value="0">
                                  </div>
                                  <div class="radio">
                                    <input type="hidden" name="sub_kpi_val" id="sub_kpi_val" value="0">
                                  </div>
                                  <div class="radio kpiArr1">
                                    <?php $kpis = explode(",",$project_kpi['kpi_name']); ?>
                                    @foreach($kpis as $kpi)
                                    <input type="checkbox" class="kpi_type" name="checkSubKPI" value="{{$kpi}}"> {{$kpi}}<br>
                                    @endforeach
                                  </div>
                                </div>
                            </div>
                            <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h4><label>Sub KPI</label></h4>
                                
                                <div>
                                  <div id="calSubKpi1">
                                    <!-- <div class="selectingSubKpi calSubKpi radio"></div> -->
                                    <div>
                                      <?php $kpis = explode(",",$project_kpi['kpi_subtype']); 

                                        ?>
                                        @if($kpis[0] != "")
                                        @foreach($kpis as $kpi)
                                        <input type="checkbox" class="kpi_sub_type" name="checkSubKPI" value="{{$kpi}}"> {{$kpi}}<br>
                                        @endforeach
                                        @endif
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row" id="1dimensionInfo">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12d">
                              <h4><label>Dimension</label></h4>
                              <br>
                              <div class="row">
                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><label>Product Selection</label></h4>
                                  <?php $kpis = explode(",",$project_kpi['Product']); ?>
                                    @foreach($kpis as $kpi)
                                    <input type="checkbox" class="prod_sel" name="checkSubKPI" value="{{$kpi}}"> {{$kpi}}<br>
                                    @endforeach
                                  <!-- <div id="product_selection">
                                    <div class="radio product_selection kpi_dim"></div>
                                  </div> -->
                                </div>

                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><label>Time Period Selection</label></h4>
                                  <?php $kpis = explode(",",$project_kpi['Time_Period']); ?>
                                    @foreach($kpis as $kpi)
                                    <input type="checkbox" class="time_period" name="checkSubKPI" value="{{$kpi}}"> {{$kpi}}<br>
                                    @endforeach
                                  <!-- <div id="time_period_selection">
                                    <div class="radio time_period_selection kpi_dim"></div>
                                  </div> -->
                                </div>

                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><label>Demographics</label></h4>
                                  <?php $kpis = explode(",",$project_kpi['Demographics']); ?>
                                    @foreach($kpis as $kpi)
                                    <input type="checkbox" class="demo_grap" name="checkSubKPI" value="{{$kpi}}"> {{$kpi}}<br>
                                    @endforeach
                                  <div id="geography">
                                    <!-- <div class="radio geography kpi_dim"></div>
                                    <div class="radio">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div> -->
                                  </div>
                                </div>

                                <div class="widget col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                  <h4><label>Clinical Factors</label></h4>
                                  <?php $kpis = explode(",",$project_kpi['Clinical_Factors']); ?>
                                    @foreach($kpis as $kpi)
                                    <input type="checkbox" class="clic_fac" name="checkSubKPI" value="{{$kpi}}"> {{$kpi}}<br>
                                    @endforeach
                                  <!-- <div id="product_selection_calculation">
                                    <div class="radio calculateSubKpi kpi_dim"></div>
                                  </div> -->
                                </div>
                              </div>
                            </div>
                        </div>
                        <hr>

                          <div class ="row center-block">
                            <div class="col-md-2 col-md-offset-4">
                            <input type="reset" name="newKpi" value="Add New KPI" id="addNewKpi" class="btn btn-success">
                              <!-- <button class ='btn btn-primary pull-left' data-toggle="modal" data-target="#addnewkpi" id='addkpi_btn'>Add New KPI</button> -->
                            </div>
                            <div class="col-md-6">
                              <button style="width: 200px" class ='btn btn-default' type="button" id='save_btn' data-toggle="modal" data-target="#send_to_workflow">Save &amp; Send for Workflow</button>
                            </div>
                          </div>
                          </form>

                      <br>

                        <div class="row" id="savedFlows">
                          <div class="col-md-12">
                              <div class="panel panel-default" id='addkpi' >
                                <div class="panel-heading"><h4><label>Saved KPI's</label></h4></div>
                                    <div class="panel-body flowsInfo">
                                      <div class="row" style="margin-bottom: 7px;">
                                        <div class="col-md-1"><label>Id</label></div>
                                        <div class="col-md-3 "><label>View</label></div>
                                        <div class="col-md-2 "><label>KPI</label></div>
                                        <div class="col-md-2 "><label>Sub KPI</label></div>
                                        <div class="col-md-2 "><label>Dimension</label></div>
                                        <div class="col-md-2"><label></label></div>
                                      </div>
                                    <div class="savedData"></div>                                
                                    <!-- <button class="btn btn-success pull-right" data-toggle="modal" data-target="#send_to_workflow">Send for Workflow</button> -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                        <div class = "col-md-6">
                            
                        <a href="{{url()}}/kpilib" target="_blank" class ='btn btn-success  pull-right' >View KPI Library</a>
                        
                      </div>
                      <div class = "col-md-2">
                        <button class ='btn  pull-left' data-toggle="modal" data-target="#myModal" style="background-color: #004256; color: #fff" >View Workflow</button>
                        
                      </div>
                    
                    </div>
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
        <h4 class="modal-title">DDS Orchestrator</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://176.9.181.46:8080/admin/" style="width: 100%; height: 500px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="send_to_workflow" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 500px; top: 150px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Success</h4>
      </div>
      <div class="modal-body">
        <label>Sent to Workflow</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="center-block btn btn-success" data-dismiss="modal" style="width: 100px">OK</button>
      </div>
    </div>

  </div>
</div>

<div id="sucessMsg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 200px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sucess</h4>
      </div>
      <div class="modal-body">
        <label>Saved&nbsp;Successfully...!</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>

<div id="deleteMsg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 200px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sucess</h4>
      </div>
      <div class="modal-body">
        <label>Deleted&nbsp;Successfully...!</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
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
  var kpiKey = 'Market Overview';
  $('#proj_name').on('change',function(){
    kpiKey = $(this).val();
    $.ajax({
        url : "{{url()}}/getExeFlow",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'kpiKey':kpiKey},
        success: function(response){
          var html = '';
          console.log(response);
          if (response.status == 'success') {
            var flowRes = response.data.getKpiMaps;

            for (var i = 0; i < flowRes.length; i++) {
              var viewName = flowRes[i]['project_name'];
              var kpiFlow = flowRes[i]['kpi'];
              var subKpiFlow = flowRes[i]['sub_kpi'];
              var dimFlow = flowRes[i]['dimension'];
              var flowId = flowRes[i]['id'];
              
              $('.savedData').show();

              var kpi_arr = '<div class="col-md-2">';
              // for (var kpi = 0; kpi < kpiFlow.length; kpi++) {
                kpi_arr += kpiFlow+'<br>';
              // }
              kpi_arr += '</div>';

              var subKpiArr = '<div class="col-md-2">';
              // for (var subkpi = 0; subkpi < subKpiFlow.length; subkpi++) {
                subKpiArr += subKpiFlow+'<br>';
              // }
              subKpiArr += '</div>';

              var dim_arr = '<div class="col-md-2">';
              // for (var dim = 0; dim < dimFlow.length; dim++) {
                dim_arr += dimFlow+'<br>';
              // }
              dim_arr += '</div>';            
              
              html += '<div class="row">'+
                          '<div class="col-md-1 ">'+flowId+'</div>'+
                          '<div class="col-md-3 ">'+viewName+'</div>'+
                          kpi_arr+
                          subKpiArr+
                          dim_arr+
                          '<div class="col-md-2"><input type="hidden" value="'+flowId+'" class="flowId"><i class="glyphicon glyphicon-pencil" aria-hidden="true" title="Click to Edit"></i>&nbsp;&nbsp;<i class="fa fa-trash-o delete-flow confirm-delete" aria-hidden="true" title="Click to Delete"></i></div>'+
                        '</div><hr><br>';

            }
            
          }else{
            html += '<b>No data to show.<br>Please insert data to '+kpiKey+' view.</b>';
          }
          $('.savedData').html(html).contents();
        }

    });
  })
    var progress_bar = 65;
  // $('#kpimap').hide();
  // $('#savedFlows').hide();
  // $('.savedData').hide();
  // $('#dimensionInfo').hide();
  
  $('.wrongSelection').hide(); // wrong selection message
    $('#kpimap').show();  // KPI checkbox division
    $('.savedData').show(); // view flows of data
    $('#savedFlows').show(); // view flows titles
    $('#dimensionInfo').hide(); // dimension related division
    $('#product_selection_calculation').hide(); // dimension calculations

    kpiFunction(kpiKey);
    subKpiFunction(kpiKey);
    productSelection(kpiKey);
    timePeriodSelection(kpiKey);
    geography(kpiKey);
    dimeCalculation();

    // $('#choose_project').find('input[type="checkbox"]').change(function(){ 
    //     var value = $('input[type="checkbox"]:checked').val();
    //     console.log('Selected project: '+$(this).val());

    //     subKpiFunction(value);
    // });

    $(document).on('change' ,'#calSubKpi .check_sub_kpi', function(){
      var value = $('#calSubKpi .check_sub_kpi:checked').val();
      $('#product_selection_calculation').show();
      dimeCalculation();

    });

    

    
// '<div class="col-md-2"><input type="hidden" value="'+flowId+'" class="flowId"><button type="button" class="btn-xs btn-primary edit-flow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>&nbsp;&nbsp;<button type="button" class="btn-xs btn-danger delete-flow confirm-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>'+
//                         '</div><hr><br>';

  $('#addNewKpi').click(function(){
    var value = 'kpi';
    // $('#kpimap').find('input, select').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
    var kpi_types = [];
    var kpi_sub_type = [];
    var dim= [];
    
    result = $('.kpi_type:checkbox:checked');
    for(var i = 0 ; i < result.length ; i++)      
    {
      kpi_types.push(result[i].value);
    }
    result = $('.kpi_sub_type:checkbox:checked');
    for(var i = 0 ; i < result.length ; i++)      
    {
      kpi_sub_type.push(result[i].value);
    }
    result = $('.prod_sel:checkbox:checked');
    for(var i = 0 ; i < result.length ; i++)      
    {
      dim.push(result[i].value);
    }
    result = $('.time_period:checkbox:checked');
    for(var i = 0 ; i < result.length ; i++)      
    {
      dim.push(result[i].value);
    }
    result = $('.demo_grap:checkbox:checked');
    for(var i = 0 ; i < result.length ; i++)      
    {
      dim.push(result[i].value);
    }
    var project_name = ($('#proj_name').val());
    $.ajax({
        url : "{{url()}}/updateKpi",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'project_name': project_name , 'kpi' : kpi_types , 'sub_kpi' : kpi_sub_type , 'dim' : dim},
        success: function(response){
          console.log(response);

        }
      });
    // kpiFunction();
    // subKpiFunction(value);
    // productSelection(value);
    // timePeriodSelection(value);
    // geography(value);
    // dimeCalculation();
    // $('#product_selection_calculation').hide(); // dimension calculations
  });

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
            subKpiVal += '<input type="checkbox" class="check_sub_kpi" name="checkSubKPI" value="'+subKpi[i]+'"> '+subKpi[i]+'<br>';
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
                'State',
                'City',
                'Territory'
        ];
      }else{
        geographylArr.length = 0;
      }
      if(geographylArr.length > 0 ){
        for (var i=0; i<geographylArr.length; i++) {
            geographyVal += '<input type="checkbox" class="geography kpi_dim" name="time_period_selection" value="'+geographylArr[i]+'"> '+geographylArr[i]+'<br>';
        }
      }

      $('.geography').html(geographyVal).contents(); 
  }  

// dimension calculations
function dimeCalculation(){
    var calWithSubKpi = [],
        mergeWithSubKpi = '',
        sub_kpi = '';

    $('#calSubKpi .check_sub_kpi:checked').each(function(){
      sub_kpi = $(this).val();

      $('#dimensionInfo').show();

      if(sub_kpi == 'Absolute Volume'){
        // calWithSubKpi = '';
      }else if(sub_kpi == 'Share'){
            
        calWithSubKpi.push('Drug Class share in Market', 'Product share in Drug Class');
      }else if(sub_kpi == 'Volume Change'){

        calWithSubKpi.push('YoY', 'Current year vs previous');
      }else {
            
        calWithSubKpi.push('Drug Class share in Market', 'Product share in Drug Class', 'YoY', 'Current year vs previous');
      }
      
    });

    // productSelection(sub_kpi);
    // timePeriodSelection(sub_kpi);
    // geography(sub_kpi);

    

    var unique = calWithSubKpi.filter(function(elem, index, self) {
        return index == self.indexOf(elem);
    });

    for(var ele=0; ele<unique.length; ele++){
          mergeWithSubKpi += '<input type="checkbox" class="dim_cal kpi_dim" name="merge_with_sub_kpi" value="'+unique[ele]+'"> '+unique[ele]+'<br>';
    }

    $('.calculateSubKpi').html(mergeWithSubKpi).contents();
}

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
$('.kpiArr').change(function(){
  if (progress_bar < 80) {
  progress_bar = progress_bar + 5;
  $('.progress-bar').css("width",progress_bar+"%");}
});
$('.calSubKpi').change(function(){
  if (progress_bar < 85) {
  progress_bar = progress_bar + 5;
  $('.progress-bar').css("width",progress_bar+"%");}
});
$('.kpi_dim').change(function(){
  if (progress_bar < 95) {
  progress_bar = progress_bar + 5;
  $('.progress-bar').css("width",progress_bar+"%");}
});
 

// change view
$('#proj_name').change(function(){
  var kpiKey = $(this).val();
  progress_bar = progress_bar + 10;
  $('.progress-bar').css("width",progress_bar+"%");
  $('#viewType').val(kpiKey);
  if (kpiKey != '') {
    $('.wrongSelection').hide(); // wrong selection message
    $('#kpimap').show();  // KPI checkbox division
    $('.savedData').show(); // view flows of data
    $('#savedFlows').show(); // view flows titles
    $('#dimensionInfo').hide(); // dimension related division
    $('#product_selection_calculation').hide(); // dimension calculations

    kpiFunction(kpiKey);
    subKpiFunction(kpiKey);
    productSelection(kpiKey);
    timePeriodSelection(kpiKey);
    geography(kpiKey);
    dimeCalculation();

    // $('#choose_project').find('input[type="checkbox"]').change(function(){ 
    //     var value = $('input[type="checkbox"]:checked').val();
    //     console.log('Selected project: '+$(this).val());

    //     subKpiFunction(value);
    // });

    $(document).on('change' ,'#calSubKpi .check_sub_kpi', function(){
      var value = $('#calSubKpi .check_sub_kpi:checked').val();
      $('#product_selection_calculation').show();
      dimeCalculation();

    });

    $.ajax({
        url : "{{url()}}/getExeFlow",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'kpiKey':kpiKey},
        success: function(response){
          var html = '';

          if (response.status == 'success') {
            var flowRes = response.data.getKpiMaps;

            for (var i = 0; i < flowRes.length; i++) {
              var viewName = flowRes[i]['project_name'];
              var kpiFlow = JSON.parse(flowRes[i]['kpi']);
              var subKpiFlow = JSON.parse(flowRes[i]['sub_kpi']);
              var dimFlow = JSON.parse(flowRes[i]['dimension']);
              var flowId = flowRes[i]['id'];
              
              $('.savedData').show();

              var kpi_arr = '<div class="col-md-2">';
              for (var kpi = 0; kpi < kpiFlow.length; kpi++) {
                kpi_arr += kpiFlow[kpi]+'<br>';
              }
              kpi_arr += '</div>';

              var subKpiArr = '<div class="col-md-2">';
              for (var subkpi = 0; subkpi < subKpiFlow.length; subkpi++) {
                subKpiArr += subKpiFlow[subkpi]+'<br>';
              }
              subKpiArr += '</div>';

              var dim_arr = '<div class="col-md-2">';
              for (var dim = 0; dim < dimFlow.length; dim++) {
                dim_arr += dimFlow[dim]+'<br>';
              }
              dim_arr += '</div>';            
              
              html += '<div class="row">'+
                          '<div class="col-md-1 ">'+flowId+'</div>'+
                          '<div class="col-md-3 ">'+viewName+'</div>'+
                          kpi_arr+
                          subKpiArr+
                          dim_arr+
                          '<div class="col-md-2"><input type="hidden" value="'+flowId+'" class="flowId"><i class="glyphicon glyphicon-pencil" aria-hidden="true" title="Click to Edit"></i>&nbsp;&nbsp;<i class="fa fa-trash-o delete-flow confirm-delete" aria-hidden="true" title="Click to Delete"></i></div>'+
                        '</div><hr><br>';

            }
            
          }else{
            html += '<b>No data to show.<br>Please insert data to '+kpiKey+' view.</b>';
          }
          $('.savedData').html(html).contents();
        }

    });
  }else{
    $('#kpimap').hide();
    $('#savedFlows').hide();
    $('.wrongSelection').show();
    $('.wrongSelection').html('<b>Please, Select correct view...!</b>').contents();
  }
});

$('.flowsInfo').on('click', '.delete-flow', function(){
  var flowId = $(this).closest('.col-md-2').find('.flowId').val();
  var view_type = $('#viewType').val();
  console.log('Deleted record is: '+flowId);
  console.log('View name is: '+view_type);

  $.ajax({
        url : "{{url()}}/getFlowForDelete",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'flowId':flowId,'view_type':view_type},
        success: function(response){
          var html = '';
          var kpiKey = response.kpiKey;
          if (response.status == 'success') {
            $('#deleteMsg').modal('show');

            var flowRes = response.data.getKpiMaps;

            for (var i = 0; i < flowRes.length; i++) {
              var viewName = flowRes[i]['project_name'];
              var viewId = flowRes[i]['id'];
              var kpiFlow = JSON.parse(flowRes[i]['kpi']);
              var subKpiFlow = JSON.parse(flowRes[i]['sub_kpi']);
              var dimFlow = JSON.parse(flowRes[i]['dimension']);
              
              $('.savedData').show();

              var kpi_arr = '<div class="col-md-2">';
              for (var kpi = 0; kpi < kpiFlow.length; kpi++) {
                kpi_arr += kpiFlow[kpi]+'<br>';
              }
              kpi_arr += '</div>';

              var subKpiArr = '<div class="col-md-2">';
              for (var subkpi = 0; subkpi < subKpiFlow.length; subkpi++) {
                subKpiArr += subKpiFlow[subkpi]+'<br>';
              }
              subKpiArr += '</div>';

              var dim_arr = '<div class="col-md-2">';
              for (var dim = 0; dim < dimFlow.length; dim++) {
                dim_arr += dimFlow[dim]+'<br>';
              }
              dim_arr += '</div>';            
              
              html += '<div class="row">'+
                          '<div class="col-md-1 ">'+viewId+'</div>'+
                          '<div class="col-md-3 ">'+viewName+'</div>'+
                          kpi_arr+
                          subKpiArr+
                          dim_arr+
                          '<div class="col-md-2"><input type="hidden" value="'+viewId+'" class="flowId"><button type="button" class="btn-xs btn-primary edit-flow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>&nbsp;&nbsp;<button type="button" class="btn-xs btn-danger delete-flow confirm-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>'+
                        '</div><hr><br>';

            }

            $('.savedData').html(html).contents();
          }else{
            $('#deleteMsg').modal('show');
            html += '<b>No data to show.<br>Please insert data to '+kpiKey+' view.</b>';
            $('.savedData').html(html).contents();
          }
        }
  });

});

$('body').on('click', '.edit-flow', function(){

  var flowId = $(this).closest('.col-md-2').find('.flowId').val();

  $.ajax({
        url : "{{url()}}/getFlowForEdit",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'flowId':flowId},
        success: function(response){
          if (response.status == 'success') {
            var flow = response.data[0];
            var kpiArr = JSON.parse(flow['kpi']);
            var subKpiArr = JSON.parse(flow['sub_kpi']);
            var dimArr = JSON.parse(flow['dimension']);

            console.log(flow);
            $('#viewId').val(flow['id']);

            kpiFunction(kpiArr);
            // kpi checked values
            for (var kpi = 0; kpi < kpiArr.length; kpi++) {
              $('input[value="'+kpiArr[kpi]+'"]').attr('checked', 'true');
            }

            subKpiFunction(kpiArr);

            // subkpi cheked value
            for (var subkpi = 0; subkpi < subKpiArr.length; subkpi++) {
              // if (subKpiArr[subkpi] != 'Absolute Volume') {
                   $('#product_selection_calculation').show(); // dimension calculations
              // }
              $('input[value="'+subKpiArr[subkpi]+'"]').attr('checked', 'true');
            }
            // $('input[value="'+flow['sub_kpi']+'"]').attr('checked', 'true');

            productSelection(kpiArr);
            timePeriodSelection(kpiArr);
            geography(kpiArr);
            dimeCalculation();

            // dimensions checked values
            for (var dim = 0; dim < dimArr.length; dim++) {
              $('input[value="'+dimArr[dim]+'"]').attr('checked', 'true');
            }

          }
        }
  });

});

  $('#save_btn').click(function(e){
      e.preventDefault();
      kpiKey = $('#proj_name').val();
      $.ajax({
        url : "{{url()}}/getExeFlow",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'kpiKey':kpiKey},
        success: function(response){
          var html = '';
          console.log(response);
          if (response.status == 'success') {
            var flowRes = response.data.getKpiMaps;

            for (var i = 0; i < flowRes.length; i++) {
              var viewName = flowRes[i]['project_name'];
              var kpiFlow = flowRes[i]['kpi'];
              var subKpiFlow = flowRes[i]['sub_kpi'];
              var dimFlow = flowRes[i]['dimension'];
              var flowId = flowRes[i]['id'];
              
              $('.savedData').show();

              var kpi_arr = '<div class="col-md-2">';
              // for (var kpi = 0; kpi < kpiFlow.length; kpi++) {
                kpi_arr += kpiFlow+'<br>';
              // }
              kpi_arr += '</div>';

              var subKpiArr = '<div class="col-md-2">';
              // for (var subkpi = 0; subkpi < subKpiFlow.length; subkpi++) {
                subKpiArr += subKpiFlow+'<br>';
              // }
              subKpiArr += '</div>';

              var dim_arr = '<div class="col-md-2">';
              // for (var dim = 0; dim < dimFlow.length; dim++) {
                dim_arr += dimFlow+'<br>';
              // }
              dim_arr += '</div>';            
              
              html += '<div class="row">'+
                          '<div class="col-md-1 ">'+flowId+'</div>'+
                          '<div class="col-md-3 ">'+viewName+'</div>'+
                          kpi_arr+
                          subKpiArr+
                          dim_arr+
                          '<div class="col-md-2"><input type="hidden" value="'+flowId+'" class="flowId"><i class="glyphicon glyphicon-pencil" aria-hidden="true" title="Click to Edit"></i>&nbsp;&nbsp;<i class="fa fa-trash-o delete-flow confirm-delete" aria-hidden="true" title="Click to Delete"></i></div>'+
                        '</div><hr><br>';

            }
            
          }else{
            html += '<b>No data to show.<br>Please insert data to '+kpiKey+' view.</b>';
          }
          $('.savedData').html(html).contents();
        }

    });  
      var dim_arr = [],
          kpi_arr = [],
          sub_kpi_arr = [],
          product_selection = [],
          time_period_selection = [],
          geography = [],
          product_selection_calculation = [],
          view_type = $('#viewType').val(),
          viewId = $('#viewId').val();
          // exe_sub_kpi = $('#sub_kpi_val').val();
          console.log(view_type);

      $('#choose_project').find('input[type="checkbox"]:checked').each(function(){
        kpi_arr.push($(this).val());

      });

      $('#calSubKpi').find('input[type="checkbox"]:checked').each(function(){
        sub_kpi_arr.push($(this).val());

      });

      // sub_kpi = $('#calSubKpi').find('input[name="checkSubKPI"]:checked').val();

      $('#dimensionInfo').find('input[type="checkbox"]:checked').each(function(){
        dim_arr.push($(this).val());

      });

      console.log(kpi_arr);
      console.log(sub_kpi_arr);
      console.log(dim_arr);

      $.ajax({
        url : "{{url()}}/saveMappingKpi",
        type: "POST",
        dataType: 'json',
        headers: {
             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        data: {'kpi_arr':kpi_arr,'sub_kpi_arr':sub_kpi_arr,'dim_arr':dim_arr,'view_type':view_type,'viewId':viewId},
        success: function(response){
          var html = '';
          
          if (response.status == 'success') {
            // console.log(response.data);

            // alert('Saved Successfully...!');
            $('#sucessMsg').modal('show'); 

            var flowRes = response.data.getKpiMaps;

            for (var i = 0; i < flowRes.length; i++) {
              var viewName = flowRes[i]['project_name'];
              var viewId = flowRes[i]['id'];
              var kpiFlow = JSON.parse(flowRes[i]['kpi']);
              var subKpiFlow = JSON.parse(flowRes[i]['sub_kpi']);
              var dimFlow = JSON.parse(flowRes[i]['dimension']);
              
              $('.savedData').show();

              var kpi_arr = '<div class="col-md-2">';
              for (var kpi = 0; kpi < kpiFlow.length; kpi++) {
                kpi_arr += kpiFlow[kpi]+'<br>';
              }
              kpi_arr += '</div>';

              var subKpiArr = '<div class="col-md-2">';
              for (var subkpi = 0; subkpi < subKpiFlow.length; subkpi++) {
                subKpiArr += subKpiFlow[subkpi]+'<br>';
              }
              subKpiArr += '</div>';

              var dim_arr = '<div class="col-md-2">';
              for (var dim = 0; dim < dimFlow.length; dim++) {
                dim_arr += dimFlow[dim]+'<br>';
              }
              dim_arr += '</div>';            
              
              html += '<div class="row">'+
                          '<div class="col-md-1 ">'+viewId+'</div>'+
                          '<div class="col-md-3 ">'+viewName+'</div>'+
                          kpi_arr+
                          subKpiArr+
                          dim_arr+
                          '<div class="col-md-2"><input type="hidden" value="'+viewId+'" class="flowId"><button type="button" class="btn-xs btn-primary edit-flow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>&nbsp;&nbsp;<button type="button" class="btn-xs btn-danger delete-flow confirm-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div>'+
                        '</div><hr><br>';

            }

            $('.savedData').html(html).contents();

          }
        }
      });
      $('.progress-bar').css("width","100%");   
      $('.mapping_kpi').attr("src","{{url()}}/assets/vendor/img/mappingkpi.png");   
  });
});
</script>
@stop