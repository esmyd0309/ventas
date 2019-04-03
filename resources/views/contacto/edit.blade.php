@extends('layouts.app')

@section('content')
<div class="container">

      
    {!! Form::model($dAMPLUScontactosWap, ['route' => ['createagc.update', $dAMPLUScontactosWap->id],
        'method' => 'PATCH']) !!}
        {{ method_field('PUT') }}
                        @csrf

        

            @include('contacto.partials.formpreg')


    {!! Form::close() !!}

  
</div>
@endsection