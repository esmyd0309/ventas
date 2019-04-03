

<br>
<div class="form-group">
    {{ form::label('file_title', 'Titulo del Archivo') }}
    {{ form::text('file_title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('grupo', 'GRUPOS') }}
        <select name="grupo" class="browser-default custom-select" class="form-control{{ $errors->has('grupo') ? ' is-invalid' : ''  }}" autofocus  >
        <option value="">----Seleccione  el Grupos -----</option>
            @foreach ($grupos as $gruposs)

                <option value="{{ $gruposs->user_group }}">{{ $gruposs->user_group }} </option>
            @endforeach
            
        </select>
</div>
<div class="form-group">
{!! Form::file('file', null) !!}
</div>
<div class="form-group">
<center>
    {{ form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }} ||||||
    <a class="btn btn-sm btn-success" href="{{ route('asignacionpuesto') }}">Volver</a>
    </center>
</div>

