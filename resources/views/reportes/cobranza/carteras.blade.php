@extends('layouts.appsac2')


@section('content')  

<div class="col-xl-12 ">
              
              <!-- Card Header - Dropdown -->
            
                <div class="dropdown no-arrow" id="detalle" >
                  <h4 class="card-title">Detalles Gestiones </h4>
                
                  <div id="chart-container" >
                 <canvas id="grafica"></canvas>
                </div>
                
             
            </div>
            </div>

@endsection

@section('script')

<script src="{{ asset('js/jquery-3.4.0.min.js') }}" ></script>

<script src="{{ asset('js/Chart.min.js') }}" ></script>
<script src="{{ asset('js/carteras.js') }}" ></script>






@endsection