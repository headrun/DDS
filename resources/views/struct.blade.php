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
            <div class = "col-md-6">
              <select class="form-control source_name">
                <option>period</option>
                <option>client_id</option>
                <option>plan_id</option>
                <option>plan</option>
                <option>formulary_id</option>
                <option>formulary_name</option>
                <option>contorller</option>
                <option>parent</option>
                <option>pbm_relationship</option>
                <option>channel</option>
                <option>plan_types</option>
                <option>state</option>
                <option>lives</option>
                <option>drug</option>
                <option>universal_staus</option>
                <option>raw_status</option>
                <option>pa</option>
                <option>st</option>
                <option>ql</option>
                <option>Notes</option>
              </select>
            </div>
            <div class = "col-md-6">
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
                <option>Notes</option>
                <option></option>

              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
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
            <div class = "col-md-6">
              <select class="form-control source_name"><span>Source Column</span>
                <option>drug_id</option>
                <option>ndc_11_cde</option>
                <option>drug_nam</option>
                <option>brnd_gnrc_cde</option>
                <option>usc_cde</option>
                <option>usc_nam</option>
                <option>gnrc_drug_nam</option>
                <option>strgh_desc</option>
                <option>dsg_form_desc</option>
                <option>pkg_sz_qty</option>
                <option>pkg_desc</option>
                <option>drug_mfg_nam</option>
                <option>pkg_lanch_dte</option>
              </select>
            </div>
            <div class = "col-md-6">
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
                <option>pckg_launch_date</option>
              </select>
            </div>
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
            <div class = "col-md-6">
              <select class="form-control source_name">
                <option>plan_id</option>
                <option>plan_nam</option>
                <option>plan_typ_cde</option>
                <option>plan_typ_desc</option>
                <option>plan_sbtyp_desc</option>
                <option>pymt_typ_desc</option>
                <option>ntnl_insr_nam</option>
                <option>ntnl_insr_typ_desc</option>
                <option>rgnl_org_nam</option>
                <option>rgnl_org_typ_desc</option>
                <option>mc_org_nam</option>
                <option>mc_org_typ_desc</option>
                <option>bnfts_admtr_nam</option>
                <option>bnfts_admtr_typ_desc</option>
                
              </select>
            </div>
            <div class = "col-md-6">
              <select class="form-control source_name">
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
                <option>bnft_adm_type_desc</option>
                
              </select>
            </div>
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
            <div class = "col-md-6">
              <select class="form-control source_name">
                <option>claim_rjct_rsn_cde</option>
                <option>claim_rjct_rsn_desc</option>

              </select>
            </div>
            <div class = "col-md-6">
              <select class="form-control source_name">
                <option>claim_rejc_rsn_code</option>
                <option>claim_rejc_rsn_desc</option>
                
              </select>
            </div>
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
            <div class = "col-md-6">
              <select class="form-control source_name">
                <option>market_id_1</option>
                <option>market_name_1</option>
                <option>market_id_2</option>
                <option>market_name_2</option>
                <option>product_id</option>
                <option>product_name</option>
                <option>ndc</option>
                <option>usc</option>
                <option>usc_description</option>
                <option>bb_usc</option>
                <option>bb_usc_description</option>
                <option>drug_name</option>
                <option>generic_name</option>
                <option>form_code</option>
                <option>form_description</option>
                <option>strength_description</option>
                <option>package_size</option>
                <option>manufacturer</option>
                

              </select>
            </div>
            <div class = "col-md-6">
              <select class="form-control source_name">
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
                <option>drug_mfg_name</option>
                
                
              </select>
            </div>
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
            <div class = "col-md-6">
              <select class="form-control source_name">
                <option>First Name</option>
                <option>Last Name</option>
                <option>Account</option>
                <option>Address</option>
                <option>City</option>
                <option>State</option>
                <option>Zip</option>
                <option>Specialty</option>
                <option>Adoption Decile</option>
                <option>Simple Decile</option>
                <option>Composite Decile</option>
                <option>Cluster</option>
                <option>Segment</option>
                <option>IDN</option>
                <option>IDN Segment</option>
                <option>Affiliation Level</option>
                <option>Account HCP Count</option>
                <option>Target HCP Count</option>
                <option>NP/PA Count</option>
                <option>Trial HCP Affiliation Flag</option>
                
              </select>
            </div>
            <div class = "col-md-6">
              <select class="form-control source_name">
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
                <option>trial_hcp_affl_flag</option>
                
              </select>
            </div>
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
            <div class = "col-md-6">
              <select class="form-control source_name">
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
                <option>call_status_code</option>

              </select>
            </div>
            <div class = "col-md-6">
              <select class="form-control source_name">
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
                <option>call_status_code</option>
              </select>
            </div>
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
            <div class = "col-md-6">
              <select class="form-control source_name">
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
                <option>deletion_flag</option>

              </select>
            </div>
            <div class = "col-md-6">
              <select class="form-control source_name">
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
                <option>deletion_flag</option>

              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save Mappings</button>
        </div>
      </div>

    </div>
  </div>
</div>