@extends('layouts.app')


@section('content')
              
 




    <div class="col-md-12">
        <div class="card">
            <div class="alert alert-danger" class="card-header"  >Listado de clientes</div>
          
         <table >
            <thead class="thead-dark">
            <th  class='text-center'>id</th>
            <th  class='text-center'>Extension</th>
            <th  class='text-center'>Agente</th>
            <th  class='text-center'>Nombres</th>
           

 
        </thead>
        <tbody>
          
            @foreach ($cliente as $clientes)

            <tr >
              <td class='text-center'><small class="text-muted">{{ $clientes->id }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->extension }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->login }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->fullname }}</small></td>
                

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