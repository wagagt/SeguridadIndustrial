@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reciboPago.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.recibo-pagos.update", [$reciboPago->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="empleado_id">{{ trans('cruds.reciboPago.fields.empleado') }}</label>
                <select class="form-control select2 {{ $errors->has('empleado') ? 'is-invalid' : '' }}" name="empleado_id" id="empleado_id" required>
                    @foreach($empleados as $id => $entry)
                        <option value="{{ $id }}" {{ (old('empleado_id') ? old('empleado_id') : $reciboPago->empleado->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('empleado'))
                    <span class="text-danger">{{ $errors->first('empleado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.empleado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="numero_recibo">{{ trans('cruds.reciboPago.fields.numero_recibo') }}</label>
                <input class="form-control {{ $errors->has('numero_recibo') ? 'is-invalid' : '' }}" type="text" name="numero_recibo" id="numero_recibo" value="{{ old('numero_recibo', $reciboPago->numero_recibo) }}" required>
                @if($errors->has('numero_recibo'))
                    <span class="text-danger">{{ $errors->first('numero_recibo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.numero_recibo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_emision">{{ trans('cruds.reciboPago.fields.fecha_emision') }}</label>
                <input class="form-control date {{ $errors->has('fecha_emision') ? 'is-invalid' : '' }}" type="text" name="fecha_emision" id="fecha_emision" value="{{ old('fecha_emision', $reciboPago->fecha_emision) }}" required>
                @if($errors->has('fecha_emision'))
                    <span class="text-danger">{{ $errors->first('fecha_emision') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.fecha_emision_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="periodo_fin">{{ trans('cruds.reciboPago.fields.periodo_fin') }}</label>
                <input class="form-control date {{ $errors->has('periodo_fin') ? 'is-invalid' : '' }}" type="text" name="periodo_fin" id="periodo_fin" value="{{ old('periodo_fin', $reciboPago->periodo_fin) }}" required>
                @if($errors->has('periodo_fin'))
                    <span class="text-danger">{{ $errors->first('periodo_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.periodo_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salario_base">{{ trans('cruds.reciboPago.fields.salario_base') }}</label>
                <input class="form-control {{ $errors->has('salario_base') ? 'is-invalid' : '' }}" type="number" name="salario_base" id="salario_base" value="{{ old('salario_base', $reciboPago->salario_base) }}" step="0.01" required>
                @if($errors->has('salario_base'))
                    <span class="text-danger">{{ $errors->first('salario_base') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.salario_base_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="horas_trabajadas">{{ trans('cruds.reciboPago.fields.horas_trabajadas') }}</label>
                <input class="form-control {{ $errors->has('horas_trabajadas') ? 'is-invalid' : '' }}" type="number" name="horas_trabajadas" id="horas_trabajadas" value="{{ old('horas_trabajadas', $reciboPago->horas_trabajadas) }}" step="1">
                @if($errors->has('horas_trabajadas'))
                    <span class="text-danger">{{ $errors->first('horas_trabajadas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.horas_trabajadas_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pago_horas_extras">{{ trans('cruds.reciboPago.fields.pago_horas_extras') }}</label>
                <input class="form-control {{ $errors->has('pago_horas_extras') ? 'is-invalid' : '' }}" type="number" name="pago_horas_extras" id="pago_horas_extras" value="{{ old('pago_horas_extras', $reciboPago->pago_horas_extras) }}" step="0.01">
                @if($errors->has('pago_horas_extras'))
                    <span class="text-danger">{{ $errors->first('pago_horas_extras') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.pago_horas_extras_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_bonificaciones">{{ trans('cruds.reciboPago.fields.total_bonificaciones') }}</label>
                <input class="form-control {{ $errors->has('total_bonificaciones') ? 'is-invalid' : '' }}" type="number" name="total_bonificaciones" id="total_bonificaciones" value="{{ old('total_bonificaciones', $reciboPago->total_bonificaciones) }}" step="0.01">
                @if($errors->has('total_bonificaciones'))
                    <span class="text-danger">{{ $errors->first('total_bonificaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.total_bonificaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_comisiones">{{ trans('cruds.reciboPago.fields.total_comisiones') }}</label>
                <input class="form-control {{ $errors->has('total_comisiones') ? 'is-invalid' : '' }}" type="number" name="total_comisiones" id="total_comisiones" value="{{ old('total_comisiones', $reciboPago->total_comisiones) }}" step="0.01">
                @if($errors->has('total_comisiones'))
                    <span class="text-danger">{{ $errors->first('total_comisiones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.total_comisiones_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_ingresos">{{ trans('cruds.reciboPago.fields.otros_ingresos') }}</label>
                <input class="form-control {{ $errors->has('otros_ingresos') ? 'is-invalid' : '' }}" type="number" name="otros_ingresos" id="otros_ingresos" value="{{ old('otros_ingresos', $reciboPago->otros_ingresos) }}" step="0.01">
                @if($errors->has('otros_ingresos'))
                    <span class="text-danger">{{ $errors->first('otros_ingresos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.otros_ingresos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descuento_igss">{{ trans('cruds.reciboPago.fields.descuento_igss') }}</label>
                <input class="form-control {{ $errors->has('descuento_igss') ? 'is-invalid' : '' }}" type="number" name="descuento_igss" id="descuento_igss" value="{{ old('descuento_igss', $reciboPago->descuento_igss) }}" step="0.01">
                @if($errors->has('descuento_igss'))
                    <span class="text-danger">{{ $errors->first('descuento_igss') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.descuento_igss_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descuento_isr">{{ trans('cruds.reciboPago.fields.descuento_isr') }}</label>
                <input class="form-control {{ $errors->has('descuento_isr') ? 'is-invalid' : '' }}" type="number" name="descuento_isr" id="descuento_isr" value="{{ old('descuento_isr', $reciboPago->descuento_isr) }}" step="0.01">
                @if($errors->has('descuento_isr'))
                    <span class="text-danger">{{ $errors->first('descuento_isr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.descuento_isr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descuentos_prestamos">{{ trans('cruds.reciboPago.fields.descuentos_prestamos') }}</label>
                <input class="form-control {{ $errors->has('descuentos_prestamos') ? 'is-invalid' : '' }}" type="number" name="descuentos_prestamos" id="descuentos_prestamos" value="{{ old('descuentos_prestamos', $reciboPago->descuentos_prestamos) }}" step="0.01">
                @if($errors->has('descuentos_prestamos'))
                    <span class="text-danger">{{ $errors->first('descuentos_prestamos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.descuentos_prestamos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descuentos_faltas_retardos">{{ trans('cruds.reciboPago.fields.descuentos_faltas_retardos') }}</label>
                <input class="form-control {{ $errors->has('descuentos_faltas_retardos') ? 'is-invalid' : '' }}" type="number" name="descuentos_faltas_retardos" id="descuentos_faltas_retardos" value="{{ old('descuentos_faltas_retardos', $reciboPago->descuentos_faltas_retardos) }}" step="0.01">
                @if($errors->has('descuentos_faltas_retardos'))
                    <span class="text-danger">{{ $errors->first('descuentos_faltas_retardos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.descuentos_faltas_retardos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_descuentos">{{ trans('cruds.reciboPago.fields.otros_descuentos') }}</label>
                <input class="form-control {{ $errors->has('otros_descuentos') ? 'is-invalid' : '' }}" type="number" name="otros_descuentos" id="otros_descuentos" value="{{ old('otros_descuentos', $reciboPago->otros_descuentos) }}" step="0.01">
                @if($errors->has('otros_descuentos'))
                    <span class="text-danger">{{ $errors->first('otros_descuentos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.otros_descuentos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_ingresos">{{ trans('cruds.reciboPago.fields.total_ingresos') }}</label>
                <input class="form-control {{ $errors->has('total_ingresos') ? 'is-invalid' : '' }}" type="number" name="total_ingresos" id="total_ingresos" value="{{ old('total_ingresos', $reciboPago->total_ingresos) }}" step="0.01" required>
                @if($errors->has('total_ingresos'))
                    <span class="text-danger">{{ $errors->first('total_ingresos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.total_ingresos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_deducciones">{{ trans('cruds.reciboPago.fields.total_deducciones') }}</label>
                <input class="form-control {{ $errors->has('total_deducciones') ? 'is-invalid' : '' }}" type="number" name="total_deducciones" id="total_deducciones" value="{{ old('total_deducciones', $reciboPago->total_deducciones) }}" step="0.01" required>
                @if($errors->has('total_deducciones'))
                    <span class="text-danger">{{ $errors->first('total_deducciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.total_deducciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salario_neto">{{ trans('cruds.reciboPago.fields.salario_neto') }}</label>
                <input class="form-control {{ $errors->has('salario_neto') ? 'is-invalid' : '' }}" type="number" name="salario_neto" id="salario_neto" value="{{ old('salario_neto', $reciboPago->salario_neto) }}" step="0.01" required>
                @if($errors->has('salario_neto'))
                    <span class="text-danger">{{ $errors->first('salario_neto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.salario_neto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.reciboPago.fields.metodo_pago') }}</label>
                <select class="form-control {{ $errors->has('metodo_pago') ? 'is-invalid' : '' }}" name="metodo_pago" id="metodo_pago" required>
                    <option value disabled {{ old('metodo_pago', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ReciboPago::METODO_PAGO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('metodo_pago', $reciboPago->metodo_pago) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('metodo_pago'))
                    <span class="text-danger">{{ $errors->first('metodo_pago') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.metodo_pago_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banco">{{ trans('cruds.reciboPago.fields.banco') }}</label>
                <input class="form-control {{ $errors->has('banco') ? 'is-invalid' : '' }}" type="text" name="banco" id="banco" value="{{ old('banco', $reciboPago->banco) }}">
                @if($errors->has('banco'))
                    <span class="text-danger">{{ $errors->first('banco') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.banco_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_cuenta">{{ trans('cruds.reciboPago.fields.numero_cuenta') }}</label>
                <input class="form-control {{ $errors->has('numero_cuenta') ? 'is-invalid' : '' }}" type="text" name="numero_cuenta" id="numero_cuenta" value="{{ old('numero_cuenta', $reciboPago->numero_cuenta) }}">
                @if($errors->has('numero_cuenta'))
                    <span class="text-danger">{{ $errors->first('numero_cuenta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.numero_cuenta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.reciboPago.fields.observaciones') }}</label>
                <input class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $reciboPago->observaciones) }}">
                @if($errors->has('observaciones'))
                    <span class="text-danger">{{ $errors->first('observaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('firma_empleado') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="firma_empleado" value="0">
                    <input class="form-check-input" type="checkbox" name="firma_empleado" id="firma_empleado" value="1" {{ $reciboPago->firma_empleado || old('firma_empleado', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="firma_empleado">{{ trans('cruds.reciboPago.fields.firma_empleado') }}</label>
                </div>
                @if($errors->has('firma_empleado'))
                    <span class="text-danger">{{ $errors->first('firma_empleado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.firma_empleado_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('firma_rrhh') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="firma_rrhh" value="0">
                    <input class="form-check-input" type="checkbox" name="firma_rrhh" id="firma_rrhh" value="1" {{ $reciboPago->firma_rrhh || old('firma_rrhh', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="firma_rrhh">{{ trans('cruds.reciboPago.fields.firma_rrhh') }}</label>
                </div>
                @if($errors->has('firma_rrhh'))
                    <span class="text-danger">{{ $errors->first('firma_rrhh') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.firma_rrhh_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_contrato_laboral">{{ trans('cruds.reciboPago.fields.numero_contrato_laboral') }}</label>
                <input class="form-control {{ $errors->has('numero_contrato_laboral') ? 'is-invalid' : '' }}" type="text" name="numero_contrato_laboral" id="numero_contrato_laboral" value="{{ old('numero_contrato_laboral', $reciboPago->numero_contrato_laboral) }}">
                @if($errors->has('numero_contrato_laboral'))
                    <span class="text-danger">{{ $errors->first('numero_contrato_laboral') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.numero_contrato_laboral_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recibo_pago">{{ trans('cruds.reciboPago.fields.recibo_pago') }}</label>
                <div class="needsclick dropzone {{ $errors->has('recibo_pago') ? 'is-invalid' : '' }}" id="recibo_pago-dropzone">
                </div>
                @if($errors->has('recibo_pago'))
                    <span class="text-danger">{{ $errors->first('recibo_pago') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reciboPago.fields.recibo_pago_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedReciboPagoMap = {}
Dropzone.options.reciboPagoDropzone = {
    url: '{{ route('admin.recibo-pagos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="recibo_pago[]" value="' + response.name + '">')
      uploadedReciboPagoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedReciboPagoMap[file.name]
      }
      $('form').find('input[name="recibo_pago[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($reciboPago) && $reciboPago->recibo_pago)
      var files = {!! json_encode($reciboPago->recibo_pago) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="recibo_pago[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection