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
        </tr>
        @endforeach
    </tbody>
</table>