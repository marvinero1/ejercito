<?php

namespace App\Http\Controllers;
use Session;
use App\Postulante;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // middleware de login ACTIVARLO
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function formregister(Request $request){

        $request->validate([
            'primer_nombre' => 'required',
            'segundo_nombre' => 'nullable', 
            'primer_apellido' => 'nullable',
            'segundo_apellido' => 'nullable',
            'email' => 'required',
        ]);
        
        // if(request()->has('imagen')){
        //     $imagesUploaded = request()->file('imagen');
        //     $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
        //     $imagenpath = public_path('/images/titulos/');
        //     $imagesUploaded->move($imagenpath, $imageName);
        //     $imagen = '/images/titulos/' .$imageName;   
        // } 

        Postulante::create([
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'email' => $request->email,
            'celular' => $request->celular,
            'ciudad' => $request->ciudad,
            'whatsapp' => $request->whatsapp,
            'telefono' => $request->telefono,
        ]);

        Session::flash('message','Formulario Exitoso, revise la bandeja de entrada de su correo!');
        return view('layoutspage.app');   
    }

}
