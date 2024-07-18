@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.box.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boxes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $box->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.transformer') }}
                                    </th>
                                    <td>
                                        {{ $box->transformer->t_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.transformer_cb') }}
                                    </th>
                                    <td>
                                        {{ $box->transformer_cb->trans_cb_fider_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.minibller_no') }}
                                    </th>
                                    <td>
                                        {{ $box->minibller_no->minibller_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.fouse') }}
                                    </th>
                                    <td>
                                        {{ $box->fouse->fouse_no ?? '' }}
                                    </td>
                                </tr>
                                 <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.loop') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Box::LOOP_SELECT[$box->loop] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Box::BOX_TYPE_SELECT[$box->box_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_number') }}
                                    </th>
                                    <td>
                                        {{ $box->box_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_number_2') }}
                                    </th>
                                    <td>
                                        {{ $box->box_number_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_number_3') }}
                                    </th>
                                    <td>
                                        {{ $box->box_number_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_number_4') }}
                                    </th>
                                    <td>
                                        {{ $box->box_number_4 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_location') }}
                                    </th>
                                    <td>
                                        {{ $box->box_location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_note') }}
                                    </th>
                                    <td>
                                        @foreach($box->box_notes as $key => $box_note)
                                            <span class="label label-info">{{ $box_note->box_note }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.cable') }}
                                    </th>
                                    <td>
                                        {{ $box->cable->cable_size ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.load') }}
                                    </th>
                                    <td>
                                        {{ $box->load }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.load_b') }}
                                    </th>
                                    <td>
                                        {{ $box->load_b }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.load_r') }}
                                    </th>
                                    <td>
                                        {{ $box->load_r }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.box_photo') }}
                                    </th>
                                    <td>
                                        @foreach($box->box_photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.supply_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Box::SUPPLY_TYPE_SELECT[$box->supply_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.box.fields.note') }}
                                    </th>
                                    <td>
                                        {!! $box->note !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boxes.index') }}">
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