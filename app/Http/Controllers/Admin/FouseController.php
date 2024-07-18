<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFouseRequest;
use App\Http\Requests\StoreFouseRequest;
use App\Http\Requests\UpdateFouseRequest;
use App\Models\Cb;
use App\Models\Fouse;
use App\Models\Minibller;
use App\Models\Transeformer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FouseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fouse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fouses = Fouse::with(['transformer', 'transformer_cb', 'minibiler'])->get();

        return view('admin.fouses.index', compact('fouses'));
    }

    public function add($id)
    {
        abort_if(Gate::denies('fouse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer_nos = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibilers = Minibller::find($id);
        $transformer_id = $minibilers->transformer_id;
        // $transformer_cbs = $minibilers->cb_number_id;
        $cb_number_id = $minibilers->cb_id;
        // dd($transformer_id);
        $t_no = Transeformer::where('id' ,$transformer_id)->first();
        $minibller_number = Minibller::where('id' ,$id)->first();

        $cb_number_id = Cb::where('id' ,$cb_number_id)->first();

        // dd($cb_number_id);

        return view('admin.fouses.add', compact('cb_number_id','minibller_number','t_no','minibilers', 'transfer_nos', 'transformer_cbs'));
    }
    public function create()
    {
        abort_if(Gate::denies('fouse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer_nos = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibilers = Minibller::pluck('minibller_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fouses.create', compact('minibilers', 'transfer_nos', 'transformer_cbs'));
    }

    public function store(StoreFouseRequest $request)
    {       
        //  dd($request);

        $fouse = Fouse::create($request->all());

        return redirect()->route('admin.fouses.index');
    }
    public function edit(Fouse $fouse)
    {
        abort_if(Gate::denies('fouse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibilers = Minibller::pluck('minibller_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fouse->load('transformer', 'transformer_cb', 'minibiler');

        return view('admin.fouses.edit', compact('fouse', 'minibilers', 'transformer_cbs', 'transformers'));
    }

    public function update(UpdateFouseRequest $request, Fouse $fouse)
    {
        $fouse->update($request->all());

        return redirect()->route('admin.fouses.index');
    }

    public function show(Fouse $fouse)
    {
        abort_if(Gate::denies('fouse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fouse->load('transformer', 'transformer_cb', 'minibiler');

        return view('admin.fouses.show', compact('fouse'));
    }

    public function destroy(Fouse $fouse)
    {
        abort_if(Gate::denies('fouse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fouse->delete();

        return back();
    }

    public function massDestroy(MassDestroyFouseRequest $request)
    {
        $fouses = Fouse::find(request('ids'));

        foreach ($fouses as $fouse) {
            $fouse->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
