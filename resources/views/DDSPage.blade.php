@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | DDS Page</title>
@stop
@section('BaseContent')
<style type="text/css">
body{
  background-image: url(../../assets/vendor/img/bg.png);
   min-height: 500px;
    /* Set background image to fixed (don't scroll along with the page) */
    background-attachment: fixed;
    /* Center the background image */
    background-position: center;
    /* Set the background image to no repeat */
    background-repeat: no-repeat;
    /* Scale the background image to be as large as possible */
    background-size: cover;

}
</style>  
<div class="container-fluid">
  <!-- <div class="visualization"> -->
    <div class="row" style="margin-top: 100px">
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 box-left" >
          <label class="welcome">DDS<br><b>Data Foundation</b><br>
            <span class="message">Setup Projects, edit <br> and conduct maintanace <br> of data Foundation.</span>
          </label>
          
      </div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" >
         <div class="row" style="margin-top:  70px">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="panel panel-default">
                <button class="box" value="1"><div class="panel-body">
                  <div class="row">
                    <div class="col-md-3">
                  
                      <img src="{{url()}}/assets/vendor/img/setting.png" >
                    </div>
                    <div class="col-md-9">
                      <label class="head">Setup Project<br></label>
                        <label class="body">Setup Projects, edit and conduct maintanace of data Foundation 
                      </label>
                    </div>
                  </div>   
                </div></button>
              </div>
           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="panel panel-default">
                <button class="box" value="2">
                <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                
                    <img src="{{url()}}/assets/vendor/img/iris.png" >
                  </div>
                  <div class="col-md-9">
                    <label class="head">Manage Extractor Library<br></label>
                      <label class="body">Create new data sets to visualize new KPIs and implement custom models 
                    </label>
                  </div>
                </div>   
              </div></button>
            </div>
           </div>

         </div>
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="panel panel-default">
                <button class="box" value="3">
                <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                
                    <img src="{{url()}}/assets/vendor/img/analytics.png" >
                  </div>
                  <div class="col-md-9">
                    <label class="head">Rule Engine<br></label>
                      <label class="body">Publish, edit or customize pre-built dashboards for organization 
                    </label>
                  </div>
                </div>   
              </div></button>
            </div>
           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="panel panel-default">
                <button class="box" value="4">
                <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                
                    <img src="{{url()}}/assets/vendor/img/data.png" >
                  </div>
                  <div class="col-md-9">
                    <label class="head">Data Catalog <br></label>
                      <label class="body">Collabrate, build and publish advance analytics workflows 
                    </label>
                  </div>
                </div>   
              </div>
            </button>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('.box').on('click',function(){
      console.log('reached');
      if($(this).val() == '1')
      {
        window.location.href ="{{url()}}/setup_new_proj";
      }
      else if($(this).val() == '2')
      {
        window.location.href ="{{url()}}/extractor_library";
      }
    });
    
  });
</script>

@stop