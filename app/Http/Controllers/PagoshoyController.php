<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;
use App\Pagoshoy;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Excel;
use App\Exports\PagoshoyExport;
use DB;
use DateTime;


class PagoshoyController extends Controller
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
        $pagoshoy=Pagoshoy::orderBy('fecha', 'DESC')
        ->agente($agente)
        ->paginate(10);

   
      
  
        return view('pagoshoy.index', compact('pagoshoy'));
    }


   

    public function export(Request $request) 
    {
        

           $desde =  $request->fechadesde;
           $hasta =  $request->fechahasta;
           $desde = new DateTime($desde);
           $hasta = new DateTime($hasta);

           $d= $desde->format('Y-m-d H:i:s');
           $h= $hasta->format('Y-m-d H:i:s');
           $ds= $desde->format('Y-m-d');
           $hs= $hasta->format('Y-m-d');

        $users = DB::connection('sqlsrv')->statement
        ("
        SET ANSI_NULLS ON; 
        SET ANSI_WARNINGS ON;
        USE SII_COBRANZA;
        truncate  table  DAMPLUSexcelpagoshoy
           

            insert into  DAMPLUSexcelpagoshoy
            select a.IdCampañaPersonaPago as id,a.Identificacion as cedula,a.IdCampaña as campana_id, a.UsuEdicion as usuarioedita,convert(date ,d.fecha_pago) as fecha,CAST (a.valor AS DECIMAL(10,2)) as cuota,a.Notas as comentario, a.UsuConfirmacion as comfirmacion,a.FecConfirmacion as fechaconfirma,'','','','','',''
            from tbcampañapersonapago a,PAGOC d where a.IdCampañaPersonaPago=d.IdCampañaPersonaPagop 
            and d.fecha_pago > TRY_PARSE ('$d' as datetime using 'es-ES')  
            and d.fecha_pago < TRY_PARSE ('$h' as datetime using 'es-ES')
            and a.UsuConfirmacion is not null 
            and not UsuConfirmacion is null 
            and not Notas like  'Pagos Masivos:%'
            and not UsuRegistro like '%LIQUIDADO%'
            order by fecha desc 
            
            

            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.tipopagod = tf.IdFormaPago
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT IdCampañaPersonaPago,IdFormaPago
                FROM tbCampañaPersonaPagoDetalle
            ) AS tf
            ON DAMPLUSexcelpagoshoy.id = tf.IdCampañaPersonaPago 



           

            /*agregar eñ tìpo de pago DETALLE*/
            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.tipopago = tf.Descripcion
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT IdValorDetalle,Descripcion
                FROM tbValorDetalle
                where IdValor=71
                
            ) AS tf
            ON DAMPLUSexcelpagoshoy.tipopagod = tf.IdValorDetalle




           

            /*agregar telefono wthappp*/

            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.telefonowhat = tf.celular_whassap
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT Identificacion,celular_whassap
                FROM DAMPLUSwhatsapp
            ) AS tf
            ON DAMPLUSexcelpagoshoy.cedula = tf.Identificacion 

           

            /*Agregar telefono de la tabla tbcampañaPersonatelefono cuando esten null*/
            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.telefonowhat = tf.TelefonoPersona
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT Identificacion,TelefonoPersona
                FROM tbCampañaPersonaTelefono
                where SUBSTRING(TelefonoPersona,1,2)='09' or SUBSTRING(TelefonoPersona,1,2)='9' 
                
            ) AS tf
            ON DAMPLUSexcelpagoshoy.cedula = tf.Identificacion and  DAMPLUSexcelpagoshoy.telefonowhat='' 
           

            /*Agregar telefono de la tabla tbdirecciones cuando esten null*/
            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.telefonowhat = tf.Direccion
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT Identificacion,Direccion
                FROM tbCampañaPersonaDireccion
                where SUBSTRING(Direccion,1,2)='09' or SUBSTRING(Direccion,1,2)='9' 
                
            ) AS tf
            ON DAMPLUSexcelpagoshoy.cedula = tf.Identificacion and  DAMPLUSexcelpagoshoy.telefonowhat='' 
           

            update DAMPLUSexcelpagoshoy set telefonowhat=Stuff(telefonowhat, 1, 1, '')  where SUBSTRING(telefonowhat,1,2)='09'--quitar el cero delante

            

            /*agregar productos*/
            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.producto = tf.Descripcion
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT IdCampaña,Descripcion
                FROM tbCampaña
                
            ) AS tf
            ON DAMPLUSexcelpagoshoy.campana_id = tf.IdCampaña

           

            /*agregar nombres*/
            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.nombres = tf.Nombres
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT Identificacion,Nombres
                FROM tbCampañaPersona
                
            ) AS tf
            ON DAMPLUSexcelpagoshoy.cedula = tf.Identificacion
           

            /*agregar area*/
            UPDATE DAMPLUSexcelpagoshoy
            SET DAMPLUSexcelpagoshoy.area = tf.AREA
            FROM DAMPLUSexcelpagoshoy
            INNER JOIN (
                SELECT identificacionc,AREA
                FROM PANTALLA_CUADRO
                
            ) AS tf
            ON DAMPLUSexcelpagoshoy.cedula = tf.identificacionc

           
            update DAMPLUSexcelpagoshoy set producto='RM' where producto LIKE '%RM%'
           

            update DAMPLUSexcelpagoshoy set producto='Etafashion' where producto LIKE '%ETA%'
           

            update DAMPLUSexcelpagoshoy set producto='Deprati' where producto LIKE '%DP%'
           
         
            
            delete from  DAMPLUSexcelpagoshoy  where   telefonowhat like '%/%'
 
        
        ");
        $date = new DateTime(); 
        $hoy= $date->format('Y-m-d');
     $si = $request->status;

    
      if($si){

      /**
         * Eliminar registros enviados. 
         */
        $eliminar = DB::connection('sqlsrv')->statement
        ("
        SET ANSI_NULLS ON; 
        SET ANSI_WARNINGS ON;
        USE SII_COBRANZA;
     
           delete from DAMPLUSexcelpagoshoy where id in (
               select pagos_id from DAMPLUSenvios 
                    
       )
           
           ");


        /**
         * almacenamos la informacion en la tabla de envios
         */
        $almacenar = DB::connection('sqlsrv')->statement
        ("
            SET ANSI_NULLS ON; 
            SET ANSI_WARNINGS ON;
            USE SII_COBRANZA;

            INSERT INTO DAMPLUSenvios 
            select cedula,nombres,producto,fecha,'','','','','si','$hoy','',id,campana_id, campana_id+cedula,fechaconfirma  from DAMPLUSexcelpagoshoy 
            where not id in (select pagos_id from DAMPLUSenvios)
        ");


  

        /**
         * Actualizo los registros que existen en mi tabla de envio con la fecha nueva. 
         */
        $actualizarExistentes = DB::connection('sqlsrv')->statement
        ("
        SET ANSI_NULLS ON; 
        SET ANSI_WARNINGS ON;
        USE SII_COBRANZA;
        
        update DAMPLUSenvios set fecha_pagos='$hoy' where pagos_id in (
            select id from DAMPLUSexcelpagoshoy ) and fecha_pagos > TRY_PARSE ('$h' as datetime using 'es-ES')
            
           
           ");


     
  

           //dd($eliminar);

    }
        $pagoshoy=Pagoshoy::all();
        return Excel::download(new PagoshoyExport,   'Pagos  ' . $ds.' Al  ' .$hs .'.xlsx');
      
      /* Excel::download('Incumplido', function($incumplido)  {//creamos el archivo
            $excel->sheet('Incumplido',function($incumplido) {//hoja

                $sheet->fromArray($incumplido);
            });
       })->export('xls');*/
    
   
  



       
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagoshoy.create');
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
