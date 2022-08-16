<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Codigos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CodigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($codigo)
    {
   

        $header_code =  DB::table('codigos')
            ->selectRaw('c_estado as "key" , upper(d_estado) as name, c_CP as "code"')
            ->where('d_codigo',$codigo)
            ->groupByRaw('c_estado, d_estado, c_CP')
            ->get()->toArray();

           

        $codigos_result = Codigos::where('d_codigo',$codigo)->get()->toArray();
        
        //3.-
        $settlements =  DB::table('codigos')
            ->selectRaw('id_asenta_cpcons as "key" , upper(d_asenta) as "name",  upper(d_zona) as "zone_type", d_tipo_asenta as "type_name"')
            ->where('d_codigo',$codigo)
            ->get()->toArray();

        $add[]=array();
        foreach ($settlements as $key => $value) 
        {
                $add=array(
                    "name" => $settlements[$key]->type_name
                );
                $sett[] = array(
                            "key"   =>  $value->key * 1,
                            "name"  =>  $value->name,
                            "zone_type"  =>  $value->zone_type,
                            "settlement_type"  =>  $add,
                );     

        }


        $footer_municipality =  DB::table('codigos')
            ->selectRaw('c_mnpio as "key", upper(d_mnpio) as "name"')
            ->where('d_codigo',$codigo)
            ->groupByRaw('c_mnpio, d_mnpio')
            ->get()->toArray();

        foreach ($footer_municipality as $key => $value) 
        {
                
                $footer_array[] = array(
                            "key"   =>  $value->key * 1,
                            "name"  =>  $value->name
                           
                           
                );     

        }

        //dd($footer_array);
        
        $array_data = array(
                    "zip_code"          => $codigo, 
                    "locality"          => $codigos_result[0]['d_ciudad'], 
                    "federal_entity"    => $header_code[0],
                    "settlements"       => $sett,
                    "municipality"      => $footer_array[0]
                    );
            
        

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
