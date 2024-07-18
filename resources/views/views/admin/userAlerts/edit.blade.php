@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userAlert.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-alerts.update", [$userAlert->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="alert_text">{{ trans('cruds.userAlert.fields.alert_text') }}</label>
                <input class="form-control {{ $errors->has('alert_text') ? 'is-invalid' : '' }}" type="text" name="alert_text" id="alert_text" value="{{ old('alert_text', $userAlert->alert_text) }}" required>
                @if($errors->has('alert_text'))
                    <span class="text-danger">{{ $errors->first('alert_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.alert_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lices_no_id">{{ trans('cruds.userAlert.fields.lices_no') }}</label>
                <select class="form-control select2 {{ $errors->has('lices_no') ? 'is-invalid' : '' }}" name="lices_no_id" id="lices_no_id">
                    @foreach($lices_nos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lices_no_id') ? old('lices_no_id') : $userAlert->lices_no->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lices_no'))
                    <span class="text-danger">{{ $errors->first('lices_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.lices_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_link">{{ trans('cruds.userAlert.fields.alert_link') }}</label>
                <input class="form-control {{ $errors->has('alert_link') ? 'is-invalid' : '' }}" type="text" name="alert_link" id="alert_link" value="{{ old('alert_link', $userAlert->alert_link) }}">
                @if($errors->has('alert_link'))
                    <span class="text-danger">{{ $errors->first('alert_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.alert_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="users">{{ trans('cruds.userAlert.fields.user') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $userAlert->users->contains($id)) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <span class="text-danger">{{ $errors->first('users') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_end">{{ trans('cruds.userAlert.fields.date_end') }}</label>
                <input class="form-control {{ $errors->has('date_end') ? 'is-invalid' : '' }}" type="number" name="date_end" id="date_end" value="{{ old('date_end', $userAlert->date_end) }}" step="1">
                @if($errors->has('date_end'))
                    <span class="text-danger">{{ $errors->first('date_end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.date_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pic">{{ trans('cruds.userAlert.fields.pic') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pic') ? 'is-invalid' : '' }}" id="pic-dropzone">
                </div>
                @if($errors->has('pic'))
                    <span class="text-danger">{{ $errors->first('pic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pic_after">{{ trans('cruds.userAlert.fields.pic_after') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pic_after') ? 'is-invalid' : '' }}" id="pic_after-dropzone">
                </div>
                @if($errors->has('pic_after'))
                    <span class="text-danger">{{ $errors->first('pic_after') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.pic_after_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eng_sign_photo">{{ trans('cruds.userAlert.fields.eng_sign_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('eng_sign_photo') ? 'is-invalid' : '' }}" id="eng_sign_photo-dropzone">
                </div>
                @if($errors->has('eng_sign_photo'))
                    <span class="text-danger">{{ $errors->first('eng_sign_photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.eng_sign_photo_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedPicMap = {}
Dropzone.options.picDropzone = {
    url: '{{ route('admin.user-alerts.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="pic[]" value="' + response.name + '">')
      uploadedPicMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPicMap[file.name]
      }
      $('form').find('input[name="pic[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($userAlert) && $userAlert->pic)
      var files = {!! json_encode($userAlert->pic) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="pic[]" value="' + file.file_name + '">')
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
    var uploadedPicAfterMap = {}
Dropzone.options.picAfterDropzone = {
    url: '{{ route('admin.user-alerts.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="pic_after[]" value="' + response.name + '">')
      uploadedPicAfterMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPicAfterMap[file.name]
      }
      $('form').find('input[name="pic_after[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($userAlert) && $userAlert->pic_after)
      var files = {!! json_encode($userAlert->pic_after) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="pic_after[]" value="' + file.file_name + '">')
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
    var uploadedEngSignPhotoMap = {}
Dropzone.options.engSignPhotoDropzone = {
    url: '{{ route('admin.user-alerts.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="eng_sign_photo[]" value="' + response.name + '">')
      uploadedEngSignPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedEngSignPhotoMap[file.name]
      }
      $('form').find('input[name="eng_sign_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($userAlert) && $userAlert->eng_sign_photo)
      var files = {!! json_encode($userAlert->eng_sign_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="eng_sign_photo[]" value="' + file.file_name + '">')
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