<?php

namespace App\Http\Controllers;
use DateTime;
use App\DAMPLUSterreno;
use Illuminate\Http\Request;

class DAMPLUSterrenoController extends Controller
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

  
    public function upload()
    {
        return view('upload');
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
     * @param  \App\DAMPLUSterreno  $dAMPLUSterreno
     * @return \Illuminate\Http\Response
     */
    public function show(DAMPLUSterreno $dAMPLUSterreno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DAMPLUSterreno  $dAMPLUSterreno
     * @return \Illuminate\Http\Response
     */
    public function edit(DAMPLUSterreno $dAMPLUSterreno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DAMPLUSterreno  $dAMPLUSterreno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DAMPLUSterreno $dAMPLUSterreno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DAMPLUSterreno  $dAMPLUSterreno
     * @return \Illuminate\Http\Response
     */
    public function destroy(DAMPLUSterreno $dAMPLUSterreno)
    {
        //
    }

    public function import()
    {
        $path = public_path('pruebass.csv');
        
        $lineas = file($path);
        
        $utf8_lineas = array_map('utf8_encode',$lineas);

        $array =  array_map('str_getcsv',$utf8_lineas);
        //dd($array);
        $hoy = new DateTime();
//return $array; nooooo vanada de esto esto esta en archivos 
       
        $fecha= $hoy->format('d-m-y');
      
        for ($i=1; $i<sizeof($array); ++$i){
                $terreno = new DAMPLUSterreno();
                $terreno->idc = $array[$i][0];
            
                $terreno->fecha =  $fecha;
                $terreno->save();
        }
    }
}
