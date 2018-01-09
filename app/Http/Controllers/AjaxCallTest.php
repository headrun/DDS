<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Input;
use Response;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests;

class AjaxCallTest extends Controller
{

 	public function test(Request $request){

 		$data = $request->all(); // This will get all the request data.
 				//Input::all();
    // return $data;
    $users = '<h5><label style="font-size: 15px;">Choose Project Subtype</label></h5>';
 		$users .= $this->check_array($data['id'],$data['checkProjSubType']);
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
    } else if (count($dataVal) > 0) {
        $q1 = [];
        // return $dataVal;
        for ($j=0; $j < count($dataVal); $j++) {
          array_push($q1, DB::table('cat')->where('sub_type', $dataVal[$j])->groupBy('description')->get());
        }

      } else{
        $q1 = DB::table('cat')->where('sub_type', $dataVal)->groupBy('description')->get();
      }
      // return $q1;
    
    if ($q1) {
        return Response::Json(array('status'=> 'success', 'data'=> $q1));
    }
    return Response::json(array('status'=> 'failure'));
  }

  public function test2(Request $request)
  {
    $inputs = Input::all();
    $q1 = DB::table('active_proj')->where('proj_name', $inputs['id'])->get();
    return Response::Json(array('status'=> 'success', 'data'=> $q1));
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
    //return $inputs;
    $proj_id = array($inputs['project_id']);
    $val = $inputs['checkbox'];
    // $val = implode(",",$val);
    // return $val;
    $d_struct_id = [];
    $map_data = [];
    $sour_data = [];

    for ($i=0; $i < count($val); $i++) {
      $result = substr($val[$i], 0, 9);
      if ($result != 'undefined') {
        array_push($d_struct_id, str_replace(' ', '_', $val[$i]));
      }
    }
    // return $d_struct_id;
    for ($dStrEle=0; $dStrEle < count($d_struct_id); $dStrEle++) { 
      if ($d_struct_id[$dStrEle] == 'Fingertip_Formulary_Payor_Plan_Data') {
        $d_struct_id[$dStrEle] = 'MMIT_Payor_Plan_Data';
      }
      $data = DB::table('d_struc_map')->where('source_id', $d_struct_id[$dStrEle])->get();
      // return $d_struct_id[$dStrEle];
      $data1 = DB::table('sour_col_map')->where('source_id', $d_struct_id[$dStrEle])->get();
      if (!empty($data)) {
        array_push($map_data, $data[0]); 
      }
      if (!empty($data1)) {
        array_push($sour_data, $data1[0]); 
      }
    }
    // return $map_data;
     // return $sour_data;
    $proj_id = (int)trim($proj_id[0], '"');
    
    $checkedData = DB::table('map_data')->where('proj_id', $proj_id)->get();
    // return $checkedData;
    if (isset($checkedData)) {
      // return $checkedData;
      $data1 = array('d_struct_id','proj_id', 'checkedData', 'map_data','sour_data');
      
    } else {
      $data1 = array('d_struct_id','proj_id', 'map_data','sour_data');
    }
    // return $data1;
    return view('struct', compact($data1));
  }

  public function saveMapData(){
    $inputs = Input::all();
    $proj_id = (int)trim($inputs['projectId'], '"');
    $data = [];
    $source = [];
    foreach ($inputs['mapData'] as $key => $value) {
      
      $source[] = str_replace(" ","_",$value['source']);
      // $source[] = $value['source'];
      $data[] = $value['dcube'];

      
    }
    $map_data = implode(",", $data);
    $dcube_data = implode(",", $source);
    $exeMapData = DB::table('map_data')->where('proj_id', $proj_id)->get();
    if (count($exeMapData) > 0) {
        $exeMapData = $exeMapData[0];
        if ($exeMapData->map_data != $map_data) {
          DB::table('map_data')
              ->where('proj_id', '=', $inputs['projectId'])
              ->update(['map_data'=>$map_data , 'dcube_data'=>$dcube_data]);
          
        }
      } else {
        DB::table('map_data')->insert(
              ['proj_id' => $inputs['projectId'], 'map_data' => $map_data , 'dcube_data'=>$dcube_data]);
      }
    
    return Response::json(array('status'=> 'success', 'data'=> $inputs));
  }
  
  public function kpi(){
    $inputs = Input::all();

    $project_id = $inputs['forword_project_id'];

    $project = DB::table('active_proj')->where('id', $project_id)->get();
    $project_type = $project[0]->proj_type;
    $project_kpi = DB::table('kpi')->where('project_type', $project_type)->get();
    $project_kpi = (array)$project_kpi[0];
    $options = $this->check_array_1($project_type);
    $view = DB::table('mapping_kpi')->select('view')->distinct()->get();

    $data1 = array('view', 'project_id', 'project_type','project_kpi','options');

    return view('setup_new_proj_new', compact($data1));
  }
  
  private function check_array_1($data)
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
        return $brand;
        break;
      case 'Pre Launch':
        return $pre;
        break;
      case 'RWE':
        return $rew;
        break;
      case 'Digital Analytics':
        return $digital_ana;
        break;
      case 'Social Media':
        return $social_media;
        break;
      case 'Supply Chain':
        return $supply_chain;
        break;
      
      default:
        return "empty";
        
    }
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

  public function login(Request $request)
  {
    $inputs = $request->all();

    if(Auth::attempt(array('email' => $inputs['email'], 'password' => $inputs['password']))){
      return redirect('/landing');
    } else {
      Session::flash('message', 'Please login with valid credentials...!');
      return redirect('login');
    }
  }

  public function logout(){
    
    Auth::logout();

    Session::flush();
    
    return redirect('/');

  }
  public function updateKpi()
  {
    $inputs = Input::all();
    $name = "";
    $kpi = "Empty";
    $sub_kpi = "Empty";
    $dim = "Empty";
    
    if($inputs['project_name'] != "")
    {
        $name = $inputs['project_name'];
    }
    else
    {
        return "Project Name Not Available";
    }
    if(isset($inputs['kpi']))
    {
        $kpi = $inputs['kpi'];
        $kpi = implode(",",$kpi);
        // return $kpi;
    }
    if(isset($inputs['sub_kpi']))
    {
        $sub_kpi = $inputs['sub_kpi'];
        $sub_kpi = implode(",",$sub_kpi);
    }
    if(isset($inputs['dim']))
    {
        $dim = $inputs['dim'];
        $dim = implode(",",$dim);
    }

    return DB::table('kpi_selection_info')->insert(
            ['project_name' => $name, 'kpi' => $kpi, 'sub_kpi' => $sub_kpi, 'dimension' => $dim]);    
  }

}
