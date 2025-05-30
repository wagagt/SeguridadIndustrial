@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       {{ trans('cruds.agregarEmpleado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.agregar-empleados.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_completo">{{ trans('cruds.agregarEmpleado.fields.nombre_completo') }}</label>
                <input class="form-control {{ $errors->has('nombre_completo') ? 'is-invalid' : '' }}" type="text" name="nombre_completo" id="nombre_completo" value="{{ old('nombre_completo', '') }}" required>
                @if($errors->has('nombre_completo'))
                    <span class="text-danger">{{ $errors->first('nombre_completo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.nombre_completo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="numero_identificacion">{{ trans('cruds.agregarEmpleado.fields.numero_identificacion') }}</label>
                <input class="form-control {{ $errors->has('numero_identificacion') ? 'is-invalid' : '' }}" type="text" name="numero_identificacion" id="numero_identificacion" value="{{ old('numero_identificacion', '') }}" required>
                @if($errors->has('numero_identificacion'))
                    <span class="text-danger">{{ $errors->first('numero_identificacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.numero_identificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cargo_id">{{ trans('cruds.agregarEmpleado.fields.cargo') }}</label>
                <select class="form-control select2 {{ $errors->has('cargo') ? 'is-invalid' : '' }}" name="cargo_id" id="cargo_id">
                    @foreach($cargos as $id => $entry)
                        <option value="{{ $id }}" {{ old('cargo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cargo'))
                    <span class="text-danger">{{ $errors->first('cargo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.cargo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="departamento_id">{{ trans('cruds.agregarEmpleado.fields.departamento') }}</label>
                <select class="form-control select2 {{ $errors->has('departamento') ? 'is-invalid' : '' }}" name="departamento_id" id="departamento_id">
                    @foreach($departamentos as $id => $entry)
                        <option value="{{ $id }}" {{ old('departamento_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('departamento'))
                    <span class="text-danger">{{ $errors->first('departamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.departamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codigo_seguridad_social">{{ trans('cruds.agregarEmpleado.fields.codigo_seguridad_social') }}</label>
                <input class="form-control {{ $errors->has('codigo_seguridad_social') ? 'is-invalid' : '' }}" type="text" name="codigo_seguridad_social" id="codigo_seguridad_social" value="{{ old('codigo_seguridad_social', '') }}">
                @if($errors->has('codigo_seguridad_social'))
                    <span class="text-danger">{{ $errors->first('codigo_seguridad_social') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.codigo_seguridad_social_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_ingreso">{{ trans('cruds.agregarEmpleado.fields.fecha_ingreso') }}</label>
                <input class="form-control date {{ $errors->has('fecha_ingreso') ? 'is-invalid' : '' }}" type="text" name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso') }}" required>
                @if($errors->has('fecha_ingreso'))
                    <span class="text-danger">{{ $errors->first('fecha_ingreso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.fecha_ingreso_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otros_datos_personales">{{ trans('cruds.agregarEmpleado.fields.otros_datos_personales') }}</label>
                <textarea class="form-control {{ $errors->has('otros_datos_personales') ? 'is-invalid' : '' }}" name="otros_datos_personales" id="otros_datos_personales">{{ old('otros_datos_personales') }}</textarea>
                @if($errors->has('otros_datos_personales'))
                    <span class="text-danger">{{ $errors->first('otros_datos_personales') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarEmpleado.fields.otros_datos_personales_helper') }}</span>
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