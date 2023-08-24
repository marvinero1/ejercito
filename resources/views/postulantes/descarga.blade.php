@extends('layoutspage.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet"
    crossorigin="anonymous">
<br>
@if(Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if (Session::has('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }} </div>
@endif
<br><br>
<div class="card" style="text-align: center;">
    <div class="col-md-12 mt-5">
        <div id="stepper1" class="bs-stepper">
            <div class="bs-stepper-header">
                <div class="line"></div>
                <div class="step" data-target="#test-l-4">
                    <button type="button" class="btn step-trigger" active>
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Descarga</span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content"><br>
              <div id="test-l-4" class="content">
                <div class="col-md-12"><br><br>
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
@endsection