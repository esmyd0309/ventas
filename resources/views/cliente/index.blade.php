@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label>Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
                {!! Form::open(['route'=> 'clientess', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) }}
            
                {{ Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) }}
                
                {{ Form::text('celular', null, ['class' => 'form-control', 'placeholder' => 'Telefono']) }}
                
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}

</div>
<div class="col-md-2">
         <!--    <a href="{{ route('cliente.create') }}" class="btn btn-primary">Registrar Cliente</a>-->
        </div>
<div class="col-md-2">
             <a href="{{ route('dependents.index') }}" class="btn btn-success">Dependientes</a>
        </div>
    </div>
</div>
<hr>
    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="card">
            
                <div class="alert alert-success" class="card-header"  >Listado de Clientes</div>
                
             <table >
                <thead class="thead-dark">
                    
                <th  class='text-center'>Cedula</th>
                <th class='text-center'>Apellidos</th>
                <th class='text-center'>Nombres</th>
                <th class='text-center'>Telf Celular</th>
                <th class='text-center'>Estado Laboral</th>
               
                <center><th  class='text-center'>Accion</th></center>
                </thead>
                <tbody>
                
                @foreach ($clientes as $clientess)
                <tr >
                    <td class='text-center'><small class="text-muted">{{ $clientess->cedula }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $clientess->apellidos }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $clientess->nombres }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $clientess->celular }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $clientess->celular2 }}</small></td>
                    
                    <td class='text-center'><a href="{{ route('cliente.show', $clientess->id) }}" class="btn btn-success" class="btn btn-default btn-xs">Detalles</a>
                    <a href="{{ route('cliente.edit', $clientess->id) }}" class="btn btn-danger" class="btn btn-default btn-xs">Actualizar</a></td>
                </tr>
                @endforeach
                </tbody> 
          
             </table>

              {!! $clientes->render() !!}
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
