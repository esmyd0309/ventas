@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
        <div class="col-md-2">
        <label style="color:red;">Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-12" >
        
             
                {!! Form::open(['route'=> 'dependents', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('nombreempresa', null, ['class' => 'form-control', 'placeholder' => 'Nombre De la Empresa']) }}
            
                {{ Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Cargo']) }}

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
                <th class='text-center' class="thead-dark">Nombre De la Empresa</th>
               
                <th class='text-center' class="thead-dark">Cargo</th>
                <th class='text-center' class="thead-dark">Telf Trabajo</th>
               
                <th  class='text-center' class="thead-dark">Cedula</th>
                <th class='text-center' class="thead-dark">Nombres</th>
                <th  class='text-center' class="thead-dark">Action</th>
                </thead>
                <tbody>
                
                @foreach ($dependents as $dependentss)
                <tr >
                <td class='text-center'><small class="text-muted">{{ $dependentss->nombreempresa }}</small></td>
                
                <td class='text-center'><small class="text-muted">{{ $dependentss->cargo }}</small></td>
                <td class='text-center'><small class="text-muted">{{ $dependentss->telefonotrabajo }}</small></td>
                
                <td class='text-center'><small class="text-muted">{{ $dependentss->cedula }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $dependentss->nombres }}</small></td>
                
                <td class='text-center'><small class="text-muted"><a href="{{ route('dependents.show', $dependentss->id) }}" class="btn btn-success">Detalles</a>
                </tr>
                @endforeach
                </tbody> 
          
             </table>

             {!! $dependents->render() !!}
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
