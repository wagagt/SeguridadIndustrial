@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asistenciaEntrenamiento.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia-entrenamientos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaEntrenamiento.fields.id') }}
                        </th>
                        <td>
                            {{ $asistenciaEntrenamiento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaEntrenamiento.fields.presente') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $asistenciaEntrenamiento->presente ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaEntrenamiento.fields.entrenamiento') }}
                        </th>
                        <td>
                            @foreach($asistenciaEntrenamiento->entrenamientos as $key => $entrenamiento)
                                <span class="label label-info">{{ $entrenamiento->tema }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaEntrenamiento.fields.empleado') }}
                        </th>
                        <td>
                            @foreach($asistenciaEntrenamiento->empleados as $key => $empleado)
                                <span class="label label-info">{{ $empleado->nombre_completo }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia-entrenamientos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection