@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Territory Allignment</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Patient Dimension</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead><span class='label label-primary' >Source Comparison</span>
                                <tr>
                                  <th></th>
                                  <th>Ingested Table</th>
                                  <th>Source Table</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th>Number of Rows</th>
                                  <th>451</th>
                                  <th>451</th>
                                </tr>
                                <tr>
                                  <th>Number of Columns</th>
                                  <th>6</th>
                                  <th>6</th>
                                </tr>
                                <table class="table" style="font-size:14px" id="mainTable">
                              <span class='label label-primary' >Duplicates : 0</span>
                            
                                
                               
                              
                            </table>

                          </div>
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead><span class='label label-primary' >Missing Values</span>
                                <tr>
                                  <th>Column Name</th>
                                  <th>Missing Values in %</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Rel_id</td>
                                  <td>0%</td>
                                  
                                </tr>
                                <tr>
                                  <td>Terr_id</td>
                                  <td>0%</td>
                                  
                                </tr><tr>
                                  <td>City</td>
                                  <td>0%</td>
                                  
                                </tr><tr>
                                  <td>State</td>
                                  <td>0%</td>
                                  
                                </tr><tr>
                                  <td>Zip</td>
                                  <td>0%</td>
                                  
                                </tr><tr>
                                  <td>Cluster_id</td>
                                  <td>0%</td>
                                  
                                </tr>
                              </tbody>
                            </table>
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
@stop
