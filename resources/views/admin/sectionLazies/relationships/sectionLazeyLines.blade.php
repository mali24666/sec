<div class="m-3">
    @can('line_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.lines.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.line.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.line.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-sectionLazeyLines">
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
                                {{ trans('cruds.line.fields.ct') }}
                            </th>
                            <th>
                                {{ trans('cruds.line.fields.boxx_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.line.fields.avr_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.line.fields.auto_selector') }}
                            </th>
                            <th>
                                {{ trans('cruds.line.fields.section_lazey') }}
                            </th>
                            <th>
                                {{ trans('cruds.line.fields.rmu_no') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
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
                                        <span class="badge badge-info">{{ $item->t_no }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($line->cts as $key => $item)
                                        <span class="badge badge-info">{{ $item->ct_no }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($line->boxx_numbers as $key => $item)
                                        <span class="badge badge-info">{{ $item->box_number }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($line->avr_nos as $key => $item)
                                        <span class="badge badge-info">{{ $item->avr_no }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($line->auto_selectors as $key => $item)
                                        <span class="badge badge-info">{{ $item->auto_recloser_no }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($line->section_lazeys as $key => $item)
                                        <span class="badge badge-info">{{ $item->section_lazey }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($line->rmu_nos as $key => $item)
                                        <span class="badge badge-info">{{ $item->rmu_no }}</span>
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
</div>
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
  let table = $('.datatable-sectionLazeyLines:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection