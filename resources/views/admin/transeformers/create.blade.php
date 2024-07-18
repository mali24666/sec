@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.transeformer.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.transeformers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('t_no') ? 'has-error' : '' }}">
                            <label class="required" for="t_no">{{ trans('cruds.transeformer.fields.t_no') }}</label>
                            <input class="form-control" type="text" name="t_no" id="t_no" value="{{ old('t_no', '') }}" required>
                            @if($errors->has('t_no'))
                                <span class="help-block" role="alert">{{ $errors->first('t_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.t_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                            <label for="latitude">{{ trans('cruds.transeformer.fields.latitude') }}</label>
                            <input class="form-control" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                            @if($errors->has('latitude'))
                                <span class="help-block" role="alert">{{ $errors->first('latitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.latitude_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('x_minb') ? 'has-error' : '' }}">
                            <label for="x_minb">{{ trans('cruds.transeformer.fields.x_minb') }}</label>
                            <input class="form-control" type="text" name="x_minb" id="x_minb" value="{{ old('x_minb', '') }}">
                            @if($errors->has('x_minb'))
                                <span class="help-block" role="alert">{{ $errors->first('x_minb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.x_minb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kva_rating') ? 'has-error' : '' }}">
                            <label for="kva_rating">{{ trans('cruds.transeformer.fields.kva_rating') }}</label>
                            <input class="form-control" type="text" name="kva_rating" id="kva_rating" value="{{ old('kva_rating', '') }}">
                            @if($errors->has('kva_rating'))
                                <span class="help-block" role="alert">{{ $errors->first('kva_rating') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.kva_rating_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('primary_voltage') ? 'has-error' : '' }}">
                            <label for="primary_voltage">{{ trans('cruds.transeformer.fields.primary_voltage') }}</label>
                            <input class="form-control" type="text" name="primary_voltage" id="primary_voltage" value="{{ old('primary_voltage', '') }}">
                            @if($errors->has('primary_voltage'))
                                <span class="help-block" role="alert">{{ $errors->first('primary_voltage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.primary_voltage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sec_voltage') ? 'has-error' : '' }}">
                            <label for="sec_voltage">{{ trans('cruds.transeformer.fields.sec_voltage') }}</label>
                            <input class="form-control" type="text" name="sec_voltage" id="sec_voltage" value="{{ old('sec_voltage', '') }}">
                            @if($errors->has('sec_voltage'))
                                <span class="help-block" role="alert">{{ $errors->first('sec_voltage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.sec_voltage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manuf_sno') ? 'has-error' : '' }}">
                            <label for="manuf_sno">{{ trans('cruds.transeformer.fields.manuf_sno') }}</label>
                            <input class="form-control" type="text" name="manuf_sno" id="manuf_sno" value="{{ old('manuf_sno', '') }}">
                            @if($errors->has('manuf_sno'))
                                <span class="help-block" role="alert">{{ $errors->first('manuf_sno') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manuf_sno_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manufacturer') ? 'has-error' : '' }}">
                            <label for="manufacturer">{{ trans('cruds.transeformer.fields.manufacturer') }}</label>
                            <input class="form-control" type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer', '') }}">
                            @if($errors->has('manufacturer'))
                                <span class="help-block" role="alert">{{ $errors->first('manufacturer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manufacturer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manafac_year') ? 'has-error' : '' }}">
                            <label for="manafac_year">{{ trans('cruds.transeformer.fields.manafac_year') }}</label>
                            <input class="form-control" type="text" name="manafac_year" id="manafac_year" value="{{ old('manafac_year', '') }}">
                            @if($errors->has('manafac_year'))
                                <span class="help-block" role="alert">{{ $errors->first('manafac_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manafac_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('over_load') ? 'has-error' : '' }}">
                            <label for="over_load">{{ trans('cruds.transeformer.fields.over_load') }}</label>
                            <input class="form-control" type="text" name="over_load" id="over_load" value="{{ old('over_load', '') }}">
                            @if($errors->has('over_load'))
                                <span class="help-block" role="alert">{{ $errors->first('over_load') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.over_load_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('picture_befor') ? 'has-error' : '' }}">
                            <label for="picture_befor">{{ trans('cruds.transeformer.fields.picture_befor') }}</label>
                            <div class="needsclick dropzone" id="picture_befor-dropzone">
                            </div>
                            @if($errors->has('picture_befor'))
                                <span class="help-block" role="alert">{{ $errors->first('picture_befor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.picture_befor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('y_minb') ? 'has-error' : '' }}">
                            <label for="y_minb">{{ trans('cruds.transeformer.fields.y_minb') }}</label>
                            <input class="form-control" type="text" name="y_minb" id="y_minb" value="{{ old('y_minb', '') }}">
                            @if($errors->has('y_minb'))
                                <span class="help-block" role="alert">{{ $errors->first('y_minb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.y_minb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manuf') ? 'has-error' : '' }}">
                            <label for="manuf">{{ trans('cruds.transeformer.fields.manuf') }}</label>
                            <input class="form-control" type="text" name="manuf" id="manuf" value="{{ old('manuf', '') }}">
                            @if($errors->has('manuf'))
                                <span class="help-block" role="alert">{{ $errors->first('manuf') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manuf_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('left_ss') ? 'has-error' : '' }}">
                            <label for="left_ss">{{ trans('cruds.transeformer.fields.left_ss') }}</label>
                            <input class="form-control" type="text" name="left_ss" id="left_ss" value="{{ old('left_ss', '') }}">
                            @if($errors->has('left_ss'))
                                <span class="help-block" role="alert">{{ $errors->first('left_ss') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.left_ss_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('right_ss') ? 'has-error' : '' }}">
                            <label for="right_ss">{{ trans('cruds.transeformer.fields.right_ss') }}</label>
                            <input class="form-control" type="text" name="right_ss" id="right_ss" value="{{ old('right_ss', '') }}">
                            @if($errors->has('right_ss'))
                                <span class="help-block" role="alert">{{ $errors->first('right_ss') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.right_ss_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('serial_no') ? 'has-error' : '' }}">
                            <label for="serial_no">{{ trans('cruds.transeformer.fields.serial_no') }}</label>
                            <input class="form-control" type="text" name="serial_no" id="serial_no" value="{{ old('serial_no', '') }}">
                            @if($errors->has('serial_no'))
                                <span class="help-block" role="alert">{{ $errors->first('serial_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.serial_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label for="type">{{ trans('cruds.transeformer.fields.type') }}</label>
                            <input class="form-control" type="text" name="type" id="type" value="{{ old('type', '') }}">
                            @if($errors->has('type'))
                                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo_after') ? 'has-error' : '' }}">
                            <label for="photo_after">{{ trans('cruds.transeformer.fields.photo_after') }}</label>
                            <div class="needsclick dropzone" id="photo_after-dropzone">
                            </div>
                            @if($errors->has('photo_after'))
                                <span class="help-block" role="alert">{{ $errors->first('photo_after') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.photo_after_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('feeder_transeformers') ? 'has-error' : '' }}">
                            <label for="feeder_transeformers_id">{{ trans('cruds.transeformer.fields.feeder_transeformers') }}</label>
                            <select class="form-control select2" name="feeder_transeformers_id" id="feeder_transeformers_id">
                                @foreach($feeder_transeformers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('feeder_transeformers_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('feeder_transeformers'))
                                <span class="help-block" role="alert">{{ $errors->first('feeder_transeformers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.feeder_transeformers_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mv_cable') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.mv_cable') }}</label>
                            <select class="form-control" name="mv_cable" id="mv_cable">
                                <option value disabled {{ old('mv_cable', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::MV_CABLE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mv_cable', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mv_cable'))
                                <span class="help-block" role="alert">{{ $errors->first('mv_cable') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.mv_cable_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_y') ? 'has-error' : '' }}">
                            <label for="load_y">{{ trans('cruds.transeformer.fields.load_y') }}</label>
                            <input class="form-control" type="number" name="load_y" id="load_y" value="{{ old('load_y', '') }}" step="0.01">
                            @if($errors->has('load_y'))
                                <span class="help-block" role="alert">{{ $errors->first('load_y') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.load_y_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_b') ? 'has-error' : '' }}">
                            <label for="load_b">{{ trans('cruds.transeformer.fields.load_b') }}</label>
                            <input class="form-control" type="text" name="load_b" id="load_b" value="{{ old('load_b', '') }}">
                            @if($errors->has('load_b'))
                                <span class="help-block" role="alert">{{ $errors->first('load_b') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.load_b_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_r') ? 'has-error' : '' }}">
                            <label for="load_r">{{ trans('cruds.transeformer.fields.load_r') }}</label>
                            <input class="form-control" type="text" name="load_r" id="load_r" value="{{ old('load_r', '') }}">
                            @if($errors->has('load_r'))
                                <span class="help-block" role="alert">{{ $errors->first('load_r') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.load_r_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_load_y') ? 'has-error' : '' }}">
                            <label for="box_load_y">{{ trans('cruds.transeformer.fields.box_load_y') }}</label>
                            <input class="form-control" type="text" name="box_load_y" id="box_load_y" value="{{ old('box_load_y', '') }}">
                            @if($errors->has('box_load_y'))
                                <span class="help-block" role="alert">{{ $errors->first('box_load_y') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.box_load_y_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_load_b') ? 'has-error' : '' }}">
                            <label for="box_load_b">{{ trans('cruds.transeformer.fields.box_load_b') }}</label>
                            <input class="form-control" type="text" name="box_load_b" id="box_load_b" value="{{ old('box_load_b', '') }}">
                            @if($errors->has('box_load_b'))
                                <span class="help-block" role="alert">{{ $errors->first('box_load_b') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.box_load_b_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('box_load_r') ? 'has-error' : '' }}">
                            <label for="box_load_r">{{ trans('cruds.transeformer.fields.box_load_r') }}</label>
                            <input class="form-control" type="text" name="box_load_r" id="box_load_r" value="{{ old('box_load_r', '') }}">
                            @if($errors->has('box_load_r'))
                                <span class="help-block" role="alert">{{ $errors->first('box_load_r') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.box_load_r_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transformer_temperature') ? 'has-error' : '' }}">
                            <label for="transformer_temperature">{{ trans('cruds.transeformer.fields.transformer_temperature') }}</label>
                            <input class="form-control" type="text" name="transformer_temperature" id="transformer_temperature" value="{{ old('transformer_temperature', '') }}">
                            @if($errors->has('transformer_temperature'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer_temperature') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.transformer_temperature_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reference_temperature') ? 'has-error' : '' }}">
                            <label for="reference_temperature">{{ trans('cruds.transeformer.fields.reference_temperature') }}</label>
                            <input class="form-control" type="text" name="reference_temperature" id="reference_temperature" value="{{ old('reference_temperature', '') }}">
                            @if($errors->has('reference_temperature'))
                                <span class="help-block" role="alert">{{ $errors->first('reference_temperature') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.reference_temperature_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transformer_temperature_picture') ? 'has-error' : '' }}">
                            <label for="transformer_temperature_picture">{{ trans('cruds.transeformer.fields.transformer_temperature_picture') }}</label>
                            <div class="needsclick dropzone" id="transformer_temperature_picture-dropzone">
                            </div>
                            @if($errors->has('transformer_temperature_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer_temperature_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.transformer_temperature_picture_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_r') ? 'has-error' : '' }}">
                            <label for="noise_r">{{ trans('cruds.transeformer.fields.noise_r') }}</label>
                            <input class="form-control" type="text" name="noise_r" id="noise_r" value="{{ old('noise_r', '') }}">
                            @if($errors->has('noise_r'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_r') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_r_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_l') ? 'has-error' : '' }}">
                            <label for="noise_l">{{ trans('cruds.transeformer.fields.noise_l') }}</label>
                            <input class="form-control" type="text" name="noise_l" id="noise_l" value="{{ old('noise_l', '') }}">
                            @if($errors->has('noise_l'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_l') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_l_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_o') ? 'has-error' : '' }}">
                            <label for="noise_o">{{ trans('cruds.transeformer.fields.noise_o') }}</label>
                            <input class="form-control" type="text" name="noise_o" id="noise_o" value="{{ old('noise_o', '') }}">
                            @if($errors->has('noise_o'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_o') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_o_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_t') ? 'has-error' : '' }}">
                            <label for="noise_t">{{ trans('cruds.transeformer.fields.noise_t') }}</label>
                            <input class="form-control" type="text" name="noise_t" id="noise_t" value="{{ old('noise_t', '') }}">
                            @if($errors->has('noise_t'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_t') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_t_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_refreence') ? 'has-error' : '' }}">
                            <label for="noise_refreence">{{ trans('cruds.transeformer.fields.noise_refreence') }}</label>
                            <input class="form-control" type="text" name="noise_refreence" id="noise_refreence" value="{{ old('noise_refreence', '') }}">
                            @if($errors->has('noise_refreence'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_refreence') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_refreence_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transe_notes') ? 'has-error' : '' }}">
                            <label for="transe_notes">{{ trans('cruds.transeformer.fields.transe_note') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="transe_notes[]" id="transe_notes" multiple>
                                @foreach($transe_notes as $id => $transe_note)
                                    <option value="{{ $id }}" {{ in_array($id, old('transe_notes', [])) ? 'selected' : '' }}>{{ $transe_note }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transe_notes'))
                                <span class="help-block" role="alert">{{ $errors->first('transe_notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.transe_note_helper') }}</span>
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
    var uploadedPictureBeforMap = {}
Dropzone.options.pictureBeforDropzone = {
    url: '{{ route('admin.transeformers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="picture_befor[]" value="' + response.name + '">')
      uploadedPictureBeforMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPictureBeforMap[file.name]
      }
      $('form').find('input[name="picture_befor[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($transeformer) && $transeformer->picture_befor)
      var files = {!! json_encode($transeformer->picture_befor) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="picture_befor[]" value="' + file.file_name + '">')
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
    var uploadedPhotoAfterMap = {}
Dropzone.options.photoAfterDropzone = {
    url: '{{ route('admin.transeformers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="photo_after[]" value="' + response.name + '">')
      uploadedPhotoAfterMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoAfterMap[file.name]
      }
      $('form').find('input[name="photo_after[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($transeformer) && $transeformer->photo_after)
      var files = {!! json_encode($transeformer->photo_after) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo_after[]" value="' + file.file_name + '">')
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
    var uploadedTransformerTemperaturePictureMap = {}
Dropzone.options.transformerTemperaturePictureDropzone = {
    url: '{{ route('admin.transeformers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="transformer_temperature_picture[]" value="' + response.name + '">')
      uploadedTransformerTemperaturePictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedTransformerTemperaturePictureMap[file.name]
      }
      $('form').find('input[name="transformer_temperature_picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($transeformer) && $transeformer->transformer_temperature_picture)
      var files = {!! json_encode($transeformer->transformer_temperature_picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="transformer_temperature_picture[]" value="' + file.file_name + '">')
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