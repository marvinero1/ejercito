@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
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
                    <h2>Tabla de Usuarios</h2>
                    {{-- <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul> --}}
                    <div class="clearfix"></div>
                </div>
                <div class="x_content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Creado en Fecha</th>
                                {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($usuarios as $usuarioss)
                            <tr>
                                <td scope="row">{{ strtoupper($usuarioss->name) }}</td>
                                <td scope="row">{{ strtoupper($usuarioss->email) }}</td>
                                <td scope="row">{{ strtoupper($usuarioss->role) }}</td>
                                <td scope="row">{{ strtoupper($usuarioss->created_at) }}</td>
                   
                                <td scope="row" style="text-align:center;">                         
                                    <form action="{{ route('usuarios.destroy',$usuarioss->id ) }}" method="POST"
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
            {{-- <div style="text-align: center;">
                {{ $postulantes->links() }}
            </div> --}}
        </div>
    </div>
</div>
<!-- /page content -->
</div>


@endsection