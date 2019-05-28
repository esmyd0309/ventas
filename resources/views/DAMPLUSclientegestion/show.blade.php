@extends('layouts.app')

@section('content')
<div class="container">
<div class="page-header">
    <div class="row">
        <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                DETALLE CLIENTE
                </button>
            </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            <div class="card">
                <div class="card-header">
                    Datos Cliente
                </div>
                <div class="card-body">
                @foreach ($cliente as $clientes)
            
                    {{ $clientes->Identificacion }} 
                    {{ $clientes->Descripcion }} 
                   
                @endforeach
                <br>
                </div>
            </div>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                DETALLE GESTION SII
                </button>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
            @foreach ($gestiones as $gestioness)
            <p>FECHA:  {{ $gestioness->FecRegistro }} </p>
           <p>CEDULA:  {{ $gestioness->Identificacion }} </p>
           <p>TELEFONO:  {{ $gestioness->TelefonoPersona }} </p>
           <p>ESTADO:  {{ $gestioness->Descripcion }} </p>
           <p>COMENTARIO:  {{ $gestioness->Comentario }} </p>
           <p>AGENTE:  {{ $gestioness->UsuRegistro }} </p>
           <hr>
        @endforeach
        
       
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                DETALLE PREDICTIVO
                </button>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
            @foreach ($gestiopre as $gestiopres)
            <p>FECHA:  {{ $gestiopres->entry_date }} </p>
           <p>CEDULA:  {{ $gestiopres->first_name }} </p>
           <p>TELEFONO:  {{ $gestiopres->phone_number }} </p>
           <p>ESTADO:  {{ $gestiopres->status }} </p>
           <p>COMENTARIO:  {{ $gestiopres->comments }} </p>
           <p>AGENTE:  {{ $gestiopres->user }} </p>
           <hr>
        @endforeach
            </div>
            </div>
        </div>
        </div>

        </div>
        </div>
@endsection