<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function(){
	return view('Login.Login');
});

Route::get('/login',function(){
	return view('Login.Login');
});

Route::any('/storeFile','AjaxCallTest@storeFile');
	

// Auth::routes();

Route::any('/login1', 'AjaxCallTest@login');

Route::group(['middleware' => 'auth'], function () {
	 Route::get('/landing',function(){
		return view('landing');
	});
	 Route::get('/ddspage',function(){
		return view('DDSPage');
	});

	 Route::get('/dashboard', 'AjaxCallTest@dash');

	Route::get('/extractor_library',function(){
		return view('extractor_library');
	});

	Route::get('/create_new_proj','CommonController@createNewProj');
	Route::get('/setup_new_proj','CommonController@setup_new_proj');
	Route::get('/setup_new_proj/{id}','CommonController@update_exe_proj');

	Route::get('/mapping_kpi',function(){
		return view('mapping_kpi');
	});

	Route::any('/delete_project','AjaxCallTest@delete_project');



	Route::get('/setup_new_proj_new',function(){
		return view('setup_new_proj_new');
	});

	Route::any('/validate','CommonController@validate1');

	Route::any('test', 'AjaxCallTest@test');
	Route::any('test1', 'AjaxCallTest@test1');
	Route::any('test2', 'AjaxCallTest@test2');

	Route::any('/ingestion', 'CommonController@ingestion');
	Route::any('/ingestion/{id}', 'CommonController@ingestionBackStep');
	Route::any('/saveIngestionData', 'CommonController@saveIngestionData');
	Route::any('/getIngestionData', 'CommonController@getIngestionData');


	Route::any('/getTypes', 'CommonController@getTypes');
	Route::any('/getSubTypes', 'CommonController@getSubTypes');
	Route::any('/getExtractor', 'CommonController@getExtractor');
	Route::any('/save_proj_into_session', 'CommonController@save_proj_into_session');
	Route::any('/saveMappingKpi', 'CommonController@saveMappingKpi');
	Route::any('/getMappingKpi', 'CommonController@getMappingKpi');
	Route::any('/getDimensionValOfSubKpi', 'CommonController@getDimensionValOfSubKpi');

	Route::any('/getExeFlow', 'CommonController@getExeFlow');
	Route::any('/getFlowForEdit', 'CommonController@getFlowForEdit');
	Route::any('/getFlowForDelete', 'CommonController@getFlowForDelete');
	Route::any('/getDataForEdit', 'CommonController@getDataForEdit');

	Route::get('/Symphony_Physican_Rx_Data',function(){
		return view('Physican_Rx_Data');
	});

	Route::get('/IMS_Physican_Rx_Data',function(){
		return view('Physican_Rx_Data');
	});

	Route::get('/IMS_Aggregated_Rx_Data',function(){
		return view('Aggregated_Rx_Data');
	});

	Route::get('/Symphony_Aggregated_Rx_Data',function(){
		return view('Aggregated_Rx_Data');
	});

	Route::get('/Symphony_claims',function(){
		return view('symphony_claims');
	});
	Route::get('/IMS_claims',function(){
		return view('IMS_claims');
	});

	Route::get('/Symphony_Product_Dimension',function(){
		return view('Product_Dimension');
	});

	Route::get('/IMS_Product_Dimension',function(){
		return view('Product_Dimension');
	});


	Route::get('/MMIT_Payor_Plan_Data',function(){
		return view('mmit');
	});

	Route::get('/MMIT_Payor_Plan_to_Claims',function(){
		return view('MMIT_Payor_Plan_Data_to_Claims');
	});


	Route::get('/Symphony_Plan_Dimension',function(){
		return view('Plan_Dimension');
	});

	Route::get('/IMS_Plan_Dimension',function(){
		return view('IMS_plan_dimension');
	});

	Route::get('/Symphony_Rejection_Reason',function(){
		return view('Reject_Reason');
	});
	Route::get('/IMS_Rejection_Reason',function(){
		return view('IMS_Reject_Reason');
	});

	Route::get('/Prescriber_Source',function(){
		return view('Prescriber_Source');
	});

	Route::get('/Allignment',function(){
		return view('Allignment');
	});

	Route::get('/kpi_map_new','AjaxCallTest@kpi');

	Route::any('/updateKpi','AjaxCallTest@updateKpi');

	Route::any('/kpi','AjaxCallTest@kpi1');

	Route::get('/Prescriber_Dimension',function(){
		return view('Prescriber_Dimension');
	});

	Route::get('/Symphony_Patient_Dimension',function(){
		return view('Patient_Dimension');
	});

	Route::get('/IMS_Patient_Dimension',function(){
		return view('Patient_Dimension');
	});

	Route::get('/CLIENT_Territory_Alignment',function(){
		return view('TerritoryAllignment');
	});

	Route::get('/kpilib','AjaxCallTest@kpiLib');

	Route::any('/struct','AjaxCallTest@struct');
	Route::any('/saveMapData','AjaxCallTest@saveMapData');

	Route::any('/logout','AjaxCallTest@logout');

});
