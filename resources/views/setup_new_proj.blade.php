@extends('Template.HtmlSkeleton')
@section('Title')
<title>Dcube | Setup New Project</title>
@stop
@section('BaseContent')
<div class="container-fluid dashboard-content">
  <div class="visualization">
      <div class="top-div">
          <div class="row widget-1">
              <div class="widget-icon"><img src="{{url()}}/assets/vendor/img/new_document_add.png"></div>
              <h3 class="widget-title">Setup New Project</h3>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default" style="border-bottom: 4px solid #8bc34a;     padding: 20px;">
                      <div class="row">  
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <h4><span class="label label-primary">Choose a Project</span></h4>
                              <br>
                              <form>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio">Brand Launch
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio">RWE
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio">Digital Analytics
                                </div>
                                <br><br>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio">Social Media
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio">Supply Chain
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="optradio">New Projecct
                                </div>
                              </form>
                          </div>
                          <div class="widget col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <h4><span class="label label-primary">Choose Project Subtype for RWE</span></h4>
                              <br>
                              <select multiple class="form-control" id="sel2" style="height: 80px;">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                          </div>
                      </div>
                      <br>
                      <hr>
                      <div class="row">  
                          <div class="widget col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <h4><span class="label label-primary">Data Tables</span></h4>
                              <br>
                              <form>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Claims</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">MMIT Lives Covered</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Prescriber Source</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Sales (TRx,NRx,MBS$)</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Promotions</label>
                                </div>
                              </form>
                          </div>
                          <div class="widget col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <h4><span class="label label-primary">Bridging Files</span></h4>
                              <br>
                              <form>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Mmit to Claims</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">MMIT Lives Covered</label>
                                </div>
                              </form>
                          </div>
                          <div class="widget col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <h4><span class="label label-primary">Dimension Tables(optional)</span></h4>
                              <br>
                              <form>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Product</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Plan</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="">Rejection Reason</label>
                                </div>
                              </form>
                          </div>
                      </div>
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
@stop
