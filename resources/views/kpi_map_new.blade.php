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
                      <div class = "row">
                        <div class= "col-md-4">
                          <label>Select View:</label>
                          <select class="form-control pull-right" id='proj_name' style="margin-top: -5px; width: 220px">
                            <option></option>
                            @foreach($view as $val)
                            <option value="{{$val->view}}">{{$val->view}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class = "col-md-8">
                          <button class ='btn btn-warning  pull-right'>View KPI Library</button>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="panel panel-default" id='addkpi' >
                                <div class="panel-heading">Saved KPI'S</div>
                                <div class="panel-body">
                                    <div class="data">
                                      
                                    </div>                                
                                    <button class="btn btn-success pull-right">Senf for Workflow</button>
                                </div>
                              </div>
                          </div>
                      </div>
                      <br>

                      <div class="panel panel-default" id='kpimap'>
                        <div class="panel-heading">KPI Selection</div>
                        <div class="panel-body">
                          <div class ='row'>
                            <div class = "col-md-2">
                              <label class=''>Functionality Name</label>
                            </div>
                            <div class = "col-md-2">
                              <label class =''>KPI</label>
                            </div>
                            <div class = "col-md-3">
                              <label class =''>KPI Description</label>
                            </div>
                            <div class = "col-md-2">
                              <label class =''>Calculations</label>
                            </div>
                            <div class = "col-md-3">
                              <label class =''>Dimensions</label>
                            </div>
                          </div>
                          <div id="adding">
                            
                          </div>
                          <div class ='row'>
                            <div class="col-md-12">
                              <button class ='btn btn-primary pull-right' id='save_btn'>Save</button>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
		      </div>
	    </div>
        <di
  </div>
 </div>
    
@stop
@section('BaseJSLib')
<script type="text/javascript">

  $('#save_btn').click(function(){

      var html_data = "";

      $('.dime').find('input[type="radio"]:checked').each(function(){

          var view = $(this).closest('.row').find('.view').text();

          var kpi = $(this).closest('.row').find('.kpi').text();

          var dimen = $(this).val();

          html_data += '<div class="row" style="margin-bottom: 7px;">'+
                            '<div class="col-md-3">'+view+'</div>'+
                            '<div class="col-md-3">'+kpi+'</div>'+
                            '<div class="col-md-3">'+dimen+'</div>'+
                            '<div class="col-md-3">'+
                                '<button class="btn btn-primary">Ready for Deployment</button>'+
                            '</div>'+
                        '</div>';
      });

      $('#addkpi').find('.data').append(html_data);
  });


	$(document).on('change','#proj_name',function()
	{
		console.log($(this).val())
		$.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/kpi', // This is the url we gave in the route
            dataType:'json',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'id' : $(this).val()}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
                //console.log(response);   
                var dim ="";
                var html ="";
                for(var i = 0 ; i< response.length ; i++)
                {
                   if (!(response[i].Dimension))
                    {
                      response[i].Dimension= '';
                    } 
                    if (!(response[i].kpi))
                    {
                      response[i].kpi= '';
                    }
                    if (!(response[i].kpi_desc))
                    {
                      response[i].kpi_desc= '';
                    } 
                    if (!(response[i].Calculation))
                    {
                      response[i].Calculation= '';
                    } 
                    
                }
                for(var i = 0 ; i< response.length ; i++)
                {
                    if (response[i].Dimension !== '') 
                    {
                        dim = '';
                        dim += "<div class='radio'><label><input type='radio' name='Dimension"+i+"' value='Drug'>Drug";
                        dim += "</label>";
                        dim += "</div>";
                        dim += "<div class='radio'>"
                        dim +=  "<label><input type='radio' name='Dimension"+i+"' value='Drug Class'>Drug Class"
                        dim += "</label>"
                        dim += "</div>"
                        dim += "<div class='radio'>"
                        dim += "<label><input type='radio' name='Dimension"+i+"' value='Time Period'>Time Period&nbsp";
                        dim += "<i class='fa fa-plus-circle' data-toggle='collapse' data-target='#time"+i+"'></i>"
                        dim += "<div class='collapse' id='time"+i+"'>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input type='checkbox' value=''>Year</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input type='checkbox' value=''>Quater</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox'>"
                        dim += "<label><input type='checkbox' value=''>Month</label>"
                        dim += "</div>";
                        dim += "</div>";
                        dim += "</label>"
                        dim += "</div>";
                        dim += "<div class='radio'>"
                        dim += "<label><input type='radio' name='Dimension"+i+"' value='Geography'>Geography&nbsp";
                        dim += "<i class='fa fa-plus-circle' data-toggle='collapse' data-target='#geo"+i+"'></i>"
                        dim += "<div class='collapse' id='geo"+i+"'>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input type='checkbox' value=''>State</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input type='checkbox' value=''>City</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox'>"
                        dim += "<label><input type='checkbox' value=''>District</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input type='checkbox' value=''>Territory</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input type='checkbox' value=''>Zip</label>"
                        dim += "</div>";
                        dim += "</div>";
                        dim += "</label>"
                        dim += "</div>";
                        //console.log ( response[i].Dimension);
                        response[i].Dimension = dim;
                    }
                    
                    
                }
                for(var i = 0 ; i< response.length ; i++)
                {
                  //console.log(response[i].view);
                   html +="<div class= 'row'>";
                   html +="<div class='col-md-2 view'>"+response[i].View+"";
                
                   html +="</div>";
                   html +="<div class='col-md-2 kpi'>"+response[i].KPI+"";
                   
                   html +="</div>";
                   html +="<div class='col-md-3'>"+response[i].kpi_desc+"";
                   
                   html +="</div>";
                   html +="<div class='col-md-2'>"+response[i].Calculation+"";
                   
                   html +="</div>";
                   html += "<div class='col-md-3 dime'>"+response[i].Dimension+"";
                     html += "</div>";
                   html += "</div><hr>";
                }
                $('#adding').html(html).contents();
           
            },
        });
	});
  $(document).on('click','#save_btn',function()
  {
                var html = document.getElementById("adding").innerHTML; ;
              $('#save').append(html);     
              $('#save .dime').remove();
           
    
    });
</script>
@stop