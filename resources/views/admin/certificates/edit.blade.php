@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.certificate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.certificates.update", [$certificate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="employee_name_id">{{ trans('cruds.certificate.fields.employee_name') }}</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id" required>
                    @foreach($employee_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('employee_name_id') ? old('employee_name_id') : $certificate->employee_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name'))
                    <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.employee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.certificate.fields.studts') }}</label>
                <select class="form-control {{ $errors->has('studts') ? 'is-invalid' : '' }}" name="studts" id="studts" required>
                    <option value disabled {{ old('studts', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Certificate::STUDTS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('studts', $certificate->studts) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('studts'))
                    <span class="text-danger">{{ $errors->first('studts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.studts_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_name_id">{{ trans('cruds.certificate.fields.course_name') }}</label>
                <select class="form-control select2 {{ $errors->has('course_name') ? 'is-invalid' : '' }}" name="course_name_id" id="course_name_id" required>
                    @foreach($course_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_name_id') ? old('course_name_id') : $certificate->course_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_name'))
                    <span class="text-danger">{{ $errors->first('course_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.course_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.certificate.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $certificate->start_date) }}" required>
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.certificate.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $certificate->end_date) }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost">{{ trans('cruds.certificate.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" type="number" name="cost" id="cost" value="{{ old('cost', $certificate->cost) }}" step="0.01">
                @if($errors->has('cost'))
                    <span class="text-danger">{{ $errors->first('cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.certificate.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.certificate.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.photo_helper') }}</span>
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
    url: '{{ route('admin.certificates.storeMedia') }}',
    maxFilesize: 4, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
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
@if(isset($certificate) && $certificate->file)
          var files =
            {!! json_encode($certificate->file) !!}
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
    url: '{{ route('admin.certificates.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
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
@if(isset($certificate) && $certificate->photo)
      var files = {!! json_encode($certificate->photo) !!}
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