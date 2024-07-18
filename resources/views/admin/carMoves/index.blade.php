@extends('layouts.admin')
@section('content')
@can('car_move_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.car-moves.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.carMove.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.carMove.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CarMove">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.carMove.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.carMove.fields.car_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.car_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.moror_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.factory') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.modol') }}
                        </th>
                        <th>
                            {{ trans('cruds.car.fields.taheel') }}
                        </th>
                        <th>
                            {{ trans('cruds.carMove.fields.last_driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.carMove.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.carMove.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.carMove.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.carMove.fields.date') }}
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
                        </td>
                        <td>
                        </td>
                        <td>
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
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carMoves as $key => $carMove)
                        <tr data-entry-id="{{ $carMove->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $carMove->id ?? '' }}
                            </td>
                            <td>
                                {{ $carMove->car_no->car_number ?? '' }}
                            </td>
                            <td>
                                @if($carMove->car_no)
                                    {{ $carMove->car_no::CAR_TYPE_SELECT[$carMove->car_no->car_type] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $carMove->car_no->moror_number ?? '' }}
                            </td>
                            <td>
                                {{ $carMove->car_no->factory ?? '' }}
                            </td>
                            <td>
                                {{ $carMove->car_no->modol ?? '' }}
                            </td>
                            <td>
                                @if($carMove->car_no)
                                    {{ $carMove->car_no::TAHEEL_SELECT[$carMove->car_no->taheel] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $carMove->last_driver->emp_name ?? '' }}
                            </td>
                            <td>
                                {{ $carMove->driver->emp_name ?? '' }}
                            </td>
                            <td>
                                @foreach($carMove->file as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($carMove->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $carMove->date ?? '' }}
                            </td>
                            <td>
                                @can('car_move_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.car-moves.show', $carMove->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('car_move_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.car-moves.edit', $carMove->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('car_move_delete')
                                    <form action="{{ route('admin.car-moves.destroy', $carMove->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('car_move_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.car-moves.massDestroy') }}",
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
  let table = $('.datatable-CarMove:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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