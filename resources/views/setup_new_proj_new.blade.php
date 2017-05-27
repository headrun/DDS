@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Setup New Project</title>
@stop
<link rel = 'stylesheet' href='http://getbootstrap.com/dist/css/bootstrap.css'>
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Setup New Project</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a; padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <h4><span class="label label-primary">Choose a Project</span></h4>
                              <br>
                              <form>
                                <div class="radio-inline" >
                                  <input type="radio" name="optradio" value="Brand Launch">Brand Launch
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="RWE">RWE
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="Digital Analytics">Digital Analytics
                                </div>
                                <br><br>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="Social Media">Social Media
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="Supply Chain">Supply Chain
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio" value="New Project">New Projecct
                                </div>
                              </form>
                          </div>
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <h4><span class="label label-primary">Choose Project Subtype for RWE</span></h4>
                              <br>
                              <div class="selecting"></div>
                          </div>

                      </div>
                      <br>
                      <hr>
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12d">
                              <h4><span class="label label-primary">Data Tables</span></h4>
                              <br>
                              <form action='{{url()}}/ingestion' method='post' id = 'group'>
                              {{ csrf_field() }}
                                <div id="d-tables"></div>
                              </form>
                                
                      <br>
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <button class="btn btn-success btn-md  pull-right" id= "sidq1" disabled>Proceed to Ingestion</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class ='row' >
    <div class = 'col-md-4' ><span class='label label-primary'>Prescriber Dimension</span>
      <table class="table table-bordered table-hover table-striped" >
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>rel_id</td>
            <td>int8</td>
            <td>Physician id</td>
          </tr>
          <tr>
            <td>provider_id_number</td>
            <td>varchar</td>
            <td>Provider id</td>
          </tr><tr>
            <td>data_agent_code</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>writer_type</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>first_name</td>
            <td>varchar</td>
            <td>Physician first name</td>
          </tr><tr>
            <td>middle_name</td>
            <td>varchar</td>
            <td>Physician middle name</td>
          </tr><tr>
            <td>last_name</td>
            <td>varchar</td>
            <td>Physician last name</td>
          </tr><tr>
            <td>title</td>
            <td>varchar</td>
            <td>title</td>
          </tr><tr>
            <td>specialty_code</td>
            <td>varchar</td>
            <td>Physician specialty code</td>
          </tr><tr>
            <td>specialty_desc</td>
            <td>varchar</td>
            <td>Physician specialty desc</td>
          </tr><tr>
            <td>address</td>
            <td>varchar</td>
            <td>address</td>
          </tr><tr>
            <td>city</td>
            <td>varchar</td>
            <td>city</td>
          </tr><tr>
            <td>state</td>
            <td>varchar</td>
            <td>state</td>
          </tr><tr>
            <td>zip_code</td>
            <td>varchar</td>
            <td>zip_code</td>
          </tr><tr>
            <td>ama_no_contact</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>ama_pdrp_indicator</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>ama_pdrp_date</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>presumed_dead_ind</td>
            <td>varchar</td>
            <td>Presumed dead indicator</td>
          </tr><tr>
            <td>type_of_practice_code</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>npi</td>
            <td>varchar</td>
            <td>npi</td>
          </tr><tr>
            <td>territory_id</td>
            <td>varchar</td>
            <td>Physician territory id</td>
          </tr><tr>
            <td>call_status_code</td>
            <td>varchar</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class = 'col-md-4'><span class='label label-primary'>Alignment</span>
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>First Name</td>
            <td>varchar</td>
            <td>First Name of physician</td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>varchar</td>
            <td>Last Name</td>
          </tr><tr>
            <td>Account</td>
            <td>varchar</td>
            <td>Account of physician</td>
          </tr><tr>
            <td>Address</td>
            <td>varchar</td>
            <td>Address of physician</td>
          </tr><tr>
            <td>City</td>
            <td>varchar</td>
            <td>City of physician</td>
          </tr><tr>
            <td>State</td>
            <td>varchar</td>
            <td>State of physician</td>
          </tr><tr>
            <td>Zip</td>
            <td>varchar</td>
            <td>Zip of physician</td>
          </tr><tr>
            <td>Specialty</td>
            <td>varchar</td>
            <td>Specialty of physician </td>
          </tr><tr>
            <td>Adoption Decile</td>
            <td>int</td>
            <td>Adoption Decile</td>
          </tr><tr>
            <td>Simple Decile</td>
            <td>int</td>
            <td>Simple Decile</td>
          </tr><tr>
            <td>Composite Decile</td>
            <td>int</td>
            <td>Composite Decile</td>
          </tr><tr>
            <td>Cluster</td>
            <td>varchar</td>
            <td>Cluster </td>
          </tr><tr>
            <td>Segment</td>
            <td>varchar</td>
            <td>Segment</td>
          </tr><tr>
            <td>IDN</td>
            <td>varchar</td>
            <td>IDN of physician</td>
          </tr><tr>
            <td>IDN Segment</td>
            <td>varchar</td>
            <td>IDN Segment</td>
          </tr><tr>
            <td>Affiliation Level</td>
            <td>varchar</td>
            <td>Affiliation Level</td>
          </tr><tr>
            <td>Account HCP Count</td>
            <td>int</td>
            <td>Account HCP Count </td>
          </tr><tr>
            <td>Target HCP Count/td>
            <td>int</td>
            <td>Target HCP Count</td>
          </tr><tr>
            <td>NP/PA Count</td>
            <td>int</td>
            <td></td>
          </tr><tr>
            <td>Trial HCP Affiliation Flag</td>
            <td>varchar</td>
            <td>Trial HCP Affiliation Flag of physician</td>
          </tr><tr>
            <td>territory_id</td>
            <td>varchar</td>
            <td>Physician territory id</td>
          </tr><tr>
            <td>call_status_code</td>
            <td>varchar</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  
  <div class = 'col-md-4'><span class='label label-primary'></span>
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ptnt_id</td>
            <td>int8</td>
            <td>patient id</td>
          </tr>
          <tr>
            <td>ptnt_brth_yr_nbr</td>
            <td>int4</td>
            <td>patient birth year</td>
          </tr><tr>
            <td>ptnt_gndr_cde</td>
            <td>int4</td>
            <td>gender</td>
          </tr><tr>
            <td>ptnt_zip3_cde</td>
            <td>int4</td>
            <td>zip</td>
          </tr><tr>
            <td>ptnt_st_cde</td>
            <td>varchar</td>
            <td>state code</td>
          
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<<<<<<< HEAD
<div class="modal fade" id="setUpNewProject" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>

<div id="ProductDimension" style="display: none;">
  <div class="popover-heading">
    <strong>Product Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip product-dimension" border="1">
      <thead>
        <tr>
          <th>Field</th>
          <th>Datatype</th>
          <th>Description</th>      
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>drug_id</td>
          <td>int8</td>
          <td>unique drug id assign by data vendor</td>
        </tr>
        <tr>
          <td>ndc_11_cde</td>
          <td>varchar</td>
          <td>national drug code</td>
        </tr>
        <tr>
          <td>drug_nam</td>
          <td>varchar</td>
          <td>name corresponding to the ndc code</td>
        </tr>
        <tr>
          <td>brnd_gnrc_cde</td>
          <td>varchar</td>
          <td>flag which tells whether the drug is branded or generic</td>
        </tr>
        <tr>
          <td>usc_cde</td>
          <td>varchar</td>
          <td></td>
        </tr>
        <tr>
          <td>usc_nam</td>
          <td>varchar</td>
          <td></td>
        </tr>
        <tr>
          <td>gnrc_drug_nam</td>
          <td>varchar</td>
          <td>generic name</td>
        </tr>
        <tr>
          <td>strgh_desc</td>
          <td>varchar</td>
          <td>strength of drug</td>
        </tr>
        <tr>
          <td>dsg_form_desc</td>
          <td>varchar</td>
          <td>form of dosage</td>
        </tr>
        <tr>
          <td>pkg_sz_qty</td>
          <td>varchar</td>
          <td>package size quantity</td>
        </tr>
        <tr>
          <td>pkg_desc</td>
          <td>varchar</td>
          <td>package description</td>
        </tr>
        <tr>
          <td>drug_mfg_nam</td>
          <td>varchar</td>
          <td>drug manufacture name</td>
        </tr>
        <tr>
          <td>pkg_lanch_dte</td>
          <td>varchar</td>
          <td>package launch date</td>
        </tr>
      </tbody>
    </table>    
  </div>
</div>

<div id="claims" style="display: none;">
  <div class="popover-heading">
    <strong>Claims</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip claims" border="1">
      <thead>
        <tr>
          <th>Field</th>
          <th>Datatype</th>
          <th>Description</th>      
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>claim_id</td>
          <td>int8</td>
          <td>Unique Id to identify a claim</td>
        </tr>
        <tr>
          <td>ptnt_id</td>
          <td>int8</td>
          <td>Unique Id to identify a patient</td>
        </tr>
        <tr>
          <td>drug_id</td>
          <td>int8</td>
          <td>unique drug id assign by data vendor</td>
        </tr>
        <tr>
          <td>mdcl_prctr_id</td>
          <td>int8</td>
          <td>Practitioner ID (DS_WRITER_GID)</td>
        </tr>
        <tr>
          <td>prmry_plan_id</td>
          <td>int8</td>
          <td>Plan ID of the primary insurer</td>
        </tr>
        <tr>
          <td>ptnt_pay_amt</td>
          <td>float8</td>
          <td>Amount patient paid</td>
        </tr>
        <tr>
          <td>prmry_plan_pay_amt</td>
          <td>float8</td>
          <td>Amount plan paid</td>
        </tr>

        <tr>
          <td rowspan="3">scnry_plan_id</td>
          <td rowspan="3">float8</td>
          <td>Plan ID of secondary insurer, when applicable</td>
        </tr>
          <tr>  
            <td>
              *When performing secondary payer related analyses, use only records where PTD_FINAL_CLAIM = 1.
            </td>
          </tr>
          <tr>
            <td>
              **Records where PTD_FINAL_CLAIM = 9 are direct feed claims.  Direct feed claims contain no secondary payer information.
            </td>
          </tr>
        
        <tr>
          <td>scnry_plan_pay_amt</td>
          <td>float8</td>
          <td>Secondary Plan Pay</td>
        </tr>

        <tr>
          <td rowspan="2">ptnt_oop_pay_amt</td>
          <td rowspan="2">float8</td>
          <td>Patient Out of Pocket Cost</td>
        </tr>
          <tr>            
            <td>
              *This field reflects any buy down that may have occurred, and shows how much the patient paid out of pocket
            </td>
          </tr>

        <tr>
          <td>pkg_desc</td>
          <td>varchar</td>
          <td>package description</td>
        </tr>


        <tr>
          <td>refil_cde</td>
          <td>int8</td>
          <td>0 = New Rx, else value = Refill Number</td>
        </tr>

        <tr>
          <td>dspnd_qty</td>
          <td>float8</td>
          <td>Quantity</td>
        </tr>

        <tr>
          <td>days_sply_cnt</td>
          <td>float8</td>
          <td>Days Supply</td>
        </tr>

        <tr>
          <td>rx_fill_dte</td>
          <td>varchar</td>
          <td>RX Fill Date</td>
        </tr>

        <tr>
          <td>ptnt_claim_seq_nbr</td>
          <td>varchar</td>
          <td>Sequence number of claims by patient in order of occurrence</td>
        </tr>

        <tr>
          <td rowspan="5">claim_stus_cde</td>
          <td rowspan="5">varchar</td>
          <td>0 = Rejection</td>
        </tr>
          <tr> 
            <td>
              1 = Approval
            </td>
          </tr>
          <tr>
            <td>
              2 = Reversal
            </td>
          </tr>
          <tr>
            <td>
              *When performing rejection and/or reversal rate calculations, use only records where PTD_FINAL_CLAIM = 1.
            </td>
          </tr>
          <tr>
            <td>
              **Records where PTD_FINAL_CLAIM = 9 are direct feed claims.  Direct feed claims consist of approvals only.  As such, including them in rejection and/or reversal rate calculations increases the denominator but not the numerator, thus skewing the rates.
            </td>
          </tr>

        <tr>
          <td>claim_rjct_rsn_cde</td>
          <td>varchar</td>
          <td>if CLAIM_STATUS = 0, this field will contain the reject code, if one exists</td>
        </tr>

        <tr>
          <td>rvrsl_lag</td>
          <td>varchar</td>
          <td>If CLAIM_STATUS = 2, this field will contain the time between the approval and the reversal</td>
        </tr>

        <tr>
          <td>encyd_rx_id</td>
          <td>varchar</td>
          <td>Encrypted Rx Script Number</td>
        </tr>

        <tr>
          <td>days_until_next_fill_cnt</td>
          <td>float8</td>
          <td>Number of days until next approved claim for same patient and drug. Null if no future activity. Tip: Use with rejected and/or reversed claims to determine if patient filled in future.</td>
        </tr>

        <tr>
          <td>copay_30_amt</td>
          <td>float8</td>
          <td>(PRMRY_PTNT_PAY / DAYS_SUPPLY) * 30</td>
        </tr>

        <tr>
          <td>sob_cde</td>
          <td>varchar</td>
          <td>N, C, R, S, A (New to Market, Continuing, Reinitiating, Switch, Add)</td>
        </tr>

        <tr>
          <td>new_to_prdct_ind</td>
          <td>varchar</td>
          <td>1 = New to Product/Brand</td>
        </tr>

        <tr>
          <td>cncmt_ind</td>
          <td>varchar</td>
          <td>1 = Concomitancy</td>
        </tr>

        <tr>
          <td rowspan="2">final_claim_cde</td>
          <td rowspan="2">varchar</td>
          <td>1 = PTD Final Status Claim, 0 = Non Final Claim, 9 = Direct Feed Claim</td>
        </tr>
          <tr>  
            <td>
              *Direct feed claims consist of approvals only. Include in patient longitudinal studies only, i.e. persistency, adherence, etc…
            </td>
          </tr>

        <tr>
          <td>prmry_plan_grp_nbr</td>
          <td>varchar</td>
          <td>Encrypted Group Number of the primary insurer</td>
        </tr>

        <tr>
          <td>scnry_plan_grp_nbr</td>
          <td>varchar</td>
          <td>Encrypted Group Number of the secondary insurer</td>
        </tr>

        <tr>
          <td rowspan="12">daw_cde</td>
          <td rowspan="12">varchar</td>
          <td>
              DAW Code: This field indicates the prescriber's instruction regarding substitution of generic equivalents or order to dispense the specific product written.
            </td>
        </tr>
           
          <tr>  
            <td>
              DAW_CDE Description
            </td>
          </tr>
          <tr>
            <td>
              0 NO PRODUCT SELECTION INDICATED
            </td>
          </tr>
          <tr>
            <td>
              1 SUBSTITUTION NOT ALLOWED BY PRESCRIBER
            </td>
          </tr>
          <tr>
            <td>
              2 SUBSTITUTION ALLOWED-PATIENT REQUESTED PRODUCT DISPENSED
            </td>
          </tr>
          <tr>
            <td>
              3 SUBSTITUTION ALLOWED-PHARMACIST SELECTED PRODUCT DISPENSED
            </td>
          </tr>
          <tr>
            <td>
              4 SUBSTITUTION ALLOWED-GENERIC DRUG NOT IN STOCK
            </td>
          </tr>
          <tr>
            <td>
              5 SUBSTITUTION ALLOWED-BRAND DRUG DISPENSED AS GENERIC
            </td>
          </tr>
          <tr>
            <td>
              6 OVERRIDE
            </td>
          </tr>
          <tr>
            <td>
              7 SUBSTITUTION NOT ALLOWED-BRAND DRUG MANDATED BY LAW
            </td>
          </tr>
          <tr>
            <td>
              8 SUBSTITUTION ALLOWED-GENERIC DRUG NOT AVAILABLE IN MARKET
            </td>
          </tr>
          <tr> 
            <td>9 OTHER</td>
          </tr>
        
        <tr>
          <td>athrz_refil_cnt</td>
          <td>varchar</td>
          <td> Number of refills authorized for the original written script</td>
        </tr>

        <tr>
          <td rowspan="2">deletion_flag</td>
          <td rowspan="2">varchar</td>
          <td>1 = Deletion flag else NULL</td>
        </tr>
          <tr>
            <td>
              Note: Populated only for Incremental refresh
            </td>
          </tr>

      </tbody>
    </table>    
  </div>
</div>

<div id="mmit" style="display: none;">
  <div class="popover-heading">
    <strong>MMIT</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip mmit" border="1">
      <thead>
        <tr>
          <th>Field</th>
          <th>Datatype</th>
          <th>Description</th>      
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>period</td>
          <td>int4</td>
          <td>Time Period(year and month)</td>
        </tr>
        <tr>
          <td>plan_id</td>
          <td>int4</td>
          <td>Unique ID to identify a plan</td>
        </tr>
        <tr>
          <td>plan</td>
          <td>varchar</td>
          <td>Name of the plan</td>
        </tr>
        <tr>
          <td>formulary_id</td>
          <td>varchar</td>
          <td>Unique ID to identify a formulary</td>
        </tr>
        <tr>
          <td>formulary_name</td>
          <td>varchar</td>
          <td>Name of the plan</td>
        </tr>
        <tr>
          <td>contorller</td>
          <td>varchar</td>
          <td></td>
        </tr>
        <tr>
          <td>parent</td>
          <td>varchar</td>
          <td>Parent Payer</td>
        </tr>
        <tr>
          <td>pbm</td>
          <td>varchar</td>
          <td>Pharmacy benefit manager</td>
        </tr>
        <tr>
          <td>pbm_relationship</td>
          <td>varchar</td>
          <td>Pharmacy benefit manager</td>
        </tr>
        <tr>
          <td>channel</td>
          <td>varchar</td>
          <td>Insurance Channel</td>
        </tr>
        <tr>
          <td>plan_types</td>
          <td>varchar</td>
          <td>Type of plan</td>
        </tr>
        <tr>
          <td>state</td>
          <td>varchar</td>
          <td>State</td>
        </tr>
        <tr>
          <td>lives</td>
          <td>int8</td>
          <td>Number of lives covered</td>
        </tr>
        <tr>
          <td>drug</td>
          <td>varchar</td>
          <td>Drug name</td>
        </tr>
        <tr>
          <td>lives</td>
          <td>int8</td>
          <td>Number of lives covered</td>
        </tr>
        <tr>
          <td>universal_staus</td>
          <td>varchar</td>
          <td>Status of the plan for a given drug</td>
        </tr>
        <tr>
          <td>raw_status</td>
          <td>varchar</td>
          <td>Tier Status</td>
        </tr>
        <tr>
          <td>pa</td>
          <td>varchar</td>
          <td>Prior Authorization </td>
        </tr>
        <tr>
          <td>st</td>
          <td>varchar</td>
          <td>Step Theraphy</td>
        </tr>
        <tr>
          <td>ql</td>
          <td>varchar</td>
          <td>Quantity Limit</td>
        </tr>
        <tr>
          <td>Notes</td>
          <td>varchar</td>
          <td>Description of restrictions</td>
        </tr>
      </tbody>
    </table>    
  </div>
</div>

<div id="PlanDimension" style="display: none;">
  <div class="popover-heading">
    <strong>Plan Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip plan-dimension" border="1">
      <thead>
        <tr>
          <th>Field</th>
          <th>Datatype</th>
          <th>Description</th>      
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>plan_id</td>
          <td>varchar</td>
          <td>Plan ID (Primary Key)</td>
        </tr>
        <tr>
          <td>plan_nam</td>
          <td>varchar</td>
          <td>Plan Name</td>
        </tr>
        <tr>
          <td>plan_typ_cde</td>
          <td>varchar</td>
          <td>Plan Type</td>
        </tr>
        <tr>
          <td>plan_typ_desc</td>
          <td>varchar</td>
          <td>Plan Type Description</td>
        </tr>
        <tr>
          <td>plan_sbtyp_desc</td>
          <td>varchar</td>
          <td>Plan Subtype</td>
        </tr>
        <tr>
          <td>pymt_typ_desc</td>
          <td>varchar</td>
          <td>Payment Type</td>
        </tr>
        <tr>
          <td>ntnl_insr_nam</td>
          <td>varchar</td>
          <td>National Insurer Name</td>
        </tr>
        <tr>
          <td>ntnl_insr_typ_desc</td>
          <td>varchar</td>
          <td>National Type</td>
        </tr>
        <tr>
          <td>rgnl_org_nam</td>
          <td>varchar</td>
          <td>Regional Organization Name</td>
        </tr>
        <tr>
          <td>rgnl_org_typ_desc</td>
          <td>varchar</td>
          <td>Regional Organization Type</td>
        </tr>
        <tr>
          <td>mc_org_nam</td>
          <td>varchar</td>
          <td>Managed Care Organization Name</td>
        </tr>
        <tr>
          <td>mc_org_typ_desc</td>
          <td>varchar</td>
          <td>Managed Care Organization Type</td>
        </tr>
        <tr>
          <td>bnfts_admtr_nam</td>
          <td>varchar</td>
          <td>Benefit Administrator Name (Includes PBMs and Processors)</td>
        </tr>
        <tr>
          <td>bnfts_admtr_typ_desc</td>
          <td>varchar</td>
          <td>Benefit Administrator Type</td>
        </tr>
      </tbody>
    </table>    
  </div>
</div>

<div id="RejectionReason" style="display: none;">
  <div class="popover-heading">
    <strong>Rejection Reason Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip rejection-reason-dimension" border="1">
      <thead>
        <tr>
          <th>Field</th>
          <th>Datatype</th>
          <th>Description</th>      
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>claim_rjct_rsn_cde</td>
          <td>varchar</td>
          <td>Code to identify a rejection reason</td>
        </tr>
        <tr>
          <td>claim_rjct_rsn_desc</td>
          <td>varchar</td>
          <td>Description of a rejection reason</td>
        </tr>
      </tbody>
    </table>    
  </div>
</div>

<div id="PrescriberSource" style="display: none;">
  <div class="popover-heading">
    <strong>Prescriber Source</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip prescriber-source" border="1">
      <thead>
        <tr>
          <th>Field</th>
          <th>Datatype</th>
          <th>Description</th>      
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>market_id_1</td>
          <td>int8</td>
          <td>market id</td>
        </tr>
        <tr>
          <td>market_name_1</td>
          <td>varchar</td>
          <td>market name(class)</td>
        </tr>
        <tr>
          <td>market_id_2</td>
          <td>int8</td>
          <td>market id</td>
        </tr>
        <tr>
          <td>market_name_2</td>
          <td>varchar</td>
          <td>market name</td>
        </tr>
        <tr>
          <td>product_id</td>
          <td>int8</td>
          <td>product id</td>
        </tr>
        <tr>
          <td>product_name</td>
          <td>varchar</td>
          <td>product name</td>
        </tr>
        <tr>
          <td>ndc</td>
          <td>varchar</td>
          <td>NDC code</td>
        </tr>
        <tr>
          <td>usc</td>
          <td>varchar</td>
          <td></td>
        </tr>
        <tr>
          <td>usc_description</td>
          <td>varchar</td>
          <td></td>
        </tr>
        <tr>
          <td>bb_usc</td>
          <td>varchar</td>
          <td></td>
        </tr>
        <tr>
          <td>bb_usc_description</td>
          <td>varchar</td>
          <td></td>
        </tr>
        <tr>
          <td>drug_name</td>
          <td>varchar</td>
          <td>drug name</td>
        </tr>
        <tr>
          <td>generic_name</td>
          <td>varchar</td>
          <td>generic name</td>
        </tr>
        <tr>
          <td>form_code</td>
          <td>varchar</td>
          <td>form code</td>
        </tr>
        <tr>
          <td>form_description</td>
          <td>varchar</td>
          <td>form description</td>
        </tr>
        <tr>
          <td>strength_description</td>
          <td>varchar</td>
          <td>strength description</td>
        </tr>
        <tr>
          <td>package_size</td>
          <td>varchar</td>
          <td>packet size</td>
        </tr>
        <tr>
          <td>manufacturer</td>
          <td>varchar</td>
          <td>manufacturer name</td>
        </tr>
      </tbody>
    </table>    
  </div>
</div>


<div id="PatientDimension" style="display: none;">
  <div class="popover-heading">
    <strong>Patient Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-bordered table-hover table-striped" border="1">
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>rel_id</td>
            <td>int8</td>
            <td>Physician id</td>
          </tr>
          <tr>
            <td>provider_id_number</td>
            <td>varchar</td>
            <td>Provider id</td>
          </tr><tr>
            <td>data_agent_code</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>writer_type</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>first_name</td>
            <td>varchar</td>
            <td>Physician first name</td>
          </tr><tr>
            <td>middle_name</td>
            <td>varchar</td>
            <td>Physician middle name</td>
          </tr><tr>
            <td>last_name</td>
            <td>varchar</td>
            <td>Physician last name</td>
          </tr><tr>
            <td>title</td>
            <td>varchar</td>
            <td>title</td>
          </tr><tr>
            <td>specialty_code</td>
            <td>varchar</td>
            <td>Physician specialty code</td>
          </tr><tr>
            <td>specialty_desc</td>
            <td>varchar</td>
            <td>Physician specialty desc</td>
          </tr><tr>
            <td>address</td>
            <td>varchar</td>
            <td>address</td>
          </tr><tr>
            <td>city</td>
            <td>varchar</td>
            <td>city</td>
          </tr><tr>
            <td>state</td>
            <td>varchar</td>
            <td>state</td>
          </tr><tr>
            <td>zip_code</td>
            <td>varchar</td>
            <td>zip_code</td>
          </tr><tr>
            <td>ama_no_contact</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>ama_pdrp_indicator</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>ama_pdrp_date</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>presumed_dead_ind</td>
            <td>varchar</td>
            <td>Presumed dead indicator</td>
          </tr><tr>
            <td>type_of_practice_code</td>
            <td>varchar</td>
            <td></td>
          </tr><tr>
            <td>npi</td>
            <td>varchar</td>
            <td>npi</td>
          </tr><tr>
            <td>territory_id</td>
            <td>varchar</td>
            <td>Physician territory id</td>
          </tr><tr>
            <td>call_status_code</td>
            <td>varchar</td>
            <td></td>
          </tr>
        </tbody>
      </table>    
  </div>
</div>


<div id="PrescribderAlignment" style="display: none;">
  <div class="popover-heading">
    <strong>Alignment</strong>
  </div>
  <div class="popover-body">
    <table class="table table-bordered table-hover table-striped" border="1">
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>First Name</td>
            <td>varchar</td>
            <td>First Name of physician</td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>varchar</td>
            <td>Last Name</td>
          </tr><tr>
            <td>Account</td>
            <td>varchar</td>
            <td>Account of physician</td>
          </tr><tr>
            <td>Address</td>
            <td>varchar</td>
            <td>Address of physician</td>
          </tr><tr>
            <td>City</td>
            <td>varchar</td>
            <td>City of physician</td>
          </tr><tr>
            <td>State</td>
            <td>varchar</td>
            <td>State of physician</td>
          </tr><tr>
            <td>Zip</td>
            <td>varchar</td>
            <td>Zip of physician</td>
          </tr><tr>
            <td>Specialty</td>
            <td>varchar</td>
            <td>Specialty of physician </td>
          </tr><tr>
            <td>Adoption Decile</td>
            <td>int</td>
            <td>Adoption Decile</td>
          </tr><tr>
            <td>Simple Decile</td>
            <td>int</td>
            <td>Simple Decile</td>
          </tr><tr>
            <td>Composite Decile</td>
            <td>int</td>
            <td>Composite Decile</td>
          </tr><tr>
            <td>Cluster</td>
            <td>varchar</td>
            <td>Cluster </td>
          </tr><tr>
            <td>Segment</td>
            <td>varchar</td>
            <td>Segment</td>
          </tr><tr>
            <td>IDN</td>
            <td>varchar</td>
            <td>IDN of physician</td>
          </tr><tr>
            <td>IDN Segment</td>
            <td>varchar</td>
            <td>IDN Segment</td>
          </tr><tr>
            <td>Affiliation Level</td>
            <td>varchar</td>
            <td>Affiliation Level</td>
          </tr><tr>
            <td>Account HCP Count</td>
            <td>int</td>
            <td>Account HCP Count</td>
          </tr><tr>
            <td>Target HCP Count</td>
            <td>int</td>
            <td>Target HCP Count</td>
          </tr><tr>
            <td>NP/PA Count</td>
            <td>int</td>
            <td></td>
          </tr><tr>
            <td>Trial HCP Affiliation Flag</td>
            <td>varchar</td>
            <td>Trial HCP Affiliation Flag of physician</td>
          </tr><tr>
            <td>territory_id</td>
            <td>varchar</td>
            <td>Physician territory id</td>
          </tr><tr>
            <td>call_status_code</td>
            <td>varchar</td>
            <td></td>
          </tr>
        </tbody>
      </table>
  </div>
</div>

<div id="PrescriberDetailsDimension" style="display: none;">
  <div class="popover-heading">
    <strong>Prescriber Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-bordered table-hover table-striped" border="1">
        <thead>
          <tr>
            <th>Field</th>
            <th>DataType</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ptnt_id</td>
            <td>int8</td>
            <td>patient id</td>
          </tr>
          <tr>
            <td>ptnt_brth_yr_nbr</td>
            <td>int4</td>
            <td>patient birth year</td>
          </tr><tr>
            <td>ptnt_gndr_cde</td>
            <td>int4</td>
            <td>gender</td>
          </tr><tr>
            <td>ptnt_zip3_cde</td>
            <td>int4</td>
            <td>zip</td>
          </tr><tr>
            <td>ptnt_st_cde</td>
            <td>varchar</td>
            <td>state code</td>
          </tr>
        </tbody>
      </table>
  </div>
</div>

@stop

@section('BaseJSLib')
<script>

  $(document).ready(function(){
      
        $('input[type=radio][name=optradio]').change(function(){
        $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/test', // This is the url we gave in the route
            dataType:'html',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'id' : $(this).val()}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
                console.log(response);   
                $('.selecting').html(response).contents();
           
                },
        });
      });
    });

  $(document).on('change', '.sid', function()
   {
      var widget_array =  [];
      $('.form-group input[type="checkbox"]:checked').each(function(){ 
        
        widget_array.push($(this).val());

      });
      $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/test1', // This is the url we gave in the route
        dataType:'html',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
      },
        data: {'id' : widget_array}, // a JSON object to send back
        success: function(response)
        { // What to do if we succeed
            console.log(response);   
            $('#d-tables').html(response).contents();
            $("#sidq1").remove();
       
            },
    });
   });

$(document).on('change', '#group', function()
 {
      //console.log($('input[id="#sid"]').is(':checked'));
      //console.log($('#sid').val());
      var widget_array1 =  [];
      var widget_array2 =  [];
      $('.Data input[type="checkbox" ]:checked').each(function(){ 

          

          widget_array1.push($(this).val());
      });
      $('.Bridging input[type="checkbox" ]:checked').each(function(){ 

          

          widget_array2.push($(this).val());
      });
      console.log((widget_array1).length,((widget_array2).length));
      console.log(((widget_array1).length)&&((widget_array2).length));
      if((widget_array1.length) > 0 && (widget_array2.length) > 0)
      {
          $(':input[type="submit"]').prop('disabled', false);
      }
      else
      {
          $(':input[type="submit"]').prop('disabled', true); 
      }
});

$(document).on('mouseenter','.test2',function(){ 
    var id = $(this).val().trim(); 
    if ( id === "Product Dimension" ) {
      id = "ProductDimension";
    }else if( id === "Plan Dimension" ){
      id = "PlanDimension";
    }else if ( id === "Rejection Reason" ) {
      id = "RejectionReason";
    }else if ( id === "Prescriber Source") {
      id = "PrescriberSource";
    }else if ( id === "Patient Dimension" ) {
      id = "PatientDimension";
    }else if ( id === "Prescribder Alignment") {
      id = "PrescribderAlignment";
    }else if ( id === "PrescriberDetailsDimension" ) {
      id = "PrescriberDetailsDimension";
    }

    $('#setUpNewProject').find('.modal-body').html(document.querySelector('#'+id).cloneNode(true));
    $('#setUpNewProject').find('#'+id).css('display', 'table');
    
    //$('#setUpNewProject').find('modal-body').removeAttr('hidden');
    $('#setUpNewProject').modal('show');
});

</script>
@stop

