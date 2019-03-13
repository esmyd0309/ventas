

<br>
<div class="form-group">
    {{ form::label('file_title', 'Titulo del Archivo') }}
    {{ form::text('file_title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ form::label('file_name', 'Descripccion del Archivo') }}
    {{ form::text('file_name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{!! Form::file('file', null) !!}
</div>
<div class="form-group">
<center>
    {{ form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }} ||||||
    <a class="btn btn-sm btn-success" href="{{ route('archivos') }}">Volver</a>
    </center>
</div>

