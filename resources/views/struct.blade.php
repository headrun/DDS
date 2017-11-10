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
<div class="container-fluid bg">
  <div class="visualization">
      <div class="" style="padding: 10px">
          <div class="panel panel-default" style=" background-color: #FCFCFC; margin-left: -15px; margin-right: -15px;">
            <div class="panel-body  ">
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:65%;">
                  
                </div>
              </div>
              <div class="row" style="text-align: center">
                <div class="col-md-3">
                  @if(isset($proj_id))
                    <a href="{{ url()}}/setup_new_proj/{{$proj_id}}" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/set_up_new_project.png"><br>Setup New Project</a>
                  @else
                    <a href="{{ url()}}/setup_new_proj/{{$proj_id}}" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/set_up_new_project.png"><br>Setup New Project</a>
                  @endif
                  
                </div>
                <div class="col-md-3">
                  <a href="{{url()}}/ingestion/{{ $proj_id }}" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/ingest_data.png"><br>Ingest Data</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/mapdata.png"><br>Map Data</a>
                </div>
                <div class="col-md-3">
                  <a href="#" class="active"><img class="progress1 img-circle" src="{{url()}}/assets/vendor/img/kpi.png"><br>Mapping KPI</a>
                </div>
              </div>
            </div>
         </div>
          <div class="row widget-11" style="padding-top: 30px">
          <div class="panel panel-default">
            <div class="widget-title-box">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/map_data.png" style="width:15px;height:45px; margin-left: 40px;"></div>
              <h3 class="widget-title">D-Cube Structure Mapping</h3>
            </div>
            <div class="row" style="margin-top: 30px;">  
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;padding: 20px;">
                        <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                          <input type="hidden" name="checkedVal" id="checkedVal" value="{{json_encode($d_struct_id)}}">

                          @if(isset($proj_id))
                              <input type="hidden" name="project_id" id="project_id" value="{{ $proj_id }}">
                            @endif
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead>
                                <tr><center>
                                  <th></th>
                                  <th>Source Table</th>
                                  <th>DCube Table</th>
                                  <th style="text-align: center;">Mapping</th>
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

                              @foreach($map_data as $val)
                                <tr class="each_row" id='{{$val->source_id}}'>
                                  <td>
                                      <div class="checkbox pull-right">
                                        <label><input type="checkbox" class="ingest_chkbox" value="{{$val->source_id}}"></label>
                                      </div>
                                  </td>
                                  <td class="val">{{$val->source_table}}</td>
                                  <td>
                                    <?php
                                      $source_name = implode(",",json_decode($val->dcube_tables));
                                    ?>
                                    <input type="hidden" name="source_name_string" id="source_name_string" value="<?php echo $source_name ?>">
                                    <div id="sourceName"></div>
                                  </td>
                                  <td style="text-align: center;">
                                      <span class="glyphicon glyphicon-pencil" data-target="#claim" data-toggle="modal" title="Edit Mapping"></span>
                                      <!-- <button class="btn btn-info "  ></button> -->
                                  </td>
                                </tr>
                              @endforeach

                              </tbody>
                            </table>
                            <form action="{{url()}}/kpi_map_new">
                              <div class="row">
                              <input type="hidden" name="forword_project_id" id="forword_project_id" value="{{ $proj_id }}">
                              <button type="submit" class= 'btn btn-default mapping_selected_btn center-block' disabled>KPI Mapping</button>
                            </div>
                            </form>

                            <div class="row">
                              <button class= 'btn btn-success center-block' id="map_data" data-toggle="modal" data-target="#mpsldt" style="margin-bottom: 30px; margin-top: 30px; width: 230px" >Map Selected Data</button>
                            </div>
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
          <!-- <div>
            <input type="text" name="mapData" id="mapData" class="form-control">
          </div> -->
        </div>
        <div class="modal-footer">
          <button style="width: 100px" type="button" class="btn btn-success center-block" id="saveMapData" data-dismiss="modal">Ok</button>
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

      $('#mainTable').find('input[type="checkbox"]:checked').each(function(){
        console.log('Each one is: '+$(this).val());
      });

      if ($('#exeMapData').val() != undefined) {
        var exeMapData = $('#exeMapData').val();
      } else {
        var exeMapData = $('#source_name_string').val();
      }

      if (exeMapData != 'Empty') {
          exeMapData = exeMapData.split(",");

          var filteredStable = exeMapData.filter(function(element, index, array) {
            return (index % 2 === 0);
          });

          var filteredDtable = exeMapData.filter(function(element, index, array) {
            return (index % 2 !== 0);
          });
      }

      $('.each_row').each(function(){
        var source_name = $(this).find('#source_name_string').val();
        source_name = source_name.split(",");

        var srcName = '';
        srcName += '<select class="form-control source_name">';

        var value = $(this).find('.val').text();

        for (var i = 0; i < filteredStable.length; i++) {
          if (value == filteredStable[i]) {
            $(this).find('.ingest_chkbox').prop('checked', true);
          }
        }
          for (var val = 0; val < source_name.length; val++) {
            var i = filteredDtable.indexOf(source_name[val]);
            if (filteredDtable.indexOf(source_name[val])!= null && filteredDtable[i] == source_name[val]) {
              srcName += '<option value="'+source_name[val]+'" selected>'+source_name[val]+'</option>';
            } else if(filteredDtable.indexOf(source_name[val])!= null){
              srcName += '<option value="'+source_name[val]+'">'+source_name[val]+'</option>';
            }
          }
          
        srcName += '</select>';
        $(this).find('#sourceName').html(srcName);

      });

      var str = $('#checkedVal').val();
      // console.log(str);
      $('a.DCube_struct').addClass('active');
      
      var val = str.split(",");

      for(var i=0; i< val.length; i++) {
          val[i]= val[i].replace(/ /g , "_");
          // console.log(val[i]);
      }

      for(var i=0; i< val.length; i++) {
        
        id = val[i];
        
        // $('tbody').find('#'+id).show();

        // $('#'+id).each(function(){
        //   if (exeMapData != 'Empty') {
        //     exeMapData = exeMapData.split(",");

        //     var filteredStable = exeMapData.filter(function(element, index, array) {
        //       return (index % 2 === 0);
        //     });

        //     var filteredDtable = exeMapData.filter(function(element, index, array) {
        //       return (index % 2 !== 0);
        //     });

        //   }
        //   var value = $(this).find('.val').text();
        //   var exeVal = '';
        //     for(var j = 0 ; j < filteredStable.length ;j++){
        //       if(filteredStable[j]==value){
        //         $(this).closest('.each_row').find('.ingest_chkbox').prop('checked', true);
        //         // console.log(filteredDtable[j]);
        //         // exeVal += $(this).closest('.each_row').find('.source_name').val();
        //         // exeVal += '<option selected>'+filteredDtable[j]+'</option>';
        //         // $(this).closest('.each_row').find('.source_name').html(exeVal);
        //       }
        //     }

        // });
        
      }      
      

    });

    $('#map_data').click(function(){
        var sourceTable = dCubeTable = [];
        var html ='<ul class="list-group"><label >Selected</label>';
        $('.each_row').find('input[type="checkbox"]:checked').each(function(){
            // console.log($(this).closest('.each_row').find('.val').text());

            sourceTable.push($(this).closest('.each_row').find('.val').text());
            dCubeTable.push($(this).closest('.each_row').find('.source_name').val());
            
            html += "<li class='list-group-item form-control' style='margin: 10px 0; font-weight: 500'>"+$(this).closest('.each_row').find('.val').text()+
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

      if (mapData != '') {
        $('.mapping_selected_btn').attr('disabled', false);
      }

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
