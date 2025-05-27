@extends('layouts.admin')
@section('content')
@can('asistencia_charla_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.asistencia-charlas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.asistenciaCharla.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.asistenciaCharla.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AsistenciaCharla">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.presente') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.charla') }}
                        </th>
                        <th>
                            {{ trans('cruds.asistenciaCharla.fields.empleado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asistenciaCharlas as $key => $asistenciaCharla)
                        <tr data-entry-id="{{ $asistenciaCharla->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $asistenciaCharla->id ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $asistenciaCharla->presente ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $asistenciaCharla->presente ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($asistenciaCharla->charlas as $key => $item)
                                    <span class="badge badge-info">{{ $item->tema }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($asistenciaCharla->empleados as $key => $item)
                                    <span class="badge badge-info">{{ $item->nombre_completo }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('asistencia_charla_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.asistencia-charlas.show', $asistenciaCharla->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('asistencia_charla_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.asistencia-charlas.edit', $asistenciaCharla->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('asistencia_charla_delete')
                                    <form action="{{ route('admin.asistencia-charlas.destroy', $asistenciaCharla->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('asistencia_charla_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asistencia-charlas.massDestroy') }}",
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
  let table = $('.datatable-AsistenciaCharla:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection