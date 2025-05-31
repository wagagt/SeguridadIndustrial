@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agregarCliente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agregar-clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.id') }}
                        </th>
                        <td>
                            {{ $agregarCliente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.nombre') }}
                        </th>
                        <td>
                            {{ $agregarCliente->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.nombre_encargado') }}
                        </th>
                        <td>
                            {{ $agregarCliente->nombre_encargado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.telefono') }}
                        </th>
                        <td>
                            {{ $agregarCliente->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.correo') }}
                        </th>
                        <td>
                            {{ $agregarCliente->correo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.direccion') }}
                        </th>
                        <td>
                            {{ $agregarCliente->direccion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agregar-clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection