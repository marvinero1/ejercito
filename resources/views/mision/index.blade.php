@extends('layoutspage.main')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col md-8"><br>
            <div class="card">
                <div class="card-body">
                    <h4>ESCUELA MILITAR DE SARGENTOS DEL EJÉRCITO</h4>
                    <h5 class="card-title">“SGTO. MAXIMILIANO PAREDES TEJERINA”</h5>
                    
                    <h5 class="card-text">MISION</h5>

                    <p class="card-text">La Escuela Militar de Sargentos del Ejército, forma a futuros profesionales con
                        el grado de Sargento Inicial como Técnicos Superiores en Ciencia y Arte Militar Terrestre, con
                        sólidos conocimientos militares, elevada capacidad técnica, profundos valores Ético-Morales y de
                        servicio, excelente aptitud física y artes marciales, basado en el proyecto educativo del
                        Ejército.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4"><br>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <img class="w-100" src="images/img/mision/imagen2.png" alt="image">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="/" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Ir a Inicio</a>
    </div><br><br>
</div>
<style>
    p {
        text-align: justify;
    }
</style>
@endsection