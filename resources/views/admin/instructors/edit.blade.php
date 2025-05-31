@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.instructor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.instructors.update", [$instructor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.instructor.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $instructor->nombre) }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.instructor.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="correo_electronico">{{ trans('cruds.instructor.fields.correo_electronico') }}</label>
                <input class="form-control {{ $errors->has('correo_electronico') ? 'is-invalid' : '' }}" type="email" name="correo_electronico" id="correo_electronico" value="{{ old('correo_electronico', $instructor->correo_electronico) }}" required>
                @if($errors->has('correo_electronico'))
                    <span class="text-danger">{{ $errors->first('correo_electronico') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.instructor.fields.correo_electronico_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telefono">{{ trans('cruds.instructor.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', $instructor->telefono) }}" required>
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.instructor.fields.telefono_helper') }}</span>
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