<?php

namespace App\Http\Controllers;

use App\Archivospublic;
use Illuminate\Http\Request;
use  DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Response;
use DateTime;
use Excel;
use Illuminate\Support\Facades\Input;
class ArchivospublicController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $descargar = Archivospublic::orderBy('id', 'DESC')->paginate(6);
      
        return view('archivospublic.index',compact('descargar'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
           
     
        $archivospublic = new Archivospublic;
        $archivospublic->image_path = request()->file->storeAs('uploads', request()->file->getClientOriginalName());///guardo la ruta del archivo en la base de datos

        request()->file->storeAs('uploads', request()->file->getClientOriginalName());///subo el archivo a mi carpeta de sistema

        $archivospublic->file_title = $request->file_title;
        $archivospublic->file_name = $request->file_name;
       
        
  
        $archivospublic->save();
     

        
        

        return redirect()->route('archivospublic', $archivospublic->id)
        ->with('info', 'Archivo Guardada con Éxito');
    }



    
    public function descargar($id)
    {

                $archivospublic = Archivospublic::select('image_path')->where('id','=',$id)->get();
                foreach($archivospublic as $archivospublics){
                $archivospublic=$archivospublics->image_path;
                }
              
            return Storage::download("$archivospublic");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archivospublic  $archivospublic
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivospublic $archivospublic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archivospublic  $archivospublic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivospublic $archivospublic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archivospublic  $archivospublic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivospublic $archivospublic)
    {
        //
    }
}
