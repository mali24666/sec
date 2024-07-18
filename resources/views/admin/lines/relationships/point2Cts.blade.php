<div class="m-3">
    @can('ct_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.cts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.ct.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.ct.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-point2Cts">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.ct.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.ct.fields.ct_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.ct.fields.point_1') }}
                            </th>
                            <th>
                                {{ trans('cruds.ct.fields.point_2') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cts as $key => $ct)
                            <tr data-entry-id="{{ $ct->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $ct->id ?? '' }}
                                </td>
                                <td>
                                    {{ $ct->ct_no ?? '' }}
                                </td>
                                <td>
                                    {{ $ct->point_1->line_no ?? '' }}
                                </td>
                                <td>
                                    {{ $ct->point_2->line_no ?? '' }}
                                </td>
                                <td>
                                    @can('ct_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.cts.show', $ct->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('ct_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.cts.edit', $ct->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('ct_delete')
                                        <form action="{{ route('admin.cts.destroy', $ct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ct_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cts.massDestroy') }}",
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
  let table = $('.datatable-point2Cts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection