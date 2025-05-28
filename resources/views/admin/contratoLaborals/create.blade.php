@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contratoLaboral.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contrato-laborals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="numero_contrato">{{ trans('cruds.contratoLaboral.fields.numero_contrato') }}</label>
                <input class="form-control {{ $errors->has('numero_contrato') ? 'is-invalid' : '' }}" type="text" name="numero_contrato" id="numero_contrato" value="{{ old('numero_contrato', '') }}" required>
                @if($errors->has('numero_contrato'))
                    <span class="text-danger">{{ $errors->first('numero_contrato') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoLaboral.fields.numero_contrato_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.contratoLaboral.fields.descripcion') }}</label>
                <textarea class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
                @if($errors->has('descripcion'))
                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoLaboral.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_inicio">{{ trans('cruds.contratoLaboral.fields.fecha_inicio') }}</label>
                <input class="form-control date {{ $errors->has('fecha_inicio') ? 'is-invalid' : '' }}" type="text" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                @if($errors->has('fecha_inicio'))
                    <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoLaboral.fields.fecha_inicio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_fin">{{ trans('cruds.contratoLaboral.fields.fecha_fin') }}</label>
                <input class="form-control date {{ $errors->has('fecha_fin') ? 'is-invalid' : '' }}" type="text" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}">
                @if($errors->has('fecha_fin'))
                    <span class="text-danger">{{ $errors->first('fecha_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoLaboral.fields.fecha_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.contratoLaboral.fields.estado') }}</label>
                <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado" required>
                    <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ContratoLaboral::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoLaboral.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cliente_id">{{ trans('cruds.contratoLaboral.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id" required>
                    @foreach($clientes as $id => $entry)
                        <option value="{{ $id }}" {{ old('cliente_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <span class="text-danger">{{ $errors->first('cliente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contratoLaboral.fields.cliente_helper') }}</span>
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