@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Landing Page</title>
@stop
@section('BaseCSSLib')
<style type="text/css">

</style>
@stop
@section('BaseContent')
<body>
<div class="container-fluid bg">
  <!-- <div class="visualization"> -->
    <div class="row" style="margin-top: 100px">
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 box-left" >
          <label class="welcome"> Hello <b>{{ Auth::user()->name }},</b><br>
            <span class="message">Welcome to D-Cube's <br>Digital Discovery Suite.</span>
          </label>
          
      </div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 " >
         <div class="row" style="margin-top:  20px">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <button class="tt" value="1"><div class="panel panel-default box">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-3">
                  
                      <img src="{{url()}}/assets/vendor/img/setting.png" >
                      </div>
                    <div class="col-md-9">
                      <label class="head">DDS Data Foundation</label>
                        <label class="body">Setup Projects, edit and conduct maintanace of data Foundation 
                      </label>
                    </div>
                  </div>   
                </div>
              </div></button>
           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <button class="tt" value="2"><div class="panel panel-default box">
                
                <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                
                    <img src="{{url()}}/assets/vendor/img/iris.png" >
                  </div>
                  <div class="col-md-9">
                    <label class="head">DDS Iris</label>
                      <label class="body">Create new data sets to visualize new KPIs and implement custom models 
                    </label>
                  </div>
                </div>   
              </div>
            </div></button>
           </div>

         </div>
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <button class="tt" value="3"><div class="panel panel-default box">
                
                <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                
                    <img src="{{url()}}/assets/vendor/img/analytics.png" >
                  </div>
                  <div class="col-md-9">
                    <label class="head">Analytics Work Bench</label>
                      <label class="body">Publish, edit or customize pre-built dashboards for organization 
                    </label>
                  </div>
                </div>   
              </div>
            </div></button>
           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <button class="tt" value="4">
                <div class="panel panel-default box">
                  <div class="panel-body">
                  <div class="row">
                    <div class="col-md-3">
                      <img src="{{url()}}/assets/vendor/img/data.png" >
                    </div>
                  <div class="col-md-9">
                    <label class="head">Data Science Sandbox</label>
                      <label class="body">Collabrate, build and publish advance analytics workflows 
                    </label>
                  </div>
                </div>   
              </div>
            </div>
            </button>
           </div>

         </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <button class="tt" value="5">  
            <div class="panel panel-default box">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                
                  <img src="{{url()}}/assets/vendor/img/project.png">
                  </div>
                     <div class="col-md-9">
                      <label class="head">Project Monitor</label>
                        <label class="body">Monitor cluster, connections and overall project health 
                        </label>
                      </div>
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
</body>
@stop
@section('BaseJSLib')
<script type="text/javascript">
  $(document).ready(function(){
    $('.tt').on('click',function(){
      // console.log('$(this).val()');
      if($(this).val() == '1')
      {
        window.location.href ="{{url()}}/ddspage";
      }
    });
    
  });
</script>
@stop