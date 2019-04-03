@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                     Procesos 
        
                </div>  
                <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('pagovero') }}" 
                                    class="btn  btn-danger " onclick="return confirm('¿ ESTAS SEGURO QUE QUIERE REALIZAR ESTE PROCESO ')">
                                    <img src="http://192.168.1.107/referidos/public/img/list.png" width="100" height="100" class="rounded-pill"><p>Pagos-Vero</p></a>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('DAMPLUScliente') }}" 
                                        class="btn  btn-warning " onclick="return confirm('¿ ESTAS SEGURO QUE QUIERE REALIZAR ESTE PROCESO ')">
                                        <img src="http://192.168.1.107/referidos/public/img/list.png" width="100" height="100" class="rounded-pill"><p>Gestion de clientes</p></a>
                                </a>
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                    </div>
                    <a  href="{{ url('http://192.168.1.107/ventas/public/welcome') }}" class="btn btn-success btn-sm active" role="button"> VOLVER </a>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection