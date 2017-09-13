<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Session;
use App\Ingestion;
use Input;

class CommonController extends Controller
{

    public function getTypes(){
        $inputs = Input::all();

        $data = Ingestion::where('data', '=', $inputs['data_name'])
                        ->where('source', '=', $inputs['source_name'])
                        ->groupBy('type')
                        ->get();
        return Response::json(array('status'=> 'success', 'data'=> $data));
    }


    public function getSubTypes(){
        $inputs = Input::all();

        $data = Ingestion::where('data', '=', $inputs['data_name'])
                        ->where('source', '=', $inputs['source_name'])
                        ->where('type', '=', $inputs['type_name'])
                        ->groupBy('sub_type')
                        ->get();
        return Response::json(array('status'=> 'success', 'data'=> $data));
    }

    public function getExtractor(){
        $inputs = Input::all();

        $data = Ingestion::where('data', '=', $inputs['data_name'])
                        ->where('source', '=', $inputs['source_name'])
                        ->where('type', '=', $inputs['type_name'])
                        ->where('sub_type', '=', $inputs['subtype_name'])
                        ->get();
        return Response::json(array('status'=> 'success', 'data'=> $data));
    }

     public function ingestion()
     {
        $inputs = Input::all();

        $values = array();
        $proj_name = $ta = $fa= '';
        
        if (isset($inputs['check_box']) && !empty($inputs['check_box'])){
            Session::put('values', $inputs['check_box']);
        }
            
        if (isset($inputs['proj_nam']) && !empty($inputs['proj_nam']))
            $proj_name = $inputs['proj_nam'];
        
        if (isset($inputs['ta']) && !empty($inputs['ta']))
            $ta = $inputs['ta'];

        if (isset($inputs['fa']) && !empty($inputs['fa']))
            $fa = $inputs['fa'];

        $final_array = array();
        $values = Session::get('values');

        foreach ($values as $key => $value) 
        {
            $data = Ingestion::where('data', '=', $value)->groupBy('source')->get();
            $arr = array('data'=> $value, 'sources'=> $data);
            // return $arr;
            array_push($final_array, $arr);
        }
        if(!(DB::table('active_proj')->where('proj_name',$proj_name)))
        {
            DB::table('active_proj')->insert(
            ['proj_name' => $proj_name, 'ta' => $ta ,'fa' => $fa, 'date' => date('Y-m-d')]);
            $data1 = DB::table('active_proj')->get();
            //$data = array('final_array');
            $final_array1 = array();
            foreach ($data1 as $value) {
                array_push($final_array1,$value->proj_name);
            }
        }
        else 
        {
            DB::table('active_proj')->where('proj_name' , $proj_name)->delete();
            DB::table('active_proj')->insert(
            ['proj_name' => $proj_name, 'ta' => $ta ,'fa' => $fa, 'date' => date('Y-m-d')]);
            $data1 = DB::table('active_proj')->get();
            //$data = array('final_array');
            $final_array1 = array();
            foreach ($data1 as $value) {
                array_push($final_array1,$value->proj_name);
            }
        }

        $proj_id = DB::table('active_proj')->select('id')->where('proj_name',$proj_name)->get();

        $addProjId = array_push($values,$proj_id[0]->id);
        $proj_id = json_encode($proj_id[0]->id);
        $proj_id = (int)$proj_id;
        // return $proj_id;
        $newPrj = 'New Project';
        $data1 = array('final_array1', 'final_array', 'proj_id', 'newPrj');
        return view('ingestion', compact($data1));
        
    }

    public function ingestionBackStep(Request $request, $id){
        $inputs = Input::all();

        $values = array();
        $proj_name = $ta = $fa= '';
        
        if (isset($inputs['check_box']) && !empty($inputs['check_box'])){
            Session::put('values', $inputs['check_box']);
        }
            
        if (isset($inputs['proj_nam']) && !empty($inputs['proj_nam']))
            $proj_name = $inputs['proj_nam'];
        
        if (isset($inputs['ta']) && !empty($inputs['ta']))
            $ta = $inputs['ta'];

        if (isset($inputs['fa']) && !empty($inputs['fa']))
            $fa = $inputs['fa'];

        $final_array = array();
        $values = Session::get('values');

        foreach ($values as $key => $value){
            $data = Ingestion::where('data', '=', $value)->groupBy('source')->get();
            $arr = array('data'=> $value, 'sources'=> $data);
            // return $arr;
            array_push($final_array, $arr);
        }

        if(!(DB::table('active_proj')->where('proj_name',$proj_name)))
        {
            DB::table('active_proj')->insert(
            ['proj_name' => $proj_name, 'ta' => $ta ,'fa' => $fa, 'date' => date('Y-m-d')]);
            $data1 = DB::table('active_proj')->get();
            //$data = array('final_array');
            $final_array1 = array();
            foreach ($data1 as $value) {
                array_push($final_array1,$value->proj_name);
            }
        }
        else 
        {
            DB::table('active_proj')->where('proj_name' , $proj_name)->delete();
            DB::table('active_proj')->insert(
            ['proj_name' => $proj_name, 'ta' => $ta ,'fa' => $fa, 'date' => date('Y-m-d')]);
            $data1 = DB::table('active_proj')->get();
            //$data = array('final_array');
            $final_array1 = array();
            foreach ($data1 as $value) {
                array_push($final_array1,$value->proj_name);
            }
        }
        
        $exeProjectData = DB::table('active_proj')->select()->where('id',$id)->get();
        $exeProjectData = !empty($exeProjectData) ? json_encode($exeProjectData[0]->id) : '';

        $exeIngestData = DB::table('ingestion_data')->select()->where('proj_id',$id)->get();
        $exeIngestId = !empty($exeIngestData) ? json_encode($exeIngestData[0]->ing_id) : '';

        $exeIngestion = DB::table('ingestion')->select()->where('id',$exeIngestId)->get();
        //  $exeIngestionId = json_encode($exeIngestion[0]);

        // return $exeIngestData;

        // $proj_det = DB::table('active_proj')->select()->where('id',$id)->get();
        // $proj_id = !empty($proj_det) ?  json_encode($proj_det[0]->id) : '';
        $proj_id = $id;
        $data1 = array('final_array1', 'final_array', 'proj_id', 'exeIngestion', 'exeIngestData');
        return view('ingestion', compact($data1));
    }

    public function saveIngestionData(){
        $inputs = Input::all();
        $params = array();

        parse_str($inputs['serializedData'], $params);

        // $ext_name = str_replace(' ', '', $params['ext_name']);
        $ext_name = trim($params['ext_name'], ' ');
        // return $params;

        $ing_data = DB::table('ingestion')->select('id', 'type')->where('extractor_name', $ext_name)->get();
        // return $ing_data;

        $ing_data = json_encode($ing_data[0]);
        $ing_data = json_decode($ing_data);

        if ($ing_data->type == 'Database') {
            $miscChecked = json_encode($params['miscChecked']);

            $exeIngestion = DB::table('ingestion_data')->select('id', 'ing_id')
                ->where('proj_id', $inputs['project_id'])
                ->where('ing_id', $ing_data->id)
                ->get();
            
            if (count($exeIngestion)>0) {
                $exeIngId = $exeIngestion[0];

                DB::table('ingestion_data')
                    ->where('id', $exeIngId->id)
                    ->update(array(
                        'ing_id' => $ing_data->id, 'ext_name' => $ext_name,
                        'host_name' => $params['hostName'], 'port_no' => $params['portNo'], 
                        'db_name' => $params['dbTypeEmail'], 'table_name' => $params['tableName'], 'user_name' => $params['userName'], 'password' => $params['dbTypePassword'], 'time_zone' => $params['optradio'], 'time_zone_location' => $params['dbTimeZoneLocation'],
                        'misc' => $miscChecked
                    ));
            } else {
                DB::table('ingestion_data')->insert([
                    'proj_id' => $inputs['project_id'], 'ing_id' => $ing_data->id, 'ext_name' => $ext_name, 'key' => $params['dbDataKey'], 'host_name' => $params['hostName'], 'port_no' => $params['portNo'], 'db_name' => $params['dbTypeEmail'], 'table_name' => $params['tableName'], 'user_name' => $params['userName'], 'password' => $params['dbTypePassword'], 'time_zone' => $params['optradio'], 'time_zone_location' => $params['dbTimeZoneLocation'],
                    'misc' => $miscChecked
                ]);
            }

        } else if($ing_data->type == 'JSON'){
            // return $params['pathNotFoundAndAllowComments'];
            $path_and_comments = json_encode($params['pathNotFoundAndAllowComments']);

            $exeIngestion = DB::table('ingestion_data')->select('id', 'ing_id')
                ->where('proj_id', $inputs['project_id'])
                ->where('ing_id', $ing_data->id)
                ->get();

            if (count($exeIngestion)>0) {
                $exeIngId = $exeIngestion[0];

                DB::table('ingestion_data')
                    ->where('id', $exeIngId->id)
                    ->update(array(
                        'ing_id' => $ing_data->id, 'ext_name' => $ext_name,
                        'json_file' => $params['jsonFileName'], 'reader_page_name' => $params['jsonEmail'], 'remember_me' => $params['jsonRememberMe'], 'json_path' => $params['jsonPassword'], 'path_not_found_and_allow_comments' => $path_and_comments, 'json_time_zone_location' => $params['jsonTimeZoneLocation']
                    ));
            } else {
                DB::table('ingestion_data')->insert([
                    'proj_id' => $inputs['project_id'], 'ing_id' => $ing_data->id, 'ext_name' => $ext_name, 'key' => $params['jsonDataKey'], 'json_file' => $params['jsonFileName'], 'reader_page_name' => $params['jsonEmail'], 
                    'remember_me' => $params['jsonRememberMe'], 'json_path' => $params['jsonPassword'], 'path_not_found_and_allow_comments' => $path_and_comments, 'json_time_zone_location' => $params['jsonTimeZoneLocation']
                ]);    
            }
            
        }else {
            $view_result = json_encode($params['viewResult']);

            $exeIngestion = DB::table('ingestion_data')->select('id', 'ing_id')
                ->where('proj_id', $inputs['project_id'])
                ->where('ing_id', $ing_data->id)
                ->get();

            if (count($exeIngestion)>0) {
                $exeIngId = $exeIngestion[0];

                DB::table('ingestion_data')
                    ->where('id', $exeIngId->id)
                    ->update(array(
                        'ing_id' => $ing_data->id, 'ext_name' => $ext_name,
                        'csv_file' => $params['csvFileName'], 'col_delimiter' => $params['colDelimiter'], 'row_delimiter' => $params['rowDelimiter'],'quote_char' => $params['quoteChar'], 'comment_char' => $params['commentChar'], 'view_res' => $view_result, 'num_1' => $params['sel1'],'num_2' => $params['sel2']
                    ));
            } else {
                DB::table('ingestion_data')->insert([
                    'proj_id' => $inputs['project_id'], 'ing_id' => $ing_data->id, 'ext_name' => $ext_name, 'key' => $params['csvDataKey'], 'csv_file' => $params['csvFileName'], 'col_delimiter' => $params['colDelimiter'], 'row_delimiter' => $params['rowDelimiter'],'quote_char' => $params['quoteChar'], 'comment_char' => $params['commentChar'], 'view_res' => $view_result, 'num_1' => $params['sel1'],'num_2' => $params['sel2']
                ]);
            }
        }
        
        return Response::json(array('status'=> 'success', 'data'=> $params));
    }

    public function getIngestionData(){
        $inputs =  Input::all();

        $extIngData = DB::table('ingestion_data')
            ->where('proj_id', '=', $inputs['id'])
            ->where('ext_name', '=', $inputs['ext_name'])
            ->get(); 

        $data = compact('extIngData');

        return Response::json(array('status'=> 'success', 'data'=> $data));
    }

    public function getExeFlow(){
        $inputs =  Input::all();

        $getKpiMaps = DB::table('kpi_selection_info')
                        ->where('project_name', '=', $inputs['kpiKey'])
                        ->get();

        $totFlows = compact('getKpiMaps');

        if (count($getKpiMaps) > 0) {
            return Response::json(array('status'=> 'success', 'data'=> $totFlows));
        }else{
            return Response::json(array('status'=> 'fail'));
        }
    }

    public function getFlowForEdit(){
        $inputs = Input::all();

        $flowInfo = DB::table('kpi_selection_info')
                        ->where('id', '=', $inputs['flowId'])
                        ->get();
        
        if (count($flowInfo) > 0) {
            return Response::json(array('status'=> 'success', 'data'=> $flowInfo));
        }else{
            return Response::json(array('status'=> 'fail'));
        }
    }

    public function getDimensionValOfSubKpi(){
        $inputs =  Input::all();
        
        $getDimeValues = DB::table('kpi_selection_info')
                            ->where('project_name', '=', $inputs['viewType'])
                            ->where('kpi', '=', json_encode($inputs['kpiKey']))
                            ->where('sub_kpi', '=', $inputs['subKpi'])
                            ->get();

        if (count($getDimeValues) > 0) {
            return Response::json(array('status'=> 'success', 'data'=> $getDimeValues));
        }else{
            return Response::json(array('status'=> 'nodata'));
        }

    }

    public function setup_new_proj(){
        $fa = DB::table('ta_fa')->where('fa', '!=', '')->distinct('fa')->lists('fa');
        $ta = DB::table('ta_fa')->where('ta', '!=', '')->distinct('ta')->lists('ta');

        $data1 = array('ta', 'fa');
        return view('kpi_map_new', compact($data1));
    }


    public function save_proj_into_session(){
        $inputs = Input::all();
        Session::put('project_name', $inputs['value']);

        return Response::json(array('status'=> 'success', 'data'=> Session::get('project_name')));
    }

    public function saveMappingKpi(){
        $inputs =  Input::all();
        
        if ($inputs['viewId'] != 0) {
            // update query
            DB::table('kpi_selection_info')
                ->where('id', '=', $inputs['viewId'])
                ->update([
                    'kpi'=>json_encode($inputs['kpi_arr']),
                    'sub_kpi'=>json_encode($inputs['sub_kpi_arr']),
                    'dimension'=>json_encode($inputs['dim_arr'])
                ]);

        }else{
            // insert query
            DB::table('kpi_selection_info')->insert([
                'id'=> '',
                'project_name'=> $inputs['view_type'],
                'kpi'=> json_encode($inputs['kpi_arr']),
                'sub_kpi'=>json_encode($inputs['sub_kpi_arr']),
                'dimension'=>json_encode($inputs['dim_arr'])
            ]);

        }
        $getKpiMaps = DB::table('kpi_selection_info')
                    ->where('project_name', '=', $inputs['view_type'])
                    ->get();

        $totFlows = compact('getKpiMaps');

        if (count($getKpiMaps) > 0) {
            return Response::json(array('status'=> 'success', 'data'=> $totFlows));
        }else{
            return Response::json(array('status'=> 'fail'));
        }

    }

    public function getFlowForDelete(){
        $inputs = Input::all();

        DB::table('kpi_selection_info')
            ->where('id', '=', $inputs['flowId'])
            ->delete();

        $getKpiMaps = DB::table('kpi_selection_info')
                    ->where('project_name', '=', $inputs['view_type'])
                    ->get();

        $totFlows = compact('getKpiMaps');

        if (count($getKpiMaps) > 0) {
            return Response::json(array('status'=> 'success', 'data'=> $totFlows));
        }else{
            return Response::json(array('status'=> 'fail', 'data'=> 'Deleted Successfully...!', 'kpiKey'=> $inputs['view_type']));
        }
    }

    public function getMappingKpi(){
        $inputs = Input::all();

        $kpis_data = DB::table('kpi_selection_info')->where('project_name', '=', $inputs['kpiKey'])->get();

        if ($kpis_data == '') {
            $kpis_data = 'undifined';            
        }

        return Response::json(array('status'=> 'success', 'data'=> $kpis_data));
    }

    public function validate1(){
        $inputs =Input::all();
        $values = $inputs['checkbox'];

        // return $values;
        
        $final_array = array();
        $val = DB::table('validate')->whereIn('description', $values)->orderBy('val_result')->get();
        
        foreach ($val as $v) 
        {
          $v->description=str_replace(" ","_",$v->description);
        }
        
        $data1 = array('val');
        return view('validate', compact($data1));
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
