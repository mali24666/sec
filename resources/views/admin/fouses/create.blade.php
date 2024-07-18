@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fouse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fouses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="transfer_no_id">{{ trans('cruds.fouse.fields.transfer_no') }}</label>
                <select class="form-control select2 {{ $errors->has('transfer_no') ? 'is-invalid' : '' }}" name="transfer_no_id" id="transfer_no_id">
                    @foreach($transfer_nos as $id => $entry)
                        <option value="{{ $id }}" {{ old('transfer_no_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transfer_no'))
                    <span class="text-danger">{{ $errors->first('transfer_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fouse.fields.transfer_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transformer_cb_id">{{ trans('cruds.fouse.fields.transformer_cb') }}</label>
                <select class="form-control select2 {{ $errors->has('transformer_cb') ? 'is-invalid' : '' }}" name="transformer_cb_id" id="transformer_cb_id">
                    @foreach($transformer_cbs as $id => $entry)
                        <option value="{{ $id }}" {{ old('transformer_cb_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transformer_cb'))
                    <span class="text-danger">{{ $errors->first('transformer_cb') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fouse.fields.transformer_cb_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="minibiler_id">{{ trans('cruds.fouse.fields.minibiler') }}</label>
                <select class="form-control select2 {{ $errors->has('minibiler') ? 'is-invalid' : '' }}" name="minibiler_id" id="minibiler_id" required>
                    @foreach($minibilers as $id => $entry)
                        <option value="{{ $id }}" {{ old('minibiler_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('minibiler'))
                    <span class="text-danger">{{ $errors->first('minibiler') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fouse.fields.minibiler_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fouse_no">{{ trans('cruds.fouse.fields.fouse_no') }}</label>
                <input class="form-control {{ $errors->has('fouse_no') ? 'is-invalid' : '' }}" type="text" name="fouse_no" id="fouse_no" value="{{ old('fouse_no', '') }}" required>
                @if($errors->has('fouse_no'))
                    <span class="text-danger">{{ $errors->first('fouse_no') }}</span>
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



@endsection