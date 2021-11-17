@if (Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif


<div class="card">
    <div class="card-header">
        Listado Productos
        <a href="{{ url('producto/create') }}">Crear</a>
    </div>
    <div class="card-body">
        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>

        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Valor</th>
                    <th>Categoria</th>
                    <th>Fecha Creacion</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id_producto }}</td>
                        <td>{{ $producto->cod_producto }}</td>
                        <td>{{ $producto->desc_producto }}</td>
                        <td>{{ $producto->stock_producto }}</td>
                        <td>{{ $producto->valor_producto }}</td>
                        <td>{{ $producto->categoria->desc_categoria }}</td>
                        <td>{{ $producto->fecha_creacion }}</td>
                        <td>{{ $producto->estado->desc_estado }}</td>
                        <td>
                                @if (isset($producto->img_producto->descr_img))
                                    <img class="img-thumbnail img-fluid" src="{{ asset('storage' . '/' . $producto->img_producto->descr_img) }}" alt="" width="50px" height="50px">
                                @endif
                        </td>
                        <td>
                            <a href="{{ url('/producto/'. $producto->id_producto . '/edit') }}">Editar</a>
                            |
                            <form action="{{ url('/producto/'. $producto->id_producto)}}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres Borrar?')" value="Eliminar">
                            </form>
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
