@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.herramientum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.id') }}
                        </th>
                        <td>
                            {{ $herramientum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.categoria') }}
                        </th>
                        <td>
                            {{ $herramientum->categoria->nombre_categoria ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.nombre') }}
                        </th>
                        <td>
                            {{ $herramientum->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $herramientum->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\Herramientum::ESTADO_SELECT[$herramientum->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.fecha_adquisicion') }}
                        </th>
                        <td>
                            {{ $herramientum->fecha_adquisicion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.horas_para_mantenimiento') }}
                        </th>
                        <td>
                            {{ $herramientum->horas_para_mantenimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.herramientum.fields.horas_acumuladas') }}
                        </th>
                        <td>
                            {{ $herramientum->horas_acumuladas }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection