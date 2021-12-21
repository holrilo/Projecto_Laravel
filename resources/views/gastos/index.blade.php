@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('mensaje'))
                        {{ Session::get('mensaje') }}
                    @endif
                    <div class="card">
                        <div class="card-header">
                            Listar Gastos
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ url('gastos/create') }}">Nuevo</a>
                                <a class="btn btn-primary" href="{{ url('gastosa') }}">Pagos Automaticos</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <h4 class="card-title">Title</h4>
                            <p class="card-text">Text</p> --}}
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tipo</th>
                                        <th>Descripcion</th>
                                        <th>Valor</th>
                                        <th>Fecha</th>
                                        <th>observacion</th>
                                        <th>Ingreso asignado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gastos as $gasto)
                                        <tr>
                                            <td scope="row">{{ $gasto->id_gasto }}</td>
                                            <td>{{ $gasto->tipo_gastos->desc_tipo_gasto }}</td>
                                            <td>{{ $gasto->desc_gasto }}</td>
                                            <td>{{ $gasto->valor_gasto }}</td>
                                            <td>{{ date('Y-m-d ',strtotime($gasto->f_gasto)) }}</td>
                                            <td>{{ $gasto->obs_gasto }}</td>
                                            <td>{{ isset($gasto->tipo_ingresos->desc_ingreso) ? $gasto->tipo_ingresos->desc_ingreso : "Ninguno"  }}</td>
                                            <td>
                                                <a class="btn btn-success" href="{{ url('/gastos/' . $gasto->id_gasto . '/edit') }}">Editar</a>
                                                <form action="{{ url('/gastos/' . $gasto->id_gasto) }}"
                                                    method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Quieres Borrar?')" value="Eliminar">
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

                </div>
            </div>
        </div>
    </div>
@endsection
