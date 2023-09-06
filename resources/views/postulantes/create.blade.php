@extends('layoutspage.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet"
    crossorigin="anonymous">
<div class="container-xxl py-5">
    <div class="container">
        <h1>INGRESE SUS DATOS</h1>
        <p><strong>Nota: </strong> El código que utilizara solo se puede usar por una unica vez.</p>
        <div class="row">
            <div class="col-md-12 mt-5">
                <div id="stepper1" class="bs-stepper">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#test-l-1">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Codigo Validación</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-l-2">
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
                        <form action="{{route('codigo.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div id="test-l-1" class="content">
                                <div class="col-6 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                    <span><strong>Ingrese su Código de Verificación</strong></span>
                                    <br>
                                    <input type="text" id="codigo_input" placeholder="Codigo Verificacion" 
                                        style="text-transform: uppercase;" class="form-control" name="codigo" required>
                                    </div><br>
                                    <button class="btn btn-secondary"  type="submit"><i class="fa fa-check"></i>&nbsp;
                                        Validar Código
                                    </button>
                                </div><br>
                            </div>
                        </form>

                        <div id="test-l-2" class="content">
                            @if(Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('code-message') }}</div>
                            @endif

                            @if (Session::has('danger'))
                                <div class="alert alert-danger">{{ Session::get('code-message') }} </div>
                            @endif

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
                            {{-- <div>
                                <span style="text-align: left;"> <strong>Los campos con * son
                                        obligatorios</strong></span>
                            </div><br>

                            <form action="{{route('postulante.store')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="row g-3"><br>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0"
                                        placeholder="Primer Nombre *" name="primer_nombre"
                                        style="text-transform: uppercase;" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0"
                                        placeholder="Segundo Nombre *" name="segundo_nombre"
                                        style="text-transform: uppercase;" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0"
                                        placeholder="Apellido Paterno *" name="primer_apellido"
                                        style="text-transform: uppercase;" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0"
                                        placeholder="Apellido Materno *" name="segundo_apellido"
                                        style="text-transform: uppercase;" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" placeholder="Telefono"
                                        name="telefono" style="text-transform: uppercase;" style="height: 55px;"
                                        required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" placeholder="Celular *"
                                        name="celular" style="text-transform: uppercase;" style="height: 55px;"
                                        required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control border-0" placeholder="Whatsapp"
                                        name="whatsapp" style="text-transform: uppercase;" style="height: 55px;"
                                        required>
                                </div>
                                <div class="col-12 col-sm-6">
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
                                    <input type="email" class="form-control border-0"
                                        placeholder="Correo Electronico *" name="email" style="height: 55px;"
                                        required>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary w-100 py-3" type="submit"><i
                                            class="fa fa-save"></i> Registrarse y Descarga</button>
                                </div>
                                </div>
                            </form><br> --}}
                        </div>

                        <div id="test-l-4" class="content">
                            <div class="col-md-8"><br><br>
                                <div class="card">
                                <div class="card-header">DESCARGAR DOCUMENTO</div>
                                <div class="card-body">
                                    <a type="button" class="btn btn-warning" href="/downloadsHNWSBKEJS"><i
                                        class="fa fa-book"></i> Descargar Prospecto</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>


    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js" crossorigin="anonymous">
    </script>
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