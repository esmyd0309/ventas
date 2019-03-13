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
                            <a class="navbar-brand" href="{{ route('clientes') }}"> <img src="http://192.168.1.107/ventas/public/img/telefono.png" width="100" height="100" class="rounded-pill"></a><p>Agregar Telefonos</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('sac') }}"> <img src="http://192.168.1.107/ventas/public/img/contactos.png" width="100" height="100" class="rounded-pill"></a><p>Detalle Telefonos</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('clientes') }}"> <img src="http://192.168.1.107/ventas/public/img/iess.png" width="100" height="100" class="rounded-pill" title="Datos IESS: Aplicacion que permite consultar datos de clientes y algunas referencias de contactos. Tiene conexión con el 192.168.1.7 BD (PREDICTIVO) TABLA (DAMPLUSdependents) "></a><p>Datos del Iess</p>
                        </div>
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('incumplidos') }}"> <img src="http://192.168.1.107/ventas/public/img/sac.png" width="100" height="100" class="rounded-pill"></a><CENTER><p>SAC</p></CENTER> 
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a class="navbar-brand" href="{{ route('clientess') }}"> <img src="http://192.168.1.107/ventas/public/img/cartera.png" width="100" height="100" class="rounded-pill"></a><p>Cartera Medina/Davila</p>
                        </div>
                       <div class="col-sm">
                            <a class="navbar-brand" href="{{ url('http://192.168.1.76/vicidial/welcome.php') }}"> <img src="http://192.168.1.107/ventas/public/img/predictivo.png" width="100" height="100" class="rounded-pill" title="PREDICTIVO: SISTEMA DE MARCACIÓN"></a><p>Predictivo</p>
                        </div>
                        <div class="col-sm">
                          
                        </div>
                        <div class="col-sm">
                           
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
