@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.usoHerramientum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.uso-herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.id') }}
                        </th>
                        <td>
                            {{ $usoHerramientum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.herramienta') }}
                        </th>
                        <td>
                            {{ $usoHerramientum->herramienta->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.empleado') }}
                        </th>
                        <td>
                            {{ $usoHerramientum->empleado->nombre_completo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.contrato') }}
                        </th>
                        <td>
                            {{ $usoHerramientum->contrato->numero_contrato ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.fecha_inicio') }}
                        </th>
                        <td>
                            {{ $usoHerramientum->fecha_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.fecha_fin') }}
                        </th>
                        <td>
                            {{ $usoHerramientum->fecha_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.duracion_horas') }}
                        </th>
                        <td>
                            {{ $usoHerramientum->duracion_horas }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.uso-herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection