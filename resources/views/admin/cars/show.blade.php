@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.car.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.id') }}
                        </th>
                        <td>
                            {{ $car->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.car_number') }}
                        </th>
                        <td>
                            {{ $car->car_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.car_type') }}
                        </th>
                        <td>
                            {{ App\Models\Car::CAR_TYPE_SELECT[$car->car_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.moror_number') }}
                        </th>
                        <td>
                            {{ $car->moror_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.estmara') }}
                        </th>
                        <td>
                            @if($car->estmara)
                                <a href="{{ $car->estmara->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $car->estmara->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.estmara_date') }}
                        </th>
                        <td>
                            {{ $car->estmara_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.tameen') }}
                        </th>
                        <td>
                            {{ $car->tameen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.factory') }}
                        </th>
                        <td>
                            {{ $car->factory }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.modol') }}
                        </th>
                        <td>
                            {{ $car->modol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.check') }}
                        </th>
                        <td>
                            {{ App\Models\Car::CHECK_SELECT[$car->check] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.check_date') }}
                        </th>
                        <td>
                            {{ $car->check_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.taheel') }}
                        </th>
                        <td>
                            {{ App\Models\Car::TAHEEL_SELECT[$car->taheel] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.driver') }}
                        </th>
                        <td>
                            {{ $car->driver->emp_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#car_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#car_number_repairs" role="tab" data-toggle="tab">
                {{ trans('cruds.repair.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#car_no_car_moves" role="tab" data-toggle="tab">
                {{ trans('cruds.carMove.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="car_employees">
            @includeIf('admin.cars.relationships.carEmployees', ['employees' => $car->carEmployees])
        </div>
        <div class="tab-pane" role="tabpanel" id="car_number_repairs">
            @includeIf('admin.cars.relationships.carNumberRepairs', ['repairs' => $car->carNumberRepairs])
        </div>
        <div class="tab-pane" role="tabpanel" id="car_no_car_moves">
            @includeIf('admin.cars.relationships.carNoCarMoves', ['carMoves' => $car->carNoCarMoves])
        </div>
    </div>
</div>
<div id="app">
<example-component></example-component>
</div>
<h1>here</h1>

@endsection
