@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar de Categorias
                    </div>
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach

                        <form action="{{ url('/categoria/' . $categorias->id_ctg_producto) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" name="txtCtgr" id="txtCtgr" class="form-control" placeholder=""
                                    aria-describedby="helpId" value="{{ $categorias->desc_categoria }}">
                                <small id="helpId" class="text-muted">Help text</small>
                            </div>
                            <div class="form-group">
                                <label for="">Seleccione Estado</label>
                                <select class="form-control" name="txtEstCtgr" id="txtEstCtgr">
                                    @if (isset($categorias->id_estado))
                                        <option value="{{ $categorias->id_estado }}">
                                            {{ $categorias->estado->desc_estado }}
                                        </option>
                                        <option>_________________________</option>
                                    @else
                                        <option selected>Seleccione</option>
                                    @endif
                                    {{-- <option selected>Seleccione Estado</option> --}}
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}">{{ $estado->desc_estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Editar">
                            <a href="{{ url('/categoria') }}" class="btn btn-danger">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
