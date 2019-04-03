@extends('layouts.app')

@section('content')

<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header" style="background-color: #e6ffff;">
                    Asignaciones de Puesto 
                    <a href="{{ route('asignacionpuesto.create') }}" 
                        class=" float-right ">
                        <img src="http://192.168.1.107/ventas/public/iconos/up.png" onfocus="displayFocus();">
                    </a>
                </div>
                <br>
                <div class="row">    
                @foreach($descargar as $descargars)
                    
                        <div class="col-sm-4">
                            <div class="card">
                            <div class="card-header"  style="background-color: #FAFAAD;">{{ $descargars->file_title }}</div>
                                <div class="card-body" style="background-color: #FAFAE9;">
                                <a href="{{ route('asignacionpuesto.show',['id' => $descargars->id]) }}" class="btn btn-sm btn-default"><img src="http://192.168.1.107/ventas/public/iconos/puesto.jpg" width="100" height="100"></a>{{ $descargars->created_at }}
                                    <p class="card-text">{{ $descargars->file_name }}
                                    
                                    <a href="{{ route('asignacionpuesto.descargas',['id' => $descargars->id])  }}" class="btn btn-sm btn-default"><img src="http://192.168.1.107/ventas/public/iconos/decargar.png" onfocus="displayFocus();"></a></p>                     
                                </div>
                            </div>
                            <br>
                        </div>
                        
                @endforeach
              
                </div> 
            </div>
            <center>
            <a class="btn btn-sm btn-success" href="{{ route('welcome') }}">Volver</a>
            </center>
            {!! $descargar->render() !!}
        </div>
    </div>
</div>

<br/>
@endsection