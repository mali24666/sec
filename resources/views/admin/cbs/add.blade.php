@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.cb.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" id='form' action="{{ route("admin.cbs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <div class="form-group">
                            <label for="transe_id">	transeformer number</label>
                            <input type="text" disabled  value="{{$transes->t_no }}" ">
                            <input type="text" hidden name="transformer_id" value="{{$transes->id }}" ">

                            @if($errors->has('transe'))
                                <span class="text-danger">{{ $errors->first('transe') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.transe_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('trans_cb_fider_number') ? 'has-error' : '' }}">
                            <label class="required" for="trans_cb_fider_number">{{ trans('cruds.cb.fields.trans_cb_fider_number') }}</label>
                            <input class="form-control" type="text" name="trans_cb_fider_number" id="trans_cb_fider_number"
                             value="{{$transes->t_no }}-" required>
                            @if($errors->has('trans_cb_fider_number'))
                                <span class="help-block" role="alert">{{ $errors->first('trans_cb_fider_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.trans_cb_fider_number_helper') }}</span>
                        </div>
                        <div  hidden class="form-group {{ $errors->has('minbilars') ? 'has-error' : '' }}">
                            <label for="minbilars">{{ trans('cruds.cb.fields.minbilar') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="minbilars[]" id="minbilars" multiple>
                                @foreach($minbilars as $id => $minbilar)
                                    <option value="{{ $id }}" {{ in_array($id, old('minbilars', [])) ? 'selected' : '' }}>{{ $minbilar }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('minbilars'))
                                <span class="help-block" role="alert">{{ $errors->first('minbilars') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.minbilar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('temperature') ? 'has-error' : '' }}">
                            <label for="temperature">{{ trans('cruds.cb.fields.temperature') }}</label>
                            <input class="form-control" type="text" name="temperature" id="temperature" value="{{ old('temperature', '') }}">
                            @if($errors->has('temperature'))
                                <span class="help-block" role="alert">{{ $errors->first('temperature') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.temperature_helper') }}</span>
                        </div>
                        <div hidden class="form-group {{ $errors->has('temperature_refrence') ? 'has-error' : '' }}">
                            <label for="temperature_refrence">{{ trans('cruds.cb.fields.temperature_refrence') }}</label>
                            <input class="form-control" type="text" name="temperature_refrence" id="temperature_refrence" value="{{ old('temperature_refrence', '') }}">
                            @if($errors->has('temperature_refrence'))
                                <span class="help-block" role="alert">{{ $errors->first('temperature_refrence') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.temperature_refrence_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('temperature_picture') ? 'has-error' : '' }}">
                            <label for="temperature_picture">{{ trans('cruds.cb.fields.temperature_picture') }}</label>
                            <div class="needsclick dropzone" id="temperature_picture-dropzone">
                            </div>
                            @if($errors->has('temperature_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('temperature_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.temperature_picture_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('refrence_pic') ? 'has-error' : '' }}">
                            <label for="refrence_pic">{{ trans('cruds.cb.fields.refrence_pic') }}</label>
                            <div class="needsclick dropzone" id="refrence_pic-dropzone">
                            </div>
                            @if($errors->has('refrence_pic'))
                                <span class="help-block" role="alert">{{ $errors->first('refrence_pic') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.refrence_pic_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">{{ trans('cruds.cb.fields.note') }}</label>
                            <textarea class="form-control ckeditor" name="note" id="note">{!! old('note') !!}</textarea>
                            @if($errors->has('note'))
                                <span class="help-block" role="alert">{{ $errors->first('note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.note_helper') }}</span>
                        </div>
                          <div class="form-group {{ $errors->has('load_y') ? 'has-error' : '' }}">
                            <label for="load_y">{{ trans('cruds.cb.fields.load_y') }}</label>
                            <input class="form-control" type="text" name="load_y" id="load_y" value="{{ old('load_y', '') }}">
                            @if($errors->has('load_y'))
                                <span class="help-block" role="alert">{{ $errors->first('load_y') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.load_y_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_b') ? 'has-error' : '' }}">
                            <label for="load_b">{{ trans('cruds.cb.fields.load_b') }}</label>
                            <input class="form-control" type="text" name="load_b" id="load_b" value="{{ old('load_b', '') }}">
                            @if($errors->has('load_b'))
                                <span class="help-block" role="alert">{{ $errors->first('load_b') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.load_b_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_r') ? 'has-error' : '' }}">
                            <label for="load_r">{{ trans('cruds.cb.fields.load_r') }}</label>
                            <input class="form-control" type="text" name="load_r" id="load_r" value="{{ old('load_r', '') }}">
                            @if($errors->has('load_r'))
                                <span class="help-block" role="alert">{{ $errors->first('load_r') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cb.fields.load_r_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                            <button id ='anothor-cb'class="btn btn-primary" type="submit">
                               save and add another CB
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
    var uploadedTemperaturePictureMap = {}
Dropzone.options.temperaturePictureDropzone = {
    url: '{{ route('admin.cbs.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 9000,
      height: 9000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="temperature_picture[]" value="' + response.name + '">')
      uploadedTemperaturePictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedTemperaturePictureMap[file.name]
      }
      $('form').find('input[name="temperature_picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($cb) && $cb->temperature_picture)
      var files = {!! json_encode($cb->temperature_picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="temperature_picture[]" value="' + file.file_name + '">')
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
    var uploadedRefrencePicMap = {}
Dropzone.options.refrencePicDropzone = {
    url: '{{ route('admin.cbs.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="refrence_pic[]" value="' + response.name + '">')
      uploadedRefrencePicMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedRefrencePicMap[file.name]
      }
      $('form').find('input[name="refrence_pic[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($cb) && $cb->refrence_pic)
      var files = {!! json_encode($cb->refrence_pic) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="refrence_pic[]" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('admin.cbs.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $cb->id ?? 0 }}');
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
<script>
  $(document).ready(function () {
    $("#anothor-cb").click(function(){
  $("#form").attr("action","{{ route("admin.cbs.save") }}");
  console.log('attr');
});
  });
</script>
@endsection