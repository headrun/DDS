@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Injestion</title>
@stop
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/breadcrumb.css">
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="breadcrumb flat">
             <a href="{{url()}}/setup_new_proj">Setup New Project</a>
             <a href="{{url()}}/ingestion" >Ingest Data</a>
             <a href="javascript:history.back()" >Validate Data</a>
             <a href="#" class="active">Map Data</a>
         </div>
          <div class="row widget-1" style="padding-top: 30px">
          <div class="row widget-1">
              <div class="widget-icon"><img src="http://176.9.181.46/Dcube/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">
                Dcube Structure Mapping
              </h3>
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
                              
                                <tr class="each_row" style="display: none;" id='claims'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td>Symphony_Claims</td>
                                  <td>
                                      <select class="form-control source_name">
                                        <option>Dcube_Claims
                                        <option>Dcube_Claim_RejRsn_Dim</option>
                                        <option>Dcube_Claim_Dim</option>
                                      </select>
                                  </td>
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#claims">edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id='Prescriber_Source'>
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
                                  

                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#presrc">edit mapping</button>
                                  </td>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id='mmit'>
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
                                  

                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#mmit" >edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id= 'mmit_to_claims'>
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
                                  

                                  <td>
                                      <button class="btn btn-info " >edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id= 'Product_Dimension'>
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
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prodim" >edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id= 'Plan_Dimension'>
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
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#plndim" >edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id= 'Rejection_Reason'>
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
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#rrdim">edit mapping</button>
                                  </td>
                                  
                                </tr>

                                <tr class="each_row" style="display: none" id='Prescriber_Dimension'>
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
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prsdim">edit mapping</button>
                                  </td>
                                  
                                </tr>

                                <tr class="each_row" style="display: none" id='Prescriber Alignment'>
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
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#allign">edit mapping</button>
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
  
<!-- Modal -->
  <div id="prodim" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">
            
              <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>drug_id</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option selected>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>ndc_11_cde</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option selected>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>drug_nam</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option selected>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>brnd_gnrc_cde</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option selectedv>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>usc_cde</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option selected></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>usc_nam</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option selected></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>gnrc_drug_nam</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option selected>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>strgh_desc</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option selected>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>dsg_form_desc</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option selected>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>pkg_sz_qty</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option selected>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>pkg_desc</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option selected>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>drug_mfg_nam</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option selected>drug_mfg_name</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>pkg_lanch_dte</td>
                    <td>
                      <select class="form-control source_name"><span>Dcube Column</span>
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option></option>
                       <option></option>
                       <option>generic_name</option>
                       <option>strength_desc</option>
                       <option>dosage_form_desc</option>
                       <option>pckg_size_qty</option>
                       <option>pckg_desc</option>
                       <option>drug_mfg_name</option>
                       <option selected>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                </tbody>
              </table>
            
            
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
  <div id="mmit" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">
              <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>period</td>
                    <td>
                      <select class="form-control source_name">
                           <option selected>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    
                    <td>client_id</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option selected>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan_id</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option selected>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option selected>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>formulary_id</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option selected>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>formulary_name</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option selected>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>contorller</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option selected>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>parent</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option  selected>parent</option>
                           <option >pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>pbm</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option selected>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>pbm_relationship</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option selected>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>channel</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option selected>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan_types</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option selected>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>state</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option selected>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>

                  <tr>
                    <td>lives</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option selected>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>drug</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option selected>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>universal_staus</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option selected>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>raw_status</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option selected>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>pa</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option selected>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>st</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option selected>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>ql</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option selected>quantity_limit</option>
                           <option>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Notes</td>
                    <td>
                      <select class="form-control source_name">
                           <option>time_period</option>
                           <option>client_id</option>
                           <option>plan_id</option>
                           <option>plan</option>
                           <option>formulary_id</option>
                           <option>formulary_name</option>
                           <option>contorller</option>
                           <option>parent</option>
                           <option>pbm</option>
                           <option>pbm_relationship</option>
                           <option>channel</option>
                           <option>plan_type</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option selected>Notes</option>
                           <option></option>
                          </select>
                    </td>
                  </tr>
                </tbody>
              </table>
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
  <div id="plndim" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">
             <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>plan_id</td>
                    <td><select class="form-control source_name">
                         <option selected>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>plan_nam</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option selected>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>plan_typ_cde</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option selected>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>plan_typ_desc</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option selected>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>plan_sbtyp_desc</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option selected>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>pymt_typ_desc</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option selected>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>ntnl_insr_nam</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option selected>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>ntnl_insr_typ_desc</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option selected>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>rgnl_org_nam</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option selected>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>reg_org_name</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option selected>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>mc_org_nam</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option selected>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>mc_org_typ_desc</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option selected>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  <tr>
                    <td>bnfts_admtr_nam</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option selected>bnft_adm_name</option>
                         <option>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>

                  <tr>
                    <td>bnfts_admtr_typ_desc</td>
                    <td><select class="form-control source_name">
                         <option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_type_code</option>
                         <option>plan_type_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option>natnl_insr_type_desc</option>
                         <option>reg_org_name</option>
                         <option>reg_org_type_desc</option>
                         <option>mc_org_name</option>
                         <option>mc_org_type_desc</option>
                         <option>bnft_adm_name</option>
                         <option selected>bnft_adm_type_desc</option>
                        </select>   
                      </td>
                  </tr>
                  
                </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
  <div id="rrdim" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">
            <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>claim_rjct_rsn_cde</td>
                    <td>
                    <select class="form-control source_name">
                       <option selected>claim_rejc_rsn_code</option>
                       <option>claim_rejc_rsn_desc</option>
                       
                     </select>
                     </td>
                  </tr>
                  <tr>
                    <td>claim_rjct_rsn_desc</td>
                    <td>
                    <select class="form-control source_name">
                       <option>claim_rejc_rsn_code</option>
                       <option selected>claim_rejc_rsn_desc</option>
                       
                     </select>
                     </td>
                  </tr>
                  
                </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
  <div id="presrc" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">
            <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>market_id_1</td>
                    <td><select class="form-control source_name">
                           <option selected></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>  
                 
               
                  </tr>
                  <tr>
                    <td>market_name_1</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option selected></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>market_id_2</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option selected>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>market_name_2</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option selected>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>product_id</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option selected>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>product_name</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option selected>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>ndc</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option selected>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>usc</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option selected></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>usc_description</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option selected></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>bb_usc</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option selected></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>bb_usc_description</td>
                    <td> <select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option selected></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select> </td>
                  </tr>
                  <tr>
                    <td>drug_name</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option selected>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>generic_name</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option selected>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>

                  <tr>
                    <td>form_code</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option selected>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  
                  <tr>
                    <td>form_description</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option selected>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>strength_description</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option selected>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>package_size</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option selected>pckg_size_qty</option>
                           <option>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>manufacturer</td>
                    <td><select class="form-control source_name">
                           <option></option>
                           <option></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option></option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_desc</option>
                           <option>pckg_size_qty</option>
                           <option selected>drug_mfg_name</option>
                          </select></td>
                  </tr>
                  
                </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
  <div id="allign" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">

            <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>First Name</td>
                    <td><select class="form-control source_name">
                           <option selected>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  
               
                      </td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option selected>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Account</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option selected>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option selected>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option selected>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>State</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option selected>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Zip</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option selected>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Specialty</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option selected>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Adoption Decile</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option selected>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Simple Decile</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option selected>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Composite Decile</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option selected>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Cluster</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option selected>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Segment</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option selected>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>

                  <tr>
                    <td>IDN</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option selected>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  
                  <tr>
                    <td>IDN Segment</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option selected>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Affiliation Level</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option selected>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Account HCP Count</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option selected>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Target HCP Count</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option selected>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>NP/PA Count</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option selected>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Trial HCP Affiliation Flag</td>
                    <td><select class="form-control source_name">
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>adpt_decile</option>
                           <option>simple_decile</option>
                           <option>comp_decide</option>
                           <option>cluster</option>
                           <option>segment</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>acct_hcp_count</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option selected>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  
                </tbody>
              </table>
          </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
  <div id="prsdim" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">
            <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>rel_id</td>
                    <td><select class="form-control source_name">
                          <option selected>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>

                    </td>
                  </tr>
                  <tr>
                    <td>provider_id_number</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option selected>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>data_agent_code</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option selected>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                      </td>
                  </tr>
                  <tr>
                    <td>writer_type</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option selected>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>first_name</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option selected>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>middle_name</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option selected>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>last_name</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option selected>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>title</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option selected>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>specialty_code</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option selected>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>specialty_desc</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option selected>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>address</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option selected>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>city</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option selected>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>state</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option selected>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>

                  <tr>
                    <td>zip_code</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option selected>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  
                  <tr>
                    <td>ama_no_contact</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option selected>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>

                  </tr>
                  <tr>
                    <td>ama_pdrp_indicator</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option selected>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>ama_pdrp_date</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option selected>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>presumed_dead_ind</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option selected>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>type_of_practice_code</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option selected>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>npi</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option selected>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>territory_id</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option selected>territory_id</option>
                          <option>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>call_status_code</td>
                    <td><select class="form-control source_name">
                          <option>rel_id</option>
                          <option>provider_id_number</option>
                          <option>data_agent_code</option>
                          <option>writer_type</option>
                          <option>first_name</option>
                          <option>middle_name</option>
                          <option>last_name</option>
                          <option>title</option>
                          <option>specialty_code</option>
                          <option>specialty_desc</option>
                          <option>address</option>
                          <option>city</option>
                          <option>state</option>
                          <option>zip_code</option>
                          <option>ama_no_contact</option>
                          <option>ama_pdrp_indicator</option>
                          <option>ama_pdrp_date</option>
                          <option>presumed_dead_ind</option>
                          <option>type_of_practice_code</option>
                          <option>npi</option>
                          <option>territory_id</option>
                          <option selected>call_status_code</option>
                        </select>
                        </td>
                  </tr>
                  
                </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
  <div id="claims" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 50px">
          <div class = "row">
            <table class ='table stripped'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>claim_id</td>
                    <td><select class="form-control source_name">
                          <option selected>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>ptnt_id</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option selected>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>drug_id</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option selected>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>mdcl_prctr_id</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option selected>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>prmry_plan_id</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option selected>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>ptnt_pay_amt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option selected>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>prmry_plan_pay_amt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option selected>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>scnry_plan_id</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option selected>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>scnry_plan_pay_amt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option selected>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>ptnt_oop_pay_amt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option selected>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>refil_cde</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option selected>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>dspnd_qty</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option selected>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>days_sply_cnt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option selected>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>

                  <tr>
                    <td>rx_fill_dte</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option selected>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  
                  <tr>
                    <td>ptnt_claim_seq_nbr</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option selected>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>claim_stus_cde</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option selected>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>claim_rjct_rsn_cde</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option selected>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>rvrsl_lag</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option selected>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>encyd_rx_id</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option selected>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>days_until_next_fill_cnt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option selected>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>copay_30_amt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option selected>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>sob_cde</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option selected>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>new_to_prdct_ind</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option selected>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>cncmt_ind</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option selected>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>final_claim_cde</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option selected>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>prmry_plan_grp_nbr</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option selected>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>scnry_plan_grp_nbr</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option selected>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>daw_cde</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option selected>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>athrz_refil_cnt</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option selected>athrz_refil_cnt</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>deletion_flag</td>
                    <td><select class="form-control source_name">
                          <option>claim_id</option>
                          <option>ptnt_id</option>
                          <option>drug_id</option>
                          <option>mdcl_prctr_id</option>
                          <option>prmry_plan_id</option>
                          <option>ptnt_pay_amt</option>
                          <option>prmry_plan_pay_amt</option>
                          <option>scnry_plan_id</option>
                          <option>scnry_plan_pay_amt</option>
                          <option>ptnt_oop_pay_amt</option>
                          <option>refil_cde</option>
                          <option>dspnd_qty</option>
                          <option>days_sply_cnt</option>
                          <option>rx_fill_dte</option>
                          <option>ptnt_claim_seq_nbr</option>
                          <option>claim_stus_cde</option>
                          <option>claim_rjct_rsn_cde</option>
                          <option>rvrsl_lag</option>
                          <option>encyd_rx_id</option>
                          <option>days_until_next_fill_cnt</option>
                          <option>copay_30_amt</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>cncmt_ind</option>
                          <option>final_claim_cde</option>
                          <option>prmry_plan_grp_nbr</option>
                          <option>scnry_plan_grp_nbr</option>
                          <option>daw_cde</option>
                          <option>athrz_refil_cnt</option>
                          <option selected>deletion_flag</option>
          
                        </select></td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
</div>

@stop
@section('BaseJSLib')
<script type="text/javascript">
    $('a.dcube_struct').addClass('active');
    var str= "{{$val}}";
   var val = str.split(",");
   for(var i=0; i< val.length; i++)
    {
        val[i]= val[i].replace(/ /g , "_");
    }
    console.log(val);
$(document).ready(function(){

  for(var i=0; i< val.length; i++)
  {
    id = val[i];
    $('tbody').find('#'+id).show();
    console.log(id);
  }
  
});

</script>
@stop
