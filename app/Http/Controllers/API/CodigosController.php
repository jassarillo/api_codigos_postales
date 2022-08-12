<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Codigos;
use Illuminate\Http\Request;

class CodigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($codigo)
    {
        
        $codigos_result = Codigos::where('d_codigo',$codigo)->get()->toArray();

        $array_data = array("zip_code" => $codigo, "locality" => $codigos_result[0]['d_ciudad'], "federal_entity" 
            => $codigos_result[0]);
            
        foreach ($codigos_result as $key => $value) {
            
            //$array_data =       $codigos_result[$key];
            //print_r($codigos_result[$key]);
        }

        //dd($codigos_result);  
        return $array_data;
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
