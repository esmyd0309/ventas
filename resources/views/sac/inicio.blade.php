@extends('layouts.appsac2')


@section('content')  
<style type="text/css">

</style>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestiones del Día WhatsApp</h1>
            <a href="#envios_datos"   class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas  fa-sm text-white-50"></i> Envío de Datos  <span id="cantidadenvio"  class="pink"></span></a>
            <a href="#envios_pagos" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas  fa-sm text-white-50"></i> Recepcion de Pago  <span id="cantidadpago" class="pink"></span></a>
            <a href="#envios_negociacion" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas  fa-sm text-white-50"></i> Negociación WhatsApp  <span id="cantidadnego" class="pink"></span></a>
            <a href="#envios_certificados" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas  fa-sm text-white-50"></i> Solicitud Certificado No Adeudo  <span id="cantidadcertificado" class="pink"></span></a>

          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id="agente"></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="gestionestt"></div>
                    </div>
                    <div class="col-auto">
                    <a href="#detalle">  <i class="fas fa-calendar fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id="agente2"></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="gestionestt2"></div>
                    </div>
                    <div class="col-auto">
                    <a href="#detalle">  <i class="fas fa-calendar fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id="agente3"></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="gestionestt3"></div>
                    </div>
                    <div class="col-auto">
                    <a href="#detalle">  <i class="fas fa-calendar fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

 
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id="agente4"></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="gestionestt4"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
</div>

            
            <!-- Earnings (Monthly) Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->

            <!-- Earnings (Monthly) Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->

            <!-- Pending Requests Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>-->

          <!-- Content Row -->

          <div class="row" >
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 
                  <div class="dropdown no-arrow  " id="envios_datos"  >
                    <h4 class="card-title " > Envío de Datos</h4>
                    <h6 class="card-subtitle">Estados<code> 64-Envío de Datos </code> <span id="cantidad64" class="red"></span></h6>
                    <table class="table" id="miTabla1" >
                       
                    <thead >
                          <tr>
                              <th>Agente</th>
                              <th>Cedula</th>
                              <th>Cliente</th>
                              <th>Comentario</th>
                              <th>Estado</th>
                              <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody id="datos1" >
                              
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-12 col-lg-7" >
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="dropdown no-arrow" id="envios_pagos" >
                    <h4 class="card-title"> Recepcion de Pago</h4>
                    <h6 class="card-subtitle">Estados<code> 70-Recepcion de Pago </code> <span id="cantidad70" class="red"></span></h6>
                    <table class="table" id="miTabla2" >
                      <thead>
                          <tr>
                            <th>Agente</th>
                            <th>Cedula</th>
                            <th>Cliente</th>
                            <th>Comentario</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                          </tr>
                      </thead>
                      <tbody id="datos2" class="xxx" >
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="dropdown no-arrow" id="envios_negociacion" >
                    <h4 class="card-title"> Negociación WhatsApp</h4>
                    <h6 class="card-subtitle">Estados<code> 66 - Negociación WhatsApp </code> <span id="cantidad66" class="red"></span></h6>
                    <table class="table" id="miTabla3" >
                      <thead >
                        <tr>
                          <th>Agente</th>
                          <th>Cedula</th>
                          <th>Cliente</th>
                          <th>Comentario</th>
                          <th>Estado</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody id="datos3" >
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>




            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="dropdown no-arrow" id="envios_certificados" >
                    <h4 class="card-title">Solicitud Certificado No Adeudo </h4>
                    <h6 class="card-subtitle">Estados<code> 75 -Solicitud Certificado No Adeudo </code> <span id="cantidad75" class="red"></span></h6>
                    <table class="table" id="miTabla5" >
                      <thead>
                        <tr>
                          <th>Agente</th>
                          <th>Cedula</th>
                          <th>Cliente</th>
                          <th>Comentario</th>
                          <th>Estado</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody id="datos5" >
                        
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="dropdown no-arrow" id="detalle" >
                    <h4 class="card-title">Detalles Gestion </h4>
                    <h6 class="card-subtitle">Estados<code>  </code> <span id="cantidad75" class="red"></span></h6>
                    <table class="table" id="miTabla6" >
                      <thead>
                        <tr>
                          <th>Agente</th>
                          <th>Cantidad</th>
                          <th>Descripción</th>
                          
                        </tr>
                      </thead>
                      <tbody id="datos6" >
                        
                      </tbody>
                    </table>
                    <ul class="pagination" id="pagination"></ul>
                  </div>
                 
                </div>
              </div>
              </div>
              <div class="col-xl-6 col-lg-7">
                  <div id="chart-container" >
                  <h4 class="card-title">Detalles Agentes </h4>
                 <canvas id="mycanvasage"></canvas>
              </div>
                
            <div class="col-xl-12 ">
              
                <!-- Card Header - Dropdown -->
              
                  <div class="dropdown no-arrow" id="detalle" >
                    <h4 class="card-title">Detalles Gestiones </h4>
                  
                    <div id="chart-container" >
                   <canvas id="mycanvas"></canvas>
                  </div>
                  
               
              </div>
              </div>

            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
            
      @endsection

@section('script')

<script src="{{ asset('js/jquery-3.4.0.min.js') }}" ></script>

<script src="{{ asset('js/Chart.min.js') }}" ></script>
<script src="{{ asset('js/grafica.js') }}" ></script>
<script src="{{ asset('js/graficaage.js') }}" ></script>
<script src="{{ asset('js/script4.js') }}" ></script>
<script src="{{ asset('js/script.js') }}" ></script>





@endsection