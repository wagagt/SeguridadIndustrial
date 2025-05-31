@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contratoDocumento.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contrato-documentos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.id') }}
                        </th>
                        <td>
                            {{ $contratoDocumento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.tipo_documento') }}
                        </th>
                        <td>
                            {{ App\Models\ContratoDocumento::TIPO_DOCUMENTO_SELECT[$contratoDocumento->tipo_documento] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.archivo') }}
                        </th>
                        <td>
                            @if($contratoDocumento->archivo)
                                <a href="{{ $contratoDocumento->archivo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.fecha_subida') }}
                        </th>
                        <td>
                            {{ $contratoDocumento->fecha_subida }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.contrato') }}
                        </th>
                        <td>
                            {{ $contratoDocumento->contrato->numero_contrato ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contrato-documentos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection