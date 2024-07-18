@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.line.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.lines.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.line.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $line->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.line.fields.station') }}
                                    </th>
                                    <td>
                                        {{ $line->station->station_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.line.fields.line_no') }}
                                    </th>
                                    <td>
                                        {{ $line->line_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.line.fields.trans') }}
                                    </th>
                                    <td>
                                        @foreach($line->trans as $key => $trans)
                                            <span class="label label-info">{{ $trans->t_no }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.lines.index') }}">
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
                        <a href="#feeder_projects" aria-controls="feeder_projects" role="tab" data-toggle="tab">
                            {{ trans('cruds.project.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="feeder_projects">
                        @includeIf('admin.lines.relationships.feederProjects', ['projects' => $line->feederProjects])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection