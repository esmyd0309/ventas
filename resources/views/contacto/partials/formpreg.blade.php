
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actualizar Numero &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Creado: {{ $dAMPLUScontactosWap->created_at }} &nbsp;&nbsp; Actualizdo: {{ $dAMPLUScontactosWap->updated_at }}</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    {{ form::label('cedula', 'Cedula') }}
                                    {{ form::text('cedula', null, ['class' => 'form-control','disabled']) }}
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    {{ form::label('nombres', 'Nombres') }}
                                    {{ form::text('nombres', null, ['class' => 'form-control','disabled']) }}
                                </div>
                            </div> 
                        </div>   
                        <div class="row">
                            <div class="col-sm">   
                                <div class="form-group">
                                    {{ form::label('numero', 'Telefono Actual') }}
                                    {{ form::text('numero', null, ['class' => 'form-control','disabled']) }}
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    {{ form::label('numero', 'Telefono Nuevo') }}
                                    {{ form::text('numero', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">  
                                <div class="form-group">
                                    {{ form::label('sms', 'SMS Actual') }}
                                    {{ form::text('sms', null, ['class' => 'form-control','disabled']) }}
                                    </div>   
                                </div>
                           
                            <div class="col-sm">
                                <div class="form-group">
                                    {{ form::label('sms', 'SMS Nuevo') }}
                                    {{ form::text('sms', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">  
                                <div class="form-group">
                                    {{ form::label('email', 'Correo Actual') }}
                                    {{ form::text('email', null, ['class' => 'form-control','disabled']) }}
                                    </div>   
                                </div>
                           
                            <div class="col-sm">
                                <div class="form-group">
                                    {{ form::label('email', 'Correo Nuevo') }}
                                    {{ form::text('email', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                </div>
                <center>
                        <div class="form-group">
                            {{ form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('agente') }}" class="btn btn-success btn-sm">Volver</a>
                        </div>
                </center>
            </div>
                        
        </div>
    </div>

</div>

