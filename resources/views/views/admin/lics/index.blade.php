@extends('layouts.admin')
@section('content')
@can('lic_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.lics.create') }}">
طلب رخصة جديده             </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
قائمة بجميع الطلبات     </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Lic">
            <thead>
                <tr>
                    <th width="5">

                    </th>
                    <th >
                        رقم الطلب 
                    </th>
                    <th>
                        تاريخ الطلب 
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.department') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.license_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.esnad') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.datestary') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.date_end') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.city') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.longtude') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.path') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.license_pic') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.stuts') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.e_length') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.t_length') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.wide') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.deep') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.created_by') }}
                    </th>
                    <th>
                        مدير الفرع 
                    </th>
                    <th>
                        موافقة مدير الفرع 
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.order_stauts') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.order_pic') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.order_reject') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.updated_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.lic.fields.licses_number') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input style="width: 50px"  class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Lic::DEPARTMENT_SELECT as $key => $item)
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
                    </td>
                    <td>
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
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Lic::STUTS_SELECT as $key => $item)
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
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    {{-- موافقة مدير الفرع  --}}
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Lic::eng_check as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>

                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Lic::ORDER_STAUTS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($tasks as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
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
@can('lic_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lics.massDestroy') }}",
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
    ajax: "{{ route('admin.lics.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'created_at', name: 'created_at' },
{ data: 'department', name: 'department' },
{ data: 'license_no', name: 'license_no' },
{ data: 'esnad', name: 'esnad' },
{ data: 'datestary', name: 'datestary' },
{ data: 'date_end', name: 'date_end' },
{ data: 'city', name: 'city' },
{ data: 'longtude', name: 'longtude' },
{ data: 'path', name: 'path', sortable: false, searchable: false },
{ data: 'license_pic', name: 'license_pic', sortable: false, searchable: false },
{ data: 'stuts', name: 'stuts' },
{ data: 'e_length', name: 'e_length' },
{ data: 't_length', name: 't_length' },
{ data: 'wide', name: 'wide' },
{ data: 'deep', name: 'deep' },
{ data: 'created_by_name', name: 'created_by.name' },
{ data: 'head_eng_name', name: 'head_eng.name' },
{ data: 'eng_check', name: 'eng_check' },
{ data: 'order_stauts', name: 'order_stauts' },
{ data: 'order_pic', name: 'order_pic', sortable: false, searchable: false },
{ data: 'order_reject', name: 'order_reject', sortable: false, searchable: false },
{ data: 'user_name', name: 'user.name' },
{ data: 'updated_at', name: 'updated_at' },
{ data: 'licses_number_name', name: 'licses_number.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Lic').DataTable(dtOverrideGlobals);
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