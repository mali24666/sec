<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLineRequest;
use App\Http\Requests\StoreLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Models\Autorecloser;
use App\Models\Avr;
use App\Models\Box;
use App\Models\Ct;
use App\Models\Line;
use App\Models\Rmu;
use App\Models\SectionLazy;
use App\Models\Station;
use App\Models\Transeformer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\LineExport;
use Maatwebsite\Excel\Facades\Excel;
class LineController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('line_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lines = Line::with(['station', 'trans'])->get();

        $stations = Station::get();

        $transeformers = Transeformer::get();

        return view('admin.lines.index', compact('lines', 'stations', 'transeformers'));
    }
            public function fetchfeeder( $id)
    {
        abort_if(Gate::denies('line_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $lines = Line::where('id' ,$id)->with(['station', 'trans'])->get();

            $stations = Station::get();

            $transeformers = Transeformer::get();
    
            return view('admin.lines.index', compact('lines', 'stations', 'transeformers'));
        }
        public function add($id)
        {
            abort_if(Gate::denies('line_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
            $stations = Station::find($id);
            $trans = Transeformer::pluck('t_no', 'id');

            return view('admin.lines.add', compact('stations', 'trans'));
        }
        public function create()
        {
            abort_if(Gate::denies('line_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
            $stations = Station::pluck('station_no', 'id')->prepend(trans('global.pleaseSelect'), '');
    
            $trans = Transeformer::pluck('t_no', 'id');
    
            return view('admin.lines.create', compact('stations', 'trans'));
        }
    public function store(StoreLineRequest $request)
    {
        $line = Line::create($request->all());
        $line->trans()->sync($request->input('trans', []));
        $id = $line -> id; 
        return redirect()->route('admin.lines.fetchfeeder', compact('id'));
    }

    public function edit(Line $line)
    {
        abort_if(Gate::denies('line_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Station::pluck('station_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trans = Transeformer::pluck('t_no', 'id');

        $line->load('station', 'trans');

        return view('admin.lines.edit', compact('line', 'stations', 'trans'));
    }

    public function update(UpdateLineRequest $request, Line $line)
    {
        $line->update($request->all());
        $line->trans()->sync($request->input('trans', []));

        return redirect()->route('admin.lines.index');
    }

    public function show(Line $line)
    {
        abort_if(Gate::denies('line_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $line->load('station', 'trans', 'feederProjects');

        return view('admin.lines.show', compact('line'));
    }

    public function destroy(Line $line)
    {
        abort_if(Gate::denies('line_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $line->delete();

        return back();
    }

    public function massDestroy(MassDestroyLineRequest $request)
    {
        $lines = Line::find(request('ids'));

        foreach ($lines as $line) {
            $line->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}