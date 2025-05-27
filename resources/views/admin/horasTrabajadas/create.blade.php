@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.horasTrabajada.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.horas-trabajadas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="empleado_id">{{ trans('cruds.horasTrabajada.fields.empleado') }}</label>
                <select class="form-control select2 {{ $errors->has('empleado') ? 'is-invalid' : '' }}" name="empleado_id" id="empleado_id" required>
                    @foreach($empleados as $id => $entry)
                        <option value="{{ $id }}" {{ old('empleado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('empleado'))
                    <span class="text-danger">{{ $errors->first('empleado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horasTrabajada.fields.empleado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contrato_laboral_id">{{ trans('cruds.horasTrabajada.fields.contrato_laboral') }}</label>
                <select class="form-control select2 {{ $errors->has('contrato_laboral') ? 'is-invalid' : '' }}" name="contrato_laboral_id" id="contrato_laboral_id" required>
                    @foreach($contrato_laborals as $id => $entry)
                        <option value="{{ $id }}" {{ old('contrato_laboral_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contrato_laboral'))
                    <span class="text-danger">{{ $errors->first('contrato_laboral') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horasTrabajada.fields.contrato_laboral_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.horasTrabajada.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                @if($errors->has('fecha'))
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horasTrabajada.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="horas">{{ trans('cruds.horasTrabajada.fields.horas') }}</label>
                <input class="form-control {{ $errors->has('horas') ? 'is-invalid' : '' }}" type="number" name="horas" id="horas" value="{{ old('horas', '') }}" step="0.01" required>
                @if($errors->has('horas'))
                    <span class="text-danger">{{ $errors->first('horas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horasTrabajada.fields.horas_helper') }}</span>
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