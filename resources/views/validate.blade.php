@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Validation</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Validation Summary</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">
                          <div class="widget col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table" style="font-size:14px" id="mainTable">
                              <thead>
                                <tr>
                                  <th>Ingested Data</th>
                                  <th>Validation result</th>
                                  <th>Comparison with source</th>
                                  <th>Duplicates</th>
                                  <th>Missing Values</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><a href="{{url()}}/symp">Symphony Claims</a></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Not Present</td>
                                  <td>No</td>
                                </tr>
                                <tr>
                                  <td><a href="{{url()}}/symp_ps">Symphony Presciber Source</a></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Not Present</td>
                                  <td>No</td>
                                </tr>
                                <tr>
                                  <td><a href="{{url()}}/mmit">MMIT</a></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Present</td>
                                  <td>No</td>
                                </tr>
                                <tr>
                                  <td><a href="#">MMIT to CLAIMS</a></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Not Present</td>
                                  <td>No</td>
                                </tr>
                                <tr>
                                  <td><a href="#">Symphony Product Dimension</a></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Not Present</td>
                                  <td>Yes</td>
                                </tr>
                                <tr>
                                  <td><a href="#">Symphony Plan Dimension </a></td>
                                  <td><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Present</td>
                                  <td>Yes</td>
                                </tr>
                                <tr>
                                  <td><a href="#">Symphony Rejection Reason Dimension</a></td>
                                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                  <td>82%</td>
                                  <td>Not Present</td>
                                  <td>Yes</td>
                                </tr>
                                <tr>
                                  <td><a href="#">Symphony Prescriber Dimension</a></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Not Present</td>
                                  <td>No</td>
                                </tr>
                                <tr>
                                  <td><a href="{{url()}}/prescriber_allignment">Prescriber Allignment </a></td>
                                  <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                  <td>100%</td>
                                  <td>Not Present</td>
                                  <td>Yes</td>
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
<script src="{{url()}}/assets/vendor/js/jquery.js"></script>
@stop
