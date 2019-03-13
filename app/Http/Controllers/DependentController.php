<?php

namespace App\Http\Controllers;

use App\Dependent;
use Illuminate\Http\Request;
use Datatables;
use Yajra\DataTables\Services\DataTable;
class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {   
       
        $nombreempresa = $request->get('nombreempresa');
        $cedula = $request->get('cedula');
        $cargo = $request->get('cargo');
        
       
        $dependents=Dependent::orderBy('id', 'DESC')
        
        ->nombreempresa($nombreempresa)
        ->cedula($cedula)
        ->cargo($cargo)
      
        ->paginate(15);
     
        //dd($dependents);
        return view('dependent.index', compact('dependents'));

    
    
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request )
    { 
       
        $dependents=Dependent::orderBy('id', 'DESC')  ->paginate(3000);
        
        
        //dd($dependents);
        return view('dependent.data', compact('dependents'));

    
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function show(Dependent $dependent)
    {
        //

        return view('dependent.show', compact('dependent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependent $dependent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependent $dependent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dependent  $dependent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependent $dependent)
    {
        //
    }
}
