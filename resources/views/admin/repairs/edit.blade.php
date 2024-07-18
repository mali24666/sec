@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.repair.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.repairs.update", [$repair->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="car_number_id">{{ trans('cruds.repair.fields.car_number') }}</label>
                <select class="form-control select2 {{ $errors->has('car_number') ? 'is-invalid' : '' }}" name="car_number_id" id="car_number_id" required>
                    @foreach($car_numbers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('car_number_id') ? old('car_number_id') : $repair->car_number->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_number'))
                    <span class="text-danger">{{ $errors->first('car_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.car_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.repair.fields.branch') }}</label>
                <select class="form-control {{ $errors->has('branch') ? 'is-invalid' : '' }}" name="branch" id="branch">
                    <option value disabled {{ old('branch', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Repair::BRANCH_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('branch', $repair->branch) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch'))
                    <span class="text-danger">{{ $errors->first('branch') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.branch_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.repair.fields.department') }}</label>
                <select class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department" id="department" required>
                    <option value disabled {{ old('department', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Repair::DEPARTMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('department', $repair->department) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="issue">{{ trans('cruds.repair.fields.issue') }}</label>
                <input class="form-control {{ $errors->has('issue') ? 'is-invalid' : '' }}" type="text" name="issue" id="issue" value="{{ old('issue', $repair->issue) }}">
                @if($errors->has('issue'))
                    <span class="text-danger">{{ $errors->first('issue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.issue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pic">{{ trans('cruds.repair.fields.pic') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pic') ? 'is-invalid' : '' }}" id="pic-dropzone">
                </div>
                @if($errors->has('pic'))
                    <span class="text-danger">{{ $errors->first('pic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.repair.fields.details') }}</label>
                <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{{ old('details', $repair->details) }}</textarea>
                @if($errors->has('details'))
                    <span class="text-danger">{{ $errors->first('details') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order_by">{{ trans('cruds.repair.fields.order_by') }}</label>
                <input class="form-control {{ $errors->has('order_by') ? 'is-invalid' : '' }}" type="text" name="order_by" id="order_by" value="{{ old('order_by', $repair->order_by) }}">
                @if($errors->has('order_by'))
                    <span class="text-danger">{{ $errors->first('order_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.order_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.repair.fields.stuts') }}</label>
                <select class="form-control {{ $errors->has('stuts') ? 'is-invalid' : '' }}" name="stuts" id="stuts">
                    <option value disabled {{ old('stuts', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Repair::STUTS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stuts', $repair->stuts) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stuts'))
                    <span class="text-danger">{{ $errors->first('stuts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.stuts_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pic_after">{{ trans('cruds.repair.fields.pic_after') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pic_after') ? 'is-invalid' : '' }}" id="pic_after-dropzone">
                </div>
                @if($errors->has('pic_after'))
                    <span class="text-danger">{{ $errors->first('pic_after') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.pic_after_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost">{{ trans('cruds.repair.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" type="number" name="cost" id="cost" value="{{ old('cost', $repair->cost) }}" step="0.01">
                @if($errors->has('cost'))
                    <span class="text-danger">{{ $errors->first('cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opinion">{{ trans('cruds.repair.fields.opinion') }}</label>
                <textarea class="form-control {{ $errors->has('opinion') ? 'is-invalid' : '' }}" name="opinion" id="opinion">{{ old('opinion', $repair->opinion) }}</textarea>
                @if($errors->has('opinion'))
                    <span class="text-danger">{{ $errors->first('opinion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.opinion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="repair_id">{{ trans('cruds.repair.fields.repair') }}</label>
                <select class="form-control select2 {{ $errors->has('repair') ? 'is-invalid' : '' }}" name="repair_id" id="repair_id">
                    @foreach($repairs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('repair_id') ? old('repair_id') : $repair->repair->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('repair'))
                    <span class="text-danger">{{ $errors->first('repair') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.repair.fields.repair_helper') }}</span>
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
    url: '{{ route('admin.repairs.storeMedia') }}',
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
@if(isset($repair) && $repair->pic)
      var files = {!! json_encode($repair->pic) !!}
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
    url: '{{ route('admin.repairs.storeMedia') }}',
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
@if(isset($repair) && $repair->pic_after)
      var files = {!! json_encode($repair->pic_after) !!}
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
@endsection