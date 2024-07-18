@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.task.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tasks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.id') }}
                        </th>
                        <td>
                            {{ $task->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.lics_file') }}
                        </th>
                        <td>
                            @foreach($task->lics_file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.lics_no') }}
                        </th>
                        <td>
                            {{ $task->lics_no->license_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.name') }}
                        </th>
                        <td>
                            {{ $task->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.copy') }}
                        </th>
                        <td>
                            {{ $task->copy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.start_time') }}
                        </th>
                        <td>
                            {{ $task->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.due_date') }}
                        </th>
                        <td>
                            {{ $task->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.length_total') }}
                        </th>
                        <td>
                            {{ $task->length_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.extract') }}
                        </th>
                        <td>
                            {{ $task->extract }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.city') }}
                        </th>
                        <td>
                            {{ $task->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.streat') }}
                        </th>
                        <td>
                            {{ $task->streat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.stuts') }}
                        </th>
                        <td>
                            {{ App\Models\Task::STUTS_SELECT[$task->stuts] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.assigned_to') }}
                        </th>
                        <td>
                            {{ $task->assigned_to->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.created_at') }}
                        </th>
                        <td>
                            {{ $task->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tasks.index') }}">
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
            <a class="nav-link" href="#licses_number_lics" role="tab" data-toggle="tab">
                {{ trans('cruds.lic.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#lics_no_esfelts" role="tab" data-toggle="tab">
                {{ trans('cruds.esfelt.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#lices_no_closes" role="tab" data-toggle="tab">
                {{ trans('cruds.close.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="licses_number_lics">
            @includeIf('admin.tasks.relationships.licsesNumberLics', ['lics' => $task->licsesNumberLics])
        </div>
        <div class="tab-pane" role="tabpanel" id="lics_no_esfelts">
            @includeIf('admin.tasks.relationships.licsNoEsfelts', ['esfelts' => $task->licsNoEsfelts])
        </div>
        <div class="tab-pane" role="tabpanel" id="lices_no_closes">
            @includeIf('admin.tasks.relationships.licesNoCloses', ['closes' => $task->licesNoCloses])
        </div>
    </div>
</div>

@endsection