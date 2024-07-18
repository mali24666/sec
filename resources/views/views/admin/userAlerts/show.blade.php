@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userAlert.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-alerts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.id') }}
                        </th>
                        <td>
                            {{ $userAlert->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.alert_text') }}
                        </th>
                        <td>
                            {{ $userAlert->alert_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.lices_no') }}
                        </th>
                        <td>
                            {{ $userAlert->lices_no->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.alert_link') }}
                        </th>
                        <td>
                            {{ $userAlert->alert_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.user') }}
                        </th>
                        <td>
                            @foreach($userAlert->users as $key => $user)
                                <span class="label label-info">{{ $user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.date_end') }}
                        </th>
                        <td>
                            {{ $userAlert->date_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.pic') }}
                        </th>
                        <td>
                            @foreach($userAlert->pic as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.pic_after') }}
                        </th>
                        <td>
                            @foreach($userAlert->pic_after as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.eng_sign_photo') }}
                        </th>
                        <td>
                            @foreach($userAlert->eng_sign_photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.created_at') }}
                        </th>
                        <td>
                            {{ $userAlert->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userAlert.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $userAlert->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-alerts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection