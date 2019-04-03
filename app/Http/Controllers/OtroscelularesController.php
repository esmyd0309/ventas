<?php

namespace App\Http\Controllers;

use App\Otroscelulares;
use Illuminate\Http\Request;
use Datatables;
use Yajra\DataTables\Services\DataTable;

class OtroscelularesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {   
       
        $nombre = $request->get('nombre');
        $cedula = $request->get('cedula');
        $otroscelulares=Otroscelulares::orderBy('identificacion', 'DESC')
        ->nombre($nombre)
        ->cedula($cedula)
        ->paginate(15);
     
       // dd($Otroscelularess);
        return view('Otroscelulares.index', compact('otroscelulares'));

    
    
    }

}
