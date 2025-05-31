@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      {{ trans('cruds.agregarEmpleado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agregar-empleados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.id') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.nombre_completo') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->nombre_completo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.numero_identificacion') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->numero_identificacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.cargo') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->cargo->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.departamento') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->departamento->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.codigo_seguridad_social') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->codigo_seguridad_social }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.fecha_ingreso') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->fecha_ingreso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.otros_datos_personales') }}
                        </th>
                        <td>
                            {{ $agregarEmpleado->otros_datos_personales }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agregar-empleados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection