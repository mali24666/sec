<div class="m-3">
    @can('employee_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.employees.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.employee.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-carEmployees">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.emp_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.branch') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.nationlaty') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.emp') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.id_expire') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.car') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.id_photo') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.occupation') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.occupation_agree') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.occupation_insite') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.persion_pic') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.en_flow') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.supervisor') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $key => $employee)
                            <tr data-entry-id="{{ $employee->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $employee->id ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->emp_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Employee::BRANCH_SELECT[$employee->branch] ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->nationlaty ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->emp ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->id_expire ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->car->car_number ?? '' }}
                                </td>
                                <td>
                                    @foreach($employee->id_photo as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $employee->occupation ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Employee::OCCUPATION_AGREE_SELECT[$employee->occupation_agree] ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->occupation_insite ?? '' }}
                                </td>
                                <td>
                                    @if($employee->persion_pic)
                                        <a href="{{ $employee->persion_pic->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $employee->persion_pic->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $employee->en_flow->emp_name ?? '' }}
                                </td>
                                <td>
                                    {{ $employee->supervisor->emp_name ?? '' }}
                                </td>
                                <td>
                                    @can('employee_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.employees.show', $employee->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('employee_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.employees.edit', $employee->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('employee_delete')
                                        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employees.massDestroy') }}",
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
  let table = $('.datatable-carEmployees:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection