@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.minibller.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.minibllers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                          <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $minibller->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.transformer') }}
                                    </th>
                                    <td>
                                        {{ $minibller->transformer->t_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.cb') }}
                                    </th>
                                    <td>
                                        {{ $minibller->cb->trans_cb_fider_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.minibller_number') }}
                                    </th>
                                    <td>
                                        {{ $minibller->minibller_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.longitude') }}
                                    </th>
                                    <td>
                                        {{ $minibller->longitude }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.rating') }}
                                    </th>
                                    <td>
                                        {{ $minibller->rating }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.manufacturer_serial_no') }}
                                    </th>
                                    <td>
                                        {{ $minibller->manufacturer_serial_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.no_circuits_ici_kva_rating_manuf_ly') }}
                                    </th>
                                    <td>
                                        {{ $minibller->no_circuits_ici_kva_rating_manuf_ly }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.no_of_used_circuits') }}
                                    </th>
                                    <td>
                                        {{ $minibller->no_of_used_circuits }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.manufacturer') }}
                                    </th>
                                    <td>
                                        {{ $minibller->manufacturer }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.cable_size') }}
                                    </th>
                                    <td>
                                        {{ $minibller->cable_size->cable_size ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.minibllar_notes') }}
                                    </th>
                                    <td>
                                        @foreach($minibller->minibllar_notes as $key => $minibllar_notes)
                                            <span class="label label-info">{{ $minibllar_notes->notes }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.minibller_photo') }}
                                    </th>
                                    <td>
                                       @foreach($minibller->minibller_photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.area_name') }}
                                    </th>
                                    <td>
                                        {{ $minibller->area_name->city_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.other_note') }}
                                    </th>
                                    <td>
                                        {!! $minibller->other_note !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.load') }}
                                    </th>
                                    <td>
                                        {{ $minibller->load }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.load_b') }}
                                    </th>
                                    <td>
                                        {{ $minibller->load_b }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.minibller.fields.load_y') }}
                                    </th>
                                    <td>
                                        {{ $minibller->load_y }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.minibllers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#minibiler_fouses" aria-controls="minibiler_fouses" role="tab" data-toggle="tab">
                            {{ trans('cruds.fouse.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#minbilar_cbs" aria-controls="minbilar_cbs" role="tab" data-toggle="tab">
                            {{ trans('cruds.cb.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="minibiler_fouses">
                        @includeIf('admin.minibllers.relationships.minibilerFouses', ['fouses' => $minibller->minibilerFouses])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="minbilar_cbs">
                        @includeIf('admin.minibllers.relationships.minbilarCbs', ['cbs' => $minibller->minbilarCbs])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection