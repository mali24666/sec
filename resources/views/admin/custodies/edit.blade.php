@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.custody.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.custodies.update", [$custody->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="employee_name_id">{{ trans('cruds.custody.fields.employee_name') }}</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id" required>
                    @foreach($employee_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('employee_name_id') ? old('employee_name_id') : $custody->employee_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name'))
                    <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.employee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tools_id">{{ trans('cruds.custody.fields.tools') }}</label>
                <select class="form-control select2 {{ $errors->has('tools') ? 'is-invalid' : '' }}" name="tools_id" id="tools_id" required>
                    @foreach($tools as $id => $entry)
                        <option value="{{ $id }}" {{ (old('tools_id') ? old('tools_id') : $custody->tools->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tools'))
                    <span class="text-danger">{{ $errors->first('tools') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.tools_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number">{{ trans('cruds.custody.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', $custody->number) }}" step="0.01" required>
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="given_by_id">{{ trans('cruds.custody.fields.given_by') }}</label>
                <select class="form-control select2 {{ $errors->has('given_by') ? 'is-invalid' : '' }}" name="given_by_id" id="given_by_id">
                    @foreach($given_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('given_by_id') ? old('given_by_id') : $custody->given_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('given_by'))
                    <span class="text-danger">{{ $errors->first('given_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.given_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.custody.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $custody->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="back_date">{{ trans('cruds.custody.fields.back_date') }}</label>
                <input class="form-control date {{ $errors->has('back_date') ? 'is-invalid' : '' }}" type="text" name="back_date" id="back_date" value="{{ old('back_date', $custody->back_date) }}">
                @if($errors->has('back_date'))
                    <span class="text-danger">{{ $errors->first('back_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.back_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.custody.fields.stunts') }}</label>
                <select class="form-control {{ $errors->has('stunts') ? 'is-invalid' : '' }}" name="stunts" id="stunts">
                    <option value disabled {{ old('stunts', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Custody::STUNTS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stunts', $custody->stunts) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stunts'))
                    <span class="text-danger">{{ $errors->first('stunts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.stunts_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receve_by_id">{{ trans('cruds.custody.fields.receve_by') }}</label>
                <select class="form-control select2 {{ $errors->has('receve_by') ? 'is-invalid' : '' }}" name="receve_by_id" id="receve_by_id">
                    @foreach($receve_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('receve_by_id') ? old('receve_by_id') : $custody->receve_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('receve_by'))
                    <span class="text-danger">{{ $errors->first('receve_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.receve_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pic">{{ trans('cruds.custody.fields.pic') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pic') ? 'is-invalid' : '' }}" id="pic-dropzone">
                </div>
                @if($errors->has('pic'))
                    <span class="text-danger">{{ $errors->first('pic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.custody.fields.received') }}</label>
                <select class="form-control {{ $errors->has('received') ? 'is-invalid' : '' }}" name="received" id="received">
                    <option value disabled {{ old('received', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Custody::RECEIVED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('received', $custody->received) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('received'))
                    <span class="text-danger">{{ $errors->first('received') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custody.fields.received_helper') }}</span>
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
    url: '{{ route('admin.custodies.storeMedia') }}',
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
@if(isset($custody) && $custody->pic)
      var files = {!! json_encode($custody->pic) !!}
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
@endsection