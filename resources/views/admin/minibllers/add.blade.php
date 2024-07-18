@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.minibller.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.minibllers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="transformer_id">{{ trans('cruds.minibller.fields.transformer') }}</label>
                        
                            <input type="text" disabled  value="{{$transformers_no->t_no}}" ">
                            <input type="text" hidden  name="transformer_id" value="{{$transformers_no->id}}" ">

                            @if($errors->has('transformer'))
                                <span class="text-danger">{{ $errors->first('transformer') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                                <div class="form-group">
                                    <label for="cbs">	cb number</label>
                                    <input type="text" disabled  value="{{$cbs->trans_cb_fider_number}}" ">
                                    <input type="text" hidden name="cb_id" value="{{$cbs->id }}" ">
                    
                                    @if($errors->has('transe'))
                                        <span class="text-danger">{{ $errors->first('transe') }}</span>
                                    @endif
                                </div>          
                        </div>

                        <div class="form-group {{ $errors->has('minibller_number') ? 'has-error' : '' }}">
                            <label class="required" for="minibller_number">{{ trans('cruds.minibller.fields.minibller_number') }}</label>
                            <input class="form-control" type="text" name="minibller_number" id="minibller_number"
                            value="{{$cbs->trans_cb_fider_number}}-" required>
                            @if($errors->has('minibller_number'))
                                <span class="help-block" role="alert">{{ $errors->first('minibller_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.minibller_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                            <label for="longitude">{{ trans('cruds.minibller.fields.longitude') }}</label>
                            <input class="form-control" type="text" name="longitude" id="longitude" value="{{ old('longitude', '') }}">
                            @if($errors->has('longitude'))
                                <span class="help-block" role="alert">{{ $errors->first('longitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.longitude_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load') ? 'has-error' : '' }}">
                            <label for="load">{{ trans('cruds.minibller.fields.load') }}</label>
                            <input class="form-control" type="number" name="load" id="load" value="{{ old('load', '0') }}" step="0.01">
                            @if($errors->has('load'))
                                <span class="help-block" role="alert">{{ $errors->first('load') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.load_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_b') ? 'has-error' : '' }}">
                            <label for="load_b">{{ trans('cruds.minibller.fields.load_b') }}</label>
                            <input class="form-control" type="text" name="load_b" id="load_b" value="{{ old('load_b', '') }}">
                            @if($errors->has('load_b'))
                                <span class="help-block" role="alert">{{ $errors->first('load_b') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.load_b_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_y') ? 'has-error' : '' }}">
                            <label for="load_y">{{ trans('cruds.minibller.fields.load_y') }}</label>
                            <input class="form-control" type="text" name="load_y" id="load_y" value="{{ old('load_y', '') }}">
                            @if($errors->has('load_y'))
                                <span class="help-block" role="alert">{{ $errors->first('load_y') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.load_y_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
                            <label for="rating">{{ trans('cruds.minibller.fields.rating') }}</label>
                            <input class="form-control" type="text" name="rating" id="rating" value="{{ old('rating', '') }}">
                            @if($errors->has('rating'))
                                <span class="help-block" role="alert">{{ $errors->first('rating') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.rating_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manufacturer_serial_no') ? 'has-error' : '' }}">
                            <label for="manufacturer_serial_no">{{ trans('cruds.minibller.fields.manufacturer_serial_no') }}</label>
                            <input class="form-control" type="text" name="manufacturer_serial_no" id="manufacturer_serial_no" value="{{ old('manufacturer_serial_no', '') }}">
                            @if($errors->has('manufacturer_serial_no'))
                                <span class="help-block" role="alert">{{ $errors->first('manufacturer_serial_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.manufacturer_serial_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_circuits_ici_kva_rating_manuf_ly') ? 'has-error' : '' }}">
                            <label for="no_circuits_ici_kva_rating_manuf_ly">{{ trans('cruds.minibller.fields.no_circuits_ici_kva_rating_manuf_ly') }}</label>
                            <input class="form-control" type="text" name="no_circuits_ici_kva_rating_manuf_ly" id="no_circuits_ici_kva_rating_manuf_ly" value="{{ old('no_circuits_ici_kva_rating_manuf_ly', '') }}">
                            @if($errors->has('no_circuits_ici_kva_rating_manuf_ly'))
                                <span class="help-block" role="alert">{{ $errors->first('no_circuits_ici_kva_rating_manuf_ly') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.no_circuits_ici_kva_rating_manuf_ly_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_of_used_circuits') ? 'has-error' : '' }}">
                            <label for="no_of_used_circuits">{{ trans('cruds.minibller.fields.no_of_used_circuits') }}</label>
                            <input class="form-control" type="text" name="no_of_used_circuits" id="no_of_used_circuits" value="{{ old('no_of_used_circuits', '') }}">
                            @if($errors->has('no_of_used_circuits'))
                                <span class="help-block" role="alert">{{ $errors->first('no_of_used_circuits') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.no_of_used_circuits_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manufacturer') ? 'has-error' : '' }}">
                            <label for="manufacturer">{{ trans('cruds.minibller.fields.manufacturer') }}</label>
                            <input class="form-control" type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer', '') }}">
                            @if($errors->has('manufacturer'))
                                <span class="help-block" role="alert">{{ $errors->first('manufacturer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.manufacturer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cable_size') ? 'has-error' : '' }}">
                            <label for="cable_size_id">{{ trans('cruds.minibller.fields.cable_size') }}</label>
                            <select class="form-control select2" name="cable_size_id" id="cable_size_id">
                                @foreach($cable_sizes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('cable_size_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cable_size'))
                                <span class="help-block" role="alert">{{ $errors->first('cable_size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.cable_size_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('minibllar_notes') ? 'has-error' : '' }}">
                            <label for="minibllar_notes">{{ trans('cruds.minibller.fields.minibllar_notes') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="minibllar_notes[]" id="minibllar_notes" multiple>
                                @foreach($minibllar_notes as $id => $minibllar_note)
                                    <option value="{{ $id }}" {{ in_array($id, old('minibllar_notes', [])) ? 'selected' : '' }}>{{ $minibllar_note }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('minibllar_notes'))
                                <span class="help-block" role="alert">{{ $errors->first('minibllar_notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.minibllar_notes_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('minibller_photo') ? 'has-error' : '' }}">
                            <label for="minibller_photo">{{ trans('cruds.minibller.fields.minibller_photo') }}</label>
                            <div class="needsclick dropzone" id="minibller_photo-dropzone">
                            </div>
                            @if($errors->has('minibller_photo'))
                                <span class="help-block" role="alert">{{ $errors->first('minibller_photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.minibller.fields.minibller_photo_helper') }}</span>
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
    var uploadedMinibllerPhotoMap = {}
Dropzone.options.minibllerPhotoDropzone = {
    url: '{{ route('admin.minibllers.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 10000,
      height: 10000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="minibller_photo[]" value="' + response.name + '">')
      uploadedMinibllerPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedMinibllerPhotoMap[file.name]
      }
      $('form').find('input[name="minibller_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($minibller) && $minibller->minibller_photo)
      var files = {!! json_encode($minibller->minibller_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="minibller_photo[]" value="' + file.file_name + '">')
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.minibllers.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $minibller->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection