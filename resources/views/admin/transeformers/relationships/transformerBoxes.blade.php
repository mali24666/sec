<div class="content">
    @can('box_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.boxes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.box.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.box.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-transformerBoxes">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.id') }}
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
                                        {{ trans('cruds.box.fields.loop') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.box.fields.created_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
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
                                            {{ App\Models\Box::BOX_TYPE_SELECT[$box->box_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->box_number ?? '' }}
                                        </td>
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
                                            {{ App\Models\Box::LOOP_SELECT[$box->loop] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $box->created_at ?? '' }}
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

        </div>
    </div>
</div>
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
    order: [[ 17, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-transformerBoxes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection