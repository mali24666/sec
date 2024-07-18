@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.boxNote.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.box-notes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.boxNote.fields.id') }}
                        </th>
                        <td>
                            {{ $boxNote->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.boxNote.fields.box_note') }}
                        </th>
                        <td>
                            {{ $boxNote->box_note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.box-notes.index') }}">
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
            <a class="nav-link" href="#box_note_boxes" role="tab" data-toggle="tab">
                {{ trans('cruds.box.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="box_note_boxes">
            @includeIf('admin.boxNotes.relationships.boxNoteBoxes', ['boxes' => $boxNote->boxNoteBoxes])
        </div>
    </div>
</div>

@endsection