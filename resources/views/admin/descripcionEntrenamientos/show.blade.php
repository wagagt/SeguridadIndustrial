@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.descripcionEntrenamiento.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.descripcion-entrenamientos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.descripcionEntrenamiento.fields.id') }}
                        </th>
                        <td>
                            {{ $descripcionEntrenamiento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.descripcionEntrenamiento.fields.tema') }}
                        </th>
                        <td>
                            {{ $descripcionEntrenamiento->tema }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.descripcionEntrenamiento.fields.fecha') }}
                        </th>
                        <td>
                            {{ $descripcionEntrenamiento->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.descripcionEntrenamiento.fields.instructor') }}
                        </th>
                        <td>
                            {{ $descripcionEntrenamiento->instructor }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.descripcion-entrenamientos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection