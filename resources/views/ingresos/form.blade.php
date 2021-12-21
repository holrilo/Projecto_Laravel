<div class="form-group">
    <label for="">Tipo de Ingreso</label>
    <select class="form-control" name="txtTingreso" id="txtTingreso">
        @if (isset($ingresos->id_tipo_ingreso))
            <option value=" {{ $ingresos->id_tipo_ingreso }} ">{{ $ingresos->tipo_ingresos->desc_tipo_ingreso }}</option>
            <option>_________________________</option>
        @else
            <option selected>Selecciones Un Tipo Ingreso</option>
        @endif
        @foreach ($tipoingresos as $tipoingreso)
            <option value="{{ $tipoingreso->id_tipo_ingreso }}">{{ $tipoingreso->desc_tipo_ingreso }}</option>
        @endforeach
    </select>
    @error('txtTingreso')
        {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="">Descripcion Ingreso</label>
    <input type="text" name="txtDescingreso" id="txtDescingreso" class="form-control" placeholder=""
        aria-describedby="helpId" value="{{ isset($ingresos->desc_ingreso) ? $ingresos->desc_ingreso : old('txtDescingreso') }}">
    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    @error('txtDescingreso')
        {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="">Valor Ingreso</label>
    <input type="text" name="txtVlringreso" id="txtVlringreso" class="form-control" placeholder=""
        aria-describedby="helpId"
        value="{{ isset($ingresos->valor_ingreso) ? $ingresos->valor_ingreso : old('txtVlringreso') }}">
   {{--  <small id="helpId" class="text-muted">Help text</small> --}}
    @error('txtVlringreso')
        {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="">Fecha Ingreso</label>
    <input type="date" name="txtFingreso" id="txtFingreso" class="form-control" placeholder=""
        aria-describedby="helpId" value="{{ isset($ingresos->f_ingreso) ? date('Y-m-d',strtotime($ingresos->f_ingreso)) : old('txtFingreso') }}">
    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    @error('txtFingreso')
        {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="">observacion</label>
    <input type="text" name="txtObsev" id="txtObsev" class="form-control" placeholder="" aria-describedby="helpId"
        value="{{ isset($ingresos->obs_ingreso) ? $ingresos->obs_ingreso : old('txtObsev') }}">
    {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    @error('txtObsev')
        {{ $message }}
    @enderror
</div>
<input class="btn btn-primary" type="submit" value="{{ $ejecutar }}">
<a href="{{ url('/ingresos') }}" class="btn btn-danger">Regresar</a>
