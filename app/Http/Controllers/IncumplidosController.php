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

     $users = DB::connection('sqlsrv')->statement
     ("
     truncate table  DAMPLUSexcelincumplidos
     INSERT INTO DAMPLUSexcelincumplidos
     select Identificacionc,'',convert(date ,COMPROMISO_CUMPLIR) as fecha,CAST (VALORPROMESA AS DECIMAL(10,2)),'','','', AREA, Nombres,'',PRODUCTO, '','','' from REPORT_CARTERA where AREA in ('SAC') AND GEST20 IN ('INCUMPLIDO')
     and convert(date ,COMPROMISO_CUMPLIR) >= TRY_PARSE('$ds' as date using 'es-ES') 
     and convert(date ,COMPROMISO_CUMPLIR) <= TRY_PARSE('$hs' as date using 'es-ES') 
     
                                       
          UPDATE DAMPLUSexcelincumplidos
          SET DAMPLUSexcelincumplidos.telefonowhat = tf.celular_whassap
          FROM DAMPLUSexcelincumplidos
          INNER JOIN (
              SELECT Identificacion,celular_whassap
               FROM DAMPLUSwhatsapp
          ) AS tf
          ON DAMPLUSexcelincumplidos.cedula = tf.Identificacion 
          
          UPDATE DAMPLUSexcelincumplidos
          SET DAMPLUSexcelincumplidos.telefonowhat = tf.CEL1
          FROM DAMPLUSexcelincumplidos
          INNER JOIN (
              SELECT CEDULA,CEL1
               FROM datoscobranza
               where SUBSTRING(CEL1,1,2)='09' or SUBSTRING(CEL1,1,1)='9' 
              
          ) AS tf
          ON DAMPLUSexcelincumplidos.cedula = tf.CEDULA and  DAMPLUSexcelincumplidos.telefonowhat='' 
          /*
         UPDATE DAMPLUSexcelincumplidos
          SET DAMPLUSexcelincumplidos.telefonowhat = tf.tlf1
          FROM DAMPLUSexcelincumplidos
          INNER JOIN (
              SELECT CEDULA,tlf1
               FROM datoscobranza
               where SUBSTRING(tlf1,1,2) in ('02','04','05','03','07','08')
              
          ) AS tf
          ON DAMPLUSexcelincumplidos.cedula = tf.CEDULA and  DAMPLUSexcelincumplidos.telefonowhat='' 
          */
      
          UPDATE DAMPLUSexcelincumplidos
          SET DAMPLUSexcelincumplidos.telefonowhat = tf.TelefonoPersona
          FROM DAMPLUSexcelincumplidos
          INNER JOIN (
              SELECT Identificacion,TelefonoPersona
               FROM tbCampañaPersonaTelefono
               where SUBSTRING(TelefonoPersona,1,2)='09' or SUBSTRING(TelefonoPersona,1,2)='9'  AND IdRespuesta in ('58',
                                                                                                                 '59',
                                                                                                                 '60',
                                                                                                                 '61',
                                                                                                                 '40',
                                                                                                                 '39',
                                                                                                                 '24',
                                                                                                                 '16',
                                                                                                                 '14',
                                                                                                                 '15') 
              
          ) AS tf
          ON DAMPLUSexcelincumplidos.cedula = tf.Identificacion and  DAMPLUSexcelincumplidos.telefonowhat='' 
     
     
     
     
          UPDATE DAMPLUSexcelincumplidos
          SET DAMPLUSexcelincumplidos.telefonowhat = tf.Direccion
          FROM DAMPLUSexcelincumplidos
          INNER JOIN (
              SELECT Identificacion,Direccion
               FROM tbCampañaPersonaDireccion
               where SUBSTRING(Direccion,1,2)='09' or SUBSTRING(Direccion,1,2)='9' 
              
          ) AS tf
          ON DAMPLUSexcelincumplidos.cedula = tf.Identificacion and  DAMPLUSexcelincumplidos.telefonowhat='' 
         
          
           update DAMPLUSexcelincumplidos set telefonowhat=Stuff(telefonowhat, 1, 1, '')  where SUBSTRING(telefonowhat,1,2)='09'--quitar el cero delante
     
     
            update DAMPLUSexcelincumplidos set producto='RM' where producto LIKE '%RM%'
         
          
          update DAMPLUSexcelincumplidos set producto='Etafashion' where producto LIKE '%ETA%'
         
     
          update DAMPLUSexcelincumplidos set producto='Deprati' where producto LIKE '%DP%'
     
              delete from  DAMPLUSexcelincumplidos  where   telefonowhat like '%/%'
             DELETE from DAMPLUSexcelincumplidos where telefonowhat=''



     /*
     
     USE SII_COBRANZA;
     
     truncate  table  DAMPLUSexcelincumplidos
     insert into DAMPLUSexcelincumplidos
     SELECT Identificacion as cedula,TelefonoPersona as telefono,convert(date ,PromesaPago) as fecha,CAST (PromesaMontoPago AS DECIMAL(10,2)) as cuota,IdFormaPagoPromesa as tipopago,IdCampaña as campana_id,'','','','','' -- into DAMPLUSexcelincumplidos 
     FROM tbRegistroLlamada 
     WHERE  
                        
     PromesaPago > '01-02-2019' 
     and PromesaPago < '04-02-2019'  
     and IdRespuesta in ('14','26','27','29','42') 
     and  not cast(IdCampaña as nvarchar(10))+Identificacion in (
     SELECT cast(IdCampaña as nvarchar(10))+Identificacion 
     FROM tbRegistroLlamada where IdRespuesta in('14' , '26', '27', '29' ,'42','36','24','39','40','52','57')
     and PromesaPago > convert(date,getdate()))
    
    
    
     /* SELECT Identificacion as cedula,TelefonoPersona as telefono,convert(date ,PromesaPago) as fecha,CAST (PromesaMontoPago AS DECIMAL(10,2)) as cuota,IdFormaPagoPromesa as tipopago,IdCampaña as campana_id,'','','','','' -- into DAMPLUSexcelincumplidos 
     FROM tbRegistroLlamada 
     WHERE  
            
                 PromesaPago > TRY_PARSE('$ds' as date using 'es-ES') 
             and PromesaPago < TRY_PARSE('$hs' as date using 'es-ES')   
             and IdRespuesta in ('14','26','27','29','42')
             and  not Identificacion in (
             SELECT Identificacion 
             FROM tbRegistroLlamada where IdRespuesta in('14' , '26', '27', '29' ,'42','36')
             and PromesaPago > convert(date,getdate()) )*/




     delete FROM DAMPLUSexcelincumplidos where cast(campana_id as nvarchar(10))+cedula in (
     select cast(IdCampaña as nvarchar(10))+Identificacion from tbCampañaPersonaPago where FecRegistro > (select FechaCierre from tbPeriodoCarga where Cerrado = '0') 
     )
 
     
  delete FROM DAMPLUSexcelincumplidos where cast(campana_id as nvarchar(10))+cedula in 
     (select 
     cast(IdCampaña as nvarchar(10))+Identificacion from tbRegistroLlamada where IdRespuesta in ('14','26','27','29','42') and  PromesaPago > convert(date,getdate())
     )
    
     
     
     
   
    UPDATE DAMPLUSexcelincumplidos
    SET DAMPLUSexcelincumplidos.tipopagod = tf.Descripcion
    FROM DAMPLUSexcelincumplidos
    INNER JOIN (
         SELECT IdValorDetalle,Descripcion
          FROM tbValorDetalle
          where IdValor=71
         
     ) AS tf
     ON DAMPLUSexcelincumplidos.tipopago = tf.IdValorDetalle
     
    
     
   
     
     UPDATE DAMPLUSexcelincumplidos
     SET DAMPLUSexcelincumplidos.telefonowhat = tf.celular_whassap
     FROM DAMPLUSexcelincumplidos
     INNER JOIN (
         SELECT Identificacion,celular_whassap
          FROM DAMPLUSwhatsapp
     ) AS tf
     ON DAMPLUSexcelincumplidos.cedula = tf.Identificacion 
     

     UPDATE DAMPLUSexcelincumplidos
     SET DAMPLUSexcelincumplidos.telefonowhat = tf.TelefonoPersona
     FROM DAMPLUSexcelincumplidos
     INNER JOIN (
         SELECT Identificacion,TelefonoPersona
          FROM tbCampañaPersonaTelefono
          where SUBSTRING(TelefonoPersona,1,2)='09' or SUBSTRING(TelefonoPersona,1,2)='9' 
         
     ) AS tf
     ON DAMPLUSexcelincumplidos.cedula = tf.Identificacion and  DAMPLUSexcelincumplidos.telefonowhat='' 

     UPDATE DAMPLUSexcelincumplidos
     SET DAMPLUSexcelincumplidos.telefonowhat = tf.Direccion
     FROM DAMPLUSexcelincumplidos
     INNER JOIN (
         SELECT Identificacion,Direccion
          FROM tbCampañaPersonaDireccion
          where SUBSTRING(Direccion,1,2)='09' or SUBSTRING(Direccion,1,2)='9' 
         
     ) AS tf
     ON DAMPLUSexcelincumplidos.cedula = tf.Identificacion and  DAMPLUSexcelincumplidos.telefonowhat='' 
    
     
      update DAMPLUSexcelincumplidos set telefonowhat=Stuff(telefonowhat, 1, 1, '')  where SUBSTRING(telefonowhat,1,2)='09'--quitar el cero delante
     

     UPDATE DAMPLUSexcelincumplidos
     SET DAMPLUSexcelincumplidos.producto = tf.Descripcion
     FROM DAMPLUSexcelincumplidos
     INNER JOIN (
         SELECT IdCampaña,Descripcion
         FROM tbCampaña
         
     ) AS tf
     ON DAMPLUSexcelincumplidos.campana_id = tf.IdCampaña
     
    

     UPDATE DAMPLUSexcelincumplidos
     SET DAMPLUSexcelincumplidos.nombres = tf.Nombres
     FROM DAMPLUSexcelincumplidos
     INNER JOIN (
         SELECT Identificacion,Nombres
         FROM tbCampañaPersona
         
     ) AS tf
     ON DAMPLUSexcelincumplidos.cedula = tf.Identificacion
    

     UPDATE DAMPLUSexcelincumplidos
     SET DAMPLUSexcelincumplidos.area = tf.AREA
     FROM DAMPLUSexcelincumplidos
     INNER JOIN (
         SELECT identificacionc,AREA
         FROM PANTALLA_CUADRO
         
     ) AS tf
     ON DAMPLUSexcelincumplidos.cedula = tf.identificacionc
    
     
     delete from DAMPLUSexcelincumplidos where telefonowhat=''
    
     delete from DAMPLUSexcelincumplidos where area like '%LIQUIDADO%'
    
     delete from DAMPLUSexcelincumplidos where area like '%ESCUELA%'
        delete from DAMPLUSexcelincumplidos where area like '%AUDITORIA%'
           delete from DAMPLUSexcelincumplidos where area like '%OTRO%'
    
     update DAMPLUSexcelincumplidos set producto='RM' where producto LIKE '%RM%'
    
     
     update DAMPLUSexcelincumplidos set producto='Etafashion' where producto LIKE '%ETA%'
    
     
     update DAMPLUSexcelincumplidos set producto='Deprati' where producto LIKE '%DP%'
    
     
   
     truncate table  DAMPPLUSduplicadosIncumplidos
     insert into DAMPPLUSduplicadosIncumplidos
     SELECT cast(campana_id as nvarchar(10))+cedula as cedula,count(*) as cant FROM DAMPLUSexcelincumplidos
     
     GROUP BY cast(campana_id as nvarchar(10))+cedula HAVING count(*) > 1
     
            
     
     delete FROM DAMPLUSexcelincumplidos  --toda mi bandeja 
     WHERE 
         fecha not IN (SELECT MAX(FECHA) as fecha FROM DAMPLUSexcelincumplidos) 
         AND cast(campana_id as nvarchar(10))+cedula  in 
         (select cedula from DAMPPLUSduplicadosIncumplidos) 
         
    
         
      /*delete from DAMPLUSexcelincumplidos where cuota=0
      delete from  DAMPLUSexcelincumplidos  where   telefonowhat like '%/%'

   */
   delete from DAMPLUSexcelincumplidos where cast(campana_id as nvarchar(10))+cedula in 
   (select idc from clientec where   p12019 is not null )
   SELECT * FROM DAMPLUSexcelincumplidos WHERE AREA IN ('CARTERA NUEVA')

  delete from DAMPLUSexcelincumplidos where cast(campana_id as nvarchar(10))+cedula in 
      (select idc from clientec where caso20 IN ('LIQUIDADO','SIN_PAGOS') ) 

  delete from DAMPLUSexcelincumplidos where cast(campana_id as nvarchar(10))+cedula in 
   (select idc from clientec where gest20 IN ('LIQUIDADO','COMPROMISO','recaudacion','Recaudacion anulado')

   ) 

   delete  from DAMPLUSexcelincumplidos where cast(campana_id as nvarchar(10))+cedula in 
   (select idc from clientec where  AREA IN ('LIQUIDADO','SEPARADO','CARTERA NUEVA')
   ) 


 

         DELETE  from DAMPLUSexcelincumplidos where cast(campana_id as nvarchar(10))+cedula in (select idc from clientec where  IdAgentec like '%LIQUIDADO%')
       */  
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
