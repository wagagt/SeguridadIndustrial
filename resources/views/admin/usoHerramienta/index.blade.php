@extends('layouts.admin')
@section('content')
@can('uso_herramientum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.uso-herramienta.create') }}">
               Agregar uso de herramienta 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
       Lista de uso de herramienta
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-UsoHerramientum">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.herramienta') }}
                        </th>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.empleado') }}
                        </th>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.contrato') }}
                        </th>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.fecha_inicio') }}
                        </th>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.fecha_fin') }}
                        </th>
                        <th>
                            {{ trans('cruds.usoHerramientum.fields.duracion_horas') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usoHerramienta as $key => $usoHerramientum)
                        <tr data-entry-id="{{ $usoHerramientum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $usoHerramientum->id ?? '' }}
                            </td>
                            <td>
                                {{ $usoHerramientum->herramienta->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $usoHerramientum->empleado->nombre_completo ?? '' }}
                            </td>
                            <td>
                                {{ $usoHerramientum->contrato->numero_contrato ?? '' }}
                            </td>
                            <td>
                                {{ $usoHerramientum->fecha_inicio ?? '' }}
                            </td>
                            <td>
                                {{ $usoHerramientum->fecha_fin ?? '' }}
                            </td>
                            <td>
                                {{ $usoHerramientum->duracion_horas ?? '' }}
                            </td>
                            <td>
                                @can('uso_herramientum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.uso-herramienta.show', $usoHerramientum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('uso_herramientum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.uso-herramienta.edit', $usoHerramientum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('uso_herramientum_delete')
                                    <form action="{{ route('admin.uso-herramienta.destroy', $usoHerramientum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('uso_herramientum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.uso-herramienta.massDestroy') }}",
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
  let table = $('.datatable-UsoHerramientum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection