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
      	 <div class="row widget-1" style="padding-top: 30px">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              	<h3 class="widget-title">KPI</h3>
              	<div class ='row'>
              		<div class= 'col-md-3'>
              			<label class = 'label label-warning'>Project Name</label>
              		</div>
              	</div>
              	<div class = "row">
              		<div class= "col-md-3">
              			<select class="form-control" id='proj_name'>
              				@foreach($view as $val)
              				<option value="{{$val->view}}">{{$val->view}}</option>
              				@endforeach
              			</select>
              		</div>
              		<div class = "col-md-3 pull-right">
              			<button class ='btn btn-primary'>View KPI Library</button>
              		</div>
		     	</div>

		</div>
	</div>
   <button class='btn btn-primary' data-toggle="collapse" data-target="#addkpi"><span class="glyphicon glyphicon-plus"></span>ADD KPI</button>
     <button class='btn btn-primary' data-toggle="collapse" data-target="#kpimap"><span class="glyphicon glyphicon-plus"></span>VIEW PANEL</button>
		<div class="panel panel-default collapse" id = 'addkpi' >
			<div class="panel-heading"><h4>ADD KPI</h4></div>
			<div class="panel-body">
            	<div class ='row'>
            		<div class = "col-md-1">
            			
            		</div>
            		<div class = "col-md-2">
                  <label class ='btn btn-primary'>View </label>
                </div>
                <div class = "col-md-2">
                  <label class ='btn btn-primary'>KPI</label>
                </div>
                <div class = "col-md-2">
                  <label class ='btn btn-primary'>Dimension</label>
                </div>
                <div class = "col-md-3">
                  <label class ='btn btn-primary'>Ready for Deployment</label>
                </div>
            	</div>
            	<br>
            	<br>
              <div id = 'save'></div>
            	<div class ='row' >
	            	<div class = "col-md-1">
	            		
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-1">
	            		<button class ='btn btn-primary'>Ready for Deployment</button>
	            	</div>
            	</div>
			</div>

        </div>
        <div class="panel panel-default collapse" id = 'kpimap' style="padding: 20px">
			   <div class="panel-heading"></div>
			   <div class="panel-body">
            	<div class ='row'>
                <div class = "col-md-2">
                  <label class ='label label-primary'>Functionality Name</label>
                </div>
                <div class = "col-md-2">
                  <label class ='label label-primary'>KPI</label>
                </div>
                <div class = "col-md-3">
                  <label class ='label label-primary'>KPI Description</label>
                </div>
                <div class = "col-md-2">
                  <label class ='label label-primary'>Calculations</label>
                </div>
                <div class = "col-md-3">
                  <label class ='label label-primary'>Dimensions</label>
                </div>
	            </div>
              <hr>
              <br>
              <div id="adding">
                
              </div>


            	<br>
            	<br>
            	<br>
            	<hr>
            	<div class ='row'>
	            	<div class = "col-md-1">
	            		
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-2">
	            	
	            	</div>
	            	<div class = "col-md-1">
	            		<button class ='btn btn-primary' id ='save_btn'>Save</button>
	            	</div>
            	</div>
			</div>

        </div>
  </div>
 </div>
    
@stop
@section('BaseJSLib')
<script type="text/javascript">
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
                      response[i].Dimension= 'Nothing to Display';
                    } 
                    if (!(response[i].kpi))
                    {
                      response[i].kpi= 'Nothing to Display';
                    }
                    if (!(response[i].kpi_desc))
                    {
                      response[i].kpi_desc= 'Nothing to Display';
                    } 
                    if (!(response[i].Calculation))
                    {
                      response[i].Calculation= 'Nothing to Display';
                    } 
                    
                }
                for(var i = 0 ; i< response.length ; i++)
                {
                    if (response[i].Dimension !== 'Nothing to Display') 
                    {
                        dim = '';
                        dim += "<div class='radio'><label><input type='radio' value=''>Drug";
                        dim += "</label>";
                        dim += "</div>";
                        dim += "<div class='radio'>"
                        dim +=  "<label><input type='radio' value=''>Drug Class"
                        dim += "</label>"
                        dim += "</div>"
                        dim += "<div class='radio'>"
                        dim += "<label><input type='radio' value=''>Time Period&nbsp";
                        dim += "<button class ='btn btn-primary btn-xs' data-toggle='collapse' data-target='#time"+i+"'><span class='glyphicon glyphicon-plus'></span></button>"
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
                        dim += "<label><input type='radio' value=''>Geography&nbsp";
                        dim += "<button class ='btn btn-primary btn-xs'data-toggle='collapse' data-target='#geo"+i+"'><span class='glyphicon glyphicon-plus'></span></button>"
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
                   html +="<div class = 'col-md-2'>"+response[i].View+"";
                
                   html +="</div>";
                   html +="<div class = 'col-md-2'>"+response[i].KPI+"";
                   
                   html +="</div>";
                   html +="<div class = 'col-md-3'>"+response[i].kpi_desc+"";
                   
                   html +="</div>";
                   html +="<div class = 'col-md-2'>"+response[i].Calculation+"";
                   
                   html +="</div>";
                   html += "<div class = 'col-md-3'>"+response[i].Dimension+"";
                     html += "</div>";
                   html += "</div>";
                }
                $('#adding').html(html).contents();
           
            },
        });
	});
  $(document).on('click','#save_btn',function()
  {
                var html = document.getElementById("adding").innerHTML; ;
              $('#save').append(html);     
           
    
    });
</script>
@stop