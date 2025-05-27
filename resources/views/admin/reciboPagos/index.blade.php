@extends('layouts.admin')
@section('content')
@can('recibo_pago_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.recibo-pagos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reciboPago.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.reciboPago.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReciboPago">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.empleado') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.numero_recibo') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.fecha_emision') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.periodo_fin') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.salario_base') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.horas_trabajadas') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.pago_horas_extras') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_bonificaciones') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_comisiones') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.otros_ingresos') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuento_igss') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuento_isr') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuentos_prestamos') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.descuentos_faltas_retardos') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.otros_descuentos') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_ingresos') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.total_deducciones') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.salario_neto') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.metodo_pago') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.banco') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.numero_cuenta') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.observaciones') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.firma_empleado') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.firma_rrhh') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.numero_contrato_laboral') }}
                        </th>
                        <th>
                            {{ trans('cruds.reciboPago.fields.recibo_pago') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reciboPagos as $key => $reciboPago)
                        <tr data-entry-id="{{ $reciboPago->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reciboPago->id ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->empleado->nombre_completo ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->numero_recibo ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->fecha_emision ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->periodo_fin ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->salario_base ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->horas_trabajadas ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->pago_horas_extras ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->total_bonificaciones ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->total_comisiones ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->otros_ingresos ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->descuento_igss ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->descuento_isr ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->descuentos_prestamos ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->descuentos_faltas_retardos ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->otros_descuentos ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->total_ingresos ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->total_deducciones ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->salario_neto ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ReciboPago::METODO_PAGO_SELECT[$reciboPago->metodo_pago] ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->banco ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->numero_cuenta ?? '' }}
                            </td>
                            <td>
                                {{ $reciboPago->observaciones ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $reciboPago->firma_empleado ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $reciboPago->firma_empleado ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $reciboPago->firma_rrhh ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $reciboPago->firma_rrhh ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $reciboPago->numero_contrato_laboral ?? '' }}
                            </td>
                             <td>
                                @foreach($reciboPago->recibo_pago as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                         {{ trans('global.view_file') }} {{-- Solo muestra el nombre del archivo como un enlace --}}
                                    </a>
                                    <br> {{-- Para que cada archivo esté en su propia línea si hay varios --}}
                                @endforeach
                            </td>
                            <td>
                                @can('recibo_pago_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.recibo-pagos.show', $reciboPago->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('recibo_pago_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.recibo-pagos.edit', $reciboPago->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('recibo_pago_delete')
                                    <form action="{{ route('admin.recibo-pagos.destroy', $reciboPago->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('recibo_pago_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.recibo-pagos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ReciboPago:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection