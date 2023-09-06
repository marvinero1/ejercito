@extends('layoutspage.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet"
    crossorigin="anonymous">
<div class="container-xxl py-5">
    <div class="container">
        <h1>INGRESE SUS DATOS</h1>
        <p><strong>Nota: </strong> El codigo <span>{{ $codigo_id ?? '' }}</span> que utilizara solo se puede usar por una unica vez. </p>
        <div class="row">
            <div class="col-md-12 mt-5">
            <div id="stepper1" class="bs-stepper">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#test-l-1">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Verificación</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-l-2" active>
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Fecha Nacimiento</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-l-3">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Formulario</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-l-4">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label">Descarga</span>
                        </button>
                    </div>
                </div>

                <div class="bs-stepper-content"><br>
                    <div id="test-l-1" class="content">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                                <br><br>

                            <button class="btn btn-secondary" onclick="stepper1.next()">Siguiente</button>
                        @endif

                        @if (Session::has('messagedanger'))
                            <div class="alert alert-danger">{{ Session::get('messagedanger') }} </div>

                            <a href="/"><button type="" class="btn btn-danger btn-lg btn-block"><i class="fa fa-home"></i> Inicio
                            </button></a>
                        @endif
                    </div>

                    <div id="test-l-2" class="content" active>
                        <div class="col-md-6">
                            <div class="h-100 d-flex flex-column justify-content-center text-center p-2 wow" data-wow-delay="0.6s">
                                <form action="{{route('postulante.create')}}" method="POST">
                                    Fecha Nacimiento
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="date" id="fecha_nacimiento"
                                            class="form-control datepicker-input"
                                            placeholder="Fecha Nacimiento" data-toggle="datetimepicker"
                                            style="height: 55px;" required>
                                    </div>
                                    <br>
                                    <div class="col-mf-6">
                                        <div class="date" id="date1" data-target-input="nearest">
                                            <h5 id="fecha_print" style="color: black; background: #d86464ab;"></h5>
                                        </div>
                                    </div>
                                </form>

                                <button class="btn btn-secondary" onclick="getValueInput()">
                                    <i class="fa fa-calendar"></i>&nbsp; Validar Fecha</button>
                            </div>
                            <script>
                                function getValueInput() {
                                    let error = "Tienes una edad mayor a la aceptada para la postulación!!!";
                                    let a = document.getElementById("fecha_nacimiento").value;
                                    // console.log("fecha ingresada",a);

                                    var hoy = new Date();
                                    var cumpleanos = new Date(a);
                                    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                                    var m = hoy.getMonth() - cumpleanos.getMonth();

                                    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                                        edad--;
                                    }

                                    if (edad <= 23) {
                                        stepper1.next();
                                    } else {
                                        document.getElementById("fecha_print").innerHTML = error;
                                    }
                                    // console.log("edad",edad);
                                    return edad;
                                }
                            </script>
                        </div>
                    </div>

                    <div id="test-l-3" class="content">
                        <h1 class="text-black mb-4">Formulario Postulante</h1>
                        <div>
                            <span style="text-align: left;"> <strong>Los campos con * son
                                    obligatorios</strong></span>
                        </div><br>

                        <form action="{{route('postulante.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="row g-3">
                            <div class="col-12 col-sm-6 ">
                                <input type="text" class="form-control border-inpt"
                                    placeholder="Primer Nombre *" name="primer_nombre"
                                    style="text-transform: uppercase;" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="text" class="form-control border-inpt"
                                    placeholder="Segundo Nombre" name="segundo_nombre"
                                    style="text-transform: uppercase;" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="text" class="form-control border-inpt"
                                    placeholder="Apellido Paterno *" name="primer_apellido"
                                    style="text-transform: uppercase;" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="text" class="form-control border-inpt"
                                    placeholder="Apellido Materno " name="segundo_apellido"
                                    style="text-transform: uppercase;" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="number" class="form-control border-inpt" placeholder="Telefono"
                                    name="telefono" style="text-transform: uppercase;" style="height: 55px;"
                                    required>
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="number" class="form-control border-inpt" placeholder="Celular *"
                                    name="celular" style="text-transform: uppercase;" style="height: 55px;"
                                    required>
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="number" class="form-control border-inpt" placeholder="CEDULA DE IDENTIDAD *"
                                    name="ci" style="text-transform: uppercase;" style="height: 55px;"
                                    required>
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="text" class="form-control border-inpt" placeholder="NUMERO DEPOSITO BOUCHER *"
                                    name="boucher" style="text-transform: uppercase;" style="height: 55px;"
                                    required>
                            </div>
                            <div class="col-12 col-sm-6 inpt">
                                <input type="number" class="form-control border-inpt" placeholder="Whatsapp"
                                    name="whatsapp" style="text-transform: uppercase;" style="height: 55px;"
                                    required>
                            </div>
                            <style>
                                .border-inpt{
                                    border: 1px #B2154 solid;
                                }
                            </style>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-inpt" style="height: 55px;" name="ciudad">
                                    <option selected>CIUDAD</option>
                                    <option value="La Paz">LA PAZ</option>
                                    <option value="Oruro">ORURO</option>
                                    <option value="Potosi">POTOSI</option>
                                    <option value="Cochabamba">COCHABAMBA</option>
                                    <option value="sucre">SUCRE</option>
                                    <option value="Tarija">TARIJA</option>
                                    <option value="Santa Cruz">SANTA CRUZ</option>
                                    <option value="Beni">BENI</option>
                                    <option value="Pando">PANDO</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <input type="email" class="form-control border-inpt"
                                    placeholder="CORREO ELECTRONICO *" name="email" style="height: 55px;"
                                    required>
                            </div>
                            <input type="text" value="{{ $codigo_id ?? '' }}" name="codigo_id" hidden>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit"><i
                                        class="fa fa-save"></i> Registrarse y Descarga</button>
                            </div>
                            </div>
                        </form><br>
                    </div>

                    <div id="test-l-4" class="content"> </div>
        
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div><br>


    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js" crossorigin="anonymous"></script>
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
</div>
@endsection