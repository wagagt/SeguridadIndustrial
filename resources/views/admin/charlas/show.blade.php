@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.charla.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.charlas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.charla.fields.id') }}
                        </th>
                        <td>
                            {{ $charla->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charla.fields.tema') }}
                        </th>
                        <td>
                            {{ $charla->tema }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charla.fields.instructor') }}
                        </th>
                        <td>
                            {{ $charla->instructor->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charla.fields.fecha') }}
                        </th>
                        <td>
                            {{ $charla->fecha }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.charlas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection