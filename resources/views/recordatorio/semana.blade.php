@extends('layouts.app')


@section('content')

<div class="container">
<div class="page-header">
    <div class="row">
    <div class="col-md-1">
        <label></label> 
        </div>
        <div class="d-inline-block align-top" class="col-md-6" > 
             
    

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
            
                <div class="alert alert-primary" class="card-header"  >Listado de recordatorios</div>
                
             <table >
                <thead class="thead-dark">
                    
                <th  class='text-center'>Cedula</th>
                <th  class='text-center'>nombres</th>
                <th  class='text-center'>Telefono</th>
                <th  class='text-center'>Producto</th>
                <th  class='text-center'>Monto</th>
                <th  class='text-center'>Fecha</th>
                <th  class='text-center'>area</th>
                <th  class='text-center'>tipo De Pago</th>


             
               
     
                </thead>
                <tbody>
              
                @foreach ($recordatorio as $recordatorios)
   
                
                <tr >
                    
                    <td class='text-center'>
                    <!-- <a href="" class="btn btn-success btn-xs">Evaluar</a> -->

                </tr>
              
                           





                <span class="fi-icon-name" title="icon name" aria-hidden="true"></span>
               
                </tbody> 
 
                @endforeach
                
               
             </table>

              {!! $recordatorio->render() !!}
               
                </div>
                
            </div>
     
<a href="{{ route('recordatoriosemana.exportar') }}" class="btn btn-primary">Descargar Excel</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('incumplidos') }}" class="btn btn-success">Volver</a>
        </div>
    </div>
</div>

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