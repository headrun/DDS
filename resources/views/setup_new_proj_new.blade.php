@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Setup New Project</title>
@stop
<link rel = 'stylesheet' href='http://getbootstrap.com/dist/css/bootstrap.css'>
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
                              <form action='{{url()}}/ingestion' method='post' id = 'group'>
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
  <div class ='row' >
    <div class = 'col-md-4' ><span class='label label-primary'>Prescriber Dimension</span>
      <table class="table table-bordered table-hover table-striped" >
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>rel_id</td>
            <td>int8</td>
            <td>Physician id</td>
          </tr>
          <tr>
            <td>provider_id_number</td>
            <td>varchar</td>
            <td>Provider id</td>
          </tr><tr>
            <td>data_agent_code</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>writer_type</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>first_name</td>
            <td>varchar</td>
            <td>Physician first name</td>
          </tr><tr>
            <td>middle_name</td>
            <td>varchar</td>
            <td>Physician middle name</td>
          </tr><tr>
            <td>last_name</td>
            <td>varchar</td>
            <td>Physician last name</td>
          </tr><tr>
            <td>title</td>
            <td>varchar</td>
            <td>title</td>
          </tr><tr>
            <td>specialty_code</td>
            <td>varchar</td>
            <td>Physician specialty code</td>
          </tr><tr>
            <td>specialty_desc</td>
            <td>varchar</td>
            <td>Physician specialty desc</td>
          </tr><tr>
            <td>address</td>
            <td>varchar</td>
            <td>address</td>
          </tr><tr>
            <td>city</td>
            <td>varchar</td>
            <td>city</td>
          </tr><tr>
            <td>state</td>
            <td>varchar</td>
            <td>state</td>
          </tr><tr>
            <td>zip_code</td>
            <td>varchar</td>
            <td>zip_code</td>
          </tr><tr>
            <td>ama_no_contact</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>ama_pdrp_indicator</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>ama_pdrp_date</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>presumed_dead_ind</td>
            <td>varchar</td>
            <td>Presumed dead indicator</td>
          </tr><tr>
            <td>type_of_practice_code</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>npi</td>
            <td>varchar</td>
            <td>npi</td>
          </tr><tr>
            <td>territory_id</td>
            <td>varchar</td>
            <td>Physician territory id</td>
          </tr><tr>
            <td>call_status_code</td>
            <td>varchar</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class = 'col-md-4'><span class='label label-primary'>Alignment</span>
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>First Name</td>
            <td>varchar</td>
            <td>First Name of physician</td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>varchar</td>
            <td>Last Name</td>
          </tr><tr>
            <td>Account</td>
            <td>varchar</td>
            <td>Account of physician</td>
          </tr><tr>
            <td>Address</td>
            <td>varchar</td>
            <td>Address of physician</td>
          </tr><tr>
            <td>City</td>
            <td>varchar</td>
            <td>City of physician</td>
          </tr><tr>
            <td>State</td>
            <td>varchar</td>
            <td>State of physician</td>
          </tr><tr>
            <td>Zip</td>
            <td>varchar</td>
            <td>Zip of physician</td>
          </tr><tr>
            <td>Specialty</td>
            <td>varchar</td>
            <td>Specialty of physician </td>
          </tr><tr>
            <td>Adoption Decile</td>
            <td>int</td>
            <td>Adoption Decile</td>
          </tr><tr>
            <td>Simple Decile</td>
            <td>int</td>
            <td>Simple Decile</td>
          </tr><tr>
            <td>Composite Decile</td>
            <td>int</td>
            <td>Composite Decile</td>
          </tr><tr>
            <td>Cluster</td>
            <td>varchar</td>
            <td>Cluster </td>
          </tr><tr>
            <td>Segment</td>
            <td>varchar</td>
            <td>Segment</td>
          </tr><tr>
            <td>IDN</td>
            <td>varchar</td>
            <td>IDN of physician</td>
          </tr><tr>
            <td>IDN Segment</td>
            <td>varchar</td>
            <td>IDN Segment</td>
          </tr><tr>
            <td>Affiliation Level</td>
            <td>varchar</td>
            <td>Affiliation Level</td>
          </tr><tr>
            <td>Account HCP Count</td>
            <td>int</td>
            <td>Account HCP Count </td>
          </tr><tr>
            <td>Target HCP Count/td>
            <td>int</td>
            <td>Target HCP Count</td>
          </tr><tr>
            <td>NP/PA Count</td>
            <td>int</td>
            <td></td>
          </tr><tr>
            <td>Trial HCP Affiliation Flag</td>
            <td>varchar</td>
            <td>Trial HCP Affiliation Flag of physician</td>
          </tr><tr>
            <td>territory_id</td>
            <td>varchar</td>
            <td>Physician territory id</td>
          </tr><tr>
            <td>call_status_code</td>
            <td>varchar</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  
  <div class = 'col-md-4'><span class='label label-primary'></span>
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ptnt_id</td>
            <td>int8</td>
            <td>patient id</td>
          </tr>
          <tr>
            <td>ptnt_brth_yr_nbr</td>
            <td>int4</td>
            <td>patient birth year</td>
          </tr><tr>
            <td>ptnt_gndr_cde</td>
            <td>int4</td>
            <td>gender</td>
          </tr><tr>
            <td>ptnt_zip3_cde</td>
            <td>int4</td>
            <td>zip</td>
          </tr><tr>
            <td>ptnt_st_cde</td>
            <td>varchar</td>
            <td>state code</td>
          
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<a ng-href="" data-toggle="popover" data-placement="bottom" id="test"><span class="badge"></span>Click Here</a>

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


/*$('.work').popover({
    content: $('#myPopoverContent').html(),
    html: true
}).hover(function() {
    $(this).popover('show');
});*/

/*$("body").on("mouseover",'.work',function(){
    debugger;
    content: $('#myPopoverContent').html(),
    html: true;
    $(this).popover('show');
  });*/
$(document).on('change', '#group', function()
 {
      //console.log($('input[id="#sid"]').is(':checked'));
      //console.log($('#sid').val());
      var widget_array1 =  [];
      var widget_array2 =  [];
      $('.Data input[type="checkbox" ]:checked').each(function(){ 

          

          widget_array1.push($(this).val());
      });
      $('.Bridging input[type="checkbox" ]:checked').each(function(){ 

          

          widget_array2.push($(this).val());
      });
      console.log((widget_array1).length,((widget_array2).length));
      console.log(((widget_array1).length)&&((widget_array2).length));
      if((widget_array1.length) > 0 && (widget_array2.length) > 0)
      {
          $(':input[type="submit"]').prop('disabled', false);
      }
      else
      {
          $(':input[type="submit"]').prop('disabled', true); 
      }
});
</script>
@stop

