@extends('layouts.app')


@section('content')
<br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
 <!--<a href="{{ route('clientes') }}" class="btn btn-danger"> Agregar Contacto</a>-->
        <div class="col-md-12">
            <div class="card">
            <div class="card-header p-3 mb-2 bg-success text-white">Servicio al Cliente</div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                <center><h5 class="card-title p-3 mb-2 bg-success text-white">Consultar Recordatorios</h5></center> 
                                    <img src="http://192.168.1.107/ventas/public/img/hoy.jpg" alt="" width="300" height="300"><br/><br/>
                                    <center> <a href="{{ route('recordatorioshoy') }}" class="btn btn-success"> ENTRAR</a></center>
                                </div>
                            </div>
                        </div>


                   <!--     <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                <center><h5 class="card-title p-3 mb-2 bg-info text-white">Recordatorios Para Mañana</h5></center> 
                                    <img src="http://192.168.1.107/ventas/public/img/manana.jpg" alt="" width="300" height="300"><br/><br/>
                                    <center> <a href="{{ route('recordatorio') }}" class="btn btn-info"> ENTRAR</a></center>
                                </div>
                            </div>
                        </div>
                    

                 

                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title p-3 mb-2 bg-primary text-white">Recordatorios Para La Semana</h5>
                                        <img src="http://192.168.1.107/ventas/public/img/semana.jpg" alt="" width="300" height="300"><br/><br/>
                                   <center> <a href="{{ route('recordatoriosemana') }}" class="btn btn-primary">ENTRAR</a></center>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>  

                <div class="card-body">          
                    <div class="row"> -->

                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <center> <h5 class="card-title p-3 mb-2 bg-warning text-secondary">Consultar Pagos</h5></center> 
                                    <img src="http://192.168.1.107/ventas/public/img/pagos.jpg" alt="" width="300" height="300"><br/><br/>
                                    <center> <a href="{{ route('pagoshoy') }}" class="btn btn-warning"> ENTRAR</a></center>
                                </div>
                            </div>
                        </div>
                    

                       <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <center> <h5 class="card-title p-3 mb-2 bg-danger text-white">Incumplidos</h5></center> 
                                    <img src="http://192.168.1.107/ventas/public/img/incumplido.jpg" alt="" width="300" height="300"><br/><br/>
                                    <center> <a href="{{ route('incumplido') }}" class="btn btn-danger"> ENTRAR</a></center>
                                </div>
                            </div>
                        </div>
           
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title p-3 mb-2 bg-primary text-white">Gestiones</h5>
                                      <br/><br/>
                                   <center> <a href="{{ url('http://192.168.1.107/ventas/public/gestionesac') }}" class="btn btn-primary">ENTRAR</a></center>
                                </div>
                            </div>
                        </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
