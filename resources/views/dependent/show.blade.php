@extends('layouts.app')


@section('content')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" id="particles-js">    
             <!--DATOS PERSONALES -->
    <div id="signupbox" style=" margin-top:100px" class="mainbox col-md-12 ">
        <div class="panel panel-warning " >
            <div class="panel-heading" class="alert alert-secondary">
                <div class="panel-title">Datos Personales </div>
            </div>  
                <div class="alert alert-light  "class="panel-body" id="particles-js">
                    <div class="row" >

                        <div class="col-md-2">
                            <label><strong> Documento: </strong></label>
                                {{ $dependent->tipo_documento }}
                        </div>

                        <div class="col-md-3">
                            <label><strong> Cedula:  </strong></label>
                                {{ $dependent->cedula }}
                         </div>

                           <div class="col-md-3">
                            <label><strong> Fecha de Nacimiento: </strong></label>
                                {{ $dependent->fechanacimiento }}
                         </div>

                        <div class="col-md-3">
                            <strong><label>Apelldos: </strong></label>
                                {{ $dependent->apellidos }}
                        </div>

                        <div class="col-md-3">
                            <label><strong>Nombres: </strong></label>
                                {{ $dependent->nombres }}
                        </div>
                        
                    </div>
                </div> 
                <div class="alert alert-light" class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <label><strong>Direccion:</strong> </label>
                            {{ $dependent->direccioncasa }}
                        </div>
                        <div class="col-md-3">
                            <label ><strong>Provincia</strong></label>
                            {{ $dependent->provincia }}
                        </div>
                        <div class="col-md-3">
                        <label ><strong>Canton</strong></label>
                            {{ $dependent->canton }}
                        </div>
                     
                    </div>
                </div> 

                <div class="alert alert-light  "class="panel-body">
                    <div class="row">

                        <div class="col-md-3">
                            <label ><strong>Parroquia:</strong>
                                {{ $dependent->parroquia }}
                        </div>

                            <div class="col-md-2">
                                <label><strong> Sexo: </strong></label>
                                        {{ $dependent->sexo }}
                            </div>

                            <div class="col-md-2">
                                <label><strong>Estado Civil:</strong></label>
                                    {{ $dependent->estadocivil }}
                            </div>
                    </div>
                </div> 


        <!--DATOS Contactos -->   
        <div id="signupbox" style=" margin-top:100px" class="mainbox col-md-12 ">
            <div class="panel panel-danger" >
                <div class="panel-heading" class="alert alert-secondary">
                    <div class="panel-title">Datos de Contactos</div>
                </div>  
                    <div class="alert alert-light  "class="panel-body">
                        <div class="form-group row" >

                            <div class="col-md-5">
                                <label><strong>Telef Celular</strong></label>
                                    {{ $dependent->celular }}
                            </div>
                            <div class="col-md-5"><label><strong>Telef Celular/A</strong></label>
                                   {{ $dependent->celular2 }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Convencional</strong></label>
                                   {{ $dependent->telefonocasa }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Telefono del Parentesco: </strong></label>
                                   {{ $dependent->dato4 }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Tipo de Parentesco: </strong></label>
                                   {{ $dependent->dato7 }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Nombres del Parentesco: </strong></label>
                                   {{ $dependent->parentesco }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Telf Trabajo: </strong></label>
                                   {{ $dependent->telefonotrabajo }}
                            </div>
                            <div class="col-md-3">
                                <label>Exte<strong>Extension</strong></label>
                                   {{ $dependent->extesion }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Email</strong></label>
                                  {{ $dependent->email }}
                            </div>
                        </div>
                        
                    </div> 
               </div>
        </div>
     
   
    <!--DATOS LABORALES -->   
    <div id="signupbox" style=" margin-top:100px" class="mainbox col-md-12 ">
        <div class="panel panel-primary" >
            <div class="panel-heading" class="alert alert-secondary">
                <div class="panel-title">Datos Laborales</div>
            </div>  
                <div class="alert alert-light  "class="panel-body">
                        <div class="row" >
                            <div class="col-md-5">
                                <label><strong>Empresa</strong></label>
                                     {{ $dependent->nombreempresa }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Empleado</strong></label>
                                    {{ $dependent->tipo_empleado }}
                            </div>
                            <div class="col-md-3">
                                <label><strong>Cargo</strong></label>
                                    {{ $dependent->cargo }}
                            </div>
                        </div>
                    </div> 
                    <div class="alert alert-light  "class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>Salario</strong></label>
                                    {{ $dependent->salario }}
                                </div>
                            <div class="col-md-2">
                                <label><strong>Antigüedad:</strong></label>
                                {{ $dependent->antiguedad }}
                            </div>
                            <div class="col-md-6">
                                <label><strong>Direccion Laboral</strong></label>
                               {{ $dependent->direccion_trabajo }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>Estado Laboral</strong></label>
                                    {{ $dependent->dato6 }}
                                </div>
                            <div class="col-md-2">
                                <label><strong>Observaciones:</strong></label>
                                {{ $dependent->observacion }}
                            </div>
                           
                        </div>
                    </div> 
                </div>
           </div>    
 </div>
 <div class='text-center'>

 <a href="{{ route('dependents.index') }}" class="btn btn-success">Volver a la lista</a> 
 </div>
@endsection
