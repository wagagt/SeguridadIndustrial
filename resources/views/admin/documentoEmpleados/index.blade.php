@extends('layouts.admin')
@section('content')
@can('documento_empleado_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.documento-empleados.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.documentoEmpleado.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.documentoEmpleado.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DocumentoEmpleado">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.empleado') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.tipo_documento') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.archivo') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.fecha_emision') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoEmpleado.fields.fecha_vencimiento') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentoEmpleados as $key => $documentoEmpleado)
                        <tr data-entry-id="{{ $documentoEmpleado->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $documentoEmpleado->id ?? '' }}
                            </td>
                            <td>
                                {{ $documentoEmpleado->empleado->nombre_completo ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\DocumentoEmpleado::TIPO_DOCUMENTO_SELECT[$documentoEmpleado->tipo_documento] ?? '' }}
                            </td>
                            <td>
                                @foreach($documentoEmpleado->archivo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $documentoEmpleado->fecha_emision ?? '' }}
                            </td>
                            <td>
                                {{ $documentoEmpleado->fecha_vencimiento ?? '' }}
                            </td>
                            <td>
                                @can('documento_empleado_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.documento-empleados.show', $documentoEmpleado->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('documento_empleado_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.documento-empleados.edit', $documentoEmpleado->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('documento_empleado_delete')
                                    <form action="{{ route('admin.documento-empleados.destroy', $documentoEmpleado->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('documento_empleado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documento-empleados.massDestroy') }}",
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
  let table = $('.datatable-DocumentoEmpleado:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection