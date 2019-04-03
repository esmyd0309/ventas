<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Excel;
use DB;
use DateTime;
use App\Exports\IncumplidoExport;



class ProcesosController extends Controller
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
       
        return view('prcesos.index');
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
