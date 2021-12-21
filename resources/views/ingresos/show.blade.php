@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            Listar Gastos

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
                                        <th>D. Ingreso</th>
                                        <th>Valor </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gastos as $gasto)
                                        <tr>
                                            <td scope="row">{{ $gasto->id_gasto }}</td>
                                            <td>{{ $gasto->id_tipo_gasto }}</td>
                                            <td>{{ $gasto->desc_gasto }}</td>
                                            <td>{{ $gasto->valor_gasto }}</td>
                                            <td>{{ date('Y-m-d',strtotime($gasto->f_gasto)) }}</td>
                                            <td>{{ $gasto->obs_gasto }}</td>
                                            <td>{{ $gasto->tipo_ingresos->desc_ingreso }}</td>
                                            <td>{{ $gasto->tipo_ingresos->valor_ingreso }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="3">
                                            Total Ingresos
                                        </td>
                                        <td>
                                            {{ $ingresos->valor_ingreso }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Total Gastos
                                        </td>
                                        <td>
                                            {{ $gastos->sum('valor_gasto') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Saldo
                                        </td>
                                        <td>
                                            {{ $ingresos->valor_ingreso - $gastos->sum('valor_gasto') }}
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
                            <a href="{{ url('/ingresos') }}" class="btn btn-danger">Regresar</a>
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
