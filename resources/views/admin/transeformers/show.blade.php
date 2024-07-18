@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="col-sm-6">  
    <button id='btnExport'>excel</button>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class='text-center'>transformer</div>

                    <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.transeformers.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                            <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.t_no') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->t_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.cb') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->cbs as $key => $cb)
                                            <span class="label label-info">{{ $cb->trans_cb_fider_number }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.city_name') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->city_name->city_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.x_minb') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->x_minb }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.transformer_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transeformer::TRANSFORMER_TYPE_SELECT[$transeformer->transformer_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.kva_rating') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transeformer::KVA_RATING_SELECT[$transeformer->kva_rating] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.primary_voltage') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->primary_voltage }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.sec_voltage') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->sec_voltage }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manuf_sno') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->manuf_sno }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manufacturer') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->manufacturer }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manafac_year') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->manafac_year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.over_load') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->over_load }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.load_y') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->load_y }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.load_b') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->load_b }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.load_r') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->load_r }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.box_load_y') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->box_load_y }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.box_load_b') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->box_load_b }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.box_load_r') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->box_load_r }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.defrence_y') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->defrence_y }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.defrence_b') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->defrence_b }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.defrence_r') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->defrence_r }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.no_of_cb') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->no_of_cb }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.no_of_minbilar') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->no_of_minbilar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.no_of_boxes') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->no_of_boxes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.feeder_transeformers') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->feeder_transeformers->line_no ?? '' }}
                                    </td>
                                </tr>
                                 <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.oil_indicator') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transeformer::OIL_INDICATOR_SELECT[$transeformer->oil_indicator] ?? '' }}
                                    </td>
                                </tr>
                                 <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.reference_temperature') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->reference_temperature }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.transe_note') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->transe_notes as $key => $transe_note)
                                            <span class="label label-info">{{ $transe_note->t_notes }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.picture_befor') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->picture_befor as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.notes') }}
                                    </th>
                                    <td>
                                        {!! $transeformer->notes !!}
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <button id='btnExport2'>excel</button>

    <div class="col-sm-6"> 
        <div class="panel panel-default">
            <div class="panel-body">
                <div class='text-center'>RMU</div>
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="form-group">
                            <a class="btn btn-xs btn-info" href="{{ route('admin.transeformers.edit', $transeformer->id) }}">
                            edit
                                </a>
                            </div>
                            <table id='rmu' class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.rmu_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transeformer::RMU_TYPE_SELECT[$transeformer->rmu_type] ?? '' }}
                                    </td>
                                </tr>
                                <!--<tr>-->
                                <!--    <th>-->
                                <!--        {{ trans('cruds.transeformer.fields.y_minb') }}-->
                                <!--    </th>-->
                                <!--    <td>-->
                                <!--        {{ $transeformer->y_minb }}-->
                                <!--    </td>-->
                                <!--</tr>-->
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.manuf') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->manuf }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.mv_cable') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transeformer::MV_CABLE_SELECT[$transeformer->mv_cable] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.left_ss') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->left_ss }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.right_ss') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->right_ss }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.serial_no') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->serial_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.gas_indicator') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transeformer::GAS_INDICATOR_SELECT[$transeformer->gas_indicator] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.photo_after') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->photo_after as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_r') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->noise_r }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_l') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->noise_l }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_o') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->noise_o }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       noise t-off
                                    </th>
                                    <td>
                                        {{ $transeformer->noise_t }}
                                    </td>
                                </tr>
                              
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_r_picture') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->noise_r_picture as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_l_picture') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->noise_l_picture as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_o_picture') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->noise_o_picture as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.noise_t_picture') }}
                                    </th>
                                    <td>
                                        @foreach($transeformer->noise_t_picture as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                 <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.rmu_note') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->rmu_note }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.side_scan_by') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->side_scan_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.data_intery_by') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->data_intery_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.data_entry_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Transeformer::DATA_ENTRY_STATUS_SELECT[$transeformer->data_entry_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transeformer.fields.updated_at') }}
                                    </th>
                                    <td>
                                        {{ $transeformer->updated_at }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
            
        </div>
 <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#transformer_minibllers" aria-controls="transformer_minibllers" role="tab" data-toggle="tab">
                            {{ trans('cruds.minibller.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#transformer_fouses" aria-controls="transformer_fouses" role="tab" data-toggle="tab">
                            {{ trans('cruds.fouse.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#transformer_boxes" aria-controls="transformer_boxes" role="tab" data-toggle="tab">
                            {{ trans('cruds.box.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#transformer_cbs" aria-controls="transformer_cbs" role="tab" data-toggle="tab">
                            {{ trans('cruds.cb.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="transformer_minibllers">
                        @includeIf('admin.transeformers.relationships.transformerMinibllers', ['minibllers' => $transeformer->transformerMinibllers])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="transformer_fouses">
                        @includeIf('admin.transeformers.relationships.transformerFouses', ['fouses' => $transeformer->transformerFouses])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="transformer_boxes">
                        @includeIf('admin.transeformers.relationships.transformerBoxes', ['boxes' => $transeformer->transformerBoxes])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="transformer_cbs">
                        @includeIf('admin.transeformers.relationships.transformerCbs', ['cbs' => $transeformer->transformerCbs])
                    </div>
                </div>
            </div>
    </div>

</div>
@endsection
@section('scripts')
@parent
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
    $(document).ready(function () {
        $("#btnExport").click(function () {
            let table = document.getElementsByTagName("table");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: `transformer.xlsx`,
                sheet: {
                    name: 'transformer'
                }
            });
        });
        $("#btnExport2").click(function () {
            let table = document.getElementsById("#rmu");
            debugger;
            TableToExcel.convert(table[0], {
                name: `rmu.xlsx`,
                sheet: {
                    name: 'rmu'
                }
            });
        });

    });
        
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
<<script>
$('#sudo').click(function(){
    
    $('.hidden_button').hide()
    window.print();
    $('.hidden_button').show()

    return false;
});
</script>
@endsection