@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.documentoEmpleado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documento-empleados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.id') }}
                        </th>
                        <td>
                            {{ $documentoEmpleado->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.empleado') }}
                        </th>
                        <td>
                            {{ $documentoEmpleado->empleado->nombre_completo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.tipo_documento') }}
                        </th>
                        <td>
                            {{ App\Models\DocumentoEmpleado::TIPO_DOCUMENTO_SELECT[$documentoEmpleado->tipo_documento] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.archivo') }}
                        </th>
                        <td>
                            @foreach($documentoEmpleado->archivo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.fecha_emision') }}
                        </th>
                        <td>
                            {{ $documentoEmpleado->fecha_emision }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.fecha_vencimiento') }}
                        </th>
                        <td>
                            {{ $documentoEmpleado->fecha_vencimiento }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documento-empleados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection