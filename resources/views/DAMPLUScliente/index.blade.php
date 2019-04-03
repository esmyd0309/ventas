@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label>Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
                {!! Form::open(['route'=> 'DAMPLUScliente', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) }}
            
                {{ Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) }}
                
               
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}

</div>
<div class="col-md-2">
        
        </div>
<div class="col-md-2">

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
                <th class='text-center'>Nombres</th>
                <th  class='text-center'>Area</th>
                <th class='text-center'>Agente</th>
                <th class='text-center'>Campaña</th>
                <center><th  class='text-center'>Accion</th></center>
                </thead>
                <tbody>
                
                @foreach ($DAMPLUSclientes as $DAMPLUSclientess)
                <tr >
                    <td class='text-center'><small class="text">{{ $DAMPLUSclientess->Identificacion }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientess->Nombres }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientess->Campo9 }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientess->IdAgente }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientess->IdCampaña }}</small></td> 
                    
                    <td class='text-center'>
                    <a href="{{ route('DAMPLUScliente.edit', $DAMPLUSclientess->Identificacion) }}" class="btn btn-danger" class="btn btn-default btn-xs"  onclick="return confirm('¿ ESTAS SEGURO QUE QUIERE REALIZAR ESTE PROCESO ')">Actualizar</a></td>
                </tr>
                @endforeach
                </tbody> 
          
             </table>

              {!! $DAMPLUSclientes->render() !!}
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
