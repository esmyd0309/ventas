@extends('layouts.app')


@section('content')
              
            {!! Form::open(['route'=> 'cliente', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('agente', null, ['class' => 'form-control', 'placeholder' => 'Agentes']) }}
                 {{ Form::text('area', null, ['class' => 'form-control', 'placeholder' => 'Area']) }}
                  {{ Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'fecha']) }}
        
                  <button type='submit' class='btn btn-default'>
                  <span class="glyphicon glyphicon-search">BUSCAR</span>
                  </button>
      
            {!! Form::close() !!}
          </div>
      </div>
 




    <div class="col-md-12">
        <div class="card">
            <div class="alert alert-danger" class="card-header"  >Listado de clientes</div>
          
         <table >
            <thead class="thead-dark">
            <th  class='text-center'>id</th>
            <th  class='text-center'>Cedula</th>
            <th  class='text-center'>Area</th>
            <th  class='text-center'>Agente</th>
            <th  class='text-center'>fecha</th>

 
        </thead>
        <tbody>
          
            @foreach ($cliente as $clientes)

            <tr >
              <td class='text-center'><small class="text-muted">{{ $clientes->id }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->Identificacionc }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->AREA }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->IdAgentec }}</small></td>
                <td class='text-center'><small class="text-muted">{{ $clientes->fecha }}</small></td> 
                

            </tr>
          

            <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
           
            </tbody> 

            @endforeach
            
        
        </table>

          {!! $cliente->render() !!}
           
            </div>
        </div>
    </div>

    @endsection