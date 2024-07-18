@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fouse.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Fouse">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fouse.fields.id') }}
                        </th>
                        <th>
                           transformer
                        </th>
                        <th>
                            {{ trans('cruds.fouse.fields.transformer_cb') }}
                        </th>
                        <th>
                            {{ trans('cruds.fouse.fields.minibiler') }}
                        </th>
                        <th>
                            {{ trans('cruds.fouse.fields.fouse_no') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fouses as $key => $fouse)
                        <tr data-entry-id="{{ $fouse->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $fouse->id ?? '' }}
                            </td>
                            <td>
                                {{ $fouse->transformer->t_no ?? '' }}
                            </td>
                            <td>
                                {{ $fouse->transformer_cb->trans_cb_fider_number ?? '' }}
                            </td>
                            <td>
                                {{ $fouse->minibiler->minibller_number ?? '' }}
                            </td>
                            <td>
                                {{ $fouse->fouse_no ?? '' }}
                            </td>
                            <td>
                                @can('fouse_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.fouses.show', $fouse->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('fouse_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.fouses.edit', $fouse->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('box_create')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.boxes.add', $fouse->id) }}">
                                        add box
                                    </a>
                                @endcan

                                @can('fouse_delete')
                                    <form action="{{ route('admin.fouses.destroy', $fouse->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('fouse_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fouses.massDestroy') }}",
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
  let table = $('.datatable-Fouse:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection