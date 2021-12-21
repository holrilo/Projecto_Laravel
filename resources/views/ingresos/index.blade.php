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
                        Listar Ingresos
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url('ingresos/create') }}">Nuevo</a>
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
                                    <th>Tipo</th>
                                    <th>Descripcion</th>
                                    <th>Valor</th>
                                    <th>Fecha</th>
                                    <th>observacion</th>
                                    <th>Detalle</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingresos as $ingreso)
                                    <tr>
                                        <td scope="row">{{ $ingreso->id_ingreso }}</td>
                                        <td>{{ $ingreso->tipo_ingresos->desc_tipo_ingreso }}</td>
                                        <td>{{ $ingreso->desc_ingreso }}</td>
                                        <td>{{ $ingreso->valor_ingreso }}</td>
                                        <td>{{ date('Y-m-d',strtotime($ingreso->f_ingreso)) }}</td>
                                        <td>{{ $ingreso->obs_ingreso }}</td>
                                        <td>
                                            {{-- <a class="btn btn-success" href="{{ url('/ingresos/show/' . $ingreso->id_ingreso ) }}">Ver</a> --}}
                                            <a class="btn btn-sm btn-primary " href="{{ route('ingresos.show',$ingreso->id_ingreso) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{ url('/ingresos/' . $ingreso->id_ingreso . '/edit') }}">Editar</a>
                                            <form action="{{ url('/ingresos/' . $ingreso->id_ingreso) }}"
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