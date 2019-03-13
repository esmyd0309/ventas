<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Recordatoriosemana;
use App\Campana;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Excel;
use App\Exports\RecordatoriosemanaExport;


class RecordatoriosemanaController extends Controller
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
    public function index(Request $request)
    {
        $agente = $request->get('agente');
        $recordatorio=Recordatoriosemana::orderBy('cedula', 'DESC')
        ->agente($agente)
        ->paginate(10);

    
        return view('recordatorio.semana', compact('recordatorio'));
    }

    public function export() 
    {
        
        $semana=Recordatoriosemana::all();
        return Excel::download(new RecordatoriosemanaExport, 'Recordatoriossemana.xlsx');


        /* Excel::download('Recordatorio', function($Recordatorio)  {//creamos el archivo
            $excel->sheet('Recordatorio',function($Recordatorio) {//hoja

                $sheet->fromArray($Recordatorio);
            });
        })->export('xls');*/

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
