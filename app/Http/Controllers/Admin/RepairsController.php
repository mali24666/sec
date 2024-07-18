<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRepairRequest;
use App\Http\Requests\StoreRepairRequest;
use App\Http\Requests\UpdateRepairRequest;
use App\Models\Car;
use App\Models\Repair;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RepairsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('repair_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $repairs = Repair::with(['car_number', 'repair', 'media'])->get();

        $cars = Car::get();

        $users = User::get();

        return view('admin.repairs.index', compact('cars', 'repairs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('repair_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_numbers = Car::pluck('car_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.repairs.create', compact('car_numbers'));
    }

    public function store(StoreRepairRequest $request)
    {
        $repair = Repair::create($request->all());

        foreach ($request->input('pic', []) as $file) {
            $repair->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pic');
        }

        foreach ($request->input('pic_after', []) as $file) {
            $repair->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pic_after');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $repair->id]);
        }

        return redirect()->route('admin.repairs.index');
    }

    public function edit(Repair $repair)
    {
        abort_if(Gate::denies('repair_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_numbers = Car::pluck('car_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $repairs = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $repair->load('car_number', 'repair');

        return view('admin.repairs.edit', compact('car_numbers', 'repair', 'repairs'));
    }

    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        $repair->update($request->all());

        if (count($repair->pic) > 0) {
            foreach ($repair->pic as $media) {
                if (! in_array($media->file_name, $request->input('pic', []))) {
                    $media->delete();
                }
            }
        }
        $media = $repair->pic->pluck('file_name')->toArray();
        foreach ($request->input('pic', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $repair->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pic');
            }
        }

        if (count($repair->pic_after) > 0) {
            foreach ($repair->pic_after as $media) {
                if (! in_array($media->file_name, $request->input('pic_after', []))) {
                    $media->delete();
                }
            }
        }
        $media = $repair->pic_after->pluck('file_name')->toArray();
        foreach ($request->input('pic_after', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $repair->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pic_after');
            }
        }

        return redirect()->route('admin.repairs.index');
    }

    public function show(Repair $repair)
    {
        abort_if(Gate::denies('repair_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $repair->load('car_number', 'repair');

        return view('admin.repairs.show', compact('repair'));
    }

    public function destroy(Repair $repair)
    {
        abort_if(Gate::denies('repair_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $repair->delete();

        return back();
    }

    public function massDestroy(MassDestroyRepairRequest $request)
    {
        $repairs = Repair::find(request('ids'));

        foreach ($repairs as $repair) {
            $repair->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('repair_create') && Gate::denies('repair_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Repair();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
