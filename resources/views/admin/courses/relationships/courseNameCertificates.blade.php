<div class="m-3">
    @can('certificate_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.certificates.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.certificate.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.certificate.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-courseNameCertificates">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.employee_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee.fields.emp') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.studts') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.course_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.start_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.end_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.cost') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.file') }}
                            </th>
                            <th>
                                {{ trans('cruds.certificate.fields.photo') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certificates as $key => $certificate)
                            <tr data-entry-id="{{ $certificate->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $certificate->id ?? '' }}
                                </td>
                                <td>
                                    {{ $certificate->employee_name->emp_name ?? '' }}
                                </td>
                                <td>
                                    {{ $certificate->employee_name->emp ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Certificate::STUDTS_SELECT[$certificate->studts] ?? '' }}
                                </td>
                                <td>
                                    {{ $certificate->course_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $certificate->start_date ?? '' }}
                                </td>
                                <td>
                                    {{ $certificate->end_date ?? '' }}
                                </td>
                                <td>
                                    {{ $certificate->cost ?? '' }}
                                </td>
                                <td>
                                    @foreach($certificate->file as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($certificate->photo as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @can('certificate_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.certificates.show', $certificate->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('certificate_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.certificates.edit', $certificate->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('certificate_delete')
                                        <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('certificate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.certificates.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-courseNameCertificates:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection