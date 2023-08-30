@extends('layoutspage.main')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col md-8"><br>
            <div class="card">
                <div class="card-body">
                    <h4>ESCUELA MILITAR DE SARGENTOS DEL EJÉRCITO</h4>
                    <h4 class="text-center">“SGTO. MAXIMILIANO PAREDES TEJERINA”</h4>

                    <h4 class="text-center">VISION</h4>
                    <p class="card-text">Constituirse en el mejor Instituto de Pre-Grado de Sargentos de las Fuerzas Armadas, que permita
                        al Ejército contar con recursos humanos de alta calidad profesional en áreas operativas,
                        técnicas y físicas, con conocimientos de artes marciales, y profundos valores Ético-Morales y de
                        servicio, acorde a las necesidades institucionales permitiendo a la sociedad boliviana contar
                        con ciudadanos ejemplares que participen activamente en la Seguridad, Defensa y Desarrollo
                        Integral del Estado.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4"><br>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <img class="w-100" src="images/img/vision/imagen3.png" alt="image">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="/" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Ir a Inicio</a>
    </div><br><br>
</div>
<style>
    .p, p{ text-align: justify; }
    h4{
        text-align: center;
    }
</style>
@endsection