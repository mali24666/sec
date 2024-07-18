@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.line.title') }}
    </div>

    <div class="card-body ">
        <div class="form-group">
            <div class="form-group hidden_button" >
                <a class="btn btn-default" href="{{ route('admin.lines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
                <button id='btnExport' > excel</button>
                <button id='create_pdf' > pdf</button>
                <Button id="sudo" onclick= 
                    "print_current_page()" /> 
                    Print! 
                </button> 
            </div>
            <table class="table table-bordered table-striped pdf">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.id') }}
                        </th>
                        <td>
                            {{ $line->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.station') }}
                        </th>
                        <td>
                            {{ $line->station->station_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.line_no') }}
                        </th>
                        <td>
                            {{ $line->line_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.trans') }}
                        </th>
                        <td>
                            @foreach($line->trans as $key => $trans)
                                <span class="label label-info">{{ $trans->t_no }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.ct') }}
                        </th>
                        <td>
                            @foreach($line->cts as $key => $ct)
                                <span class="label label-info">{{ $ct->ct_no }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.boxx_number') }}
                        </th>
                        <td>
                            @foreach($line->boxx_numbers as $key => $boxx_number)
                                <span class="label label-info">{{ $boxx_number->box_number }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.avr_no') }}
                        </th>
                        <td>
                            @foreach($line->avr_nos as $key => $avr_no)
                                <span class="label label-info">{{ $avr_no->avr_no }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.auto_selector') }}
                        </th>
                        <td>
                            @foreach($line->auto_selectors as $key => $auto_selector)
                                <span class="label label-info">{{ $auto_selector->auto_recloser_no }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.section_lazey') }}
                        </th>
                        <td>
                            @foreach($line->section_lazeys as $key => $section_lazey)
                                <span class="label label-info">{{ $section_lazey->section_lazey }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.line.fields.rmu_no') }}
                        </th>
                        <td>
                            @foreach($line->rmu_nos as $key => $rmu_no)
                                <span class="label label-info">{{ $rmu_no->rmu_no }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group hidden_button">
                <a  class="btn btn-default" href="{{ route('admin.lines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card hidden_button" >
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#point1_cts" role="tab" data-toggle="tab">
                {{ trans('cruds.ct.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#point2_cts" role="tab" data-toggle="tab">
                {{ trans('cruds.ct.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#feeder_transeformers" role="tab" data-toggle="tab">
                {{ trans('cruds.transeformer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#feeder_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#rmu_feeder_rmus" role="tab" data-toggle="tab">
                {{ trans('cruds.rmu.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#feeders_stations" role="tab" data-toggle="tab">
                {{ trans('cruds.station.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="point1_cts">
            @includeIf('admin.lines.relationships.point1Cts', ['cts' => $line->point1Cts])
        </div>
        <div class="tab-pane" role="tabpanel" id="point2_cts">
            @includeIf('admin.lines.relationships.point2Cts', ['cts' => $line->point2Cts])
        </div>
        <div class="tab-pane" role="tabpanel" id="feeder_transeformers">
            @includeIf('admin.lines.relationships.feederTranseformers', ['transeformers' => $line->feederTranseformers])
        </div>
        <div class="tab-pane" role="tabpanel" id="feeder_projects">
            @includeIf('admin.lines.relationships.feederProjects', ['projects' => $line->feederProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="rmu_feeder_rmus">
            @includeIf('admin.lines.relationships.rmuFeederRmus', ['rmus' => $line->rmuFeederRmus])
        </div>
        <div class="tab-pane" role="tabpanel" id="feeders_stations">
            @includeIf('admin.lines.relationships.feedersStations', ['stations' => $line->feedersStations])
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
                name: `UserManagement.xlsx`,
                sheet: {
                    name: 'Usermanagement'
                }
            });
        });
        
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
<script>
$(document).ready(function () {  

    var form = $('.pdf'),  
    cache_width = form.width(),  
    a4 = [595.28, 841.89]; // for a4 size paper width and height  

    $('#create_pdf').on('click', function () {  
        $('body').scrollTop(0);  
        createPDF();  
    });  

    function createPDF() {  
        getCanvas().then(function (canvas) {  
            var  
             img = canvas.toDataURL("image/png"),  
             doc = new jsPDF({  
                 unit: 'px',  
                 format: 'a4'  
             });  
            doc.addImage(img, 'JPEG', 20, 20);  
            doc.save('techsolutionstuff.pdf');  
            form.width(cache_width);  
        });  
    }  
      
    function getCanvas() {  
        form.width((a4[1] * 1.33333) - 80).css('max-width', 'none');  
        return html2canvas(form, {  
            imageTimeout: 2000,  
            removeContainer: true  
        });  
    }
});

</script>
<<script>
$('#sudo').click(function(){
    
    $('.hidden_button').hide()
    window.print();
    $('.hidden_button').show()

    return false;
});
</script>
@endsection