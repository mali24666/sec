@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cable.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cables.update", [$cable->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cable_size">{{ trans('cruds.cable.fields.cable_size') }}</label>
                <input class="form-control {{ $errors->has('cable_size') ? 'is-invalid' : '' }}" type="text" name="cable_size" id="cable_size" value="{{ old('cable_size', $cable->cable_size) }}">
                @if($errors->has('cable_size'))
                    <span class="text-danger">{{ $errors->first('cable_size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cable.fields.cable_size_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.cable.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $cable->code) }}">
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cable.fields.code_helper') }}</span>
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