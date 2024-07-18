<div class="content">
    @can('minibller_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.minibllers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.minibller.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.minibller.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-cbMinibllers">
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
                                        {{ trans('cruds.cb.fields.load_b') }}
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
                                            {{ $minibller->cb->load_b ?? '' }}
                                        </td>
                                        <td>
                                        <ul class="nav nav-tabs showRealated" role="tablist" id="relationship-tabs">
                                            <li role="presentation">
                                                <a href="#minibiler_fouses" aria-controls="minibiler_fouses" role="tab" data-toggle="tab">
                                                {{ $minibller->minibller_number ?? '' }}
                                                </a>
                                            </li>
                                            <div class="tab-pane hidden " role="tabpanel" id="minibiler_fouses">
                                            <label class="dissapear">hide</label>
                                                <div>
                                                    @includeIf('admin.minibllers.relationships.minibilerFouses', ['fouses' => $minibller->minibilerFouses])
                                                </div>
                                            </div>

                                        </ul>
                                        </td>
                                        <td>
                                          
                                            <!-- {{ $minibller->longitude ?? '' }} -->
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
                                            @endforeach
                                        </td>
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
@section('scripts')
@parent
<<script>
$(document).ready(function () {

    $('.showRealated').click(function (e) { 
        e.preventDefault();
        $(this).children().removeClass('hidden');
    });
    $(".dissapear").click(function() {
        console.log('hhh');
    $(this).parent().children().addClass('hidden');
    $(this).parent().children().$(li).addClass('active');
    });
});
</script>

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
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-cbMinibllers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection