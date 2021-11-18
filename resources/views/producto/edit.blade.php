@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Producto
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/producto/' . $productos->id_producto) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <label for="">Codigo </label>
                                <input type="text" class="form-control" name="txtCodPro" id="txtCodPro"
                                    aria-describedby="helpId" placeholder=""
                                    value="{{ isset($productos->cod_producto) ? $productos->cod_producto : old('txtCodPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <div class="form-group">
                                <label for="">Producto</label>
                                <input type="text" class="form-control" name="txtDescPro" id="txtDescPro"
                                    aria-describedby="helpId" placeholder=""
                                    value="{{ isset($productos->desc_producto) ? $productos->desc_producto : old('txtDescPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" name="txtStockPro" id="txtStockPro"
                                    aria-describedby="helpId" placeholder=""
                                    value="{{ isset($productos->stock_producto) ? $productos->stock_producto : old('txtStockPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <div class="form-group">
                                <label for="">Valor</label>
                                <input type="text" class="form-control" name="txtVlrPro" id="txtVlrPro"
                                    aria-describedby="helpId" placeholder=""
                                    value="{{ isset($productos->valor_producto) ? $productos->valor_producto : old('txtVlrPro') }}">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <select class="custom-select" name="txtIdctgPro" id="txtIdctgPro">
                                    @if (isset($productos->id_ctg_producto))
                                        <option value="{{ $productos->id_ctg_producto }}">
                                            {{ $productos->categoria->desc_categoria }}</option>
                                        <option>_________________________</option>
                                    @else
                                        <option selected>Selecciones Una Opcion</option>
                                    @endif
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
                                    @if (isset($productos->id_estado))
                                        <option value="{{ $productos->id_estado }}">
                                            {{ $productos->estado->desc_estado }}
                                        </option>
                                        <option>_________________________</option>
                                    @else
                                        <option selected>Select Un Estado</option>
                                    @endif
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}">{{ $estado->desc_estado }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Imagen</label>
                                {{-- <label for="">{{$productos->img_producto->descr_img}}</label> --}}

                                @if (isset($productos->img_producto->descr_img))
                                    <img class="img-thumbnail img-fluid"
                                        src="{{ asset('storage' . '/' . $productos->img_producto->descr_img) }}"
                                        alt="{{ $estado->id_estado }}" width="200px" height="200px">
                                @endif
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
