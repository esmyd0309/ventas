@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aplicaciones Internas</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('clientes') }}"> <img src="http://192.168.1.107/ventas/public/img/telefono.png" width="100" height="100" class="rounded-pill" title="Agregar telefonos: Aplicacion que permite el ingreso de nuevos contactos de clientes 'contactables', y la busqueda de los mismos. Tiene conexión con el 192.168.1.206 BD (SII_COBRANZA) TABLAS (DAMPLUScontactosWap)"></a><p>Agregar Telefonos</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('sac') }}"> <img src="http://192.168.1.107/ventas/public/img/contactos.png" width="100" height="100" class="rounded-pill" title="DETALLE DE TELEFONOS: Aplicacion que permite visualizar la cantidad de contactos ingresados por los agentes, y la busqueda detallada de los clientes, y si tienen comunicacion o no. segun la gestines ingresadas. Tiene conexión con el 192.168.1.206 BD (SII_COBRANZA) TABLAS (DAMPLUScontactosWap, TB_REGISTROSLLAMADAS)"></a><p>Detalle Telefonos</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('dependents') }}"> <img src="http://192.168.1.107/ventas/public/img/iess.png" width="100" height="100" class="rounded-pill" title="Datos IESS: Aplicacion que permite consultar datos de clientes y algunas referencias de contactos. Tiene conexión con el 192.168.1.7 BD (PREDICTIVO) TABLA (DAMPLUSdependents)"></a><p>Datos del Iess</p>
                        </div>
                        <div class="col-sm">
                        <a class="navbar-brand" href="{{ route('logredictivos') }}"> <img src="http://192.168.1.107/ventas/public/img/log.png" width="100" height="100" class="rounded-pill" title="HISTORIAL DE LLAMADAS: Aplicacion para la busqueda de posible contactos, de gestiones realizadas del Predictivo. Tiene conexión con el 192.168.1.7 BD (Predictivo) TABLAS (BD_RESUMEN_MANUAL_ULTIMO)"></a><p>Historial LLamadas</p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('clientess') }}"> <img src="http://192.168.1.107/ventas/public/img/cartera.png" width="100" height="100" class="rounded-pill" title="CARTERA: Aplicacion que permite actualizar información de la cartera de Mediana y Davila. Tiene conexión con el 192.168.1.206 BD (SII_COBRANZA) TABLAS (DAMPLUSclientes)"></a><p>Cartera Medina/Davila</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.76/agc/vicidial.php') }}"> <img src="http://192.168.1.107/ventas/public/img/predictivo.png" width="100" height="100" class="rounded-pill " title="PREDICTIVO: SISTEMA DE MARCACIÓN"></a><p>Predictivo</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.107/referidos/public/grupos') }}"> <img src="http://192.168.1.107/ventas/public/img/puestos.png" width="100" height="100" class="rounded-pill" title="ASIGNACION DE PUESTO: Aplicacion para la asignacion de los puestos del Callcenter, el mismo tiene conexión con el predictivo 192.168.1.75 BD (ASTERISK) TABLA (PHONES - VICIDIAL_USERS)"></a><p>Asignacion de Puestos</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.107/referidos/public/referidos') }}"> <img src="http://192.168.1.107/ventas/public/img/red.png" width="100" height="100" class="rounded-pill" title="REFERIDOS: Aplicacion para ingresar clientes de Ventas, los cuales no se muentran a la hora de la consulta del SII_CALLCENTER. El mismo tiene conexion con el 192.168.1.203 para ingresar los  referidos, y con el 192.168.1.7, para consultar datos de clientes de la BD (Predictivo) - TABLAS (bd_actualizacion, bd_actualizacionDP)"></a> <b>Referidos</b>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.107/auditoria/public/')  }}"> <img src="http://192.168.1.107/ventas/public/img/auditoria.png" width="100" height="100" class="rounded-pill" title=""></a><p>Auditoria</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.107/construcion/')  }}"> <img src="http://192.168.1.107/ventas/public/img/indicador.png" width="100" height="100" class="rounded-pill" title=""></a><p>Indicadores</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.107/referidos/public/vicidial')  }}"> <img src="http://192.168.1.107/referidos/public/img/log.png" width="100" height="100" class="rounded-pill" title="Sistemas: Procesos que ayudan a la automatizacion de la empresa"></a><p>SISTEMAS</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
