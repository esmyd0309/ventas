@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label>Busqueda Avanzada</label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
                {!! Form::open(['route'=> 'DAMPLUSclientegestion', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
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
                
                @foreach ($DAMPLUSclientegestions as $DAMPLUSclientegestionss)
                <tr >
                    <td class='text-center'><small class="text">{{ $DAMPLUSclientegestionss->Identificacion }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientegestionss->Nombres }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientegestionss->Campo9 }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientegestionss->IdAgente }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $DAMPLUSclientegestionss->IdCampaña }}</small></td> 
                    
                    <td class='text-center'>
                    <a href="{{ route('DAMPLUSclientegestion.show', $DAMPLUSclientegestionss->Identificacion) }}" class="btn btn-danger" class="btn btn-default btn-xs"  >DETALLE</a></td>
                    <!--<a href="{{ route('DAMPLUSclientegestion.edit', $DAMPLUSclientegestionss->Identificacion) }}" class="btn btn-danger" class="btn btn-default btn-xs"  >Actualizar</a></td>-->
                </tr>
                @endforeach
                </tbody> 
          
             </table>

              {!! $DAMPLUSclientegestions->render() !!}
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
