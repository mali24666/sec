@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.room.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.id') }}
                        </th>
                        <td>
                            {{ $room->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.station_no') }}
                        </th>
                        <td>
                            {{ $room->station_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.neighborhood') }}
                        </th>
                        <td>
                            {{ $room->neighborhood }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.coordinates') }}
                        </th>
                        <td>
                            {{ $room->coordinates }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.work_lamp') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $room->work_lamp ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.lamp_befor') }}
                        </th>
                        <td>
                            @foreach($room->lamp_befor as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.fanwrok') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $room->fanwrok ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.fan_befor') }}
                        </th>
                        <td>
                            @foreach($room->fan_befor as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.lamp_after') }}
                        </th>
                        <td>
                            @foreach($room->lamp_after as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.fan_after') }}
                        </th>
                        <td>
                            @foreach($room->fan_after as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection