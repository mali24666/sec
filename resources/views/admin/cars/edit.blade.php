@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.car.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cars.update", [$car->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="car_number">{{ trans('cruds.car.fields.car_number') }}</label>
                <input class="form-control {{ $errors->has('car_number') ? 'is-invalid' : '' }}" type="number" name="car_number" id="car_number" value="{{ old('car_number', $car->car_number) }}" step="1">
                @if($errors->has('car_number'))
                    <span class="text-danger">{{ $errors->first('car_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.car_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.car.fields.car_type') }}</label>
                <select class="form-control {{ $errors->has('car_type') ? 'is-invalid' : '' }}" name="car_type" id="car_type">
                    <option value disabled {{ old('car_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Car::CAR_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('car_type', $car->car_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_type'))
                    <span class="text-danger">{{ $errors->first('car_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.car_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="moror_number">{{ trans('cruds.car.fields.moror_number') }}</label>
                <input class="form-control {{ $errors->has('moror_number') ? 'is-invalid' : '' }}" type="text" name="moror_number" id="moror_number" value="{{ old('moror_number', $car->moror_number) }}">
                @if($errors->has('moror_number'))
                    <span class="text-danger">{{ $errors->first('moror_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.moror_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estmara">{{ trans('cruds.car.fields.estmara') }}</label>
                <div class="needsclick dropzone {{ $errors->has('estmara') ? 'is-invalid' : '' }}" id="estmara-dropzone">
                </div>
                @if($errors->has('estmara'))
                    <span class="text-danger">{{ $errors->first('estmara') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.estmara_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estmara_date">{{ trans('cruds.car.fields.estmara_date') }}</label>
                <input class="form-control date {{ $errors->has('estmara_date') ? 'is-invalid' : '' }}" type="text" name="estmara_date" id="estmara_date" value="{{ old('estmara_date', $car->estmara_date) }}">
                @if($errors->has('estmara_date'))
                    <span class="text-danger">{{ $errors->first('estmara_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.estmara_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tameen">{{ trans('cruds.car.fields.tameen') }}</label>
                <input class="form-control date {{ $errors->has('tameen') ? 'is-invalid' : '' }}" type="text" name="tameen" id="tameen" value="{{ old('tameen', $car->tameen) }}">
                @if($errors->has('tameen'))
                    <span class="text-danger">{{ $errors->first('tameen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.tameen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="factory">{{ trans('cruds.car.fields.factory') }}</label>
                <input class="form-control {{ $errors->has('factory') ? 'is-invalid' : '' }}" type="text" name="factory" id="factory" value="{{ old('factory', $car->factory) }}">
                @if($errors->has('factory'))
                    <span class="text-danger">{{ $errors->first('factory') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.factory_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="modol">{{ trans('cruds.car.fields.modol') }}</label>
                <input class="form-control {{ $errors->has('modol') ? 'is-invalid' : '' }}" type="text" name="modol" id="modol" value="{{ old('modol', $car->modol) }}">
                @if($errors->has('modol'))
                    <span class="text-danger">{{ $errors->first('modol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.modol_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.car.fields.check') }}</label>
                <select class="form-control {{ $errors->has('check') ? 'is-invalid' : '' }}" name="check" id="check">
                    <option value disabled {{ old('check', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Car::CHECK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('check', $car->check) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('check'))
                    <span class="text-danger">{{ $errors->first('check') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.check_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="check_date">{{ trans('cruds.car.fields.check_date') }}</label>
                <input class="form-control date {{ $errors->has('check_date') ? 'is-invalid' : '' }}" type="text" name="check_date" id="check_date" value="{{ old('check_date', $car->check_date) }}">
                @if($errors->has('check_date'))
                    <span class="text-danger">{{ $errors->first('check_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.check_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.car.fields.taheel') }}</label>
                <select class="form-control {{ $errors->has('taheel') ? 'is-invalid' : '' }}" name="taheel" id="taheel">
                    <option value disabled {{ old('taheel', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Car::TAHEEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('taheel', $car->taheel) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('taheel'))
                    <span class="text-danger">{{ $errors->first('taheel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.taheel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.car.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('driver_id') ? old('driver_id') : $car->driver->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.driver_helper') }}</span>
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
    Dropzone.options.estmaraDropzone = {
    url: '{{ route('admin.cars.storeMedia') }}',
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
      $('form').find('input[name="estmara"]').remove()
      $('form').append('<input type="hidden" name="estmara" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="estmara"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($car) && $car->estmara)
      var file = {!! json_encode($car->estmara) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="estmara" value="' + file.file_name + '">')
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