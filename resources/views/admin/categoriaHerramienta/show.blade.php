@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Mostrar categoría de herramienta
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categoria-herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriaHerramientum.fields.id') }}
                        </th>
                        <td>
                            {{ $categoriaHerramientum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriaHerramientum.fields.nombre_categoria') }}
                        </th>
                        <td>
                            {{ $categoriaHerramientum->nombre_categoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriaHerramientum.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $categoriaHerramientum->descripcion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categoria-herramienta.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection