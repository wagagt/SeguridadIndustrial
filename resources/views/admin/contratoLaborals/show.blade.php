@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contratoLaboral.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contrato-laborals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.id') }}
                        </th>
                        <td>
                            {{ $contratoLaboral->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.numero_contrato') }}
                        </th>
                        <td>
                            {{ $contratoLaboral->numero_contrato }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $contratoLaboral->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.fecha_inicio') }}
                        </th>
                        <td>
                            {{ $contratoLaboral->fecha_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.fecha_fin') }}
                        </th>
                        <td>
                            {{ $contratoLaboral->fecha_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\ContratoLaboral::ESTADO_SELECT[$contratoLaboral->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.cliente') }}
                        </th>
                        <td>
                            {{ $contratoLaboral->cliente->nombre ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contrato-laborals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection