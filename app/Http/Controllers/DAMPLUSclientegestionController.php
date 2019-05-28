<?php

namespace App\Http\Controllers;

use App\DAMPLUSclientegestion;
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

class DAMPLUSclientegestionController extends Controller
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
        $DAMPLUSclientegestions=DAMPLUSclientegestion::nombres($nombres)
        ->cedula($cedula)
        ->paginate(10);
     

        return view('DAMPLUSclientegestion.index', compact('DAMPLUSclientegestions'));

    
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DAMPLUSclientegestion  $DAMPLUSclientegestion
     * @return \Illuminate\Http\Response
     */
    public function edit( $DAMPLUSclientegestion)
    {
        
        $DAMPLUSclientegestion = DAMPLUSclientegestion::where('Identificacion',$DAMPLUSclientegestion)->first();

        $campo9 = DAMPLUSclientegestion::select('Campo9')->distinct()->get();
   
        return view('DAMPLUSclientegestion.edit', compact('DAMPLUSclientegestion','campo9'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DAMPLUSclientegestion  $DAMPLUSclientegestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $DAMPLUSclientegestion)
    {
       
        $gestiontm=DAMPLUSclientegestion::where('Identificacion',$DAMPLUSclientegestion)
        ->update(['Campo9' =>  $request->Campo9]);
        return redirect()->back()
        ->with('info', 'Cliente Actualizado Correctamente');
               // 
    }


    public function show( $DAMPLUSclientegestion)
    {
        
       // $datos = DAMPLUSclientegestion::where('Identificacion',$DAMPLUSclientegestion)->get();

       //$gestiones = DB::table('tbRegistroLlamada')->where('Identificacion', $DAMPLUSclientegestion) ->orderBy('FecRegistro','desc')->get();


       /**consulto los datos del cliente */
       $cliente = DB::table('tbCampañaPersona')
       ->join('tbCampaña', 'tbCampañaPersona.IdCampaña', '=', 'tbCampaña.IdCampaña')
       ->select('tbCampañaPersona.*', 'tbCampaña.*')->where('tbCampañaPersona.Identificacion', $DAMPLUSclientegestion)
       ->get();
       
       /**consultar las tablas de gestion en el sii */
       $gestiones = DB::table('tbRegistroLlamada')
       ->join('tbValorDetalle', 'tbRegistroLlamada.IdRespuesta', '=', 'tbValorDetalle.IdValorDetalle')
       ->select('tbRegistroLlamada.*', 'tbValorDetalle.*')->where('tbRegistroLlamada.Identificacion', $DAMPLUSclientegestion)
       ->get();
       
       /**gestiones del predictivo */
       
       $gestiopre = DB::connection('asterisk')->select("SELECT * FROM vicidial_list where first_name=$DAMPLUSclientegestion order by entry_date desc"); 
      
      
       // dd($gestiopre);
  
        return view('DAMPLUSclientegestion.show', compact('cliente','gestiones','gestiopre'));

       
        
    }
    
}
