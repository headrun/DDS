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

     public function ingestion(){
        $inputs = Input::all();
        $values = array();
        $proj_name = $ta = $fa= '';
        if (isset($inputs['check_box']) && !empty($inputs['check_box']))
            $values = $inputs['check_box'];
        if (isset($inputs['proj_nam']) && !empty($inputs['proj_nam']))
            $proj_name = $inputs['proj_nam'];
        if (isset($inputs['ta']) && !empty($inputs['ta']))
            $ta = $inputs['ta'];
        if (isset($inputs['fa']) && !empty($inputs['fa']))
            $fa = $inputs['fa'];
        $final_array = array();
        foreach ($values as $key => $value) {
            $data = Ingestion::where('data', '=', $value)->groupBy('source')->get();
            $arr = array('data'=> $value, 'sources'=> $data);
            array_push($final_array, $arr);
        }
        DB::table('active_proj')->insert(
            ['proj_name' => $proj_name, 'ta' => $ta ,'fa' => $fa, 'date' => date('Y-m-d')]
            );
        $data1 = DB::table('active_proj')->get();
        //$data = array('final_array');
        $final_array1 = array();
        foreach ($data1 as $value) {
            array_push($final_array1,$value->proj_name);
        }
        //return $final_array1;
        $data1 = array('final_array1', 'final_array');
        return view('ingestion', compact($data1));
        
        

    }


    public function setup_new_proj(){
        $fa = DB::table('active_proj')->where('fa', '!=', '')->distinct('fa')->lists('fa');
        $ta = DB::table('active_proj')->where('ta', '!=', '')->distinct('ta')->lists('ta');

        $data1 = array('ta', 'fa');
        return view('setup_new_proj_new', compact($data1));
    }


    public function save_proj_into_session(){
        $inputs = Input::all();
        Session::put('project_name', $inputs['value']);
        return Response::json(array('status'=> 'success', 'data'=> Session::get('project_name')));
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
