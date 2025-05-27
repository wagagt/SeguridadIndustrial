@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.horasTrabajada.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horas-trabajadas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.horasTrabajada.fields.id') }}
                        </th>
                        <td>
                            {{ $horasTrabajada->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horasTrabajada.fields.empleado') }}
                        </th>
                        <td>
                            {{ $horasTrabajada->empleado->nombre_completo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horasTrabajada.fields.contrato_laboral') }}
                        </th>
                        <td>
                            {{ $horasTrabajada->contrato_laboral->numero_contrato ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horasTrabajada.fields.fecha') }}
                        </th>
                        <td>
                            {{ $horasTrabajada->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horasTrabajada.fields.horas') }}
                        </th>
                        <td>
                            {{ $horasTrabajada->horas }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horas-trabajadas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection