@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Agregar mantenimiento de herramienta
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mantenimiento-herramienta.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="herramienta_id">{{ trans('cruds.mantenimientoHerramientum.fields.herramienta') }}</label>
                <select class="form-control select2 {{ $errors->has('herramienta') ? 'is-invalid' : '' }}" name="herramienta_id" id="herramienta_id" required>
                    @foreach($herramientas as $id => $entry)
                        <option value="{{ $id }}" {{ old('herramienta_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('herramienta'))
                    <span class="text-danger">{{ $errors->first('herramienta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mantenimientoHerramientum.fields.herramienta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.mantenimientoHerramientum.fields.tipo_mantenimiento') }}</label>
                <select class="form-control {{ $errors->has('tipo_mantenimiento') ? 'is-invalid' : '' }}" name="tipo_mantenimiento" id="tipo_mantenimiento" required>
                    <option value disabled {{ old('tipo_mantenimiento', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MantenimientoHerramientum::TIPO_MANTENIMIENTO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_mantenimiento', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_mantenimiento'))
                    <span class="text-danger">{{ $errors->first('tipo_mantenimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mantenimientoHerramientum.fields.tipo_mantenimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_mantenimiento">{{ trans('cruds.mantenimientoHerramientum.fields.fecha_mantenimiento') }}</label>
                <input class="form-control date {{ $errors->has('fecha_mantenimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_mantenimiento" id="fecha_mantenimiento" value="{{ old('fecha_mantenimiento') }}" required>
                @if($errors->has('fecha_mantenimiento'))
                    <span class="text-danger">{{ $errors->first('fecha_mantenimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mantenimientoHerramientum.fields.fecha_mantenimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.mantenimientoHerramientum.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}">
                @if($errors->has('descripcion'))
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mantenimientoHerramientum.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resultado">{{ trans('cruds.mantenimientoHerramientum.fields.resultado') }}</label>
                <input class="form-control {{ $errors->has('resultado') ? 'is-invalid' : '' }}" type="text" name="resultado" id="resultado" value="{{ old('resultado', '') }}">
                @if($errors->has('resultado'))
                    <span class="text-danger">{{ $errors->first('resultado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mantenimientoHerramientum.fields.resultado_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('notificado') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="notificado" value="0">
                    <input class="form-check-input" type="checkbox" name="notificado" id="notificado" value="1" {{ old('notificado', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="notificado">{{ trans('cruds.mantenimientoHerramientum.fields.notificado') }}</label>
                </div>
                @if($errors->has('notificado'))
                    <span class="text-danger">{{ $errors->first('notificado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mantenimientoHerramientum.fields.notificado_helper') }}</span>
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