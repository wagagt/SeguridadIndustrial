@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asistenciaCharla.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia-charlas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.id') }}
                        </th>
                        <td>
                            {{ $asistenciaCharla->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.presente') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $asistenciaCharla->presente ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.charla') }}
                        </th>
                        <td>
                            @foreach($asistenciaCharla->charlas as $key => $charla)
                                <span class="label label-info">{{ $charla->tema }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.empleado') }}
                        </th>
                        <td>
                            @foreach($asistenciaCharla->empleados as $key => $empleado)
                                <span class="label label-info">{{ $empleado->nombre_completo }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asistencia-charlas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection