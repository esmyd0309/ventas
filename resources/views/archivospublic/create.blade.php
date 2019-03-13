@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="background-color: #e6ffff;">Subir Archivo</div>   
                <div class="card">
                <I><img src="http://192.168.1.107/ventas/public/img/attention.png" width="20" height="20">El nombre del archivo no debe contener caracteres Especiales. (-,´´,*,_,-,"",/,<,>{},Ñ)</I>
                <div class="card-body">
                    {!! Form::open(['route' => 'archivospublic.store','enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}
                            @include('archivospublic.partials.formpreg')

                    {!! Form::close() !!}
                 </div>
                 </div>  
            </div>
        </div>
    </div>
</div>
@endsection