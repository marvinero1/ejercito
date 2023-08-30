@extends('layoutspage.main')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-md-6 ">
            <div class="card text-center" style="width: 19rem; display: block;margin: auto;">
                <div class="card-body">
                    <img class="w-100" src="images/img/ingreso/imagen4.png" alt="image">
                </div>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col md-12">
            <div class="card">
                <div class="card-body">
                    <h4>ESCUELA MILITAR DE SARGENTOS DEL EJÉRCITO</h4>
                    <h4>“SGTO. MAXIMILIANO PAREDES TEJERINA”</h4>

                    <h4 class="card-text">INGRESO</h4>

                    <p class="card-text">
                        Joven o señorita boliviana de nacimiento, con suficientes conocimientos de los contenidos
                        académicos curriculares del sexto de secundaria del Sistema Educativo del Estado Plurinacional,
                        físicamente aptos para someterse al riguroso entrenamiento militar, con conocimientos básicos de
                        un idioma nativo, un idioma extranjero y artes marciales.

                        Tener gran vocación de servicio, respetuoso de la Constitución Política del Estado, sus leyes,
                        profundos valores ético-morales y estar comprometido con los objetivos nacionales.
                    </p>

                    <p class="card-text">
                        Los jóvenes deben ser conscientes de las exigencias que conlleva la profesión militar en el
                        nivel académico de Técnico Superior al que aspiran y entender que serán sometidos a una
                        formación rigurosa, acorde a las exigencias actuales, propias de los procesos de transformación
                        institucional.

                        Se requiere en forma permanente una conducta individual y social intachable; al mismo tiempo, es
                        necesario que los jóvenes que aspiran a formarse en el Instituto, sean conscientes de la
                        restricción de derechos que significa el vestir el uniforme de la Patria y entender que como
                        miembros de la Institución su desempeño será regulado por las normas y reglamentos que rigen la
                        vida militar.
                    </p>

                    <p class="card-text">
                        Es imprescindible tener capacidad de auto preparación y estar dispuestos a recibir una completa
                        formación académica militar, con alto concepto de trabajo en equipo y bajo presión, respetando
                        la diversidad cultural y la igualdad de género.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="card text-right" style="width: 18rem;float:right;">
                <div class="card-body">
                    <img class="w-100" src="images/img/ingreso/imagen5.png" alt="image">
                </div>
            </div>
        </div>
    </div><br>

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