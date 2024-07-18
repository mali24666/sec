<div class="content">
    @can('cb_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.cbs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.cb.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.cb.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-transformerCbs">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.transformer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.trans_cb_fider_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.minbilar') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.temperature') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.refrence_pic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.temperature_refrence') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.temperature_picture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.load_y') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.load_b') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cb.fields.load_r') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cbs as $key => $cb)
                                    <tr data-entry-id="{{ $cb->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $cb->transformer->t_no ?? '' }}
                                        </td>
                                        <td>
                                        <ul class="nav nav-tabs showRealated" role="tablist" id="relationship-tabs">
                                            <li  role="presentation">
                                                <a href="#cb_minibllers" aria-controls="cb_minibllers" role="tab" data-toggle="tab">
                                                {{ $cb->trans_cb_fider_number ?? '' }}
                                                </a>
                                            </li>  
                                            <div class="tab-pane hidden " role="tabpanel" id="cb_minibllers">
                                                <label class="dissapear">hide</label>
                                                <div>
                                                    @includeIf('admin.cbs.relationships.cbMinibllers', ['minibllers' => $cb->cbMinibllers])
                                                </div>
                                                </div>
                                        </ul>
                                        </td>
                                        <td>
                                            @foreach($cb->minbilars as $key => $item)
                                                <span class="label label-info label-many">{{ $item->minibller_number }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $cb->temperature ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($cb->refrence_pic as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                         
                                        </td>
                                        <td>
                                            @foreach($cb->temperature_picture as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $cb->load_y ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cb->load_b ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cb->load_r ?? '' }}
                                        </td>
                                        <td>
                                            @can('cb_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.cbs.show', $cb->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('cb_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.cbs.edit', $cb->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('cb_delete')
                                                <form action="{{ route('admin.cbs.destroy', $cb->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cb_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cbs.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-transformerCbs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection