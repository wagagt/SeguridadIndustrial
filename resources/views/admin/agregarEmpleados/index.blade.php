@extends('layouts.admin')
@section('content')
@can('agregar_empleado_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.agregar-empleados.create') }}">
               {{ trans('cruds.agregarEmpleado.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.agregarEmpleado.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AgregarEmpleado">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.nombre_completo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.numero_identificacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.cargo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.departamento') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.codigo_seguridad_social') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.fecha_ingreso') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarEmpleado.fields.otros_datos_personales') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agregarEmpleados as $key => $agregarEmpleado)
                        <tr data-entry-id="{{ $agregarEmpleado->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $agregarEmpleado->id ?? '' }}
                            </td>
                            <td>
                                {{ $agregarEmpleado->nombre_completo ?? '' }}
                            </td>
                            <td>
                                {{ $agregarEmpleado->numero_identificacion ?? '' }}
                            </td>
                            <td>
                                {{ $agregarEmpleado->cargo->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $agregarEmpleado->departamento->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $agregarEmpleado->codigo_seguridad_social ?? '' }}
                            </td>
                            <td>
                                {{ $agregarEmpleado->fecha_ingreso ?? '' }}
                            </td>
                            <td>
                                {{ $agregarEmpleado->otros_datos_personales ?? '' }}
                            </td>
                            <td>
                                @can('agregar_empleado_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agregar-empleados.show', $agregarEmpleado->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agregar_empleado_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agregar-empleados.edit', $agregarEmpleado->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agregar_empleado_delete')
                                    <form action="{{ route('admin.agregar-empleados.destroy', $agregarEmpleado->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agregar_empleado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agregar-empleados.massDestroy') }}",
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
  let table = $('.datatable-AgregarEmpleado:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection