<div class="m-3">
    @can('custody_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.custodies.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.custody.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.custody.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-employeeNameCustodies">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.employee_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.tools') }}
                            </th>
                            <th>
                                {{ trans('cruds.tool.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.number') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.given_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.back_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.stunts') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.receve_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.pic') }}
                            </th>
                            <th>
                                {{ trans('cruds.custody.fields.received') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($custodies as $key => $custody)
                            <tr data-entry-id="{{ $custody->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $custody->id ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->employee_name->emp_name ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->tools->tool_name ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->tools->price ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->number ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->given_by->name ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->date ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->back_date ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Custody::STUNTS_SELECT[$custody->stunts] ?? '' }}
                                </td>
                                <td>
                                    {{ $custody->receve_by->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($custody->pic as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ App\Models\Custody::RECEIVED_SELECT[$custody->received] ?? '' }}
                                </td>
                                <td>
                                    @can('custody_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.custodies.show', $custody->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('custody_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.custodies.edit', $custody->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('custody_delete')
                                        <form action="{{ route('admin.custodies.destroy', $custody->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('custody_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.custodies.massDestroy') }}",
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
  let table = $('.datatable-employeeNameCustodies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection