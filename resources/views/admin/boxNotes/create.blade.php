@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.boxNote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.box-notes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="box_note">{{ trans('cruds.boxNote.fields.box_note') }}</label>
                <input class="form-control {{ $errors->has('box_note') ? 'is-invalid' : '' }}" type="text" name="box_note" id="box_note" value="{{ old('box_note', '') }}" required>
                @if($errors->has('box_note'))
                    <span class="text-danger">{{ $errors->first('box_note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.boxNote.fields.box_note_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection