
@extends('layouts.app')

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
@section('content')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="card">
            <h5 class="card-header">SAC_NVO</h5>
            <div class="card-body">
                <table class="table" id="example" class="display">
                    <thead class="table table-striped">
                        <tr>
                        <th scope="col">Agente</th>
                        <th scope="col">Area</th>
                        <th scope="col">Asignacion</th>
                        <th scope="col">Compromisos</th>
                        <th scope="col">XPagar</th>
                        <th scope="col">Pagos</th>
                        <th scope="col">Montos</th>
                        </tr>
                    </thead>
                <tbody >
                <?php 
                
                $agente = 0; 
                $asignacion = 0; 
                $compromisos = 0; 
                $compromisosmonto = 0; 
                $cantpagos = 0; 
                $pagos = 0; 
                
                
                ?>
                
                    @foreach ($SAC_NVO as $SAC_NVOs)
                        <tr class="thead-dark">
                       <a href="#"><th >{{ $SAC_NVOs->agente }}</th></a> 
                        <th >{{ $SAC_NVOs->area }}</th>
                        <th >{{ $SAC_NVOs->asignacion }}</th>
                        <th >{{ $SAC_NVOs->compromisos }}</th>
                        <th >{{ $SAC_NVOs->compromisosmonto }}</th>
                        <th >{{ $SAC_NVOs->cantpagos }}</th>
                        <th >{{ $SAC_NVOs->pagos }}</th>

                        <?php 
                        
                        
                        $asignacion += $SAC_NVOs->asignacion; 
                        $compromisos += $SAC_NVOs->compromisos; 
                        $compromisosmonto += $SAC_NVOs->compromisosmonto; 
                        $cantpagos += $SAC_NVOs->cantpagos; 
                        $pagos += $SAC_NVOs->pagos; 
                        
                        ?>
                        @endforeach

                        <tr >
                        <th colspan="2"> <b>--------------  TOTAL   -------------------</b> </th>
                        
                        <th >{{ $asignacion }}</th>
                        <th >{{ $compromisos }}</th>
                        <th >{{ $compromisosmonto }}</th>
                        <th >{{ $cantpagos }}</th>
                        <th >{{ $pagos }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="carousel-item">
    <div class="card">
            <h5 class="card-header">Detalles VENCIDO</h5>
            <div class="card-body">
                <table class="table">
                    <thead class="table table-striped">
                        <tr>
                        <th scope="col">Agente</th>
                        <th scope="col">Area</th>
                        <th scope="col">Asignacion</th>
                        <th scope="col">Compromisos</th>
                        <th scope="col">XPagar</th>
                        <th scope="col">Pagos</th>
                        <th scope="col">Montos</th>
                        </tr>
                    </thead>
                <tbody >

                <?php 
                
                $agente = 0; 
                $asignacion = 0; 
                $compromisos = 0; 
                $compromisosmonto = 0; 
                $cantpagos = 0; 
                $pagos = 0; 
                
                
                ?>
                    @foreach ($VENCIDO as $VENCIDOs)
                        <tr class="thead-dark">
                        <th >{{ $VENCIDOs->agente }}</th>
                        <th >{{ $VENCIDOs->area }}</th>
                        <th >{{ $VENCIDOs->asignacion }}</th>
                        <th >{{ $VENCIDOs->compromisos }}</th>
                        <th >{{ $VENCIDOs->compromisosmonto }}</th>
                        <th >{{ $VENCIDOs->cantpagos }}</th>
                        <th >{{ $VENCIDOs->pagos }}</th>

                        <?php 
                        
                        
                        $asignacion += $VENCIDOs->asignacion; 
                        $compromisos += $VENCIDOs->compromisos; 
                        $compromisosmonto += $VENCIDOs->compromisosmonto; 
                        $cantpagos += $VENCIDOs->cantpagos; 
                        $pagos += $VENCIDOs->pagos; 
                        
                        ?>
                        @endforeach

                        <tr >
                        <th colspan="2"> <b>--------------  TOTAL   -------------------</b> </th>
                        
                        <th >{{ $asignacion }}</th>
                        <th >{{ $compromisos }}</th>
                        <th >{{ $compromisosmonto }}</th>
                        <th >{{ $cantpagos }}</th>
                        <th >{{ $pagos }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="carousel-item">
    <div class="card">
            <h5 class="card-header">Detalles VENCIDO_ISAAC</h5>
            <div class="card-body">
                <table class="table">
                    <thead class="table table-striped">
                        <tr>
                        <th scope="col">Agente</th>
                        <th scope="col">Area</th>
                        <th scope="col">Asignacion</th>
                        <th scope="col">Compromisos</th>
                        <th scope="col">XPagar</th>
                        <th scope="col">Pagos</th>
                        <th scope="col">Montos</th>
                        </tr>
                    </thead>
                <tbody >
                <?php 
                
                $agente = 0; 
                $asignacion = 0; 
                $compromisos = 0; 
                $compromisosmonto = 0; 
                $cantpagos = 0; 
                $pagos = 0; 
                
                
                ?>
                    @foreach ($CARTERA_NUEVA_2018 as $CARTERA_NUEVA_2018s)
                        <tr class="thead-dark">
                        <th >{{ $CARTERA_NUEVA_2018s->agente }}</th>
                        <th >{{ $CARTERA_NUEVA_2018s->area }}</th>
                        <th >{{ $CARTERA_NUEVA_2018s->asignacion }}</th>
                        <th >{{ $CARTERA_NUEVA_2018s->compromisos }}</th>
                        <th >{{ $CARTERA_NUEVA_2018s->compromisosmonto }}</th>
                        <th >{{ $CARTERA_NUEVA_2018s->cantpagos }}</th>
                        <th >{{ $CARTERA_NUEVA_2018s->pagos }}</th>
                        <?php 
                        
                        
                        $asignacion += $CARTERA_NUEVA_2018s->asignacion; 
                        $compromisos += $CARTERA_NUEVA_2018s->compromisos; 
                        $compromisosmonto += $CARTERA_NUEVA_2018s->compromisosmonto; 
                        $cantpagos += $CARTERA_NUEVA_2018s->cantpagos; 
                        $pagos += $CARTERA_NUEVA_2018s->pagos; 
                        
                        ?>
                     
                        @endforeach
                        <tr >
                        <th colspan="2"> <b>--------------  TOTAL   -------------------</b> </th>
                        
                        <th >{{ $asignacion }}</th>
                        <th >{{ $compromisos }}</th>
                        <th >{{ $compromisosmonto }}</th>
                        <th >{{ $cantpagos }}</th>
                        <th >{{ $pagos }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div id="seccionRecargar"></div>

<script type="text/javascript">
	$(document).ready(function(){
		setInterval(
				function(){
					$('#seccionRecargar').load('http://192.168.1.107/ventas/public/reporte');
                    {{ url('api/pacificar') }}
				},2000
			);
	});
</script>
@endsection
