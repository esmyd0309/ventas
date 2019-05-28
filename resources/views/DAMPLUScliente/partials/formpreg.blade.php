<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong> Cedula:</strong> {{ $DAMPLUScliente->Identificacion }}</P> <strong> Nombres:</strong><P>{{ $DAMPLUScliente->Nombres }}</P><strong> Campaña:</strong><P>{{ $DAMPLUScliente->IdCampaña }}</P></div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                {{ form::label('IdIdAgente', 'Agente') }}
                                {{ form::text('IdAgente', null, ['class' => 'form-control','required','disabled']) }}
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                {{ form::label('Campo9', 'Area Actual') }}
                                {{ form::text('Campo9', null, ['class' => 'form-control','disabled']) }}
                                </div>
                            </div> 
                        </div>   
                        <div class="row">
                            <div class="col-sm">   
                                <div class="form-group">
                                {{ form::label('IdAgente', 'Agente') }}
                                <select name="IdAgente" class="browser-default custom-select" class="form-control{{ $errors->has('IdAgente') ? ' is-invalid' : ''  }}"  required >
                                <option value="">---- Agente -----</option>
                                    @foreach ($IdAgente as $IdAgentes)
                                
                                        <option value="{{ $IdAgentes->IdAgente }}">{{ $IdAgentes->IdAgente }} </option>
                                    @endforeach
                                    @if ($errors->has('IdAgente'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('IdAgente') }}</strong>
                                        </span>
                                    @endif
                                </select>
                                   
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                {{ form::label('Campo9', 'Area') }}
                                    <select name="Campo9" class="browser-default custom-select" class="form-control{{ $errors->has('Campo9') ? ' is-invalid' : ''  }}"  required >
                                    <option value="">---- Areas -----</option>
                                        @foreach ($campo9 as $Campo9s)
                                    
                                            <option value="{{ $Campo9s->Campo9 }}">{{ $Campo9s->Campo9 }} </option>
                                        @endforeach
                                        @if ($errors->has('Campo9'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('Campo9') }}</strong>
                                            </span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">  
                                <div class="form-group">
                                    
                                    </div>   
                                </div>
                           
                            <div class="col-sm">
                                <div class="form-group">
                               
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">  
                                <div class="form-group">
                                   
                                    </div>   
                                </div>
                           
                            <div class="col-sm">
                                <div class="form-group">
                                
                                </div>
                            </div>
                        </div>
                </div>
                <center>
                        <div class="form-group">
                        {{ form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('DAMPLUScliente') }}" class="btn btn-sm btn-success">Volver a la lista</a>  </div>
                        </div>
                </center>
            </div>
                        
        </div>
    </div>

</div>

