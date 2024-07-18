@extends('layouts.admin')
@section('content')
@can('car_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.car.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.car.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Car">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.car.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.car_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.car_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.moror_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.estmara') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.estmara_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.tameen') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.factory') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.modol') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.check') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.check_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.taheel') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.driver') }}
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
                                @foreach(App\Models\Car::CAR_TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Car::CHECK_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Car::TAHEEL_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
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
                <tbody>
                    @foreach($cars as $key => $car)
                        <tr data-entry-id="{{ $car->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $car->id ?? '' }}
                            </td>
                            <td>
                                {{ $car->car_number ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Car::CAR_TYPE_SELECT[$car->car_type] ?? '' }}
                            </td>
                            <td>
                                {{ $car->moror_number ?? '' }}
                            </td>
                            <td>
                                @if($car->estmara)
                                    <a href="{{ $car->estmara->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $car->estmara->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $car->estmara_date ?? '' }}
                            </td>
                            <td>
                                {{ $car->tameen ?? '' }}
                            </td>
                            <td>
                                {{ $car->factory ?? '' }}
                            </td>
                            <td>
                                {{ $car->modol ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Car::CHECK_SELECT[$car->check] ?? '' }}
                            </td>
                            <td>
                                {{ $car->check_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Car::TAHEEL_SELECT[$car->taheel] ?? '' }}
                            </td>
                            <td>
                                {{ $car->driver->emp_name ?? '' }}
                            </td>
                            <td>
                                @can('car_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cars.show', $car->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('car_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cars.edit', $car->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('car_delete')
                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('car_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cars.massDestroy') }}",
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
  let table = $('.datatable-Car:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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