@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- page content -->
<div class="content p-3">
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @if (Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }} </div>
        @endif
    </div><br>
    <div class="clearfix"></div>
    <div class="row" style="display: block;">
        <div class="col-lg">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla de Postulantes </h2>
                    <p><strong>Tabla que muestra los pustulantes registrados en la pagina</strong></p>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/getPostulantesExcel">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar Excel </a>
                            {{-- <a class="dropdown-item" href="#">Settings 2</a> --}}
                        </div>
              
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Primer Nombre</th>
                                <th>Segundo Nombre</th>
                                <th>Ap. Pat</th>
                                <th>Ap. Mat</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Codigo Boucher</th>
                                <th>Ciudad</th>
                                <th>Whatsapp</th>
                                <th>Telefono</th>
                                <th>Creado en Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($postulantes as $postulantess)
                            <tr>
                                <td scope="row">{{ strtoupper($postulantess->primer_nombre) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->segundo_nombre) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->primer_apellido) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->segundo_apellido) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->email) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->celular) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->boucher) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->ciudad) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->whatsapp) }}</td>
                                <td scope="row">{{ strtoupper($postulantess->telefono) }}</td>
                                <td scope="row">{{ date('d M, Y', strtotime($postulantess->created_at)) }}</td>
                                <td scope="row" style="text-align:center;">                         
                                    <form action="{{ route('postulante.destroy',$postulantess->id ) }}" method="POST"
                                        accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                            onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i
                                                class="fa fas fa-trash" aria-hidden="true"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="text-align: center;">
                {{ $postulantes->links() }}
            </div>
        </div>
    </div>
</div>
<style>
    th, td{
        text-align: center !important;
    }
</style>
</div>
@endsection