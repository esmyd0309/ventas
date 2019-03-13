
@extends('layouts.app')


@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">

  <div class="col-md-12">
    <div class="card-header "> </div>

        <div class="card">    
          {!! Form::open(['route' => 'contacto.store' , 'id' => 'formAgregarEvento' , 'name' => 'formAgregarEvento']) !!}
   
          <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                      {!! Form::label('cedula' , 'Cedula'); !!}
                      {!! Form::text('cedula' , null, ['class' =>'form-control',  'placeholder' => '10 caracteres'  ]); !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                      {!! Form::label('nombres' , '   Nombres'); !!}
                      {!! Form::text(' nombres' , null, ['class' =>'form-control',  'placeholder' => 'Nombre completo'  ]); !!}
                    </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                      {!! Form::label('numero' , '   Telefono'); !!}
                      {!! Form::text(' numero' , null, ['class' =>'form-control',  'placeholder' => '+593123456789'  ]); !!}
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                      {!! Form::label('sms' , ' Telf  SMS'); !!}
                      {!! Form::text(' sms' , null, ['class' =>'form-control',  'placeholder' => '0123456789'  ]); !!}
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                      {!! Form::label('email' , ' Email'); !!}
                      {!! Form::email(' email' , null, ['class' =>'form-control',  'placeholder' => 'email@email.com'  ]); !!}
                  </div>
                </div>

              </div>
            </div>


            
            <center><button id="registrarBtn" class="btn btn-primary" type="submit"> Registrar </button></center>
           
      <hr>
      
  
    
      <div class="row justify-content-center">

    {!! Form::close() !!}
    <div class="col-md-2">
        <label style="color:red;">Busqueda Avanzada</label> 
        </div>

            {!! Form::open(['route'=> 'clientes', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'nombres']) }}
                 {{ Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'numero']) }}
                  {{ Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'cedula']) }}
        
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
            <th  class='text-center'>nombres</th>
            <th  class='text-center'>Teléfono</th>
            <th  class='text-center'>Teléfono SMS</th>
            <th  class='text-center'>Email</th>
 
        </thead>
        <tbody>
          
            @foreach ($cliente as $clientes)

            <tr >
              <td class='text-center'><small class="text-muted">{{ $clientes->id }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->cedula }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->nombres }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->numero }}</small></td>
                <td class='text-center'><small class="text-muted">{{ $clientes->sms }}</small></td> 
                <td class='text-center'><small class="text-muted">{{ $clientes->email }}</small></td>  

            </tr>
          

            <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
           
            </tbody> 

            @endforeach
            
        
        </table>

          {!! $cliente->render() !!}
           
            </div>
        </div>
    </div>
    <center><a  href="{{ route('incumplidos') }}" class="btn btn-success btn-lg active" role="button"> Volver </a></center>
</div>

<br>
<br>
    <hr>

@endsection