@extends('layouts.app')

@section('content')
<div class="container">
  
                    {!! Form::model($DAMPLUScliente, ['route' => ['DAMPLUScliente.update', $DAMPLUScliente->Identificacion],
                            'method' => 'PUT']) !!}

                                @include('DAMPLUScliente.partials.formpreg')

                        {!! Form::close() !!}
                  
</div>
@endsection

