<?php

namespace App\Http\Controllers;

use App\Archivos;
use Illuminate\Http\Request;
use  DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Response;
use DateTime;
use Excel;
use App\DAMPLUSterreno;
use App\Imports\ArchivosImport;
use App\Imports;
use App\Archivospublic;
use Illuminate\Support\Facades\Input;
class ArchivosController extends Controller
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

        
        $descargar = DB::table('DAMPLUSarchivosterreno')->orderBy('id', 'DESC')->paginate(6);
        return view('archivos.index',compact('descargar'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpublic()
    {
        return view('archivospublic.create');
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
      
        //return back();
        
       
     
        $archivos = new Archivos;
        $archivos->image_path = request()->file->storeAs('uploads', request()->file->getClientOriginalName());///guardo la ruta del archivo en la base de datos

        request()->file->storeAs('uploads', request()->file->getClientOriginalName());///subo el archivo a mi carpeta de sistema

        $archivos->file_title = $request->file_title;
        $archivos->file_name = $request->file_name;
       
        
  
        $archivos->save();
        Excel::import(new ArchivosImport,request()->file('file'));

       /* $proceso = DB::connection('sqlsrv')->statement
        ("
        EXEC TERRENO;
        ");
*/
        

        return redirect()->route('archivos', $archivos->id)
        ->with('info', 'Archivo Guardada con Éxito');
    }
    



    
    public function descargar($id)
    {

                $archivos = Archivos::select('image_path')->where('id','=',$id)->get();
                foreach($archivos as $archivoss){
                $archivos=$archivoss->image_path;
                }
              
            return Storage::download("$archivos");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archivos  $archivos
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      
        $agente = $request->get('agente');
        $area = $request->get('area');
        $fecha = $request->get('fecha');
        $cliente=DAMPLUSterreno::orderBy('id', 'DESC')
        ->agente($agente)
        ->area($area)
        ->fecha($fecha)
        ->paginate(15);

 
      
  
        return view('archivos.show', compact('cliente'));
        //dd($archivos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archivos  $archivos
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivos $archivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archivos  $archivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivos $archivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archivos  $archivos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivos $archivos)
    {
        //
    }
}
