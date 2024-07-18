<div class="m-3">
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
                <table class=" table table-bordered table-striped table-hover datatable datatable-boxNoteBoxes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.box.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.trans_box') }}
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
                                {{ trans('cruds.box.fields.account_no_1') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.box_number_2') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.account_no_2') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.box_number_3') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.account_no_3') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.box_number_4') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.account_no_4') }}
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
                                {{ trans('cruds.box.fields.box_photo') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.created_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.updated_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.box.fields.deleted_at') }}
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
                                    {{ $box->trans_box->t_no ?? '' }}
                                </td>
                                <td>
                                    {{ $box->transformer_cb->trans_cb_fider_number ?? '' }}
                                </td>
                                <td>
                                    {{ $box->minibller_no->trans_cb_fider_number ?? '' }}
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
                                    {{ $box->account_no_1 ?? '' }}
                                </td>
                                <td>
                                    {{ $box->box_number_2 ?? '' }}
                                </td>
                                <td>
                                    {{ $box->account_no_2 ?? '' }}
                                </td>
                                <td>
                                    {{ $box->box_number_3 ?? '' }}
                                </td>
                                <td>
                                    {{ $box->account_no_3 ?? '' }}
                                </td>
                                <td>
                                    {{ $box->box_number_4 ?? '' }}
                                </td>
                                <td>
                                    {{ $box->account_no_4 ?? '' }}
                                </td>
                                <td>
                                    {{ $box->box_location ?? '' }}
                                </td>
                                <td>
                                    @foreach($box->box_notes as $key => $item)
                                        <span class="badge badge-info">{{ $item->box_note }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $box->cable->cable_size ?? '' }}
                                </td>
                                <td>
                                    {{ $box->load ?? '' }}
                                </td>
                                <td>
                                    @foreach($box->box_photo as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $box->created_at ?? '' }}
                                </td>
                                <td>
                                    {{ $box->updated_at ?? '' }}
                                </td>
                                <td>
                                    {{ $box->deleted_at ?? '' }}
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
    order: [[ 20, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-boxNoteBoxes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection