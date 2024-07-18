@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.minibller.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Minibller">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.transformer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.cb') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.minibller_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.longitude') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.rating') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.manufacturer_serial_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.no_circuits_ici_kva_rating_manuf_ly') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.no_of_used_circuits') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.manufacturer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.cable_size') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.minibllar_notes') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.minibller_photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.area_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.load') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.load_b') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.minibller.fields.load_y') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($transeformers as $key => $item)
                                                <option value="{{ $item->t_no }}">{{ $item->t_no }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($cbs as $key => $item)
                                                <option value="{{ $item->trans_cb_fider_number }}">{{ $item->trans_cb_fider_number }}</option>
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
                                            @foreach($cables as $key => $item)
                                                <option value="{{ $item->cable_size }}">{{ $item->cable_size }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($minibllarnotes as $key => $item)
                                                <option value="{{ $item->notes }}">{{ $item->notes }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($cities as $key => $item)
                                                <option value="{{ $item->city_name }}">{{ $item->city_name }}</option>
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
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($minibllers as $key => $minibller)
                                    <tr data-entry-id="{{ $minibller->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $minibller->transformer->t_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->cb->trans_cb_fider_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->minibller_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->longitude ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->rating ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->manufacturer_serial_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->no_circuits_ici_kva_rating_manuf_ly ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->no_of_used_circuits ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->manufacturer ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->cable_size->cable_size ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($minibller->minibllar_notes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->notes }}</span>
                                            @endforeach
                                        </td>
                                        <td>
  @foreach($minibller->minibller_photo as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach                                        </td>
                                        <td>
                                            {{ $minibller->area_name->city_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->load ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->load_b ?? '' }}
                                        </td>
                                        <td>
                                            {{ $minibller->load_y ?? '' }}
                                        </td>
                                        <td>
                                            @can('minibller_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.minibllers.show', $minibller->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
  @can('fouse_create')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.fouses.add', $minibller->id) }}">
                                               add fouse
                                                </a>
                                            @endcan

                                            @can('minibller_create')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.minibllers.addloop', $minibller->id) }}">
                                                   add loop minibler
                                                </a>
                                            @endcan
                                            @can('minibller_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.minibllers.edit', $minibller->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('minibller_delete')
                                                <form action="{{ route('admin.minibllers.destroy', $minibller->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('minibller_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.minibllers.massDestroy') }}",
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
    order: [[ 3, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Minibller:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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