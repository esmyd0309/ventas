@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label></label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-4" > 
             
            {!! Form::open(['route'=> 'sac', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Identificacion']) }}
        
              
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}

</div>
    <div class="col-md-4">

  
        </div>
<div class="col-md-4">

        <button class="btn btn-danger" type="button">
            Contactos SAC 
            <span class="badge">{{ $contactoswapsac }}</span>
        </button>
        
        <button class="btn btn-success" type="button">
            Comunicación SAC 
            <span class="badge">{{ $comunicacionwapsac }}</span>
        </button>
        </div>
    </div>
</div>

<hr>
    <div class="row justify-content-center">
    
        <div class="col-md-12">
            <div class="card">
            
                <div class="alert alert-warning" class="card-header"  >Clientes Sac &nbsp;&nbsp;
                  

           
                </div>
            <table class="table table-sm">
                <thead class="thead-light">
                    
                <th  class='text-center'>Area</th>
                <th  class='text-center'>Agente</th>
                <th  class='text-center'>Cedula</th>
                <th  class='text-center'>Nombres</th>
           
                <th  class='text-center'>Valor Deuda</th>
                <th  class='text-center '>Saldo Deuda</th>
                <th  class='text-center'>Telefono WhatsApp</th>
                <th  class='text-center'>Comunicacion</th>
                <th  class='text-center'>Telefono sms</th>
                <th  class='text-center'>Email</th>
                <th  class='text-center'>Detalle</th>


             
               
     
                </thead>
                <tbody>
              
                @foreach ($sac as $sacs)
   
                
                <tr >
                    <td class='text-center'><small class="text-muted">{{ $sacs->area }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $sacs->agente }}</small></td>
                    <td class='text-center '><small class="text-muted">{{ $sacs->cedula }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $sacs->nombres }}</small></td> 
        
                    <td class='text-center '><small class="text-muted">{{ $sacs->deuda }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $sacs->saldo }}</small></td> 
                 
        
     
                    <td class='text-center'><small class="text-muted">{{ $sacs->numero }}</small></td> 
                    @if($sacs->dato2!= NULL)
                    <td class='text-center'><small class="text-muted"><img src="http://192.168.1.107/auditoria/public/iconos/valido.png" width="30" height="30"/></small></td> 
                   
                    @else
                    <td class='text-center'><small class="text-muted"><img src="http://192.168.1.107/auditoria/public/iconos/invalido.png" width="30" height="30"/></small></td>
                    @endif
                    <td class='text-center'><small class="text-muted">{{ $sacs->sms }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $sacs->email }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $sacs->dato3 }}</small></td> 
          
                </tr>
              
                           





                <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
               
                </tbody> 
 
                @endforeach
                
               
             </table>
             {!! $sac->render() !!}
             <div class="alert alert-warning" class="card-header"  > &nbsp;&nbsp;
             <button class="btn btn-primary" type="button">
                        Contactos TT
                        <span class="badge">{{ $contactos }}</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-info" type="button">
                        Contactos-Sms
                        <span class="badge">{{ $contactossms }}</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-info" type="button">
                        Contactos-Email
                        <span class="badge">{{ $contactosemail }}</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-info" type="button">
                        Contactos-WhatsApp
                        <span class="badge">{{ $contactoswap }}</span>
                    </button>

                    &nbsp;&nbsp;
                    <button class="btn btn-success" type="button">
                 
                        Comunicación TT
                        <span class="badge">{{ $comunicacion }}</span>
                    </button>

           
                  </div>
            
               

                <a href="{{ route('incumplidos') }}" class="btn btn-sm btn-success">Volver</a>
         
                </center>

        
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection


@section('scripts')
