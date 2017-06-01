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

Route::get('/dashboard', 'AjaxCallTest@dash');


Route::get('/login',function(){
	return view('Login.Login');
});

Route::get('/',function(){
	return view('Dashboard.index');
});

Route::get('/extractor_library',function(){
	return view('extractor_library');
});


Route::get('/setup_new_proj','CommonController@setup_new_proj');

Route::any('/delete_project','AjaxCallTest@delete_project');

Route::get('/setup_new_proj_new',function(){
	return view('setup_new_proj_new');
});

Route::any('/validate','AjaxCallTest@validate1');

Route::any('test', 'AjaxCallTest@test');
Route::any('test1', 'AjaxCallTest@test1');
Route::any('/ingestion', 'CommonController@ingestion');
Route::any('/getTypes', 'CommonController@getTypes');
Route::any('/getSubTypes', 'CommonController@getSubTypes');
Route::any('/getExtractor', 'CommonController@getExtractor');
Route::any('/save_proj_into_session', 'CommonController@save_proj_into_session');

Route::get('/claims',function(){
	return view('symphony_claims');
});

Route::get('/Product_Dimension',function(){
	return view('Product_Dimension');
});

Route::get('/Payor_Plan_Data',function(){
	return view('mmit');
});

Route::get('/Plan_Dimension',function(){
	return view('Plan_Dimension');
});

Route::get('/Rejection_Reason',function(){
	return view('Reject_Reason');
});

Route::get('/Prescriber_Source',function(){
	return view('Prescriber_Source');
});

Route::get('/Allignment',function(){
	return view('Allignment');
});

Route::get('/kpi_map_new','AjaxCallTest@kpi');

Route::any('/kpi','AjaxCallTest@kpi1');



Route::get('/Prescriber_Dimension',function(){
	return view('Prescriber_Dimension');
});


Route::get('/struct','AjaxCallTest@struct');





