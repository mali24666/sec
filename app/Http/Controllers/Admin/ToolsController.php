<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyToolRequest;
use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Models\Tool;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToolsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tool_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tools = Tool::all();

        return view('admin.tools.index', compact('tools'));
    }

    public function create()
    {
        abort_if(Gate::denies('tool_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tools.create');
    }

    public function store(StoreToolRequest $request)
    {
        $tool = Tool::create($request->all());

        return redirect()->route('admin.tools.index');
    }

    public function edit(Tool $tool)
    {
        abort_if(Gate::denies('tool_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tools.edit', compact('tool'));
    }

    public function update(UpdateToolRequest $request, Tool $tool)
    {
        $tool->update($request->all());

        return redirect()->route('admin.tools.index');
    }

    public function show(Tool $tool)
    {
        abort_if(Gate::denies('tool_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tool->load('toolsCustodies');

        return view('admin.tools.show', compact('tool'));
    }

    public function destroy(Tool $tool)
    {
        abort_if(Gate::denies('tool_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tool->delete();

        return back();
    }

    public function massDestroy(MassDestroyToolRequest $request)
    {
        $tools = Tool::find(request('ids'));

        foreach ($tools as $tool) {
            $tool->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
