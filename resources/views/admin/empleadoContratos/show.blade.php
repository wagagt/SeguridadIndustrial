@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.empleadoContrato.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.empleado-contratos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.empleadoContrato.fields.id') }}
                        </th>
                        <td>
                            {{ $empleadoContrato->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleadoContrato.fields.empleado') }}
                        </th>
                        <td>
                            {{ $empleadoContrato->empleado->nombre_completo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleadoContrato.fields.contrato_laboral') }}
                        </th>
                        <td>
                            {{ $empleadoContrato->contrato_laboral->numero_contrato ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleadoContrato.fields.fecha_asignacion') }}
                        </th>
                        <td>
                            {{ $empleadoContrato->fecha_asignacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.empleadoContrato.fields.fecha_retiro') }}
                        </th>
                        <td>
                            {{ $empleadoContrato->fecha_retiro }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.empleado-contratos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection