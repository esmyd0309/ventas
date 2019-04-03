<?php

namespace App\Http\Controllers;

use App\DAMPLUScontactosWaperror;
use Illuminate\Http\Request;
use DB;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class DAMPLUScontactosWaperrorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $numero = $request->get('numero');
        $cedula = $request->get('cedula');
        $cliente=DAMPLUScontactosWaperror::orderBy('id', 'DESC')
      
        ->numero($numero)
        ->cedula($cedula)
        ->paginate(15);

 
      
  
        return view('contacto.error', compact('cliente'));
      
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $nombres = $request->get('nombres');
        $numero = $request->get('numero');
        $cedula = $request->get('cedula');
        $cliente=DAMPLUScontactosWaperror::orderBy('id', 'DESC')
        ->nombres($nombres)
        ->numero($numero)
        ->cedula($cedula)
        ->paginate(5);

        return view('contacto.error', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createagc(Request $request)
    {

        $nombres = $request->get('nombres');
        $numero = $request->get('numero');
        $cedula = $request->get('cedula');
        $cliente=DAMPLUScontactosWaperror::orderBy('id', 'DESC')
        ->nombres($nombres)
        ->numero($numero)
        ->cedula($cedula)
        ->paginate(5);

        return view('contacto.createagc', compact('cliente'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $v = \Validator::make($request->all(), [
            
            'cedula' => 'required|digits:10|numeric',
            'nombres' => 'required|string',
            //'numero'    => 'required|size:13',
            
        ]);

     


        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
 
        $contacto = new DAMPLUScontactosWaperror;
        $contacto->cedula           =   $request->cedula; 
        $contacto->nombres          =   $request->nombres; 
        $contacto->numero           =   $request->numero; 
        $contacto->sms              =   $request->sms; 
        $contacto->email            =   $request->email; 

    

        $contacto->save();

        return redirect()->route('incumplidos')
        ->with('info', 'Contacto Guardado Correctamente');
    }


    public function agc(Request $request)
    {
        
      
        $v = \Validator::make($request->all(), [
            
            'cedula' => 'required|digits:10|numeric',
            'nombres' => 'required|string',
            //'numero'    => 'required|size:13',
            
        ]);
 

      
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
      
        

        $contacto = new DAMPLUScontactosWaperror;
        $contacto->cedula           =   $request->cedula; 
        $contacto->nombres          =   $request->nombres; 
        $contacto->numero           =   $request->numero; 
        $contacto->sms              =   $request->sms; 
        $contacto->email            =   $request->email; 

      
            $contacto->save();
            return redirect()->back()
            ->with('info', 'Contacto Guardado Correctamente');
            
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\DAMPLUScontactosWaperror  $dAMPLUScontactosWaperror
     * @return \Illuminate\Http\Response
     */
    public function show(DAMPLUScontactosWaperror $dAMPLUScontactosWaperror)
    {
        

       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DAMPLUScontactosWaperror  $dAMPLUScontactosWaperror
     * @return \Illuminate\Http\Response
     */
    public function edit(DAMPLUScontactosWaperror $dAMPLUScontactosWaperror)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DAMPLUScontactosWaperror  $dAMPLUScontactosWaperror
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DAMPLUScontactosWaperror $dAMPLUScontactosWaperror)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DAMPLUScontactosWaperror  $dAMPLUScontactosWaperror
     * @return \Illuminate\Http\Response
     */
    public function destroy(DAMPLUScontactosWaperror $dAMPLUScontactosWaperror)
    {
        //
    }
}
