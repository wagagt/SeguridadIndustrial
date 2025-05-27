@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.descripcionEntrenamiento.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.descripcion-entrenamientos.update", [$descripcionEntrenamiento->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tema">{{ trans('cruds.descripcionEntrenamiento.fields.tema') }}</label>
                <input class="form-control {{ $errors->has('tema') ? 'is-invalid' : '' }}" type="text" name="tema" id="tema" value="{{ old('tema', $descripcionEntrenamiento->tema) }}" required>
                @if($errors->has('tema'))
                    <span class="text-danger">{{ $errors->first('tema') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.descripcionEntrenamiento.fields.tema_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.descripcionEntrenamiento.fields.fecha') }}</label>
                <input class="form-control datetime {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $descripcionEntrenamiento->fecha) }}" required>
                @if($errors->has('fecha'))
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.descripcionEntrenamiento.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="instructor">{{ trans('cruds.descripcionEntrenamiento.fields.instructor') }}</label>
                <input class="form-control {{ $errors->has('instructor') ? 'is-invalid' : '' }}" type="text" name="instructor" id="instructor" value="{{ old('instructor', $descripcionEntrenamiento->instructor) }}" required>
                @if($errors->has('instructor'))
                    <span class="text-danger">{{ $errors->first('instructor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.descripcionEntrenamiento.fields.instructor_helper') }}</span>
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