@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tool.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tools.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.id') }}
                        </th>
                        <td>
                            {{ $tool->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.tool_name') }}
                        </th>
                        <td>
                            {{ $tool->tool_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.job') }}
                        </th>
                        <td>
                            {{ $tool->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.price') }}
                        </th>
                        <td>
                            {{ $tool->price }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tools.index') }}">
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
            <a class="nav-link" href="#tools_custodies" role="tab" data-toggle="tab">
                {{ trans('cruds.custody.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="tools_custodies">
            @includeIf('admin.tools.relationships.toolsCustodies', ['custodies' => $tool->toolsCustodies])
        </div>
    </div>
</div>

@endsection