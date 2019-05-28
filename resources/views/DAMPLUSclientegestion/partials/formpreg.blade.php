
 <div class="card-body">
    <div class="col-md-4 col-md-offset-2">
        <div class="form-group">
            {{ form::label('IdAgente', 'Agente') }}
            {{ form::text('IdAgente', null, ['class' => 'form-control','required','disabled']) }}
        </div>
    </div>
    <div class="col-md-6 col-md-offset-2">
        <div class="form-group">
            {{ form::label('Campo9', 'Area Actual') }}
            {{ form::text('Campo9', null, ['class' => 'form-control','disabled']) }}
        </div>
    </div>
    
    <div class="col-md-6 col-md-offset-2">
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
<div class="form-group">
    {{ form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) }}
    <a href="{{ route('DAMPLUSclientegestion') }}" class="btn btn-sm btn-success">Volver a la lista</a>  </div>
</div>



