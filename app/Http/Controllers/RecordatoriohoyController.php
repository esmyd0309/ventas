<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Recordatoriohoy;
use App\Campana;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Excel;
use App\Exports\RecordatoriohoyExport;
use DB;
use DateTime;
class RecordatoriohoyController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agente = $request->get('agente');
        $recordatorio=Recordatoriohoy::orderBy('fecha', 'DESC')
        ->agente($agente)
        ->paginate(10);

  
        return view('Recordatorio.hoy', compact('recordatorio'));
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

        $dxx= $desde->format('d-m-y');
        $hxx= $hasta->format('d-m-y');

     $users = DB::connection('sqlsrv')->statement
     ("
  
     USE SII_COBRANZA;
  
            truncate  table  DAMPLUSexcelcompromisosmanana

            insert into DAMPLUSexcelcompromisosmanana

            SELECT Identificacion as cedula,TelefonoPersona as telefono,convert(date ,PromesaPago) as fecha,CAST (PromesaMontoPago AS DECIMAL(10,2)) as cuota,IdFormaPagoPromesa as tipopago,IdCampaña as campana_id,'','','','','','' 
            FROM tbRegistroLlamada where IdRespuesta in('14' , '26', '27', '29' ,'42','36') 
            and PromesaPago >= '$dxx'  
            and PromesaPago <= '$hxx'  
          
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.tipopagod = tf.Descripcion
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT IdValorDetalle,Descripcion
                FROM tbValorDetalle
                where IdValor=71
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.tipopago = tf.IdValorDetalle



            /*agregar telefono wthappp*/

            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.telefonowhat = tf.celular_whassap
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT Identificacion,celular_whassap
                FROM DAMPLUSwhatsapp
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.Identificacion 



            /*Agregar telefono de la tabla tbcampañaPersonatelefono cuando esten null*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.telefonowhat = tf.TelefonoPersona
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT Identificacion,TelefonoPersona
                FROM tbCampañaPersonaTelefono
                where SUBSTRING(TelefonoPersona,1,2)='09' or SUBSTRING(TelefonoPersona,1,2)='9' 
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.Identificacion and  DAMPLUSexcelcompromisosmanana.telefonowhat='' 


            /*Agregar telefono de la tabla tbdirecciones cuando esten null*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.telefonowhat = tf.Direccion
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT Identificacion,Direccion
                FROM tbCampañaPersonaDireccion
                where SUBSTRING(Direccion,1,2)='09' or SUBSTRING(Direccion,1,2)='9' 
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.Identificacion and  DAMPLUSexcelcompromisosmanana.telefonowhat='' 


            update DAMPLUSexcelcompromisosmanana set telefonowhat=Stuff(telefonowhat, 1, 1, '')  where SUBSTRING(telefonowhat,1,2)='09'--quitar el cero delante



            /*agregar productos*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.producto = tf.Descripcion
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT IdCampaña,Descripcion
                FROM tbCampaña
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.campana_id = tf.IdCampaña



            /*agregar nombres*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.nombres = tf.Nombres
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT Identificacion,Nombres
                FROM tbCampañaPersona
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.Identificacion


            /*agregar area*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.area = tf.AREA
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT identificacionc,AREA
                FROM PANTALLA_CUADRO
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.identificacionc

            /*RAZON*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.razon = tf.CARTERA
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT idc,CARTERA
                FROM clientec 
                
            ) AS tf
            ON cast(DAMPLUSexcelcompromisosmanana.campana_id as nvarchar(10))+cedula = tf.idc


            delete from DAMPLUSexcelcompromisosmanana where telefonowhat=''

            delete from DAMPLUSexcelcompromisosmanana where area like '%liquidado%'

            update DAMPLUSexcelcompromisosmanana set producto='RM' where producto LIKE '%RM%'


            update DAMPLUSexcelcompromisosmanana set producto='Etafashion' where producto LIKE '%ETA%'


            update DAMPLUSexcelcompromisosmanana set producto='Deprati' where producto LIKE '%DP%'


            /*sacar duplicados con gestiones reagendadas */
            truncate table  DAMPPLUSduplicadosRecordatorios
            insert into DAMPPLUSduplicadosRecordatorios
            SELECT cast(campana_id as nvarchar(10))+cedula as cedula,count(*) as cant FROM DAMPLUSexcelcompromisosmanana

            GROUP BY cast(campana_id as nvarchar(10))+cedula HAVING count(*) > 1

                

            delete FROM DAMPLUSexcelcompromisosmanana  --toda mi bandeja 
            WHERE 
                fecha not IN (SELECT MAX(FECHA) as fecha FROM DAMPLUSexcelcompromisosmanana) --todos los que tienen la ultima fecha 
                
                AND cast(campana_id as nvarchar(10))+cedula  in 
                (select cedula from DAMPPLUSduplicadosRecordatorios)-- todos los duplicados --348
                and  cast(campana_id as nvarchar(10))+cedula in (select cedula from DAMPPLUSduplicadosRecordatorios)  
                


            truncate table   DAMPLUSexcelcompromisosmanana1

            insert into DAMPLUSexcelcompromisosmanana1
            select distinct cast(campana_id as nvarchar(10))+cedula AS ID, *  from DAMPLUSexcelcompromisosmanana

            delete from DAMPLUSexcelcompromisosmanana1 where cuota=0

            delete from DAMPLUSexcelcompromisosmanana1 where ID in ( select idc from clientec where  not p12019 is null and not IdAgentec like '%LIQUIDADO%' )

           -- update DAMPLUSexcelcompromisosmanana1 set telefonowhat=Stuff(telefonowhat, 10, 6, '')  where   telefonowhat like '%/%'
            
           delete from  DAMPLUSexcelcompromisosmanana  where   telefonowhat like '%/%'
           ");

     $date = new DateTime(); 
        $recordatorio=Recordatoriohoy::all();
        return Excel::download(new RecordatoriohoyExport,  'Recordatorios  ' . $ds.' Al  ' .$hs .'.xlsx');
      /* Excel::download('Recordatorio', function($Recordatorio)  {//creamos el archivo
            $excel->sheet('Recordatorio',function($Recordatorio) {//hoja

                $sheet->fromArray($Recordatorio);
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
