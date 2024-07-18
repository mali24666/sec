<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCableRequest;
use App\Http\Requests\StoreCableRequest;
use App\Http\Requests\UpdateCableRequest;
use App\Models\Cable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CableController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cable_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cables = Cable::all();

        return view('admin.cables.index', compact('cables'));
    }

    public function create()
    {
        abort_if(Gate::denies('cable_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cables.create');
    }

    public function store(StoreCableRequest $request)
    {
        $cable = Cable::create($request->all());

        return redirect()->route('admin.cables.index');
    }

    public function edit(Cable $cable)
    {
        abort_if(Gate::denies('cable_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cables.edit', compact('cable'));
    }

    public function update(UpdateCableRequest $request, Cable $cable)
    {
        $cable->update($request->all());

        return redirect()->route('admin.cables.index');
    }

    public function show(Cable $cable)
    {
        abort_if(Gate::denies('cable_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cables.show', compact('cable'));
    }

    public function destroy(Cable $cable)
    {
        abort_if(Gate::denies('cable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cable->delete();

        return back();
    }

    public function massDestroy(MassDestroyCableRequest $request)
    {
        $cables = Cable::find(request('ids'));

        foreach ($cables as $cable) {
            $cable->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
