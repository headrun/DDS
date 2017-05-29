@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Presciber Source</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Presciber Source</h3>
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
                                  <th>70,000</th>
                                  <th>70,000</th>
                                </tr>
                                <tr>
                                  <th>Number of Columns</th>
                                  <th>20</th>
                                  <th>20</th>
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
                                  <th>market_id_1</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>market_name_1</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>market_name_2</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>product_id</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>product_name</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>ndc</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>usc</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>usc_description</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>bb_usc</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>bb_usc_description</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>drug_name</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>generic_name</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>form_code</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>form_description</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>strength_description</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>package_size</th>
                                  <th>0%</th>
                                </tr>
                                </tr><tr>
                                  <th>manufacturer</th>
                                  <th>0%</th>
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
