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
                        <div class= "col-md-5">
                          <label style="padding: 5px">Select View:</label>
                          <select class="form-control pull-right" id='proj_name' style="margin-top: -5px; width: 220px">
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
                                      <div class="col-md-1 "><label></label></div>
                                        <div class="col-md-3 "><label>View</label></div>
                                        <div class="col-md-3 "><label>KPI</label></div>
                                        <div class="col-md-3 "><label>Dimension</label></div>
                                        <div class="col-md-2"><label>Ready for Deployment</label>
                                        </div>
                                      </div>
                                    <div class="data">
                                      
                                    </div>                                
                                    <button class="btn btn-success pull-right">Send for Workflow</button>
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
                          <div class ='row'>
                            <div class="col-md-12">
                              <button class ='btn btn-primary pull-left' data-toggle="modal" data-target="#addnewkpi" id='addkpi_btn'>Add New KPI</button>
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
  $('#save_btn').click(function(){

      var html_data = "";
      var wid_array = [];
      var view;
      var obj ={};
      var i=0;
      $('.dime').find('input[type="checkbox"]:checked').each(function(){
         obj[$(this).closest('.row').find('.kpi').text()]="";

         //console.log(obj);
         
      });
      //console.log(obj);
      /*i=0;
      $('.dime').find('input[type="checkbox"]:checked').each(function(){
         obj[i].kpt=$(this).closest('.row').find('.kpi').text();
         //console.log(obj[i].kpt);
         i++;
      });
      i=0;
     */$('.dime').find('input[type="checkbox"]:checked').each(function(){
          if ($(this).val()!=="Year" && $(this).val()!=="Quater" && $(this).val()!=="Month" && $(this).val()!=="State" && $(this).val()!=="City" && $(this).val()!=="Territory")
          {
            
            for (var key in obj) 
            {
              if (obj.hasOwnProperty(key)) 
              {
                if(key===$(this).closest('.row').find('.kpi').text())
                {
                  obj[key]+=($(this).val())+"<br>";
                }
              }
            }
          }
          view = $(this).closest('.row').find('.view').text();
          
         
      });
     console.log(obj);
      for(var key in obj)
      {
            
            
              //var view = $(this).closest('.row').find('.view').text();

              var kpi = key;

              var dimen = obj[key];

              
              html_data += '<div class="row" style="margin-bottom: 7px;">'+
                                    '<div class="col-md-1"><div class="checkbox"><input type="checkbox" style="margin : auto"/>'+
                                    '</div></div>'+
                                '<div class="col-md-3">'+view+'</div>'+
                                '<div class="col-md-3">'+kpi+'</div>'+
                                '<div class="col-md-3">'+dimen+'</div>'+
                                '<div class="col-md-2">'+
                                    '<center><i class="fa fa-check" aria-hidden="true"/></center>'+
                                '</div>'+
                            '</div>';
            
          }


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

                  response[i].Dimension= response[i].Dimension.split(",");
                  for(var j = 0 ; j< response[i].Dimension.length; j++)
                  {
                    if(response[i].Dimension[j])
                    {
                      dim = "";
                      console.log(response[i].Dimension[j]);
                      if(response[i].Dimension[j] === " time period(year.quarter.month)" || response[i].Dimension[j]=== " time period(YoY.YTD.QTD.MTD)")
                      {

                        dim += "<div class='checkbox'>"
                        dim += "<input class= 'timee' type='checkbox' name='Dimension'  value='Time Period'>Time Period&nbsp";
                        dim += "<i class='fa fa-plus-circle' data-toggle='collapse' data-target='#time"+i+"'></i>"
                        dim += "<div class='collapse' id='time"+i+"'>";
                        dim += "<div class='time1'>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input class='time' type='checkbox' value='Year'>Year</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input class='time' type='checkbox' value='Quater'>Quater</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox'>"
                        dim += "<label><input class='time' type='checkbox' value='Month'>Month</label>"
                        dim += "</div>";
                        dim += "</div>";
                        dim += "</div>";
                        

                      }
                      else if(response[i].Dimension[j] === "geography(state.city.district.territory.zip)")
                      {
                        dim += "<div class='checkbox'>"
                        dim += "<input class='geoo' type='checkbox' name='Dimension"+i+"' value='Geography'>Geography&nbsp";
                        dim += "<i class='fa fa-plus-circle' data-toggle='collapse' data-target='#geo"+i+"'></i>"
                        dim += "<div class='collapse geo' id='geo"+i+"'>";
                        dim += "<div class='geo1'>";
                        dim += "<div class='checkbox'>";

                        dim += "<label><input type='checkbox' value='State'>State</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>";
                        dim += "<label><input type='checkbox' value='City'>City</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>"
                        dim += "<label><input type='checkbox' value='District'>District</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>";
                        dim += "<label><input type='checkbox' value='Territory'>Territory</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>";
                        dim += "<label><input type='checkbox' value='Zip'>Zip</label>"
                        dim += "</div>";
                        dim += "</div>";
                        dim += "</div>";


                      }
                      else
                      {
                        dim += "<div class='checkbox'><input type='checkbox' name='Dimension"+response[i].Dimension[j]+"' value='"+response[i].Dimension[j]+"'>"+response[i].Dimension[j]+"";
                      }
                      dim += "</div>";
                      response[i].Dimension[j] = dim;
                    }
                  }
                  response[i].Dimension = response[i].Dimension.join(" ");
                 // console.log(response[i].Dimension);
                }
                
                /*for(var i = 0 ; i< response.length ; i++)
                {
                    if (response[i].Dimension !== '') 
                    {
                        dim = '';
                        dim += "<div class='checkbox'><label><input type='checkbox' name='Dimension"+i+"' value='Drug'>Drug";
                        dim += "</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox'>"
                        dim +=  "<label><input type='checkbox' name='Dimension"+i+"' value='Drug Class'>Drug Class"
                        dim += "</label>"
                        dim += "</div>"
                        dim += "<div class='checkbox'>"
                        dim += "<label><input class= 'timee' type='checkbox' name='Dimension'  value='Time Period'>Time Period&nbsp";
                        dim += "<i class='fa fa-plus-circle' data-toggle='collapse' data-target='#time"+i+"'></i>"
                        dim += "<div class='collapse' id='time"+i+"'>";
                        dim += "<div class='time1'>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input class='time' type='checkbox' value='Year'>Year</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox'>";
                        dim += "<label><input class='time' type='checkbox' value='Quater'>Quater</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox'>"
                        dim += "<label><input class='time' type='checkbox' value='Month'>Month</label>"
                        dim += "</div>";
                        dim += "</div>";
                        dim += "</label>"
                        dim += "</div>";
                        dim += "</div>";
                        dim += "<div class='checkbox'>"
                        dim += "<label><input class='geoo' type='checkbox' name='Dimension"+i+"' value='Geography'>Geography&nbsp";
                        dim += "<i class='fa fa-plus-circle' data-toggle='collapse' data-target='#geo"+i+"'></i>"
                        dim += "<div class='collapse geo' id='geo"+i+"'>";
                        dim += "<div class='geo1'>";
                        dim += "<div class='checkbox'>";

                        dim += "<label><input type='checkbox' value='State'>State</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>";
                        dim += "<label><input type='checkbox' value='City'>City</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>"
                        dim += "<label><input type='checkbox' value='District'>District</label>"
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>";
                        dim += "<label><input type='checkbox' value='Territory'>Territory</label>";
                        dim += "</div>";
                        dim += "<div class='checkbox geo'>";
                        dim += "<label><input type='checkbox' value='Zip'>Zip</label>"
                        dim += "</div>";
                        dim += "</div>";
                        dim += "</div>";
                        dim += "</label>"
                        dim += "</div>";
                        //console.log ( response[i].Dimension);
                        response[i].Dimension = dim;
                    }
                    
                    
                }*/
                for(var i = 0 ; i< response.length ; i++)
                {
                  //console.log(response[i].view);
                   html +="<div class= 'row'>";
                   html +="<div class='col-md-2 view' value='"+response[i].View+"'>"+response[i].View+"";
                
                   html +="</div>";
                   html +="<div class='col-md-2 kpi'value='"+response[i].KPI+"'>"+response[i].KPI+"";
                   
                   html +="</div>";
                   html +="<div class='col-md-3' value='"+response[i].kpi_desc+"'>"+response[i].kpi_desc+"";
                   
                   html +="</div>";
                   html +="<div class='col-md-2'>";
                   html+= '<button class="btn btn-link" data-toggle="collapse" data-target="#demo'+i+'">Show Calculations</button><div id="demo'+i+'" class="collapse">'+response[i].Calculation+'</div>'
                    
                    
                                  
                   
                   html +="</div>";
                   html += "<div class='col-md-3 dime' value='"+response[i].Dimensions+"'>"+response[i].Dimension+"";
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