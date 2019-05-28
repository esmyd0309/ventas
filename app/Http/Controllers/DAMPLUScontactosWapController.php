<?php

namespace App\Http\Controllers;

use App\DAMPLUScontactosWap;
use Illuminate\Http\Request;
use DB;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class DAMPLUScontactosWapController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $nombres = $request->get('nombres');
        $numero = $request->get('numero');
        $cedula = $request->get('cedula');
        $cliente=DAMPLUScontactosWap::orderBy('id', 'DESC')
        ->nombres($nombres)
        ->numero($numero)
        ->cedula($cedula)
        ->paginate(15);

 
      
  
        return view('contacto.create', compact('cliente'));
      
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
        $cliente=DAMPLUScontactosWap::orderBy('id', 'DESC')
        ->nombres($nombres)
        ->numero($numero)
        ->cedula($cedula)
        ->paginate(5);

        return view('contacto.create', compact('cliente'));
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
        $cliente=DAMPLUScontactosWap::orderBy('id', 'DESC')
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
 
        $contacto = new DAMPLUScontactosWap;
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
      
        
        $date = new DateTime(); 
        $d= $date->format('Y-m-d H:i:s');
        $contacto = new DAMPLUScontactosWap;
        $contacto->cedula           =   $request->cedula; 
        $contacto->nombres          =   $request->nombres; 
        $contacto->numero           =   $request->numero; 
        $contacto->sms              =   $request->sms; 
        $contacto->email            =   $request->email; 
        $contacto->created_at            =   $d; 
        $contacto->updated_at            =   $d; 
            $contacto->save();
            return redirect()->back()
            ->with('info', 'Contacto Guardado Correctamente');
            
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\DAMPLUScontactosWap  $dAMPLUScontactosWap
     * @return \Illuminate\Http\Response
     */
    public function show(DAMPLUScontactosWap $dAMPLUScontactosWap)
    {
        

       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DAMPLUScontactosWap  $dAMPLUScontactosWap
     * @return \Illuminate\Http\Response
     */
    public function edit( $dAMPLUScontactosWap)
    {
        
        $dAMPLUScontactosWap=DAMPLUScontactosWap::where('id',$dAMPLUScontactosWap)->first();
        //dd($dAMPLUScontactosWap);
        return view('contacto.edit', compact('dAMPLUScontactosWap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DAMPLUScontactosWap  $dAMPLUScontactosWap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
       // dd($dAMPLUScontactosWap);
       $date = new DateTime(); 
       $d= $date->format('Y-m-d H:i:s');
        $user = DAMPLUScontactosWap::where('id',$id)->update(['numero' => $request->input('numero')]);
        $usexr = DAMPLUScontactosWap::where('id',$id)->update(['updated_at' => $d]);
      
      
        return redirect()->back()
            ->with('info', 'Actualizado  con  Éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DAMPLUScontactosWap  $dAMPLUScontactosWap
     * @return \Illuminate\Http\Response
     */
    public function destroy(DAMPLUScontactosWap $dAMPLUScontactosWap)
    {
        //
    }
}
