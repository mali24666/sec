@extends('layouts.admin')
@section('content')
@can('box_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.boxes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.box.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.box.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Box">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.box.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.box.fields.minibller_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.box.fields.box_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.box.fields.box_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.box.fields.box_location') }}
                        </th>
                        <th>
                            {{ trans('cruds.box.fields.box_notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.box.fields.box_photo') }}
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
                                @foreach($minibllers as $key => $item)
                                    <option value="{{ $item->minibller_number }}">{{ $item->minibller_number }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Box::BOX_TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Box::BOX_NOTES_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boxes as $key => $box)
                        <tr data-entry-id="{{ $box->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $box->id ?? '' }}
                            </td>
                            <td>
                                {{ $box->minibller_no->minibller_number ?? '' }}
                            </td>
                            <td>
                                {{ $box->box_number ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Box::BOX_TYPE_SELECT[$box->box_type] ?? '' }}
                            </td>
                            <td>
                                {{ $box->box_location ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Box::BOX_NOTES_SELECT[$box->box_notes] ?? '' }}
                            </td>
                            <td>
                                @foreach($box->box_photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('box_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.boxes.show', $box->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('box_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.boxes.edit', $box->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('box_delete')
                                    <form action="{{ route('admin.boxes.destroy', $box->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('box_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.boxes.massDestroy') }}",
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
  let table = $('.datatable-Box:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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