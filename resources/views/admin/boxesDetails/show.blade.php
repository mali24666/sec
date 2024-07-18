@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.boxesDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boxes-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.subscription_number') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->subscription_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.cb') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->cb }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.rating') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->rating }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.watcher') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->watcher }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.watch_size') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->watch_size }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.ct_transe') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->ct_transe }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.subscription_class') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BoxesDetail::SUBSCRIPTION_CLASS_SELECT[$boxesDetail->subscription_class] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.absurdity') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BoxesDetail::ABSURDITY_SELECT[$boxesDetail->absurdity] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.account_number') }}
                                    </th>
                                    <td>
                                        {{ $boxesDetail->account_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.outside_pic') }}
                                    </th>
                                    <td>
                                        @foreach($boxesDetail->outside_pic as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boxesDetail.fields.inside_pic') }}
                                    </th>
                                    <td>
                                        @foreach($boxesDetail->inside_pic as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boxes-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection