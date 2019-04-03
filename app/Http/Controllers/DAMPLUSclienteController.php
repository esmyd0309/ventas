<?php

namespace App\Http\Controllers;

use App\DAMPLUScliente;
use App\Tipod;
use App\Region;
use App\Provincia;
use App\Canton;
use App\Parroquia;
use App\Sexo;
use App\Estadocivil;

use App\User;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use DB;

class DAMPLUSclienteController extends Controller
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
    public function index(Request $request )
    {   
        $nombres = $request->get('nombres');
        $cedula = $request->get('cedula');
        $DAMPLUSclientes=DAMPLUScliente::nombres($nombres)
        ->cedula($cedula)
        ->paginate(10);
     

        return view('DAMPLUScliente.index', compact('DAMPLUSclientes'));

    
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DAMPLUScliente  $DAMPLUScliente
     * @return \Illuminate\Http\Response
     */
    public function edit( $DAMPLUScliente)
    {
        
        $DAMPLUScliente = DAMPLUScliente::where('Identificacion',$DAMPLUScliente)->first();

        $campo9 = DAMPLUScliente::select('Campo9')->distinct()->get();
   
        return view('DAMPLUScliente.edit', compact('DAMPLUScliente','campo9'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DAMPLUScliente  $DAMPLUScliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $DAMPLUScliente)
    {
       
        $gestiontm=DAMPLUScliente::where('Identificacion',$DAMPLUScliente)
        ->update(['Campo9' =>  $request->Campo9]);
        return redirect()->back()
        ->with('info', 'Cliente Actualizado Correctamente');
               // 
    }


    public function show(DAMPLUScliente $DAMPLUScliente)
    {
        

       
        
    }
    
}
