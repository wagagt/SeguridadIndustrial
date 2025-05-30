@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
          Agregar categoría de herramienta
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categoria-herramienta.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre_categoria">{{ trans('cruds.categoriaHerramientum.fields.nombre_categoria') }}</label>
                <input class="form-control {{ $errors->has('nombre_categoria') ? 'is-invalid' : '' }}" type="text" name="nombre_categoria" id="nombre_categoria" value="{{ old('nombre_categoria', '') }}" required>
                @if($errors->has('nombre_categoria'))
                    <span class="text-danger">{{ $errors->first('nombre_categoria') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.categoriaHerramientum.fields.nombre_categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.categoriaHerramientum.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}">
                @if($errors->has('descripcion'))
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.categoriaHerramientum.fields.descripcion_helper') }}</span>
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