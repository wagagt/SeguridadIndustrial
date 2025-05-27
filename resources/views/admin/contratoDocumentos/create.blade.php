@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contratoDocumento.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contrato-documentos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.contratoDocumento.fields.tipo_documento') }}</label>
                <select class="form-control {{ $errors->has('tipo_documento') ? 'is-invalid' : '' }}" name="tipo_documento" id="tipo_documento" required>
                    <option value disabled {{ old('tipo_documento', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ContratoDocumento::TIPO_DOCUMENTO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_documento', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_documento'))
                    <span class="text-danger">{{ $errors->first('tipo_documento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoDocumento.fields.tipo_documento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="archivo">{{ trans('cruds.contratoDocumento.fields.archivo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('archivo') ? 'is-invalid' : '' }}" id="archivo-dropzone">
                </div>
                @if($errors->has('archivo'))
                    <span class="text-danger">{{ $errors->first('archivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoDocumento.fields.archivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_subida">{{ trans('cruds.contratoDocumento.fields.fecha_subida') }}</label>
                <input class="form-control date {{ $errors->has('fecha_subida') ? 'is-invalid' : '' }}" type="text" name="fecha_subida" id="fecha_subida" value="{{ old('fecha_subida') }}" required>
                @if($errors->has('fecha_subida'))
                    <span class="text-danger">{{ $errors->first('fecha_subida') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoDocumento.fields.fecha_subida_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contrato_id">{{ trans('cruds.contratoDocumento.fields.contrato') }}</label>
                <select class="form-control select2 {{ $errors->has('contrato') ? 'is-invalid' : '' }}" name="contrato_id" id="contrato_id">
                    @foreach($contratos as $id => $entry)
                        <option value="{{ $id }}" {{ old('contrato_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contrato'))
                    <span class="text-danger">{{ $errors->first('contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoDocumento.fields.contrato_helper') }}</span>
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
    Dropzone.options.archivoDropzone = {
    url: '{{ route('admin.contrato-documentos.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="archivo"]').remove()
      $('form').append('<input type="hidden" name="archivo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="archivo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contratoDocumento) && $contratoDocumento->archivo)
      var file = {!! json_encode($contratoDocumento->archivo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="archivo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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