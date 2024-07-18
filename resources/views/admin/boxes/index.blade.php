@extends('layouts.admin')
@section('content')
<div class="content">
     <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.box.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Box">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                     </th>
                                    <th>
                                        {{ trans('cruds.box.fields.transformer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.transformer_cb') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.minibller_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.fouse') }}
                                    </th>
                                      <th>
                                        {{ trans('cruds.box.fields.loop') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.box_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.box_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.box_location') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.box_note') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.cable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.load') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.load_b') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.load_r') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.box_photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.supply_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.created_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
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
                                    <td>   <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>   <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                      <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Box::LOOP_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($box_notes as $key => $item)
                                                <option value="{{ $item->box_note }}">{{ $item->box_note }}</option>
                                            @endforeach
                                        </select>
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
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Box::SUPPLY_TYPE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($boxes as $key => $box)
                                    <tr data-entry-id="{{ $box->id }}">
                                        <td>

                                        </td>
                                        <td>

                                        @can('box_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.boxes.show', $box->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @if( $box->minibller_no  !== null)
                                            @can('box_create')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.boxes.loop', $box->id) }}">
                                                   add loop box
                                                </a>
                                            @endcan
                                            @endif
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
                                        <td>
                                            {{ $box->transformer->t_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->transformer_cb->trans_cb_fider_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->minibller_no->minibller_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->fouse->fouse_no ?? '' }}
                                        </td>
                                         <td>
                                         {{ App\Models\Box::LOOP_SELECT[$box->loop] ?? '' }}
                                         </td>
                                        <td>
                                            {{ App\Models\Box::BOX_TYPE_SELECT[$box->box_type] ?? '' }}
                                        </td>
                                        <td>

                                            <a class="btn btn-xs btn-info" href="{{ route('admin.boxes-details.details', $box->box_number) }}">
                                            {{ $box->box_number ?? '' }}
                                            </a>
                                            @if( $box->box_number_2  == 0)
                                            @endif
                                            @if( $box->box_number_2  > 0)
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.boxes-details.details', $box->box_number_2) }}">
                                            {{ $box->box_number_2 ?? '' }}
                                            </a>
                                            @endif
                                            
                                            @if( $box->box_number_3  == 0)
                                            @endif
                                            @if( $box->box_number_3  > 0)
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.boxes-details.details', $box->box_number_3) }}">
                                            {{ $box->box_number_3 ?? '' }}
                                            </a>
                                            @endif

                                            
                                            @if( $box->box_number_4  == 0)
                                            @endif
                                            @if( $box->box_number_4  > 0)
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.boxes-details.details', $box->box_number_4) }}">
                                            {{ $box->box_number_4 ?? '' }}
                                            </a>
                                            @endif                                        </td>
                                        <td>
                                            {{ $box->box_location ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($box->box_notes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->box_note }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $box->cable->cable_size ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->load ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->load_b ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->load_r ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($box->box_photo as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ App\Models\Box::SUPPLY_TYPE_SELECT[$box->supply_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->created_at ?? '' }}
                                        </td>
                                        <td>
                                        {{ $box->id ?? '' }}

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
    order: [[ 16, 'desc' ]],
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