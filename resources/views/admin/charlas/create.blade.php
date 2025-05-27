@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.charla.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.charlas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tema">{{ trans('cruds.charla.fields.tema') }}</label>
                <input class="form-control {{ $errors->has('tema') ? 'is-invalid' : '' }}" type="text" name="tema" id="tema" value="{{ old('tema', '') }}" required>
                @if($errors->has('tema'))
                    <span class="text-danger">{{ $errors->first('tema') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.charla.fields.tema_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="instructor_id">{{ trans('cruds.charla.fields.instructor') }}</label>
                <select class="form-control select2 {{ $errors->has('instructor') ? 'is-invalid' : '' }}" name="instructor_id" id="instructor_id" required>
                    @foreach($instructors as $id => $entry)
                        <option value="{{ $id }}" {{ old('instructor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('instructor'))
                    <span class="text-danger">{{ $errors->first('instructor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.charla.fields.instructor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.charla.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                @if($errors->has('fecha'))
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.charla.fields.fecha_helper') }}</span>
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