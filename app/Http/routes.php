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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function(){
	return view('Login.Login');
});

Route::get('/dashboard',function(){
	return view('Dashboard.index');
});

Route::get('/extractor_library',function(){
	return view('extractor_library');
});


Route::get('/setup_new_proj',function(){
	return view('setup_new_proj_new');
});

Route::get('/setup_new_proj_new',function(){
	return view('setup_new_proj_new');
});

Route::get('/testing',function(){
	return view('test');
});

Route::any('test', 'AjaxCallTest@test');

Route::any('test1', 'AjaxCallTest@test1');

Route::any('/ingestion', 'CommonController@ingestion');
Route::any('/getTypes', 'CommonController@getTypes');
Route::any('/getSubTypes', 'CommonController@getSubTypes');
Route::any('/getExtractor', 'CommonController@getExtractor');

Route::get('/symp',function(){
	return view('symphony_claims');
});

Route::get('/symp_ps',function(){
	return view('symphony_presciber_source');
});

Route::get('/mmit',function(){
	return view('mmit');
});

