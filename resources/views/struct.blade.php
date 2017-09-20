@extends('Template.HtmlSkeleton')
@section('Title')
<title>DCube | Injestion</title>
@stop
@section('BaseCSSLib')
<link rel="stylesheet" href="{{url()}}/assets/vendor/css/breadcrumb.css">
<style type="text/css">
  .modal_table>tbody>tr>td {
      padding: 5px !important;
  }
</style>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="breadcrumb flat">
             
             @if(isset($proj_id))
              <a href="{{url()}}/ingestion/{{ $proj_id }}" class="active">Ingest Data</a>
              <a href="{{url()}}/setup_new_proj/{{ $proj_id }}" class="active">Setup New Project</a>
             @else
              <a href="{{url()}}/ingestion" class="active">Ingest Data</a>
              <a href="{{url()}}/setup_new_proj" class="active">Setup New Project</a>
             @endif
             <!-- <a href="javascript:history.back()" class="active">Validate Data</a> -->
             <a href="#" class="active">Map Data</a>
             <a href="#">Mapping KPI</a>
         </div>
          <div class="row widget-1" style="padding-top: 30px">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">
                DCube Structure Mapping
              </h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="hidden" name="checkedVal" id="checkedVal" value="{{ $val }}">
                            @if(isset($proj_id))
                              <input type="hidden" name="project_id" id="project_id" value="{{ $proj_id }}">
                            @endif
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead>
                                <tr><center>
                                  <th></th>
                                  <th>Source Table</th>
                                  <th>DCube Table</th>
                                  <th>Mapping</th>
                                  </center>
                                </tr>
                              </thead>
                              <tbody>
                              @if(isset($checkedData))
                                @foreach($checkedData as $value)
                                  <input type="hidden" name="exeMapData" id="exeMapData" value="{{ $value->map_data }}">
                                @endforeach
                              @else
                                  <input type="hidden" name="exeMapData" id="exeMapData" value="Empty">
                              @endif
                                <tr class="each_row" style="display: none;" id='Symphony_Claims'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox" value="Symphony_Claims"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony_Claims</td>
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Claims</option>
                                        <option>DCube_Claim_RejRsn_Dim</option>
                                        <option>DCube_Claim_Dim</option>
                                      </select>
                                  </td>
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#claim">Edit Mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none;" id='IMS_Claims'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox" value="IMS_Claims"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS_Claims</td>
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Claims</option>
                                        <option>DCube_Claim_RejRsn_Dim</option>
                                        <option>DCube_Claim_Dim</option>
                                      </select>
                                  </td>
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#claim">edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id='Prescriber_Source'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony_PrescSrc</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_PrescSrc</option>
                                        <option>DCube_Presc_Dim</option>
                                        <option>DCube_Presc</option>
                                     
                                        
                                      </select>
                                  </td>
                                  

                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#presrc">edit mapping</button>
                                  </td>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id='MMIT_Payor_Plan_Data'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">MMIT</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_MMIT</option>
                                        <option>DCube_MMIT_Claims</option>
                                        <option>DCube_MMIT_Dim</option>
                                     
                                        
                                      </select>
                                  </td>
                                  

                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#mmits" >edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id= 'MMIT_Payor_Plan_to_Claims'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">MMIT to CLAIMS</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_MMIT_Claims</option>
                                        <option>DCube_MMIT</option>
                                        <option>DCube_MMIT_Claims</option>
                                     
                                        
                                      </select>
                                  </td>
                                  

                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#mmits" >edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id= 'Symphony_Product_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony Product Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Product_Dim</option>
                                        <option>DCube_Prod </option>
                                        <option>DCube_Prod_Branded</option>
                                     
                                        
                                      </select>
                                  </td>
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prodim" >edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id= 'IMS_Product_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS Product Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Product_Dim</option>
                                        <option>DCube_Prod </option>
                                        <option>DCube_Prod_Branded</option>
                                     
                                        
                                      </select>
                                  </td>
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prodim" >edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id= 'Symphony_Plan_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony Plan Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Plan_Dim</option>
                                        <option>DCube_Plan_Hier</option>
                                        <option>DCube_Plan_Status</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#plndim" >edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id= 'IMS_Plan_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS Plan Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Plan_Dim</option>
                                        <option>DCube_Plan_Hier</option>
                                        <option>DCube_Plan_Status</option>
                                     
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#plndim" >edit mapping</button>
                                  </td>
                                </tr>
                                <tr class="each_row" style="display: none" id= 'Symphony_Rejection_Reason'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony Rejection Reason Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Claim_RejRsn_Dim</option>
                                        <option>DCube_Claim_Dim</option>
                                        <option>DCube_Claims</option>
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#rrdim">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id= 'IMS_Rejection_Reason'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS Rejection Reason Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Claim_RejRsn_Dim</option>
                                        <option>DCube_Claim_Dim</option>
                                        <option>DCube_Claims</option>
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#rrdim">edit mapping</button>
                                  </td>
                                  
                                </tr>

                                <tr class="each_row" style="display: none" id='Symphony_Prescriber_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony Prescriber Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                         <option>DCube_Presc_Dim</option>
                                        <option>DCube_PrescSrc</option>
                                        <option>DCube_Presc</option>
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prsdim">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='IMS_Prescriber_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS Prescriber Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                         <option>DCube_Presc_Dim</option>
                                        <option>DCube_PrescSrc</option>
                                        <option>DCube_Presc</option>
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prsdim">edit mapping</button>
                                  </td>
                                  
                                </tr>

                                <tr class="each_row" style="display: none" id='Symphony_Prescriber Alignment'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Prescriber Allignment</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Presc_Allign</option>
                                        <option>DCube_Presc_Dim</option>
                                        <option>DCube_PrescSrc</option>
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#allign">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='IMS_Prescriber Alignment'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Prescriber Allignment</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Presc_Allign</option>
                                        <option>DCube_Presc_Dim</option>
                                        <option>DCube_PrescSrc</option>
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#allign">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='IMS_Patient_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS Patient Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Patient_Dim</option>
                                        <option>DCube_Patient</option>
                                        
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#ptndim">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='Symphony_Patient_Dimension'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony Patient Dimension</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Patient_Dim</option>
                                        <option>DCube_Patient</option>
                                        
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#ptndim">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='Symphony_Physican_Rx_Data'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony Physican Rx Data</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Phys_Rx_Data</option>
                                        <option>DCube_Phys_Dim</option>
                                        
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prrxdt">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='IMS_Physican_Rx_Data'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS Physican Rx Data</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Phys_Rx_Data</option>
                                        <option>DCube_Phys_Dim</option>
                                        
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#prrxdt">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='CLIENT_Territory_Alignment'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Territory Alignment</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Terr_Align</option>
                                        <option>DCube_Terr_Zip</option>
                                        <option>DCube_Terr_City</option>
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#allign">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='Symphony_Aggregated_Rx_Data'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">Symphony Aggregated Rx Data</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Aggre_Rx_Data</option>
                                        <option>DCube_Aggre_Rx_Data_Dim</option>
                                        
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#agrxdt">edit mapping</button>
                                  </td>
                                  
                                </tr>
                                <tr class="each_row" style="display: none" id='IMS_Aggregated_Rx_Data'>
                                  <td>
                                      <div class="checkbox">
                                        <label><input type="checkbox" class="ingest_chkbox"></label>
                                      </div>
                                  </td>
                                  <td class="val">IMS Aggregated Rx Data</td>
                                  
                                  <td>
                                      <select class="form-control source_name">
                                        <option>DCube_Aggre_Rx_Data</option>
                                        <option>DCube_Aggre_Rx_Data_Dim</option>
                                        
                                        
                                      </select>
                                  </td>
                                  
                                  
                                  <td>
                                      <button class="btn btn-info " data-toggle="modal" data-target="#agrxdt">edit mapping</button>
                                  </td>
                                  
                                </tr>

                                
                              </tbody>
                            </table>
                            <form action="{{url()}}/kpi_map_new">
                              <input type="hidden" name="forword_project_id" id="forword_project_id" value="{{ $proj_id }}">
                              <button type="submit" class= 'btn btn-primary pull-right mapping_selected_btn' disabled>KPI Mapping</button>
                            </form>

                            <button class= 'btn btn-info pull-left' id="map_data" data-toggle="modal" data-target="#mpsldt" style="margin-left: 30px" >Map Selected Data</button>
                          </div>
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <div id="mpsldt" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mapping Started</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px">
          <div id= 'text_add'></div>
          <div>
            <input type="hidden" name="mapData" id="mapData">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="saveMapData" data-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
            
              <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>drug_id</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>
                       <option>Exclude</option>                       
                       <option selected>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>ndc_11_cde</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>
                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option selected>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                       
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>drug_nam</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option selected>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                       
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>brnd_gnrc_cde</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option selectedv>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                       
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>usc_cde</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option selected>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                       
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>usc_nam</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option selected>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>gnrc_drug_nam</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       
                       
                       <option>Import as is</option>
                       
                       
                       <option selected>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>strgh_desc</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option selected>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>dsg_form_desc</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option selected>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>pkg_sz_qty</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option selected>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>pkg_desc</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option selected>pckg_desc</option>
                       <option>manufacturer</option>
                       <option>pckg_launch_date</option>
                       
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>drug_mfg_nam</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option selected>manufacturer</option>
                       <option>pckg_launch_date</option>
                     </select>

                    </td>
                  </tr>
                  <tr>
                    <td>pkg_lanch_dte</td>
                    <td>
                      <select class="form-control source_name"><span>DCube Column</span>

                       <option>Exclude</option>                       
                       <option>drug_id</option>
                       <option>ndc_11_code</option>
                       <option>drug_name</option>
                       <option>brand_generic_flag</option>
                       <option>Import as is</option>
                       <option>generic_name</option>
                       <option>strength_description</option>
                       <option>dosage_form_desc</option>
                       <option>package_size</option>
                       <option>pckg_desc</option>
                       <option>manufacturer</option>
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
  <div id="mmits" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
              <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>period</td>
                    <td>
                      <select class="form-control source_name">
                           
                           <option>Exclude</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>                           
                           
                          </select>
                    </td>
                  </tr>
                  <tr>
                    
                    <td>client_id</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan_id</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>formulary_id</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>formulary_name</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>contorller</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>parent</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>pbm</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>pbm_relationship</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>channel</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan_typess</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option selected>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>state</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option selected>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>

                  <tr>
                    <td>lives</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option selected>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>drug</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option selected>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>universal_staus</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option selected>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>raw_status</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option selected>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>pa</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option selected>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>st</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option selected>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>ql</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option selected>quantity_limit</option>
                           <option>Notes</option>
                           <option>Import as is</option>
                           
                       
                          </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Notes</td>
                    <td>
                      <select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>time_period</option>
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
                           <option>plan_types</option>
                           <option>state</option>
                           <option>lives</option>
                           <option>drug</option>
                           <option>universal_staus</option>
                           <option>raw_status</option>
                           <option>prior_ authorization </option>
                           <option>step_theraphy</option>
                           <option>quantity_limit</option>
                           <option selected>Notes</option>
                           <option>Import as is</option>
                           
                       
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
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
             <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>plan_id</td>
                    <td><select class="form-control source_name">
                         
                                               <option>Exclude</option><option selected>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option selected>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option selected>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option selected>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
                         <option>plan_subtype_desc</option>
                         
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
                         <option>plan_subtype_desc</option>
                         <option>paymt_type_desc</option>
                         <option>natnl_insr_name</option>
                         <option selected>Map To Self</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
                         
                                               <option>Exclude</option><option>plan_id</option>
                         <option>plan_name</option>
                         <option>plan_types_code</option>
                         <option>plan_types_desc</option>
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
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
             <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>Dcube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>claim_rjct_rsn_cde</td>
                    <td>
                    <select class="form-control source_name">
                       
                                             <option>Exclude</option><option selected>claim_rejection_reason_code</option>
                       <option>claim_rejection_reason_desc</option>
                       
                     </select>
                     </td>
                  </tr>
                  <tr>
                    <td>claim_rjct_rsn_desc</td>
                    <td>
                    <select class="form-control source_name">
                       
                                             <option>Exclude</option><option>claim_rejection_reason_code</option>
                       <option selected>claim_rejection_reason_desc</option>
                       
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
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
            <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>market_id_1</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option selected></option>
                           <option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>  
                 
               
                  </tr>
                  <tr>
                    <td>market_name_1</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option selected></option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>market_id_2</td>
                    <td><select class="form-control source_name">
                           
                          <option>Exclude</option><option>Import as is</option>
                          <option selected>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>market_name_2</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option selected>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>product_id</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option selected>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>product_name</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option selected>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>ndc</td>
                    <td><select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option selected>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>usc</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option selected>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>usc_description</td>
                    <td><select class="form-control source_name">
                           
                    <option>Exclude</option><option selected>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>bb_usc</td>
                    <td><select class="form-control source_name">
                           
                          <option>Exclude</option><option selected>Import as is</option>
                          <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>bb_usc_description</td>
                    <td> <select class="form-control source_name">
                           
                           <option>Exclude</option><option selected>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select> 
                    </td>
                  </tr>
                  <tr>
                    <td>drug_name</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option selected>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>generic_name</td>
                    <td><select class="form-control source_name">
                           
                                                 <option>Exclude</option><option>Import as is</option><option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option selected>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>

                  <tr>
                    <td>form_code</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option selected>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  
                  <tr>
                    <td>form_description</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option selected>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>strength_descriptionription</td>
                    <td><select class="form-control source_name">
                           
                          <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option selected>strength_description</option>
                           <option>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>package_size</td>
                    <td><select class="form-control source_name">
                           
                          <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option selected>package_size</option>
                           <option>manufacturer</option>
                          </select></td>
                  </tr>
                  <tr>
                    <td>manufacturer</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>market_id</option>
                           <option>market_name</option>
                           <option>product_id</option>
                           <option>product_name</option>
                           <option>ndc_11_code</option>
                           <option>drug_name</option>
                           <option>generic_name</option>
                           <option>form_code</option>
                           <option>form_desc</option>
                           <option>strength_description</option>
                           <option>package_size</option>
                           <option selected>manufacturer</option>
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
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">

            <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>First Name</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option selected>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  
               
                      </td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option selected>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>Import as is</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Account</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option selected>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><select class="form-control source_name">
                           
                          <option>Exclude</option><option>Import as is</option>
                          <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option selected>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option selected>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>State</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option selected>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Zip</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option selected>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Specialty</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option selected>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>adpt_decile</td>
                    <td><select class="form-control source_name">
                           
                          <option>Exclude</option><option>Import as is</option>
                          <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>simple_decile</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                          <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>comp_decide</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>cluster</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                            <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Segment</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>Import as is</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>

                  <tr>
                    <td>IDN</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option selected>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>Import as is</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  
                  <tr>
                    <td>IDN Segment</td>
                    <td><select class="form-control source_name">
                           
                        <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                            <option>idn</option>
                           <option selected>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Affiliation Level</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option selected>affiliation_level</option>
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Account HCP Count</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           
                           <option>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Target HCP Count</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           
                           <option selected>target_hcp_count</option>
                           <option>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>NP/PA Count</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           
                           <option>target_hcp_count</option>
                           <option selected>np_pa_count</option>
                           <option>trial_hcp_affl_flag</option>
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>Trial HCP Affiliation Flag</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option>first_name</option>
                           <option>last_name</option>
                           <option>Account</option>
                           <option>Address</option>
                           <option>City</option>
                           <option>State</option>
                           <option>Zip</option>
                           <option>Specialty</option>
                           <option>idn</option>
                           <option>idn_segment</option>
                           <option>affiliation_level</option>
                           <option>Import as is</option>
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
  <div id="ptndim" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">

            <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ptnt_id</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option selected>patient_id</option>
                           <option>patient_birth_year</option>
                           <option>patient_gender_code</option>
                           <option>patient_zip_code</option>
                           
                           
                          </select>  
               
                      </td>
                  </tr>
                  <tr>
                    <td>ptnt_brth_yr_nbr</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option >patient_id</option>
                           <option selected>patient_birth_year</option>
                           <option>patient_gender_code</option>
                           <option>patient_zip_code</option>
                           
                           
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>ptnt_gndr_cde</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option >patient_id</option>
                           <option>patient_birth_year</option>
                           <option selected>patient_gender_code</option>
                           <option>patient_zip_code</option>
                           
                           
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>ptnt_zip3_cde</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option >patient_id</option>
                           <option>patient_birth_year</option>
                           <option>patient_gender_code</option>
                           <option selected>patient_zip_code</option>
                           
                           
                          </select>  </td>
                  </tr>
                  <tr>
                    <td>ptnt_st_cde</td>
                    <td><select class="form-control source_name">
                           
                           <option>Exclude</option><option>Import as is</option>
                           <option >patient_id</option>
                           <option>patient_birth_year</option>
                           <option>patient_gender_code</option>
                           <option>patient_zip_code</option>
                           
                           
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
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
            <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>rel_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option selected>relation_id</option>
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
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>

                    </td>
                  </tr>
                  <tr>
                    <td>provider_id_number</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>data_agent_code</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                      </td>
                  </tr>
                  <tr>
                    <td>writer_type</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>first_name</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>middle_name</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>last_name</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>title</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>specialty_code</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>specialty_desc</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>address</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>city</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>state</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>

                  <tr>
                    <td>zip_code</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  
                  <tr>
                    <td>ama_no_contact</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>

                  </tr>
                  <tr>
                    <td>ama_pdrp_indicator</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>ama_pdrp_date</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>presumed_dead_ind</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>type_of_practice_code</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>npi</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option selected>npi</option>
                          <option>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>territory_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
                          
                          <option>npi</option>
                          <option selected>territory_id</option>
                          <option>call_status_code</option>
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>call_status_code</td>
                    
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>relation_id</option>
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
  <div id="claim" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
            <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>claim_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option selected>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>ptnt_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option selected>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>

                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>drug_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option selected>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>mdcl_prctr_id</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option selected>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>prmry_plan_id</td>
                    <td><select class="form-control source_name">
                          
                                                 <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option selected>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>ptnt_pay_amt</td>
                    <td><select class="form-control source_name">
                          
                         <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option selected>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>prmry_plan_pay_amt</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option selected>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>scnry_plan_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option selected>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>scnry_plan_pay_amt</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option selected>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>ptnt_oop_pay_amt</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option selected>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>refil_cde</td>
                    <td><select class="form-control source_name">
                          
                    <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option selected>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>dspnd_qty</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option selected>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>days_sply_cnt</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option selected>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>

                  <tr>
                    <td>rx_fill_dte</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option selected>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  
                  <tr>
                    <td>ptnt_claim_seq_nbr</td>
                    <td><select class="form-control source_name">
                          
                    <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option selected>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>claim_stus_cde</td>
                    <td><select class="form-control source_name">
                          
                      <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option selected>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>claim_rjct_rsn_cde</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option selected>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>rvrsl_lag</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          <option selected>Import as is</option>
                          <option>Import as is</option>
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>encyd_rx_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          <option selected>Import as is</option>
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>days_until_next_fill_cnt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option selected>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>copay_30_amt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option selected>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>sob_cde</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option selected>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>new_to_prdct_ind</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option selected>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>cncmt_ind</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          <option selected>Import as is</option>
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>final_claim_cde</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option selected>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>prmry_plan_grp_nbr</td>
                    <td><select class="form-control source_name">
                          
                         <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option selected>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>scnry_plan_grp_nbr</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option selected>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>daw_cde</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option selected>daw_code</option>
                          <option>Import as is</option>
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>athrz_refil_cnt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
                          <option>deletion_flag</option>
          
                        </select></td>
                  </tr>
                  <tr>
                    <td>deletion_flag</td>
                    <td><select class="form-control source_name">
                          
                        <option>Exclude</option><option>Import as is</option>
                          <option>claim_id</option>
                          <option>patient_id</option>
                          <option>drug_id</option>
                          <option>medical_practitioner_id</option>
                          <option>primary_plan_id</option>
                          <option>patient_pay_amount</option>
                          <option>primary_plan_pay_amount</option>
                          <option>secondary_plan_id</option>
                          <option>secondary_plan_pay_amount</option>
                          <option>patient_oop_pay_amount</option>
                          <option>refill_code</option>
                          <option>dispensed_quantity</option>
                          <option>days_supply</option>
                          <option>rx_fill_date</option>
                          <option>patient_claim_sequence_number</option>
                          <option>claim_status_code</option>
                          <option>claim_rjct_rsn_code</option>
                          
                          
                          <option>days_until_next_fill_count</option>
                          <option>copay_30_amount</option>
                          <option>sob_cde</option>
                          <option>new_to_prdct_ind</option>
                          
                          <option>final_claim_code</option>
                          <option>primary_plan_group_number</option>
                          <option>secondary_plan_group_number</option>
                          <option>daw_code</option>
                          
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
  <div id="agrxdt" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
            <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>market_id_1</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option selected>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>

                    </td>
                  </tr>
                  <tr>
                    <td>product_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option selected>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option selected>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                      </td>
                  </tr>
                  <tr>
                    <td>data_type</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>wk_ending_dt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option selected>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>mnth_ending_dt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option selected>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>sob_group</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option selected>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>new_rx_cnt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option selected>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>refill_rx_cnt</td>
                    <td><select class="form-control source_name">

                       <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option selected>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>tot_rx_cnt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option selected>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>new_rx_qty</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option selected>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>refill_rx_qty</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option selected>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>tot_rx_qty</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option selected>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>

                  <tr>
                    <td>new_days_supply</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option selected>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  
                  <tr>
                    <td>refill_days_supply</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option selected>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>

                  </tr>
                  <tr>
                    <td>tot_days_supply</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option selected>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>daw_cde</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
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
  <div id="prrxdt" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" style="padding: 10px 50px">
          <div class = "row">
            <table class ='table stripped modal_table'>
                <thead>
                  <tr>
                    <th>Source Column</th>
                    <th>DCube Column</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>market_id_1</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option selected>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>

                    </td>
                  </tr>
                  <tr>
                    <td>product_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option selected>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>plan_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option selected>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                      </td>
                  </tr>
                  <tr>
                    <td>data_type</td>
                    <td><select class="form-control source_name">
                          
                      <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td>rel_id</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option selected>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>writer_type</td>
                    <td><select class="form-control source_name">
                          
                                                 <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option selected>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>payment_type_indicator</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>wk_ending_dt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option selected>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>mnth_ending_dt</td>
                    <td><select class="form-control source_name">
                          
                    <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option selected>month_ending_date</option>
                          <option>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>sob_group</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option selected>sob_group</option>
                          <option>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>new_rx_cnt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option selected>new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>refill_rx_cnt</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option selected>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                         
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>tot_rx_cnt</td>
                    <td><select class="form-control source_name">
                          
                         <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option selected>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>

                  <tr>
                    <td>new_rx_qty</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option selected>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  
                  <tr>
                    <td>refill_rx_qty</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option selected>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>

                  </tr>
                  <tr>
                    <td>tot_rx_qty</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option selected>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>new_days_supply</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option selected>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>refill_days_supply</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option selected>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>tot_days_supply</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option selected>total_days_supply</option>
                          
                          
                        </select>
                        </td>
                  </tr>
                  <tr>
                    <td>daw_cde</td>
                    <td><select class="form-control source_name">
                          
                          <option>Exclude</option><option>Import as is</option>
                          <option>market_id</option>
                          <option>product_id</option>
                          <option>plan_id</option>
                          
                          <option>relation_id</option>
                          <option>writer_type</option>
                          
                          <option>week_ending_date</option>
                          <option>month_ending_date</option>
                          <option>sob_group</option>
                          <option >new_rx_count</option>
                          <option>refill_rx_count</option>
                          <option>total_rx_count</option>
                          <option>new_rx_quantity</option>
                          <option>refill_rx_quantity</option>
                          <option>total_rx_quantity</option>
                          <option>new_days_supply</option>
                          <option>refill_days_supply</option>
                          <option>total_days_supply</option>
                          
                          
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
</div>

@stop
@section('BaseJSLib')
<script type="text/javascript">
    $(document).ready(function(){
      var str = $('#checkedVal').val();

      $('a.DCube_struct').addClass('active');
      
      var val = str.split(",");

      for(var i=0; i< val.length; i++) {
          val[i]= val[i].replace(/ /g , "_");
          // console.log(val[i]);
      }

      for(var i=0; i< val.length; i++) {
        
        id = val[i];
        
        $('tbody').find('#'+id).show();

        var exeMapData = $('#exeMapData').val();

        $('#'+id).each(function(){
          if (exeMapData != 'Empty') {
            exeMapData = exeMapData.split(",")

            var filteredStable = exeMapData.filter(function(element, index, array) {
              return (index % 2 === 0);
            });

            console.log('Array of checked values: '+filteredStable);

            var filteredDtable = exeMapData.filter(function(element, index, array) {
              return (index % 2 !== 0);
            });

          }

          var value = $(this).find('.val').text();
            for(var j = 0 ; j < filteredStable.length ;j++){
              if(filteredStable[j]==value){
                $(this).closest('.each_row').find('.ingest_chkbox').prop('checked', true);
              }
                // $(this).closest('.each_row').find('.source_name').val(filteredDtable[j]);
            }
            for (var dCubeEle = 0; dCubeEle < filteredDtable.length; dCubeEle++) {
              if (filteredDtable[dCubeEle] == $(this).closest('.each_row').find('.source_name').val()) {
                // $(this).closest('.each_row').find('.source_name').val(filteredDtable[j]);
                // alert(filteredDtable[dCubeEle]);
                exeVal = '<option selected>'+filteredDtable[dCubeEle]+'</option>';
                // $(this).closest('.each_row').find('.source_name').html(exeVal);
              }
            }

        });
        
      }      
      

    });

    /*$('.ingest_chkbox').change(function(){

      if($(' input[type="checkbox" ]:checked').length > 0){

          $('.mapping_selected_btn').attr('disabled', false);
          
       }else{

          $('.mapping_selected_btn').attr('disabled', false);
       }
    });*/

    $('#map_data').click(function(){
        var sourceTable = dCubeTable = [];
        var html ='<ul class="list-group"><span class="label label-info">Selected</span>';
        $('.each_row').find('input[type="checkbox"]:checked').each(function(){
            // console.log($(this).closest('.each_row').find('.val').text());

            sourceTable.push($(this).closest('.each_row').find('.val').text());
            dCubeTable.push($(this).closest('.each_row').find('.source_name').val());
            
            html += "<li class='list-group-item' style='margin: 10px 0'>"+$(this).closest('.each_row').find('.val').text()+
            "    ->    "+$(this).closest('.each_row').find('.source_name').val()+"</li>";

        })
        html += '</ul>';
        
        // console.log(dCubeTable);
        $('#mapData').val(dCubeTable);

        $('#text_add').html(html);
    });

    $('#saveMapData').click(function(){

      var mapData = $('#mapData').val();
      var projectId = $('#project_id').val();
      $('.mapping_selected_btn').attr('disabled', false);

      $.ajax({
            url: '{{url()}}/saveMapData',
            type: "POST",
            dataType: 'json',
            headers: {
                
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data: {'mapData': mapData, 'projectId': projectId},

            success:function(resp){

                if (resp.status == "success") {
                  $('#forword_project_id').val(resp.data.projectId);
                }
            }
        });

    });
</script>
@stop
