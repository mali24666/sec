@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carMove.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.car-moves.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carMove.fields.id') }}
                        </th>
                        <td>
                            {{ $carMove->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carMove.fields.car_no') }}
                        </th>
                        <td>
                            {{ $carMove->car_no->car_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carMove.fields.last_driver') }}
                        </th>
                        <td>
                            {{ $carMove->last_driver->emp_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carMove.fields.driver') }}
                        </th>
                        <td>
                            {{ $carMove->driver->emp_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carMove.fields.file') }}
                        </th>
                        <td>
                            @foreach($carMove->file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carMove.fields.photo') }}
                        </th>
                        <td>
                            @foreach($carMove->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carMove.fields.date') }}
                        </th>
                        <td>
                            {{ $carMove->date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.car-moves.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection