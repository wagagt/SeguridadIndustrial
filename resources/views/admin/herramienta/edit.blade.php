@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.herramientum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.herramienta.update", [$herramientum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="categoria_id">{{ trans('cruds.herramientum.fields.categoria') }}</label>
                <select class="form-control select2 {{ $errors->has('categoria') ? 'is-invalid' : '' }}" name="categoria_id" id="categoria_id">
                    @foreach($categorias as $id => $entry)
                        <option value="{{ $id }}" {{ (old('categoria_id') ? old('categoria_id') : $herramientum->categoria->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('categoria'))
                    <span class="text-danger">{{ $errors->first('categoria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.herramientum.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $herramientum->nombre) }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.herramientum.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $herramientum->descripcion) }}">
                @if($errors->has('descripcion'))
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.herramientum.fields.estado') }}</label>
                <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado" required>
                    <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Herramientum::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado', $herramientum->estado) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_adquisicion">{{ trans('cruds.herramientum.fields.fecha_adquisicion') }}</label>
                <input class="form-control date {{ $errors->has('fecha_adquisicion') ? 'is-invalid' : '' }}" type="text" name="fecha_adquisicion" id="fecha_adquisicion" value="{{ old('fecha_adquisicion', $herramientum->fecha_adquisicion) }}">
                @if($errors->has('fecha_adquisicion'))
                    <span class="text-danger">{{ $errors->first('fecha_adquisicion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.fecha_adquisicion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="horas_para_mantenimiento">{{ trans('cruds.herramientum.fields.horas_para_mantenimiento') }}</label>
                <input class="form-control {{ $errors->has('horas_para_mantenimiento') ? 'is-invalid' : '' }}" type="number" name="horas_para_mantenimiento" id="horas_para_mantenimiento" value="{{ old('horas_para_mantenimiento', $herramientum->horas_para_mantenimiento) }}" step="1" required>
                @if($errors->has('horas_para_mantenimiento'))
                    <span class="text-danger">{{ $errors->first('horas_para_mantenimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.horas_para_mantenimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="horas_acumuladas">{{ trans('cruds.herramientum.fields.horas_acumuladas') }}</label>
                <input class="form-control {{ $errors->has('horas_acumuladas') ? 'is-invalid' : '' }}" type="number" name="horas_acumuladas" id="horas_acumuladas" value="{{ old('horas_acumuladas', $herramientum->horas_acumuladas) }}" step="1">
                @if($errors->has('horas_acumuladas'))
                    <span class="text-danger">{{ $errors->first('horas_acumuladas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.herramientum.fields.horas_acumuladas_helper') }}</span>
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