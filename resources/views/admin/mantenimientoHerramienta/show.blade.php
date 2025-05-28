@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mantenimientoHerramientum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mantenimiento-herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.id') }}
                        </th>
                        <td>
                            {{ $mantenimientoHerramientum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.herramienta') }}
                        </th>
                        <td>
                            {{ $mantenimientoHerramientum->herramienta->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.tipo_mantenimiento') }}
                        </th>
                        <td>
                            {{ App\Models\MantenimientoHerramientum::TIPO_MANTENIMIENTO_SELECT[$mantenimientoHerramientum->tipo_mantenimiento] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.fecha_mantenimiento') }}
                        </th>
                        <td>
                            {{ $mantenimientoHerramientum->fecha_mantenimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $mantenimientoHerramientum->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.resultado') }}
                        </th>
                        <td>
                            {{ $mantenimientoHerramientum->resultado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.notificado') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mantenimientoHerramientum->notificado ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mantenimiento-herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection