@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.cb.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.cbs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('trans_cb_fider_number') ? 'has-error' : '' }}">
                            <label class="required" for="trans_cb_fider_number">{{ trans('cruds.cb.fields.trans_cb_fider_number') }}</label>
                            <input class="form-control" type="text" name="trans_cb_fider_number" id="trans_cb_fider_number" value="{{ old('trans_cb_fider_number', '') }}" required>
                            @if($errors->has('trans_cb_fider_number'))
                                <span class="help-block" role="alert">{{ $errors->first('trans_cb_fider_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.trans_cb_fider_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('minbilars') ? 'has-error' : '' }}">
                            <label for="minbilars">{{ trans('cruds.cb.fields.minbilar') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="minbilars[]" id="minbilars" multiple>
                                @foreach($minbilars as $id => $minbilar)
                                    <option value="{{ $id }}" {{ in_array($id, old('minbilars', [])) ? 'selected' : '' }}>{{ $minbilar }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('minbilars'))
                                <span class="help-block" role="alert">{{ $errors->first('minbilars') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.minbilar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('temperature') ? 'has-error' : '' }}">
                            <label for="temperature">{{ trans('cruds.cb.fields.temperature') }}</label>
                            <input class="form-control" type="text" name="temperature" id="temperature" value="{{ old('temperature', '') }}">
                            @if($errors->has('temperature'))
                                <span class="help-block" role="alert">{{ $errors->first('temperature') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.temperature_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('temperature_refrence') ? 'has-error' : '' }}">
                            <label for="temperature_refrence">{{ trans('cruds.cb.fields.temperature_refrence') }}</label>
                            <input class="form-control" type="text" name="temperature_refrence" id="temperature_refrence" value="{{ old('temperature_refrence', '') }}">
                            @if($errors->has('temperature_refrence'))
                                <span class="help-block" role="alert">{{ $errors->first('temperature_refrence') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.temperature_refrence_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('temperature_picture') ? 'has-error' : '' }}">
                            <label for="temperature_picture">{{ trans('cruds.cb.fields.temperature_picture') }}</label>
                            <div class="needsclick dropzone" id="temperature_picture-dropzone">
                            </div>
                            @if($errors->has('temperature_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('temperature_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.temperature_picture_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedTemperaturePictureMap = {}
Dropzone.options.temperaturePictureDropzone = {
    url: '{{ route('admin.cbs.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 9000,
      height: 9000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="temperature_picture[]" value="' + response.name + '">')
      uploadedTemperaturePictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedTemperaturePictureMap[file.name]
      }
      $('form').find('input[name="temperature_picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($cb) && $cb->temperature_picture)
      var files = {!! json_encode($cb->temperature_picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="temperature_picture[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection