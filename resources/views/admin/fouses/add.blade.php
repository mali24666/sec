@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('global.create') }} {{ trans('cruds.fouse.title_singular') }}
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route("admin.fouses.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="transformer_id">transformer</label>
                        <input type="text" disabled  value="{{$t_no->t_no}}" ">
                        <input type="text"  hidden  name="transformer_id" value="{{$t_no->id }}" ">
        
                        @if($errors->has('transfer_no'))
                            <span class="text-danger">{{ $errors->first('transfer_no') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="transformer_cb_id">{{ trans('cruds.fouse.fields.transformer_cb') }}</label>
                        <input type="text" disabled  value="{{$cb_number_id->trans_cb_fider_number}}" ">
                        <input type="text" hidden name="transformer_cb_id" value="{{$cb_number_id->id }}" ">
        
        
                        @if($errors->has('transformer_cb'))
                            <span class="text-danger">{{ $errors->first('transformer_cb') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.fouse.fields.transformer_cb_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="minibiler_id">{{ trans('cruds.fouse.fields.minibiler') }}</label>
                        <input type="text" disabled  value="{{$minibller_number->minibller_number}}" ">
                        <input type="text" hidden name="minibiler_id" value="{{$minibller_number->id }}" ">
        
                    </div>
                    <div class="form-group">
                        <label class="required" for="fouse_no">{{ trans('cruds.fouse.fields.fouse_no') }}</label>
                        <input class="form-control {{ $errors->has('fouse_no') ? 'is-invalid' : '' }}" type="text" name="fouse_no" id="fouse_no"
                         value="{{$minibller_number->minibller_number }}-" required>
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



    </div>
</div>
</div>




@endsection