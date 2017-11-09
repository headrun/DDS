@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Extractor Library</title>
@stop
@section('BaseContent')
<div class="container-fluid bg">
  <div class="visualization">
      <div class="top-div1">
          <div class="row widget-1">
            <div class="widget-title-box">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/extlibrary.png" style="width:25px;height:40px; margin-left: 27px;">
              </div>
              <h3 class="widget-title">Extract Library</h3>
            </div>
              <!-- <div class="col-lg-1 2 col-md-12 col-sm-12 col-xs-12"> -->
                  <div class="panel panel-default" style="padding: 30px;">
                      <div class="row">
                          <!-- <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
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
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
</tr>
                                <tr>
                                  <td></td>
                                  <td>Humedica-Procedure</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Humedica-Labs  </td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Humedica-Product  </td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Symphony</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>THIN(CEGEDIM)</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
 <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Flatiron(oncology)</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>IMS</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td>Survey </td>
                                  <td>Kantar</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>NHANES</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td>Hospital Data</td>
                                  <td>Premier</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td>CLAIMS </td>
                                  <td>Symphony</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>IMS</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>TRUVEN</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>OPTUM</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                <tr>
                                  <td>Prescription(Rx)</td>
                                  <td>IMS</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Symphony</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td>DDS</td>
                                  <td>IMS</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>Symphony</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td>PROMOTION</td>
                                  <td>VEEVA CRM </td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td>ENQUITY</td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
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
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>

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
