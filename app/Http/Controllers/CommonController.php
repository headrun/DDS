<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
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
