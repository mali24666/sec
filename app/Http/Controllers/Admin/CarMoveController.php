<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarMoveRequest;
use App\Http\Requests\StoreCarMoveRequest;
use App\Http\Requests\UpdateCarMoveRequest;
use App\Models\Car;
use App\Models\CarMove;
use App\Models\Employee;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarMoveController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_move_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carMoves = CarMove::with(['car_no', 'last_driver', 'driver', 'media'])->get();

        $cars = Car::get();

        $employees = Employee::get();

        return view('admin.carMoves.index', compact('carMoves', 'cars', 'employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_move_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_nos = Car::pluck('car_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $last_drivers = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carMoves.create', compact('car_nos', 'drivers', 'last_drivers'));
    }

    public function store(StoreCarMoveRequest $request)
    {
        $carMove = CarMove::create($request->all());

        foreach ($request->input('file', []) as $file) {
            $carMove->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
        }

        foreach ($request->input('photo', []) as $file) {
            $carMove->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carMove->id]);
        }

        return redirect()->route('admin.car-moves.index');
    }

    public function edit(CarMove $carMove)
    {
        abort_if(Gate::denies('car_move_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_nos = Car::pluck('car_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $last_drivers = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carMove->load('car_no', 'last_driver', 'driver');

        return view('admin.carMoves.edit', compact('carMove', 'car_nos', 'drivers', 'last_drivers'));
    }

    public function update(UpdateCarMoveRequest $request, CarMove $carMove)
    {
        $carMove->update($request->all());

        if (count($carMove->file) > 0) {
            foreach ($carMove->file as $media) {
                if (! in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $carMove->file->pluck('file_name')->toArray();
        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $carMove->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
            }
        }

        if (count($carMove->photo) > 0) {
            foreach ($carMove->photo as $media) {
                if (! in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $carMove->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $carMove->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.car-moves.index');
    }

    public function show(CarMove $carMove)
    {
        abort_if(Gate::denies('car_move_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carMove->load('car_no', 'last_driver', 'driver');

        return view('admin.carMoves.show', compact('carMove'));
    }

    public function destroy(CarMove $carMove)
    {
        abort_if(Gate::denies('car_move_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carMove->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarMoveRequest $request)
    {
        $carMoves = CarMove::find(request('ids'));

        foreach ($carMoves as $carMove) {
            $carMove->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_move_create') && Gate::denies('car_move_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CarMove();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
