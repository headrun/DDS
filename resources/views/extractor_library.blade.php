@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Extractor Library</title>
@show
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Extract Library</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead>
                                <tr>
                                  <th>Data</th>
                                  <th>Source</th>
                                  <th colspan="2" style="padding-left: 55px;">Database</th>
                                  <th colspan="2" style="padding-left: 40px;">Flat File</th>
                                  <th>JSON</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th>Redshift</th>
                                  <th>SQLServer</th>
                                  <th>CSV</th>
                                  <th>Delimited</th>
                                  <th></th>
                                </tr>
                                <tr>
                                  <td>EMR</td>
                                  <td>Humedica-Diagosis</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Humedica-Procedure </td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Humedica-Labs  </td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Humedica-Product  </td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Symphony</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>THIN</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Flatiron(oncology)</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>IMS</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td>Survey </td>
                                  <td>Kantar</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>No</td>
                                  <td>No</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>NHANES</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>No</td>
                                </tr>
                                <tr>
                                  <td>Hospital Data</td>
                                  <td>Premier</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td>CLAIMS </td>
                                  <td>Symphony</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>No</td>
                                  <td>No</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>IMS</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>No</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>TRUVEN</td>
                                  <td>yes</td>
                                  <td>No</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>OPTUM</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>No</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td>Xponent  </td>
                                  <td>IMS</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>No</td>
                                  <td>No</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>IMS</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Symphony</td>
                                  <td>yes</td>
                                  <td>no</td>
                                  <td>yes</td>
                                  <td>yes</td>
                                  <td>yes</td>
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
@stop
@section('BaseJSLib')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    /*$(document).ready(function() {
           table =  $('#mainTable').DataTable({
          "searching": false,
          "bPaginate": false,
            "info":     false
        });
    });*/
    $('a.extractor_library').addClass('active');
</script>
@stop
