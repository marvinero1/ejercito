<?php

namespace App\Http\Controllers;

use App\Codigo;
use DB;
use Illuminate\Http\Request;
use Session;

class CodigosController extends Controller
{
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
    public function store(Request  $request){
        $codigo_id=0;
        $codigo = $request->get('codigo');
        // print($codigo);

        $codigo_obtenido = DB::table('codigos')
        ->where('codigo', '=', $codigo)
        ->where('uso', 'no_usado')
        ->get();

        $longitud=count($codigo_obtenido);

        //  echo($longitud);
       try{
            if($longitud > 0){
                $mesagge = 'Codigo Usado Por Primera Vez!';
                
                foreach($codigo_obtenido as $codigo_obtenidos){
                    $codigo_id= $codigo_obtenidos->id;
                }
            }else{
                $mesaggedanger = 'Codigo Inexistente!';

                Session::flash('messagedanger',$mesaggedanger);
                return view('postulantes.fecha');
            }

        } catch (\Throwable $th) {
            $mesaggedanger = 'Codigo Usado!';

            Session::flash('messagedanger',$mesaggedanger);
            return view('postulantes.fecha');
        } 

        Session::flash('message',$mesagge);
        return view('postulantes.fecha', compact('codigo_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(){
        
    }
        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}
