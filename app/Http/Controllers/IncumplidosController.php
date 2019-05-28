<?php

namespace App\Http\Controllers;
use App\Incumplido;
use App\Campana;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Excel;
use DB;
use DateTime;
use App\Exports\IncumplidoExport;



class IncumplidosController extends Controller
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
       
        $incumplido=Incumplido::orderBy('cedula', 'DESC')
  
        ->paginate(15);

        $campana=Campana::all();
      
  
        return view('incumplido.index', compact('incumplido'));
    }

    public function export(Request $request) 
    {
        $desde =  $request->fechadesde;
        $hasta =  $request->fechahasta;
        $desde = new DateTime($desde);
        $hasta = new DateTime($hasta);

        $d= $desde->format('Y-m-d H:i:s');
        $h= $hasta->format('Y-m-d H:i:s');
        $ds= $desde->format('d-m-y');
        $hs= $hasta->format('d-m-y');

        $dxx= $desde->format('d-m-y');
        $hxx= $hasta->format('d-m-y');
       
        $users = DB::connection('sqlsrv')->statement
        ("
     
        USE SII_COBRANZA;
     
        truncate  table  DAMPLUSreporteincumplido
        insert into DAMPLUSreporteincumplido
        SELECT Identificacionc as cedula,'' as telefono,  CONVERT(DATE,COMPROMISO_CUMPLIR) as fecha  ,CAST (VALORPROMESA AS DECIMAL(10,2)) as cuota,'' as tipopago,idc as campana_id,'' as tipopagod,AREA,Nombres,'' as telefonowhat,producto,CARTERA as razon
                FROM REPORT_CARTERA 
				where     GEST20='INCUMPLIDO' 
            and   COMPROMISO_CUMPLIR >= '$dxx'  
            and   COMPROMISO_CUMPLIR <= '$hxx'

			

            UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.tipopago = tf.IdFormaPagoPromesa
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                FROM tbRegistroLlamada WHERE IdRespuesta IN ('14') and IdFormaPagoPromesa!=''
            ) AS tf
            ON DAMPLUSreporteincumplido.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion 

             UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.tipopago = tf.IdFormaPagoPromesa
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                FROM tbRegistroLlamada WHERE IdRespuesta IN ('26') and IdFormaPagoPromesa!=''
            ) AS tf
            ON DAMPLUSreporteincumplido.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''

             UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.tipopago = tf.IdFormaPagoPromesa
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                FROM tbRegistroLlamada WHERE IdRespuesta IN ('27')and IdFormaPagoPromesa!=''
            ) AS tf
            ON DAMPLUSreporteincumplido.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''

                  UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.tipopago = tf.IdFormaPagoPromesa
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                FROM tbRegistroLlamada WHERE IdRespuesta IN ('29') and IdFormaPagoPromesa!=''
            ) AS tf
            ON DAMPLUSreporteincumplido.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''



             UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.tipopago = tf.IdFormaPagoPromesa
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                FROM tbRegistroLlamada WHERE IdRespuesta IN ('42') and IdFormaPagoPromesa!=''
            ) AS tf
            ON DAMPLUSreporteincumplido.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''

            UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.tipopago = tf.IdFormaPagoPromesa
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT IdCampaña,Identificacion,IdFormaPagoPromesa
                FROM tbRegistroLlamada WHERE IdRespuesta IN ('16') and IdFormaPagoPromesa!=''
            ) AS tf
            ON DAMPLUSreporteincumplido.campana_id   = cast(tf.IdCampaña as nvarchar(10))+Identificacion AND tipopago=''


             UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.tipopagod = tf.Descripcion
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT IdValorDetalle,Descripcion
                FROM tbValorDetalle
                where IdValor=71
                
            ) AS tf
            ON DAMPLUSreporteincumplido.tipopago = tf.IdValorDetalle

            
            UPDATE DAMPLUSreporteincumplido
            SET DAMPLUSreporteincumplido.telefonowhat = tf.TLF_COMPROMISO
            FROM DAMPLUSreporteincumplido
            INNER JOIN (
                SELECT Identificacionc,TLF_COMPROMISO
                FROM REPORT_CARTERA
                where SUBSTRING(TLF_COMPROMISO,1,2)='09' or SUBSTRING(TLF_COMPROMISO,1,2)='9'
                
            ) AS tf
            ON DAMPLUSreporteincumplido.cedula = tf.Identificacionc 




            TRUNCATE TABLE DAMPLUScontactosWapreportes
            INSERT INTO DAMPLUScontactosWapreportes
            SELECT cedula,Stuff(numero, 1, 4, '') AS numero
                 FROM DAMPLUScontactosWap where SUBSTRING(numero,1,4)='+593' 
                AND numero IS NOT NULL	ORDER BY numero DESC

            update DAMPLUScontactosWapreportes set  numero=Stuff(numero, 1, 0, '0') 
                 FROM DAMPLUScontactosWapreportes where SUBSTRING(numero,1,1)='9' AND numero!='999999999' and numero !='000000000'
                    


       /*agregar telefono wthappp*/
       UPDATE DAMPLUSreporteincumplido
       SET DAMPLUSreporteincumplido.telefonowhat = tf.numero
       FROM DAMPLUSreporteincumplido
       INNER JOIN (
           SELECT cedula,numero
           FROM DAMPLUScontactosWap   where SUBSTRING(numero,1,2)='09' or SUBSTRING(numero,1,2)='9'
       ) AS tf
       ON DAMPLUSreporteincumplido.cedula = tf.cedula and  DAMPLUSreporteincumplido.telefonowhat='' 


        
          update DAMPLUSreporteincumplido set producto='RM' where producto LIKE '%RM%'


          update DAMPLUSreporteincumplido set producto='Etafashion' where producto LIKE '%ETA%'


          update DAMPLUSreporteincumplido set producto='Deprati' where producto LIKE '%DP%'


         

          delete from DAMPLUSreporteincumplido where cuota=0

          
         delete from  DAMPLUSreporteincumplido  where   telefonowhat like '%/%'
        
         delete from DAMPLUSreporteincumplido where telefonowhat=''

         UPDATE DAMPLUSreporteincumplido
         SET DAMPLUSreporteincumplido.telefonowhat = tf.telefono
         FROM DAMPLUSreporteincumplido
         INNER JOIN (
             SELECT cedula,telefono
             FROM telf_predictivo
             where SUBSTRING(telefono,1,2)='09' or SUBSTRING(telefono,1,2)='9'
             
         ) AS tf
         ON DAMPLUSreporteincumplido.cedula = tf.cedula and  DAMPLUSreporteincumplido.telefonowhat='' 

         
         update DAMPLUSreporteincumplido set telefonowhat=Stuff(telefonowhat, 1, 1, '')  where SUBSTRING(telefonowhat,1,2)='09'
        
         UPDATE DAMPLUSreporteincumplido set  telefonowhat=Stuff(telefonowhat, 10, 10, '')  where  len(telefonowhat) > 9

			
              ");
     $date = new DateTime(); 
    
        
        $incumplido=Incumplido::all();

        return Excel::download(new IncumplidoExport, 'Incumplidos  ' . $ds.' Al  ' .$hs .'.xlsx');
      /* Excel::download('Incumplido', function($incumplido)  {//creamos el archivo
            $excel->sheet('Incumplido',function($incumplido) {//hoja

                $sheet->fromArray($incumplido);
            });
       })->export('xls');*/

    }

    public function pagovero()
    {
    $pagos = DB::connection('sqlsrv')->statement
    ("
    use sii_cobranza
    drop table pago_cobranza
    drop table pago_cobranza_2018
    
    select x.* into pago_cobranza
    from (
    select IdCampañap , Descripcion ,  identificacionp ,'                                                                      ' nombrep , '                                                                      ' areap   ,'                                     ' usup , idcampañapersonapagop  , Valorp , formapago , numerodocumento ,fecha_pago ,borigen ,bdestino , nots , 'SI' Conf_caja ,  nots_recaud ,  fecha_dep , fecha_vist , fecha_recaud , Fecedicionp  from pagoc , tbCampaña
    where IdCampañap = IdCampaña 
    union 
    select IdCampañap , Descripcion ,  identificacionp ,'                                                                      ' nombrep , '                                                                      ' areap   ,'                                     ' usup , idcampañapersonapagop ,  Valorp , formapago , numerodocumento ,fecha_pago ,borigen ,bdestino , nots , 'NO' Conf_caja ,  nots_recaud ,  fecha_dep , fecha_vist , fecha_recaud , Fecedicionp from pagocpendiente , tbCampaña
    where IdCampañap = IdCampaña
    union
    select IdCampañap , Descripcion ,  identificacionp ,'                                                                      ' nombrep , '                                                                      ' areap   ,'                                     ' usup , idcampañapersonapagop  , Valorp , formapago , numerodocumento ,fecha_pago ,borigen ,bdestino , nots , 'NN' Conf_caja ,  nots_recaud ,  fecha_dep , fecha_vist , fecha_recaud , Fecedicionp from pagocanulado , tbCampaña
    where IdCampañap = IdCampaña 
    ) x
    
    update pago_cobranza
    set nombrep = nombres , areap = area , usup = idagentec  from clientec where cast(idcampañap as nvarchar(10))+Identificacionp = idc
    
    update pago_cobranza
    set nombrep = nombres , areap = area , usup = idagentec  from clientec where cast(idcampañap as nvarchar(10))+Identificacionp = idc
    select  * into pago_cobranza_2018    from pago_cobranza where fecedicionp > '01-01-2017'
    
    ");

    $pagos2 = DB::connection('sqlsrv')->statement
    ("
    use sii_cobranza
    drop table pago_cobranza
    drop table pago_cobranza_2018
    
    select x.* into pago_cobranza
    from (
    select IdCampañap , Descripcion ,  identificacionp ,'                                                                      ' nombrep , '                                                                      ' areap   ,'                                     ' usup , idcampañapersonapagop  , Valorp , formapago , numerodocumento ,fecha_pago ,borigen ,bdestino , nots , 'SI' Conf_caja ,  nots_recaud ,  fecha_dep , fecha_vist , fecha_recaud , Fecedicionp  from pagoc , tbCampaña
    where IdCampañap = IdCampaña 
    union 
    select IdCampañap , Descripcion ,  identificacionp ,'                                                                      ' nombrep , '                                                                      ' areap   ,'                                     ' usup , idcampañapersonapagop ,  Valorp , formapago , numerodocumento ,fecha_pago ,borigen ,bdestino , nots , 'NO' Conf_caja ,  nots_recaud ,  fecha_dep , fecha_vist , fecha_recaud , Fecedicionp from pagocpendiente , tbCampaña
    where IdCampañap = IdCampaña
    union
    select IdCampañap , Descripcion ,  identificacionp ,'                                                                      ' nombrep , '                                                                      ' areap   ,'                                     ' usup , idcampañapersonapagop  , Valorp , formapago , numerodocumento ,fecha_pago ,borigen ,bdestino , nots , 'NN' Conf_caja ,  nots_recaud ,  fecha_dep , fecha_vist , fecha_recaud , Fecedicionp from pagocanulado , tbCampaña
    where IdCampañap = IdCampaña 
    ) x
    
    update pago_cobranza
    set nombrep = nombres , areap = area , usup = idagentec  from clientec where cast(idcampañap as nvarchar(10))+Identificacionp = idc
    
    update pago_cobranza
    set nombrep = nombres , areap = area , usup = idagentec  from clientec where cast(idcampañap as nvarchar(10))+Identificacionp = idc
    select  * into pago_cobranza_2018    from pago_cobranza where fecedicionp > '01-01-2017'
    
    ");

    return redirect()->back()
     ->with('info', ' Este proceso se Ejecuto con  Éxito');
//dd($pagos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        return view('incumplido.inicio');
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
