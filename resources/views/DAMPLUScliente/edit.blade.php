@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="card-body"> <strong> CLIENTE:</strong> {{ $DAMPLUScliente->Identificacion }}</P> <strong> Nombres:</strong><P>{{ $DAMPLUScliente->Nombres }}</P><strong> Campaña:</strong><P>{{ $DAMPLUScliente->IdCampaña }}</P></div>   

                    {!! Form::model($DAMPLUScliente, ['route' => ['DAMPLUScliente.update', $DAMPLUScliente->Identificacion],
                            'method' => 'PUT']) !!}

                                @include('DAMPLUScliente.partials.formpreg')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

