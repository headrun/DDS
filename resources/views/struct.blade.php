@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Injestion</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#claims">edit mapping</button>
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#presrc">edit mapping</button>
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#mmit" >edit mapping</button>
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
                                      <button class="btn btn-info " >edit mapping</button>
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prodim" >edit mapping</button>
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#plndim" >edit mapping</button>
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#rrdim">edit mapping</button>
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prsdim">edit mapping</button>
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
                                      <button class="btn btn-info " data-toggle="modal" data-target="#allign">edit mapping</button>
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
                    <td>drug_id</td>
                  </tr>
                  <tr>
                    <td>ndc_11_cde</td>
                    <td>ndc_11_code</td>
                  </tr>
                  <tr>
                    <td>drug_nam</td>
                    <td>drug_name</td>
                  </tr>
                  <tr>
                    <td>brnd_gnrc_cde</td>
                    <td>brand_generic_flag</td>
                  </tr>
                  <tr>
                    <td>usc_cde</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>usc_nam</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>gnrc_drug_nam</td>
                    <td>generic_name</td>
                  </tr>
                  <tr>
                    <td>strgh_desc</td>
                    <td>strength_desc</td>
                  </tr>
                  <tr>
                    <td>dsg_form_desc</td>
                    <td>dosage_form_desc</td>
                  </tr>
                  <tr>
                    <td>pkg_sz_qty</td>
                    <td>pckg_size_qty</td>
                  </tr>
                  <tr>
                    <td>pkg_desc</td>
                    <td>pckg_desc</td>
                  </tr>
                  <tr>
                    <td>drug_mfg_nam</td>
                    <td>drug_mfg_name</td>
                  </tr>
                  <tr>
                    <td>pkg_lanch_dte</td>
                    <td>pckg_launch_date</td>
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
                    <td>time_period</td>
                  </tr>
                  <tr>
                    <td>client_id</td>
                    <td>client_id</td>
                  </tr>
                  <tr>
                    <td>plan_id</td>
                    <td>plan_id</td>
                  </tr>
                  <tr>
                    <td>plan</td>
                    <td>plan</td>
                  </tr>
                  <tr>
                    <td>formulary_id</td>
                    <td>formulary_id</td>
                  </tr>
                  <tr>
                    <td>formulary_name</td>
                    <td>formulary_name</td>
                  </tr>
                  <tr>
                    <td>contorller</td>
                    <td>contorller</td>
                  </tr>
                  <tr>
                    <td>parent</td>
                    <td>parent</td>
                  </tr>
                  <tr>
                    <td>pbm</td>
                    <td>pbm</td>
                  </tr>
                  <tr>
                    <td>pbm_relationship</td>
                    <td>pbm_relationship</td>
                  </tr>
                  <tr>
                    <td>channel</td>
                    <td>channel</td>
                  </tr>
                  <tr>
                    <td>plan_types</td>
                    <td>plan_type</td>
                  </tr>
                  <tr>
                    <td>state</td>
                    <td>state</td>
                  </tr>

                  <tr>
                    <td>lives</td>
                    <td>lives</td>
                  </tr>
                  <tr>
                    <td>drug</td>
                    <td>drug</td>
                  </tr>
                  <tr>
                    <td>universal_staus</td>
                    <td>universal_staus</td>
                  </tr>
                  <tr>
                    <td>raw_status</td>
                    <td>raw_status</td>
                  </tr>
                  <tr>
                    <td>pa</td>
                    <td>prior_ authorization </td>
                  </tr>
                  <tr>
                    <td>st</td>
                    <td>step_theraphy</td>
                  </tr>
                  <tr>
                    <td>ql</td>
                    <td>quantity_limit</td>
                  </tr>
                  <tr>
                    <td>Notes</td>
                    <td>Notes</td>
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
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>plan_id</td>
                    <td>plan_id</td>
                  </tr>
                  <tr>
                    <td>plan_nam</td>
                    <td>plan_name</td>
                  </tr>
                  <tr>
                    <td>plan_typ_cde</td>
                    <td>plan_type_code</td>
                  </tr>
                  <tr>
                    <td>plan_typ_desc</td>
                    <td>plan_type_desc</td>
                  </tr>
                  <tr>
                    <td>plan_sbtyp_desc</td>
                    <td>plan_subtype_desc</td>
                  </tr>
                  <tr>
                    <td>pymt_typ_desc</td>
                    <td>paymt_type_desc</td>
                  </tr>
                  <tr>
                    <td>ntnl_insr_nam</td>
                    <td>natnl_insr_name</td>
                  </tr>
                  <tr>
                    <td>ntnl_insr_typ_desc</td>
                    <td>natnl_insr_type_desc</td>
                  </tr>
                  <tr>
                    <td>rgnl_org_nam</td>
                    <td>reg_org_name</td>
                  </tr>
                  <tr>
                    <td>reg_org_name</td>
                    <td>reg_org_type_desc</td>
                  </tr>
                  <tr>
                    <td>mc_org_nam</td>
                    <td>mc_org_name</td>
                  </tr>
                  <tr>
                    <td>mc_org_typ_desc</td>
                    <td>mc_org_typ_desc</td>
                  </tr>
                  <tr>
                    <td>bnfts_admtr_nam</td>
                    <td>bnfts_admtr_nam</td>
                  </tr>

                  <tr>
                    <td>bnfts_admtr_typ_desc</td>
                    <td>bnft_adm_type_desc</td>
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
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>claim_rjct_rsn_cde</td>
                    <td>claim_rejc_rsn_code</td>
                  </tr>
                  <tr>
                    <td>claim_rjct_rsn_desc</td>
                    <td>claim_rejc_rsn_desc</td>
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
                    <td></td>
                  </tr>
                  <tr>
                    <td>market_name_1</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>market_id_2</td>
                    <td>market_id</td>
                  </tr>
                  <tr>
                    <td>market_name_2</td>
                    <td>market_name</td>
                  </tr>
                  <tr>
                    <td>product_id</td>
                    <td>product_id</td>
                  </tr>
                  <tr>
                    <td>product_name</td>
                    <td>product_name</td>
                  </tr>
                  <tr>
                    <td>ndc</td>
                    <td>ndc_11_code</td>
                  </tr>
                  <tr>
                    <td>usc</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>usc_description</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>bb_usc</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>bb_usc_description</td>
                    <td>  </td>
                  </tr>
                  <tr>
                    <td>drug_name</td>
                    <td>drug_name</td>
                  </tr>
                  <tr>
                    <td>generic_name</td>
                    <td>generic_name</td>
                  </tr>

                  <tr>
                    <td>form_code</td>
                    <td>form_code</td>
                  </tr>
                  
                  <tr>
                    <td>form_description</td>
                    <td>form_desc</td>
                  </tr>
                  <tr>
                    <td>strength_description</td>
                    <td>strength_desc</td>
                  </tr>
                  <tr>
                    <td>package_size</td>
                    <td>pckg_size_qty</td>
                  </tr>
                  <tr>
                    <td>manufacturer</td>
                    <td>drug_mfg_name</td>
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
                    <td>first_name</td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td>last_name</td>
                  </tr>
                  <tr>
                    <td>Account</td>
                    <td>Account</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>Address</td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>City</td>
                  </tr>
                  <tr>
                    <td>State</td>
                    <td>State</td>
                  </tr>
                  <tr>
                    <td>Zip</td>
                    <td>Zip</td>
                  </tr>
                  <tr>
                    <td>Specialty</td>
                    <td>Specialty</td>
                  </tr>
                  <tr>
                    <td>Adoption Decile</td>
                    <td>adpt_decile</td>
                  </tr>
                  <tr>
                    <td>Simple Decile</td>
                    <td>simple_decile</td>
                  </tr>
                  <tr>
                    <td>Composite Decile</td>
                    <td>comp_decide</td>
                  </tr>
                  <tr>
                    <td>Cluster</td>
                    <td>cluster</td>
                  </tr>
                  <tr>
                    <td>Segment</td>
                    <td>segment</td>
                  </tr>

                  <tr>
                    <td>IDN</td>
                    <td>idn</td>
                  </tr>
                  
                  <tr>
                    <td>IDN Segment</td>
                    <td>idn_segment</td>
                  </tr>
                  <tr>
                    <td>Affiliation Level</td>
                    <td>affiliation_level</td>
                  </tr>
                  <tr>
                    <td>Account HCP Count</td>
                    <td>acct_hcp_count</td>
                  </tr>
                  <tr>
                    <td>Target HCP Count</td>
                    <td>target_hcp_count</td>
                  </tr>
                  <tr>
                    <td>NP/PA Count</td>
                    <td>np_pa_count</td>
                  </tr>
                  <tr>
                    <td>Trial HCP Affiliation Flag</td>
                    <td>trial_hcp_affl_flag</td>
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
                    <td>rel_id</td>
                  </tr>
                  <tr>
                    <td>provider_id_number</td>
                    <td>provider_id_number</td>
                  </tr>
                  <tr>
                    <td>data_agent_code</td>
                    <td>data_agent_code</td>
                  </tr>
                  <tr>
                    <td>writer_type</td>
                    <td>writer_type</td>
                  </tr>
                  <tr>
                    <td>first_name</td>
                    <td>first_name</td>
                  </tr>
                  <tr>
                    <td>middle_name</td>
                    <td>middle_name</td>
                  </tr>
                  <tr>
                    <td>last_name</td>
                    <td>last_name</td>
                  </tr>
                  <tr>
                    <td>title</td>
                    <td>title</td>
                  </tr>
                  <tr>
                    <td>specialty_code</td>
                    <td>specialty_code</td>
                  </tr>
                  <tr>
                    <td>specialty_desc</td>
                    <td>specialty_desc</td>
                  </tr>
                  <tr>
                    <td>address</td>
                    <td>address</td>
                  </tr>
                  <tr>
                    <td>city</td>
                    <td>city</td>
                  </tr>
                  <tr>
                    <td>state</td>
                    <td>state</td>
                  </tr>

                  <tr>
                    <td>zip_code</td>
                    <td>zip_code</td>
                  </tr>
                  
                  <tr>
                    <td>ama_no_contact</td>
                    <td>ama_no_contact</td>
                  </tr>
                  <tr>
                    <td>ama_pdrp_indicator</td>
                    <td>ama_pdrp_indicator</td>
                  </tr>
                  <tr>
                    <td>ama_pdrp_date</td>
                    <td>ama_pdrp_date</td>
                  </tr>
                  <tr>
                    <td>presumed_dead_ind</td>
                    <td>presumed_dead_ind</td>
                  </tr>
                  <tr>
                    <td>type_of_practice_code</td>
                    <td>type_of_practice_code</td>
                  </tr>
                  <tr>
                    <td>npi</td>
                    <td>npi</td>
                  </tr>
                  <tr>
                    <td>territory_id</td>
                    <td>territory_id</td>
                  </tr>
                  <tr>
                    <td>call_status_code</td>
                    <td>call_status_code</td>
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
                    <td>claim_id</td>
                  </tr>
                  <tr>
                    <td>ptnt_id</td>
                    <td>ptnt_id</td>
                  </tr>
                  <tr>
                    <td>drug_id</td>
                    <td>drug_id</td>
                  </tr>
                  <tr>
                    <td>mdcl_prctr_id</td>
                    <td>mdcl_prctr_id</td>
                  </tr>
                  <tr>
                    <td>prmry_plan_id</td>
                    <td>prmry_plan_id</td>
                  </tr>
                  <tr>
                    <td>ptnt_pay_amt</td>
                    <td>ptnt_pay_amt</td>
                  </tr>
                  <tr>
                    <td>prmry_plan_pay_amt</td>
                    <td>prmry_plan_pay_amt</td>
                  </tr>
                  <tr>
                    <td>scnry_plan_id</td>
                    <td>scnry_plan_id</td>
                  </tr>
                  <tr>
                    <td>scnry_plan_pay_amt</td>
                    <td>scnry_plan_pay_amt</td>
                  </tr>
                  <tr>
                    <td>ptnt_oop_pay_amt</td>
                    <td>ptnt_oop_pay_amt</td>
                  </tr>
                  <tr>
                    <td>refil_cde</td>
                    <td>refil_cde</td>
                  </tr>
                  <tr>
                    <td>dspnd_qty</td>
                    <td>dspnd_qty</td>
                  </tr>
                  <tr>
                    <td>days_sply_cnt</td>
                    <td>days_sply_cnt</td>
                  </tr>

                  <tr>
                    <td>rx_fill_dte</td>
                    <td>rx_fill_dte</td>
                  </tr>
                  
                  <tr>
                    <td>ptnt_claim_seq_nbr</td>
                    <td>ptnt_claim_seq_nbr</td>
                  </tr>
                  <tr>
                    <td>claim_stus_cde</td>
                    <td>claim_stus_cde</td>
                  </tr>
                  <tr>
                    <td>claim_rjct_rsn_cde</td>
                    <td>claim_rjct_rsn_cde</td>
                  </tr>
                  <tr>
                    <td>rvrsl_lag</td>
                    <td>rvrsl_lag</td>
                  </tr>
                  <tr>
                    <td>encyd_rx_id</td>
                    <td>encyd_rx_id</td>
                  </tr>
                  <tr>
                    <td>days_until_next_fill_cnt</td>
                    <td>days_until_next_fill_cnt</td>
                  </tr>
                  <tr>
                    <td>copay_30_amt</td>
                    <td>copay_30_amt</td>
                  </tr>
                  <tr>
                    <td>sob_cde</td>
                    <td>sob_cde</td>
                  </tr>
                  <tr>
                    <td>new_to_prdct_ind</td>
                    <td>new_to_prdct_ind</td>
                  </tr>
                  <tr>
                    <td>cncmt_ind</td>
                    <td>cncmt_ind</td>
                  </tr>
                  <tr>
                    <td>final_claim_cde</td>
                    <td>final_claim_cde</td>
                  </tr>
                  <tr>
                    <td>prmry_plan_grp_nbr</td>
                    <td>prmry_plan_grp_nbr</td>
                  </tr>
                  <tr>
                    <td>scnry_plan_grp_nbr</td>
                    <td>scnry_plan_grp_nbr</td>
                  </tr>
                  <tr>
                    <td>daw_cde</td>
                    <td>daw_cde</td>
                  </tr>
                  <tr>
                    <td>athrz_refil_cnt</td>
                    <td>athrz_refil_cnt</td>
                  </tr>
                  <tr>
                    <td>deletion_flag</td>
                    <td>deletion_flag</td>
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
</script>
@stop
