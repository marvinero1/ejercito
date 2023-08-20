<?php

namespace App\Http\Controllers;
use App\Postulante;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;

use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       // $nombre_usuario = $request->get('buscarpor'); 
        //    $postulantes = Postulante::all();
        
        // $users = DB::table('users')->with('roles')->;
        //return view('admin.users.index', ['users' => User::with('roles')->sortable(['email' => 'asc'])->paginate()]);
        //    return view('usuarios.index', compact('postulantes'));
        return view('postulantes.create');

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
    public function store(Request $request){
        $imagen = null;
        

        $request->validate([
            'primer_nombre' => 'required',
            'segundo_nombre' => 'nullable', 
            'primer_apellido' => 'nullable',
            'segundo_apellido' => 'nullable',
            'email' => 'required',
        ]);

        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();          
            $imagenpath = public_path('/images/bono/');          
            $imagesUploaded->move($imagenpath, $imageName);
            $imagen = '/images/bono/' .$imageName;
            }  

            $contra=rand(10,100000);
    
            Postulante::create([
                'primer_nombre' => $request->primer_nombre,
                'segundo_nombre' => $request->segundo_nombre,
                'primer_apellido' => $request->primer_apellido,
                'segundo_apellido' => $request->segundo_apellido,
                'email' => $request->email,
                'celular' => $request->celular,
                'ciudad' => $request->ciudad,
                'whatsapp' => $request->whatsapp,
                'fecha_nacimiento'=> $request->fecha_nacimiento,
                'telefono' => $request->telefono,
                'boucher'=>$request->$imagen,
                'code'=>$contra,
                'inicio_sesion'=>'null',
            ]);

            User::create([
                'name' => $request->primer_nombre,
                'email' => $request->email,
                'role' => "usuario",
                'password' => Hash::make($contra),
            ]);
        

        Session::flash('message','Formulario Exitoso!');
        return redirect('/login');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
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
