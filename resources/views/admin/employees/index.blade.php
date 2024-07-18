@extends('layouts.admin')
@section('content')
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
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
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Employee::BRANCH_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($cars as $key => $item)
                                <option value="{{ $item->car_number }}">{{ $item->car_number }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Employee::OCCUPATION_AGREE_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($employees as $key => $item)
                                <option value="{{ $item->emp_name }}">{{ $item->emp_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($employees as $key => $item)
                                <option value="{{ $item->emp_name }}">{{ $item->emp_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employees.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.employees.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'emp_name', name: 'emp_name' },
{ data: 'branch', name: 'branch' },
{ data: 'nationlaty', name: 'nationlaty' },
{ data: 'emp', name: 'emp' },
{ data: 'id_expire', name: 'id_expire' },
{ data: 'car_car_number', name: 'car.car_number' },
{ data: 'id_photo', name: 'id_photo', sortable: false, searchable: false },
{ data: 'occupation', name: 'occupation' },
{ data: 'occupation_agree', name: 'occupation_agree' },
{ data: 'occupation_insite', name: 'occupation_insite' },
{ data: 'persion_pic', name: 'persion_pic', sortable: false, searchable: false },
{ data: 'en_flow_emp_name', name: 'en_flow.emp_name' },
{ data: 'supervisor_emp_name', name: 'supervisor.emp_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Employee').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection