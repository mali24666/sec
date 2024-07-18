@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.station.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.stations.update", [$station->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('station_no') ? 'has-error' : '' }}">
                            <label for="station_no">{{ trans('cruds.station.fields.station_no') }}</label>
                            <input class="form-control" type="text" name="station_no" id="station_no" value="{{ old('station_no', $station->station_no) }}">
                            @if($errors->has('station_no'))
                                <span class="help-block" role="alert">{{ $errors->first('station_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.station.fields.station_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label for="location">{{ trans('cruds.station.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location" value="{{ old('location', $station->location) }}">
                            @if($errors->has('location'))
                                <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.station.fields.location_helper') }}</span>
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