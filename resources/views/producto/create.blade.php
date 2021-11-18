@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <div class="card-header">
                        Añade Nuevo Producto
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Codigo </label>
                                <input type="text" class="form-control" name="txtCodPro" id="txtCodPro"
                                    aria-describedby="helpId" placeholder="" value="{{ old('txtCodPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <div class="form-group">
                                <label for="">Producto</label>
                                <input type="text" class="form-control" name="txtDescPro" id="txtDescPro"
                                    aria-describedby="helpId" placeholder="" value="{{ old('txtDescPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" name="txtStockPro" id="txtStockPro"
                                    aria-describedby="helpId" placeholder="" value="{{ old('txtStockPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <div class="form-group">
                                <label for="">Valor</label>
                                <input type="text" class="form-control" name="txtVlrPro" id="txtVlrPro"
                                    aria-describedby="helpId" placeholder="" value="{{ old('txtVlrPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <select class="custom-select" name="txtIdctgPro" id="txtIdctgPro">
                                    <option selected>Select one</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_ctg_producto }}">
                                            {{ $categoria->desc_categoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <select class="custom-select" name="txtEstado" id="txtEstado">
                                    <option selected>Select Un Estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}">{{ $estado->desc_estado }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Imagen</label>
                                <input type="file" name="txtImg" id="txtImg" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <input class="btn btn-primary" type="submit" value="agregar">
                            <a class="btn btn-danger" href="{{ url('/producto') }}">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
