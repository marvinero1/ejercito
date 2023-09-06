<?php

namespace App\Http\Controllers;
use App\Postulante;
use App\Codigo;
use App\User;
use Throwable;
use Illuminate\Support\Facades\Hash;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostulanteExport;
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
        $descarga = 0;
        return view('postulantes.create', compact('descarga'));
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

       
        try {
            $codigo_id = $request->codigo_id;

            $request->validate([
                'primer_nombre' => 'required',
                'primer_apellido' => 'required',
                'email' => 'required',
            ]);
          
            Postulante::create([
                'primer_nombre' => $request->primer_nombre,
                'segundo_nombre' => $request->segundo_nombre,
                'primer_apellido' => $request->primer_apellido,
                'segundo_apellido' => $request->segundo_apellido,
                'email' => $request->email,
                'celular' => $request->celular,
                'ciudad' => $request->ciudad,
                'ci' => $request->ci,
                'whatsapp' => $request->whatsapp,
                'telefono' => $request->telefono,
                'boucher'=>$request->boucher,
            ]);
    
            User::create([
                'name' => $request->primer_nombre,
                'email' => $request->email,
                'role' => "usuario",
            ]);

            #aca es dodne actualiza su valor de no usado a utilizado
            $codigo_byId = Codigo::findOrFail($codigo_id);

            $codigo_byId->uso = 'utilizado';
            $codigo_byId->update(); 
            
            Session::flash('message','Formulario Llenado Exitosamente!');
                        
        } catch (Throwable $e) {
            // echo("error?");
            return view('postulantes.error',);
        }

        return self::download();

        // return view('postulantes.descarga');

        // $path = storage_path("/app/public/documents/prospecto/PDF_DE_PRUEBA_PROSPECTO.pdf");
        // return response()->download($path);
         
        // return view('postulantes.create', compact('descarga'));
    }

    public function download(){

        $path = storage_path("/app/public/documents/prospecto/PDF_DE_PRUEBA_PROSPECTO.pdf");

        return response()->download($path);
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

    public function getPostulantes(Request $request){
        $primer_nombre = $request->get('buscarpor');
        
        $postulantes = Postulante::where('primer_nombre','like',"%$primer_nombre%")->latest()->paginate('15');
        //dd($banco);
        return view('postulantes.index', compact('postulantes'));


    }

    public function getPostulantesExcel(){
      return Excel::download(new PostulanteExport, 'reporte_postulantes_EMSE.xlsx');
    }


    public function getUsuarios(Request $request){
        $primer_nombre = $request->get('buscarpor');
        
        $usuarios = User::where('name','like',"%$primer_nombre%")->latest()->get();
        //dd($banco);
        return view('usuarios.index', compact('usuarios'));
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
    public function destroy(cr $cr){
        $postulante = Postulante::find($id);
        $postulante->delete();

        Session::flash('message','Postulante Eliminado Exitosamente!');
        return redirect()->route('getPostulantes');
    }
}
