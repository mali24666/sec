@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.fouse.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.fouses.update", [$fouse->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('transformer') ? 'has-error' : '' }}">
                            <label for="transformer_id">{{ trans('cruds.fouse.fields.transformer') }}</label>
                            <select class="form-control select2" name="transformer_id" id="transformer_id">
                                @foreach($transformers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('transformer_id') ? old('transformer_id') : $fouse->transformer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transformer'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fouse.fields.transformer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transformer_cb') ? 'has-error' : '' }}">
                            <label for="transformer_cb_id">{{ trans('cruds.fouse.fields.transformer_cb') }}</label>
                            <select class="form-control select2" name="transformer_cb_id" id="transformer_cb_id">
                                @foreach($transformer_cbs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('transformer_cb_id') ? old('transformer_cb_id') : $fouse->transformer_cb->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transformer_cb'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer_cb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fouse.fields.transformer_cb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('minibiler') ? 'has-error' : '' }}">
                            <label class="required" for="minibiler_id">{{ trans('cruds.fouse.fields.minibiler') }}</label>
                            <select class="form-control select2" name="minibiler_id" id="minibiler_id" required>
                                @foreach($minibilers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('minibiler_id') ? old('minibiler_id') : $fouse->minibiler->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('minibiler'))
                                <span class="help-block" role="alert">{{ $errors->first('minibiler') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fouse.fields.minibiler_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fouse_no') ? 'has-error' : '' }}">
                            <label class="required" for="fouse_no">{{ trans('cruds.fouse.fields.fouse_no') }}</label>
                            <input class="form-control" type="text" name="fouse_no" id="fouse_no" value="{{ old('fouse_no', $fouse->fouse_no) }}" required>
                            @if($errors->has('fouse_no'))
                                <span class="help-block" role="alert">{{ $errors->first('fouse_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fouse.fields.fouse_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection