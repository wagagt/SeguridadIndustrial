@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reciboPago.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recibo-pagos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.id') }}
                        </th>
                        <td>
                            {{ $reciboPago->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.empleado') }}
                        </th>
                        <td>
                            {{ $reciboPago->empleado->nombre_completo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.numero_recibo') }}
                        </th>
                        <td>
                            {{ $reciboPago->numero_recibo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.fecha_emision') }}
                        </th>
                        <td>
                            {{ $reciboPago->fecha_emision }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.periodo_fin') }}
                        </th>
                        <td>
                            {{ $reciboPago->periodo_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.salario_base') }}
                        </th>
                        <td>
                            {{ $reciboPago->salario_base }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.horas_trabajadas') }}
                        </th>
                        <td>
                            {{ $reciboPago->horas_trabajadas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.pago_horas_extras') }}
                        </th>
                        <td>
                            {{ $reciboPago->pago_horas_extras }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_bonificaciones') }}
                        </th>
                        <td>
                            {{ $reciboPago->total_bonificaciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_comisiones') }}
                        </th>
                        <td>
                            {{ $reciboPago->total_comisiones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.otros_ingresos') }}
                        </th>
                        <td>
                            {{ $reciboPago->otros_ingresos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuento_igss') }}
                        </th>
                        <td>
                            {{ $reciboPago->descuento_igss }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuento_isr') }}
                        </th>
                        <td>
                            {{ $reciboPago->descuento_isr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuentos_prestamos') }}
                        </th>
                        <td>
                            {{ $reciboPago->descuentos_prestamos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuentos_faltas_retardos') }}
                        </th>
                        <td>
                            {{ $reciboPago->descuentos_faltas_retardos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.otros_descuentos') }}
                        </th>
                        <td>
                            {{ $reciboPago->otros_descuentos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_ingresos') }}
                        </th>
                        <td>
                            {{ $reciboPago->total_ingresos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_deducciones') }}
                        </th>
                        <td>
                            {{ $reciboPago->total_deducciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.salario_neto') }}
                        </th>
                        <td>
                            {{ $reciboPago->salario_neto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.metodo_pago') }}
                        </th>
                        <td>
                            {{ App\Models\ReciboPago::METODO_PAGO_SELECT[$reciboPago->metodo_pago] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.banco') }}
                        </th>
                        <td>
                            {{ $reciboPago->banco }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.numero_cuenta') }}
                        </th>
                        <td>
                            {{ $reciboPago->numero_cuenta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $reciboPago->observaciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.firma_empleado') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $reciboPago->firma_empleado ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.firma_rrhh') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $reciboPago->firma_rrhh ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.numero_contrato_laboral') }}
                        </th>
                        <td>
                            {{ $reciboPago->numero_contrato_laboral }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reciboPago.fields.recibo_pago') }}
                        </th>
                        <td>
                            @foreach($reciboPago->recibo_pago as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.recibo-pagos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection