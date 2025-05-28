@extends('layouts.admin')
@section('content')
@can('herramientum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.herramienta.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.herramientum.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.herramientum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Herramientum">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.categoria') }}
                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.fecha_adquisicion') }}
                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.horas_para_mantenimiento') }}
                        </th>
                        <th>
                            {{ trans('cruds.herramientum.fields.horas_acumuladas') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($herramienta as $key => $herramientum)
                        <tr data-entry-id="{{ $herramientum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $herramientum->id ?? '' }}
                            </td>
                            <td>
                                {{ $herramientum->categoria->nombre_categoria ?? '' }}
                            </td>
                            <td>
                                {{ $herramientum->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $herramientum->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Herramientum::ESTADO_SELECT[$herramientum->estado] ?? '' }}
                            </td>
                            <td>
                                {{ $herramientum->fecha_adquisicion ?? '' }}
                            </td>
                            <td>
                                {{ $herramientum->horas_para_mantenimiento ?? '' }}
                            </td>
                            <td>
                                {{ $herramientum->horas_acumuladas ?? '' }}
                            </td>
                            <td>
                                @can('herramientum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.herramienta.show', $herramientum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('herramientum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.herramienta.edit', $herramientum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('herramientum_delete')
                                    <form action="{{ route('admin.herramienta.destroy', $herramientum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('herramientum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.herramienta.massDestroy') }}",
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
  let table = $('.datatable-Herramientum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection