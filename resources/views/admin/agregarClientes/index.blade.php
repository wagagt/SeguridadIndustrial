@extends('layouts.admin')
@section('content')
@can('agregar_cliente_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.agregar-clientes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.agregarCliente.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.agregarCliente.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AgregarCliente">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.nombre_encargado') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.correo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agregarCliente.fields.direccion') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agregarClientes as $key => $agregarCliente)
                        <tr data-entry-id="{{ $agregarCliente->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $agregarCliente->id ?? '' }}
                            </td>
                            <td>
                                {{ $agregarCliente->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $agregarCliente->nombre_encargado ?? '' }}
                            </td>
                            <td>
                                {{ $agregarCliente->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $agregarCliente->correo ?? '' }}
                            </td>
                            <td>
                                {{ $agregarCliente->direccion ?? '' }}
                            </td>
                            <td>
                                @can('agregar_cliente_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agregar-clientes.show', $agregarCliente->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agregar_cliente_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agregar-clientes.edit', $agregarCliente->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agregar_cliente_delete')
                                    <form action="{{ route('admin.agregar-clientes.destroy', $agregarCliente->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agregar_cliente_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agregar-clientes.massDestroy') }}",
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
  let table = $('.datatable-AgregarCliente:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection