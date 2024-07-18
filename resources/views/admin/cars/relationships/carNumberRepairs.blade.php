<div class="m-3">
    @can('repair_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.repairs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.repair.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.repair.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-carNumberRepairs">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.car_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.car.fields.car_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.car.fields.factory') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.branch') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.department') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.issue') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.pic') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.order_by') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.stuts') }}
                            </th>
                            <th>
                                {{ trans('cruds.repair.fields.pic_after') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairs as $key => $repair)
                            <tr data-entry-id="{{ $repair->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $repair->id ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->car_number->car_number ?? '' }}
                                </td>
                                <td>
                                    @if($repair->car_number)
                                        {{ $repair->car_number::CAR_TYPE_SELECT[$repair->car_number->car_type] ?? '' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $repair->car_number->factory ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Repair::BRANCH_SELECT[$repair->branch] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Repair::DEPARTMENT_SELECT[$repair->department] ?? '' }}
                                </td>
                                <td>
                                    {{ $repair->issue ?? '' }}
                                </td>
                                <td>
                                    @foreach($repair->pic as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $repair->order_by ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Repair::STUTS_SELECT[$repair->stuts] ?? '' }}
                                </td>
                                <td>
                                    @foreach($repair->pic_after as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @can('repair_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.repairs.show', $repair->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('repair_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.repairs.edit', $repair->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('repair_delete')
                                        <form action="{{ route('admin.repairs.destroy', $repair->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('repair_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.repairs.massDestroy') }}",
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
  let table = $('.datatable-carNumberRepairs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection