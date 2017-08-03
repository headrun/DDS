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
        if (isset($inputs['check_box']) && !empty($inputs['check_box']))
            Session::put('values', $inputs['check_box']);
            
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
            
        //return $final_array1;
        $data1 = array('final_array1', 'final_array');
        return view('ingestion', compact($data1));
        
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
                    'sub_kpi'=>$inputs['sub_kpi'],
                    'dimension'=>json_encode($inputs['dim_arr'])
                ]);

        }else{
            // insert query
            DB::table('kpi_selection_info')->insert([
                'id'=> '',
                'project_name'=> $inputs['view_type'],
                'kpi'=> json_encode($inputs['kpi_arr']),
                'sub_kpi'=>$inputs['sub_kpi'],
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
