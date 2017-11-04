@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Landing Page</title>
@stop
@section('BaseContent')


<div class="container-fluid">
  <div class="visualization">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 box-left" >
          <label class="welcome"> Hello ,<b>{{ Auth::user()->name }}</b><br>
            <span class="message">Welcome to D-Cube's <br>Digital Discovery Suite</span>
          </label>
          
      </div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" >
         <div class="row" style="margin-top:  20px">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="panel panel-default">
                <button class="box" value="1"><div class="panel-body">
                  <div class="row">
                    <div class="col-md-3">
                  
                      <img src="{{url()}}/assets/vendor/img/setting.png" >
                    </div>
                    <div class="col-md-9">
                      <label class="head">DDS Data Foundation<br></label>
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
                  <div class="col-md-8">
                    <label class="head">DDS Data Foundation<br></label>
                      <label class="body">Setup Projects, edit and conduct maintanace of data Foundation 
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
                  <div class="col-md-8">
                    <label class="head">DDS Data Foundation<br></label>
                      <label class="body">Setup Projects, edit and conduct maintanace of data Foundation 
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
                  <div class="col-md-8">
                    <label class="head">DDS Data Foundation<br></label>
                      <label class="body">Setup Projects, edit and conduct maintanace of data Foundation 
                    </label>
                  </div>
                </div>   
              </div>
            </button>
            </div>
           </div>

         </div>
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="panel panel-default">
                <button class="box" value="5">
                <div class="panel-body">
                <div class="row">
                  <div class="col-md-3">
                
                    <img src="{{url()}}/assets/vendor/img/project.png" >
                  </div>
                  <div class="col-md-8">
                    <label class="head">DDS Data Foundation<br></label>
                      <label class="body">Setup Projects, edit and conduct maintanace of data Foundation 
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
@stop
@section('BaseJSLib')
<script type="text/javascript">
  $(document).ready(function(){
    $('.box').on('click',function(){
      console.log('reached');
      if($(this).val() == '1')
      {
        window.location.href ="{{url()}}/dashboard";
      }
    });
    
  });
</script>
@stop