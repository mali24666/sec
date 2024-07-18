<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCustodyRequest;
use App\Http\Requests\StoreCustodyRequest;
use App\Http\Requests\UpdateCustodyRequest;
use App\Models\Custody;
use App\Models\Employee;
use App\Models\Tool;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CustodyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('custody_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $custodies = Custody::with(['employee_name', 'tools', 'given_by', 'receve_by', 'media'])->get();

        $employees = Employee::get();

        $tools = Tool::get();

        $users = User::get();

        return view('admin.custodies.index', compact('custodies', 'employees', 'tools', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('custody_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tools = Tool::pluck('tool_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $given_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.custodies.create', compact('employee_names', 'given_bies', 'tools'));
    }

    public function store(StoreCustodyRequest $request)
    {
        $custody = Custody::create($request->all());

        foreach ($request->input('pic', []) as $file) {
            $custody->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pic');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $custody->id]);
        }

        return redirect()->route('admin.custodies.index');
    }

    public function edit(Custody $custody)
    {
        abort_if(Gate::denies('custody_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tools = Tool::pluck('tool_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $given_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $receve_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $custody->load('employee_name', 'tools', 'given_by', 'receve_by');

        return view('admin.custodies.edit', compact('custody', 'employee_names', 'given_bies', 'receve_bies', 'tools'));
    }

    public function update(UpdateCustodyRequest $request, Custody $custody)
    {
        $custody->update($request->all());

        if (count($custody->pic) > 0) {
            foreach ($custody->pic as $media) {
                if (! in_array($media->file_name, $request->input('pic', []))) {
                    $media->delete();
                }
            }
        }
        $media = $custody->pic->pluck('file_name')->toArray();
        foreach ($request->input('pic', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $custody->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pic');
            }
        }

        return redirect()->route('admin.custodies.index');
    }

    public function show(Custody $custody)
    {
        abort_if(Gate::denies('custody_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $custody->load('employee_name', 'tools', 'given_by', 'receve_by');

        return view('admin.custodies.show', compact('custody'));
    }

    public function destroy(Custody $custody)
    {
        abort_if(Gate::denies('custody_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $custody->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustodyRequest $request)
    {
        $custodies = Custody::find(request('ids'));

        foreach ($custodies as $custody) {
            $custody->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('custody_create') && Gate::denies('custody_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Custody();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
