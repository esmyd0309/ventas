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
//dd($request);
        $d= $desde->format('Y-m-d H:i:s');
        $h= $hasta->format('Y-m-d H:i:s');
        $ds= $desde->format('Y-m-d');
        $hs= $hasta->format('Y-m-d');

        $dxx= $desde->format('d-m-y');
        $hxx= $hasta->format('d-m-y');

     $users = DB::connection('sqlsrv')->statement
     ("
  
     USE SII_COBRANZA;
  
     truncate    table  DAMPLUSexcelcompromisosmanana
     insert into DAMPLUSexcelcompromisosmanana
  SELECT Identificacionc as cedula,'' as telefono, CONVERT(DATE,COMPROMISO_CUMPLIR)  as fecha,CAST (VALORPROMESA AS DECIMAL(10,2)) as cuota,'' as tipopago,IDC as campana_id,AREA,Nombres,producto,CARTERA,'' AS tipopagod,''
     FROM REPORT_CARTERA 
         where     GEST20='COMPROMISO' 
                   --  AND COMPROMISO_CUMPLIR LIKE 'ABR 16%'
                   --  OR COMPROMISO_CUMPLIR LIKE 'ABR 14%'
                   --  OR COMPROMISO_CUMPLIR LIKE 'ABR 15%'
                 and CONVERT (datetime, COMPROMISO_CUMPLIR, 103) >= '$dxx'  
                  and CONVERT (datetime, COMPROMISO_CUMPLIR, 103) <= '$hxx' 

                 delete from DAMPLUSexcelcompromisosmanana where cedula in (SELECT Identificacion FROM tbRegistroLlamada where IdRespuesta  in ('62','63') and FecRegistro > convert(date,getdate()))
                
                 UPDATE DAMPLUSexcelcompromisosmanana
                 SET DAMPLUSexcelcompromisosmanana.tipopago = tf.IdFormaPagoPromesa
                 FROM DAMPLUSexcelcompromisosmanana
                 INNER JOIN (
                     SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                     FROM tbRegistroLlamada WHERE IdRespuesta IN ('14') and IdFormaPagoPromesa!=''
                 ) AS tf
                 ON DAMPLUSexcelcompromisosmanana.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion 

				  UPDATE DAMPLUSexcelcompromisosmanana
                 SET DAMPLUSexcelcompromisosmanana.tipopago = tf.IdFormaPagoPromesa
                 FROM DAMPLUSexcelcompromisosmanana
                 INNER JOIN (
                     SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                     FROM tbRegistroLlamada WHERE IdRespuesta IN ('26') and IdFormaPagoPromesa!=''
                 ) AS tf
                 ON DAMPLUSexcelcompromisosmanana.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''

				  UPDATE DAMPLUSexcelcompromisosmanana
                 SET DAMPLUSexcelcompromisosmanana.tipopago = tf.IdFormaPagoPromesa
                 FROM DAMPLUSexcelcompromisosmanana
                 INNER JOIN (
                     SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                     FROM tbRegistroLlamada WHERE IdRespuesta IN ('27')and IdFormaPagoPromesa!=''
                 ) AS tf
                 ON DAMPLUSexcelcompromisosmanana.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''

				 	  UPDATE DAMPLUSexcelcompromisosmanana
                 SET DAMPLUSexcelcompromisosmanana.tipopago = tf.IdFormaPagoPromesa
                 FROM DAMPLUSexcelcompromisosmanana
                 INNER JOIN (
                     SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                     FROM tbRegistroLlamada WHERE IdRespuesta IN ('29') and IdFormaPagoPromesa!=''
                 ) AS tf
                 ON DAMPLUSexcelcompromisosmanana.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''



				 	  UPDATE DAMPLUSexcelcompromisosmanana
                 SET DAMPLUSexcelcompromisosmanana.tipopago = tf.IdFormaPagoPromesa
                 FROM DAMPLUSexcelcompromisosmanana
                 INNER JOIN (
                     SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                     FROM tbRegistroLlamada WHERE IdRespuesta IN ('42') and IdFormaPagoPromesa!=''
                 ) AS tf
                 ON DAMPLUSexcelcompromisosmanana.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''

				 	 	  UPDATE DAMPLUSexcelcompromisosmanana
                 SET DAMPLUSexcelcompromisosmanana.tipopago = tf.IdFormaPagoPromesa
                 FROM DAMPLUSexcelcompromisosmanana
                 INNER JOIN (
                     SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                     FROM tbRegistroLlamada WHERE IdRespuesta IN ('16') and IdFormaPagoPromesa!=''
                 ) AS tf
                 ON DAMPLUSexcelcompromisosmanana.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''


                  UPDATE DAMPLUSexcelcompromisosmanana
                 SET DAMPLUSexcelcompromisosmanana.tipopagod = tf.Descripcion
                 FROM DAMPLUSexcelcompromisosmanana
                 INNER JOIN (
                     SELECT IdValorDetalle,Descripcion
                     FROM tbValorDetalle
                     where IdValor=71
                     
                 ) AS tf
                 ON DAMPLUSexcelcompromisosmanana.tipopago = tf.IdValorDetalle




                 TRUNCATE TABLE DAMPLUScontactosWapreportes
                 INSERT INTO DAMPLUScontactosWapreportes
                 SELECT cedula,Stuff(numero, 1, 4, '') AS numero
                      FROM DAMPLUScontactosWap where SUBSTRING(numero,1,4)='+593' 
                     AND numero IS NOT NULL	ORDER BY numero DESC
     
                 update DAMPLUScontactosWapreportes set  numero=Stuff(numero, 1, 0, '0') 
                      FROM DAMPLUScontactosWapreportes where SUBSTRING(numero,1,1)='9' AND numero!='999999999' and numero !='000000000'
                         

            /*Agregar telefono de la tabla REPORT_CARTERA cuando esten null*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.telefonowhat = tf.TLF_COMPROMISO
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT Identificacionc,TLF_COMPROMISO
                FROM REPORT_CARTERA
                where SUBSTRING(TLF_COMPROMISO,1,2)='09' or SUBSTRING(TLF_COMPROMISO,1,2)='9'
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.Identificacionc 

            /*agregar telefono wthappp*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.telefonowhat = tf.numero
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT cedula,numero
                FROM DAMPLUScontactosWap   where SUBSTRING(numero,1,2)='09' or SUBSTRING(numero,1,2)='9'
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.cedula and  DAMPLUSexcelcompromisosmanana.telefonowhat='' 

            /*Agregar telefono de la tabla predictivo cuando esten null*/
            UPDATE DAMPLUSexcelcompromisosmanana
            SET DAMPLUSexcelcompromisosmanana.telefonowhat = tf.telefono
            FROM DAMPLUSexcelcompromisosmanana
            INNER JOIN (
                SELECT cedula,telefono
                FROM telf_predictivo
                where SUBSTRING(telefono,1,2)='09' or SUBSTRING(telefono,1,2)='9'
                
            ) AS tf
            ON DAMPLUSexcelcompromisosmanana.cedula = tf.cedula and  DAMPLUSexcelcompromisosmanana.telefonowhat='' 



           
       


          
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
           delete from DAMPLUSexcelcompromisosmanana where cuota=0
           
           delete from  DAMPLUSexcelcompromisosmanana  where   telefonowhat like '%/%'
      
           delete from DAMPLUSexcelcompromisosmanana where telefonowhat=''

           
         

          

           update DAMPLUSexcelcompromisosmanana set telefonowhat=Stuff(telefonowhat, 1, 1, '')  where SUBSTRING(telefonowhat,1,2)='09'
           UPDATE DAMPLUSexcelcompromisosmanana set  telefonowhat=Stuff(telefonowhat, 10, 10, '')  where  len(telefonowhat) > 9
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
