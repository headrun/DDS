<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

$(document).ready(function(){
	
    $('input[type=radio][name=optradio]').change(function(){
		$.ajax({
		    method: 'POST', // Type of response and matches what we said in the route
		    url: '{{url()}}/test', // This is the url we gave in the route
		    dataType:'html',
		    headers: {
			    'X-CSRF-TOKEN': "{{ csrf_token() }}",
			},
		    data: {'id' : $(this).val()}, // a JSON object to send back
		    success: function(response)
		    { // What to do if we succeed
		       	console.log(response);   
            $('.widget2').html(response).contents();
       
            },
		});
	});
});

$(document).ready(function(){
    $('body').on('change','#mselect',function(){
   var id= $("#mselect").val();
   
     });
      
});
    
 $(document).on('click', '.sid', function()
 {
      //console.log($('input[id="#sid"]').is(':checked'));
      //console.log($('#sid').val());
      var widget_array =  [];
      $('.widget2 input[type="checkbox"]:checked').each(function(){ 

          

          widget_array.push($(this).val());
      });
      $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/test1', // This is the url we gave in the route
        dataType:'html',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
      },
        data: {widget_array}, // a JSON object to send back
        success: function(response)
        { // What to do if we succeed
            console.log(response);   
            $('.widget3').html(response).contents();
       
            },
    });
      
    
   });

</script>
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Setup New Project</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <h4><span class="label label-primary">Choose a Project</span></h4>
                              <br>
                              <form>
                                <div class="radio-inline" >
                                  <input type="radio" name="optradio" value="Brand Launch">Brand Launch
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="RWE">RWE
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="Digital Analytics">Digital Analytics
                                </div>
                                <br><br>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="Social Media">Social Media
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="Supply Chain">Supply Chain
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="New Project">New Projecct
                                </div>
                              </form>
                          </div>
                          <div class ="widget2 col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                        </div>
                        
                    </div>
                    <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                    <div class="widget3"></div>
                    </div>
                </div>
                <div>
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Submit</button>

                  <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">


                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                              <div id='file'>
                                <br>
                                <div ><input class = 'btn btn-primary' type='file' ></div>
                              </div>
                              <hr>
                            </div>
                            <div class="modal-body">
                              <h4>
                              <span class="label label-primary">Readen Options</span>
                              </h4>
                              <br>
                              <div class="row">
                                <div class ='col-md-6'>
                                  <div>
                                    <input class = 'btn btn-default' type='text' style="width: 50px"/> 
                                    <span >Column Delimiter</span>
                                  </div>
                                </div>
                                <div class ='col-md-6'>
                                  <div>
                                    <input class = 'btn btn-default' type='text' style="width: 50px"/> 
                                    <span >Row Delimiter</span>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class ='col-md-6'>
                                  <div>
                                    <input class = 'btn btn-default' type='text' style="width: 50px"/> 
                                    <span >Quote Char</span>
                                  </div>
                                </div>
                                <div class ='col-md-6'>
                                  <div>
                                    <input class = 'btn btn-default' type='text' style="width: 50px"/> 
                                    <span >Comment Char</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class ='col-md-6 '>
                                  <div class ='checkbox'>
                                    <label><input class = 'btn-primary' type='checkbox'>Has Column Header
                                  </label>
                                  </div>
                                </div>
                                <div class ='col-md-6'>
                                  <div class ='checkbox'>
                                  <label><input class = 'btn btn-default' type='checkbox'>Has Row Header
                                  </label>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class ='col-md-6 '>
                                  <div class ='checkbox'>
                                  <label><input class = 'btn btn-default' type='checkbox'>Support Short Lines
                                  </label>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class ='col-md-6 checkbox'>
                                  <label><input class = 'btn btn-default' type='checkbox'>Skip First Lines
                                  </label>
                                </div>
                                <div class ='col-md-6'>
                                  <div class='btn-default'>
                                  <label><select class="form-control" id="sel2" >
                                    
                                    @for($i= 0 ; $i<=10; $i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                    </label>
                                  </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class ='col-md-6 '>
                                  <div class ='checkbox'>
                                  <label><input class = 'btn btn-default' type='checkbox'>Limit rows
                                  </label>
                                  </div>
                                </div>
                                <div class ='col-md-6'>
                                  <div class='btn-default'>
                                  <label>
                                    <select class="form-control" id="sel2" >
                                    
                                    @for($i= 0 ; $i<=50; $i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                    </select>

                                  </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Apply</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <span style="margin-right: 60px;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>
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
</html>