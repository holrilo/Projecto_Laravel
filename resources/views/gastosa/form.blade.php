<div class="form-group">
    <label for="">Tipo de Gasto</label>
    <select class="form-control" name="txtTgasto" id="txtTgasto">
        @if (isset($gastos->id_tipo_gasto))
            <option value=" {{ $gastos->id_tipo_gasto }} ">{{ $gastos->tipo_gastos->desc_tipo_gasto }}</option>
            <option >_________________________</option>
            <option value=" ">Ninguno</option>
        @else
            <option selected>Selecciones Un Tipo Gasto</option>
        @endif
        @foreach ($tipogastos as $tipogasto)
            <option value="{{ $tipogasto->id_tipo_gasto }}">{{ $tipogasto->desc_tipo_gasto }}</option>
        @endforeach
    </select>
    @error('txtTgasto')
        {{$message}}
    @enderror
</div>
<div class="form-group">
  <label for="">Descripcion Gasto</label>
  <input type="text" name="txtDescgasto" id="txtDescgasto" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($gastos->desc_gasto) ? $gastos->desc_gasto : old('txtDescgasto')}}">
  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
  @error('txtDescgasto')
  {{$message}}
@enderror
</div>
<div class="form-group">
  <label for="">Valor Gasto</label>
  <input type="text" name="txtVlrgasto" id="txtVlrgasto" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($gastos->valor_gasto) ? $gastos->valor_gasto : old('txtVlrgasto')}}">
  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
  @error('txtVlrgasto')
  {{$message}}
@enderror
</div>
<div class="form-group">
  <label for="">Fecha Gasto</label>
  <input type="date" name="txtFgasto" id="txtFgasto" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($gastos->f_gasto) ? date('Y-m-d', strtotime($gastos->f_gasto)) : old('txtFgasto')}}">
  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
  @error('txtFgasto')
  {{$message}}
@enderror
</div>
<div class="form-group">
  <label for="">observacion</label>
  <input type="text" name="txtObsev" id="txtObsev" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($gastos->obs_gasto) ? $gastos->obs_gasto : old('txtObsev')}}">
  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
  @error('txtObsev')
  {{$message}}
@enderror
</div>
{{-- <div class="form-group">
    <label for="">Descontado del Ingreso</label>
    <input type="text" name="txtIngre" id="txtIngre" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($gastos->id_ingreso) ? $gastos->id_ingreso : old('txtIngre')}}">
    <small id="helpId" class="text-muted">Help text</small>
    @error('txtIngre')
    {{$message}}
  @enderror
  </div> --}}
  <div class="form-group">
    <label for="">Descontado del Ingreso</label>
    <select class="form-control" name="txtIngre" id="txtIngre">
        @if (isset($gastos->id_ingreso))
            <option value=" {{ $gastos->id_ingreso }} ">{{ $gastos->tipo_ingresos->desc_ingreso ." - $ " . $gastos->tipo_ingresos->valor_ingreso }}</option>
            <option >_________________________</option>
        @else
            <option selected value=" ">Selecciones Un Ingreso</option>
        @endif
        @foreach ($ingresos as $ingreso)
            <option value="{{ $ingreso->id_ingreso }}">{{ $ingreso->desc_ingreso ." - $ " . $ingreso->valor_ingreso}}</option>
        @endforeach
    </select>
    @error('txtIngre')
        {{$message}}
    @enderror
</div>
<input class="btn btn-primary" type="submit" name="inpagar" id="inpagar" value="{{ $ejecutar }}">
<a href="{{ url('/gastosa')}}" class="btn btn-danger">Regresar</a>
