@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Setup New Project</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            $('select').html(response).contents();
       
            },
    });
  });
});
$(document).ready(function(){
    $('body').on('change','#sel2',function(){
   
   $.ajax({
        method: 'POST', // Type of response and matches what we said in the route
        url: '{{url()}}/test1', // This is the url we gave in the route
        dataType:'html',
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}",
      },
        data: {'id' : $("#sel2").val()}, // a JSON object to send back
        success: function(response)
        { 
            console.log(response);   
            $('#d-tables').html(response).contents();
       
        },
    });
     });
      
});
</script>
@show
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Setup New Project</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;padding: 20px;">
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
                              <select multiple class="form-control" id="sel2" style="height: 80px;">
                                
                              </select>
                          </div>
                      </div>
                      <br>
                      <hr>
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12d">
                              <h4><span class="label label-primary">Data Tables</span></h4>
                              <br>
                              <form id="d-tables"></form>
                                
                      <br>
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <button class="btn btn-success btn-md pull-right">Proceed to Ingestion</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


<div class="hidden" id="product-dimension">
  <div class="popover-heading">
    <strong>Product Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip product-dimension">
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

<div class="hidden" id="claims">
  <div class="popover-heading">
    <strong>Claims</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip product-dimension">
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
          <td>scnry_plan_id</td>
          <td rowspan="3">float8</td>
          <tr>
            <td>Plan ID of secondary insurer, when applicable</td>
            <td>
              *When performing secondary payer related analyses, use only records where PTD_FINAL_CLAIM = 1.
            </td>
            <td>
              **Records where PTD_FINAL_CLAIM = 9 are direct feed claims.  Direct feed claims contain no secondary payer information.
            </td>
          </tr>
        </tr>

        <tr>
          <td>scnry_plan_pay_amt</td>
          <td>float8</td>
          <td>Secondary Plan Pay</td>
        </tr>

        <tr>
          <td>ptnt_oop_pay_amt</td>
          <td rowspan="2">float8</td>
          <tr>
            <td>
              Patient Out of Pocket Cost
            </td>
            <td>
              *This field reflects any buy down that may have occurred, and shows how much the patient paid out of pocket
            </td>
          </tr>
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
          <td>claim_stus_cde</td>
          <td rowspan="4">varchar</td>
          <tr>
            <td>
              0 = Rejection
            </td>
            <td>
              1 = Approval
            </td>
            <td>
              2 = Reversal
            </td>
            <td>
              *When performing rejection and/or reversal rate calculations, use only records where PTD_FINAL_CLAIM = 1.
            </td>
            <td>
              **Records where PTD_FINAL_CLAIM = 9 are direct feed claims.  Direct feed claims consist of approvals only.  As such, including them in rejection and/or reversal rate calculations increases the denominator but not the numerator, thus skewing the rates.
            </td>
          </tr>
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
          <td>final_claim_cde</td>
          <td rowspan="2">varchar</td>
          <tr>
            <td>
              1 = PTD Final Status Claim, 0 = Non Final Claim, 9 = Direct Feed Claim
            </td>
            <td>
              *Direct feed claims consist of approvals only. Include in patient longitudinal studies only, i.e. persistency, adherence, etc…
            </td>
          </tr>
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
          <td>daw_cde</td>
          <td rowspan="11">varchar</td>
          <tr>
            <td>
              DAW Code: This field indicates the prescriber's instruction regarding substitution of generic equivalents or order to dispense the specific product written.
            </td>
            <td>
              DAW_CDE Description
            </td>
            <td>
              0 NO PRODUCT SELECTION INDICATED
            </td>
            <td>
              1 SUBSTITUTION NOT ALLOWED BY PRESCRIBER
            </td>
            <td>
              2 SUBSTITUTION ALLOWED-PATIENT REQUESTED PRODUCT DISPENSED
            </td>
            <td>
              3 SUBSTITUTION ALLOWED-PHARMACIST SELECTED PRODUCT DISPENSED
            </td>
            <td>
              4 SUBSTITUTION ALLOWED-GENERIC DRUG NOT IN STOCK
            </td>
            <td>
              5 SUBSTITUTION ALLOWED-BRAND DRUG DISPENSED AS GENERIC
            </td>
            <td>
              6 OVERRIDE
            </td>
            <td>
              7 SUBSTITUTION NOT ALLOWED-BRAND DRUG MANDATED BY LAW
            </td>
            <td>
              8 SUBSTITUTION ALLOWED-GENERIC DRUG NOT AVAILABLE IN MARKET
            </td>
            <td>
              9 OTHER
            </td>
          </tr>
        </tr>

        <tr>
          <td>athrz_refil_cnt</td>
          <td>varchar</td>
          <td> Number of refills authorized for the original written script</td>
        </tr>

        <tr>
          <td>
            deletion_flag
          </td>
          <td rowspan="2">
            varchar
          </td>
          <tr>
            <td>
              1 = Deletion flag else NULL
            </td>
            <td>
              Note: Populated only for Incremental refresh
            </td>
          </tr>
        </tr>

      </tbody>
    </table>    
  </div>
</div>

<div class="hidden" id="mmit">
  <div class="popover-heading">
    <strong>MMIT</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip product-dimension">
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

<div class="hidden" id="plan-dimension">
  <div class="popover-heading">
    <strong>Plan Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip product-dimension">
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

<div class="hidden" id="rejection-reason-dimension">
  <div class="popover-heading">
    <strong>Rejection Reason Dimension</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip product-dimension">
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

<div class="hidden" id="prescriber-source">
  <div class="popover-heading">
    <strong>Prescriber Source</strong>
  </div>
  <div class="popover-body">
    <table class="table table-responsive table-strip product-dimension">
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

@stop