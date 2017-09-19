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

  
	
 	public function test(Request $request){

 		$data = $request->all(); // This will get all the request data.
 				//Input::all();
    // return $data;
 		$users = $this->check_array($data['id'],$data['checkProjSubType']);
    return $users;
    return Response::json($users);
      	if ($users) {
      		return $users;
      	}else{
      		return Response::json(array('status'=> 'failure'));
      	}
      	
        //return $data ; // This will dump and die
 	}

 	private function check_array($data, $checkedData)
 	{
    $brand = array('Market Overview','Market Access','Source of Business','Sales Force Effectiveness','Marketing');
    $pre = array('Market Overview','Market Access','Source of Business','Marketing');
    $rew = array('Unmet Need Identifier','Cohort Generator','Cohort Analyzer','Patient Journey Tracker');
    $digital_ana = array('Campaign Tracking','Campaign Effectiveness Measurement');
    $social_media =array('Sentiment Analysis','Social Influencer Mapping & Tracking');
    $supply_chain = array('Portfolio performance','Service level Monitoring','Inventory Health');
 		//return $data;
 		switch ($data) {
 			case 'Brand Launch':
 				return $this->html_change($brand,$data,$checkedData);
 				break;
      case 'Pre Launch':
        return $this->html_change($pre,$data,$checkedData);
        break;
 			case 'RWE':
 				return $this->html_change($rew,$data,$checkedData);
 				break;
 			case 'Digital Analytics':
 				return $this->html_change($digital_ana,$data,$checkedData);
 				break;
 			case 'Social Media':
 				return $this->html_change($social_media,$data,$checkedData);
 				break;
 			case 'Supply Chain':
 				return $this->html_change($supply_chain,$data,$checkedData);
 				break;
 			
 			default:
 				return "empty";
 				
 		}
 	}
 	private function html_change($content,$data,$checkedData)
 	{
    $var = "<form><div class='form-group'>";
    $checkedData = explode(',', $checkedData);
		foreach ($content as $value) {
      if (isset($checkedData)) {
        if (in_array($value, $checkedData)) {
          $var = $var."<div class='checkbox'>";
          $var = $var."<label>";
          $var = $var."<input  type ='checkbox' class = 'sid' name='proj_sub_type[]' value = '".$value."' id = 'sid' checked>".$value;
          $var = $var."</label>";
          $var = $var."</div>";
        } else {
          $var = $var."<div class='checkbox'>";
          $var = $var."<label>";
          $var = $var."<input  type ='checkbox' class = 'sid' name='proj_sub_type[]' value = '".$value."' id = 'sid'>".$value;
          $var = $var."</label>";
          $var = $var."</div>";
        }
      } else {
        $var = $var."<div class='checkbox'>";
        $var = $var."<label>";
        $var = $var."<input  type ='checkbox' class = 'sid' name='proj_sub_type[]' value = '".$value."' id = 'sid'>".$value;
        $var = $var."</label>";
        $var = $var."</div>";
      }
      
    }

    $var = $var."</div>";      
 		return ($var);
 	}

  public function test1(Request $request)
  {
    $data = $request->all();
    $dataVal = $data['id'];
    // return $dataVal;
    if (isset($data['key'])) {
      $q1 = [];
      if (count($dataVal) > 0) {
        for ($i=0; $i < count($dataVal); $i++) {
          array_push($q1, DB::table('cat')->where('sub_type', $dataVal[$i])->groupBy('description')->get());
        }
      }
    } else {
      if (count($dataVal) > 0) {
        $q1 = [];
        // return $dataVal;
        for ($j=0; $j < count($dataVal); $j++) {
          array_push($q1, DB::table('cat')->where('sub_type', $dataVal[$j])->groupBy('description')->get());
        }

      } else{
        $q1 = DB::table('cat')->where('sub_type', $dataVal)->groupBy('description')->get();
      }
      // return $q1;
    }
    
    if ($q1) {
        return Response::Json(array('status'=> 'success', 'data'=> $q1));
    }else{
        return Response::json(array('status'=> 'failure'));
    }
  }
  public function dash()
  {
    $q1 = DB::table('active_proj')->orderBy('active_down', 'desc')->get();    
    $data = array('q1');
    //return $q1[0]->proj_name;
    //return $q1;
    
    return view('Dashboard.index', compact($data));

  }

  public function validate1(){
    $inputs =Input::all();
    $values = $inputs['checkbox'];

    return $values;
    
    $final_array = array();
    $val = DB::table('validate')->whereIn('description', $values)->orderBy('val_result')->get();
    
    foreach ($val as $v) 
    {
      $v->description=str_replace(" ","_",$v->description);
    }
    
    $data1 = array('val');
    return view('validate', compact($data1));
    
  }

  public function struct() {
    $inputs =Input::all();
    
    $proj_id = array($inputs['project_id']);
    $val = $inputs['checkbox'];
    $val = implode(",",$val);
    $proj_id = (int)trim($proj_id[0], '"');
    
    $checkedData = DB::table('map_data')->where('proj_id', $proj_id)->get();

    if (isset($checkedData)) {

      $data1 = array('val','proj_id', 'checkedData');
      
    } else {
      $data1 = array('val','proj_id');
    }
    
    return view('struct', compact($data1));
  }

  public function saveMapData(){
    $inputs = Input::all();
    $proj_id = (int)trim($inputs['projectId'], '"');

    $exeMapData = DB::table('map_data')->where('proj_id', $proj_id)->get();
  
    if (count($exeMapData) > 0) {
      $exeMapData = $exeMapData[0];
      if ($exeMapData->map_data != $inputs['mapData']) {
        DB::table('map_data')
            ->where('proj_id', '=', $inputs['projectId'])
            ->update(['map_data'=>$inputs['mapData']]);
      }
    } else {
      DB::table('map_data')->insert(
            ['proj_id' => $inputs['projectId'], 'map_data' => $inputs['mapData']]);
    }

    return Response::json(array('status'=> 'success', 'data'=> $inputs));
  }
  
  public function kpi(){
    $inputs = Input::all();

    $project_id = $inputs['forword_project_id'];

    $project_type = DB::table('active_proj')->select('proj_type')->where('id', $project_id)->get();
    $project_type = $project_type[0]->proj_type;

    $view = DB::table('mapping_kpi')->select('view')->distinct()->get();

    $data1 = array('view', 'project_id', 'project_type');

    return view('setup_new_proj_new', compact($data1));
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
  public function kpiLib()
  {
    //$inputs =Input::all();
    //return $inputs;
    $view = DB::table('mapping_kpi')->select('View')->distinct()->get();
    //$view = DB::table('mapping_kpi')->select('')->get();
    $view1 = DB::table('mapping_kpi')->get();
    $data1 = array('view','view1');
    return view('KpiLib', compact($data1));    
    
  }
  public function login()
  {
    $inputs =Input::all();
    //return $inputs;
    $view = DB::table('users')->where('email' , $inputs['email'])
                              ->where('password',$inputs['password'])
                              ->get();
    //$view = DB::table('mapping_kpi')->select('')->get();
    if ($view)
      return redirect('/dashboard');
    else
      return view('Login.Login');
  }

}
