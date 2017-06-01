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
              		
              		
              	</div>
              	<div class = "row">
              		<div class= "col-md-1" style="padding-top: 5px;">
              			<label class = 'label label-warning'>Project Name</label>
              		</div>
              		<div class= "col-md-3">
              			<select class="form-control" id='proj_name'>
              				<option></option>
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
		<div class="panel panel-default collapse" id = 'addkpi' style="padding: 20px">
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
            	<div id= 'save'>
            	</div>
            	<br>
            	<br>
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
	            		<button class ='btn btn-primary'>Ready for Deployment</button>
	            	</div>
            	</div>
			</div>

        </div>
        
        <div class="panel panel-default collapse" id = 'kpimap' style="padding: 20px">
			<div class="panel-heading"><h4>Patient Profiling</h4></div>
			<div class="panel-body">
            	<div class ='row table-responsive'>
            		<table  class="table table-condensed table-hover" style="font-size:14px" id='whole_table'>
	            		<thead>
	            			<tr>
	            				<td></td>
	            				<td>Functionality Name</td>
	            				<td>KPI</td>
	            				<td>KPI Description</td>
	            				<td>Calculation</td>
	            				<td>Dimension</td>
	            			</tr>
	            		</thead>
	            		<tbody id ='table'>
	            			
	            		</tbody>
	            	</table>
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
	            		<button class ='btn btn-primary' id='save_btn'>Save</button>
	            	</div>
            	</div>
			</div>
			<button data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-plus"></span></button>
			<div class="collapse" id='demo'>
			<div class="checkbox">
			  <label><input type="checkbox" value="">Option 1</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" value="">Option 2</label>
			</div>
			<div class="checkbox disabled">
			  <label><input type="checkbox" value="">Option 3</label>
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
                console.log(response);   
                var html='';
                
                for(var i = 0 ; i< response.length ; i++)
                {
                	console.log(response[0].Dimension);
                }
                for(var i = 0 ; i< response.length ; i++)
                {
                	html += "<tr><td><div class='checkbox'><label><input type='checkbox' value="+response[i].View+">";
                	html +="</label>";
                	html +="</div>";
                	html +=	"<td>" +response[i].View+ "</td>";
                	html += "<td >" +response[i].kpi+ "</td>";
                	html += "<td >" +response[i].kpi+ "</td>";
                	html += "<td >" +response[i].Calculation+ "</td>";
                	html += "<td >" +response[i].Dimension+ "</td>";
                	html += "</td>";
                	html += "</tr>";
                }
                $('#table').html(html).contents();
           
            },
        });
	});
	$(document).on('click','#save_btn',function()
	{
                var html = $('#whole_table').html($('#_whole_table').html())[0];
           		$('#save').html(html);     
           
    
    });
</script>
@stop