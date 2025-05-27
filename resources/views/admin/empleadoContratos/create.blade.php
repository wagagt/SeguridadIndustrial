@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.empleadoContrato.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.empleado-contratos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="empleado_id">{{ trans('cruds.empleadoContrato.fields.empleado') }}</label>
                <select class="form-control select2 {{ $errors->has('empleado') ? 'is-invalid' : '' }}" name="empleado_id" id="empleado_id" required>
                    @foreach($empleados as $id => $entry)
                        <option value="{{ $id }}" {{ old('empleado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('empleado'))
                    <span class="text-danger">{{ $errors->first('empleado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleadoContrato.fields.empleado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contrato_laboral_id">{{ trans('cruds.empleadoContrato.fields.contrato_laboral') }}</label>
                <select class="form-control select2 {{ $errors->has('contrato_laboral') ? 'is-invalid' : '' }}" name="contrato_laboral_id" id="contrato_laboral_id" required>
                    @foreach($contrato_laborals as $id => $entry)
                        <option value="{{ $id }}" {{ old('contrato_laboral_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contrato_laboral'))
                    <span class="text-danger">{{ $errors->first('contrato_laboral') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleadoContrato.fields.contrato_laboral_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_asignacion">{{ trans('cruds.empleadoContrato.fields.fecha_asignacion') }}</label>
                <input class="form-control date {{ $errors->has('fecha_asignacion') ? 'is-invalid' : '' }}" type="text" name="fecha_asignacion" id="fecha_asignacion" value="{{ old('fecha_asignacion') }}" required>
                @if($errors->has('fecha_asignacion'))
                    <span class="text-danger">{{ $errors->first('fecha_asignacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleadoContrato.fields.fecha_asignacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_retiro">{{ trans('cruds.empleadoContrato.fields.fecha_retiro') }}</label>
                <input class="form-control date {{ $errors->has('fecha_retiro') ? 'is-invalid' : '' }}" type="text" name="fecha_retiro" id="fecha_retiro" value="{{ old('fecha_retiro') }}">
                @if($errors->has('fecha_retiro'))
                    <span class="text-danger">{{ $errors->first('fecha_retiro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.empleadoContrato.fields.fecha_retiro_helper') }}</span>
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