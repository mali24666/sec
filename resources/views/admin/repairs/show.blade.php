@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.repair.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.repairs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.id') }}
                        </th>
                        <td>
                            {{ $repair->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.car_number') }}
                        </th>
                        <td>
                            {{ $repair->car_number->car_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.branch') }}
                        </th>
                        <td>
                            {{ App\Models\Repair::BRANCH_SELECT[$repair->branch] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.department') }}
                        </th>
                        <td>
                            {{ App\Models\Repair::DEPARTMENT_SELECT[$repair->department] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.issue') }}
                        </th>
                        <td>
                            {{ $repair->issue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.pic') }}
                        </th>
                        <td>
                            @foreach($repair->pic as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.details') }}
                        </th>
                        <td>
                            {{ $repair->details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.order_by') }}
                        </th>
                        <td>
                            {{ $repair->order_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.stuts') }}
                        </th>
                        <td>
                            {{ App\Models\Repair::STUTS_SELECT[$repair->stuts] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.pic_after') }}
                        </th>
                        <td>
                            @foreach($repair->pic_after as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.cost') }}
                        </th>
                        <td>
                            {{ $repair->cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.opinion') }}
                        </th>
                        <td>
                            {{ $repair->opinion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.repair.fields.repair') }}
                        </th>
                        <td>
                            {{ $repair->repair->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.repairs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection