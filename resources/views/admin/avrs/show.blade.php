@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.avr.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.avrs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.avr.fields.id') }}
                        </th>
                        <td>
                            {{ $avr->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.avr.fields.avr_no') }}
                        </th>
                        <td>
                            {{ $avr->avr_no }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.avrs.index') }}">
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
            <a class="nav-link" href="#avr_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#avr_stations" role="tab" data-toggle="tab">
                {{ trans('cruds.station.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#avr_no_lines" role="tab" data-toggle="tab">
                {{ trans('cruds.line.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="avr_projects">
            @includeIf('admin.avrs.relationships.avrProjects', ['projects' => $avr->avrProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="avr_stations">
            @includeIf('admin.avrs.relationships.avrStations', ['stations' => $avr->avrStations])
        </div>
        <div class="tab-pane" role="tabpanel" id="avr_no_lines">
            @includeIf('admin.avrs.relationships.avrNoLines', ['lines' => $avr->avrNoLines])
        </div>
    </div>
</div>

@endsection