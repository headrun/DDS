@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Plan Dimension</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">IMS Plan Dimension</h3>
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
                                  <th>700</th>
                                  <th>700</th>
                                </tr>
                                <tr>
                                  <th>Number of Columns</th>
                                  <th>16</th>
                                  <th>16</th>
                                </tr>
                                </tbody>
                                </table>
                                <div class="long_table" style="overflow-x: scroll;">
                                <table class="table" style="font-size:14px" id="mainTable">
                              <thead><span class='label label-primary' >Duplicates</span>
                                <tr>
                                  <th>plan_id</th>
                                  <th>plan_nam</th>
                                  <th>plan_typ_cde</th>
                                  <th>plan_typ_desc</th>
                                  <th>plan_sbtyp_desc</th>
                                  <th>pymt_typ_desc</th>
                                  <th>ntnl_insr_nam</th>
                                  <th>ntnl_insr_typ_desc</th>
                                  <th>rgnl_org_nam</th>
                                  <th>rgnl_org_typ_desc</th>
                                  <th>mc_org_nam</th>
                                  <th>mc_org_typ_desc</th>
                                  <th>bnfts_admtr_nam</th>
                                  <th>bnfts_admtr_typ_desc</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th>8082</th>
                                  <th>BROWNSVILLE INDEPENDENT SCHOOL DISTRICT</th>
                                  <th>EMP_GRP</th>
                                  <th>EMPLOYER GROUP</th>
                                  <th>NOT APPLICABLE</th>
                                  <th>COMMERCIAL</th>
                                  <th>NO NATIONAL AVAILABLE</th>
                                  <th>NOT APPLICABLE</th>
                                  <th>NO REGIONAL AVAILABLE</th>
                                  <th>NOT APPLICABLE</th>
                                  <th>BROWNSVILLE INDEPENDENT SCHOOL DISTRICT</th>
                                  <th>EMPLOYER GROUP</th>
                                  <th>DATARX</th>
                                  <th>PBM</th>
                                </tr>
                                <tr>
                                  <th>8082</th>
                                  <th>BROWNSVILLE INDEPENDENT SCHOOL DISTRICT</th>
                                  <th>EMP_GRP</th>
                                  <th>EMPLOYER GROUP</th>
                                  <th>NOT APPLICABLE</th>
                                  <th>COMMERCIAL</th>
                                  <th>NO NATIONAL AVAILABLE</th>
                                  <th>NOT APPLICABLE</th>
                                  <th>NO REGIONAL AVAILABLE</th>
                                  <th>NOT APPLICABLE</th>
                                  <th>BROWNSVILLE INDEPENDENT SCHOOL DISTRICT</th>
                                  <th>EMPLOYER GROUP</th>
                                  <th>DATARX</th>
                                  <th>PBM</th>
                                </tr>
                                </tbody>
                                </table>
                                </div>
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
                                  <th>plan_id</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>plan_nam</th>
                                  <th>0%</th>
                                </tr>
                                <tr>
                                  <th>plan_typ_cde</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>plan_typ_desc</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>plan_sbtyp_desc</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>pymt_typ_desc</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>ntnl_insr_nam</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>ntnl_insr_typ_desc</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>rgnl_org_nam</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>rgnl_org_typ_desc</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>mc_org_nam</th>
                                  <th>4%</th>
                                </tr><tr>
                                  <th>mc_org_typ_desc</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>bnfts_admtr_nam</th>
                                  <th>0%</th>
                                </tr><tr>
                                  <th>bnfts_admtr_typ_desc</th>
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
