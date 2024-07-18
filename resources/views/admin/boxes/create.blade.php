@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.box.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.boxes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('transformer') ? 'has-error' : '' }}">
                            <label for="transformer_id">{{ trans('cruds.box.fields.transformer') }}</label>
                            <select class="form-control select2" name="transformer_id" id="transformer_id">
                                @foreach($transformers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('transformer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transformer'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.transformer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transformer_cb') ? 'has-error' : '' }}">
                            <label for="transformer_cb_id">{{ trans('cruds.box.fields.transformer_cb') }}</label>
                            <select class="form-control select2" name="transformer_cb_id" id="transformer_cb_id">
                                @foreach($transformer_cbs as $id => $entry)
                                    <option value="{{ $id }}" {{ old('transformer_cb_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transformer_cb'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer_cb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.transformer_cb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('minibller_no') ? 'has-error' : '' }}">
                            <label for="minibller_no_id">{{ trans('cruds.box.fields.minibller_no') }}</label>
                            <select class="form-control select2" name="minibller_no_id" id="minibller_no_id">
                                @foreach($minibller_nos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('minibller_no_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('minibller_no'))
                                <span class="help-block" role="alert">{{ $errors->first('minibller_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.minibller_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fouse') ? 'has-error' : '' }}">
                            <label for="fouse_id">{{ trans('cruds.box.fields.fouse') }}</label>
                            <select class="form-control select2" name="fouse_id" id="fouse_id">
                                @foreach($fouses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('fouse_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fouse'))
                                <span class="help-block" role="alert">{{ $errors->first('fouse') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.fouse_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.box.fields.box_type') }}</label>
                            <select class="form-control" name="box_type" id="box_type" required>
                                <option value disabled {{ old('box_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Box::BOX_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('box_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('box_type'))
                                <span class="help-block" role="alert">{{ $errors->first('box_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_number') ? 'has-error' : '' }}">
                            <label class="required" for="box_number">{{ trans('cruds.box.fields.box_number') }}</label>
                            <input class="form-control" type="text" name="box_number" id="box_number" value="{{ old('box_number', '') }}" required>
                            @if($errors->has('box_number'))
                                <span class="help-block" role="alert">{{ $errors->first('box_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_number_2') ? 'has-error' : '' }}">
                            <label for="box_number_2">{{ trans('cruds.box.fields.box_number_2') }}</label>
                            <input class="form-control" type="text" name="box_number_2" id="box_number_2" value="{{ old('box_number_2', '') }}">
                            @if($errors->has('box_number_2'))
                                <span class="help-block" role="alert">{{ $errors->first('box_number_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_number_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_number_3') ? 'has-error' : '' }}">
                            <label for="box_number_3">{{ trans('cruds.box.fields.box_number_3') }}</label>
                            <input class="form-control" type="text" name="box_number_3" id="box_number_3" value="{{ old('box_number_3', '') }}">
                            @if($errors->has('box_number_3'))
                                <span class="help-block" role="alert">{{ $errors->first('box_number_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_number_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_number_4') ? 'has-error' : '' }}">
                            <label for="box_number_4">{{ trans('cruds.box.fields.box_number_4') }}</label>
                            <input class="form-control" type="text" name="box_number_4" id="box_number_4" value="{{ old('box_number_4', '') }}">
                            @if($errors->has('box_number_4'))
                                <span class="help-block" role="alert">{{ $errors->first('box_number_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_number_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_location') ? 'has-error' : '' }}">
                            <label for="box_location">{{ trans('cruds.box.fields.box_location') }}</label>
                            <input class="form-control" type="text" name="box_location" id="box_location" value="{{ old('box_location', '') }}">
                            @if($errors->has('box_location'))
                                <span class="help-block" role="alert">{{ $errors->first('box_location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_notes') ? 'has-error' : '' }}">
                            <label for="box_notes">{{ trans('cruds.box.fields.box_note') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="box_notes[]" id="box_notes" multiple>
                                @foreach($box_notes as $id => $box_note)
                                    <option value="{{ $id }}" {{ in_array($id, old('box_notes', [])) ? 'selected' : '' }}>{{ $box_note }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('box_notes'))
                                <span class="help-block" role="alert">{{ $errors->first('box_notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_note_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cable') ? 'has-error' : '' }}">
                            <label for="cable_id">{{ trans('cruds.box.fields.cable') }}</label>
                            <select class="form-control select2" name="cable_id" id="cable_id">
                                @foreach($cables as $id => $entry)
                                    <option value="{{ $id }}" {{ old('cable_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cable'))
                                <span class="help-block" role="alert">{{ $errors->first('cable') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.cable_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load') ? 'has-error' : '' }}">
                            <label for="load">{{ trans('cruds.box.fields.load') }}</label>
                            <input class="form-control" type="number" name="load" id="load" value="{{ old('load', '0') }}" step="0.01">
                            @if($errors->has('load'))
                                <span class="help-block" role="alert">{{ $errors->first('load') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.load_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_b') ? 'has-error' : '' }}">
                            <label for="load_b">{{ trans('cruds.box.fields.load_b') }}</label>
                            <input class="form-control" type="text" name="load_b" id="load_b" value="{{ old('load_b', '') }}">
                            @if($errors->has('load_b'))
                                <span class="help-block" role="alert">{{ $errors->first('load_b') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.load_b_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_r') ? 'has-error' : '' }}">
                            <label for="load_r">{{ trans('cruds.box.fields.load_r') }}</label>
                            <input class="form-control" type="text" name="load_r" id="load_r" value="{{ old('load_r', '') }}">
                            @if($errors->has('load_r'))
                                <span class="help-block" role="alert">{{ $errors->first('load_r') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.load_r_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_photo') ? 'has-error' : '' }}">
                            <label for="box_photo">{{ trans('cruds.box.fields.box_photo') }}</label>
                            <div class="needsclick dropzone" id="box_photo-dropzone">
                            </div>
                            @if($errors->has('box_photo'))
                                <span class="help-block" role="alert">{{ $errors->first('box_photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.box_photo_helper') }}</span>
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
    var uploadedBoxPhotoMap = {}
Dropzone.options.boxPhotoDropzone = {
    url: '{{ route('admin.boxes.storeMedia') }}',
    maxFilesize: 3, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="box_photo[]" value="' + response.name + '">')
      uploadedBoxPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBoxPhotoMap[file.name]
      }
      $('form').find('input[name="box_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($box) && $box->box_photo)
      var files = {!! json_encode($box->box_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="box_photo[]" value="' + file.file_name + '">')
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