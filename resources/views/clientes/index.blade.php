@if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif

<div class="card">
    <div class="card-header">
        Listar Clientes
        <a href="{{ url('clientes/create') }}">Crear</a>
    </div>
    <div class="card-body">
        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>T. Identificacion</th>
                    <th>Nº Identificacion</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td scope="row">{{ $cliente->id_cliente }}</td>
                    <td scope="row">{{ $cliente->tipo_id->tipo_id }}</td>
                    <td scope="row">{{ $cliente->num_id_cliente }}</td>
                    <td scope="row">{{ $cliente->nom_cliente_1 }}</td>
                    <td scope="row">{{ $cliente->nom_cliente_2 }}</td>
                    <td scope="row">{{ $cliente->ape_cliente_1 }}</td>
                    <td scope="row">{{ $cliente->ape_cliente_2 }}</td>
                    <td scope="row">{{ $cliente->correo_cliente }}</td>
                    <td scope="row">{{ $cliente->tel_cliente }}</td>
                    <td scope="row">{{ $cliente->estado->desc_estado }}</td>
                    <td scope="row">
                        <a href="{{ url('/clientes/' . $cliente->id_cliente . '/edit') }}">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>