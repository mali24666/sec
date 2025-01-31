@extends('layouts.admin')
@section('content')
<div class="content">
    @can('boxes_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.boxes-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.boxesDetail.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.boxesDetail.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-BoxesDetail">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.subscription_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.cb') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.rating') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.watcher') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.watch_size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.ct_transe') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.subscription_class') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.absurdity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.account_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.outside_pic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.inside_pic') }}
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
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\BoxesDetail::SUBSCRIPTION_CLASS_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\BoxesDetail::ABSURDITY_SELECT as $key => $item)
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($boxesDetails as $key => $boxesDetail)
                                    <tr data-entry-id="{{ $boxesDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $boxesDetail->subscription_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boxesDetail->cb ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boxesDetail->rating ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boxesDetail->watcher ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boxesDetail->watch_size ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boxesDetail->ct_transe ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\BoxesDetail::SUBSCRIPTION_CLASS_SELECT[$boxesDetail->subscription_class] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\BoxesDetail::ABSURDITY_SELECT[$boxesDetail->absurdity] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boxesDetail->account_number ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($boxesDetail->outside_pic as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($boxesDetail->inside_pic as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('boxes_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.boxes-details.show', $boxesDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('boxes_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.boxes-details.edit', $boxesDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('boxes_detail_delete')
                                                <form action="{{ route('admin.boxes-details.destroy', $boxesDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('boxes_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.boxes-details.massDestroy') }}",
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
  let table = $('.datatable-BoxesDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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