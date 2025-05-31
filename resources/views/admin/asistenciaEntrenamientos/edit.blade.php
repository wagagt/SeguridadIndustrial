@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.asistenciaEntrenamiento.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asistencia-entrenamientos.update", [$asistenciaEntrenamiento->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('presente') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="presente" value="0">
                    <input class="form-check-input" type="checkbox" name="presente" id="presente" value="1" {{ $asistenciaEntrenamiento->presente || old('presente', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="presente">{{ trans('cruds.asistenciaEntrenamiento.fields.presente') }}</label>
                </div>
                @if($errors->has('presente'))
                    <span class="text-danger">{{ $errors->first('presente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaEntrenamiento.fields.presente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="entrenamientos">{{ trans('cruds.asistenciaEntrenamiento.fields.entrenamiento') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('entrenamientos') ? 'is-invalid' : '' }}" name="entrenamientos[]" id="entrenamientos" multiple>
                    @foreach($entrenamientos as $id => $entrenamiento)
                        <option value="{{ $id }}" {{ (in_array($id, old('entrenamientos', [])) || $asistenciaEntrenamiento->entrenamientos->contains($id)) ? 'selected' : '' }}>{{ $entrenamiento }}</option>
                    @endforeach
                </select>
                @if($errors->has('entrenamientos'))
                    <span class="text-danger">{{ $errors->first('entrenamientos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaEntrenamiento.fields.entrenamiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="empleados">{{ trans('cruds.asistenciaEntrenamiento.fields.empleado') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('empleados') ? 'is-invalid' : '' }}" name="empleados[]" id="empleados" multiple>
                    @foreach($empleados as $id => $empleado)
                        <option value="{{ $id }}" {{ (in_array($id, old('empleados', [])) || $asistenciaEntrenamiento->empleados->contains($id)) ? 'selected' : '' }}>{{ $empleado }}</option>
                    @endforeach
                </select>
                @if($errors->has('empleados'))
                    <span class="text-danger">{{ $errors->first('empleados') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asistenciaEntrenamiento.fields.empleado_helper') }}</span>
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