@if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}

@endif

<div class="card">
    <div class="card-header">
        Listado de Categorias
        <div class="float-right">
            <a href="{{ url('categoria/create') }}">Crear Categoria</a>
        </div>
    </div>
    <div class="card-body">
        <h4 class="card-title">Listado de Categorias</h4>
        {{-- <p class="card-text">Text</p> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->desc_categoria }}</td>
                        <td>{{ $categoria->desc_estado }}</td>
                        <td>
                            <a href="{{ url('/categoria/' . $categoria->id_ctg_producto . '/edit') }}">Editar</a>
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
