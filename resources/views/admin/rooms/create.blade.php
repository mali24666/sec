@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.room.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rooms.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="station_no">{{ trans('cruds.room.fields.station_no') }}</label>
                <input class="form-control {{ $errors->has('station_no') ? 'is-invalid' : '' }}" type="text" name="station_no" id="station_no" value="{{ old('station_no', '') }}" required>
                @if($errors->has('station_no'))
                    <span class="text-danger">{{ $errors->first('station_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.station_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="neighborhood">{{ trans('cruds.room.fields.neighborhood') }}</label>
                <input class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}" type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood', '') }}">
                @if($errors->has('neighborhood'))
                    <span class="text-danger">{{ $errors->first('neighborhood') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.neighborhood_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="coordinates">{{ trans('cruds.room.fields.coordinates') }}</label>
                <input class="form-control {{ $errors->has('coordinates') ? 'is-invalid' : '' }}" type="text" name="coordinates" id="coordinates" value="{{ old('coordinates', '') }}" required>
                @if($errors->has('coordinates'))
                    <span class="text-danger">{{ $errors->first('coordinates') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.coordinates_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('work_lamp') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="work_lamp" value="0">
                    <input class="form-check-input" type="checkbox" name="work_lamp" id="work_lamp" value="1" {{ old('work_lamp', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="work_lamp">{{ trans('cruds.room.fields.work_lamp') }}</label>
                </div>
                @if($errors->has('work_lamp'))
                    <span class="text-danger">{{ $errors->first('work_lamp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.work_lamp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lamp_befor">{{ trans('cruds.room.fields.lamp_befor') }}</label>
                <div class="needsclick dropzone {{ $errors->has('lamp_befor') ? 'is-invalid' : '' }}" id="lamp_befor-dropzone">
                </div>
                @if($errors->has('lamp_befor'))
                    <span class="text-danger">{{ $errors->first('lamp_befor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.lamp_befor_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('fanwrok') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="fanwrok" value="0">
                    <input class="form-check-input" type="checkbox" name="fanwrok" id="fanwrok" value="1" {{ old('fanwrok', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="fanwrok">{{ trans('cruds.room.fields.fanwrok') }}</label>
                </div>
                @if($errors->has('fanwrok'))
                    <span class="text-danger">{{ $errors->first('fanwrok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.fanwrok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fan_befor">{{ trans('cruds.room.fields.fan_befor') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fan_befor') ? 'is-invalid' : '' }}" id="fan_befor-dropzone">
                </div>
                @if($errors->has('fan_befor'))
                    <span class="text-danger">{{ $errors->first('fan_befor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.room.fields.fan_befor_helper') }}</span>
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
    var uploadedLampBeforMap = {}
Dropzone.options.lampBeforDropzone = {
    url: '{{ route('admin.rooms.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="lamp_befor[]" value="' + response.name + '">')
      uploadedLampBeforMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedLampBeforMap[file.name]
      }
      $('form').find('input[name="lamp_befor[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($room) && $room->lamp_befor)
      var files = {!! json_encode($room->lamp_befor) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="lamp_befor[]" value="' + file.file_name + '">')
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
    var uploadedFanBeforMap = {}
Dropzone.options.fanBeforDropzone = {
    url: '{{ route('admin.rooms.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="fan_befor[]" value="' + response.name + '">')
      uploadedFanBeforMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFanBeforMap[file.name]
      }
      $('form').find('input[name="fan_befor[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($room) && $room->fan_befor)
      var files = {!! json_encode($room->fan_befor) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="fan_befor[]" value="' + file.file_name + '">')
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