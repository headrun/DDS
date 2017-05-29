@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Injestion</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead>
                                <tr><center>
                                  <th></th>
                                  <th>Source Table</th>
                                  <th>Dcube Table</th>
                                  <th>Mapping</th>
                                  </center>
                                </tr>
                              </thead>
                              <tbody>
                              
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        Symphony_Claims
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_Claims
                                        <option>Dcube_Claim_RejRsn_Dim</option>
                                        <option>Dcube_Claim_Dim</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        Symphony_PrescSrc
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_PrescSrc</option>
                                        <option>Dcube_Presc_Dim</option>
                                        <option>Dcube_Presc</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        MMIT
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_MMIT</option>
                                        <option>Dcube_MMIT_Claims</option>
                                        <option>Dcube_MMIT_Dim</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        MMIT to CLAIMS
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_MMIT_Claims</option>
                                        <option>Dcube_MMIT</option>
                                        <option>Dcube_MMIT_Claims</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        Symphony Product Dimension
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_Product_Dim</option>
                                        <option>Dcube_Prod </option>
                                        <option>Dcube_Prod_Branded</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        Symphony Plan Dimension 
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_Plan_Dim</option>
                                        <option>Dcube_Plan_Hier</option>
                                        <option>Dcube_Plan_Status</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>
                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        Symphony Rejection Reason Dimension
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_Claim_RejRsn_Dim</option>
                                        <option>Dcube_Claim_Dim</option>
                                        <option>Dcube_Claims</option>
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>

                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        Symphony Prescriber Dimension
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                         <option>Dcube_Presc_Dim</option>
                                        <option>Dcube_PrescSrc</option>
                                        <option>Dcube_Presc</option>
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
                                </tr>

                                <tr class="each_row">
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>
                                      
                                        Prescriber Allignment 
                                      
                                  </td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_Presc_Allign</option>
                                        <option>Dcube_Presc_Dim</option>
                                        <option>Dcube_PrescSrc</option>
                                        
                                      </select>
                                  </td>
                                  
                                  <td class="extractor_name"></td>
                                  <td>
                                      <button class="btn btn-info " >Ok</button>
                                  </td>
                                  <td>
                                      <!--<i class="fa fa-check fa-2x" style="color: green" aria-hidden="true"></i>-->
                                  </td>
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
</div>