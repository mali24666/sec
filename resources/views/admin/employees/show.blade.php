@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.id') }}
                        </th>
                        <td>
                            {{ $employee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.emp_name') }}
                        </th>
                        <td>
                            {{ $employee->emp_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.branch') }}
                        </th>
                        <td>
                            {{ App\Models\Employee::BRANCH_SELECT[$employee->branch] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.nationlaty') }}
                        </th>
                        <td>
                            {{ $employee->nationlaty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.emp') }}
                        </th>
                        <td>
                            {{ $employee->emp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.id_expire') }}
                        </th>
                        <td>
                            {{ $employee->id_expire }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.car') }}
                        </th>
                        <td>
                            {{ $employee->car->car_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.id_photo') }}
                        </th>
                        <td>
                            @foreach($employee->id_photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.occupation') }}
                        </th>
                        <td>
                            {{ $employee->occupation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.occupation_agree') }}
                        </th>
                        <td>
                            {{ App\Models\Employee::OCCUPATION_AGREE_SELECT[$employee->occupation_agree] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.occupation_insite') }}
                        </th>
                        <td>
                            {{ $employee->occupation_insite }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.persion_pic') }}
                        </th>
                        <td>
                            @if($employee->persion_pic)
                                <a href="{{ $employee->persion_pic->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $employee->persion_pic->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.en_flow') }}
                        </th>
                        <td>
                            {{ $employee->en_flow->emp_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.supervisor') }}
                        </th>
                        <td>
                            {{ $employee->supervisor->emp_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
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
            <a class="nav-link" href="#employee_name_custodies" role="tab" data-toggle="tab">
                {{ trans('cruds.custody.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#employee_name_certificates" role="tab" data-toggle="tab">
                {{ trans('cruds.certificate.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#driver_cars" role="tab" data-toggle="tab">
                {{ trans('cruds.car.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#en_flow_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#supervisor_employees" role="tab" data-toggle="tab">
                {{ trans('cruds.employee.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#last_driver_car_moves" role="tab" data-toggle="tab">
                {{ trans('cruds.carMove.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="employee_name_custodies">
            @includeIf('admin.employees.relationships.employeeNameCustodies', ['custodies' => $employee->employeeNameCustodies])
        </div>
        <div class="tab-pane" role="tabpanel" id="employee_name_certificates">
            @includeIf('admin.employees.relationships.employeeNameCertificates', ['certificates' => $employee->employeeNameCertificates])
        </div>
        <div class="tab-pane" role="tabpanel" id="driver_cars">
            @includeIf('admin.employees.relationships.driverCars', ['cars' => $employee->driverCars])
        </div>
        <div class="tab-pane" role="tabpanel" id="en_flow_employees">
            @includeIf('admin.employees.relationships.enFlowEmployees', ['employees' => $employee->enFlowEmployees])
        </div>
        <div class="tab-pane" role="tabpanel" id="supervisor_employees">
            @includeIf('admin.employees.relationships.supervisorEmployees', ['employees' => $employee->supervisorEmployees])
        </div>
        <div class="tab-pane" role="tabpanel" id="last_driver_car_moves">
            @includeIf('admin.employees.relationships.lastDriverCarMoves', ['carMoves' => $employee->lastDriverCarMoves])
        </div>
    </div>
</div>

@endsection