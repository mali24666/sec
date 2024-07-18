@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.custody.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.custodies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="employee_name_id">{{ trans('cruds.custody.fields.employee_name') }}</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id" required>
                    @foreach($employee_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('employee_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name'))
                    <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.employee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tools_id">{{ trans('cruds.custody.fields.tools') }}</label>
                <select class="form-control select2 {{ $errors->has('tools') ? 'is-invalid' : '' }}" name="tools_id" id="tools_id" required>
                    @foreach($tools as $id => $entry)
                        <option value="{{ $id }}" {{ old('tools_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tools'))
                    <span class="text-danger">{{ $errors->first('tools') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.tools_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.custody.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', '') }}" step="0.01" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="given_by_id">{{ trans('cruds.custody.fields.given_by') }}</label>
                <select class="form-control select2 {{ $errors->has('given_by') ? 'is-invalid' : '' }}" name="given_by_id" id="given_by_id">
                    @foreach($given_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('given_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('given_by'))
                    <span class="text-danger">{{ $errors->first('given_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.given_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.custody.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.date_helper') }}</span>
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