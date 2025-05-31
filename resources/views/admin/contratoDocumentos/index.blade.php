@extends('layouts.admin')
@section('content')
@can('contrato_documento_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contrato-documentos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contratoDocumento.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contratoDocumento.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ContratoDocumento">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.tipo_documento') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.archivo') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.fecha_subida') }}
                        </th>
                        <th>
                            {{ trans('cruds.contratoDocumento.fields.contrato') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contratoDocumentos as $key => $contratoDocumento)
                        <tr data-entry-id="{{ $contratoDocumento->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contratoDocumento->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ContratoDocumento::TIPO_DOCUMENTO_SELECT[$contratoDocumento->tipo_documento] ?? '' }}
                            </td>
                            <td>
                                @if($contratoDocumento->archivo)
                                    <a href="{{ $contratoDocumento->archivo->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $contratoDocumento->fecha_subida ?? '' }}
                            </td>
                            <td>
                                {{ $contratoDocumento->contrato->numero_contrato ?? '' }}
                            </td>
                            <td>
                                @can('contrato_documento_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contrato-documentos.show', $contratoDocumento->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contrato_documento_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contrato-documentos.edit', $contratoDocumento->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contrato_documento_delete')
                                    <form action="{{ route('admin.contrato-documentos.destroy', $contratoDocumento->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('contrato_documento_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contrato-documentos.massDestroy') }}",
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
  let table = $('.datatable-ContratoDocumento:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection