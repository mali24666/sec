@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fouse.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fouses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fouse.fields.id') }}
                        </th>
                        <td>
                            {{ $fouse->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fouse.fields.transfer_no') }}
                        </th>
                        <td>
                            {{ $fouse->transfer_no->t_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fouse.fields.transformer_cb') }}
                        </th>
                        <td>
                            {{ $fouse->transformer_cb->trans_cb_fider_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fouse.fields.minibiler') }}
                        </th>
                        <td>
                            {{ $fouse->minibiler->minibller_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fouse.fields.fouse_no') }}
                        </th>
                        <td>
                            {{ $fouse->fouse_no }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fouses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection