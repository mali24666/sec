@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.line.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Line">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.line.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.line.fields.station') }}
                        </th>
                        <th>
                            {{ trans('cruds.line.fields.line_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.line.fields.trans') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lines as $key => $line)
                        <tr data-entry-id="{{ $line->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $line->id ?? '' }}
                            </td>
                            <td>
                                {{ $line->station->station_no ?? '' }}
                            </td>
                            <td>
                                {{ $line->line_no ?? '' }}
                            </td>
                            <td>
                                @foreach($line->trans as $key => $item)
                                <a class="btn btn-xs btn-info" href="{{ route('admin.transeformers.show', $item->id) }}">
                                    <span class="badge badge-info">{{ $item->t_no }}</span>
                                </a>
                            @endforeach

                            </td>
                            <td>
                                @can('line_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.lines.show', $line->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('line_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.lines.edit', $line->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transeformer_create')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transeformers.add', $line->id) }}">
                                        add MV equipment'
                                    </a>
                                @endcan

                                @can('line_delete')
                                    <form action="{{ route('admin.lines.destroy', $line->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('line_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lines.massDestroy') }}",
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
  let table = $('.datatable-Line:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection