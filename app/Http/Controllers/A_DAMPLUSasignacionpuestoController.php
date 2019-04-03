<?php

namespace App\Http\Controllers;

use App\A_DAMPLUSasignacionpuesto;
use App\A_DAMPLUSasignacionpuestoarchivo;
use Illuminate\Http\Request;
use  DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Response;
use DateTime;
use Excel;
use App\DAMPLUSterreno;
use App\Imports\AsignacionpuestoImport;
use App\Imports;

use Illuminate\Support\Facades\Input;

class A_DAMPLUSasignacionpuestoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

         
        $descargar = A_DAMPLUSasignacionpuestoarchivo::orderBy('id', 'DESC')->paginate(6);
        return view('A_DAMPLUSasignacionpuesto.index',compact('descargar'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $grupos = DB::connection('asterisk')->select("SELECT * FROM vicidial_user_groups"); 
        return view('A_DAMPLUSasignacionpuesto.create',compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpublic()
    {
        return view('A_DAMPLUSasignacionpuestopublic.create');
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
       $ELINAR = DB::connection('asterisk')->statement
       ("
       TRUNCATE TABLE A_DAMPLUSasignacionpuesto
       
       ");

        $A_DAMPLUSasignacionpuesto = new A_DAMPLUSasignacionpuestoarchivo;
        $A_DAMPLUSasignacionpuesto->image_path = request()->file->storeAs('uploads/asignacion', request()->file->getClientOriginalName());///guardo la ruta del archivo en la base de datos

        request()->file->storeAs('uploads/asignacion', request()->file->getClientOriginalName());///subo el archivo a mi carpeta de sistema

        $A_DAMPLUSasignacionpuesto->file_title = $request->file_title;
        $A_DAMPLUSasignacionpuesto->grupo = $request->grupo;
        
       
        
  
        $A_DAMPLUSasignacionpuesto->save();
        Excel::import(new AsignacionpuestoImport,request()->file('file'));

        $SETIAR_POHENES = DB::connection('asterisk')->statement
        ("
        UPDATE phones SET login='LIBRE' where  login in (SELECT login FROM A_DAMPLUSasignacionpuesto WHERE login not in ('LIBRE')) ORDER BY login desc

        ");

        $ACTUALIZAR_EXTENSIONES = DB::connection('asterisk')->statement
        ("
        UPDATE phones AS b
            INNER JOIN A_DAMPLUSasignacionpuesto AS g ON b.extension = g.extension
            SET b.login = g.login,b.fullname=g.fullname
        ");

        $ACTUALIZAR_USUARIOS = DB::connection('asterisk')->statement
        ("
        UPDATE vicidial_users AS b
        INNER JOIN A_DAMPLUSasignacionpuesto AS g ON  b.user = g.login
        SET b.phone_login = g.extension,b.full_name=g.fullname
        ");

        return redirect()->route('asignacionpuesto', $A_DAMPLUSasignacionpuesto->id)
        ->with('info', 'Usuarios Actualizados con Éxito');
    }
    



    
    public function descargar($id)
    {

                $A_DAMPLUSasignacionpuesto = A_DAMPLUSasignacionpuestoarchivo::select('image_path')->where('id','=',$id)->get();
                foreach($A_DAMPLUSasignacionpuesto as $A_DAMPLUSasignacionpuestos){
                $A_DAMPLUSasignacionpuesto=$A_DAMPLUSasignacionpuestos->image_path;
                }
              
            return Storage::download("$A_DAMPLUSasignacionpuesto");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\A_DAMPLUSasignacionpuesto  $A_DAMPLUSasignacionpuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      
       
        $cliente=A_DAMPLUSasignacionpuesto::orderBy('login', 'ASC')
        ->paginate(15);
       
      
  
        return view('A_DAMPLUSasignacionpuesto.show', compact('cliente'));
        //dd($A_DAMPLUSasignacionpuesto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\A_DAMPLUSasignacionpuesto  $A_DAMPLUSasignacionpuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(A_DAMPLUSasignacionpuesto $A_DAMPLUSasignacionpuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\A_DAMPLUSasignacionpuesto  $A_DAMPLUSasignacionpuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, A_DAMPLUSasignacionpuesto $A_DAMPLUSasignacionpuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\A_DAMPLUSasignacionpuesto  $A_DAMPLUSasignacionpuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(A_DAMPLUSasignacionpuesto $A_DAMPLUSasignacionpuesto)
    {
        //
    }
}
