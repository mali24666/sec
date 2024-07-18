@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.line.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.lines.store") }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <div hidden >
                                <label for="station_id">{{ trans('cruds.line.fields.station') }}</label>
                                <select  class="form-control select2 {{ $errors->has('station') ? 'is-invalid' : '' }}" name="station_id" id="station_id">
                                    @foreach($stations as $id => $entry)
                                        <option value="{{ $stations->id}}" {{ old('station_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>

                                </div>
                                <input type="text" disabled name="station_id" value="{{$stations->station_no }}" placeholder="{{$stations->station_no }}">

                                @if($errors->has('station'))
                                    <span class="text-danger">{{ $errors->first('station') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.line.fields.station_helper') }}</span>
                            </div>
                        <div class="form-group {{ $errors->has('line_no') ? 'has-error' : '' }}">
                            <label for="line_no">{{ trans('cruds.line.fields.line_no') }}</label>
                            <input class="form-control" type="text" name="line_no" id="line_no" value="{{ old('line_no', '') }}">
                            @if($errors->has('line_no'))
                                <span class="help-block" role="alert">{{ $errors->first('line_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.line.fields.line_no_helper') }}</span>
                        </div>
                        <div hidden class="form-group {{ $errors->has('trans') ? 'has-error' : '' }}">
                            <label for="trans">{{ trans('cruds.line.fields.trans') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="trans[]" id="trans" multiple>
                                @foreach($trans as $id => $tran)
                                    <option value="{{ $id }}" {{ in_array($id, old('trans', [])) ? 'selected' : '' }}>{{ $tran }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('trans'))
                                <span class="help-block" role="alert">{{ $errors->first('trans') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.line.fields.trans_helper') }}</span>
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