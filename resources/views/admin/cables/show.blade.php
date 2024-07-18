@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cable.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cable.fields.id') }}
                        </th>
                        <td>
                            {{ $cable->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cable.fields.cable_size') }}
                        </th>
                        <td>
                            {{ $cable->cable_size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cable.fields.code') }}
                        </th>
                        <td>
                            {{ $cable->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection