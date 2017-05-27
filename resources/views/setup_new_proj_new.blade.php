@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Setup New Project</title>
@stop

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
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <h4><span class="label label-primary">Choose Project Subtype for RWE</span></h4>
                              <br>
                              <div class="selecting"></div>
                          </div>

                      </div>
                      <br>
                      <hr>
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12d">
                              <h4><span class="label label-primary">Data Tables</span></h4>
                              <br>
                              <form  action='{{url()}}/ingestion' method='post'>
                              {{ csrf_field() }}
                                <div id="d-tables"></div>
                              </form>
                                
                      <br>
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <button class="btn btn-success btn-md  pull-right" id= "sidq1" disabled>Proceed to Ingestion</button>
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
            $('.selecting').html(response).contents();
       
            },
    });
  });
});
$(document).on('change', '.sid', function()
 {
      //console.log($('input[id="#sid"]').is(':checked'));
      //console.log($('#sid').val());
      var widget_array =  [];
      $('.form-group input[type="checkbox"]:checked').each(function(){ 

          

          widget_array.push($(this).val());
      });
      $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/test1', // This is the url we gave in the route
        dataType:'html',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
      },
        data: {'id' : widget_array}, // a JSON object to send back
        success: function(response)
        { // What to do if we succeed
            console.log(response);   
            $('#d-tables').html(response).contents();
            $("#sidq1").remove();
       
            },
    });
      
    
   });
$(document).on('change', '.test2', function()
 {
      //$('.form-group input[type="checkbox"]:checked').each(function(){ 
          console.log("reached");
       $("#sidq").attr("disabled",false);

                           //});
});
</script>
@stop

