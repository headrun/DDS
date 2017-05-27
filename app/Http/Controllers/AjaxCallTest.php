<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Response;
use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxCallTest extends Controller
{

  
	
 	public function test(Request $request)
 	{
 		

 		$data = $request->all(); // This will get all the request data.
 				//Input::all();

 		$users = $this->check_array($data['id']);
    return $users;
    return Response::json($users);
      	if ($users) {

      		return $users;
      	}else{
      		return Response::json(array('status'=> 'failure'));
      	}
      	
        //return $data ; // This will dump and die
 	}
 	private function check_array($data)
 	{
    $brand = array('Market Overview','Market Access','Source of Business','Physcian Segmentation','Sub-National Analysis','Sales Force Effectiveness');
    $rew = array('Unmet Need Identifier','Cohort Generator','Cohort Analyzer','Patient Journey Tracker');
    $digital_ana = array('Campaign Tracking','Campaign Effectiveness Measurement');
    $social_media =array('Sentiment Analysis','Social Influencer Mapping & Tracking');
    $supply_chain = array('Portfolio performance','Service level Monitoring','Inventory Health');
 		//return $data;
 		switch ($data) {
 			case 'Brand Launch':
 				return $this->html_change($brand,$data);
 				break;
 			case 'RWE':
 				return $this->html_change($rew,$data);
 				break;
 			case 'Digital Analytics':
 				return $this->html_change($digital_ana,$data);
 				break;
 			case 'Social Media':
 				return $this->html_change($social_media,$data);
 				break;
 			case 'Supply Chain':
 				return $this->html_change($supply_chain,$data);
 				break;
 			
 			default:
 				return "empty";
 				
 		}
 	}
 	private function html_change($content,$data)
 	{
    $var = "<form><div class='form-group'>";
 		foreach ($content as $value) 
 		{
      $var = $var."<div class='checkbox'>";
      $var = $var."<label>";
      $var = $var."<input  type ='checkbox' class = 'sid' value = '".$value."' id = 'sid'>".$value;
      $var = $var."</label>";
      $var = $var."</div>";
      
      //$var = "working";
      //return $var;
 		}
    $var = $var."</div>";

 		//$var = $var."</select>";
    //$var2 = $var + $var1;
      
 		return $var;
 	}
  public function test1(Request $request)
  {
    $data = $request->all();
    $query1= array();
    $query2= array();
    $query3= array();
    foreach ($data['id'] as $value) {
      # code...
      $q1 = DB::table('cat')->where('sub_type','=',$value )
                              ->where('category','=','Data')
                                ->get();
    $query1 =  array_merge($query1,$q1);
                          
                              }
                            

    foreach ($data['id'] as $value) {
      # code...
    $query2 =  array_merge($query2,DB::table('cat')->where('sub_type','=',$value )
                              ->where('category','=','Bridging File')
                                ->get());
                                
                              }
    foreach ($data['id'] as $value) {
      # code...
    $query3 =  array_merge($query3,DB::table('cat')->where('sub_type','=',$value )
                              ->where('category','=','Dimension')
                                ->get());
                                
                              }


    $result = '';
    
    $result1 = $this->create_html($query1,'Data');
    $result2 = $this->create_html($query2,'Bridging File');
    $result3 = $this->create_html($query3,'Dimension');
    $result = $result.$result1.$result2.$result3;

    $result = $result."<button class='btn btn-success btn-md  pull-right' id= 'sidq' type='submit'>Proceed to Ingestion</button>";
    
    return $result;
    return Response::json($result);
  }

  public function create_html($query,$data)
  {

    $var = "<div class ='col-lg-4 col-md-4 col-sm-4 col-xs-4'><h4>".$data."</h4>";
    foreach ($query as $value)
    {
      $var = $var."<div class = 'checkbox'>";
      $var = $var."<label class = 'active'>";
      
      $var = $var."<input type='checkbox' checked class='test2' name = 'check_box[]' value='".$value->description." '>".$value->description."<br>";
      $var = $var."</label>";
      $var = $var."</div>";
    }
    $var = $var."</div>";
    
    return $var;
  }


}
