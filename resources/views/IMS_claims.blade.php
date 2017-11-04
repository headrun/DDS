@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | IMS Claims</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">IMS Claims</h3>
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
                                  <th>claim_id</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>ptnt_id</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>drug_id</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>mdcl_prctr_id</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>prmry_plan_id</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>ptnt_pay_amt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>prmry_plan_pay_amt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>scnry_plan_id</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>scnry_plan_pay_amt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>ptnt_oop_pay_amt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>refil_cde</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>dspnd_qty</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>days_sply_cnt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>rx_fill_dte</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>ptnt_claim_seq_nbr</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>claim_stus_cde</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>claim_rjct_rsn_cde</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>rvrsl_lag</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>encyd_rx_id</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>days_until_next_fill_cnt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>copay_30_amt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>sob_cde</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>new_to_prdct_ind</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>cncmt_ind</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>final_claim_cde</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>prmry_plan_grp_nbr</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>scnry_plan_grp_nbr</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>daw_cde</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>athrz_refil_cnt</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>deletion_flag</th>
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
