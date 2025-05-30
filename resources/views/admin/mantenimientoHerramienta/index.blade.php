@extends('layouts.admin')
@section('content')
@can('mantenimiento_herramientum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mantenimiento-herramienta.create') }}">
                Agregar mantenimiento de herramienta
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
      Lista de mantenimientos de herramienta
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MantenimientoHerramientum">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.herramienta') }}
                        </th>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.tipo_mantenimiento') }}
                        </th>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.fecha_mantenimiento') }}
                        </th>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.resultado') }}
                        </th>
                        <th>
                            {{ trans('cruds.mantenimientoHerramientum.fields.notificado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mantenimientoHerramienta as $key => $mantenimientoHerramientum)
                        <tr data-entry-id="{{ $mantenimientoHerramientum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mantenimientoHerramientum->id ?? '' }}
                            </td>
                            <td>
                                {{ $mantenimientoHerramientum->herramienta->nombre ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\MantenimientoHerramientum::TIPO_MANTENIMIENTO_SELECT[$mantenimientoHerramientum->tipo_mantenimiento] ?? '' }}
                            </td>
                            <td>
                                {{ $mantenimientoHerramientum->fecha_mantenimiento ?? '' }}
                            </td>
                            <td>
                                {{ $mantenimientoHerramientum->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $mantenimientoHerramientum->resultado ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $mantenimientoHerramientum->notificado ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $mantenimientoHerramientum->notificado ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('mantenimiento_herramientum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mantenimiento-herramienta.show', $mantenimientoHerramientum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mantenimiento_herramientum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mantenimiento-herramienta.edit', $mantenimientoHerramientum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mantenimiento_herramientum_delete')
                                    <form action="{{ route('admin.mantenimiento-herramienta.destroy', $mantenimientoHerramientum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mantenimiento_herramientum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mantenimiento-herramienta.massDestroy') }}",
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
  let table = $('.datatable-MantenimientoHerramientum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection