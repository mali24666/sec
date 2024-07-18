@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.transeformer.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.transeformers.update", [$transeformer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('t_no') ? 'has-error' : '' }}">
                            <label class="required" for="t_no">{{ trans('cruds.transeformer.fields.t_no') }}</label>
                            <input class="form-control" type="text" name="t_no" id="t_no" value="{{ old('t_no', $transeformer->t_no) }}" required>
                            @if($errors->has('t_no'))
                                <span class="help-block" role="alert">{{ $errors->first('t_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.t_no_helper') }}</span>
                        </div>
                          <div class="form-group {{ $errors->has('x_minb') ? 'has-error' : '' }}">
                            <label for="x_minb">{{ trans('cruds.transeformer.fields.x_minb') }}</label>
                            <input class="form-control" type="text" name="x_minb" id="x_minb" value="{{ old('x_minb', $transeformer->x_minb) }}">
                            @if($errors->has('x_minb'))
                                <span class="help-block" role="alert">{{ $errors->first('x_minb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.x_minb_helper') }}</span>
                        </div>
                        <div hidden  class="form-group {{ $errors->has('cbs') ? 'has-error' : '' }}">
                            <label for="cbs">{{ trans('cruds.transeformer.fields.cb') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="cbs[]" id="cbs" multiple>
                                @foreach($cbs as $id => $cb)
                                    <option value="{{ $id }}" {{ (in_array($id, old('cbs', [])) || $transeformer->cbs->contains($id)) ? 'selected' : '' }}>{{ $cb }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cbs'))
                                <span class="help-block" role="alert">{{ $errors->first('cbs') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.cb_helper') }}</span>
                        </div>
                         <div class="form-group {{ $errors->has('city_name') ? 'has-error' : '' }}">
                            <label  for="city_name_id">{{ trans('cruds.transeformer.fields.city_name') }}</label>
                            <select class="form-control select2" name="city_name_id" id="city_name_id" required>
                                @foreach($city_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('city_name_id') ? old('city_name_id') : $transeformer->city_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city_name'))
                                <span class="help-block" role="alert">{{ $errors->first('city_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.city_name_helper') }}</span>
                        </div>
                     <div class="form-group {{ $errors->has('equipment_type') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.equipment_type') }}</label>
                            <select class="form-control" name="equipment_type" id="equipment_type">
                                <option value disabled {{ old('equipment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::EQUIPMENT_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('equipment_type', $transeformer->equipment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('equipment_type'))
                                <span class="help-block" role="alert">{{ $errors->first('equipment_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.equipment_type_helper') }}</span>
                        </div>
                        <div class='transformer_input hidden '>

                       
                      
                        <div class="form-group {{ $errors->has('transformer_type') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.transformer_type') }}</label>
                            <select class="form-control" name="transformer_type" id="transformer_type">
                                <option value disabled {{ old('transformer_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::TRANSFORMER_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('transformer_type', $transeformer->transformer_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transformer_type'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.transformer_type_helper') }}</span>
                        </div>
                                                <div class="form-group {{ $errors->has('kva_rating') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.kva_rating') }}</label>
                            <select class="form-control" name="kva_rating" id="kva_rating">
                                <option value disabled {{ old('kva_rating', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::KVA_RATING_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('kva_rating', $transeformer->kva_rating) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kva_rating'))
                                <span class="help-block" role="alert">{{ $errors->first('kva_rating') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.kva_rating_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('primary_voltage') ? 'has-error' : '' }}">
                            <label for="primary_voltage">{{ trans('cruds.transeformer.fields.primary_voltage') }}</label>
                            <input class="form-control" type="text" name="primary_voltage" id="primary_voltage" value="{{ old('primary_voltage', $transeformer->primary_voltage) }}">
                            @if($errors->has('primary_voltage'))
                                <span class="help-block" role="alert">{{ $errors->first('primary_voltage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.primary_voltage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sec_voltage') ? 'has-error' : '' }}">
                            <label for="sec_voltage">{{ trans('cruds.transeformer.fields.sec_voltage') }}</label>
                            <input class="form-control" type="text" name="sec_voltage" id="sec_voltage" value="{{ old('sec_voltage', $transeformer->sec_voltage) }}">
                            @if($errors->has('sec_voltage'))
                                <span class="help-block" role="alert">{{ $errors->first('sec_voltage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.sec_voltage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manuf_sno') ? 'has-error' : '' }}">
                            <label for="manuf_sno">{{ trans('cruds.transeformer.fields.manuf_sno') }}</label>
                            <input class="form-control" type="text" name="manuf_sno" id="manuf_sno" value="{{ old('manuf_sno', $transeformer->manuf_sno) }}">
                            @if($errors->has('manuf_sno'))
                                <span class="help-block" role="alert">{{ $errors->first('manuf_sno') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manuf_sno_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manufacturer') ? 'has-error' : '' }}">
                            <label for="manufacturer">{{ trans('cruds.transeformer.fields.manufacturer') }}</label>
                            <input class="form-control" type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer', $transeformer->manufacturer) }}">
                            @if($errors->has('manufacturer'))
                                <span class="help-block" role="alert">{{ $errors->first('manufacturer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manufacturer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manafac_year') ? 'has-error' : '' }}">
                            <label for="manafac_year">{{ trans('cruds.transeformer.fields.manafac_year') }}</label>
                            <input class="form-control" type="text" name="manafac_year" id="manafac_year" value="{{ old('manafac_year', $transeformer->manafac_year) }}">
                            @if($errors->has('manafac_year'))
                                <span class="help-block" role="alert">{{ $errors->first('manafac_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manafac_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('over_load') ? 'has-error' : '' }}">
                            <label for="over_load">{{ trans('cruds.transeformer.fields.over_load') }}</label>
                            <input class="form-control" type="text" name="over_load" id="over_load" value="{{ old('over_load', $transeformer->over_load) }}">
                            @if($errors->has('over_load'))
                                <span class="help-block" role="alert">{{ $errors->first('over_load') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.over_load_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_y') ? 'has-error' : '' }}">
                            <label for="load_y">{{ trans('cruds.transeformer.fields.load_y') }}</label>
                            <input class="form-control" type="number" name="load_y" id="load_y" value="{{ old('load_y', $transeformer->load_y) }}" step="0.01">
                            @if($errors->has('load_y'))
                                <span class="help-block" role="alert">{{ $errors->first('load_y') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.load_y_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_b') ? 'has-error' : '' }}">
                            <label for="load_b">{{ trans('cruds.transeformer.fields.load_b') }}</label>
                            <input class="form-control" type="text" name="load_b" id="load_b" value="{{ old('load_b', $transeformer->load_b) }}">
                            @if($errors->has('load_b'))
                                <span class="help-block" role="alert">{{ $errors->first('load_b') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.load_b_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('load_r') ? 'has-error' : '' }}">
                            <label for="load_r">{{ trans('cruds.transeformer.fields.load_r') }}</label>
                            <input class="form-control" type="text" name="load_r" id="load_r" value="{{ old('load_r', $transeformer->load_r) }}">
                            @if($errors->has('load_r'))
                                <span class="help-block" role="alert">{{ $errors->first('load_r') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.load_r_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_of_cb') ? 'has-error' : '' }}">
                            <label for="no_of_cb">{{ trans('cruds.transeformer.fields.no_of_cb') }}</label>
                            <input class="form-control" type="text" name="no_of_cb" id="no_of_cb" value="{{ old('no_of_cb', $transeformer->no_of_cb) }}">
                            @if($errors->has('no_of_cb'))
                                <span class="help-block" role="alert">{{ $errors->first('no_of_cb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.no_of_cb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_of_minbilar') ? 'has-error' : '' }}">
                            <label for="no_of_minbilar">{{ trans('cruds.transeformer.fields.no_of_minbilar') }}</label>
                            <input class="form-control" type="text" name="no_of_minbilar" id="no_of_minbilar" value="{{ old('no_of_minbilar', $transeformer->no_of_minbilar) }}">
                            @if($errors->has('no_of_minbilar'))
                                <span class="help-block" role="alert">{{ $errors->first('no_of_minbilar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.no_of_minbilar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_of_boxes') ? 'has-error' : '' }}">
                            <label for="no_of_boxes">{{ trans('cruds.transeformer.fields.no_of_boxes') }}</label>
                            <input class="form-control" type="text" name="no_of_boxes" id="no_of_boxes" value="{{ old('no_of_boxes', $transeformer->no_of_boxes) }}">
                            @if($errors->has('no_of_boxes'))
                                <span class="help-block" role="alert">{{ $errors->first('no_of_boxes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.no_of_boxes_helper') }}</span>
                        </div>
                        <div hidden class="form-group {{ $errors->has('feeder_transeformers') ? 'has-error' : '' }}">
                            <label for="feeder_transeformers_id">{{ trans('cruds.transeformer.fields.feeder_transeformers') }}</label>
                            <select class="form-control select2" name="feeder_transeformers_id" id="feeder_transeformers_id">
                                @foreach($feeder_transeformers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('feeder_transeformers_id') ? old('feeder_transeformers_id') : $transeformer->feeder_transeformers->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('feeder_transeformers'))
                                <span class="help-block" role="alert">{{ $errors->first('feeder_transeformers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.feeder_transeformers_helper') }}</span>
                        </div>
                        <div class=" indoor_type form-group {{ $errors->has('panal_capasity') ? 'has-error' : '' }}">
                            <label for="panal_capasity">{{ trans('cruds.transeformer.fields.panal_capasity') }}</label>
                            <input class="form-control" type="text" name="panal_capasity" id="panal_capasity" value="{{ old('panal_capasity', $transeformer->panal_capasity) }}">
                            @if($errors->has('panal_capasity'))
                                <span class="help-block" role="alert">{{ $errors->first('panal_capasity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.panal_capasity_helper') }}</span>
                        </div>
                        <div   class="indoor_type form-group {{ $errors->has('ct') ? 'has-error' : '' }}">
                            <label for="ct">{{ trans('cruds.transeformer.fields.ct') }}</label>
                            <input class="form-control" type="text" name="ct" id="ct" value="{{ old('ct', $transeformer->ct) }}">
                            @if($errors->has('ct'))
                                <span class="help-block" role="alert">{{ $errors->first('ct') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.ct_helper') }}</span>
                        </div>
                        <div class="indoor_type  form-group {{ $errors->has('panal_year') ? 'has-error' : '' }}">
                            <label for="panal_year">{{ trans('cruds.transeformer.fields.panal_year') }}</label>
                            <input class="form-control" type="text" name="panal_year" id="panal_year" value="{{ old('panal_year', $transeformer->panal_year) }}">
                            @if($errors->has('panal_year'))
                                <span class="help-block" role="alert">{{ $errors->first('panal_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.panal_year_helper') }}</span>
                        </div>
                        <div class="indoor_type form-group {{ $errors->has('panel_serial_no') ? 'has-error' : '' }}">
                            <label for="panel_serial_no">{{ trans('cruds.transeformer.fields.panel_serial_no') }}</label>
                            <input class="form-control" type="text" name="panel_serial_no" id="panel_serial_no" value="{{ old('panel_serial_no', $transeformer->panel_serial_no) }}">
                            @if($errors->has('panel_serial_no'))
                                <span class="help-block" role="alert">{{ $errors->first('panel_serial_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.panel_serial_no_helper') }}</span>
                        </div>
                        <div class="indoor_type  form-group {{ $errors->has('panel_manufacture') ? 'has-error' : '' }}">
                            <label for="panel_manufacture">{{ trans('cruds.transeformer.fields.panel_manufacture') }}</label>
                            <input class="form-control" type="text" name="panel_manufacture" id="panel_manufacture" value="{{ old('panel_manufacture', $transeformer->panel_manufacture) }}">
                            @if($errors->has('panel_manufacture'))
                                <span class="help-block" role="alert">{{ $errors->first('panel_manufacture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.panel_manufacture_helper') }}</span>
                        </div>
                         <div class="form-group {{ $errors->has('reference_temperature') ? 'has-error' : '' }}">
                            <label for="reference_temperature">{{ trans('cruds.transeformer.fields.reference_temperature') }}</label>
                            <input class="form-control" type="text" name="reference_temperature" id="reference_temperature" value="{{ old('reference_temperature', $transeformer->reference_temperature) }}">
                            @if($errors->has('reference_temperature'))
                                <span class="help-block" role="alert">{{ $errors->first('reference_temperature') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.reference_temperature_helper') }}</span>
                        </div>
                        <div hidden class="form-group {{ $errors->has('transformer_temperature_picture') ? 'has-error' : '' }}">
                            <label for="transformer_temperature_picture">{{ trans('cruds.transeformer.fields.transformer_temperature_picture') }}</label>
                            <div class="needsclick dropzone" id="transformer_temperature_picture-dropzone">
                            </div>
                            @if($errors->has('transformer_temperature_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('transformer_temperature_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.transformer_temperature_picture_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transe_notes') ? 'has-error' : '' }}">
                            <label for="transe_notes">{{ trans('cruds.transeformer.fields.transe_note') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="transe_notes[]" id="transe_notes" multiple>
                                @foreach($transe_notes as $id => $transe_note)
                                    <option value="{{ $id }}" {{ (in_array($id, old('transe_notes', [])) || $transeformer->transe_notes->contains($id)) ? 'selected' : '' }}>{{ $transe_note }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transe_notes'))
                                <span class="help-block" role="alert">{{ $errors->first('transe_notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.transe_note_helper') }}</span>
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
                          <div class="form-group {{ $errors->has('oil_indicator') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.oil_indicator') }}</label>
                            <select class="form-control" name="oil_indicator" id="oil_indicator">
                                <option value disabled {{ old('oil_indicator', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::OIL_INDICATOR_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('oil_indicator', $transeformer->oil_indicator) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('oil_indicator'))
                                <span class="help-block" role="alert">{{ $errors->first('oil_indicator') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.oil_indicator_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                            <label for="notes">{{ trans('cruds.transeformer.fields.notes') }}</label>
                            <textarea class="form-control ckeditor" name="notes" id="notes">{!! old('notes', $transeformer->notes) !!}</textarea>
                            @if($errors->has('notes'))
                                <span class="help-block" role="alert">{{ $errors->first('notes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.notes_helper') }}</span>
                        </div>
                        </div>

                        <div class='sgr-input hidden '>

                       
                        <div class="form-group {{ $errors->has('rmu_type') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.rmu_type') }}</label>
                            <select class="form-control" name="rmu_type" id="rmu_type">
                                <option value disabled {{ old('rmu_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::RMU_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('rmu_type', $transeformer->rmu_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('rmu_type'))
                                <span class="help-block" role="alert">{{ $errors->first('rmu_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.rmu_type_helper') }}</span>
                        </div>
                         <div class="form-group {{ $errors->has('smart') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.smart') }}</label>
                            <select class="form-control" name="smart" id="smart">
                                <option value disabled {{ old('smart', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::SMART_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('smart', $transeformer->smart) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('smart'))
                                <span class="help-block" role="alert">{{ $errors->first('smart') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.smart_helper') }}</span>
                        </div>
                        <div hidden class="form-group {{ $errors->has('y_minb') ? 'has-error' : '' }}">
                            <label for="y_minb">{{ trans('cruds.transeformer.fields.y_minb') }}</label>
                            <input class="form-control" type="text" name="y_minb" id="y_minb" value="{{ old('y_minb', $transeformer->y_minb) }}">
                            @if($errors->has('y_minb'))
                                <span class="help-block" role="alert">{{ $errors->first('y_minb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.y_minb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manuf') ? 'has-error' : '' }}">
                            <label for="manuf">{{ trans('cruds.transeformer.fields.manuf') }}</label>
                            <input class="form-control" type="text" name="manuf" id="manuf" value="{{ old('manuf', $transeformer->manuf) }}">
                            @if($errors->has('manuf'))
                                <span class="help-block" role="alert">{{ $errors->first('manuf') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.manuf_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mv_cable') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.mv_cable') }}</label>
                            <select class="form-control" name="mv_cable" id="mv_cable">
                                <option value disabled {{ old('mv_cable', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::MV_CABLE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mv_cable', $transeformer->mv_cable) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mv_cable'))
                                <span class="help-block" role="alert">{{ $errors->first('mv_cable') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.mv_cable_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('left_ss') ? 'has-error' : '' }}">
                            <label for="left_ss">{{ trans('cruds.transeformer.fields.left_ss') }}</label>
                            <input class="form-control" type="text" name="left_ss" id="left_ss" value="{{ old('left_ss', $transeformer->left_ss) }}">
                            @if($errors->has('left_ss'))
                                <span class="help-block" role="alert">{{ $errors->first('left_ss') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.left_ss_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('right_ss') ? 'has-error' : '' }}">
                            <label for="right_ss">{{ trans('cruds.transeformer.fields.right_ss') }}</label>
                            <input class="form-control" type="text" name="right_ss" id="right_ss" value="{{ old('right_ss', $transeformer->right_ss) }}">
                            @if($errors->has('right_ss'))
                                <span class="help-block" role="alert">{{ $errors->first('right_ss') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.right_ss_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('serial_no') ? 'has-error' : '' }}">
                            <label for="serial_no">{{ trans('cruds.transeformer.fields.serial_no') }}</label>
                            <input class="form-control" type="text" name="serial_no" id="serial_no" value="{{ old('serial_no', $transeformer->serial_no) }}">
                            @if($errors->has('serial_no'))
                                <span class="help-block" role="alert">{{ $errors->first('serial_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.serial_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gas_indicator') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.gas_indicator') }}</label>
                            <select class="form-control" name="gas_indicator" id="gas_indicator">
                                <option value disabled {{ old('gas_indicator', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::GAS_INDICATOR_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gas_indicator', $transeformer->gas_indicator) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gas_indicator'))
                                <span class="help-block" role="alert">{{ $errors->first('gas_indicator') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.gas_indicator_helper') }}</span>
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
                        <div class="form-group {{ $errors->has('noise_r') ? 'has-error' : '' }}">
                            <label for="noise_r">{{ trans('cruds.transeformer.fields.noise_r') }}</label>
                            <input class="form-control" type="text" name="noise_r" id="noise_r" value="{{ old('noise_r', $transeformer->noise_r) }}">
                            @if($errors->has('noise_r'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_r') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_r_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_l') ? 'has-error' : '' }}">
                            <label for="noise_l">{{ trans('cruds.transeformer.fields.noise_l') }}</label>
                            <input class="form-control" type="text" name="noise_l" id="noise_l" value="{{ old('noise_l', $transeformer->noise_l) }}">
                            @if($errors->has('noise_l'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_l') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_l_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_o') ? 'has-error' : '' }}">
                            <label for="noise_o">{{ trans('cruds.transeformer.fields.noise_o') }}</label>
                            <input class="form-control" type="text" name="noise_o" id="noise_o" value="{{ old('noise_o', $transeformer->noise_o) }}">
                            @if($errors->has('noise_o'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_o') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_o_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_t') ? 'has-error' : '' }}">
                            <label for="noise_t">{{ trans('cruds.transeformer.fields.noise_t') }}</label>
                            <input class="form-control" type="text" name="noise_t" id="noise_t" value="{{ old('noise_t', $transeformer->noise_t) }}">
                            @if($errors->has('noise_t'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_t') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_t_helper') }}</span>
                        </div>
                        <div hidden class="form-group {{ $errors->has('noise_refreence') ? 'has-error' : '' }}">
                            <label for="noise_refreence">{{ trans('cruds.transeformer.fields.noise_refreence') }}</label>
                            <input class="form-control" type="text" name="noise_refreence" id="noise_refreence" value="{{ old('noise_refreence', $transeformer->noise_refreence) }}">
                            @if($errors->has('noise_refreence'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_refreence') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_refreence_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_r_picture') ? 'has-error' : '' }}">
                            <label for="noise_r_picture">{{ trans('cruds.transeformer.fields.noise_r_picture') }}</label>
                            <div class="needsclick dropzone" id="noise_r_picture-dropzone">
                            </div>
                            @if($errors->has('noise_r_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_r_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_r_picture_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_l_picture') ? 'has-error' : '' }}">
                            <label for="noise_l_picture">{{ trans('cruds.transeformer.fields.noise_l_picture') }}</label>
                            <div class="needsclick dropzone" id="noise_l_picture-dropzone">
                            </div>
                            @if($errors->has('noise_l_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_l_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_l_picture_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_o_picture') ? 'has-error' : '' }}">
                            <label for="noise_o_picture">{{ trans('cruds.transeformer.fields.noise_o_picture') }}</label>
                            <div class="needsclick dropzone" id="noise_o_picture-dropzone">
                            </div>
                            @if($errors->has('noise_o_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_o_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_o_picture_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('noise_t_picture') ? 'has-error' : '' }}">
                            <label for="noise_t_picture">{{ trans('cruds.transeformer.fields.noise_t_picture') }}</label>
                            <div class="needsclick dropzone" id="noise_t_picture-dropzone">
                            </div>
                            @if($errors->has('noise_t_picture'))
                                <span class="help-block" role="alert">{{ $errors->first('noise_t_picture') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.noise_t_picture_helper') }}</span>
                        </div>
                        </div>
                        <div class="form-group {{ $errors->has('side_scan_by') ? 'has-error' : '' }}">
                            <label for="side_scan_by_id">{{ trans('cruds.transeformer.fields.side_scan_by') }}</label>
                            <select class="form-control select2" name="side_scan_by_id" id="side_scan_by_id">
                                @foreach($side_scan_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('side_scan_by_id') ? old('side_scan_by_id') : $transeformer->side_scan_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('side_scan_by'))
                                <span class="help-block" role="alert">{{ $errors->first('side_scan_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.side_scan_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('data_intery_by') ? 'has-error' : '' }}">
                            <label for="data_intery_by_id">{{ trans('cruds.transeformer.fields.data_intery_by') }}</label>
                            <select class="form-control select2" name="data_intery_by_id" id="data_intery_by_id">
                                @foreach($data_intery_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('data_intery_by_id') ? old('data_intery_by_id') : $transeformer->data_intery_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('data_intery_by'))
                                <span class="help-block" role="alert">{{ $errors->first('data_intery_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.data_intery_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('data_entry_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.transeformer.fields.data_entry_status') }}</label>
                            <select class="form-control" name="data_entry_status" id="data_entry_status">
                                <option value disabled {{ old('data_entry_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Transeformer::DATA_ENTRY_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('data_entry_status', $transeformer->data_entry_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('data_entry_status'))
                                <span class="help-block" role="alert">{{ $errors->first('data_entry_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.transeformer.fields.data_entry_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rmu_notes') ? 'has-error' : '' }}">
                            <label for="rmu_notes">RMU note</label>
                            <textarea class="form-control" name="rmu_note" id="rmu_note">{{ old('rmu_note', $transeformer->rmu_note) }}</textarea>
                            @if($errors->has('rmu_notes'))
                                <span class="help-block" role="alert">{{ $errors->first('rmu_notes') }}</span>
                            @endif
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
                xhr.open('POST', '{{ route('admin.transeformers.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $transeformer->id ?? 0 }}');
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
    var uploadedNoiseRPictureMap = {}
Dropzone.options.noiseRPictureDropzone = {
    url: '{{ route('admin.transeformers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="noise_r_picture[]" value="' + response.name + '">')
      uploadedNoiseRPictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedNoiseRPictureMap[file.name]
      }
      $('form').find('input[name="noise_r_picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($transeformer) && $transeformer->noise_r_picture)
      var files = {!! json_encode($transeformer->noise_r_picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="noise_r_picture[]" value="' + file.file_name + '">')
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
    var uploadedNoiseLPictureMap = {}
Dropzone.options.noiseLPictureDropzone = {
    url: '{{ route('admin.transeformers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="noise_l_picture[]" value="' + response.name + '">')
      uploadedNoiseLPictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedNoiseLPictureMap[file.name]
      }
      $('form').find('input[name="noise_l_picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($transeformer) && $transeformer->noise_l_picture)
      var files = {!! json_encode($transeformer->noise_l_picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="noise_l_picture[]" value="' + file.file_name + '">')
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
    var uploadedNoiseOPictureMap = {}
Dropzone.options.noiseOPictureDropzone = {
    url: '{{ route('admin.transeformers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="noise_o_picture[]" value="' + response.name + '">')
      uploadedNoiseOPictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedNoiseOPictureMap[file.name]
      }
      $('form').find('input[name="noise_o_picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($transeformer) && $transeformer->noise_o_picture)
      var files = {!! json_encode($transeformer->noise_o_picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="noise_o_picture[]" value="' + file.file_name + '">')
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
    var uploadedNoiseTPictureMap = {}
Dropzone.options.noiseTPictureDropzone = {
    url: '{{ route('admin.transeformers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="noise_t_picture[]" value="' + response.name + '">')
      uploadedNoiseTPictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedNoiseTPictureMap[file.name]
      }
      $('form').find('input[name="noise_t_picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($transeformer) && $transeformer->noise_t_picture)
      var files = {!! json_encode($transeformer->noise_t_picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="noise_t_picture[]" value="' + file.file_name + '">')
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
<<script>
$(document).ready(function () { 

    // Listen for changes in the dropdown 
      $('#transformer_type').change(function () { 

        // Get the selected option value 
        var selectedOption = $(this).val(); 
        // Hide all content divs 
        console.log(selectedOption);
            if (selectedOption !== 4 || selectedOption !== 3 ) {
            $('.indoor_type').addClass('hidden'); 

            }
            if  (selectedOption == 4 || selectedOption == 3  ) {
            $('.indoor_type').removeClass('hidden'); 


            }
 
      }); 
    }); 

</script>
<<script>
$(document).ready(function () { 

    // Listen for changes in the dropdown 
      $('#equipment_type').change(function () { 

        // Get the selected option value 
        var selectedOption = $(this).val(); 
        // Hide all content divs 
        console.log(selectedOption);
            if (selectedOption !== 2 || selectedOption !== 3 ) {// sgr
            $('.transformer_input').addClass('hidden'); 

            }
            if  (selectedOption == 2  ) {// transformer
            $('.transformer_input').removeClass('hidden'); 
            $('.sgr-input').addClass('hidden'); 

            }
            if  ( selectedOption == 3  ) {
                $('.transformer_input').removeClass('hidden'); 
                $('.sgr-input').removeClass('hidden'); 
            }

      }); 
    }); 

</script>
<<script>
    $(document).ready(function () { 
    
     var type =    $('#equipment_type').val();
     if  ( type == 1  ) {
                $('.sgr-input').removeClass('hidden'); 
            }
     if  ( type == 2  ) {
                $('.transformer_input').removeClass('hidden'); 
            }
     if  ( type == 3  ) {
                $('.transformer_input').removeClass('hidden'); 
                $('.sgr-input').removeClass('hidden'); 
            }

     console.log(type);
    }); 
    
    </script>
    
@endsection