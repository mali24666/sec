@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.carMove.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.car-moves.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="car_no_id">{{ trans('cruds.carMove.fields.car_no') }}</label>
                <select class="form-control select2 {{ $errors->has('car_no') ? 'is-invalid' : '' }}" name="car_no_id" id="car_no_id" required>
                    @foreach($car_nos as $id => $entry)
                        <option value="{{ $id }}" {{ old('car_no_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_no'))
                    <span class="text-danger">{{ $errors->first('car_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carMove.fields.car_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_driver_id">{{ trans('cruds.carMove.fields.last_driver') }}</label>
                <select class="form-control select2 {{ $errors->has('last_driver') ? 'is-invalid' : '' }}" name="last_driver_id" id="last_driver_id">
                    @foreach($last_drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('last_driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('last_driver'))
                    <span class="text-danger">{{ $errors->first('last_driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carMove.fields.last_driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.carMove.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carMove.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.carMove.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carMove.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.carMove.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carMove.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.carMove.fields.date') }}</label>
                <input class="form-control datetime {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.carMove.fields.date_helper') }}</span>
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
    var uploadedFileMap = {}
Dropzone.options.fileDropzone = {
    url: '{{ route('admin.car-moves.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
      uploadedFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileMap[file.name]
      }
      $('form').find('input[name="file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($carMove) && $carMove->file)
          var files =
            {!! json_encode($carMove->file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
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
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.car-moves.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 8096,
      height: 8096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($carMove) && $carMove->photo)
      var files = {!! json_encode($carMove->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
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