@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Editar uso de herramienta
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.uso-herramienta.update", [$usoHerramientum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="herramienta_id">{{ trans('cruds.usoHerramientum.fields.herramienta') }}</label>
                <select class="form-control select2 {{ $errors->has('herramienta') ? 'is-invalid' : '' }}" name="herramienta_id" id="herramienta_id" required>
                    @foreach($herramientas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('herramienta_id') ? old('herramienta_id') : $usoHerramientum->herramienta->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('herramienta'))
                    <span class="text-danger">{{ $errors->first('herramienta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usoHerramientum.fields.herramienta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="empleado_id">{{ trans('cruds.usoHerramientum.fields.empleado') }}</label>
                <select class="form-control select2 {{ $errors->has('empleado') ? 'is-invalid' : '' }}" name="empleado_id" id="empleado_id" required>
                    @foreach($empleados as $id => $entry)
                        <option value="{{ $id }}" {{ (old('empleado_id') ? old('empleado_id') : $usoHerramientum->empleado->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('empleado'))
                    <span class="text-danger">{{ $errors->first('empleado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usoHerramientum.fields.empleado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contrato_id">{{ trans('cruds.usoHerramientum.fields.contrato') }}</label>
                <select class="form-control select2 {{ $errors->has('contrato') ? 'is-invalid' : '' }}" name="contrato_id" id="contrato_id" required>
                    @foreach($contratos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('contrato_id') ? old('contrato_id') : $usoHerramientum->contrato->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contrato'))
                    <span class="text-danger">{{ $errors->first('contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usoHerramientum.fields.contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_inicio">{{ trans('cruds.usoHerramientum.fields.fecha_inicio') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicio') ? 'is-invalid' : '' }}" type="text" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio', $usoHerramientum->fecha_inicio) }}" required>
                @if($errors->has('fecha_inicio'))
                    <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usoHerramientum.fields.fecha_inicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_fin">{{ trans('cruds.usoHerramientum.fields.fecha_fin') }}</label>
                <input class="form-control date {{ $errors->has('fecha_fin') ? 'is-invalid' : '' }}" type="text" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin', $usoHerramientum->fecha_fin) }}" required>
                @if($errors->has('fecha_fin'))
                    <span class="text-danger">{{ $errors->first('fecha_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usoHerramientum.fields.fecha_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duracion_horas">{{ trans('cruds.usoHerramientum.fields.duracion_horas') }}</label>
                <input class="form-control {{ $errors->has('duracion_horas') ? 'is-invalid' : '' }}" type="number" name="duracion_horas" id="duracion_horas" value="{{ old('duracion_horas', $usoHerramientum->duracion_horas) }}" step="1" required>
                @if($errors->has('duracion_horas'))
                    <span class="text-danger">{{ $errors->first('duracion_horas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usoHerramientum.fields.duracion_horas_helper') }}</span>
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