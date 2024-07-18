@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.city.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.cities.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('city_name') ? 'has-error' : '' }}">
                            <label class="required" for="city_name">{{ trans('cruds.city.fields.city_name') }}</label>
                            <input class="form-control" type="text" name="city_name" id="city_name" value="{{ old('city_name', '') }}" required>
                            @if($errors->has('city_name'))
                                <span class="help-block" role="alert">{{ $errors->first('city_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.city_name_helper') }}</span>
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