@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="card-body"> <strong> CLIENTE:</strong> {{ $DAMPLUSclientegestion->Identificacion }}</P> <strong> Nombres:</strong><P>{{ $DAMPLUSclientegestion->Nombres }}</P><strong> Campaña:</strong><P>{{ $DAMPLUSclientegestion->IdCampaña }}</P></div>   

                    {!! Form::model($DAMPLUSclientegestion, ['route' => ['DAMPLUSclientegestion.update', $DAMPLUSclientegestion->Identificacion],
                            'method' => 'PUT']) !!}

                                @include('DAMPLUSclientegestion.partials.formpreg')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

