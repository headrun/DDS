@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Agregated Rx Data</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Agregated Rx Data</h3>
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
                                  <th>20,000</th>
                                  <th>20,000</th>
                                </tr>
                                <tr>
                                  <th>Number of Columns</th>
                                  <th>20</th>
                                  <th>20</th>
                                </tr>
                              </tbody>
                              </table>
                              <div>
                                <label>No duplicates</label>
                              </div>
                              </div>
                              <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <table class="table" style="font-size:14px" id="mainTable">
                                <thead>
                                  <tr>
                                    <th>Column Name</th>
                                    <th>Missing Values</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>market_id_1</td>
                                    <td>0%</td>

                                  </tr>
                                  <tr>
                                    <td>product_id</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>plan_id</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>data_type</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>week_ending_date</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>month_ending_date</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>sob_group</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>new_rx_count</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>refill_rx_count</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>total_rx_count</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>new_rx_quantity</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>refill_rx_quantity</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>total_rx_quantity</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>new_days_supply</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                  <tr>
                                    <td>refill_days_supply</td>
                                    <td>0%</td>
                                    
                                  </tr>

                                  <tr>
                                    <td>total_days_supply</td>
                                    <td>0%</td>
                                    
                                  </tr>
                                </tbody>
                              </table>    




