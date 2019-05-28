<?php

namespace App\Http\Controllers;

use App\Sac;
use Illuminate\Http\Request;
use App\DAMPLUScontactosWap;
use DB;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class SacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cedula = $request->get('cedula');
        $sac=DAMPLUScontactosWap::orderBy('dato3', 'DESC')
        ->cedula($cedula)
        ->paginate(5);

      ///  $count = User::where('votes', '>', 100)->count();
        $contactos=DAMPLUScontactosWap::distinct()->count();
        $contactoswap=DAMPLUScontactosWap::distinct()->where('numero', '<>', '')->count();
        $contactossms=DAMPLUScontactosWap::where('sms', '<>', null)->count();
        $contactosemail=DAMPLUScontactosWap::where('email', '<>', null)->count();
        $comunicacion=DAMPLUScontactosWap::where('dato3', '<>', null)->count();
        $comunicacionwap=DAMPLUScontactosWap::wherein('dato2', ['58','59','60','61'])->count();

        $contactoswapsac=DAMPLUScontactosWap::where('numero', '<>', '')->where('area', '=', 'SAC')->count();

        $comunicacionwapsac=DAMPLUScontactosWap::wherein('dato2', ['58','59','60','61'])->where('area', '=', 'SAC')->count();
       //dd( $comunicacionwapsac);

        return view('sac.index', compact('sac','contactos','contactossms','contactosemail','comunicacion','contactoswap','contactoswapsac','comunicacionwapsac'));
    }

    public function gestionesac()
    {
     
        return view('sac.inicio');

    }
 
    public function gestiones()
    {
        $hasta = new DateTime();
        
        $d = $hasta->format('d-m-Y');
      /*  $prcesar = DB::connection('sqlsrv')->statement
        ("
        truncate table DAMPLUSpendientes
        insert into DAMPLUSpendientes
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
        from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
        -- and a.FecRegistro >  convert(date,getdate())
        and a.IdRespuesta in ('64')
        order by id desc 

        delete  a from DAMPLUSpendientes as a , tbRegistroLlamada as b
            where a.id = cast(b.IdCampaña as nvarchar(10))+b.Identificacion and
            a.FecRegistro < b.FecRegistro and b.IdRespuesta in ('67')
       
        ");*/
        $prcesar = DB::connection('sqlsrv')->select
        ("
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
        from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
		and a.IdRespuesta in ('64')
		    and a.FecRegistro >  '$d'
        and not cast(a.IdCampaña as nvarchar(10))+a.Identificacion  in (
        select  cast(IdCampaña as nvarchar(10))+Identificacion from  tbRegistroLlamada 
            where 
           FecRegistro >  '$d' and IdRespuesta in ('67'))
       
        ");

         //$gestiones = DB::table('DAMPLUSpendientes')->orderBy('FecRegistro', 'DESC')->get();
      
   
        return response()->json($prcesar);
        //return view('sac.gestiones');
    }

    public function gestiones2()
    {
        $hasta = new DateTime();
        
        $d = $hasta->format('d-m-Y');

        $gestiones2 = DB::connection('sqlsrv')->select
        ("
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
        from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
		and a.IdRespuesta in ('70')
		    and a.FecRegistro >  '$d'
        and not cast(a.IdCampaña as nvarchar(10))+a.Identificacion  in (
        select  cast(IdCampaña as nvarchar(10))+Identificacion from  tbRegistroLlamada 
            where 
           FecRegistro >  '$d' and IdRespuesta in ('68','74')) --'67'
       
        ");

       /* $prcesar = DB::connection('sqlsrv')->select
        ("
        truncate table DAMPLUSpendientes2
        insert into DAMPLUSpendientes2
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
        from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
        -- and a.FecRegistro >  convert(date,getdate())
        and a.IdRespuesta in ('70')
        order by id desc 
        
        delete  a from DAMPLUSpendientes2 as a , tbRegistroLlamada as b
            where a.id = cast(b.IdCampaña as nvarchar(10))+b.Identificacion and
            a.FecRegistro < b.FecRegistro and b.IdRespuesta in ('68','74','67')
       
        ");

        $gestiones2 = DB::table('DAMPLUSpendientes2')->orderBy('FecRegistro', 'DESC')->get();
    */

        return response()->json($gestiones2);
        
       
    }

    public function gestiones3()
    {

        $hasta = new DateTime();
        
        $d = $hasta->format('d-m-Y');

        $gestiones3 = DB::connection('sqlsrv')->select
        ("
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
        from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
		and a.IdRespuesta in ('66')
		    and a.FecRegistro >  '$d'
        and not cast(a.IdCampaña as nvarchar(10))+a.Identificacion  in (
        select  cast(IdCampaña as nvarchar(10))+Identificacion from  tbRegistroLlamada 
            where 
           FecRegistro >  '$d' and IdRespuesta in ('14','24','68','69')) and b.UsuRegistro in ('MMERO','EJUNCO','MUBILLA')
       
        ");
       /* $prcesar = DB::connection('sqlsrv')->statement
        ("
        truncate table DAMPLUSpendientes3
        insert into DAMPLUSpendientes3
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
        from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
        -- and a.FecRegistro >  convert(date,getdate())
        and a.IdRespuesta in ('66')
        order by id desc 

        delete  a  from DAMPLUSpendientes3 as a , tbRegistroLlamada as b
            where a.id = cast(b.IdCampaña as nvarchar(10))+b.Identificacion and
            a.FecRegistro < b.FecRegistro and b.IdRespuesta in ('14','24','68','69') and b.UsuRegistro in ('MMERO','EJUNCO','MUBILLA')

        ");
        $gestiones3 = DB::table('DAMPLUSpendientes3')->orderBy('FecRegistro', 'DESC')->get();
    */
      
                return response()->json($gestiones3);
        
     
    }

    public function gestiones5()
    {

        $hasta = new DateTime();
        
        $d = $hasta->format('d-m-Y');

        $gestiones5 = DB::connection('sqlsrv')->select
        ("
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
        from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
		and a.IdRespuesta in ('75')
       
        and not cast(a.IdCampaña as nvarchar(10))+a.Identificacion  in (
        select  cast(IdCampaña as nvarchar(10))+Identificacion from  tbRegistroLlamada 
            where 
          IdRespuesta in ('76')) 
       
        ");
        /*$prcesar = DB::connection('sqlsrv')->statement
        ("
        truncate table DAMPLUSpendientes4
        insert into DAMPLUSpendientes4
        select cast(a.IdCampaña as nvarchar(10))+a.Identificacion as id,a.UsuRegistro,a.Identificacion,a.IdRespuesta,a.Comentario,a.TelefonoPersona,b.Nombres,c.IdValorDetalle,c.Descripcion,a.FecRegistro
          from tbRegistroLlamada a, tbCampañaPersona b,tbValorDetalle c 
        where a.Identificacion=b.Identificacion
        and a.IdRespuesta=c.IdValorDetalle 
        -- and a.FecRegistro >  convert(date,getdate())
        and a.IdRespuesta in ('75')
        order by id desc
        
        delete  a  from DAMPLUSpendientes4 as a , tbRegistroLlamada as b
            where a.id = cast(b.IdCampaña as nvarchar(10))+b.Identificacion and
            a.FecRegistro < b.FecRegistro and b.IdRespuesta in ('76') 
        ");
        $gestiones5 = DB::table('DAMPLUSpendientes4')->orderBy('FecRegistro', 'DESC')->get();
      */
      
             return response()->json($gestiones5);
          
    }


    public function agente()
    {
        /* truncate table DAMPLUSgestionessac
            insert into DAMPLUSgestionessac */
        $prcesar2 = DB::connection('sqlsrv')->select
        ("
            select COUNT(IdRespuesta)cantidad ,UsuRegistro,IdRespuesta,b.Descripcion
            from tbRegistroLlamada , tbValorDetalle b where  UsuRegistro in ('MMERO','EJUNCO','MUBILLA','CBUENDIA','AUDITORIA') and  FecRegistro >  convert(date,getdate()) and IdRespuesta=b.IdValorDetalle
            GROUP BY UsuRegistro ,IdRespuesta,b.Descripcion
        ");



         /* $prcesar2 = DB::table('DAMPLUSgestionessac')->paginate();*/
        
          return response()->json($prcesar2);
     
      
          
    }
  


    public function resul(Request $request)
    {
        $hasta = new DateTime();
        
        $d = $hasta->format('d-m-Y');

        $resul = DB::connection('sqlsrv')->select
        ("
        select COUNT(IdRespuesta)cantidad ,UsuRegistro
        from tbRegistroLlamada , tbValorDetalle b where  UsuRegistro in ('MMERO','EJUNCO','MUBILLA','CBUENDIA','AUDITORIA') and  FecRegistro > '$d' and IdRespuesta=b.IdValorDetalle
       GROUP BY UsuRegistro 
        ");

        //DD($resul);
        return response()->json($resul);

    }

    public function resuldetalle(Request $request)
    {
        $hasta = new DateTime();
        
        $d = $hasta->format('d-m-Y');

        $resuldetalle = DB::connection('sqlsrv')->select
        ("
        select COUNT(IdRespuesta)cantidad ,UsuRegistro,Descripcion
        from tbRegistroLlamada , tbValorDetalle b where  UsuRegistro in ('MMERO','EJUNCO','MUBILLA','CBUENDIA','AUDITORIA') and  FecRegistro > '$d' and IdRespuesta=b.IdValorDetalle
       GROUP BY UsuRegistro,Descripcion order by UsuRegistro desc
        ");

        //DD($resul);
        return response()->json($resuldetalle);

    }

    public function xxx()
    {
        
        $gestiones4 = DB::table('DAMPLUSpendientes4')->orderBy('FecRegistro', 'DESC')->paginate();
      


      return view('sac.inicio',compact('gestiones4'));
          
    }

    public function carteras(Request $request)
    {
        $hasta = new DateTime();
        
        $d = $hasta->format('d-m-Y');

        $carteras = DB::connection('sqlsrv')->select
        ("
        SELECT COUNT(GEST20) AS cantidad,GEST20 AS Descripcion FROM REPORT_CARTERA  
        GROUP BY GEST20 ORDER BY GEST20 desc
       
        ");
        return response()->json($carteras);

    }
    public function carterasindi()
    {
    return view('reportes.cobranza.carteras');
    }
    


}
