@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.agregarCliente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.agregar-clientes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.agregarCliente.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarCliente.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_encargado">{{ trans('cruds.agregarCliente.fields.nombre_encargado') }}</label>
                <input class="form-control {{ $errors->has('nombre_encargado') ? 'is-invalid' : '' }}" type="text" name="nombre_encargado" id="nombre_encargado" value="{{ old('nombre_encargado', '') }}" required>
                @if($errors->has('nombre_encargado'))
                    <span class="text-danger">{{ $errors->first('nombre_encargado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarCliente.fields.nombre_encargado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono">{{ trans('cruds.agregarCliente.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="number" name="telefono" id="telefono" value="{{ old('telefono', '') }}" step="1" required>
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarCliente.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="correo">{{ trans('cruds.agregarCliente.fields.correo') }}</label>
                <input class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" type="email" name="correo" id="correo" value="{{ old('correo') }}" required>
                @if($errors->has('correo'))
                    <span class="text-danger">{{ $errors->first('correo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarCliente.fields.correo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="direccion">{{ trans('cruds.agregarCliente.fields.direccion') }}</label>
                <input class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" type="text" name="direccion" id="direccion" value="{{ old('direccion', '') }}" required>
                @if($errors->has('direccion'))
                    <span class="text-danger">{{ $errors->first('direccion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.agregarCliente.fields.direccion_helper') }}</span>
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