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
 		}
    $var = $var."</div>";      
 		return $var;
 	}

  public function test1(Request $request)
  {
    $data = $request->all();
    $q1 = DB::table('cat')->whereIn('sub_type', $data['id'])->groupBy('description')->get();

    if ($q1) {
        return Response::Json(array('status'=> 'success', 'data'=> $q1));
    }else{
        return Response::json(array('status'=> 'failure'));
    }
  }
  public function dash()
  {
    $q1 = DB::table('active_proj')->get();    
    $data = array('q1');
    //return $q1[0]->proj_name;
    return view('Dashboard.index', compact($data));

  }


}
