@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.transeformer.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Transeformer">
                              <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        action 
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.t_no') }}
                                    </th>
                                      <th>
                                           {{ trans('cruds.transeformer.fields.cb') }}
                                     
                                    </th>
                                    <th>
                                        equipment_type
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.city_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.x_minb') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.transformer_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.kva_rating') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.primary_voltage') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.sec_voltage') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manuf_sno') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manufacturer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manafac_year') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.over_load') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.load_y') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.load_b') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.load_r') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.box_load_y') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.box_load_b') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.box_load_r') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.defrence_y') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.defrence_b') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.defrence_r') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.no_of_cb') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.no_of_minbilar') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.no_of_boxes') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.feeder_transeformers') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.transe_note') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.picture_befor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.rmu_type') }}
                                    </th>
                                      <th>
                                        {{ trans('cruds.transeformer.fields.smart') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.y_minb') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manuf') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.mv_cable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.left_ss') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.right_ss') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.serial_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.gas_indicator') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.photo_after') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_r') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_l') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_o') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_t') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_refreence') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_r_picture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_l_picture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_o_picture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_t_picture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.side_scan_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.data_intery_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.panal_capasity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.ct') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.panal_year') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.panel_serial_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.panel_manufacture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.data_entry_status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td> <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                     <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::EQUIPMENT_TYPE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($cities as $key => $item)
                                                <option value="{{ $item->city_name }}">{{ $item->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::TRANSFORMER_TYPE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::KVA_RATING_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($lines as $key => $item)
                                                <option value="{{ $item->line_no }}">{{ $item->line_no }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($allnotes as $key => $item)
                                                <option value="{{ $item->t_notes }}">{{ $item->t_notes }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::RMU_TYPE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                     <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::SMART_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::MV_CABLE_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::GAS_INDICATOR_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Transeformer::DATA_ENTRY_STATUS_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transeformers as $key => $transeformer)
                                    <tr data-entry-id="{{ $transeformer->id }}">
                                        <td>

                                        </td>
                                        <td>
                                        @can('transeformer_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.transeformers.show', $transeformer->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('cb_create')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.cbs.add', $transeformer->id) }}">
                                                add cb
                                                </a>
                                            @endcan

                                            @can('transeformer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.transeformers.edit', $transeformer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('transeformer_delete')
                                                <form action="{{ route('admin.transeformers.destroy', $transeformer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan


                                        </td>
                                        <td>
                                            {{ $transeformer->t_no ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($transeformer->cbs as $key => $item)
                                                <span class="label label-info label-many">{{ $item->trans_cb_fider_number }}</span>
                                            @endforeach
                                        </td>
                                         <td>
                                            {{ App\Models\Transeformer::EQUIPMENT_TYPE_SELECT[$transeformer->equipment_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->city_name->city_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->x_minb ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Transeformer::TRANSFORMER_TYPE_SELECT[$transeformer->transformer_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Transeformer::KVA_RATING_SELECT[$transeformer->kva_rating] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->primary_voltage ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->sec_voltage ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->manuf_sno ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->manufacturer ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->manafac_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->over_load ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->load_y ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->load_b ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->load_r ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->box_load_y ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->box_load_b ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->box_load_r ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->defrence_y ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->defrence_b ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->defrence_r ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->no_of_cb ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->no_of_minbilar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->no_of_boxes ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->feeder_transeformers->line_no ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($transeformer->transe_notes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->t_notes }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($transeformer->picture_befor as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ App\Models\Transeformer::RMU_TYPE_SELECT[$transeformer->rmu_type] ?? '' }}
                                        </td>
                                          <td>
                                            {{ App\Models\Transeformer::SMART_SELECT[$transeformer->smart] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->y_minb ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->manuf ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Transeformer::MV_CABLE_SELECT[$transeformer->mv_cable] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->left_ss ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->right_ss ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->serial_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Transeformer::GAS_INDICATOR_SELECT[$transeformer->gas_indicator] ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($transeformer->photo_after as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $transeformer->noise_r ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->noise_l ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->noise_o ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->noise_t ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->noise_refreence ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($transeformer->noise_r_picture as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($transeformer->noise_l_picture as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($transeformer->noise_o_picture as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($transeformer->noise_t_picture as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $transeformer->side_scan_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->data_intery_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->panal_capasity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->ct ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->panal_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->panel_serial_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transeformer->panel_manufacture ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Transeformer::DATA_ENTRY_STATUS_SELECT[$transeformer->data_entry_status] ?? '' }}
                                        </td>
                                        <td>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transeformer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transeformers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Transeformer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection