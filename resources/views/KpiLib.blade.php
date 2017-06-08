@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | KPI Library</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>	
              	<h3 class="widget-title">KPI LIBRARY</h3>
              	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead><span class='label label-primary' >Library</span>
                              <tr>
                                  <th>View</th>
                                  
                                  <th>KPI</th>
                                  <th>KPI Description</th>
                                  <th>Calculation</th>
                                  <th>Dimension</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($view as $key=>$val)
                                
                                	<tr>
                                	<td>{{$val->View}}</td>
                                	
                                	<td>{{$val->KPI}}</td>
                                	<td>{{$val->kpi_desc}}</td>
                                	<td>{{$val->Calculation}}</td>
										
                                	<td>{{$val->Dimension}}</td>
                                	</tr>
                                @endforeach
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
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).on('click','.cal_btn',function(){
		console.log($(this).val());
		$(this).closest('.cal').html($(this).val());
	});
</script>
@stop

