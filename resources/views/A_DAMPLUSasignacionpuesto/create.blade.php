@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="background-color: #e6ffff;">Realizar Asignacion Masiva</div>   
                <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'asignacionpuesto.store','enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}
                            @include('A_DAMPLUSasignacionpuesto.partials.formpreg')

                    {!! Form::close() !!}
                 </div>
                 </div>  
            </div>
        </div>
    </div>
</div>
@endsection