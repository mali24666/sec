@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.certificate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.id') }}
                        </th>
                        <td>
                            {{ $certificate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.employee_name') }}
                        </th>
                        <td>
                            {{ $certificate->employee_name->emp_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.studts') }}
                        </th>
                        <td>
                            {{ App\Models\Certificate::STUDTS_SELECT[$certificate->studts] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.course_name') }}
                        </th>
                        <td>
                            {{ $certificate->course_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.start_date') }}
                        </th>
                        <td>
                            {{ $certificate->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.end_date') }}
                        </th>
                        <td>
                            {{ $certificate->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.cost') }}
                        </th>
                        <td>
                            {{ $certificate->cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.file') }}
                        </th>
                        <td>
                            @foreach($certificate->file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.photo') }}
                        </th>
                        <td>
                            @foreach($certificate->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection