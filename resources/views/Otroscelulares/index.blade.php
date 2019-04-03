@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
        <div class="col-md-2">
        <label style="color:red;">Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-12" >
        
             
                {!! Form::open(['route'=> 'otroscelulares', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) }}

                {{ Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) }}
                
             
                
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}
</div>
    </div>
</div>
<hr>
    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="card">
            
                <div class="alert alert-info" class="card-header"  >Listado de Clientes</div>
                
             <table>
                <thead class="thead-dark">
                <th  class='text-center' class="thead-dark">Cedula</th>
                <th class='text-center' class="thead-dark">Nombres</th>
                <th  class='text-center' class="thead-dark">Telefono</th>
                <th  class='text-center' class="thead-dark">Ciudad</th>
                <th class='text-center' class="thead-dark">Provincia</th>
                <th  class='text-center' class="thead-dark">Banco</th>
                </thead>
                <tbody>
                
                @foreach ($otroscelulares as $otroscelularess)
                <tr >
                
                <td class='text-center'><small class="text-muted">{{ $otroscelularess->identificacion }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $otroscelularess->nombre_cliente }}</small></td>
                <td class='text-center'><small class="text-muted">{{ $otroscelularess->id_servicio }}</small></td>
                <td class='text-center'><small class="text-muted">{{ $otroscelularess->ciudad }}</small></td>
                <td class='text-center'><small class="text-muted">{{ $otroscelularess->provincia }}</small></td>
                <td class='text-center'><small class="text-muted">{{ $otroscelularess->banco }}</small></td>
                
                </tr>
                @endforeach
                </tbody> 
          
             </table>

             {!! $otroscelulares->render() !!}
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
