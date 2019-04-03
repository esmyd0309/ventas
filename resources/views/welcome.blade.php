@extends('layouts.app')

@section('content')
<style>
p {
  text-shadow: 3px 3px 5px #f00,
               6px 6px 5px #0f0,
               9px 9px 5px #00f;
}

</style>
<div class="container">
<div class="col-md-8">
<a class="navbar-brand" href="{{ url('https://www.google.com.mx/chrome/?brand=CHBD&gclid=EAIaIQobChMIitDhke-R4QIVB1SGCh3bdwAXEAAYASAAEgI9kPD_BwE&gclsrc=aw.ds') }}"> <img src="http://192.168.1.107/ventas/public/img/Google_Chrome.png" width="30" height="30" class="rounded-pill" title="Se recomienda Usar Chrome  para un mejor rendimientos de las aplicaciones"><b style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Se recomienda Usar Chrome</b></a>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header bg-success" >Aplicaciones Internas </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('agente') }}"> <img src="http://192.168.1.107/ventas/public/img/telefono.png" width="70" height="70" class="rounded-pill" title="Agregar telefonos: Aplicacion que permite el ingreso de nuevos contactos de clientes 'contactables', y la busqueda de los mismos. Tiene conexión con el 192.168.1.206 BD (SII_COBRANZA) TABLAS (DAMPLUScontactosWap)"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Agregar Telefonos</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('sac') }}"> <img src="http://192.168.1.107/ventas/public/img/contactos.png" width="70" height="70" class="rounded-pill" title="DETALLE DE TELEFONOS: Aplicacion que permite visualizar la cantidad de contactos ingresados por los agentes, y la busqueda detallada de los clientes, y si tienen comunicacion o no. segun la gestines ingresadas. Tiene conexión con el 192.168.1.206 BD (SII_COBRANZA) TABLAS (DAMPLUScontactosWap, TB_REGISTROSLLAMADAS)"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Detalle Telefonos</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('dependents') }}"> <img src="http://192.168.1.107/ventas/public/img/iess.png" width="70" height="70" class="rounded-pill" title="Datos IESS: Aplicacion que permite consultar datos de clientes y algunas referencias de contactos. Tiene conexión con el 192.168.1.7 BD (PREDICTIVO) TABLA (DAMPLUSdependents)"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Datos del Iess</p>
                        </div>
                        <div class="col-sm">
                        <a class="navbar-brand" href="{{ route('logredictivos') }}"> <img src="http://192.168.1.107/ventas/public/img/log.png" width="70" height="70" class="rounded-pill" title="HISTORIAL DE LLAMADAS: Aplicacion para la busqueda de posible contactos, de gestiones realizadas del Predictivo. Tiene conexión con el 192.168.1.7 BD (Predictivo) TABLAS (BD_RESUMEN_MANUAL_ULTIMO)"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Historial LLamadas</p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('clientess') }}"> <img src="http://192.168.1.107/ventas/public/img/cartera.png" width="70" height="70" class="rounded-pill" title="CARTERA: Aplicacion que permite actualizar información de la cartera de Mediana y Davila. Tiene conexión con el 192.168.1.206 BD (SII_COBRANZA) TABLAS (DAMPLUSclientes)"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">COBRANZA</p>
                        </div>
                        <div class="col-sm">
                             <a class="navbar-brand" href="{{ url('http://192.168.1.107/referidos/public/referidos') }}"> <img src="http://192.168.1.107/ventas/public/img/red.png" width="70" height="70" class="rounded-pill" title="REFERIDOS: Aplicacion para ingresar clientes de Ventas, los cuales no se muentran a la hora de la consulta del SII_CALLCENTER. El mismo tiene conexion con el 192.168.1.203 para ingresar los  referidos, y con el 192.168.1.7, para consultar datos de clientes de la BD (Predictivo) - TABLAS (bd_actualizacion, bd_actualizacionDP)"></a> <p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">VENTAS</p>
                        </div>
                        <div class="col-sm">
                        <a class="navbar-brand" href="{{ url('http://192.168.1.107/auditoria/public/')  }}"> <img src="http://192.168.1.107/ventas/public/img/auditoria.png" width="70" height="70" class="rounded-pill" title=""></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">AUDITORIA</p>
                        </div>
                        <div class="col-sm">
                            
                            <a class="navbar-brand" href="{{ route('archivos')  }}"> <img src="http://192.168.1.107/ventas/public/img/moto.png" width="70" height="70" class="rounded-pill" title=""></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">TERRENO</p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('incumplidos') }}"> <img src="http://192.168.1.107/ventas/public/img/sac.png" width="70" height="70" class="rounded-pill"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">SAC</p> 
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('reporte.index')  }}"> <img src="http://192.168.1.107/ventas/public/img/indicador.png" width="70" height="70" class="rounded-pill" title=""></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Indicadores</p>
                        </div>
                        <div class="col-sm">
                        <a class="navbar-brand" href="{{ url('http://192.168.1.107/referidos/public/grupos') }}"> <img src="http://192.168.1.107/ventas/public/img/puestos.png" width="70" height="70" class="rounded-pill" title="ASIGNACION DE PUESTO: Aplicacion para la asignacion de los puestos del Callcenter, el mismo tiene conexión con el predictivo 192.168.1.75 BD (ASTERISK) TABLA (PHONES - VICIDIAL_USERS)"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Asignacion de Puestos</p> 
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.107/referidos/public/vicidial')  }}"> <img src="http://192.168.1.107/referidos/public/img/log.png" width="70" height="70" class="rounded-pill" title="Sistemas: Procesos que ayudan a la automatizacion de la empresa"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">SISTEMAS</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand " align="justify " href="{{ route('archivospublic') }}"> <img src="http://192.168.1.107/ventas/public/img/descarga.png" width="70" height="70" class="rounded-pill "  title="Descargas de archivos"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">ARCHIVOS</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand " align="justify " href="{{ route('procesos.index') }}"> <img src="http://192.168.1.107/ventas/public/img/PROCESO.png" width="70" height="70" class="rounded-pill "  title="Descargas de archivos"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">PROCESOS</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.76/agc/vicidial.php') }}"> <img src="http://192.168.1.107/ventas/public/img/predictivo.png" width="70" height="70" class="rounded-pill " title="PREDICTIVO: SISTEMA DE MARCACIÓN"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">Predictivo</p> 
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.107/proyecto/public/login') }}"> <img src="http://192.168.1.107/ventas/public/img/RRHH.jpg" width="70" height="70" class="rounded-pill " title="PREDICTIVO: SISTEMA DE MARCACIÓN"></a><p style="text-shadow: 0 0 0.2em #8F7, 0 0 0.2em #8F7">RRHH</p> 
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
