@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employees.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label class="required" for="emp_name">{{ trans('cruds.employee.fields.emp_name') }}</label>
                <input class="form-control {{ $errors->has('emp_name') ? 'is-invalid' : '' }}" type="text" name="emp_name" id="emp_name" value="{{ old('emp_name', '') }}" required>
                @if($errors->has('emp_name'))
                    <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.emp_name_helper') }}</span>
            </div>
            <div class="col-md-3">
                <label class="required">{{ trans('cruds.employee.fields.branch') }}</label>
                <select class="form-control {{ $errors->has('branch') ? 'is-invalid' : '' }}" name="branch" id="branch" required>
                    <option value disabled {{ old('branch', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::BRANCH_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('branch', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch'))
                    <span class="text-danger">{{ $errors->first('branch') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.branch_helper') }}</span>
            </div>
            <div class="col-md-3">
                <label class="required" for="nationlaty">{{ trans('cruds.employee.fields.nationlaty') }}</label>
                <input class="form-control {{ $errors->has('nationlaty') ? 'is-invalid' : '' }}" type="text" name="nationlaty" id="nationlaty" value="{{ old('nationlaty', '') }}" required>
                @if($errors->has('nationlaty'))
                    <span class="text-danger">{{ $errors->first('nationlaty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.nationlaty_helper') }}</span>
            </div>
            <div class="col-md-3">
                <label class="required" for="emp">{{ trans('cruds.employee.fields.emp') }}</label>
                <input class="form-control {{ $errors->has('emp') ? 'is-invalid' : '' }}" type="number" name="emp" id="emp" value="{{ old('emp', '') }}" step="1" required>
                @if($errors->has('emp'))
                    <span class="text-danger">{{ $errors->first('emp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.emp_helper') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="id_expire">{{ trans('cruds.employee.fields.id_expire') }}</label>
                <input class="form-control date {{ $errors->has('id_expire') ? 'is-invalid' : '' }}" type="text" name="id_expire" id="id_expire" value="{{ old('id_expire') }}">
                @if($errors->has('id_expire'))
                    <span class="text-danger">{{ $errors->first('id_expire') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.id_expire_helper') }}</span>
            </div>
            <div class="col-md-3">
                <label for="car_id">{{ trans('cruds.employee.fields.car') }}</label>
                <select class="form-control select2 {{ $errors->has('car') ? 'is-invalid' : '' }}" name="car_id" id="car_id">
                    @foreach($cars as $id => $entry)
                        <option value="{{ $id }}" {{ old('car_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car'))
                    <span class="text-danger">{{ $errors->first('car') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.car_helper') }}</span>
            </div>
            <div class="col-md-3">
                <label class="required" for="occupation">{{ trans('cruds.employee.fields.occupation') }}</label>
                <input class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}" type="text" name="occupation" id="occupation" value="{{ old('occupation', '') }}" required>
                @if($errors->has('occupation'))
                    <span class="text-danger">{{ $errors->first('occupation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.occupation_helper') }}</span>
            </div>
            <div class="col-md-3">
                <label>{{ trans('cruds.employee.fields.occupation_agree') }}</label>
                <select class="form-control {{ $errors->has('occupation_agree') ? 'is-invalid' : '' }}" name="occupation_agree" id="occupation_agree">
                    <option value disabled {{ old('occupation_agree', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employee::OCCUPATION_AGREE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('occupation_agree', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('occupation_agree'))
                    <span class="text-danger">{{ $errors->first('occupation_agree') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.occupation_agree_helper') }}</span>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
        <label for="occupation_insite">{{ trans('cruds.employee.fields.occupation_insite') }}</label>
                <input class="form-control {{ $errors->has('occupation_insite') ? 'is-invalid' : '' }}" type="text" name="occupation_insite" id="occupation_insite" value="{{ old('occupation_insite', '') }}">
                @if($errors->has('occupation_insite'))
                    <span class="text-danger">{{ $errors->first('occupation_insite') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.occupation_insite_helper') }}</span>
            </div>
            <div class="col-md-4">
            <label for="en_flow_id">{{ trans('cruds.employee.fields.en_flow') }}</label>
                <select class="form-control select2 {{ $errors->has('en_flow') ? 'is-invalid' : '' }}" name="en_flow_id" id="en_flow_id">
                    @foreach($en_flows as $id => $entry)
                        <option value="{{ $id }}" {{ old('en_flow_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('en_flow'))
                    <span class="text-danger">{{ $errors->first('en_flow') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.en_flow_helper') }}</span>
            </div>
            <div class="col-md-4">
            <label for="supervisor_id">{{ trans('cruds.employee.fields.supervisor') }}</label>
                <select class="form-control select2 {{ $errors->has('supervisor') ? 'is-invalid' : '' }}" name="supervisor_id" id="supervisor_id">
                    @foreach($supervisors as $id => $entry)
                        <option value="{{ $id }}" {{ old('supervisor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supervisor'))
                    <span class="text-danger">{{ $errors->first('supervisor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.supervisor_helper') }}</span>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <label for="persion_pic">{{ trans('cruds.employee.fields.persion_pic') }}</label>
                <div class="needsclick dropzone {{ $errors->has('persion_pic') ? 'is-invalid' : '' }}" id="persion_pic-dropzone">
                </div>
                @if($errors->has('persion_pic'))
                    <span class="text-danger">{{ $errors->first('persion_pic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.persion_pic_helper') }}</span>
            </div>
            <div class="col-md-6">
                <label for="id_photo">{{ trans('cruds.employee.fields.id_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('id_photo') ? 'is-invalid' : '' }}" id="id_photo-dropzone">
                </div>
                @if($errors->has('id_photo'))
                    <span class="text-danger">{{ $errors->first('id_photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.employee.fields.id_photo_helper') }}</span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>

        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedIdPhotoMap = {}
Dropzone.options.idPhotoDropzone = {
    url: '{{ route('admin.employees.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="id_photo[]" value="' + response.name + '">')
      uploadedIdPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedIdPhotoMap[file.name]
      }
      $('form').find('input[name="id_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($employee) && $employee->id_photo)
      var files = {!! json_encode($employee->id_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="id_photo[]" value="' + file.file_name + '">')
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
    Dropzone.options.persionPicDropzone = {
    url: '{{ route('admin.employees.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="persion_pic"]').remove()
      $('form').append('<input type="hidden" name="persion_pic" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="persion_pic"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($employee) && $employee->persion_pic)
      var file = {!! json_encode($employee->persion_pic) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="persion_pic" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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