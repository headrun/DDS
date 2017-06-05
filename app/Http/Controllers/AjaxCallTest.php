<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Response;
use App\Category;
use Session;
use Input;
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
    $brand = array('Market Overview','Market Access','Source of Business','Physcian Segmentation','Performance Index','Sales Force Effectiveness');
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
    $q1 = DB::table('active_proj')->orderBy('id', 'desc')->get();    
    $data = array('q1');
    //return $q1[0]->proj_name;
    return view('Dashboard.index', compact($data));

  }
    public function validate1()
  {
    $inputs =Input::all();
    $values = $inputs['checkbox'];
    
    $final_array = array();
    $val = DB::table('validate')->whereIn('description', $values)->orderBy('val_result')->get();
    
    foreach ($val as $v) 
    {
      $v->description=str_replace(" ","_",$v->description); 

    }
    
    $data1 = array('val');
    return view('validate', compact($data1));
    
  }
  public function struct()
  {
    $inputs =Input::all();
    $val = $inputs['array'];
    $val = implode(",",$val);
    $data1 = array('val');
    return view('struct', compact($data1));
    
  }
  public function kpi()
  {
    $view = DB::table('mapping_kpi')->select('view')->distinct()->get();
    //$view = DB::table('mapping_kpi')->select('')->get();
    $data1 = array('view');
    return view('kpi_map_new', compact($data1));
    
    
    
  }
  public function kpi1()
  {
    $inputs =Input::all();
    //return $inputs;
    $view = DB::table('mapping_kpi')->where('view' , $inputs['id'])->get();
    //$view = DB::table('mapping_kpi')->select('')->get();
    
    return $view;
    
    
  }
  public function delete_project()
  {
    $inputs =Input::all();
    //return $inputs;
    $view = DB::table('active_proj')->where('proj_name' , $inputs)->delete();
    //$view = DB::table('mapping_kpi')->select('')->get();
    
    return 1;
    
    
  }


}
