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
                            Listar Clientes
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ url('clientes/create') }}">Nuevo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <h4 class="card-title">Title</h4>
                            <p class="card-text">Text</p> --}}

                            <form >
                                <div class="form-group">
                                    <label for="">Buscar</label>
                                    <input type="search" name="txtBdesc" id="txtBdesc" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </div>
                            </form>

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
                                                <a class="btn btn-success"
                                                    href="{{ url('/clientes/' . $cliente->id_cliente . '/edit') }}">Editar</a>
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
