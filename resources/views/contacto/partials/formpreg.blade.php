
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actualizar Numero</div>

                <div class="card-body">
                <label><strong>{{ __('cedula') }}</strong></label>
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
                            <div class="form-group">
                                {{ form::label('numero', 'Telefono Actual') }}
                                {{ form::text('numero', null, ['class' => 'form-control','disabled']) }}
                            </div>

                            <div class="form-group">
                                {{ form::label('numero', 'Telefono Nuevo') }}
                                {{ form::text('numero', null, ['class' => 'form-control']) }}
                            </div>




                        <div class="form-group">
                     
                        </div>


                </div>
                <center>
                        <div class="form-group">
                            {{ form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) }}
|||||
                            <a href="{{ route('agente') }}" class="btn btn-success btn-sm">Volver</a>
                        </div>
                </center>
            </div>
                        
        </div>
    </div>

</div>

