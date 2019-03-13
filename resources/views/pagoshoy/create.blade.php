@extends('layouts.app')


@section('content')

<div class="container">
    <div class="content">

   


                {!! Form::open(['route' => 'pagoshoy.exportar']) !!}




                <div class="form-group col-6">
                    {{ form::label('fechadesde', 'Fecha  desde') }}
                    {{ Form::date('fechadesde',\Carbon\Carbon::now()->format('Y m d i s'),['class' => 'form-control']) }}
                </div>
                <div class="form-group col-6">
                    {{ form::label('fechahasta', 'Fecha  Hasta') }}
                    {{ Form::date('fechahasta', \Carbon\Carbon::now()->format('Y m d i s'),['class' => 'form-control']) }}
                </div>
                
            <div class="form-group">
                {{ form::submit('Gurdar', ['class' => 'btn btn-sm btn-primary']) }}
            </div>

            {!! Form::close() !!}


         

    </div>
</div>

@endsection