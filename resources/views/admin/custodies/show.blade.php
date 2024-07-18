@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.custody.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.custodies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.id') }}
                        </th>
                        <td>
                            {{ $custody->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.employee_name') }}
                        </th>
                        <td>
                            {{ $custody->employee_name->emp_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.tools') }}
                        </th>
                        <td>
                            {{ $custody->tools->tool_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.number') }}
                        </th>
                        <td>
                            {{ $custody->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.given_by') }}
                        </th>
                        <td>
                            {{ $custody->given_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.date') }}
                        </th>
                        <td>
                            {{ $custody->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.back_date') }}
                        </th>
                        <td>
                            {{ $custody->back_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.stunts') }}
                        </th>
                        <td>
                            {{ App\Models\Custody::STUNTS_SELECT[$custody->stunts] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.receve_by') }}
                        </th>
                        <td>
                            {{ $custody->receve_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.pic') }}
                        </th>
                        <td>
                            @foreach($custody->pic as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.custody.fields.received') }}
                        </th>
                        <td>
                            {{ App\Models\Custody::RECEIVED_SELECT[$custody->received] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.custodies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection