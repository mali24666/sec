@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.cb.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.cbs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $cb->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.transformer') }}
                                    </th>
                                    <td>
                                        {{ $cb->transformer->t_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.trans_cb_fider_number') }}
                                    </th>
                                    <td>
                                        {{ $cb->trans_cb_fider_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.minbilar') }}
                                    </th>
                                    <td>
                                        @foreach($cb->minbilars as $key => $minbilar)
                                            <span class="label label-info">{{ $minbilar->minibller_number }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.temperature') }}
                                    </th>
                                    <td>
                                        {{ $cb->temperature }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.refrence_pic') }}
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.note') }}
                                    </th>
                                    <td>
                                        {!! $cb->note !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.temperature_refrence') }}
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.temperature_picture') }}
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.load_y') }}
                                    </th>
                                    <td>
                                        {{ $cb->load_y }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.load_b') }}
                                    </th>
                                    <td>
                                        {{ $cb->load_b }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cb.fields.load_r') }}
                                    </th>
                                    <td>
                                        {{ $cb->load_r }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.cbs.index') }}">
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
                        <a href="#transformer_cb_fouses" aria-controls="transformer_cb_fouses" role="tab" data-toggle="tab">
                            {{ trans('cruds.fouse.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#transformer_cb_boxes" aria-controls="transformer_cb_boxes" role="tab" data-toggle="tab">
                            {{ trans('cruds.box.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#cb_minibllers" aria-controls="cb_minibllers" role="tab" data-toggle="tab">
                            {{ trans('cruds.minibller.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#cb_transeformers" aria-controls="cb_transeformers" role="tab" data-toggle="tab">
                            {{ trans('cruds.transeformer.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="transformer_cb_fouses">
                        @includeIf('admin.cbs.relationships.transformerCbFouses', ['fouses' => $cb->transformerCbFouses])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="transformer_cb_boxes">
                        @includeIf('admin.cbs.relationships.transformerCbBoxes', ['boxes' => $cb->transformerCbBoxes])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="cb_minibllers">
                        @includeIf('admin.cbs.relationships.cbMinibllers', ['minibllers' => $cb->cbMinibllers])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="cb_transeformers">
                        @includeIf('admin.cbs.relationships.cbTranseformers', ['transeformers' => $cb->cbTranseformers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection