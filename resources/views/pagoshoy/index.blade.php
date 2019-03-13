@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label></label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
           <!-- {!! Form::open(['route'=> 'pagoshoy', 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                
                {{ Form::text('agente', null, ['class' => 'form-control', 'placeholder' => 'Agente']) }}
        
              
                
                    <button type='submit' class='btn btn-default'>
                    <span class="glyphicon glyphicon-search">BUSCAR</span>
                    </button>
      

{!! Form::close() !!}-->

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
            
                <div class="alert alert-warning" class="card-header"  >Consultar Pagos</div>
                
                <center>{!! Form::open(['route' => 'pagoshoy.exportar']) !!}

                        <div class="form-group col-6">
                            {{ form::label('fechadesde', 'Fecha  desde') }}
                            {{ Form::date('fechadesde',\Carbon\Carbon::now()->format('Y m d i s'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-6">
                            {{ form::label('fechahasta', 'Fecha  Hasta') }}
                            {{ Form::date('fechahasta', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control']) }}
                        </div>

                        <div class="[ form-group ]">
                            <input type="checkbox" name="status" id="fancy-checkbox-success" autocomplete="off" />
                            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success" class="[ btn btn-default active ]">
                  Activar
                </label>
            </div>
        </div>

      
      
      
       <!--      <table >
                <thead class="thead-dark">
                    
                <th  class='text-center'>Cedula</th>
                <th  class='text-center'>Nombres</th>
                <th  class='text-center'>Telefono</th>
                <th  class='text-center'>Producto</th>
                <th  class='text-center'>Monto</th>
                <th  class='text-center'>Fecha</th>
                <th  class='text-center'>Area</th>
                <th  class='text-center'>Usuario </th>
                <th  class='text-center'>Confirmado</th>
                <th  class='text-center'>FecConfirma</th>
                <th  class='text-center'>Forma</th>



             
               
     
                </thead>
                <tbody>
              
                @foreach ($pagoshoy as $pagoshoys)
   
                
                <tr >
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->cedula }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->nombres }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->telefonowhat }}</small></td> 
                    
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->producto }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->cuota }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->fecha }}</small></td> 
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->area }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->usuarioedita }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->comfirmacion }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->fechaconfirma }}</small></td>
                    <td class='text-center'><small class="text-muted">{{ $pagoshoys->tipopago }}</small></td>
  

                

                </tr>
              
                           





                <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
               
                </tbody> 
 
                @endforeach
                
               
             </table>

              {!! $pagoshoy->render() !!}-->
               
               
                {{ form::submit('Descargar Excel', ['class' => 'btn btn-sm btn-primary']) }}&nbsp;&nbsp;&nbsp;&nbsp;


                <a href="{{ route('incumplidos') }}" class="btn btn-sm btn-success">Volver</a>
         
                </center>

        
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection


@section('scripts')



  <script>
  
  $(function(){
    $('#select-plantilla').ON('change', onSelect);
});

function onSelect(){
    var plantilla_id = $(this).val();
    alert(plantilla_id);
}
  
  </script>
@endsection