@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.documentoEmpleado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.documento-empleados.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="empleado_id">{{ trans('cruds.documentoEmpleado.fields.empleado') }}</label>
                <select class="form-control select2 {{ $errors->has('empleado') ? 'is-invalid' : '' }}" name="empleado_id" id="empleado_id" required>
                    @foreach($empleados as $id => $entry)
                        <option value="{{ $id }}" {{ old('empleado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('empleado'))
                    <span class="text-danger">{{ $errors->first('empleado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentoEmpleado.fields.empleado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.documentoEmpleado.fields.tipo_documento') }}</label>
                <select class="form-control {{ $errors->has('tipo_documento') ? 'is-invalid' : '' }}" name="tipo_documento" id="tipo_documento" required>
                    <option value disabled {{ old('tipo_documento', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\DocumentoEmpleado::TIPO_DOCUMENTO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_documento', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_documento'))
                    <span class="text-danger">{{ $errors->first('tipo_documento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentoEmpleado.fields.tipo_documento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="archivo">{{ trans('cruds.documentoEmpleado.fields.archivo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('archivo') ? 'is-invalid' : '' }}" id="archivo-dropzone">
                </div>
                @if($errors->has('archivo'))
                    <span class="text-danger">{{ $errors->first('archivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentoEmpleado.fields.archivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_emision">{{ trans('cruds.documentoEmpleado.fields.fecha_emision') }}</label>
                <input class="form-control date {{ $errors->has('fecha_emision') ? 'is-invalid' : '' }}" type="text" name="fecha_emision" id="fecha_emision" value="{{ old('fecha_emision') }}" required>
                @if($errors->has('fecha_emision'))
                    <span class="text-danger">{{ $errors->first('fecha_emision') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentoEmpleado.fields.fecha_emision_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_vencimiento">{{ trans('cruds.documentoEmpleado.fields.fecha_vencimiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_vencimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_vencimiento" id="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}">
                @if($errors->has('fecha_vencimiento'))
                    <span class="text-danger">{{ $errors->first('fecha_vencimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.documentoEmpleado.fields.fecha_vencimiento_helper') }}</span>
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
    var uploadedArchivoMap = {}
Dropzone.options.archivoDropzone = {
    url: '{{ route('admin.documento-empleados.storeMedia') }}',
    maxFilesize: 4, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="archivo[]" value="' + response.name + '">')
      uploadedArchivoMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedArchivoMap[file.name]
      }
      $('form').find('input[name="archivo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($documentoEmpleado) && $documentoEmpleado->archivo)
          var files =
            {!! json_encode($documentoEmpleado->archivo) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="archivo[]" value="' + file.file_name + '">')
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