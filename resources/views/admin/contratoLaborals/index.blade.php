@extends('layouts.admin')
@section('content')
@can('contrato_laboral_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contrato-laborals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contratoLaboral.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contratoLaboral.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ContratoLaboral">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.numero_contrato') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.fecha_inicio') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.fecha_fin') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoLaboral.fields.cliente') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contratoLaborals as $key => $contratoLaboral)
                        <tr data-entry-id="{{ $contratoLaboral->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contratoLaboral->id ?? '' }}
                            </td>
                            <td>
                                {{ $contratoLaboral->numero_contrato ?? '' }}
                            </td>
                            <td>
                                {{ $contratoLaboral->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $contratoLaboral->fecha_inicio ?? '' }}
                            </td>
                            <td>
                                {{ $contratoLaboral->fecha_fin ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ContratoLaboral::ESTADO_SELECT[$contratoLaboral->estado] ?? '' }}
                            </td>
                            <td>
                                {{ $contratoLaboral->cliente->nombre ?? '' }}
                            </td>
                            <td>
                                @can('contrato_laboral_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contrato-laborals.show', $contratoLaboral->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contrato_laboral_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contrato-laborals.edit', $contratoLaboral->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contrato_laboral_delete')
                                    <form action="{{ route('admin.contrato-laborals.destroy', $contratoLaboral->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('contrato_laboral_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contrato-laborals.massDestroy') }}",
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
  let table = $('.datatable-ContratoLaboral:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection