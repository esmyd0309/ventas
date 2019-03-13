<?php

namespace App\Http\Controllers;

use App\Logpredictivo;
use Illuminate\Http\Request;
use Datatables;
use Yajra\DataTables\Services\DataTable;
class LogpredictivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {   
       
        $telefono = $request->get('telefono');
        $cedula = $request->get('cedula');
        $status = $request->get('status');
        
       
        $logredictivos=Logpredictivo::orderBy('call_date', 'DESC')
        
        ->telefono($telefono)
        ->cedula($cedula)
        ->status($status)
      
        ->paginate(15);
     
        //dd($dependents);
        return view('logredictivo.index', compact('logredictivos'));

    
    
    }
}
