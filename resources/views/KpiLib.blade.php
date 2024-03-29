@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | KPI Library</title>
@stop
@section('BaseContent')

<div class="container-fluid bg">
  <div class="visualization">
      <div class="top-div1">
          <div class="row widget-1">
            <div class="widget-title-box" >
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/extlibrary.png" style="width:25px;height:40px; margin-left: 27px;"></div>	
              	<h3 class="widget-title">KPI LIBRARY</h3>
            </div>
              	<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                  <div class="panel panel-default" style="padding: 20px;">
                    <div class="panel-body">
                      <div class = "row">
                        <div class= "col-md-2">
                          <label style="padding: 5px">Select View:</label>
                        </div>

                        <div class="col-md-3">
                          <select class="form-control " id='proj_name' style="margin-top: -5px; width: 220px; margin-left: -70px">
                                <option></option>
                                @foreach($view as $key=>$val)
                                  @if($val->View=="Source of Business")
                                    <option>SoB</option>
                                  @else
                                    <option>{{$val->View}}</option>
                                  @endif
                                @endforeach
                                </select>
                              </div>
                            </div>
                          <hr>
                            <div class ='row'>
                        <div class = "col-md-2">
                          <label class='headers'>View Name</label>
                        </div>
                        <div class = "col-md-2">
                          <label class ='headers'>KPI</label>
                        </div>
                        <div class = "col-md-3">
                          <label class ='headers'>KPI Description</label>
                        </div>
                        <div class = "col-md-2">
                          <label class ='headers'>Calculations</label>
                        </div>
                        <div class = "col-md-3">
                          <label class ='headers'>Dimensions</label>
                        </div>
                      </div>
                      <div id="adding">
                      <div class="row">
                      
                      </div>
                      </div>
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
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).on('click','.cal_btn',function(){
		console.log($(this).val());
		$(this).closest('.cal').html($(this).val());
	});
$(document).on('change','#proj_name',function()
  {
    var html = "";
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
            }

          });
          
  });
$(document).ready(function()
  {
    var html = "";
    console.log($(this).val())
    $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/kpi', // This is the url we gave in the route
            dataType:'json',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: {'id' : "Market Access"}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
                
                
                console.log(response);
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
            }

          });
          
  });
</script>
@stop

