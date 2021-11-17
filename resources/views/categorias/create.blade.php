
@foreach ($errors->all() as $error)
    {{$error}}
@endforeach

<form action="{{ url('/categoria')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Descripcion</label>
        <input type="text" name="txtCtgr" id="txtCtgr" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Help text</small>
    </div>
    <div class="form-group">
        <label for="">Seleccione Estado</label>
        <select class="form-control" name="txtEstCtgr" id="txtEstCtgr">
            <option selected>Seleccione Estado</option>
            @foreach ($estados as $estado)
                <option value="{{ $estado->id_estado }}">{{ $estado->desc_estado }}</option>
            @endforeach
        </select>
    </div>
    <input class="btn btn-primary" type="submit" value="agregar">
    <a href="{{ url('/categoria') }}" class="btn btn-danger">Regresar</a>
</form>
