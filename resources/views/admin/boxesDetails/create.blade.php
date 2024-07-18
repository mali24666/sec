@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.boxesDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.boxes-details.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('subscription_number') ? 'has-error' : '' }}">
                            <label class="required" for="subscription_number">{{ trans('cruds.boxesDetail.fields.subscription_number') }}</label>
                            <input class="form-control" type="text" name="subscription_number" id="subscription_number" value="{{ old('subscription_number', '') }}" required>
                            @if($errors->has('subscription_number'))
                                <span class="help-block" role="alert">{{ $errors->first('subscription_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.subscription_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cb') ? 'has-error' : '' }}">
                            <label for="cb">{{ trans('cruds.boxesDetail.fields.cb') }}</label>
                            <input class="form-control" type="text" name="cb" id="cb" value="{{ old('cb', '') }}">
                            @if($errors->has('cb'))
                                <span class="help-block" role="alert">{{ $errors->first('cb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.cb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
                            <label for="rating">{{ trans('cruds.boxesDetail.fields.rating') }}</label>
                            <input class="form-control" type="text" name="rating" id="rating" value="{{ old('rating', '') }}">
                            @if($errors->has('rating'))
                                <span class="help-block" role="alert">{{ $errors->first('rating') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.rating_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('watcher') ? 'has-error' : '' }}">
                            <label for="watcher">{{ trans('cruds.boxesDetail.fields.watcher') }}</label>
                            <input class="form-control" type="text" name="watcher" id="watcher" value="{{ old('watcher', '') }}">
                            @if($errors->has('watcher'))
                                <span class="help-block" role="alert">{{ $errors->first('watcher') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.watcher_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('watch_size') ? 'has-error' : '' }}">
                            <label for="watch_size">{{ trans('cruds.boxesDetail.fields.watch_size') }}</label>
                            <input class="form-control" type="text" name="watch_size" id="watch_size" value="{{ old('watch_size', '') }}">
                            @if($errors->has('watch_size'))
                                <span class="help-block" role="alert">{{ $errors->first('watch_size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.watch_size_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_transe') ? 'has-error' : '' }}">
                            <label for="ct_transe">{{ trans('cruds.boxesDetail.fields.ct_transe') }}</label>
                            <input class="form-control" type="text" name="ct_transe" id="ct_transe" value="{{ old('ct_transe', '') }}">
                            @if($errors->has('ct_transe'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_transe') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.ct_transe_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('subscription_class') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.boxesDetail.fields.subscription_class') }}</label>
                            <select class="form-control" name="subscription_class" id="subscription_class">
                                <option value disabled {{ old('subscription_class', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\BoxesDetail::SUBSCRIPTION_CLASS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('subscription_class', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subscription_class'))
                                <span class="help-block" role="alert">{{ $errors->first('subscription_class') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.subscription_class_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('absurdity') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.boxesDetail.fields.absurdity') }}</label>
                            <select class="form-control" name="absurdity" id="absurdity">
                                <option value disabled {{ old('absurdity', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\BoxesDetail::ABSURDITY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('absurdity', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('absurdity'))
                                <span class="help-block" role="alert">{{ $errors->first('absurdity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.absurdity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('account_number') ? 'has-error' : '' }}">
                            <label for="account_number">{{ trans('cruds.boxesDetail.fields.account_number') }}</label>
                            <input class="form-control" type="text" name="account_number" id="account_number" value="{{ old('account_number', '') }}">
                            @if($errors->has('account_number'))
                                <span class="help-block" role="alert">{{ $errors->first('account_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.account_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('outside_pic') ? 'has-error' : '' }}">
                            <label for="outside_pic">{{ trans('cruds.boxesDetail.fields.outside_pic') }}</label>
                            <div class="needsclick dropzone" id="outside_pic-dropzone">
                            </div>
                            @if($errors->has('outside_pic'))
                                <span class="help-block" role="alert">{{ $errors->first('outside_pic') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.outside_pic_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('inside_pic') ? 'has-error' : '' }}">
                            <label for="inside_pic">{{ trans('cruds.boxesDetail.fields.inside_pic') }}</label>
                            <div class="needsclick dropzone" id="inside_pic-dropzone">
                            </div>
                            @if($errors->has('inside_pic'))
                                <span class="help-block" role="alert">{{ $errors->first('inside_pic') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boxesDetail.fields.inside_pic_helper') }}</span>
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
    var uploadedOutsidePicMap = {}
Dropzone.options.outsidePicDropzone = {
    url: '{{ route('admin.boxes-details.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="outside_pic[]" value="' + response.name + '">')
      uploadedOutsidePicMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedOutsidePicMap[file.name]
      }
      $('form').find('input[name="outside_pic[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($boxesDetail) && $boxesDetail->outside_pic)
      var files = {!! json_encode($boxesDetail->outside_pic) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="outside_pic[]" value="' + file.file_name + '">')
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
<script>
    var uploadedInsidePicMap = {}
Dropzone.options.insidePicDropzone = {
    url: '{{ route('admin.boxes-details.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="inside_pic[]" value="' + response.name + '">')
      uploadedInsidePicMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedInsidePicMap[file.name]
      }
      $('form').find('input[name="inside_pic[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($boxesDetail) && $boxesDetail->inside_pic)
      var files = {!! json_encode($boxesDetail->inside_pic) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="inside_pic[]" value="' + file.file_name + '">')
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