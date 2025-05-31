@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.asistenciaCharla.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asistencia-charlas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('presente') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="presente" value="0">
                    <input class="form-check-input" type="checkbox" name="presente" id="presente" value="1" {{ old('presente', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="presente">{{ trans('cruds.asistenciaCharla.fields.presente') }}</label>
                </div>
                @if($errors->has('presente'))
                    <span class="text-danger">{{ $errors->first('presente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaCharla.fields.presente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="charlas">{{ trans('cruds.asistenciaCharla.fields.charla') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('charlas') ? 'is-invalid' : '' }}" name="charlas[]" id="charlas" multiple>
                    @foreach($charlas as $id => $charla)
                        <option value="{{ $id }}" {{ in_array($id, old('charlas', [])) ? 'selected' : '' }}>{{ $charla }}</option>
                    @endforeach
                </select>
                @if($errors->has('charlas'))
                    <span class="text-danger">{{ $errors->first('charlas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaCharla.fields.charla_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="empleados">{{ trans('cruds.asistenciaCharla.fields.empleado') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('empleados') ? 'is-invalid' : '' }}" name="empleados[]" id="empleados" multiple>
                    @foreach($empleados as $id => $empleado)
                        <option value="{{ $id }}" {{ in_array($id, old('empleados', [])) ? 'selected' : '' }}>{{ $empleado }}</option>
                    @endforeach
                </select>
                @if($errors->has('empleados'))
                    <span class="text-danger">{{ $errors->first('empleados') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaCharla.fields.empleado_helper') }}</span>
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