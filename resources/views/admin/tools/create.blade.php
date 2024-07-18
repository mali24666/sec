@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tool.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tools.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tool_name">{{ trans('cruds.tool.fields.tool_name') }}</label>
                <input class="form-control {{ $errors->has('tool_name') ? 'is-invalid' : '' }}" type="text" name="tool_name" id="tool_name" value="{{ old('tool_name', '') }}" required>
                @if($errors->has('tool_name'))
                    <span class="text-danger">{{ $errors->first('tool_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tool.fields.tool_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job">{{ trans('cruds.tool.fields.job') }}</label>
                <textarea class="form-control {{ $errors->has('job') ? 'is-invalid' : '' }}" name="job" id="job">{{ old('job') }}</textarea>
                @if($errors->has('job'))
                    <span class="text-danger">{{ $errors->first('job') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tool.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.tool.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tool.fields.price_helper') }}</span>
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