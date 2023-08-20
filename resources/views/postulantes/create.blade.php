@extends('layoutspage.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet" crossorigin="anonymous">
<div class="container-xxl py-5">
    <div class="container">
        <div class="container">
            <h1>Ingrese sus Datos</h1>
            <div class="row">
              <div class="col-md-12 mt-5">
                {{-- <h2>Fecha Nacimiento</h2> --}}
                <div id="stepper1" class="bs-stepper">
                  <div class="bs-stepper-header">
                    <div class="step" data-target="#test-l-1">
                      <button type="button" class="btn step-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Fecha Nacimiento</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-l-2">
                      <button type="button" class="btn step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Formulario</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    {{-- <div class="step" data-target="#test-l-3">
                      <button type="button" class="btn step-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Third step</span>
                      </button>
                    </div> --}}
                  </div>
                  <div class="bs-stepper-content">
                    <div id="test-l-1" class="content">
                        <form  action="{{route('postulante.create')}}" method="POST" enctype="multipart/form-data">
                            <div class="col-6 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="date" id="fecha_nacimiento"
                                        class="form-control border-0 datepicker-input"
                                        placeholder="Fecha Nacimiento" data-toggle="datetimepicker" style="height: 55px;" required>
                                </div>
                            </div><br><br>
                            <div class="col-6 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <h5 id="fecha_print" style="color: black;    background: #d86464ab;"></h5> 
                                </div>
                            </div>
                        </form><br><br>

                        <button class="btn btn-secondary" onclick="getValueInput()"><i class="fa fa-calendar"></i>&nbsp;
                            Validar Fecha</button>
                      
                 

                        <script>
                            function getValueInput() {
                                let error="Tienes una edad mayor a la aceptada para la postulación!!!";
                                let a = document.getElementById("fecha_nacimiento").value;
                                // console.log("fecha ingresada",a);

                                var hoy = new Date();
                                var cumpleanos = new Date(a);
                                var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                                var m = hoy.getMonth() - cumpleanos.getMonth();

                                if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                                    edad--;
                                }

                                if(edad <= 23){
                                    stepper1.next();
                                }else{
                                    document.getElementById("fecha_print").innerHTML = error;
                                }
                                // console.log("edad",edad);
                                return edad;
                            }
                        </script>

                    </div>
                    <div id="test-l-2" class="content"> <div class="h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-black mb-4">Formulario Postulante</h1>
                        <span style="text-align: left;"> <strong>Los campos con * son obligatorios</strong> </span><br>
                        <form  action="{{route('postulante.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Primer Nombre *" name="primer_nombre"
                                     style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Segundo Nombre *" name="segundo_nombre"
                                    style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Apellido Paterno *" name="primer_apellido"
                                    style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Apellido Materno *" name="segundo_apellido"
                                    style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" placeholder="Telefono" name="telefono"
                                    style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" placeholder="Celular *" name="celular"
                                    style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" placeholder="Whatsapp" name="whatsapp"
                                    style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                            class="form-control border-0 datepicker-input"
                                            placeholder="Fecha Nacimiento" data-toggle="datetimepicker" style="height: 55px;" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <select class="form-select border-0" style="height: 55px;" name="ciudad">
                                        <option selected>Ciudad</option>
                                        <option value="La Paz">La Paz</option>
                                        <option value="Oruro">Oruro</option>
                                        <option value="Potosi">Potosi</option>
                                        <option value="Cochabamba">Cochabamba</option>
                                        <option value="Chuquisaca">Chuquisaca</option>
                                        <option value="Tarija">Tarija</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Beni">Beni</option>
                                        <option value="Pando">Pando</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control border-0" placeholder="Correo Electronico *" name="email"
                                    style="height: 55px;" required>
                                </div>
                                {{-- <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Request"></textarea>
                                </div> --}}
                                <div class="col-12">
                                    <button class="btn btn-secondary w-100 py-3" type="submit"><i class="fa fa-save"></i> Registrarse</button>
                                </div>
                            </div>
                        </form><br><br>
                    </div>


                      {{-- <button class="btn btn-primary" onclick="stepper1.next()">Next</button> --}}
                    </div>
                    {{-- <div id="test-l-3" class="content">
                      <p class="text-center">test 3</p>
                      <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                      <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                    </div> --}}
                  </div>
                </div>
              </div>
    </div>
</div><br><br><br>


<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"  crossorigin="anonymous"></script>
<script>
    var stepper1Node = document.querySelector('#stepper1')
    var stepper1 = new Stepper(document.querySelector('#stepper1'))

    stepper1Node.addEventListener('show.bs-stepper', function (event) {
      console.warn('show.bs-stepper', event)
    })
    stepper1Node.addEventListener('shown.bs-stepper', function (event) {
      console.warn('shown.bs-stepper', event)
    })

    var stepper2 = new Stepper(document.querySelector('#stepper2'), {
      linear: false,
      animation: true
    })
    var stepper3 = new Stepper(document.querySelector('#stepper3'), {
      animation: true
    })
    var stepper4 = new Stepper(document.querySelector('#stepper4'))
  </script>
<style>
  input{
    text-transform:uppercase;
  }
</style>
@endsection